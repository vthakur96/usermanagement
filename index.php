<?php
include 'config.php';
	
//Select data
$qry = "SELECT * FROM prj1 ORDER BY id DESC";
$res  = mysqli_query($link,$qry);
$data = array();	
 while(($row =mysqli_fetch_assoc($res))!=null){
 $data []= $row;
 }
 
//Insert data
if(isset($_POST['save'])){
	$name =$_POST['name'];
	$qry="insert into prj1 (name) values('$name')";
	$res =mysqli_query($link,$qry);
	if((mysqli_affected_rows($link))>0){
	header("location:index.php");
	}
	else{
		echo 'Data not Saved';
	}	
}

//Delete data
if(isset($_GET['del'])){
	
	$id =$_GET['del'];
	$qry ="delete from prj1 where id =$id";
	$res = mysqli_query($link,$qry) or die(mysqli_error);
	if((mysqli_affected_rows($link))>0){
		header("location:index.php");
		}
	else{
		echo 'data not deleted';
	}
}

?>
<html>
	<head>
	</head>
	<body>
		<form name="frm1" method="post" action="index.php">
			<input type="text" name="name">
			<input type="submit" name="save" value="Save">
		</form>
		<table border="1" width="200">
			<? foreach($data as $get){?>
			<tr>
				<td><?=$get['name']?></td>
				<td><a href="?edit=<?=$get['id']?>">Edit</a></td>
				<td><a href="?del=<?=$get['id']?>" name="delete">Delete</a></td>
			</tr>
			<? }?>
		</table>
	</body>

</html>
