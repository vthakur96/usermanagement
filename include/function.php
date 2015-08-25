<?php
 include 'config.php';

 function getUser(){
	$qry = "SELECT * FROM prj1 ORDER BY id DESC";
	$res  = mysql_query($qry);
	$data = array();
	
	print_r(mysql_fetch_assoc($res));
	die;	
	 while(($row =mysql_fetch_assoc($res))!=null){
	 $data []= $row;
	 } 
	return $data;
 }
	
 
