<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理登陆界面</title>
<link href="css/reset.css" type="text/css" rel="stylesheet" />
<link href="css/style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript">
	window.onload = function(){
		var ainput = document.getElementsByTagName('input');
		var name = ainput[0];
		var pwd = ainput[1];
		var extra = document.getElementsByTagName('lable');
		var name_msg = extra[0];
		var pwd_msg = extra[1];
		var name_length = 0;
		
		
		function getLength(str){
		return str.replace(/[\w]/g,"*").length;
		}
		name.onfocus=function(){
				//name_msg.style.display="block";
				name_msg.innerHTML="<lable>此账户为唯一账户(不能有中文)!</lable>";
				
		}
		
		name.onkeyup=function(){
			name_length = this.value.length;
		}
		
		name.onblur=function(){
			
			var re = /[^\w]/g;
			if(re.test(this.value)){
				name_msg.innerHTML="<lable>含有非法字符!</lable>";
			}
			else if(this.value==""){
				name_msg.innerHTML="<lable>不能为空!</lable>";
			}
			else if(name_length > 10){
				name_msg.innerHTML="<lable>账户长度不能超过10!</lable>";
			}
				
		}
		
		pwd.onfocus=function(){
				//pwd_msg.style.display="block";
				pwd_msg.innerHTML="<lable>请输入密码！</lable>";
								
		}
		pwd.onblur=function(){
			
			var re = /[^\w]/g;
			if(re.test(this.value)){
				pwd_msg.innerHTML="<lable>含有非法字符!</lable>";
			}
			else if(this.value==""){
				pwd_msg.innerHTML="<lable>不能为空!</lable>";
			}
			else if(name_length > 10){
				pwd_msg.innerHTML="<lable>账户长度不能超过10!</lable>";
			}
				
		}
		
		
	}

</script>
<style type="text/css">
#main{
	padding-top:60px;
	padding-left:30px;
	padding-right:30px;
	min-height: 100%;
	height: auto !important;
	height: 100%;
	margin: 0 auto -167px; 
	
}
.manage {
	text-align: right;
}

#main h2
{
	color:#ebaf0d;
	font:28px/26px Georgia, "Times New Roman", Times, serif;
	background:url(../images/grunge_line.gif) repeat-x bottom center;
	margin-bottom:30px;
	padding-bottom:10px;
	text-align: center;
}

#content{
	margin-top: 80px; 
	}
#code {
}
#code{
	margin-bottom: 0px;
	margin-top: 0px;
	padding-bottom: 0px;
	padding-top: 0px;
	}
</style>
</head>

<body id="code">
<?php 
session_start();
	if(!empty($_COOKIE['manage_name']) && !is_null($_COOKIE['manage_name'])){
		$_SESSION['manage_name'] = $_COOKIE['manage_name'];
		echo "<script>window.location.href='admin.php';</script>";
	}
	else{		
	
?>
	<div id="page">
    	<div id="wrap">
	    	<div id="header">
            	<h1 id="logo"><a href="index.php">自由职业者</a></h1>
                <div class="availability">
                   	<a href="#" class="available">Wrting By Zhi Qiang</a>
                </div>
                
                 
                
            </div>
          <div id="main">
            	<div id="content">	
                	<h2>后台管理员登录</h2>
                    
                    <form action="log_handle.php" method="post"><table width="104%" border="1">
  <tr>
    <td width="27%" class="manage">管理员账户:</td>
    <td colspan="2"><input name="manager_name" type="text"  id="manage_name"/><lable></lable></td>
    </tr>
  <tr>
    <td class="manage">管理员密码:</td>
    <td colspan="2"><input name="manager_pwd" type="password" /><lable></lable></td>
    </tr>
  <tr>
    <td  class="manage">验证码:</td>
    <td colspan="2"><input name="code" type="text" size="8" maxlength="4"/>  <img id="new_code"src="./code.php?r=<?php echo rand();?>"/><a href="javascript:void(0)" onclick="document.getElementById('new_code').src='./code.php?r='+Math.random()">换一个？</a></td>
    </tr>
    <tr>
        <td></td>
        <td width="35%"><input name="" type="submit" value="登录"/></td>
        <td width="38%"></td>
    </tr>
  
</table>
</form>

                 
                </div>
                
            <div class="push"></div>    
            
            </div>
            <div id="footer">
            	<div class="copyright">
                </div>
            </div>
      </div>
</div>
    <?php 
	}
	?>
</body>
</html>

