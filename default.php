<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic -->
    	<meta charset="UTF-8" />
		<title>你有福 | 网络商城后台管理</title>	 
		<!-- Mobile Metas -->
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />	      		
		<!-- Vendor CSS-->
		<link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="../../assets/vendor/skycons/css/skycons.css" rel="stylesheet" />
		<link href="../../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
		<link href="../../assets/vendor/css/pace.preloader.css" rel="stylesheet" />		
		<!-- 主题 CSS -->
		<link href="../../assets/css/jquery.mmenu.css" rel="stylesheet" />		
		<!-- 页面 CSS -->		
		<link href="../../assets/css/style.css" rel="stylesheet" />
		<link href="../../assets/css/add-ons.min.css" rel="stylesheet" />		
		<!-- end: CSS file-->			
		<!-- 顶部Libs -->
		<script src="../../assets/plugins/modernizr/js/modernizr.js"></script>
		<!-- iframe 高度 -->
		<script type="text/javascript" language="javascript">   
			function iFrameHeight() {   
				// var ifm= document.getElementById("content");   
				// var subWeb = document.frames ? document.frames["content"].document : ifm.contentDocument;   
					// if(ifm != null && subWeb != null) {
					   // ifm.height = subWeb.body.scrollHeight;
					// }  
				var h = document.body.clientHeight;
				h -= 235;
				var temp = h+"px";
				var target = document.getElementById("content");
				target.style.height = temp;
			}   
		</script>
	</head>
	
	<body>
		<!-- 最顶部  页面右边 -->
		<div class="navbar" role="navigation">
			<div class="container-fluid container-nav">
				<!--隐藏左侧菜单按钮-->
				<ul class="nav navbar-nav navbar-actions navbar-left">
					<li class="visible-md visible-lg"><a href="#" id="main-menu-toggle"><i class="fa fa-th-large"></i></a></li>
					<li class="visible-xs visible-sm"><a href="#" id="sidebar-menu"><i class="fa fa-navicon"></i></a></li>			
				</ul>
				<!-- 右上角 消息提示 -->
				<div class="navbar-right">					
					<!-- Notifications
					<ul class="notifications hidden-xs">						
						<li>
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								<i class="fa fa-envelope"></i>
								<span class="badge">5</span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-header">
									<strong>新订单</strong>
								</li>
								<li class="avatar">
									<a href="page-inbox.html">
										<div><div class="point point-primary point-lg"></div>14258552214454525</div>
										<span><small>2016-06-25</small></span>							
									</a>
								</li>
								<li class="avatar">
									<a href="page-inbox.html">
										<div><div class="point point-primary point-lg"></div>14258552214454525</div>
										<span><small>2016-06-25</small></span>							
									</a>
								</li>
								<li class="avatar">
									<a href="page-inbox.html">
										<div><div class="point point-primary point-lg"></div>14258552214454525</div>
										<span><small>2016-06-25</small></span>							
									</a>
								</li>		
									
							</ul>
						</li>
					</ul>		 -->	
					
					<!-- 右上角 登陆-->
					<div class="userbox">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<!--
							<figure class="profile-picture hidden-xs">
								<img src="assets/img/avatar.jpg" class="img-circle" alt="" />
							</figure>
							-->
							<div class="profile-info">
								<span class="name"><!-- 显示姓名 --></span>
							</div>			
							<i class="fa custom-caret"></i>
						</a>
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="dropdown-menu-header bk-bg-white bk-margin-top-15">						
									<!--充当 padding-->							
								</li>
								<li>
									<a href="#"><i class="fa fa-wrench"></i> 设置</a>
								</li>
								<li>
									<a href="index.php?app=background&act=logout"><i class="fa fa-power-off"></i> 退出</a>
								</li>
							</ul>
						</div>						
					</div>
				</div>
			</div>		
		</div>
		
		<!-- 中间 -->
		<div class="container-fluid content">	
			<div class="row">
			<!--整体页面 右边-->
				<div class="sidebar">
					<div class="sidebar-collapse">
						<!-- 菜单顶部 Logo-->
						<div class="sidebar-header">
							<img src="../../assets/img/logo.png" class="img-responsive" alt="" />
						</div>
						<!-- 菜单导航 Menu-->
						<div class="sidebar-menu">						
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-sidebar">
									<li>
										<a href="javascript:void(0)" target='content'>
											<!--<span class="pull-right label label-danger">100</span>-->
											<i class="fa fa-envelope" aria-hidden="true"></i><span>订单管理</span>
											<ul class="nav nav-children">
												<li><a href="?app=offre" target='content'>订单列表</a></li>
												<li><a href="?app=service&act=offre" target='content'>服务订单</a></li>
											</ul>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" target='content'>
											<!--<span class="pull-right label label-danger">100</span>-->
											<i class="fa fa-envelope" aria-hidden="true"></i><span>商品管理</span>
											<ul class="nav nav-children">
												<li><a href="?app=produit&act=add" target='content'>商品添加</a></li>
												<li><a href="?app=produit&act=list" target='content'>商品列表</a></li>
											</ul>
										</a>
									</li>
                                    <li>
										<a href="javascript:void(0)" target='content'>
											<!--<span class="pull-right label label-danger">100</span>-->
											<i class="fa fa-envelope" aria-hidden="true"></i><span>积分兑换</span>
											<ul class="nav nav-children">
												<li><a href="?app=exchange&act=add" target='content'>添加商品</a></li>
												<li><a href="?app=exchange&act=produit_list" target='content'>商品列表</a></li>
												<li><a href="?app=exchange&act=change_list" target='content'>兑换列表</a></li>
											</ul>
										</a>
									</li>
                                    <li>
										<a href="javascript:void(0)" target='content'>
											<!--<span class="pull-right label label-danger">100</span>-->
											<i class="fa fa-envelope" aria-hidden="true"></i><span>统计</span>
											<ul class="nav nav-children">
												<li><a href="?app=statistic&act=invitation" target='content'>邀请统计</a></li>
                                                <li><a href="?app=statistic&act=fudou_offre" target='content'>福豆消费</a></li>
                                                <li><a href="?app=statistic&act=fudou_change" target='content'>福豆变化统计</a></li>
                                                <li><a href="?app=statistic&act=fudou" target='content'>福豆统计</a></li>
                                                <li><a href="?app=statistic&act=present" target='content'>签到统计</a></li>
											</ul>
										</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					<!-- 你有福logo Footer-->
					<div class="sidebar-footer">		
						<div class="panel-body text-center">								
							<div class="flag">
								<img src="../../assets/img/flags/USA.png" class="img-flags" alt="" />
							</div>
							<p>你有福网络商城后台管理</p>
						</div>						
					</div>
				</div>
						
				<!-- 右边主要内容 -->
				<div class="main " id="main">
					<!-- 地图 导航 -->
					<div class="page-header">
						<div class="pull-left">
							<ol class="breadcrumb visible-sm visible-md visible-lg">								
								<li><a href="index.html"><i class="icon fa fa-home"></i>Home</a></li>
								<li class="active"><i class="fa fa-laptop"></i>Dashboard</li>
							</ol>						
						</div>
						<div class="pull-right">
							<h2>你有福</h2>
						</div>					
					</div>
					<!--内容区域-->
					<iframe style="width:100%;"  scrolling="yes" marginheight="0" marginwidth="0" frameborder="0" id='content' name='content' src="" onload='iFrameHeight()'>&nbsp;</iframe>
				</div>
			</div>
		</div><!--/container-->
		
		<div class="clearfix"></div>		
		
		<!-- start: JavaScript-->
		<!-- Vendor JS-->				
		<script src="../../assets/vendor/js/jquery.min.js"></script>
		<script src="../../assets/vendor/js/jquery-2.1.1.min.js"></script>
		<script src="../../assets/vendor/js/jquery-migrate-1.2.1.min.js"></script>
		<script src="../../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="../../assets/vendor/skycons/js/skycons.js"></script>
		<script src="../../assets/vendor/js/pace.min.js"></script>
		<!-- 主要 JS -->		
		<script src="../../assets/js/jquery.mmenu.min.js"></script>
		<script src="../../assets/js/core.min.js"></script>
		<!-- 页面 JS -->
		<script src="../../assets/js/pages/index.js"></script>
	</body>
</html>