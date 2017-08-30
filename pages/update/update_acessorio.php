<?php
     include("conexao\connection.php");

    date_default_timezone_set('America/Caracas');
    

    $modelo = $_GET['modelo'];
    $descricao = $_GET['descricao'];
    $sqltxt = "SELECT * from Inventory.dbo.acessorios where modelo = $modelo and descricao=$descricao";
    $sqldados = sqlsrv_query($connection, $sqltxt);
    $vetordados = sqlsrv_fetch_array($sqldados,SQLSRV_FETCH_ASSOC);

    if($action == 'update'){
        $funcionario = &$_POST['func'];
        for($i =0;$i<count($funcionario);$i++){

            $params= array(&$funcionario[$i],&$_POST['desc'],&$_POST['price'],&$_POST['model'],&$_POST['condition']); 
            $sql = sqlsrv_query($connection,"UPDATE Inventory.dbo.acessorios set funcionario=?,descricao=?,preco=?,modelo=?,condicao=?",$params);

        }
         
         sqlsrv_close($connection);

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




    <div class="form-group">
        <label class="col-md-6 control-label"><b><h3>Computer Accessories Update</h3></b></label>
    </div>

    </br>
 <form class="form-horizontal" method="post" action="?action=update" style="margin:20px 0 25px 0;">
    <div class="form-group">
        <label class="col-md-3 control-label">Description</label>

        <div class="col-md-3">
            <input class="form-control" type="text" name="desc" id="desc" value="<?php echo $vetordados['descricao'];?>">
        </div>

         <label class="col-md-1 control-label" for="condition">Condition</label>
        <div class="box box-info">
            <div class="box-header with-border"></div>
                <div class="box-body col-md-2">
                    <div class="input-group" >
                        <select class="form-control" id="condition" value="<?php echo $vetordados['condicao'];?>">
                          <option>...Select...</option>
                          <option value="Good">Good</option>
                          <option value="Satisfactory">Satisfactory</option>
                          <option value="Gread">Gread</option>
                          <option value="Bad">Bad</option>
                          <option value="Poor">Poor</option>
                          <option value="In Maintenance">In Maintenance</option>
                        </select>
                        
                    </div>
                </br>
                </div>

        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">Model</label>

        <div class="col-md-3">
            <input class="form-control" type="text" name="model" id="model" value="<?php echo $vetordados['modelo'];?>">
        </div>

         <label class="col-md-1 control-label" for="price">Price</label>
        <div class="box box-info">
            <div class="box-header with-border"></div>
                <div class="box-body col-md-2">
                    <div class="input-group" >
                        <span class="input-group-addon">$</span>
                        <input type="number" class="form-control" id="price" value="<?php echo $vetordados['preco'];?>">
                        
                    </div>
                </br>
                </div>

        </div>
    </div>

    <div class="form-group row" >
        <label for="func" class="col-md-3 control-label col-form-label">Select the Employeers</label>
        <div class="col-md-9">
            <?php 

                $sql = sqlsrv_query($connection2,"SELECT Partners.* FROM Timesheet.dbo.Partners AS Partners WHERE ISUSER='S' and USERGROUP='MANAUS'");
                ?>
                <select class="selectpicker" multiple data-live-search="true"  name="func[]" id="func[]">
               
                        <?php while($vetor = sqlsrv_fetch_array($sql,SQLSRV_FETCH_ASSOC)) { ?>
                     <option value="<?php echo $vetor['NAME']; ?>"><?php if($vetor['NAME'] == $vetordados['funcionario']){echo $vetor['NAME']; ?></option>
                     <?php } ?>
         
                </select>
           
        </div>
    </div>

    </br>

    <div class="form-group">
        <div class="col-md-7 control-label" s>
        <button type="submit" class="btn btn-default" style="border-color:#4CAF50">
            <font color="4CAF50"><b>Submit</b></font></button>

        <button type="button" class="btn btn-default" style="border-color:#F44336">
        <a href="../acessorios.php">
            <font color="F44336"><b>Cancel</b></font>
        </a>
        </button>
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
