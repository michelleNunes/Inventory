<!DOCTYPE html>

<?php
      include("pages\conexao\connection.php");

date_default_timezone_set('America/Caracas');
 
      //Employees
      $params = array('MANAUS','S');
      $sql = sqlsrv_query($connection,"SELECT COUNT(Partners.PARTNERID) as cont_employee FROM Timesheet.dbo.Partners WHERE Partners.USERGROUP = 'MANAUS' AND ISUSER= 'S'");
		$dados = sqlsrv_fetch_array($sql,SQLSRV_FETCH_ASSOC);
		
		$sqlcomp = sqlsrv_query($connection,"SELECT COUNT(computador.id) as cont_computer FROM Inventory.dbo.computador");

        $dados1 = sqlsrv_fetch_array($sqlcomp,SQLSRV_FETCH_ASSOC);

        $sqlacess= sqlsrv_query($connection,"SELECT COUNT(DISTINCT acessorios.modelo) as cont_acess FROM Inventory.dbo.acessorios");

        $dados2 = sqlsrv_fetch_array($sqlacess,SQLSRV_FETCH_ASSOC);

        $sqlacess= sqlsrv_query($connection,"SELECT SUM(software.quant_licenca) as cont_soft FROM Inventory.dbo.software");

        $dados3 = sqlsrv_fetch_array($sqlacess,SQLSRV_FETCH_ASSOC);
	$nothing = array('0');
        
		



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
    <link href="dist/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/bootstrap/css/logo-nav.css" rel="stylesheet">

    <link rel="stylesheet" href="dist/bootstrap/css/sticky-footer.css">

    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">


    
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color: #00ACC1
"><!--#009688-->
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
                <a class="navbar-brand" href="index.php">
                    <img src="logo.png" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   <li>
                        <a href="pages/software.php">Software</a>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Hardware
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="pages/acessorios.php">
                            Computer accessories</a></li>
                            <li><a href="pages/computador.php">Computers</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="pages/funcionario.php">Employees</a>
                    </li>
                    <li>
                        <a href="pages/inventario.php">Inventory</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    </br>
    <!-- Page Content -->
    <div id="page-wrapper">
                <!-- /.row -->
        <div class="row-right">
            <div class="col-lg-3 col-md-6">
                <div class="panel" style="background-color: #039BE5">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-2">
                                <i class="fa fa-window-restore fa-4x" style="color: #FFFFFF"></i>
                            </div>
                        <div class="col-xs-10 text-right">
                        <font color="#FFFFFF">
                        
                            <div class="huge"><?php if(!$dados3){print_r ($nothing) ;}else{ echo $dados3['cont_soft'];}?></div>
                            <div>Licences Softwares</div>
                        </font>
                        
                        </div>
                    </div>
                </div>
                <a href="../pages/software.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                            <div class="clearfix"></div>
                    </div>
                </a>
                </div>
            </div>

         </div>

         <div class="row-right">
            <div class="col-lg-3 col-md-6">
                <div class="panel" style="background-color: #43A047">
                    <div class="panel-heading">
                        <div class="row">
                            <div>
                                <div class="col-xs-2">
                                    <i class="fa fa fa-keyboard-o art fa-4x" style="color: #FFFFFF"></i>
                                </div>
                            </div>
                        <div class="col-xs-10 text-right">
                        <font color="#FFFFFF">
                        
                            <div class="huge"><?php if(!$dados3){print_r ($nothing) ;}else{ echo $dados2['cont_acess'];}?> </div>
                            <div>Computer Accessories</div>
                        </font>
                        </div>
                    </div>
                </div>
                <a href="pages/acessorios.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                            <div class="clearfix"></div>
                    </div>
                </a>
            </div>
         </div>

         <div class="row-right">
            <div class="col-lg-3 col-md-6">
                <div class="panel" style="background-color: #F9A825">
                    <div class="panel-heading ">
                        <div class="row">
                            <div class="col-xs-2">
                                <i class="fa fa fa-laptop fa-4x" style="color: #FFFFFF"></i>
                            </div>
                        <div class="col-xs-10 text-right">
                        <font color="#FFFFFF">
                        
                            <div class="huge"><?php echo $dados1['cont_computer'];?></div>
                            <div>Computers</div>
                        </font>
                        </div>
                    </div>
                </div>
                <a href="pages/computador.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                            <div class="clearfix"></div>
                    </div>
                </a>
            </div>
         </div>

         <div class="row-right">
            <div class="col-lg-3 col-md-6">
                <div class="panel" style="background-color: #EF5350">
                    <div class="panel-heading ">    
                        <div class="row">
                            <div class="col-xs-2">
                                    <i class="fa fa-users fa-4x" style="color: #FFFFFF"></i>
                                </div>
                        <div class="col-xs-10 text-right">
                        <font color="#FFFFFF">
                        
                            <div class="huge"><?php echo $dados['cont_employee'];?></div>
                            <div>Employees</div>
                        </font>
                        </div>
                    </div>
                </div>
                <a href="pages/funcionario.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                            <div class="clearfix"></div>
                    </div>
                </a>
            </div>
         </div>
    </div>
   <!-- /.container -->
