<html>

<!DOCTYPE html>
<?php

include ("C:\Inventory\pages\conexao\connection.php");

date_default_timezone_set('America/Caracas');

$id = $_GET["id"];

$sqltxt= "select computador.*,configuracao.* from computador inner join configuracao on configuracao.id_comp = computador.id where id='$id'";
$sql = sqlsrv_query($connection, $sqltxt);
$vetor = sqlsrv_fetch_array($sql,SQLSRV_FETCH_ASSOC);

?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventário - Apassos</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../dist/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../dist/bootstrap/css/logo-nav.css" rel="stylesheet">

    <link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="../../dist/bootstrap/css/sticky-footer.css">
</head>

<body>

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
                <a class="navbar-brand" href="../../index.php">
                    <img src="../../logo.png" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   <li>
                        <a href="../software.php">Software</a>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Hardware
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="../acessorios.php">
                            Computer accessories</a></li>
                             <li><a href="../computador.php">Computers</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="../funcionario.php">Employees</a>
                    </li>
                    <li>
                        <a href="../inventario.php">Inventory</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

</br></br>
<dl class="dl-horizontal">
	<dt>ID:</dt>
	<dd><?php echo $vetor['id'];?></dd>

	<dt>Description:</dt>
	<dd><?php echo $vetor['descricao'];?></dd>

	
</dl>

<dl class="dl-horizontal">
	<dt>Model:</dt>
	<dd><?php echo $vetor['modelo'];?></dd>

	<dt>Price:</dt>
	<dd><?php echo $vetor['preco'];?></dd>

	<dt>Owner:</dt>
	<dd><?php echo $vetor['funcionario'];?></dd>

	<dt>Acquired Date:</dt>
	<dd><?php echo $vetor['dataaquisicao']->format('d/m/Y');?></dd>

	<dt>Condition:</dt>
	<dd><?php echo $vetor['condicao'];?></dd>

	<dt>Location:</dt>
	<dd><?php echo $vetor['local'];?></dd>

	<dt>Area:</dt>
	<dd><?php echo $vetor['area'];?></dd>
</dl>

<dl class="dl-horizontal">
	<dt>Hostname:</dt>
	<dd><?php echo $vetor['hostname'];?></dd>

	<dt>Processor:</dt>
	<dd><?php echo $vetor['processador'];?></dd>

	<dt>Memory RAM:</dt>
	<dd><?php echo $vetor['memoria_ram'];?></dd>

	<dt>Memory ROM:</dt>
	<dd><?php echo $vetor['memoria_rom'];?></dd>

</dl>

<dl class="dl-horizontal">
    <dt>Note:</dt>
    <dd><?php echo $vetor['observacao'];?></dd>

</dl>
	
</br>
<div id="actions" class="row-right">
	<div class="col-md-6">
	  
	<button type="submit" class="btn btn-default" style="border-color:#FF7043">
        <a href="../update/update_computador.php" >
         <font color="#FF7043"><i class="fa fa-check"  aria-hidden="true"> <b>Update</b></i>
         </font></a>
    </button>




	<button type="button" class="btn btn-default" style="border-color:#F44336">
	  <a href="../computador.php"><font color="#F44336">
        <i class="fa fa-times"  aria-hidden="true"><b>Back</b>
        </i>
      </font></a>
    </button>

	  
	</div>
</div>

<footer class="footer">
      <div class="container">
        <p class="text-muted"><font color="#FFFFFF">@ 2017 Apassos.</font></p>
      </div>
    </footer>


 <!-- jQuery -->
    <script src="../../dist/bootstrap/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../dist/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>