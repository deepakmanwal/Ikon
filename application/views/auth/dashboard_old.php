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
		
		
	<!-- initializer styles starts-->
	    <link rel="stylesheet" href="assets/css/normalize.min.css">
        <link rel="stylesheet" href="assets/css/main.css">
		
        <!--<link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/bootstrap-theme.css">-->

        <script src="assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
		<script src="assets/js/main.js"></script>
	<!-- initializer styles ends -->
        <!-- file for googlefont -->
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=shadow-multiple|outline">
		<!-- file for googlefont-->
		<!--vertical slider-->
		
<!--<link type="text/css" href="style/demo.css" rel="stylesheet" media="all" />
		 styles needed by jScrollPane - include in your own sites 
		<link type="text/css" href="style/jquery.jscrollpane.css" rel="stylesheet" media="all" />-->

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
		background:#fff;
		}
		</style>
		<script>
		var user_id = <?php echo $user->id?>;
		var base_url = '<?php echo base_url()?>';
			$(document).ready(function(){
				<?php if($user->alternative_email==''){?>
				setTimeout(function(){$(".email_notification").fadeIn('slow')},2000);
				<?php }?>
				
				$('#skip').click(function(){
					$(".email_notification").fadeOut('slow');
				});
				$('#add').click(function(){
					var alternative_email = $('#alternative_email').val();
					if(alternative_email!='')
					{
						var data = 'user_id='+user_id+'&alternative_email='+alternative_email;
						$.get(base_url+'auth/set_alternative_email',data,function(res){
							$('.email_notification').html('<p style="color:green;">Updated Successfully</p>');
							setTimeout(function(){$(".email_notification").fadeOut('slow')},1000);
						}); 
					}
				});
				$('#down-btn').click(function(){
					$('#icons').slideToggle();
				});
			});
		</script>
		<!-- latest jQuery direct from google's CDN -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<!-- the mousewheel plugin -->
		<script type="text/javascript" src="script/jquery.mousewheel.js"></script>
		<!-- the jScrollPane script -->
		<script type="text/javascript" src="script/jquery.jscrollpane.min.js"></script>
		<!-- scripts specific to this demo site -->
		<script type="text/javascript" src="script/demo.js"></script>

		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script>
		
		

	
		
    </head>
    <body style="background-image:url(assets/img/dashboard-bg.jpg)">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
	
		
		
		<div class="ikon">
			<img src="assets/img/ikon-logo.png">
		</div>
        <div class="main-container db-container-bg">
            <div class="main wrapper clearfix">

                <article>
                    <section class="clear">
						<div class="image">
							<img src="assets/img/profile-img.png" />
							<p id="username"><?php echo $user->first_name." ".$user->last_name?> 
							  <a class="logout" title="Log-Out your account" href="<?php echo base_url('auth/logout')?>">Log Out</a>
							</p>
						</div>
						
						<div class="drop-down">
							<img src="assets/img/down-button.png" id="down-btn">
							<div id="icons" style="display:none">
								<a href="#"><img title="Music" src="assets/img/volume-icon.png" role="volume"></a>
								<a href="#"><img title="Setting" src="assets/img/tools.png" role="tools"></a>
								<a href="#"><img title="Save" src="assets/img/download-icon.png" role="download"></a>
							</div>
						</div>
					</section>
					<section class="clear">
						<div class="left-section left">
							<div class="social-icons-2">
								<img src="assets/img/book.png" class="left" title="Ikon1">
								<img src="assets/img/smiley.png" class="left" title="Ikon2">
								<img src="assets/img/email.png" class="left" title="Ikon3">
								<img src="assets/img/like.png" class="left" title="Ikon4">
							</div>
							<div class="left-nav">
								<ul>
									<li><a href="#">Profile</a></li>
									<li><a href="#">Plugins</a> </li>
									<li><a href="#">Membership</a> </li>
									<li><a href="#">Settings</a> </li>
								</ul>
							</div>
						</div>
						<div class="right-section left">
						<div class="scroll-pane">
								<div class="search-box clear">
								<input type="text" class="left" placeholder="Search Keyword ..."><input type="image" src="assets/img/search-btn.png" class="left">
							</div>
								<div class="activity-area">
									<div class="email_notification" style="display:none;">
										Provide your alternative email:
										<input type="email" id="alternative_email" value="" placeholder="abc@abc.com">
										<input type="submit" class="btn-primary" value="Add" id="add">
										<input type="button" class="btn-inverse" value="Skip" id="skip">
									</div>
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
								
								</div>
				
			</div>

							
	
						</div>
					</section> 
					<section class="clear d-footer">
						<div class="foot-icons"><img src="assets/img/footer-icon1.png" title="Tool"/></div>
						<div class="foot-icons"><img src="assets/img/footer-icon2.png" title="Tool"/></div>
						<div class="foot-icons"><img src="assets/img/footer-icon3.png" title="Tool"/></div>
						<div class="foot-icons"><img src="assets/img/footer-icon4.png" title="Tool"/></div>
						<div class="foot-icons"><img src="assets/img/footer-icon5.png" title="Tool"/></div>
						<div class="foot-icons"><img src="assets/img/footer-icon6.png" title="Tool"/></div>
						<div class="foot-icons"><img src="assets/img/footer-icon7.png" title="Tool"/></div>
					</section>
					
                   
                </article>

             

            </div> <!-- #main -->
        </div> <!-- #main-container -->
  
    </body>
</html>
