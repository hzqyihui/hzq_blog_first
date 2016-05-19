<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>博客-职业详情</title>
<link href="css/reset.css" type="text/css" rel="stylesheet" />
<link href="css/style.css" type="text/css" rel="stylesheet" />
</head>
<style type="text/css">
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
	padding-left:380px;
}

</style>
<body>
<?php
	header("Content-type:text/html;chaset=utf-8");
	require_once('connect.php');

	$id = intval($_GET['id']);
	$detail_sql = "select name,single,detail from job where id =$id";
	$result = mysql_query($detail_sql);
	
	if($result && mysql_num_rows($result)){
		$detail_result = mysql_fetch_assoc($result);
	}
	else{
		echo "您要查看的文章可能被误删，如有需要，请联系管理员！";	
	}
?>
	<div id="page">
    	<div id="wrap">
	    	<div id="header">
            	<h1 id="logo"><a href="index.php">自由职业者</a></h1>
                <div class="availability">
                   	<a href="#" class="available">Wrting By Zhi Qiang</a>
                </div>
                
                <div id="title_page_one">
                	<h2>职业详情页！</h2>
	            </div> 
                
            </div>
            <div id="main_content">
            	<div id="content">	
                
                	<h2><?php echo $detail_result['name'];?></h2>
                    
                    <h3><?php echo $detail_result['single'];?></h3>
                            <p><?php echo $detail_result['detail'];?></p>
                 
                </div>
                <div id="sidebar">
                	
                </div>
            <div class="push"></div>    
            
            </div>
            <div id="footer">
            	<div class="copyright">
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
