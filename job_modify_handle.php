<?php
	header("Content-type:text/html;chaset=utf-8");
	require_once('connect.php');
	
	$id = $_POST['id'];
	
	if(!(isset($_POST['jobname']) && !empty($_POST['jobname'])))
	{
		echo "<script>alert('请输入职业名称!');history.go(-1);</script>";
	}
	else{
			$jobname = $_POST['jobname'];
			if(!(isset($_POST['single']) && !empty($_POST['single'])))
			{
				echo "<script>alert('请输入职业简介!');history.go(-1);</script>";
			}
			else{
				$single = $_POST['single'];
						if(!(isset($_POST['detail']) && !empty($_POST['detail'])))
						{
							echo "<script>alert('请输入职业详情!');history.go(-1);</script>";
						}
						else{
								$detail = $_POST['detail'];
								if(!empty($_FILES['big_pic']['name'])){
									
									$big_pic_info = $_FILES['big_pic'];
									
									$big_type = stristr($big_pic_info['name'],'.');
									if(($big_type != ".jpg" && $big_type != ".png")){
										echo "<script>alert('您上传的图片格式不正确!必须是png或jpg格式！');history.go(-1);</script>";
										}
									else{
										 if(($big_pic_info['size'] < 2097152 && $big_pic_info['size'] > 0)){
											 	 
												 if(!is_dir(DIR_1)){
													 mkdir(DIR_1,0777);
													 }
												 
												 $big_path = DIR_1.$_FILES['big_pic']['name'];
												 
												 //删除原来的图片
												 $addr = $_POST['addr'];
												 if(unlink($addr)){
													
												}
												else{
													echo "<script>alert('删除原图片失败，请重试!');history.go(-1);</script>";
												}
												 
												 move_uploaded_file($big_pic_info['tmp_name'],$big_path);
												 $insert_sql = "update job set name='$jobname',single='$single',detail='$detail',big_path='$big_path' where id = $id";
												 
												 
												 if(mysql_query($insert_sql,$conn)){
													echo "<script>alert('数据修改成功！');history.back(0);</script>";
													 
												}
												else{
													echo "<script>alert('数据修改失败！请尝试重新修改！');history.go(-1);</script>";
												}
													
												 
												 
												 
											 }
											 else{
												 echo "<script>alert('文件大小应小于2M!');history.go(-1);</script>";
												 }
									}
								}
								else{
									if(isset($_POST['addr']) && !empty($_POST['addr'])){
										$addr = $_POST['addr'];
										$insert_sql = "update job set name='$jobname',single='$single',detail='$detail',big_path='$addr' where id = $id";
												 
												 if(mysql_query($insert_sql,$conn)){
													echo "<script>alert('数据修改成功！');history.back(0);</script>";
													 
												}
												else{
													echo "<script>alert('数据修改失败！请尝试重新修改！');history.go(-1);</script>";
												}
										
									}
									else{
										echo "<script>alert('请上传图片!');history.go(-1);</script>";
									}
									
								}
							}
			}
			
	}
	
	
?>