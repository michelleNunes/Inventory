<!DOCTYPE html>
<?php
include("conexao\connection.php");

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
    <div class="col-md-2">
            <h2>Inventory</h2>
        </div>

         <div class="col-md-10 text-left h2">

            <a class="btn btn-default" type="submit" href="relatorio/relatorio.php"style="border-color: #F44336"><i class="fa fa-book" style="border-color: #F44336"></i>
            <font color="#F44336">Gerar Relatorio</font></a>

    </div>
    
</div>

  
   <div class="container-fluid table-responsive">

        <div class="row-left">
        <div role="main" class="col-md-4">
            <table class="table table-sm table-striped" >
                <h4>Software</h4>
			<thead>
                <tr>
                    <th class="col-md-4">Description</th>
                    <th class="col-md-2" >Licences Number</th>
                </tr>
			</thead>
			<tbody>
                <?php
                        $sqltxt = "SELECT software.descricao AS descricao, software.quant_licenca AS quantidade 
                            FROM Inventory.dbo.software";
                            
                        $sql = sqlsrv_query($connection,$sqltxt);
                        while($vetor = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)){
                    ?>              
                 <tr>
                    <td><?php echo $vetor['descricao'];?></td>
                    <td><?php echo $vetor['quantidade'];?></td>
                </tr>
                <?php } ?></tbody>
            </table>
        </div>
        <aside role="complementary" class="col-md-4">
            <table class="table table-sm table-striped">
            <h4>Computers</h4>
                <thead><tr>
                    <th class="col-md-2">Hostname</th>
                    <th class="col-md-3">Condition</th>
                </tr></thead><tbody>

                <?php
                        $sqltxt1 = "SELECT computador.hostname AS hostname, computador.condicao AS condicao 
                            FROM inventory.dbo.computador";
                        $sql1 = sqlsrv_query($connection,$sqltxt1);
                        while($vetor = sqlsrv_fetch_array($sql1,SQLSRV_FETCH_ASSOC)){
                    ?>  
                <tr>
                    <td><?php echo $vetor['hostname'];?></td>
                    <td><?php echo $vetor['condicao'];?></td>
                </tr>
                <?php } ?></tbody>

            </table>
        </aside>
        <nav class="col-md-4">
           <table class="table table-sm table-striped">
           <h4>Computer Accessories</h4>
               <thead><tr>
                
                    <th class="col-md-3">Description</th>
                    <th class="col-md-3">Quantity</th>
                </tr></thead><tbody>
                <?php
                        $sqltxt1 = "SELECT DISTINCT  acessorios.descricao AS descricao_a, acessorios.condicao AS condicao_a 
                            FROM inventory.dbo.acessorios";
                        $sql1 = sqlsrv_query($connection,$sqltxt1);
                        while($vetor = sqlsrv_fetch_array($sql1,SQLSRV_FETCH_ASSOC)){
                    ?> 
                <tr>
                    <td><?php echo $vetor['descricao_a'];?></td>
                    <td><?php echo $vetor['condicao_a'];?></td>
                </tr>
                <?php } ?></tbody>
           </table>
        </nav>
    </div>
   
   </div>

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

    
</body>

</html>
