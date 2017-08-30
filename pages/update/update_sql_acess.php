<?php

include ("C:\Inventory\pages\conexao\connection.php");

    date_default_timezone_set('America/Caracas');
    
        $sqlup = "UPDATE Inventory.dbo.computador set descricao=?,modelo=?,preco=?,dataaquisicao=?,condicao=?,local=?,hostname=?,area=?,funcionario=?,observacao=? where id = ?";

        $paramers = array($_POST["desc"],$_POST["model"],&$_POST['price'],array($_POST["date"], null, null, SQLSRV_SQLTYPE_DATETIME),$_POST["condition"],&$_POST["location"],$_POST["hostname"],$_POST["area"],$_POST["owner"],$_POST["observacao"],$_POST["id"]);

        $sql = sqlsrv_query($connection,$sqlup,$paramers);

if( $sql === false ) {
   die( print_r( sqlsrv_errors(), true));
  }
  else
  {
   echo "Record update successfully 1.";
  }


        $sqlupacess = "UPDATE Inventory.dbo.configuracao set processador=?,memoria_rom=?,memoria_ram=? where id_comp=?";

        $paramers2 = array($_POST["processor"],$_POST["memoryRom"],$_POST["memoryRam"],$_POST["id"]);

         $sql2 = sqlsrv_query($connection,$sqlupacess,$paramers2);

sqlsrv_close($connection);


if( $sql === false ) {
   die( print_r( sqlsrv_errors(), true));
  }
  else
  {
   echo "Record update successfully 1.";
  }

         
		if($sql2){
 
            echo"<script>alert('Dados alterados com sucesso');</script>";
            echo "<script>location='../computador.php';</script>";
        }

	 
?>