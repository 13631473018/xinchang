<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> -->
	<title>Document</title>
	<link rel="stylesheet" href="/css/index.css" type="text/css">
	<link rel="stylesheet" href="/css/reset.css" type="text/css">
	<link rel="stylesheet" href="/css/public.css" type="text/css">
	<!-- include jQuery -->
	<script type="text/javascript" src="/js//jquery.min.js"></script>
	<!-- for dragging/swiping/pinching, include Hammer.js -->
	<script type="text/javascript" src="/js//hammer.min.js"></script>
	<!-- for scaling UI buttons (for wide websites on small screens), include FlameViewportScale -->
	<script type="text/javascript" language="javascript" src="/js/FlameViewportScale.js"></script>
	<!-- include Tos "R"Us -->
	<script type="text/javascript" language="javascript" src="/js/jquery.tosrus.min.all.js"></script>
	<link type="text/css" media="all" rel="stylesheet" href="/css/jquery.tosrus.all.css" />
	<!-- fire the plugin onDocumentReady -->
	<script type="text/javascript" language="javascript">
	jQuery(function($) {
	    //	Add a custom filter to recognize images from lorempixel (that don't end with ".jpg" or something similar)
	    $.tosrus.defaults.media.image = {
	        filterAnchors: function($anchor) {
	            return $anchor.attr('href').indexOf('lorempixel.com') > -1;
	        }
	    };

	    $('#example-1 a').tosrus({
	        buttons: 'inline',
	        pagination: {
	            add: true,
	            type: 'thumbnails'
	        }
	    });

	    $('#example-2 a').tosrus({
	        pagination: {
	            add: true
	        },
	        caption: {
	            add: true
	        },
	        slides: {
	            scale: 'fill'
	        }
	    });

	    $('#example-3 a').tosrus();

	    $('#example-4').tosrus({
	        infinite: true,
	        slides: {
	            visible: 3
	        }
	    });

	    $('#example-5').tosrus({
	        buttons: false,
	        pagination: {
	            add: true
	        },
	        slides: {
	            scale: 'fill'
	        }
	    });

	});
	</script>
	<!-- CSS for this demo page -->
	<style type="text/css" media="all">
	html, body{padding: 0;margin: 0;height: 100%;}
	body{background-color: #eee;font-family: Arial, Helvetica, Verdana;color: #666;}
	h1, h2, h3, h4, h5, h6{color: #333;}
	a, a:link, a:active, a:visited{color: #666;}
	a:hover{color: #000;}
	hr{margin: 75px -20px;height: 0;padding: 0;border: 0;border-top: 1px solid #ccc;}
	pre{border-left: 5px solid #ccc;width: 100%;padding: 10px 0 10px 20px;overflow: auto;}
	#wrapper{background-color: #fff;width: 70%;min-width: 675px;padding: 0px 50px 0px 50px;margin: 0 auto;border: 1px solid #ccc;box-shadow: 0 0 5px #ccc;}
	#intro p{font-size: 18px;line-height: 24px;}
	.thumbs, .gallery, .links, .slider{border-top: 1px solid #ccc;border-bottom: 1px solid #ccc;background: #eee;margin: 20px -50px;}
	.thumbs{padding: 10px 30px 30px 50px;text-align: center;}
	.thumbs:after{content: " ";display: block;clear: both;}
	.thumbs a{display: inline-block;margin: 20px 20px 0 0;}
	thumbs img{width: 130px;height: 130px;}
	.thumbs img, .gallery img{border: 1px solid #ccc;background: #fff;padding: 9px;}
	.thumbs a:hover img{border-color: #999;}
	.gallery{height: 300px;padding: 30px 0;}
	.slider{height: 475px;}
	.links{padding: 30px 50px;}
	.links a{line-height: 30px;}
	.hidden{display: none;}
	</style>
	<script src="/js/jquery-1.12.1.min.js"></script>
</head>
<body>
<!-- 头部开始 -->
	<div class="wrap">
		<!-- logo  -->
		<div class="logo-wrap">
			<img src="/images/logo.jpg" alt="新昌logo" width="200">
		</div>
		<!-- nav start -->
		<div class="nav">
			<ul class="nav-list clearfix">
				<li>
					<a href="###">Home</a>
					<ul class="nav-list-sub">
						<li><a href="###">XXXXXXX</a></li>
						<li><a href="###">XXXXXXXXXXx</a></li>
						<li><a href="###">XXXXX</a></li>
					</ul>
				</li>
				<li>
					<a href="###">About</a>
					<ul class="nav-list-sub">
						<li><a href="###">XXXXXXX</a></li>
						<li><a href="###">XXXXXXXXXXx</a></li>
						<li><a href="###">XXXXX</a></li>
					</ul>
					</li>
				<li>
					<a href="###">Corporate</a>
					<ul class="nav-list-sub">
						<li><a href="###">XXXXXXX</a></li>
						<li><a href="###">XXXXXXXXXXx</a></li>
						<li><a href="###">XXXXX</a></li>
					</ul>
				</li>
				<li>
					<a href="###">Private</a>
					<ul class="nav-list-sub">
						<li><a href="###">XXXXXXX</a></li>
						<li><a href="###">XXXXXXXXXXx</a></li>
						<li><a href="###">XXXXX</a></li>
					</ul>
				</li>
				<li>
					<a href="###">Excellence</a>
					<ul class="nav-list-sub">
						<li><a href="###">XXXXXXX</a></li>
						<li><a href="###">XXXXXXXXXXx</a></li>
						<li><a href="###">XXXXX</a></li>
					</ul>
				</li>
				<li>
					<a href="###">Store</a>
					<ul class="nav-list-sub">
						<li><a href="###">XXXXXXX</a></li>
						<li><a href="###">XXXXXXXXXXx</a></li>
						<li><a href="###">XXXXX</a></li>
					</ul>
				</li>
				<li>
					<a href="###">Contacts</a>
					<ul class="nav-list-sub">
						<li><a href="###">XXXXXXX</a></li>
						<li><a href="###">XXXXXXXXXXx</a></li>
						<li><a href="###">XXXXX</a></li>
					</ul>
				</li>
				<li class="nav-list-last">
					<a href="">MyProject</a>
					<ul class="nav-list-sub">
						<li><a href="/index/quotation">quotation</a></li>
						<li><a href="/index/wish_list">wish list</a></li>
						<li><a href="###"></a></li>
					</ul>	
				</li>
			</ul>
		</div>
		<!-- nav end -->
		<div class="split-wrap">
			<div class="split"></div><!-- 
			<span>Hello</span> -->
		</div>
		<!-- sub-nav start -->
		<div class="sub-nav">
			<i class="home-icon"></i>
			<span>&gt;</span>
			<a href="###"><span>MyProject</span></a>
			<span>&gt;</span>
			<a href="###"><span>Management</span></a>
		</div>
		<!-- sub-nav end -->
		<!-- main start -->
		<div class="main clearfix">
			<div class="main-project fl">
				<p class="main-project-title">
					<span>ACTIVE PROJECTS</span>
					<i></i>
				</p>
				<div class="main-project-list-wrap">
					<p class="list center">
						<span class="fontWeight">Project Name</span>
						<span class="fontWeight">Order Number</span>
						<span class="fontWeight">Date</span>
					</p>
					<p class="list center">
						<span>XXXXXXXX</span>
						<span>12345</span>
						<span>01/01/16</span>
						<span class="txtRight" id="more1">more</span>
					</p>
					<p class="list center">
						<span>YYYYYYYY</span>
						<span>12388</span>
						<span>05/05/16</span>
						<span class="txtRight">more</span>
					</p>
				</div>
				<p class="main-project-comeleted">
					<span>COMELETED PROSECTS</span>
					<i></i>
				</p>
			</div>


			<!-- management start -->
		
			
			<div class="management fl">
				<i class="back"></i>
				<div class="management-l">
					<div class="management-l-t">
						<p class="list">
							<span>Project Name&nbsp;:&nbsp;XXXXX</span><span>Order Number&nbsp;:&nbsp;12345</span>
						</p>
						<p class="list">
							<span>Customer address&nbsp;:&nbsp;XXXXX</span>
						</p>
						<p class="list">
							<span>Project Duration&nbsp;:&nbsp;3years</span>
							<span>Contract Sun&nbsp;:&nbsp;$100M</span>
						</p>
					</div>
					<div class="management-l-m">
						<div class="con-wrap">
							<div class="startTime">
								<span class="timeName">Start Date</span>
								<span class="time">01/01/16</span>
							</div>
							<div class="Task" >
								<div class="Task-wrap">
									<span>Task Name2&nbsp;:&nbsp;起楼</span>
									<i></i>
								</div>
								<div class="Task-hide" style="display: block">
									<div class="img-wrap">
										<div class="img-list" style="margin-top:0;">
											<a href="###">
												<img src="/images/1.jpg" alt="" width="600" height="355">
											</a>
										</div>
										<div class="img-list">
											<a href="###">
												<img src="/images/1.jpg" alt="" width="600" height="355">
											</a>
										</div>
										<div class="img-list-title">
											<span class="img-bottom">房间</span>
											<span class="number">20</span>
											<i class="bingo"></i>
											<i class="comment"></i>
										</div>
									</div>
									
								</div>
							</div>
							<div class="Task" >
								<div class="Task-wrap">
									<span>Task Name2&nbsp;:&nbsp;起楼</span>
									<i></i>
								</div>
								<div class="Task-hide" style="display: none">
									<div class="img-wrap">
										<div class="img-list">
											<a href="###">
												<img src="/images/1.jpg" alt="" width="600" height="355">
											</a>
										</div>
										<div class="img-list-title">
											<span class="img-bottom">房间</span>
											<span class="number">20</span>
											<i class="bingo"></i>
											<i class="comment"></i>
										</div>
									</div>
									
								</div>
							</div>
							<div class="Task" >
								<div class="Task-wrap">
									<span>Task Name2&nbsp;:&nbsp;起楼</span>
									<i></i>
								</div>
								<div class="Task-hide" style="display: none">
									<div class="img-wrap">
										<div class="img-list">
											<a href="###">
												<img src="/images/1.jpg" alt="" width="600" height="355">
											</a>
										</div>
										<div class="img-list-title">
											<span class="img-bottom">房间</span>
											<span class="number">20</span>
											<i class="bingo"></i>
											<i class="comment"></i>
										</div>
									</div>
									
								</div>
							</div>
							<div class="endTime">
								<span class="timeName">End Date</span>
								<span class="time">01/02/16</span>
							</div>
						</div>
					</div>
					<div class="management-l-b"></div>
				</div>
				<div class="management-r">
					<div class="management-r-t clearfix">
						<div class="img-title fl">
							<p>Project Manager<br/>Mr.ABC</p>
						</div>
						<img src="/images/ts.jpg" alt="头像" width="120" height="184" class="fr">
					</div>
					<div class="management-r-m"><!-- 
						<div class="management-r-m-box"></div> -->
						<div class="main-right-bottom">
							<div class="m-r-b-top">
								<span class="name">AA</span>
								<i class="close"></i>
							</div>
							<div class="m-r-b-content"></div>
							<div class="m-r-b-bottom">
								<input type="text" class="txt">
								<span class="send">发送</span>
							</div>
						</div><!-- 
						<span class="send">send</span>
						<span class="cancel">cancel</span> -->
					</div>
					<div class="management-r-m1">
						<img src="/images/11.png" alt="" width="250" height="400">
					</div>
				</div>
				<div class="management-f">
					<div class="management-f-t">Project Cost Update</div>
					<div class="table-wrap">
						<table border="1">
							<thead>
								<tr>
								    <th>UpDate1:DD/MM/YY</th>
									<td>UpDate1:DD/MM/YY</td>
								</tr>
							</thead>
							<tbody>
								<tr>
								    <th>UpDate1:DD/MM/YY</th>
									<td>UpDate1:DD/MM/YY</td>
								</tr>
								<tr>
								    <th>UpDate1:DD/MM/YY</th>
									<td>UpDate1:DD/MM/YY</td>
								</tr>
								<tr>
								    <th>UpDate1:DD/MM/YY</th>
									<td>UpDate1:DD/MM/YY</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="management-f1">
					<div class="management-f-t top">Project Cost Update</div>
					<div class="management-f-m">
						<img src="/images/img1.jpg" alt="" width="500" height="260"/>
						<p><span class="m-txt">挑战最满意装修设计,完整报价，省钱才是王道挑战最满意装修设计,完整报价，省钱才是王道挑战最满意装修设计,完整报价，省钱才是王道挑战最满意装修设计,完整报价，省钱才是王道挑战最满意装修设计,完整报价，省钱才是王道</span><span class="m-time">8月22日  10：20</span></p>
					</div>
				</div>
				<div class="management-f1">
					<div class="management-f-m">
						<img src="/images/img2.jpg" alt="" width="500" height="260"/>
						<p><span class="m-txt">挑战最满意装修设计,完整报价</span><span class="m-time">8月22日  10：28</span></p>
					</div>
				</div>
			</div>
			<!-- management end -->
		</div>
		<!-- main end -->
	</div>
	<script src="/js/index.js"></script>
</body>
</html>