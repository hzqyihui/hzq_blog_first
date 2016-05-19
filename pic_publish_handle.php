<?php
	header("Content-type:text/html;chaset=utf-8");
	require_once('connect.php');
	
	
	if(!empty($_FILES['big_pic']['name'])){
									
									$big_pic_info = $_FILES['big_pic'];
									
									$big_type = stristr($big_pic_info['name'],'.');
									if(($big_type != ".jpg" && $big_type != ".png")){
										echo "<script>alert('您上传的图片格式不正确!必须是png或jpg格式！');history.go(-1);</script>";
										}
									else{
										 if(($big_pic_info['size'] < 2097152 && $big_pic_info['size'] > 0)){
											 	 
												 if(!is_dir(DIR_2)){
													 mkdir(DIR_2,0777);
													 }
												 
												 $big_path = DIR_2.$_FILES['big_pic']['name'];
												 
												 if(file_exists($big_path)){
													
														
														if(file_exists($big_path)){
															echo "<script>alert('您上传的图片文件已存在,请检查重新录入！');history.back(0);</script>";
															}
													}
                                                    else{
															
															move_uploaded_file($big_pic_info['tmp_name'],$big_path);
															$insert_sql = "insert into picture_lab (big_path) values('$big_path')";
												 
												 if(mysql_query($insert_sql,$conn)){
													echo "<script>alert('数据录入成功！');history.back(0);</script>";
													 
												}
												else{
													echo "<script>alert('数据录入失败！请尝试重新录入！');history.go(-1);</script>";
												}
													}
												 
												 
												 
											 }
											 else{
												 echo "<script>alert('文件大小应小于2M!');history.go(-1);</script>";
												 }
									}
								}
								else{
									echo "<script>alert('请上传图片!');history.go(-1);</script>";
								}

?>