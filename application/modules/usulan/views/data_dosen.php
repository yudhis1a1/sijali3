<?php
// $serverName = "120.29.156.20, 1433"; //serverName\instanceName, portNumber (default is 1433)
// $connectionInfo = array( "Database"=>"pddikti", "UID"=>"sa", "PWD"=>"Pu5k0m0k3");
// $conn = sqlsrv_connect( $serverName, $connectionInfo);

// if( $conn ) {
     // echo "Connection established.<br />";
// }else{
     // echo "Connection could not be established.<br />";
     // die( print_r( sqlsrv_errors(), true));
// }

?>
<table class="table table-bordered table-striped" >
<thead> 
<tr>   
	<th >NIDN</th>
	<th >NAMA</th>
</tr>
</thead>
 
<tbody class=" table-hover"> 
<?php
// foreach($post->result_array() as $i):
?>
<tr> 
	<td><?=$nidn;?></td>
	<td><?=$nama;?></td>
</tr>
<?php 
// endforeach;
?>
<tr>
	<td colspan="2">
	</td>
</tr>

</tbody>
</table>