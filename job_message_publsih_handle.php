<?php
	header("Content-type:text/html;chaset=utf-8");
	require_once('connect.php');
	date_default_timezone_set("Asia/Shanghai"); 
	
	if(!(isset($_POST['topic']) && !empty($_POST['topic'])))
	{
		echo "<script>alert('请输入留言主题!');history.go(-1);</script>";
	}
	else{
			$topic = $_POST['topic'];
			if(!(isset($_POST['content']) && !empty($_POST['content'])))
			{
				echo "<script>alert('请输入留言内容!');history.go(-1);</script>";
			}
			else{
					$content = $_POST['content'];
					$createtime = date("Y-m-d H:i:s");
					$insert_sql = "insert into comment (topic,content,time) values('$topic','$content','$createtime')";
					if(mysql_query($insert_sql,$conn))
					{
						echo "<script>alert('留言发布成功！');window.location.href='job_message.php';</script>";
					}
					else{
						echo "<script>alert('留言发布失败！请尝试重新发布！');history.go(-1);</script>";
					}
			}
	}
?>