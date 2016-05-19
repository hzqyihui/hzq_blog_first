<?php
	header("Content-type:text/html;chaset=utf-8");
	require_once('connect.php');
	
	$id = $_GET['id'];
	
	$sql = "select big_path from picture_lab where id = $id";
	
	$result = mysql_query($sql);
	if($result && mysql_num_rows($result)){
		while($row = mysql_fetch_assoc($result)){
			$data[] = $row;
		}
	}
	foreach($data as $value){	
		$path = $value['big_path'];
	}
	
	$deletesql = "delete from picture_lab where id = $id";
	
		if(!unlink($path)){
			echo "<script>alert('不能正常删除');exit();</script>";
		}
		else{
			if(mysql_query($deletesql)){
				echo "<script>alert('删除图片成功！');history.back();</script>";
			}
			else{
				echo "<script>alert('删除图片失败！');history.go(-1);</script>";
			}
		}
	
?>