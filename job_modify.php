<?php 
	header("Content-type:text/html;chaset=utf-8");
	require_once('connect.php');
	
	$id = $_GET['id'];
	
	$modifysql = "select id,name,single,detail,big_path from job where id = $id";
	if($modify_sql = mysql_query($modifysql)){
		$modify_result = mysql_fetch_assoc($modify_sql);
	}
	else{
		echo "<script>alert('修改职业出错！');history.back();</script>";
	}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>职业发布页面</title>
<style type="text/css">
#form1 table tr th {
	font-size: 36px;
}
.job {
	font-size: 20px;
}
</style>

<script type="text/javascript">
	
	function checkLen(obj) 
		{
		var maxChars = 500;//最多字符数
		if (obj.value.length > maxChars){
			alert("您所输入超过字数限制，已自动截取！");
			obj.value = obj.value.substring(0,maxChars);
		}
		var curr = maxChars - obj.value.length;
		document.getElementById("t_count").innerHTML = curr.toString();
		}
		
	function checkLenth(obj) 
		{
		var maxChars = 200;//最多字符数
		if (obj.value.length > maxChars){
			alert("您所输入超过字数限制，已自动截取！");
			obj.value = obj.value.substring(0,maxChars);
		}
		var curr = maxChars - obj.value.length;
		document.getElementById("count").innerHTML = curr.toString();
		}
		
	
</script></head>

<body>
<form id="form1" name="form1" enctype="multipart/form-data" method="post" action="job_modify_handle.php">
  <input name="id" type="hidden" value="<?php echo $modify_result['id']?>" />
  <table width="100%" border="1">
  <tr>
    <th colspan="4">职业发布</th>
  </tr>
  <tr>
    <td width="20%" class="job">职业名称:</td>
    <td colspan="3">
      <input type="text" name="jobname" id="jobname" size="22"maxlength="10" value='<?php echo $modify_result['name']?>'/></td>
  </tr>
  <tr>
    <td height="116" class="job">职业简介:</td>
    <td colspan="3">
      <textarea name="single" id="single" cols="60" rows="8" " onchange="checkLenth(this)" onkeyup="checkLenth(this)"><?php echo $modify_result['single']?></textarea></textarea><div>您还可以输入 <span id="count">200</span> 个文字</div></td>
    </tr>
  <tr>
    <td class="job">职业详情</td>
    <td colspan="3"><textarea name="detail" id="detail" cols="60" rows="10" onchange="checkLen(this)" onkeyup="checkLen(this)"><?php echo $modify_result['detail']?></textarea><div>您还可以输入 <span id="t_count">500</span> 个文字</div></td>
    </tr>
  <tr>
    <td class="job">职业图片(大)</td>
    <td>原始地址:<input name="addr" type="text" readonly="readonly" value="<?php echo $modify_result['big_path']?>"/>不可更改</td>
    <td colspan="2"><input type="file" name="big_pic" id="big_pic"  /></td>
    </tr>
  <tr>
    <td ></td>
    <td ><input type="submit" name="button" id="button" value="提交" /></td>
    <td ></td>
    <td ></td>
    </tr>
</table>
</form>
<script>
	
</script>
</body>
</html>