<section class="content-fluid">
    <div class="row-right">
        <div class="col-md-5">
            <div class="box box-danger">
            <div class="box-header with-border">
            
                <h3 class="box-title" style="text-align: center;">Computers:Condition</h3>
            
            </div>
            <div class="box-body">
              <canvas id="computador" style="width:100%; height:50px"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-5">
            <div class="box box-danger">
            <div class="box-header with-border">
              
                <h3 class="box-title" style="text-align: center;">Computers Accessories:Condition</h3>

            </div>
            <div class="box-body">
              <canvas id="acessorios" style="height:50px"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
</section>

     </br>
    <footer class="footer">
      <div class="container">
        <p class="text-muted"><font color="#FFFFFF">@ 2017 Apassos.</font></p>
      </div>
    </footer>

    <!-- jQuery -->
    <script src="dist/bootstrap/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="dist/bootstrap/js/bootstrap.min.js"></script>

    <script src="dist/chartJS/Chart.min.js"></script>

    
    <script>
            //Graphic Computer

        <?php $sql1 = sqlsrv_query($connection,"select COUNT(condicao) as count_cond_comp from Inventory.dbo.computador where condicao='Satisfactory'");
        $row = sqlsrv_fetch_array($sql1,SQLSRV_FETCH_ASSOC);

?>
     var ctx = document.getElementById("computador").getContext('2d');
             var acessorios = new Chart(ctx, {
                    type : 'pie';
                    data: {
                        labels : ["Satisfactory"],
                            datasets : [{
                                 backgroundColor: [
                                    "#2ecc71",
                                    "#3498db",
                                    "#95a5a6",
                                    "#9b59b6",
                                    "#f1c40f",
                                    "#e74c3c"
                                  ],
                                data : [<?php echo $row['count_cond_comp'];?>]
                            ]}   
                    }
            },options);

             var options = {
              responsive:true
            };
        //Graphic Accessories
        <?php $sql = sqlsrv_query($connection,"select condicao, COUNT(condicao) as count_cond from Inventory.dbo.acessorios group by condicao 
");
            while($row = sqlsrv_fetch_array($sql,SQLSRV_FETCH_ASSOC)){
                $data[]=array($row['condicao']=>$row['count_cond'],);
                $Condition[]=$row['condicao'];
                $Counts[]=$row['count_cond'];
            }

            $js_label = json_encode($Condition,true);
            $js_cols = json_encode($Counts,JSON_NUMERIC_CHECK);

            ?>

            var ctx = document.getElementById("acessorios").getContext('2d');
             var acessorios = new Chart(ctx, {
                    type : 'doughnut';
                    data: {
                        labels : '<?php echo $js_label; ?>',
                            datasets : [{
                                 backgroundColor: [
                                    "#2ecc71",
                                    "#3498db",
                                    "#95a5a6",
                                    "#9b59b6",
                                    "#f1c40f",
                                    "#e74c3c"
                                  ],
                                data : ['<?php echo print_r($js_cols,true); ?>']
                            ]}   
                    }
            },options);

             var options = {
              responsive:true
            };
                    
  </script>

   

</body>

</html>
