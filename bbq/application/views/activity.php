<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="BBQ">
	<title>烤天下酒吧烧烤加盟官网 酒吧文化烧烤领导者 </title>
	<meta name="keywords" content="烤天下,烤天下酒吧烧烤,烤天下加盟,烧烤加盟">
	<meta name="description" content="烤天下酒吧烧烤首创海盗主题酒吧烧烤，烧烤加盟请关注烤天下，在这里可以大快朵颐，在这里可以尽情放肆，喝酒吃肉，打劫社交，烤天下酒吧烧烤加盟，要味道还要腔调，烤天下加盟热线：4006099517">
	<link rel="shortcut icon" type="image/x-icon" href="img/icon/favicon.ico">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/hd/demo.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/css/hd/component.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('static/css/home.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('static/css/icon.css') ?>">
	<script src="<?php echo base_url('static/js/hd/modernizr.custom.js') ?>"></script>
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

	<script type="text/javascript" src="<?php echo base_url('static/js/jquery-1.8.3.min.js') ?>"></script>
	<style type="text/css">
		/* item-share */
		.share{position:relative;}
		.share dt{cursor:pointer;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;position:relative;z-index:99;}
		.share dd{position:absolute;left:0;top:29px;display:none; margin:0; padding:0; width:62px;}
		.share dd ul{padding:4px;width:104px;max-height:250px;overflow:auto;}
	</style>
	<script type="text/javascript">
        $(function(){
			/*============================
			 @item-share
			 ============================*/
            $(".share").each(function(){
                var s=$(this);
                var z=parseInt(s.css("z-index"));
                var dt=$(this).children("dt");
                var dd=$(this).children("dd");
                var _show=function(){dd.slideDown(200);dt.addClass("cur");s.css("z-index",z+1);};   //展开效果
                var _hide=function(){dd.slideUp(200);dt.removeClass("cur");s.css("z-index",z);};    //关闭效果
                dt.click(function(){dd.is(":hidden")?_show():_hide();});
                dd.find("a").click(function(){dt.html($(this).html());_hide();});     //选择效果（如需要传值，可自定义参数，在此处返回对应的“value”值 ）
                $("body").click(function(i){ !$(i.target).parents(".share").first().is(s) ? _hide():"";});
            })
        })
	</script>

</head>
<body>
<!-- Header -->
<?php echo $this->load->view("header"); ?>


<!-- activity -->
<section class="time-background">
	<div class="item-title">
		<h1>特色活动</h1>
		<h3>Featured display</h3>
	</div>
	<div id="grid-gallery" class="grid-gallery">
		<section class="grid-wrap">
			<ul class="grid">
				<li class="grid-sizer"></li>
				<!-- for Masonry column width -->
				<?php foreach($featured as $v){ ?>
				<li>
					<figure> <img src="<?php echo base_url($v['featured_photo']); ?>" alt="<?php echo $v['featured_photo']; ?>"/>
						<figcaption>
							<h3><?php echo $v['featured_title']; ?></h3>
							<p><?php echo $v['featured_time']; ?></p>
						</figcaption>
					</figure>
				</li>
				<?php } ?>

			</ul>
		</section>
		<!-- // grid-wrap -->

		<section class="slideshow">
			<ul>
				<?php foreach($featured as $v){ ?>
				<li>
					<figure>
						<figcaption>
							<h3><?php echo $v['featured_title']; ?></h3>
							<p class="time-tan " style="float:left"><?php echo $v['featured_time']; ?></p>
							<!-- 自定义分享 begin -->
							<dl class="item-share share">
								<dt><i class="item-share-icon">分享</i></dt>
								<dd>
									<div class="item-qq"></div>
									<div class="item-weibo"></div>
									<div class="item-weixin"></div>
								</dd>
							</dl>
								<!-- 自定义分享 End -->
						</figcaption>
						<img src="<?php echo base_url($v['featured_photo']); ?>" alt="<?php echo $v['featured_photo']; ?>" style="height:250px;"/>
						<figcaption>
							<p class="text-tan"><?php echo $v['featured_content']; ?></p>
						</figcaption>
					</figure>
				</li>
				<?php } ?>
			</ul>
			<nav> <span class="icon nav-prev"></span> <span class="icon nav-next"></span> <span class="icon nav-close"></span> </nav>
		</section>
		<!-- // slideshow -->
	</div>
</section>
<div class="dialog">
	<div class="dialog-inner">
		<div class="dialog-container">
			<div class="dialog-heading">
				<a class="close" href="javascript:web.dialog.close()">
					<span></span>
					<span></span>
				</a>
			</div>
			<div class="dialog-body">
				<div>
					<h1>万科北京绿色建筑公园游客中心</h1>
					<p>游客中心位于万科北京绿色建筑公园的入口处。该项目按照中国绿色建筑评价标准的三星级和英国绿色建筑评估标准（BREEAM）的最高级杰出级标准进行设计和建造。该项目从建筑全寿命周期的角度综合考虑材料利用、建筑能耗、水耗、污染、交通等影响环境的各种因素，尽可能减少建筑对环境的影响。项目优先采取被动式设计，最大程度实现自然采光和通风等；优化围护结构热工性能；使用高效的设备系统；使用创新的可再生能源，将地沟油转化为生物柴油供应CHP系统，最终实现了“循环经济”的理念。项目的设计有助于将“北京绿色建筑公园” 打造成为面向社会、面向公众的公益性教育展示场所、专业人士学习借鉴的示范基地和国际行业交流平台的理念。项目通过对绿色建筑工程和技术的示范、展示，使广大市民在休闲、参观和体验的同时，了解绿色建筑的科技含量和品质提升，培养公众自觉的节能减排意识。</p>
					<p>业主：万科<br>
						业态：展陈建筑<br>
						建筑设计：Bogle Architects<br>
						服务内容：BREEAM认证咨询</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="dialog-backdrop"></div>
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

<script src="<?php echo base_url('static/js/hd/imagesloaded.pkgd.min.js') ?>"></script>

<script src="<?php echo base_url('static/js/hd/masonry.pkgd.min.js') ?>"></script>

<script src="<?php echo base_url('static/js/hd/classie.js') ?>"></script>

<script src="<?php echo base_url('static/js/hd/cbpGridGallery.js') ?>"></script>

<script>

    new CBPGridGallery( document.getElementById( 'grid-gallery' ) );

</script>

<script src="<?php echo base_url('static/js/banner.js') ?>"></script>
<script src="<?php echo base_url('static/js/navbar.js') ?>"></script>
<script src="<?php echo base_url('static/js/web.core.js') ?>"></script>
<script src="<?php echo base_url('static/js/web.adtabs.js') ?>"></script>
<script src="<?php echo base_url('static/js/web.subnav.js') ?>"></script>
<script src="<?php echo base_url('static/js/web.ui.js') ?>"></script>
<script>
 $('.pc-nav-char').children('a').addClass("char-current");

</script>
</body>
</html>
