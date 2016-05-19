<?php
	header("Content-type:text/html;chaset=utf-8");
	define("HOST","localhost");
	define("USERNAME","root");
	define("PASSWORD","");
	define("DIR_1","image_job/");
	define("DIR_2","image_lab/");
	
	if(!($conn = mysql_connect(HOST,USERNAME,PASSWORD))){
		echo "<script>alert('连接数据库失败！');</script>";
	}
	if(!mysql_select_db('freelance')){
		echo "<script>alert('选择数据库失败！');</script>";
	}
	
	mysql_query('set names utf8');
	?>