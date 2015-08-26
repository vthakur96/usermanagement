<?php

 function fetch($query){
	$data = array();	
	$query = mysql_query($query);
		 while(($row =mysql_fetch_assoc($query))!=null)
		$data []= $row;
	 return $data;
	 }
 function getUser(){
	$qry = "SELECT * FROM prj1 ORDER BY id DESC";
	return fetch($qry);
 }
	

 function addUpadte($post){
	$name =$post['name'];
	$id   = $post['id'];
	if($id)
		$qry="update prj1 set name='$name' where id ='$id'";
	else
		$qry="insert into prj1 (name) values('$name')";
		$res =mysql_query($qry);
		if((mysql_affected_rows())>0)
			return true;

	  return false;			
}	
 function dlt($get){
	$id =$_GET['del'];
	$qry ="delete from prj1 where id =$id";
	$res = mysql_query($qry);
}
 function edit($get){
	$id = $_GET['edit'];
	$qry = "select * from prj1 where id ='$id'";
	$res  = mysql_query($qry);
	if($result = mysql_fetch_assoc($res))
	{
	  $name = $result['name'];
	  
	  return $name; 
	}
}
?>
