<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的小博客</title>
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


</style>
<body>

<?php
	//error_reporting(0);       //开发环境不建议使用
	session_start();
	header("Content-type:text/html;chaset=utf-8");
	require_once('connect.php');
	
	$key = trim($_GET['key']);
	$key = str_replace(" ","",$key);
	if(isset($_GET['page'])){
		if($_GET['page'] <= $_SESSION['job_total_page'] && $_GET['page'] > 0){
			$page = $_GET['page'];
		}
		else{
			echo "<script>alert('您输入的页码不哈法,请检查！');history.back();</script>";
		}
			
	}
	else{
		$page = 1;
	}
	
	$page_size = 3;
	$offer = ($page-1)*$page_size;
	$page_sql = "select id,name,single,big_path from job where name like '%$key%' limit $offer,$page_size";
	$count_sql =  "select COUNT(*) from job where name like '%$key%'";
	$result = mysql_query($page_sql);
	$count_result = mysql_fetch_array(mysql_query($count_sql));
	$count = $count_result[0];
	if($count == 0){
		echo "<script>alert('您所查询的职业暂时未录入或不存在!请检查重新录入！');history.go(-1);</script>";
		exit;
	}
	$total_page = ceil($count/$page_size);
	$_SESSION['job_total_page'] = $total_page;
	
	if($result && mysql_num_rows($result)){
		while($row = mysql_fetch_assoc($result)){
			//$row['name'] = str_replace($key,'<font color="#FF0000">'.$key.'</font>',$row['name']);
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
                	<h2>下面是您所查询的部分职业！</h2>
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
                    	<a href="<?php echo $value['big_path']?>"><img src="<?php echo $value['big_path']?>" width="100%"alt="Sample Image"/></a></div>
                      <div class="work_desc">
                    	<h3><a href="job_detail.php?id=<?php echo $value['id']?>" target="_blank"><?php echo str_replace($key,'<font color="#FF0000">'.$key.'</font>',$value['name'])?></a></h3>
                        <p><?php echo $value['single']?></p>
                        
                    	</div>
                 	</div>
                	<?php 
					}
					
				}
				
			  ?>
<?php 
  $page_banner ="<div class='page'>";
  
	  if($page > 1){
		  
		  $page_banner .= "<a href='".$_SERVER['PHP_SELF']."?page=1'>首页</a>";
		  $page_banner .= "<a href='".$_SERVER['PHP_SELF']."?page=".($page-1)."'><上一页</a>";
		}
		else{
			$page_banner .="<span class='diable'><a>首页</a></span>";
			$page_banner .="<span class='diable'><a><上一页</a></span>";
		}
	//展示的页面数量
	$show_page = 5;
	//每个页码的偏移量
	$pageset = ($show_page-1)/2;
	$start = 1;
	$end = $total_page;
	if($total_page > $show_page){
		if($page > $pageset+1){
			$page_banner .="..";
		}
		if($page > $pageset){
			$start = $page - $pageset;
			$end = $total_page > $page +$pageset ? $page +$pageset:$total_page;
		}
		else{
			$start = 1;
			$end = $total_page > $show_page?$show_page: $total_page;
		}
		if($page + $pageset > $total_page){
			$start = $start -($page + $pageset -$end);
		}
	}
	for($i=$start; $i <= $end; $i++){
		if($page == $i){
			$page_banner .= "<span class='current'>{$i}</span>";
		}else{
			$page_banner .= " <a href='".$_SERVER['PHP_SELF']."?page=".$i."'>{$i}</a>";
		}
		
	}
	if($total_page > $show_page && $total_page>$page+$pageset){
		$page_banner .="..";
	}
		 if($page < $total_page){
			 $page_banner .= " <a href='".$_SERVER['PHP_SELF']."?page=".($page+1)."'>下一页></a>";
			 $page_banner .= "<a href='".$_SERVER['PHP_SELF']."?page=".$total_page."'>尾页</a>";
		}
		else{
			$page_banner .="<span class='diable'><a>下一页></a></span>";
			$page_banner .="<span class='diable'><a>尾页</a></span>";	
		}
		$page_banner .= "共".$total_page."页,";
	 $page_banner .= "<form action='' method= 'get'>跳转到第<input name='page' id='e_page'type='text' size = '2' value=''/>页<input name='' type='submit' value='跳转' /></form></div>";
	 echo $page_banner;
	 
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

