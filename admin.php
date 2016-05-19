<?php
session_start();

if(isset($_SESSION['time'])){
	if((time()-$_SESSION['time'])>60){
	echo "<script>alert('检测到您登录超时！请登录，再进入此页面！');window.location.href='log.php';</script>";
	exit;
	}
}
else{
	echo "<script>alert('检测到您未曾登录！请登录，再进入此页面！');window.location.href='log.php';</script>";
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理系统</title>
</head>
<frameset rows="80,*" cols="*" frameborder="yes" border="1" framespacing="0">
  <frame src="top.html" name="topFrame" scrolling="no" noresize="noresize" id="topFrame" title="topFrame" />
  <frameset rows="*" cols="150,*" framespacing="0" frameborder="yes" border="1">
    <frame src="left.html" name="leftFrame" scrolling="no" noresize="noresize" id="leftFrame" title="leftFrame" />
    <frame src="main.html" name="mainFrame" id="mainFrame" title="mainFrame" />
  </frameset>
</frameset>
<noframes><body>
</body></noframes>
</html>
