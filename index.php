<?php
include 'config.php';
include 'include/function.php';

$data 	= getUser();
$button	='Save';
$name ='';
$id = isset($_GET['edit'])?$_GET['edit']: '';
//Insert/Update data
if(isset($_POST['save'])){
	if(addUpadte($_POST)){
		header("location:index.php");
		}
	else 
	  echo "Some thing went wrong";		
	}


if(isset($_GET['edit'])){
	$button = 'Update';
	if(edit($_GET)){
		
		$name =edit($name);
		}
}


//Delete data
if(isset($_GET['del'])){
	if(dlt($_GET)){
		}
    header("location:index.php");
}

?>
<html>
	<head>
	</head>
	<body>
		<form name="frm1" method="post" action="index.php">
			<input type="text" name="name" value="<?=isset($name)? $name : ''?>">
			<input type="hidden" name="id" value="<?=isset($id)? $id : ''?>">
			<input type="submit" name="save" value="<?=$button?>">
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
