<?php

include ("C:\Inventory\pages\conexao\connection.php");

    date_default_timezone_set('America/Caracas');
    
    $id = $_POST['id'];
        $sqlup = "UPDATE Inventory.dbo.computador set descricao=?,modelo=?,preco=?,dataaquisicao=?,condicao=?,local=?,hostname=?,area=?,funcionario=?,observacao=? where id = $id";

        $paramers = array(&$_POST['desc'],&$_POST['model'],&$_POST['price'],array(&$_POST['date'], null, null, SQLSRV_SQLTYPE_DATETIME),&$_POST['condition'],&$_POST['location'],&$_POST['hostname'],&$_POST['area'],&$_POST['owner'],&$_POST['observacao']);

        $sql = sqlsrv_query($connection,$sqlup,$paramers);

        $sqlupacess = "UPDATE Inventory.dbo.configuracao set processador=?,memoria_rom=?,memoria_ram=? where id_comp=$id";
        $paramers2 = array(&$_POST['processor'],&$_POST['memoryRom'],&$_POST['memoryRam']);
         $sql2 = sqlsrv_query($connection,$sqlupacess,$paramers);
sqlsrv_close($connection);
         
		if($sql2){
 
            echo"<script>alert('Dados alterados com sucesso');</script>";
            echo "<script>location='../computador.php';</script>";
        }

	 
?>