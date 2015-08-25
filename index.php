<?php
include 'conn.php';
$butten = 'Save';


//select data
$qry = "SELECT * FROM prj1 ORDER BY id DESC";
	$res  = mysql_query($qry);
	$data = array();	
	while(($row =mysql_fetch_assoc($res))!=null){
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
	
	
	$res =mysql_query($qry);
	if((mysql_affected_rows())>0){
	header("location:home.php");
	}
	else{
		echo 'Data not Saved';
	}	
}
if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$butten = 'Update';
	$qry = "SELECT * FROM prj1 where id ='$id'";
	$res  = mysql_query($qry);
	if($result = mysql_fetch_assoc($res)){
		$name = $result['name'];
	}
}

//Delete data
if(isset($_GET['del'])){
	
	$id =$_GET['del'];
	$qry ="delete from prj1 where id =$id";
	$res = mysql_query($qry);
	if((mysql_affected_rows())>0){
		header("location:home.php");
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
		<form name="frm1" method="post" action="home.php">
			<input type="text" name="name" value="<?=isset($name)? $name : ''?>">
			<input type="hidden" name="id" value="<?=isset($id)? $id : ''?>">
			<input type="submit" name="save" value="<?=$butten?>">
		</form>
		<table border="5" width="300">
			<? foreach($data as $array){?>
			<tr>
				<td><?=$array['name']?></td>
				<td><a href="?edit=<?=$array['id']?>">Edit</a></td>
				<td><a href="?del=<?=$array['id']?>" name="delete">Delete</a></td>
			</tr>
			<? }?>
		</table>
	</body>

</html>
