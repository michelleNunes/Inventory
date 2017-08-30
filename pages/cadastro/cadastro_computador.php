<!DOCTYPE html>
<?php

include ("C:\Inventory\pages\conexao\connection.php");


date_default_timezone_set('America/Caracas');

if($action='save'){
	$paramers = array(&$_POST['desc'],&$_POST['model'],&$_POST['price'],array(&$_POST['date'], null, null, SQLSRV_SQLTYPE_DATETIME),&$_POST['condition'],&$_POST['location'],&$_POST['hostname'],&$_POST['area'],&$_POST['owner'],&$_POST['observacao']);

         $sql = sqlsrv_query($connection,"INSERT INTO Inventory.dbo.computador(descricao,modelo,preco,dataaquisicao,condicao,local,hostname,area,funcionario,observacao) VALUES (?,?,?,?,?,?,?,?,?,?)",$paramers);

		$paramers2 = array(&$_POST['processor'],&$_POST['memoryRom'],&$_POST['memoryRam']);
         $sqltxt2 = "INSERT INTO Inventory.dbo.configuracao (id_comp,processador,memoria_rom,memoria_ram) values ((select TOP 1 id from Inventory.dbo.computador order by id desc),?,?,?)";
         

          $sql2 = sqlsrv_query($connection,$sqltxt2,$paramers2);
          $close = sqlsrv_close($connection);
         
		if($sql2){
 
            echo"<script>alert('Dados salvos com sucesso');</script>";
            echo "<script>location='../computador.php';</script>";
        }

        
 }
        
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

<div class="container-fluid">

    <div class="form-group row">
        <label class="col-md-6 control-label col-form-label"><b><h3>Computer Register</h3></b></label>
    </div>

    </br>
	<form class="form-horizontal" method="post" action="?action=save" style="margin:20px 0 25px 0;">
    <div class="form-group row">
        <label class="col-md-3 control-label" for="desc">Description</label>
        <div class="col-md-3">
            <input type="text" name="desc" id="desc"  class="form-control" >
        </div>


        <label class="col-md-1 control-label" for="number">Model </label>
        <div class="col-md-2">
            <input type="text" name="model" id="model" class="form-control">
        </div>


    </div>

    

    
  <div class="form-group">
        <label class="col-md-3 control-label">User</label>

        <div class="col-md-3">
            <input class="form-control" type="text" name="owner" id="owner">
        </div>

         <label class="col-md-1 control-label" for="price">Price</label>
        <div class="box box-info">
            <div class="box-header with-border"></div>
                <div class="box-body col-md-2">
                    <div class="input-group" >
                        <span class="input-group-addon">$</span>
                        <input type="number" class="form-control" name= "price" id="price">
                        <span class="input-group-addon">.00</span>
                        
                    </div>
                
                </div>

        </div>
    </div>

     <div class="form-group row">
        <label class="col-md-3 control-label">Acquired Date</label>

        <div class="col-md-2">
            <input class="form-control" type="date" name="date" id="date">
        </div>

        
        <label class="col-md-2 control-label">HostName</label>

        <div class="col-md-2">
            <input class="form-control" type="text" name="hostname" id="hostname">
        </div>
               
    </div>

    <div class="form-group" style="border: 1">
    
        <label class="col-md-3 control-label" for="condition">Condition</label>
        <div class="box box-info">
            <div class="box-header with-border"></div>
                <div class="box-body col-md-2">
                    <div class="input-group" >
                        <select class="form-control" id="condition" name="condition">
                        <option>...Select...</option>
                          <option value="Good">Good</option>
                          <option value="Satisfactory">Satisfactory</option>
                          <option value="Gread">Gread</option>
                          <option value="Bad">Bad</option>
                          <option value="Poor">Poor</option>
                          <option value="In Maintenance">In Maintenance</option>
                        </select>
                        
                    </div>
  
                </div>

        </div>


         <label class="col-md-2 control-label" for="price">Area</label>
        <div class="box box-info">
            <div class="box-header with-border"></div>
                <div class="box-body col-md-3">
                    <div class="input-group" >
                        <select class="form-control" id="area" name="area">
                            <option>...Select...</option>
                            <option value="Software">Software</option>
                            <option value="Consulting">Consulting</option>
                            <option value="Administration">Administration</option>
                        </select>
                        
                    </div>
  
                </div>

        </div>

        
    </div>

<div class="form-group row">
    <label class="col-md-3 control-label" for="location">Location</label>
        <div class="box box-info">
            <div class="box-header with-border"></div>
                <div class="box-body col-md-2">
                    <div class="input-group" >
                        <select class="form-control" id="location" name="location">
                        <option>...Select...</option>
                          <option value="Manaus"> Manaus</option>
                          <option value="Sao Paulo"> Sao Paulo</option>
                          
                        </select>
                        
                    </div>
       
                </div>

        </div>
		
		
        <label class="col-md-2 control-label">Memory RAM</label>

        <div class="col-md-2">
            <input class="form-control" type="text" name="memoryRam" id="memoryRam">
        </div>
</div>

<div class="form-group">
        <label class="col-md-3 control-label">Processor</label>

        <div class="col-md-2">
            <input class="form-control" type="text" name="processor" id="processor">
        </div>

        
        <label class="col-md-2 control-label">Hard Disk</label>

        <div class="col-md-2">
            <input class="form-control" type="text" name="memoryRom" id="memoryRom">
        </div>

               
</div>

 <div class="form-group"  style="margin:20px 0 25px 0;">
            <label class="col-md-3 control-label" for="Note">Note</label>
            <div class="col-md-5">
                <input type="text" class="form-control" id="observacao" name="observacao" style="max-width:100%;">
            </div>
      
    </div>

    <div class="form-group row">
        <div class="col-md-7 control-label" s>
        <button type="submit" name="submit" class="btn btn-default" style="border-color:#4CAF50">
            <font color="4CAF50"><b>Submit</b></font></button>

            <button type="button" class="btn btn-default" style="border-color:#F44336">
        <a href="../computador.php">
            <font color="F44336"><b>Cancel</b></font>
        </a>
        </button>
        </div>

        
        
        </div>
    </div>
</form>
</div>
<footer class="footer">
      <div class="container">
        <p class="text-muted"><font color="#FFFFFF">@ 2017 Apassos.</font></p>
      </div>
    </footer>

 <script src="../../dist/bootstrap/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
 <script src="../../dist/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
