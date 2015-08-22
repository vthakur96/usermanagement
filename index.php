<?php
include 'config.php';

$action = 'Save';



	
//Select data
$qry = "SELECT * FROM prj1 ORDER BY id DESC";
$res  = mysqli_query($link,$qry);
$data = array();	
 while(($row =mysqli_fetch_assoc($res))!=null){
 $data []= $row;
 }
 
//Insert/Update data
if(isset($_POST['save'])){
	$name =$_POST['name'];
	$id   = $_POST['id'];
	
	if($id)
		$qry="update prj1 set name='$name' where id ='$id'";
	else
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

//Update data
if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$action = 'Update';
	$qry = "SELECT * FROM prj1 where id ='$id'";
	$res  = mysqli_query($link,$qry);
	if($result = mysqli_fetch_assoc($res)){
		$name = $result['name'];
	}
}	
?>
<html>
	<head>
	</head>
	<body>
		<form name="frm1" method="post" action="index.php">
			<input type="text" name="name" value="<?=isset($name)? $name : ''?>">
			<input type="hidden" name="id" value="<?=isset($id)? $id : ''?>">
			<input type="submit" name="save" value="<?=$action?>">
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
