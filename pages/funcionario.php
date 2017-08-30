<!DOCTYPE html>
<?php
    include("conexao\connection_timesheet.php");


        date_default_timezone_set('America/Caracas');

        $strKeyword = null;

		if(isset($_POST["txtKeyword"]))
		{
			$strKeyword = $_POST["txtKeyword"];

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

    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">

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
        <div class="col-sm-12">
            <h2>Employees</h2>
        </div>
<form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
    <div class="col-md-4">
        <div class="input-group h2">
            <input name="txtKeyword" class="form-control" id="txtKeyword" type="text" placeholder="search" value="<?php echo $strKeyword;?>">
            <span class="input-group-btn">
                <input type="submit" value="Search">

                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </div>
</form>
    <form method="get">
    <div class="container-fluid table-responsive">
    <table class="table table-sm table-hover">

        <thead>
        <tr>
                        <th>Name</th>
            <th>E-mail Address</th>
            <th>Company</th>
            <th>Cell Phone</th>
        </tr>
        </thead>
       <tbody>
                <?php
   
        $sql = sqlsrv_query($connection2,"SELECT Partners.* FROM Timesheet.dbo.Partners AS Partners WHERE Partners.NAME LIKE '%".$strKeyword."%'");
    
                    
                    while($vetor = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)){
                    ?>
                    <tr onclick="window.location.href='visualizar/visualizar_func.php?PARTNERID=<?php echo $vetor['PARTNERID']; ?>'">
                                                <td><?php echo strtoupper($vetor['NAME']);?></td>
                        <td><?php echo $vetor['EMAIL'];?></td>
                        <td><?php echo $vetor['USERGROUP'];?></td>
                        <td><?php echo $vetor['MOBILEPHONENUMBER'];?></td>
                        
                    </tr>
            <?php
                }
                sqlsrv_free_stmt( $sql);
                sqlsrv_close( $connection2);
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

    <!-- Modal delete-->
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalLabel">Delete</h4>
                </div>
                <div class="modal-body">
                Are you sure you want to delete? 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
              </div>
            </div>
        </div>
    </div> <!-- /.modal -->

    <script>
        $("click").change(function(){
            document.location.href = $('visualizar/visualizar_func.php?PARTNERID=<?php echo $vetor['PARTNERID']; ?>').value();
        });
    </script>


</body>

</html>

