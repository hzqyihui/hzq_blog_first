<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>自由职业者-职业</title>
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
<script type="text/javascript" src="file:///E|/MSDN 帮组文档/jquery-1.12.0.min.js">
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
#search {
	float: right;
	margin-right:240px;	
}
#search_text{
	height:21px;
	
}
#search_button{
	height:26px;	
}
.suggest{
	width:200px;
	background-color:#FFF;
	border;1px solid #999;	
}
.suggest ul li{
	list-style:none;
	padding:3px;
	font-size:18px;
	line-height:20px;
	cursor:pointer;
}
.suggest ul li:hover{
	text-decoration:underline;
	background-color:#e5e5e5;
}
.suggest ul{
	marigin:0;
	padding:0;
	list-style:none;
}
</style>
<body>

<?php
	session_start();
	header("Content-type:text/html;chaset=utf-8");
	require_once('connect.php');
	
	if(isset($_GET['page'])){
		if($_GET['page'] <= $_SESSION['job_total_page'] && $_GET['page'] > 0){
			$page = $_GET['page'];
		}
		else{
			echo "<script>alert('您输入的页码不哈法,请检查！');history.go(-1);</script>";
		}
			
	}
	else{
		$page = 1;
	}
	
	$page_size = 3;
	$offer = ($page-1)*$page_size;
	$page_sql = "select id,name,single,big_path from job limit $offer,$page_size";
	$count_sql =  "select COUNT(*) from job";
	$result = mysql_query($page_sql);
	$count_result = mysql_fetch_array(mysql_query($count_sql));
	$count = $count_result[0];
	$total_page = ceil($count/$page_size);
	$_SESSION['job_total_page'] = $total_page;
	
	if($result && mysql_num_rows($result)){
		while($row = mysql_fetch_assoc($result)){
			$data[] = $row;
		}
	}
	else{
		$data = array();	
	}
?>
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
                        <li><a href="job.php" title="My Job" class="current">职业</a></li>
                        <li><a href="picture.php" title="My Picture">图库</a></li>
                        <li><a href="job_message.php" title="My Message">留言板</a></li>
                    </ul>
                </div>
                <div id="title_page">
                	<h2>这里介些职业的简介！</h2>
                	<div id="search"><form action="job_search.php" method="get"><input  id="search_text"name="key" type="text" size="26" value="请输入职业名称" onclick="if(this.value=='请输入职业名称')this.value=''" onblur="if(value==''){this.value='请输入职业名称'}" onmouseover="this.focus()" onfocus="this.select()"/> <input  name="" id="search_button"type="submit" value="搜索" /></form></div> 
               	  
	            </div>
            </div>
            <div id="main_content">
            	<div id="work">	
                	
                    
                    <div class="work_categ_wrap last">
                
                    <?php 
					if(!empty($data)){
						foreach($data as $value){	
					
				?>
                	<div class="row">
                    <h2><?php echo $value['name']?></h2>
                      <div class="work_image">
                    	<a href="<?php echo $value['big_path']?>"><img src="<?php echo $value['big_path']?>" width="100%" alt="Sample Image"/></a></div>
                      <div class="work_desc">
                    	<h3><a href="job_detail.php?id=<?php echo $value['id']?>" ><?php echo $value['name']?></a></h3>
                        <p><?php echo $value['single']?></p>
                        
                    	</div>
                 	</div>
                	<?php 
					}
					
				}
				
			  ?>
<?php 
 require_once('public_page.php');
	 
	?>
                       	
                    
                    
                    
                    </div>
                    
                    
                    
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

