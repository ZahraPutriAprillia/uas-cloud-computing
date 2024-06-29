<?php 
$db=new MYSQLi("localhost","root","","db_laundry");
    if($db->connect_error>0){
		die('Connection error');
	}else
	{
		echo'';
	} ;
?>