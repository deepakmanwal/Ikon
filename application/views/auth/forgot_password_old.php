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

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
		<script src="js/main.js"></script>
	<!-- initializer styles ends -->
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
		/* styles for forgot - password*/
		
		section.account div{width:77%;}
		section.account div div{width:100% !important;}
		section.account input[type="radio"]{float:left; margin-top:3%; }
		section.account input[type="text"]{float:left; margin-left:6%;}
		section.account input[type="image"]{margin-left:4%;}
		
		section.account label{float:left; margin-left:4%;}
		section.account select{margin-left:6%; clear:both; overflow:hidden;}
		
		/* styles for forgot -password*/
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
		<script>
		var width = window.innerWidth;

		var h =window.innerHeight;
		
		$(document).ready(function(){
			$('#option1').change(function(){
				if($(this).prop('checked'))
				{
				$('#option2').prop('checked',false);
				$('#first').slideToggle();
				$('#second').slideToggle();
				}
			});
			$('#option2').click(function(){
				if($(this).prop('checked'))
				{
				$('#option1').prop('checked',false);
				
				$('#first').slideToggle();
				$('#second').slideToggle();
				}
			});
		});
			
			//alert("resolution:" + width + "x" + h);
			
				//$("body").height(h);
			//	alert($("body").height());
			
		</script>
		
<div class="ikon">
	<img src="assets/img/ikon-logo.png">
</div>
<div class="main-container">
  <div class="main wrapper clearfix">
    <article>
      
	
	<!-- <section class="account">
                <h2> Forgot Password </h2>
		<?php if($this->session->flashdata('message')){?>
   <div style="font-size: 18px;color:red;">
    <?php echo $this->session->flashdata('message');?>
   </div>
   <?php }?>
		<?php echo form_open($this->uri->uri_string()); ?>
		<table>
			<tr>
				<td><?php echo form_label($login_label, $login['id']); ?></td>
				<td><?php echo form_input($login); ?></td>
				<td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td>
			</tr>
		</table>
		<?php echo form_submit('reset', 'Get a new password'); ?>
		<?php echo form_close(); ?>
		<?php echo form_open($this->uri->uri_string()); ?>
		<table>
			<tr>
				<td><label for="question">Ikon Email:</label></td>
				<td><input type="email" name="email" value="" placeholder="abc@Ikon360.com"/></td>
				<td style="color: red;"><?php echo form_error('email'); ?><?php echo isset($errors['email'])?$errors['email']:''; ?></td>
			</tr>
			<tr>
				<td><label for="question">Question:</label></td>
				<td>
				  <select name="question">
				    <option value="">Select Question</option>
					<?php 
					foreach($questions as $q){
					?>
				    <option value="<?php echo $q->id; ?>"><?php echo $q->question; ?></option>
					<?php }?>
				  </select>
				</td>
				<td style="color: red;"><?php echo form_error('question'); ?><?php echo isset($errors['question'])?$errors['question']:''; ?></td>
			</tr>
			<tr>
				<td><label for="response">Response:</label></td>
				<td><input type="text" name="response" value="" placeholder="Answer"/></td>
				<td style="color: red;"><?php echo form_error('response'); ?><?php echo isset($errors['response'])?$errors['response']:''; ?></td>
			</tr>
		</table>
		<?php echo form_submit('reset1', 'Get a new password'); ?>
		<?php echo form_close(); ?>
                
            </section>-->
			
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
           
        </article>

     

    </div> <!-- #main -->
</div> <!-- #main-container -->
  
    </body>
</html>
