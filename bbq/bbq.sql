-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 09 月 02 日 20:20
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `bbq`
--

-- --------------------------------------------------------

--
-- 表的结构 `bbq_banner`
--

CREATE TABLE IF NOT EXISTS `bbq_banner` (
  `banner_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `banner_name` varchar(255) NOT NULL COMMENT '名称',
  `banner_photo` varchar(255) NOT NULL COMMENT '图片',
  `banner_addtime` int(11) unsigned NOT NULL COMMENT '添加时间',
  `banner_ord` tinyint(3) NOT NULL COMMENT '排序',
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='广告图' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `bbq_banner`
--

INSERT INTO `bbq_banner` (`banner_id`, `banner_name`, `banner_photo`, `banner_addtime`, `banner_ord`) VALUES
(1, 'aaaa', './upload/20180902231505.jpg', 23333, 1),
(2, '2222', './upload/20180902231519.jpg', 222, 2),
(3, '33333', './upload/20180902231349.jpg', 1535901229, 3),
(4, '444444', './upload/20180902231358.jpg', 1535901238, 127);

-- --------------------------------------------------------

--
-- 表的结构 `bbq_brand`
--

CREATE TABLE IF NOT EXISTS `bbq_brand` (
  `brand_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `brand_title` varchar(255) NOT NULL COMMENT '品牌标题',
  `brand_content` text NOT NULL COMMENT '品牌内容',
  `brand_photo` varchar(255) DEFAULT NULL COMMENT '品牌图片',
  `brand_ord` tinyint(3) NOT NULL COMMENT '品牌排序',
  `type_id` int(11) unsigned NOT NULL COMMENT '分类ID',
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='品牌表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bbq_brand_type`
--

CREATE TABLE IF NOT EXISTS `bbq_brand_type` (
  `type_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `type_name` varchar(255) NOT NULL COMMENT '分类名称',
  `type_ord` tinyint(3) NOT NULL COMMENT '分类排序',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='品牌分类表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bbq_company`
--

CREATE TABLE IF NOT EXISTS `bbq_company` (
  `company_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company_title` varchar(255) NOT NULL,
  `company_con` text NOT NULL,
  `company_addtime` int(11) unsigned NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='企业概况' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `bbq_company`
--

INSERT INTO `bbq_company` (`company_id`, `company_title`, `company_con`, `company_addtime`) VALUES
(1, '企业概况', '烤天下时代（北京）餐饮连锁管理有限公司，是一家专业型、综合型的餐饮品牌孵化平台，拥有强大的技术实力和人脉资源。公司拥有较强的综合实力，集品牌经营、管理、设备研发、餐饮管理、培训、服务、美食开发、食品机械研发、加工、物流于一体，经过多年积累，完成了从幕后到台前、从单一化到多元化、从技术开发到品牌运作的升级。自创立之初，烤天下时代就坚持以技术研发为核心，专注于菜式创新和技术创新，为企业发展打下坚实的地基。技术上的成就，成为今天中创永信的核心竞争力，也正因为掌握了餐饮中最基础、最核心的产品要素，所以烤天下推出的每一个产品都能得到市场的接受。下辖餐饮开发公司、餐饮投资管理公司、创新技术研发中心、中创永信餐饮商学院、品牌孵化研究室，形成了一个“中式创新、中西结合”的餐饮品牌创新之路，成为现代餐饮品牌孵化价值典范。\r\n\r\n在多年的市场运作中，取得令行业侧目的成绩，随着企业的发展，烤天下时代承担起更多的责任与使命，2013年8月上级管理单位中创永信集团筹办了“中创永信餐饮商学院”，打造出行业内最大的餐饮人才培养基地，不但为行业输送更多的专业人才，同时也能促使合作伙伴得到快速成长。在品牌运营上，烤天下时代（北京）餐饮连锁管理有限公司坚持低风险、低成本的连锁运用模式，通过对优势资源的拆分与整合，不断提升品牌生命力，降低市场竞争阻力，实现小资金运作的新餐饮模式，不但使品牌获得良性发展，也让越来越多的投资群体受益其中。\r\n\r\n在多年的市场运作中，取得令行业侧目的成绩，随着企业的发展，烤天下时代承担起更多的责任与使命，2013年8月上级管理单位中创永信集团筹办了“中创永信餐饮商学院”，打造出行业内最大的餐饮人才培养基地，不但为行业输送更多的专业人才，同时也能促使合作伙伴得到快速成长。在品牌运营上，烤天下时代（北京）餐饮连锁管理有限公司坚持低风险、低成本的连锁运用模式，通过对优势资源的拆分与整合，不断提升品牌生命力，降低市场竞争阻力，实现小资金运作的新餐饮模式，不但使品牌获得良性发展，也让越来越多的投资群体受益其中。', 2333333333);

-- --------------------------------------------------------

--
-- 表的结构 `bbq_config`
--

CREATE TABLE IF NOT EXISTS `bbq_config` (
  `config_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `config_title` varchar(100) NOT NULL COMMENT '标题',
  `config_con` varchar(255) NOT NULL COMMENT '内容',
  `config_ord` tinyint(3) unsigned NOT NULL COMMENT '排序',
  PRIMARY KEY (`config_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='网站配置表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bbq_contact`
--

CREATE TABLE IF NOT EXISTS `bbq_contact` (
  `contact_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `contact_title` varchar(255) NOT NULL COMMENT '联系名称',
  `contact_add` varchar(255) NOT NULL COMMENT '联系地址',
  `contact_phone` varchar(100) NOT NULL COMMENT '联系电话',
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='联系我们表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bbq_featured`
--

CREATE TABLE IF NOT EXISTS `bbq_featured` (
  `featured_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '特色ID',
  `featured_title` varchar(255) NOT NULL COMMENT '特色标题',
  `featured_photo` varchar(255) NOT NULL,
  `featured_content` text NOT NULL COMMENT '特色内容',
  `featured_time` varchar(100) NOT NULL COMMENT '活动时间',
  `featured_ord` tinyint(4) NOT NULL COMMENT '特色排序',
  `featured_addtime` int(11) unsigned NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`featured_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='特色表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `bbq_featured`
--

INSERT INTO `bbq_featured` (`featured_id`, `featured_title`, `featured_photo`, `featured_content`, `featured_time`, `featured_ord`, `featured_addtime`) VALUES
(1, '奶瓶喝啤酒', './upload/activity/20180903003239.jpg', '摇滚乐源于美国。直到今天，美国摇滚乐仍然受到青年人的喜爱。摇滚乐是由一种称为“布鲁斯”的爵士乐演变而来的。摇滚乐又称摇摆舞音乐或摇摆乐、滚石乐等，是当今西方世界极其盛行的流行音乐。\r\n２０世纪３０年代至５０年代，美国的一些黑人乐师在演奏仅流行于黑人地区的“布鲁斯”时，融会了黑人教堂音乐、西部乡土音乐及民间音乐的演奏技巧和风格，综合而成了摇摆乐。这种音乐是一种非常活跃的两拍节奏的音乐，节奏强烈、音响丰富，其演奏乐器和歌唱方面与其他传统的流行音乐也不一样。', '2018-09-13', 1, 0),
(2, '练就肺活量', './upload/activity/20180903003303.jpg', '摇滚乐源于美国。直到今天，美国摇滚乐仍然受到青年人的喜爱。摇滚乐是由一种称为“布鲁斯”的爵士乐演变而来的。摇滚乐又称摇摆舞音乐或摇摆乐、滚石乐等，是当今西方世界极其盛行的流行音乐。\r\n２０世纪３０年代至５０年代，美国的一些黑人乐师在演奏仅流行于黑人地区的“布鲁斯”时，融会了黑人教堂音乐、西部乡土音乐及民间音乐的演奏技巧和风格，综合而成了摇摆乐。这种音乐是一种非常活跃的两拍节奏的音乐，节奏强烈、音响丰富，其演奏乐器和歌唱方面与其他传统的流行音乐也不一样。', '2018-09-07', 2, 0),
(3, '萤火虫之夜', './upload/activity/20180903003537.jpg', '摇滚乐源于美国。直到今天，美国摇滚乐仍然受到青年人的喜爱。摇滚乐是由一种称为“布鲁斯”的爵士乐演变而来的。摇滚乐又称摇摆舞音乐或摇摆乐、滚石乐等，是当今西方世界极其盛行的流行音乐。\r\n２０世纪３０年代至５０年代，美国的一些黑人乐师在演奏仅流行于黑人地区的“布鲁斯”时，融会了黑人教堂音乐、西部乡土音乐及民间音乐的演奏技巧和风格，综合而成了摇摆乐。这种音乐是一种非常活跃的两拍节奏的音乐，节奏强烈、音响丰富，其演奏乐器和歌唱方面与其他传统的流行音乐也不一样。', '2018-09-21', 3, 0),
(4, '比基尼派对', './upload/activity/20180903003845.jpg', '摇滚乐源于美国。直到今天，美国摇滚乐仍然受到青年人的喜爱。摇滚乐是由一种称为“布鲁斯”的爵士乐演变而来的。摇滚乐又称摇摆舞音乐或摇摆乐、滚石乐等，是当今西方世界极其盛行的流行音乐。\r\n２０世纪３０年代至５０年代，美国的一些黑人乐师在演奏仅流行于黑人地区的“布鲁斯”时，融会了黑人教堂音乐、西部乡土音乐及民间音乐的演奏技巧和风格，综合而成了摇摆乐。这种音乐是一种非常活跃的两拍节奏的音乐，节奏强烈、音响丰富，其演奏乐器和歌唱方面与其他传统的流行音乐也不一样。', '2018-09-29', 4, 1535906325);

-- --------------------------------------------------------

--
-- 表的结构 `bbq_food`
--

CREATE TABLE IF NOT EXISTS `bbq_food` (
  `food_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '食物ID',
  `food_name` varchar(255) NOT NULL COMMENT '食物名称',
  `food_photo` varchar(255) NOT NULL COMMENT '食物图片',
  `food_int` text NOT NULL COMMENT '食物介绍',
  `food_ord` tinyint(3) unsigned NOT NULL COMMENT '食物排序',
  `food_addtime` int(11) unsigned NOT NULL,
  PRIMARY KEY (`food_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='食物表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `bbq_food`
--

INSERT INTO `bbq_food` (`food_id`, `food_name`, `food_photo`, `food_int`, `food_ord`, `food_addtime`) VALUES
(1, '123123123', './upload/food/20180902234951.jpg', '123123', 1, 1535903391),
(2, '泰椒炒饭和海鲜炒饭', './upload/food/20180902235135.jpg', '泰椒a炒饭\r\n泰式甜辣椒酱炒饭的做法 所有食材切碎，虾仁去虾线洗净虾仁切小块料酒白胡椒粉腌渍10分钟鸡蛋炒熟少许蒜末小火炒香，下入虾仁炒熟备用锅里重新放少许油，放入剩下的蒜末炒香按个人口味倒入李锦记甜辣酱炒香。\r\n海鲜炒饭\r\n海鲜炒饭是由白饭，鸡蛋，葱等材料制成的一道炒饭，不同的海鲜搭配起来就能呈现出不同的海鲜炒饭。 虾营养丰富，含蛋白质是鱼、蛋、奶的几倍到几十倍；还含有丰富的钾、碘、镁、磷等矿物质及维生素A、氨茶碱等成分，且其肉质松软，易消化，对身体虚弱以及病后需要调养的人是极好的食物。', 1, 1535903495),
(3, '香辣鸡翅', './upload/food/20180902235245.jpg', '香辣鸡翅香辣鸡翅香辣鸡翅香辣鸡翅香辣鸡翅香辣鸡翅香辣鸡翅香辣鸡翅香辣鸡翅香辣鸡翅香辣鸡翅香辣鸡翅香辣鸡翅香辣鸡翅香辣鸡翅香辣鸡翅香辣鸡翅香辣鸡翅香辣鸡翅香辣鸡翅香辣鸡翅', 0, 1535903565),
(4, '秋刀鱼', './upload/food/20180902235634.jpg', '秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼秋刀鱼', 1, 1535903794),
(5, '烤羊排', './upload/food/20180903001414.jpg', '烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排烤羊排', 1, 1535904571);

-- --------------------------------------------------------

--
-- 表的结构 `bbq_join`
--

CREATE TABLE IF NOT EXISTS `bbq_join` (
  `join_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `join_type` varchar(255) NOT NULL COMMENT '加盟类型',
  `join_cost` int(11) unsigned NOT NULL COMMENT '加盟费用',
  `join_managecost` int(11) unsigned NOT NULL COMMENT '管理费',
  `join_acr` int(11) unsigned NOT NULL COMMENT '建议面积',
  PRIMARY KEY (`join_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='加盟表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bbq_mem`
--

CREATE TABLE IF NOT EXISTS `bbq_mem` (
  `mem_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `mem_time` varchar(100) NOT NULL COMMENT '时间',
  `mem_con` varchar(100) NOT NULL COMMENT '内容',
  PRIMARY KEY (`mem_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='大事记表' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `bbq_mem`
--

INSERT INTO `bbq_mem` (`mem_id`, `mem_time`, `mem_con`) VALUES
(1, '2009', '烤天下品牌创立'),
(2, '2010', '烤天下品牌完成商务部特许备案'),
(3, '2010－11-18', '烤天下品牌完成商务部特许备案'),
(4, '2011', '2011－10-21'),
(5, '2011－10-21', '烤天下商标注册成功'),
(6, '2015', '全国运营40个加盟店'),
(7, '2016', '全国运营加盟店数量100+');

-- --------------------------------------------------------

--
-- 表的结构 `bbq_nav`
--

CREATE TABLE IF NOT EXISTS `bbq_nav` (
  `nav_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `nav_name` varchar(255) NOT NULL COMMENT '导航名称',
  `nav_url` varchar(255) NOT NULL COMMENT '导航链接',
  PRIMARY KEY (`nav_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='导航' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `bbq_nav`
--

INSERT INTO `bbq_nav` (`nav_id`, `nav_name`, `nav_url`) VALUES
(1, '首页', 'index'),
(2, '招牌美食', 'food'),
(3, '特色活动', 'activity'),
(4, '招商加盟', 'join'),
(5, '企业概况', 'profile'),
(6, '联系我们', 'about');

-- --------------------------------------------------------

--
-- 表的结构 `bbq_new`
--

CREATE TABLE IF NOT EXISTS `bbq_new` (
  `new_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `new_title` varchar(255) NOT NULL COMMENT '标题',
  `new_con` text NOT NULL COMMENT '内容',
  `new_addtime` varchar(100) NOT NULL COMMENT '添加时间',
  `new_photo` varchar(255) NOT NULL COMMENT '图片',
  `new_ord` tinyint(3) unsigned NOT NULL COMMENT '排序',
  PRIMARY KEY (`new_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='新闻表' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `bbq_new`
--

INSERT INTO `bbq_new` (`new_id`, `new_title`, `new_con`, `new_addtime`, `new_photo`, `new_ord`) VALUES
(1, '烤天下王牌菜出，丹麦生蚝告急1', '丹麦最近有点忧伤，丹麦驻华大使馆发布了一条微博，声称丹麦的海滩被太平洋生蚝攻陷了。这些没有天敌的生蚝在海域里无忧无虑的生长着，密密麻麻布满海岸线，想要下海游泳，不好意思，您得踩着生蚝们才能入水。', '2018-09-20', './upload/new/20180903025907.jpg', 1),
(2, '烤天下——此', '最近烧烤界出现了一个神传说，据说四海八荒的人都闻香赶来！究竟谁这么大的魅力？真相只有一个，就是这家烤天下酒吧文化烧烤！', '2018-09-25', './upload/new/20180903030025.jpg', 1),
(3, '酒吧文化烧烤如何占领朋友圈？', ' 在互联网+时代，线上线下那堵墙也变得不存在了，做营销讲究的是触类旁通、四两拨千斤，每一次布局都能实现最大化的效益，不管是做虚拟APP还是线下实体经济', '2018-09-13', './upload/new/20180903030619.jpg', 1),
(4, '烤天下王牌菜出，丹麦生蚝告急', '丹麦最近有点忧伤，丹麦驻华大使馆发布了一条微博，声称丹麦的海滩被太平洋生蚝攻陷了。这些没有天敌的生蚝在海域里无忧无虑的生长着，密密麻麻布满海岸线，想要下海游泳，不好意思，您得踩着生蚝们才能入水。', '2018-09-13', './upload/new/20180903030726.jpg', 1),
(5, '烤天下王牌菜出，丹麦生蚝告急', '丹麦最近有点忧伤，丹麦驻华大使馆发布了一条微博，声称丹麦的海滩被太平洋生蚝攻陷了。这些没有天敌的生蚝在海域里无忧无虑的生长着，密密麻麻布满海岸线，想要下海游泳，不好意思，您得踩着生蚝们才能入水。', '2018-09-19', './upload/new/20180903030743.jpg', 2),
(6, '烤天下王牌菜出，丹麦生蚝告急', '丹麦最近有点忧伤，丹麦驻华大使馆发布了一条微博，声称丹麦的海滩被太平洋生蚝攻陷了。这些没有天敌的生蚝在海域里无忧无虑的生长着，密密麻麻布满海岸线，想要下海游泳，不好意思，您得踩着生蚝们才能入水。', '2018-09-08', './upload/new/20180903030803.jpg', 1),
(7, '我们的初心，就是让创业者们成功', '在风起云涌的餐饮江湖，烤天下异军突起，不仅凭借强势的酒吧烧烤文化刷新了烧烤行业的标准，而且独有的“空投式创业系统”也让烤天下的加盟代理商们在新式餐饮时代里掘到了一桶金。在这个万众创业的时代', '2018-09-28', './upload/new/20180903030949.jpg', 2);

-- --------------------------------------------------------

--
-- 表的结构 `bbq_page`
--

CREATE TABLE IF NOT EXISTS `bbq_page` (
  `page_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `page_title` varchar(255) NOT NULL COMMENT '标题',
  `page_con` text NOT NULL COMMENT '内容',
  `page_photo` varchar(255) NOT NULL COMMENT '图片',
  `page_ord` tinyint(3) NOT NULL COMMENT '排序',
  PRIMARY KEY (`page_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='单页表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bbq_show`
--

CREATE TABLE IF NOT EXISTS `bbq_show` (
  `show_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `show_title` varchar(100) NOT NULL,
  `show_con` text NOT NULL,
  PRIMARY KEY (`show_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='展示表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `bbq_show`
--

INSERT INTO `bbq_show` (`show_id`, `show_title`, `show_con`) VALUES
(1, '音乐', '啤酒让人麻醉，音乐让人清醒，摇摆灯光深 夜美味，低吟浅唱亦或是引亢高歌。手持啤酒，碌着烧烤，一起哼唱，充分释放'),
(2, '啤酒', '音乐和啤酒就是绝配，搭配天生的华尔兹舞步现场氛围快速升温，让您体验一样与众不同的烧烤盛宴，手持啤酒，碌着烧烤'),
(3, '聚会', '音乐和啤酒就是绝配，搭配天生的华尔兹舞步现场氛围快速升温，让您体验一样与众不同的烧烤盛宴，手持啤酒，碌着烧烤');

-- --------------------------------------------------------

--
-- 表的结构 `bbq_support`
--

CREATE TABLE IF NOT EXISTS `bbq_support` (
  `support_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `support_title` varchar(255) NOT NULL,
  `support_con` text NOT NULL,
  `support_money` int(11) unsigned NOT NULL,
  `support_ord` int(11) unsigned NOT NULL,
  PRIMARY KEY (`support_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='加盟支持' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `bbq_support`
--

INSERT INTO `bbq_support` (`support_id`, `support_title`, `support_con`, `support_money`, `support_ord`) VALUES
(1, '老促会创业大礼包', '前二十家签约客户可申请老促会提供的30000元创业扶持大礼包\r\n\r\n', 30000, 1),
(2, '老促会创业大礼包', '前二十家签约客户可申请老促会提供的30000元创业扶持大礼包', 30000, 1),
(3, '老促会创业大礼包', '前二十家签约客户可申请老促会提供的30000元创业扶持大礼包', 30000, 1),
(4, '老促会创业大礼包', '前二十家签约客户可申请老促会提供的30000元创业扶持大礼包', 30000, 1),
(5, '老促会创业大礼包', '前二十家签约客户可申请老促会提供的30000元创业扶持大礼包', 30000, 1),
(6, '老促会创业大礼包', '前二十家签约客户可申请老促会提供的30000元创业扶持大礼包', 30000, 1),
(7, '老促会创业大礼包', '前二十家签约客户可申请老促会提供的30000元创业扶持大礼包', 30000, 1),
(8, '老促会创业大礼包', '前二十家签约客户可申请老促会提供的30000元创业扶持大礼包', 30000, 1);

-- --------------------------------------------------------

--
-- 表的结构 `bbq_tw`
--

CREATE TABLE IF NOT EXISTS `bbq_tw` (
  `tw_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `tw_name` varchar(100) NOT NULL COMMENT '岗位名称',
  `tw_money` int(11) unsigned NOT NULL COMMENT '月薪',
  `tw_place` varchar(100) NOT NULL COMMENT '工作地点',
  `tw_number` varchar(100) NOT NULL COMMENT '人数',
  `tw_type` varchar(100) NOT NULL COMMENT '类型',
  `tw_duties` text NOT NULL COMMENT '岗位职责',
  `tw_demand` text NOT NULL COMMENT '要求',
  `tw_ord` tinyint(3) NOT NULL COMMENT '排序',
  PRIMARY KEY (`tw_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='招聘表' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
