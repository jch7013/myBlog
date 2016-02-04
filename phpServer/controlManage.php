<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<title>myBlog</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div id="top-fix">
		<div class="container">
			<ul>
				<li class="title-content" id="left-icon"><a href="../index.html"><div>博客</div></a></li>
				<li class="title-control"><a href="">后台管理</a></li>
			</ul>
			<ul id="mylink">
				<a href="../index.html" class="mylink-li"><li class="sign">退出</li></a>
			</ul>
		</div>
	</div>
	<div id="control" class="container">
		<div id="control-menu">
			<ul>
				<div id="control-title">Menu</div>
				<li class="control-content"><a href="controlWrite.php"><i class="iconfont">&#xe60c;</i>写文章</a></li>
				<li class="control-content"><a href="controlMessage.php"><i class="iconfont">&#xe60e;</i>个人信息</a></li>
				<li class="control-content" id="menu-manage"><a href="controlManage.php"><i class="iconfont">&#xe60a;</i>文章管理</a></li>
				<li class="control-content"><a href="controlCategory.php"><i class="iconfont">&#xe60b;</i>文章分类</a></li>
				<li class="control-content"><a href="controlPhotos.php"><i class="iconfont">&#xe60d;</i>相册管理</a></li>
				<li class="control-content"><a href="controlComment.php"><i class="iconfont">&#xe60f;</i>评论审核</a></li>
			</ul>
		</div>
		<div id="area-manage" class="control-area">
			<table>
	        <tr>
	            <th>编号</th>
	            <th>文章标题</th>
	            <th>文章内容</th>
	            <th>编辑文章</th>
	        </tr>
	        <?php 
	        	define('PAGE_SIZE', 10);
	        	
	        	@$current_page = $_GET['page'];
	        	
	        	//require_once('conn.php');
	        	require_once 'conn_db.php';
	        	$query = "select * from article";
	        	
	        	$result = $db->query($query);
	        	
	        	$num_result = $result->num_rows;
	        	
	        	$sum_page = (floor($num_result/PAGE_SIZE) == ($num_result/PAGE_SIZE)) ? floor($num_result/PAGE_SIZE) : floor($num_result/PAGE_SIZE)+1;
	        	
	        	if (isset($current_page)){
	        		if ($current_page <= 1){
	        			$current_page = 1;
	        		}
	        		elseif ($current_page >= $sum_page){
	        			$current_page = $sum_page;
	        		}
	        	}
	        	else{
	        		$current_page = 1;
	        	}
	        	
	        	$start_num = ($current_page - 1) * PAGE_SIZE;
	        	
	        	$query = "select * from article limit ".$start_num.", ".PAGE_SIZE;
	        	 
	        	$result = $db->query($query);
	        	
	        	while ($row = $result->fetch_assoc()){
	        ?>
	        	<tr>
	        		<td><?php echo $row['id']?></td>
	        		<td><?php echo $row['title']?></td>
	        		<td><?php echo $row['content']?></td>
	        		<td>
	                    <a href="articleEdit.php?id=<?php echo $row['id']?>">修改</a>
	                    <a href="articleDelete.php?id=<?php echo $row['id']?>">删除</a>
	                </td>
	        	</tr>
	        <?php 
	        	}
	        	
	        	$result->free();
	        	$db->close();
	        ?>
			</table>
			<div>
		        共<?php echo $sum_page?>页 |查到<?php echo $num_result;?>条记录
		        当前第<?php echo $current_page?>页|
		        <a href="controlManage.php?page=1">首页</a>
		        <a href="controlManage.php?page=<?php echo ($current_page-1)?>">|上一页</a>
		        <a href="controlManage.php?page=<?php echo ($current_page+1)?>">|下一页</a>
		        <a href="controlManage.php?page=<?php echo $sum_page?>">|末页</a>
		    </div>
		</div>
	</div>
</body>
</html>