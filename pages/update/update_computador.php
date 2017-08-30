<?php
include ("C:\Inventory\pages\conexao\connection.php");

    date_default_timezone_set('America/Caracas');
    
    
    $id = $_GET['id'];
    $sqltxt = "SELECT * from Inventory.dbo.computador inner join Inventory.dbo.configuracao on configuracao.id_comp = computador.id where id = $id";
    $sqldados = sqlsrv_query($connection, $sqltxt);
    $vetordados = sqlsrv_fetch_array($sqldados,SQLSRV_FETCH_ASSOC);


?>

<!DOCTYPE html>

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

    <div class="form-group">
        <label class="col-md-10 control-label"><b><h3>Computer Update</h3></b></label>
    </div>

    </br>
    <form class="form-horizontal" method="post" action="update_sql_comp.php"  style="margin:20px 0 25px 0;">
    <div class="form-group">
        <label class="col-md-3 control-label" for="desc">Description</label>
        <div class="col-md-3">
            <input type="text" name="desc" id="desc"  class="form-control input-md" value="<?php echo $vetordados['descricao'];?>">
        </div>


        <label class="col-md-1 control-label" for="number">Model </label>
        <div class="col-md-2">
            <input type="text" name="model" id="model" class="form-control input-md" value="<?php echo $vetordados['modelo'];?>">
        </div>


    </div>

    

    
  <div class="form-group">
        <label class="col-md-3 control-label">User</label>

        <div class="col-md-3">
            <input class="form-control" type="text" name="owner" id="owner" value="<?php echo $vetordados['funcionario'];?>">
        </div>

         <label class="col-md-1 control-label" for="price">Price</label>
        <div class="box box-info">
            <div class="box-header with-border"></div>
                <div class="box-body col-md-2">
                    <div class="input-group" >
                        <span class="input-group-addon">$</span>
                        <input type="number" class="form-control" id="price" name="price" value="<?php echo $vetordados['preco'];?>">
                        <span class="input-group-addon">.00</span>
                        
                    </div>
                
                </div>

        </div>
    </div>

     <div class="form-group">
        <label class="col-md-3 control-label">Acquired Date</label>

        <div class="col-md-2">
            <input class="form-control" type="date" name="date" id="date" >
        </div>

        
        <label class="col-md-2 control-label">HostName</label>

        <div class="col-md-2">
            <input class="form-control" type="text" name="hostname" id="hostname" value="<?php echo $vetordados['hostname'];?>">
        </div>
               
    </div>

    
    <div class="form-group" style="border: 1">
    
        <label class="col-md-3 control-label" for="condition">Condition</label>
        <div class="box box-info">
            <div class="box-header with-border"></div>
                <div class="box-body col-md-2">
                    <div class="input-group" >
                        <select class="form-control" id="condition" name="condition" value="<?php echo $vetordados['condicao'];?>">
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


         <label class="col-md-2 control-label" for="area">Area</label>
        <div class="box box-info">
            <div class="box-header with-border"></div>
                <div class="box-body col-md-3">
                    <div class="input-group" >
                        <select class="form-control" id="area" name="area" value="<?php echo $vetordados['area'];?>">
                            <option>...Select...</option>
                            <option value="Software">Software</option>
                            <option value="Consulting">Consulting</option>
                            <option value="Administration">Administration</option>
                        </select>
                        
                    </div>
  
                </div>

        </div>

        
    </div>

<div class="form-group">
    <label class="col-md-3 control-label" for="location">Location</label>
        <div class="box box-info">
            <div class="box-header with-border"></div>
                <div class="box-body col-md-2">
                    <div class="input-group" >
                        <select class="form-control" id="location" name="location" value="<?php echo $vetordados['local'];?>">
                        <option>...Select...</option>
                          <option value="Manaus"> Manaus</option>
                          <option value="Sao Paulo"> Sao Paulo</option>
                        </select>
                        
                    </div>
       
                </div>

        </div>
<label class="col-md-2 control-label">Memory RAM</label>

        <div class="col-md-2">
            <input class="form-control" type="text" name="memoryRam" id="memoryRam" value="<?php echo $vetordados['memoria_ram'];?>">
        </div>



</div>

<div class="form-group">
        <label class="col-md-3 control-label">Processor</label>

        <div class="col-md-2">
            <input class="form-control" type="text" name="processor" id="processor" value="<?php echo $vetordados['processador'];?>">
        </div>

        
        <label class="col-md-2 control-label">Memory ROM(Hard Disk)</label>

        <div class="col-md-2">
            <input class="form-control" type="text" name="memoryRom" id="memoryRom" value="<?php echo $vetordados['memoria_rom'];?>">
        </div>

               
</div>

 <div class="form-group"  style="margin:20px 0 25px 0;">
            <label class="col-md-3 control-label" for="Note">Note</label>
            <div class="col-md-5">
                <input type="text" class="form-control" id="observacao" name="observacao" style="max-width:100%;" value="<?php echo $vetordados['observacao'];?>">
            </div>
      
    </div>

	<input type="hidden" name="id" id="id" value="<?php echo $vetordados['id'];?>">

    <div class="form-group">
        <div class="col-md-7 control-label" s>
        <button type="submit" class="btn btn-default" style="border-color:#4CAF50">
            <font color="4CAF50"><b>Submit</b></font></button>

            <button type="button" class="btn btn-default" style="border-color:#F44336">
        <a href="../computador.php">
            <font color="F44336"><b>Cancel</b></font>
        </a>
        </button>
        </div>

        
        
        </div>
    </div>
</div>
</form>

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
