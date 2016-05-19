<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理系统-职业</title>
<style type="text/css">
table tr th {
	font-size: 36px;
}
table tr th,td{
	text-align:center;	
}
div.page{
	text-align:center;
	margin-top:50px;
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
<script type="text/javascript">
		function del_alert(id){
        var temp=confirm('把该条记录删除吗？')
        if(temp){
                window.location.href='job_delete.php?id='+id;
        }else{
        }
}
</script>

</head>

<body>

<?php
	session_start();
	header("Content-type:text/html;chaset=utf-8");
	require_once('connect.php');
	
	if(isset($_GET['page'])){
		if($_GET['page'] <= $_SESSION['job_manage_total_page'] && $_GET['page'] > 0){
			$page = $_GET['page'];
		}
		else{
			echo "<script>alert('您输入的页码不存在,请检查！');history.go(-1);</script>";
		}
			
	}
	else{
		$page = 1;
	}
	
	$page_size = 5;
	$offer = ($page-1)*$page_size;
	$page_sql = "select id,name,single from job limit $offer,$page_size";
	$count_sql =  "select COUNT(*) from job";
	$result = mysql_query($page_sql);
	$count_result = mysql_fetch_array(mysql_query($count_sql));
	$count = $count_result[0];
	$total_page = ceil($count/$page_size);
	$_SESSION['job_manage_total_page'] = $total_page;
	
	if($result && mysql_num_rows($result)){
		while($row = mysql_fetch_assoc($result)){
			$data[] = $row;
		}
	}
	else{
		$data = array();	
	}
?>
<table width="100%" border="1" align="center" class="page_h">
  <tr>
    <th colspan="4">职业管理</th>
    </tr>
  <tr>
    <td width="7%">编号</td>
    <td width="10%">职业名称</td>
    <td width="73%">简介</td>
    <td width="10%">操作</td>
    </tr>
    <?php 
		if(!empty($data)){
			foreach($data as $value){	
		
	?>
  <tr>
    <td><?php echo $value['id']?></td>
    <td><?php echo $value['name']?></td>
    <td><?php echo $value['single']?></td>
    <td><a href="#" onclick="del_alert(<?php echo $value['id']?>)">删除</a> <a href="job_modify.php?id=<?php echo $value['id']?>" target="_self">修改</a></td>
  </tr>
  <?php 
		}
		
	}
	
  ?>
  </table>
  <?php 
  require_once('public_page.php');
	 
	?>
    

</body>
</html>
