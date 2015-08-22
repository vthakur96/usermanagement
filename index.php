<?php
include 'config.php';
	
//select data
$qry = "SELECT * FROM prj1 ORDER BY id DESC";
$res  = mysqli_query($link,$qry);
$data = array();	
 while(($row =mysqli_fetch_assoc($res))!=null){
 $data []= $row;
 }
 
 
?>
<html>
	<head>
	</head>
	<body>
		<form>
			<input type="text" name="username">
			<input type="submit" name="save" value="Save">
		</form>
		<table border="1" width="200">
			<? foreach($data as $get){?>
			<tr>
				<td><?=$get['name']?></td>
				<td><a href="?edit=<?=$get['id']?>">Edit</a></td>
				<td><a href="?del=<?=$get['id']?>">Delete</a></td>
			</tr>
			<? }?>
		</table>
	</body>

</html>
