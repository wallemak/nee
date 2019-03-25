
<header id="header" class="">
	<div class="container">
		<div class="global-nav">
			<button class="navbar-toggle">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="brand" href="<?php echo site_url('bbq/index'); ?>">烤天下</a>
			<nav class="navbar">
				<ul class="nav" id="navv">
					<?php foreach($nav as $k=>$v){ ?>
					<li class="pc-nav-<?php echo $arr[$k] ?>">
						
						<a href="<?php echo site_url('bbq/'.$v['nav_url']) ?>"><?php echo $v['nav_name']; ?></a>
					</li>
					<?php $i=$i+1;} ?>
					<!-- <li class="pc-nav-food">
						<a href="food.html">招牌美食</a>
					</li>
					<li class="pc-nav-char">
						<a href="activity.html">特色活动</a>
					</li>
					<li class="pc-nav-join">
						<a href="join.html">招商加盟</a>
					</li>
					<li class="pc-nav-ente">
						<a href="profile.html">企业概况</a>
					</li>
					<li class="pc-nav-menn">
						<a href="about.html">联系我们</a>
					</li> -->
				</ul>
			</nav>
		</div>
	</div>
</header>