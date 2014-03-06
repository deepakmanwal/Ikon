<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<base href="<?php echo base_url();?>"/>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
		
		
		<!-- style for bootstrap starts-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="assets/css/main.css">
		
		<script src="assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="assets/js/main.js"></script>
		<!-- style for bootstrap ends -->
		
		 <!-- file for googlefont -->
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=shadow-multiple|outline">
		<!-- file for googlefont-->
		
		<script>
		// script for drop down
			$(document).ready(function(){
				//alert('alert');
				$("[rel='tooltip']").tooltip();
				$('#down-btn').click(function(){
					$('#icons').slideToggle();
				});
				$('.left-nav ul li').click(function(){
					$('.left-nav ul li').each(function(){$(this).removeClass('active')});
					$(this).addClass('active');
				});
			});
						
		</script>
		
		
		<!-- style for scrollbar starts-->
		<style type="text/css" id="page-css">
			/* Styles specific to this particular page */
			.scroll-pane
			{
				width: 100%;
				height: 250px;
				overflow: auto;
			}
			.horizontal-only
			{
				height: auto;
				max-height: 250px;
			}
			
			::-webkit-scrollbar {
				width: 12px;
				background:#8e9cb6;
				}
 
			::-webkit-scrollbar-track {
			-webkit-box-shadow: inset 0 0 6px #8e9cb6; 
			border-radius: 10px;
			}
 
		::-webkit-scrollbar-thumb {
		border-radius: 10px;
		-webkit-box-shadow: inset 0 0 6px #fff; 
		background:#fff;}
		
		-moz-scrollbar {
				width: 12px;
				background:#8e9cb6;
				}
 
			-moz-scrollbar-track {
			-moz-box-shadow: inset 0 0 6px #8e9cb6; 
			border-radius: 10px;
			}
 
		-moz-scrollbar-thumb {
		border-radius: 10px;
		-moz-box-shadow: inset 0 0 6px #fff; 
		background:#fff;
		}
		</style>
		
		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				//$('.scroll-pane').jScrollPane();
			});
		</script>
		<!--<link type="text/css" href="assets/css/demo.css" rel="stylesheet" media="all" />-->
		<!-- styles needed by jScrollPane - include in your own sites -->
		<!--<link type="text/css" href="assets/css/jquery.jscrollpane.css" rel="stylesheet" media="all" />-->
		<!--Bootstrap-->
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
		<!-- the mousewheel plugin -->
		<!--<script type="text/javascript" src="assets/js/jquery.mousewheel.js"></script>-->
		<!-- the jScrollPane script -->
		<!--<script type="text/javascript" src="assets/js/jquery.jscrollpane.min.js"></script>-->
		<!-- scripts specific to this demo site -->
		<!--<script type="text/javascript" src="assets/js/demo.js"></script>-->
		
		
		<!-- style for scrollbar ends -->
		
		
		
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
		
		
				<img src="assets/img/ikon-logo.png" role="ikon-logo">
			
		</div>
		<div class="container db-container-bg">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<?php $this->load->view('layouts/header');?>
						<section class="clear">
							<?php $this->load->view('layouts/leftbar');?>
							<!-- right section starts-->
							 <div class="right-section left">
					
			<div class="scroll-pane">
				<div class="col-md-12">
					<div class="col-md-6" style="">
					  <h3 style="margin: 0;color: #fff;">Blogger</h3>
					</div>
					<div class="search-box col-md-6 pull-right">
						<input type="text" class="left" placeholder="Search Keyword ..."><input type="image" src="assets/img/search-btn.png" class="left">
					</div>
				</div>
				<div class="activity-area">
				  <!--dashboard section-->
				  <section id="main-sec">
					<div class="activity">
						<h2> Recent Activity</h2>
						<ul>
							<li><div><img src="assets/img/img1.jpg" class="left"></div><p class="left">Was eating dinner<br>@ sea point</p><img src="assets/img/red-mark.jpg" class="right" /></li>
							<li><div><img src="assets/img/img1.jpg" class="left"></div><p class="left">Was eating dinner<br>@ sea point</p><img src="assets/img/red-mark.jpg" class="right" /></li>
							<li><div><img src="assets/img/img1.jpg" class="left"></div><p class="left">Was eating dinner<br>@ sea point</p><img src="assets/img/red-mark.jpg" class="right" /></li>
						</ul>
					</div>
					<div class="right-divs">
						<div class="wallet">
							<h2>Wallet</h2>
							<p>Balance: $0.00</p>
							<div class="dash-btns">
								<input type="image" src="assets/img/view-btn.png">
								<input type="image" src="assets/img/send.png">
								<input type="image" src="assets/img/widthdraw-btn.png">
							</div>
						</div>
						
						<div class="notification">
						<h2>Notification</h2>
						
						<!--not blog starts-->
						<div class="note-blog clear">
							<div class="note-img left">
								<img src="assets/img/img2.jpg">
							</div>
							<div class="note-matter left">
								<span style="display:block"> New Videos</span>
								<a href="display:block">www.youtube.com</a>
							</div>
						</div>
						<!--not blog ends-->
						
						<!--not blog starts-->
						<div class="note-blog clear">
							<div class="note-img left">
								<img src="assets/img/img2.jpg">
							</div>
							<div class="note-matter left">
								<span style="display:block"> New Videos</span>
								<a href="display:block">www.youtube.com</a>
							</div>
						</div>
						<!--not blog ends-->
						</div>
					</div>
				  </section>
				  <!--dashboard section ends-->
				<!-- Edit profile section -->
					<section class="user-profile" id="edit-profile-sec" style="display:none;">
						<h2 class="clear">About <!--<img src="assets/img/activity-icon.jpg" class="right" />--> </h2>
						
						<div class="edit-user clear">
							<div class="user-desc left">
									<div class="user-element">
										<div class="clear"><label class="left">Work and Education</label><img src="assets/img/done-editing.jpg" class="right"></div>
										<div class="clear"> <input type="text"></div>
									</div>
									<div class="user-element">
										<label class="clear">Professional Skills</label>
										<input type="text" class="clear" />
										
									</div>
									<div class="user-element">
										<p class="clear">About you</p>
										<img src="assets/img/write.jpg" class="left"><a href="#" class="left">Write about yourslef...	</a>
									</div>
								
							</div>
							<div class="places">
								<p class="clear">Places Lived</p>
								<ul>
									<li>
										<img src="assets/img/bullet.jpg">
										<p>Dagupan City, Dagupan, Philippines<br>Current City</p>
										<a href="#">Edit</a>
									</li>
									<li>
										<img src="assets/img/bullet.jpg">
										<p>Philippines<br>Hometown</p>
										<a href="#">Edit</a>
									</li>
								</ul>
								<div class="clear"><img src="assets/img/write.jpg" class="left"><a href="#" class="left">Add Place</a></div>
								<hr class="clear">
								<p style="padding-top:0; line-height:18px;"> Basic Information</p>
							</div>
						
						</div>
					</section>
					<!-- Edit profile section ends-->
				</div>
			</div>

							
	
						</div>
							<!-- right section ends -->
						
						</section> 
						
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
				<?php $this->load->view('layouts/footer');?>
				</div>
			</div>
		
		</div>
          
    </body>
</html>
