<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>自由职业者-留言板</title>
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
	width:200px;
	margin-top:20px;
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
	
	$page_size = 5;
	$offer = ($page-1)*$page_size;
	$page_sql = "select * from comment limit $offer,$page_size";
	$count_sql =  "select COUNT(*) from comment";
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
                        <li><a href="job.php" title="My Job" >职业</a></li>
                        <li><a href="picture.php" title="My Picture">图库</a></li>
                        <li><a href="job_message.php" title="My Message" class="current">留言板</a></li>
                    </ul>
                </div>
                <div id="title_page_one">
                	<h2>留言板！</h2>
                	
               	  
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
                    <h2>游客 <?php echo $value['id']?></h2>
                      
                      <div class="work_desc_new">
                    	<h3><a><?php echo $value['topic']?></a></h3>
                        <p><?php echo $value['content']?></p>
                        <div id="sidebar_new">
                			<?php echo $value['time']?>
                		</div>
                        
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
                <div id="sidebar_new">
                	<span><a href="job_message_publsih.php">想发表留言！点击这里哦！</a></span>		
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


