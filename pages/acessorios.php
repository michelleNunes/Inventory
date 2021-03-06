<!DOCTYPE html>
<?php
    include("conexao\connection.php");

    date_default_timezone_set('America/Caracas');

       $strKeyword = null;

    if(isset($_POST["search"]))

    {    
        $strKeyword = $_POST["search"];
    }

	if($action = 'delete'){
        $modelo = &$_GET['modelo'];
		$descricao = &$_GET['descricao'];
        $sqltxt = sqlsrv_query($connection,"DELETE FROM Inventory.dbo.acessorios WHERE modelo='$modelo' and descricao='$descricao'");
        

    }
	
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Apassos: Inventory</title>

    <!-- Bootstrap Core CSS -->
    <link href="../dist/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/bootstrap/css/logo-nav.css" rel="stylesheet">

    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="../dist/bootstrap/css/sticky-footer.css">


</head>

<body>

    <!-- Navigation -->
        <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color: #00ACC1">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">
                    <img src="../logo.png" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   <li>
                        <a href="software.php">Software</a>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Hardware
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="acessorios.php">
                            Computer accessories</a></li>
                            <li><a href="computador.php">Computers</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="funcionario.php">Employees</a>
                    </li>
                    <li>
                        <a href="inventario.php">Inventory</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Page Content -->
    
<div class="row-right">
    <div class="col-sm-4">
            <h2>Computer Accessories</h2>
        </div>
<form name="formpesq" method="post" action="?action=search">
    <div class="col-md-4">
        <div class="input-group h2">
            <input name="search" class="form-control" id="search" type="text" placeholder="search" value="<?php echo $strKeyword;?>" >
            <span class="input-group-btn">
                <button class="btn btn-primary" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </div>
</form>
        <div class="col-md-4 text-left h2">
            <a class="btn btn-default" href="cadastro/cadastro_acessorio.php" style="border-color: #0D47A1"><i class="fa fa-plus"></i>
            <font color="#0D47A1">New Register</font></a>

    </div>
</div>
    

    <form method="post">
    <div class="container-fluid table-responsive" >
    <table class="table table-sm table-hover" >
        <thead>
        <tr>
        
            <th>Description</th>
            <th>Price</th>
            <th>Model</th>
            <th>Condition</th>
                        
        </tr>
        </thead>
            <tbody>
            <?php

                $sql = sqlsrv_query($connection,"SELECT DISTINCT modelo, descricao,preco,condicao FROM Inventory.dbo.acessorios WHERE descricao LIKE '%".$strKeyword."%'");

                while($vetor = sqlsrv_fetch_array($sql,SQLSRV_FETCH_ASSOC)){
                ?>
                    <tr>
                        
                        <td onclick="window.location.href='visualizar/visualizar_acess.php?descricao=<?php echo $vetor['descricao'];?>&modelo=<?php echo $vetor['modelo'];?>'">
						<?php echo $vetor['descricao'];?></td>
                        <td onclick="window.location.href='visualizar/visualizar_acess.php?descricao=<?php echo $vetor['descricao'];?>&modelo=<?php echo $vetor['modelo'];?>'">
						<?php echo $vetor['preco'];?></td>
                        <td onclick="window.location.href='visualizar/visualizar_acess.php?descricao=<?php echo $vetor['descricao'];?>&modelo=<?php echo $vetor['modelo'];?>'">
						<?php echo $vetor['modelo'];?></td>
                        <td onclick="window.location.href='visualizar/visualizar_acess.php?descricao=<?php echo $vetor['descricao'];?>&modelo=<?php echo $vetor['modelo'];?>'">
						<?php echo $vetor['condicao'];?></td>
                        
                        <th id="actions">
                            <button type="button" class="btn btn-default" style="border-color:#FF7043">
                            <a href="update/update_acessorio.php?modelo=<?php echo $vetor['modelo'];?>&descricao=<?php echo $vetor['descricao']; ?>" >
                            <font color="#FF7043"><i class="fa fa-check"  aria-hidden="true"> <b>Update</b></i></font></a></button>
                           
                            <button type="button" class="btn btn-default" style="border-color:#F44336">
                            <a  href="?action=delete&modelo=<?php echo $vetor['modelo']; ?>&descricao=<?php echo $vetor['descricao'];?>">
                            <font color="#F44336" data-customer="<?php echo $vetor['modelo'];echo $vetor['descricao'];?>">
                            <i class="fa fa-times"  aria-hidden="true">
                            <b>Delete</b></i></font></a></button>
														 	
                        </th>
                    </tr>
            <?php
                }
                sqlsrv_free_stmt( $sql);
                    sqlsrv_close( $connection);
            ?>
                
        </tbody>        
    </table>
    </div>
    </form>

    <footer class="footer">
      <div class="container">
        <p class="text-muted"><font color="#FFFFFF">@ 2017 Apassos.</font></p>
      </div>
    </footer>

    
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../dist/bootstrap/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../dist/bootstrap/js/bootstrap.min.js"></script>
	
	<script>
        $("click").change(function(){
            document.location.href = $('visualizar/visualizar_acess.php?descricao=<?php echo $vetor['descricao'];?>&modelo=<?php echo $vetor['modelo'];?>').value();
        });
    </script>

</body>

</html>
