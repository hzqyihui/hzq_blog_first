<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>自由职业者-留言发布</title>
<link href="css/reset.css" type="text/css" rel="stylesheet" />
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/jquery.light.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/jquery.light.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function() {
			$('.work_image a').lightBox();
	});
	$('#search_text').bind('keyup',function(){
		$('#search_suggest').show();
		});
</script>
<script type="text/javascript" src="jquery-1.12.0.min.js">
	$('#search_text').bind('keyup',function(){
		$('#search_suggest').show();
		});
</script>
<style type="text/css">
table tr th {
	font-size: 36px;
}

div.page{
	text-align:center;
}
div.page a{
	border:#666 1px solid;
	text-decoration:none;
	padding:2px 5px 2px 5px;
	margin:2px;
}
div.page span.current{
	border:#999 1px solid;
	background-color:#F00;
	padding:2px 5px 2px 5px;
	margin:2px;
	color:#FFF;
	font-weight:bold;
}
div.page span.disable{
	border:#eee 1px solid;
	padding:2px 5px 2px 5px;
	margin:2px;
	color:#ddd;	
}
div.page form{
	display:inline;
}

#title_page_one{
	clear:both;
	background:url(./images/title_page_bg.png) no-repeat;
	width:960px;
	height:184px;
	margin-top:200px;
}
#title_page_one h2{
	padding-bottom:20px;
	font:38px/30px Georgia, "Times New Roman", Times, serif;
	color:#fdfdfd;
	padding-top:70px;
	padding-left:420px;
}
#work .row .work_desc_new{
	float:left;
	width:100%;
}
#work .row .work_desc_new h3{
	font-size:28px;
}
#work .row .work_desc_new .role{
	color:#766f51;
}
#work .row .work_desc_new .role span{
	color:#aa9b59;
}

#work .row .work_desc_new h3{
	padding-bottom:10px;
}
#sidebar_new{
	float:right;
	width:300px;
}
#message_topic{	
	text-align:right;
	font-size:20px;
}
#message_content{	
	text-align:right;
	vertical-align:middle;
	font-size:20px;
}
#message_submit{	
	text-align:right;
}
</style>
<script type="text/javascript">
	function checkLen(obj) 
		{
		var maxChars = 300;//最多字符数
		if (obj.value.length > maxChars){
			alert("您所输入超过字数限制，已自动截取！");
			obj.value = obj.value.substring(0,maxChars);
		}
			
		var curr = maxChars - obj.value.length;
		document.getElementById("count").innerHTML = curr.toString();
		}

</script>
<body>
	<div id="page">
    	<div id="wrap">
	    	<div id="header">
            	<h1 id="logo"><a href="index.php">自由职业者</a></h1>
                <div class="availability">
                   	<a href="#" class="available">Wrting By Zhi Qiang</a>
                </div>
                <div id="menu_wrap">
                    <ul id="menu">
                        <li><a href="index.php" title="Homepage">首页</a></li>
                        <li><a href="about.php" title="About Me">关于</a></li>
                        <li><a href="work.php" title="My Work">工作</a></li>
                        <li><a href="services.php" title="My Services">服务</a></li>
                        <li><a href="job.php" title="My Job" >职业</a></li>
                        <li><a href="picture.php" title="My Picture">图库</a></li>
                        <li><a href="job_message.php" title="My Message" class="current">留言板</a></li>
                    </ul>
                </div>
                <div id="title_page_one">
                	<h2>发布留言！</h2>
                	
               	  
	            </div>   
                
            </div>
            <div id="main_content">
            	<div id="work">	
                	
                    
                    <div class="work_categ_wrap last">
                
                		<div class="row">
                    
                      
                      	<div class="work_desc_new">
                    		
                               
                                <div id="sidebar">
                                    
                                </div>
                        
                    	</div>
                        
                 	</div>
              <form action="job_message_publsih_handle.php" method="post">
<table width="100%" border="1" >
  <tr>
    <td id="message_topic">留言主题:</td>
    <td><input  name="topic" type="text" maxlength="30" size=57" /><div>您最多只能输入30个汉字或字符</div></td>
  </tr>
  <tr>
    <td id="message_content">留言内容:</td>
    <td><textarea  name="content" cols="51" rows="10" onchange="checkLen(this)" onkeyup="checkLen(this)"></textarea><div>您还可以输入 <span id="count">300</span> 个文字</div></td>
  </tr>
  <tr>
    <td id="message_submit"></td>
    <td><input  name="" type="submit" value="发布" /> <input name="" type="reset" value="重写" /></td>
  </tr>
</table>
</form>
                       	
                    
                    
                    
                    </div>
                    
                    
                    
                </div>
                
            <div class="push">
            	
            </div>    
            
            </div>
            <div id="footer">
            	<div class="copyright">
                </div>
            </div>
        </div>
    </div>
</body>
</html>


