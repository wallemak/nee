<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Blog Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/admin/lib/bootstrap/css/bootstrap.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/admin/stylesheets/theme.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('static/admin/lib/font-awesome/css/font-awesome.css');?>">
    <script src="<?php echo base_url('static/admin/lib/jquery-1.7.2.min.js');?>" type="text/javascript"></script>

    <!-- Demo page code -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>
  </head>
  <body class=""> 
    
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    <li>
                        <a href="#" role="button">
                            <i class="icon-user"></i><?php $this->input->cookie('admin_name'); ?>
                        </a>
                    </li>
                    <li><a href="<?php echo site_url('admin/login/logout'); ?>" class="hidden-phone visible-tablet visible-desktop" role="button">Logout</a></li>
                </ul>
                <a class="brand" href="index.html"><span class="first">Blog</span> <span class="second">Admin</span></a>
        </div>
    </div>
    
    <div class="sidebar-nav">
        <a href="<?php echo site_url("admin/bbq/index")?>" class="nav-header"><i class="icon-dashboard"></i>首页</a>
		<a href="#dashboard-menu1" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>后台管理</a>
        <ul id="dashboard-menu1" class="nav nav-list collapse in">
            <li><a href="<?php echo site_url("admin/banner")?>">广告列表</a></li>
            <li><a href="<?php echo site_url("admin/food")?>">美食列表</a></li>
            <li><a href="<?php echo site_url("admin/featured")?>">活动列表</a></li>
            <li><a href="<?php echo site_url("admin/show")?>">展示列表</a></li>
            <li><a href="<?php echo site_url("admin/news")?>">新闻列表</a></li>
        </ul>
      
    </div>