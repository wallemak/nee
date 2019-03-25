<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="BBQ">
	<title>招牌美食-联系我们-烤天下酒吧烧烤加盟官网 酒吧文化烧烤领导者 </title>
	<meta name="keywords" content="烤天下,烤天下酒吧烧烤,烤天下加盟,烧烤加盟">
	<meta name="description" content="烤天下酒吧烧烤首创海盗主题酒吧烧烤，烧烤加盟请关注烤天下，在这里可以大快朵颐，在这里可以尽情放肆，喝酒吃肉，打劫社交，烤天下酒吧烧烤加盟，要味道还要腔调，烤天下加盟热线：4006099517">
	<link rel="shortcut icon" type="image/x-icon" href="img/icon/favicon.ico">
	<link rel="stylesheet" href="<?php echo base_url('static/css/home.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('static/css/icon.css') ?>">
	<!--[if lte IE 8]>
	<link rel="stylesheet" href="css/iehack.css">
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "//hm.baidu.com/hm.js?05e4a554b37e54a1436450128ce7173c";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
	</script>
</head>
<body>
<!-- Header -->
<?php echo $this->load->view("header"); ?>


<!-- Product -->
<section id="Taste" class="Talents" style="margin-bottom:0;">
	<div class="container">
		<div class="item-title">
			<h1>招牌美食</h1>
			<h3>Signature food</h3>
		</div>
		<div class="row">
			<?php foreach($food as $v){ ?>
			<div class="col-3">
				<div class="item-food item-food-1" >
					<a href="javascript:void(0)" target="dialog1" style="background:url(<?php echo base_url("$v[food_photo]") ?>) center no-repeat;">
						<h3><?php echo $v['food_name'] ?></h3>
					</a>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>


<!-- Footer -->
<footer id="footer">
	<div class="container">
		<div class="copy">©AUI 素材网 京ICP备15006025号-1
		</div>
		<div class="copy">
			Copyright © 2012-2016 www.a-ui.cn <span>地址：北京市海淀区北三环西路43号中航广场6层</span>
		</div>
	</div>
</footer>
<div class="dialog">

	<div class="dialog-inner">
		<div class="dialog-heading">
			<a class="close" href="javascript:web.dialog.close()">
				<span></span>
				<span></span>
			</a>
		</div>
		<!-- <div class="dialog-container">

			<div class="dialog-body">
				<div class="dialog-text">
					<h1>泰椒炒饭和海鲜炒饭</h1>
					<img src="img/food/f-t.jpg" alt="">
					<p>泰椒a炒饭</p>
					<p>泰式甜辣椒酱炒饭的做法  所有食材切碎，虾仁去虾线洗净虾仁切小块料酒白胡椒粉腌渍10分钟鸡蛋炒熟少许蒜末小火炒香，下入虾仁炒熟备用锅里重新放少许油，放入剩下的蒜末炒香按个人口味倒入李锦记甜辣酱炒香。</p>
					<p>海鲜炒饭</p>
					<p>海鲜炒饭是由白饭，鸡蛋，葱等材料制成的一道炒饭，不同的海鲜搭配起来就能呈现出不同的海鲜炒饭。 虾营养丰富，含蛋白质是鱼、蛋、奶的几倍到几十倍；还含有丰富的钾、碘、镁、磷等矿物质及维生素A、氨茶碱等成分，且其肉质松软，易消化，对身体虚弱以及病后需要调养的人是极好的食物。</p>
				</div>
			</div>
		</div> -->
	</div>
</div>
<div class="dialog-backdrop"></div>
<script src="<?php echo base_url('static/js/jquery-1.8.3.min.js') ?>"></script>
<script src="<?php echo base_url('static/js/banner.js') ?>"></script>
<script src="<?php echo base_url('static/js/navbar.js') ?>"></script>
<script src="<?php echo base_url('static/js/web.core.js') ?>"></script>
<script src="<?php echo base_url('static/js/web.adtabs.js') ?>"></script>
<script src="<?php echo base_url('static/js/web.subnav.js') ?>"></script>
<script src="<?php echo base_url('static/js/web.ui.js') ?>"></script>
<script>
 $('.pc-nav-food').children('a').addClass("food-current");

</script>
</body>
</html>
