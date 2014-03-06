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
<script src="http://malsup.github.com/jquery.form.js"></script>
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
					if(this.id=='profile')
					{
						$("#main-sec").hide();
						$("#profile-sec").show();
					}
				});
				
				$("#edit-currentcity,#edit-hometown").click(function(){
					if(this.id == 'edit-currentcity')
					{
						if($(this).text()=='Edit')
						{
							$(this).text('Done');
							$('#current_city_text').hide();
							$('#current_city').val($('#current_city_text').html());
							$('#current_city').show();
						}
						else if($(this).text()=='Done')
						{
							$(this).text('Edit');
							$('#current_city_text').html($('#current_city').val());
							$('#current_city_text').show();							
							$('#current_city').hide();
						}
					}
					if(this.id == 'edit-hometown')
					{
						if($(this).text()=='Edit')
						{
							$(this).text('Done');
							$('#home_town_text').hide();
							$('#home_town').val($('#home_town_text').html());
							$('#home_town').show();
						}
						else if($(this).text()=='Done')
						{
							$(this).text('Edit');
							$('#home_town_text').html($('#home_town').val());
							$('#home_town_text').show();
							$('#home_town').hide();
						}
					}
				});
				
				$('#edit').click(function(){
					$(this).hide();
					$('#done-edit').show();
					$("#professional_skill_text,#work_edu_text").hide();
					$('#work_edu').val($('#work_edu_text').html());
					$('#professional_skill').val($('#professional_skill_text').html());
					$("#professional_skill,#work_edu").show();
				});
				$('#done-edit').click(function(){
					$(this).hide();
					$('#edit').show();
					$("#professional_skill,#work_edu").hide();
					$('#work_edu_text').html($('#work_edu').val());
					$('#professional_skill_text').html($('#professional_skill').val());
					$("#professional_skill_text,#work_edu_text").show();
				});
				$('#about_yourself').click(function(){
					$('#about').toggleClass('hide');
					$('#about').val($('#about_yourself_text').html());
					$('#about_yourself_text').addClass('hide');
				});
				$('#update').click(function(){
					var data = 'work_edu='+$('#work_edu').val()+'&professional_skill='+$('#professional_skill').val()+'&about='+$('#about').val()+'&current_city='+$('#current_city').val()+'&home_town='+$('#home_town').val();
					$.post('<?php echo base_url();?>welcome/edit_profile', data, function(res){
						if(res=='success'){
							$('#update_success').removeClass('hide');
							setTimeout(function(){$('#update_success').addClass('hide');}, 3000);
							window.location.href = '<?= base_url();?>welcome/profile';
						}
					});
				});
				$('#get_file').on('click',function() {
					document.getElementById('my_file').click();
				});

				$('input[type=file]').change(function (e) {
					$('#customfileupload').html($(this).val());
					$("#image").submit();
				});
				
				var options = { 
				beforeSend: function() 
				{
					$("#loader-img").show();
				},			
				success: function(res) 
				{
					//alert(res);
					//check if img is uploaded or not
					$("#loader-img").hide();
					$("#get_file").attr('src','uploads/user_pic/thumbs/'+res);
				},			
				error: function()
				{
					alert('error');
				}			
				}; 

				 $("#image").ajaxForm(options);
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
		#my_file {
    display: none;
}

