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
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
		<script src="assets/js/vendor/bootstrap.min.js"></script>

        <script src="assets/js/main.js"></script>
		<!-- style for bootstrap ends -->
		
		 <!-- file for googlefont -->
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=shadow-multiple|outline">
		<!-- file for googlefont-->
		
		<!-- style for scrollbar starts-->
		<style>
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
		<!-- style for scrollbar ends -->
		
		
		
    </head>
    <body>
	<?php
	$login = array(
		'name'	=> 'login',
		'id'	=> 'login',
		'value' => set_value('login'),
		'maxlength'	=> 80,
		'size'	=> 30,
	);
	if ($this->config->item('use_username', 'tank_auth')) {
		$login_label = 'Alternative Email';
	} else {
		$login_label = 'Email';
	}
	?>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
		
		
				<img src="assets/img/ikon-logo.png" role="ikon-logo">
			
		</div>
		<div class="container bg">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="col-lg-6 col-md-6">
						<section class="account" style="padding-left:11%">
							<h2> Having Trouble Signing In! </h2>
								<div class="clear" >
									<?php echo form_open($this->uri->uri_string()); ?>
									<div class="clear">
										<div class="clear">
											<input name="option" id="option1" type="radio" style="float:left" checked>
											<label class="left">Reset Passord with alternative Email.</label>
											
										</div>
										<div id="first">
										<?php echo form_input($login); ?>
										<p style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></p>
										<input type="image" src="assets/img/submit.png" class="clear">
										</div>
									</div>
									<?php echo form_close(); ?>
									<?php echo form_open($this->uri->uri_string()); ?>
									<div class="clear">
										<div class="clear">
											<input name="option" id="option2" type="radio" style="float:left">
											<label class="left">Answer security Question.</label>
										</div>
										<div id="second" style="display:none;">
										<input type="text" name="email" value="" placeholder="abc@Ikon360.com"/>
										<select name="question">
											<option value="">Select Question</option>
											<?php 
											foreach($questions as $q){
											?>
											<option value="<?php echo $q->id; ?>"><?php echo $q->question; ?></option>
											<?php }?>
										  </select>
										<input type="text" name="response" value="" placeholder="Answer"/>
										<div class="clear"><input type="image" src="assets/img/submit.png" class="clear"></div>
										</div>
									</div>
									<?php echo form_close(); ?>
									
								</div>
								
								
							</form>
							 
						</section>
					</div>
				</div>
			</div>
		</div>
          
    </body>
</html>
