<!DOCTYPE html>

<?php
include ("C:\Inventory\pages\conexao\connection_timesheet.php");
include ("C:\Inventory\pages\conexao\connection.php");


date_default_timezone_set('America/Caracas');


    if($action='save'){
		
        //software
        $sqltxt = "INSERT INTO Inventory.dbo.software (descricao,preco,quant_licenca,dataaquisicao,observacao) VALUES (?,?,?,?,?); SELECT scope_identity() AS id";
         $params= array(&$_POST['desc'],&$_POST['price'],&$_POST['number'],array(&$_POST['date'], null, null, SQLSRV_SQLTYPE_DATETIME),&$_POST['observacao']); 
		 $sql = sqlsrv_query($connection,$sqltxt,$params);

       
        //licenca
	  $funcionario = &$_POST['func'];

      for($i =0;$i<count($funcionario);$i++){
        $params2 = array(&$funcionario[$i]);
         $sql2 = sqlsrv_query($connection,"INSERT INTO Inventory.dbo.licenca (funcionario,software_id) VALUES (?,(select TOP 1 id from Inventory.dbo.software order by id desc))",$params2);
      }
        $close = sqlsrv_close($connection);
         
        

    
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
        <label class="col-md-6 control-label col-form-label"><b><h3>Software Register</h3></b></label>
    </div>

    </br>
<form class="form-horizontal " action="?action=save" method="post"  style="margin:20px 0 25px 0;">
    
    <div class="form-group row">
        <label class="col-md-3 control-label col-form-label" for="desc">Description</label>
        <div class="col-md-3">
            <input type="text" name="desc" id="desc" class="form-control" >
        </div>


        <label class="col-md-1 control-label col-form-label" for="number">Licences Number </label>
        <div class="col-md-1">
            <input type="text" name="number" id="number" class="form-control">
        </div>


    </div>

    

    
  <div class="form-group row">
        <label class="col-md-3 control-label " col-form-label>Acquired Date</label>

        <div class="col-md-2">
            <input class="form-control" type="date" name="date" id="date">
        </div>

         <label class="col-md-1 control-label col-form-label" for="price">Price</label>
        <div class="box box-info">
            <div class="box-header with-border"></div>
                <div class="box-body col-md-2">
                    <div class="input-group" >
                        <span class="input-group-addon">$</span>
                        <input type="number" class="form-control" name="price" id="price">
                        <span class="input-group-addon">.00</span>
                        
                    </div>
                </br>
                </div>

        </div>
    </div>

    <div class="form-group row" >
        <label for="func" class="col-md-3 control-label col-form-label">Select the Employeers</label>
        <div class="col-md-9">
            <?php 

                $sql = sqlsrv_query($connection2,"SELECT Partners.* FROM Timesheet.dbo.Partners AS Partners WHERE ISUSER='S' order by NAME");
                ?>
                <select class="selectpicker" multiple data-live-search="true"  name="func[]" id="func[]">
               
                        <?php while($vetor = sqlsrv_fetch_array($sql,SQLSRV_FETCH_ASSOC)) { ?>
                     <option value="<?php echo $vetor['NAME']; ?>"><?php echo $vetor['NAME']; ?></option>
                     <?php } ?>
         
                </select>
           
        </div>
    </div>
<div class="form-group"  style="margin:20px 0 25px 0;">
            <label class="col-md-3 control-label" for="Note">Note</label>
            <div class="col-md-5">
                <input type="text" class="form-control" id="observacao" name="observacao" style="max-width:100%;">
            </div>
      
    </div>


    <div class="form-group row">
        <div class="col-md-6 control-label" s>
        <button type="submit" name="submit" class="btn btn-default" style="border-color:#4CAF50">
            <font color="4CAF50"><b>Submit</b></font></button>

            <button type="button" class="btn btn-default" style="border-color:#F44336">
        <a href="../software.php">
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
