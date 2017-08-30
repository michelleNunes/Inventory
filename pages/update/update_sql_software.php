<?php

include ("C:\Inventory\pages\conexao\connection.php");

    date_default_timezone_set('America/Caracas');
    
        $sqlup = "UPDATE Inventory.dbo.software set descricao=?,preco=?,quant_licenca=?,dataaquisicao=?,observaocao = ? where id = ?";
        $params= array($_POST["desc"],&$_POST['price'],$_POST["number"],array($_POST["date"], null, null, SQLSRV_SQLTYPE_DATETIME),$_POST["observacao"],$_POST["id"]); 
        $sql = sqlsrv_query($connection,$sqlup,$params);
	

if( $sqlup === false ) {
   die( print_r( sqlsrv_errors(), true));
  }
  else
  {
   echo "Record update successfully 1.";
  }


        $funcionario = &$_POST['func'];

          for($i =0;$i<count($funcionario);$i++){
            $params2 = array(&$funcionario[$i],$_POST["id"]);
            $sql2 = sqlsrv_query($connection,"UPDATE Inventory.dbo.licenca funcionario=? where software_id=?",$params2);
          }

if( $sql === false ) {
   die( print_r( sqlsrv_errors(), true));
  }
  else
  {
   echo "Record update successfully 1.";
  }

         
		if($sql2){
 
            
            echo "<script>location='../software.php';</script>";
        }

	 
?>