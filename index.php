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
