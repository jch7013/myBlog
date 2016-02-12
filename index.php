<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<title>myBlog</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="top-fix">
		<div class="container">
			<ul>
				<li class="title-content" id="left-icon"><a href=""><div>博客</div></a></li>
				<li class="title-content title-item"><a href="index.php">主页</a></li>
				<li class="title-content"><a href="pages/articles.php">文章</a></li>
				<li class="title-content"><a href="pages/photos.php">相册</a></li>
				<li class="title-content"><a href="pages/time.php">足迹</a></li>
				<li class="title-content"><a href="pages/personal.php">个人简介</a></li>
				<li class="title-content"><a href="pages/words.php">留言板</a></li>
			</ul>
			<ul id="mylink">
				<a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=t46Hg4KHjoWFhvfGxpnU2No" style="text-decoration:none;" target="_blank"><li class="iconfont">&#xe605;</li></a>
				<a href="https://github.com/proyang" target="_blank"><li class="iconfont">&#xe604;</li></a>
				<a href="https://www.zhihu.com/people/lei-zi-63-32" target="_blank"><li class="iconfont">&#xe602;</li></a>
				<a href="http://weibo.com/u/2205336312/" target="_blank"><li class="iconfont">&#xe601;</li></a>
				<a href="http://sighttp.qq.com/authd?IDKEY=421d7af4a2b3eb770398f7a4edb2868bb48edf41e368e446" target="_blank"><li class="iconfont">&#xe600;</li></a>
				<a href="pages/login.html"><li class="sign">登录</li></a>
			</ul>
		</div>
	</div>
	<div id="main">
		<div class="container">
			<div id="head-photo"><img src="img/head-photo.jpg" alt="头像"></div>
			<acticle id="myword">
<!-- 从数据库获取用户最新签名 -->
			<p>我们不停的翻弄着回忆,却再也找不回那时的自己,红尘一梦，不再追寻。—————无名</p>
			</acticle>
		</div>
		<div class="container">
			<h2>近期文章:</h2><br>
			<div id="bigbox">
				<?php
					require_once "phpServer/conn.php";
					$sql="select * from article ORDER BY time DESC limit 0,3 ";
					$re=mysqli_query($link,$sql);
					foreach ($re as $row) {
				?>
				<div class="smallbox">
					<article class="article-show">
						<h2><a href="pages/article-pages.php?id=<?php echo $row['id']?>"><?php echo $row['title'];?></a></h2>
		                <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo mb_substr($row['content'],0,180,'utf-8')."......";?></p>
			            <div class="article-foot">
				            <a href="phpServer/support.php?id=<?php echo $row['id']?>"><i class="iconfont">&#xe603;</i><span><?php echo $row['support'];?></span></a>
				            <i class="iconfont">&#xe606;</i><span><?php echo $row['comments'];?></span>
				            <i class="iconfont">&#xe608;</i><span>1</span>
				            <span class="artile-time"><?php echo $row['time'];?></span>			            
		                </div>
					</article>
				</div>
				<?php  };
					mysqli_close($link);
				?>
			</div>
		</div>
	</div>
	<div id="footer" class="container">
		<div id="footer-link">
			<ul>
				<li>常用链接：</li>
				<li><a href="http://www.cqupt.edu.cn/" target="_blank">重庆邮电大学</a></li>
				<li><a href="http://hongyan.cqupt.edu.cn/" target="_blank">红岩网校</a></li>
				<li><a href="http://36kr.com/" target="_blank">36氪</a></li>
				<li><a href="http://www.geekpark.net/" target="_blank">极客公园</a></li>
				<li><a href="http://fequan.com/" target="_blank">前端圈</a></li>
			</ul>
		</div>
		<p>© 2016 proYang&PeiLi</p>
	</div>
	<div id="goTop">
		<a class="jump-top"></a>
	</div>
	<script type="text/javascript" src="js/waterfall.js"></script>
</body>
</html>