#get_file {   
    cursor: pointer;
}
#customfileupload
{
    display: inline;
    background-color: #fff;
    font-size: 14px;
    padding: 10px 30px 10px 10px;
    width: 250px;
    border: 1px solid #999;
    box-shadow: inset 1px 1px 5px #ccc;
    -webkit-box-shadow: inset 1px 1px 5px #ccc;
    -moz-box-shadow: inset 0px 0px 4px #ccc;
    -ms-box-shadow: inset 0px 0px 4px #ccc;
    -o-box-shadow: inset 0px 0px 4px #ccc;
    z-index: 1;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
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
					<?php $this->load->view('layouts/edit_header');?>
						<section class="clear">
							<div class="activities-button right">
								<img src="assets/img/update.png" id="update" class="left" data-toggle="tooltip" data-placement="top" title="Update" rel="tooltip">
								<img src="assets/img/activity-log.png" class="left" data-toggle="tooltip" data-placement="top" title="Activity" rel="tooltip">
								<img src="assets/img/settings-icon.png" class="left" data-toggle="tooltip" data-placement="top" title="Setting" rel="tooltip">
							</div>
							<?php $this->load->view('layouts/leftbar');?>
							<!-- right section starts-->
							<div class="right-section left" style="margin:0">
					
							<div class="scroll-pane">
								<div class="alert alert-success hide" id="update_success" style="width:50%;float:left;margin:0px 0px  0px 27px;padding:5px;">Your profile has been updated.</div>
								<div class="search-box">
									<input type="text" class="left" placeholder="Search Keyword ..."><input type="image" src="assets/img/search-btn.png" class="left">
								</div>
								<div class="activity-area">
								<!-- Edit profile section -->
									<section class="user-profile" id="edit-profile-sec">
										<h2 class="clear">About <!--<img src="assets/img/activity-icon.jpg" class="right" />--> </h2>
											<div class="edit-user clear">
												<div class="user-desc left">
														<div class="user-element">
															<div class="clear"><label class="left">Work and Education</label>
																<img src="assets/img/done-editing.jpg" class="right" style="display:none;cursor:pointer;" id="done-edit">
																<img src="assets/img/edit.jpg" class="right" style="cursor:pointer;" id="edit">
															</div>
															<div class="clear"> 
																<?php if(!empty($profile['work_edu'])){?>
																	<span id="work_edu_text"><?= $profile['work_edu']?></span>
																<?php }else{?>
																	<span id="work_edu_text">Not Defined</span>
																<?php }?>
																<input type="text" style="display:none;" name="work_edu" id="work_edu">
															</div>
														</div>
														<div class="user-element">
															<label class="clear">Professional Skills</label>
															<div class="clear">
																<?php if(!empty($profile['professional_skill'])){?>
																	<span id="professional_skill_text"><?= $profile['professional_skill']?></span>
																<?php }else{?>
																	<span id="professional_skill_text">Not Defined</span>
																<?php }?>
																<input type="text" style="display:none;" name="professional_skill" id="professional_skill"/>
															</div>
															
														</div>
														<div class="user-element">
															<p class="clear">About you</p>
															<img src="assets/img/write.jpg" class="left"><a href="javascript:void(0);" id="about_yourself" class="left">Write about yourself...	</a>
															<?php if(!empty($profile['about'])){?>
																<div id="about_yourself_text" class="clear"><?= $profile['about']?></div>
															<?php }else{?>
																<div id="about_yourself_text" class="clear">Not Defined</div>
															<?php }?>
															<textarea name ="about" id="about" class="hide" style="width:257px;"></textarea>
														</div>
													
												</div>
												<div class="places">
													<p class="clear">Places Lived</p>
													<ul>
														<li>
															<img src="assets/img/bullet.jpg">
															<input type="text" id="current_city" name="current_city" style="display:none;">
															<?php if(!empty($profile['current_city'])){?>
																<div  id="current_city_text"><?= $profile['current_city']?></div>
															<?php }else{?>
																<div  id="current_city_text">Not Defined</div>
															<?php }?>															
															<p>Current City</p>
															<a href="javascript:void(0)" id="edit-currentcity">Edit</a>
														</li>
														<li>
															<img src="assets/img/bullet.jpg">
															<input type="text" id="home_town" name="home_town" style="display:none;">
															<?php if(!empty($profile['hometown'])){?>
																<div  id="home_town_text"><?= $profile['hometown']?></div>
															<?php }else{?>
																<div  id="home_town_text">Not Defined</div>
															<?php }?>
															<p>Hometown</p>												
															<a href="javascript:void(0)" id="edit-hometown">Edit</a>
														</li>
													</ul>
													<div class="clear"><img src="assets/img/write.jpg" class="left"><a href="#" class="left">Add Place</a></div>
													<hr class="clear">
													<!--<p style="padding-top:0; line-height:18px;float:left;"> Basic Information</p>-->
													
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
