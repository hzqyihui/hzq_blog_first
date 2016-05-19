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
		$page_banner .= "共".$total_page."页,"."当前共有".$count."条留言,";
	 $page_banner .= "<form action='' method= 'get'>跳转到第<input name='page' id='e_page'type='text' size = '2' value=''/>页<input name='' type='submit' value='跳转' /></form></div>";
	 echo $page_banner;
	 
	?>