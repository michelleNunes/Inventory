<?php
    include("conexao/connection_timesheet.php");

    function select(){
    	$sql = sqlsrv_query($connection2,"SELECT Partners.NAME FROM Timesheet.dbo.Partners AS Partners");
    	?>
    	<select multiple data-live-search="true" data-max-options="2" name=func[]>
 			<option>Selecione...</option>
 
			 	<?php while($vetor = sqlsrv_fetch_array($sql,SQLSRV_FETCH_ASSOC)) { ?>
			 <option value="<?php echo $vetor['PARTNERID']; ?>"><?php echo $vetor['NAME']; ?></option>
			 <?php } ?>
 
 		</select>
 		<?php
    }
?>