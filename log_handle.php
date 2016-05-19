<?php 
session_start();
	if(!(isset($_POST['manager_name']) && !empty($_POST['manager_name']))){
		echo "<script>alert('请输入管理员账户！');history.go(-1);</script>";
	}
	else{
		if(!(isset($_POST['manager_pwd']) && !empty($_POST['manager_pwd']))){
			echo "<script>alert('请输入管理员密码！');history.go(-1);</script>";
		}
		else{
			if(!(isset($_POST['code']) && !empty($_POST['code']))){
				echo "<script>alert('请输入验证码！');history.go(-1);</script>";
			}
			else{
				if(strtolower($_POST['code']) != $_SESSION['code']){
					echo "<script>alert('验证码输入错误！');history.go(-1);</script>";
				}
				else{
					if($_POST['manager_name'] != 'root_196'){
							echo "<script>alert('帐号错误,请检查！');history.go(-1);</script>";
					}
					else{
						if($_POST['manager_pwd'] != '123')	{
								echo "<script>alert('密码错误,请检查！');history.go(-1);</script>";
						}
						else{
							$_SESSION['admin'] = 'admin';
							$_SESSION['time'] = time();
							echo "<script>alert('登陆成功！请尽快点击确认！');window.location.href='admin.php';</script>";
							
						}
					}
				}
			}
				
		}
	}
		
	
?>