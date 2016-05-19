<?php
	header("Content-type:text/html;chaset=utf-8");
	require_once('connect.php');
	
	$id = $_GET['id'];
	
	$deletesql = "delete from comment where id = $id";
	//var_dump($deletesql);exit;
	if(mysql_query($deletesql)){
		echo "<script>alert('删除留言成功！');history.back();</script>";
	}
	else{
		echo "<script>alert('删除留言失败！');history.go(-1);</script>";
	}
	
?>