<?php
	header("Content-type:text/html;chaset=utf-8");
	require_once('connect.php');
	
	$id = $_GET['id'];
	
	$page_sql = "select big_path from job where id = $id";
	$result = mysql_query($page_sql);
	if($result && mysql_num_rows($result)){
		while($row = mysql_fetch_assoc($result)){
			$data[] = $row;
		}
	}
	$path = $data['big_path'];
	foreach($data as $value){	
		$path = $value['big_path'];
	}
	
	
	$deletesql = "delete from job where id = $id";
	if(!unlink($path)){
			echo "<script>alert('不能正常删除');exit();</script>";
		}
		else{
			if(mysql_query($deletesql)){
				echo "<script>alert('删除职业成功！');history.back();</script>";
			}
			else{
				echo "<script>alert('删除职业失败！');history.go(-1);</script>";
			}
		}
	
?>