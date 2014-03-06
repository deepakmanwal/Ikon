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
		
		<link rel="icon" href="assets/img/fev.ico" type="image/ico">
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
		</style>
		<!-- style for scrollbar ends -->
    </head>
    <body>
	
<?php
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
		'role'	=> 'email',
		'class'	=> 'left',
	);
$first_name = array(
	'name'	=> 'first_name',
	'id'	=> 'first_name',
	'value'	=> set_value('first_name'),
	'maxlength'	=> 80,
	'size'	=> 30,
	
);
$last_name = array(
	'name'	=> 'last_name',
	'id'	=> 'last_name',
	'value'	=> set_value('last_name'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class'	=> 'left',
	'role'	=> 'email',
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$register = array(
	'type'	=> 'image',
	'name'	=> 'register',
	'id'	=> 'register',
	'src' => 'assets/img/reg-btn.png',
	'class' => 'right',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'placeholder'	=> 'abc@ikon360.com',
);
/*if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}*/
$login_password = array(
	'name'	=> 'login_password',
	'id'	=> 'login_password',
	'size'	=> 30,
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$login_captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
$login_button = array(
	'type'	=> 'image',
	'name'	=> 'login_button',
	'id'	=> 'login_button',
	'src' => 'assets/img/log-btn.png',
);
?>	
	
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
		<script>
		var width = window.innerWidth;

		var h =window.innerHeight;
		
			//alert("resolution:" + width + "x" + h);
			
				$("body").height(h);
			//	alert($("body").height());
			
		</script>
		
<div class="ikon">
	<img src="assets/img/ikon-logo.png">
</div>
<div class="main-container">
  <div class="main wrapper clearfix">
    <article>
      <section class="form">
        <h1 class="font-effect-outline">Sign Up</h1>
        <?php echo form_open('auth/register'); ?>
					<p>Fill your complete details</p>
						<div>
							<?php echo form_label('First Name', $first_name['id']); ?>
							<?php echo form_input($first_name); ?></td>
							<span style="color: red;font-size:10px;"><?php echo form_error($first_name['name']); ?><?php echo isset($errors[$first_name['name']])?$errors[$first_name['name']]:''; ?></span>
						</div>
						<div>
							<?php echo form_label('Last Name', $last_name['id']); ?>
							<?php echo form_input($last_name); ?>
							<span style="color: red;font-size:10px;"><?php echo form_error($last_name['name']); ?><?php echo isset($errors[$last_name['name']])?$errors[$first_name['name']]:''; ?></span>
						</div>
						<div>
							<?php echo form_label('Email', $username['id']); 
								echo form_input($username); ?>
							<label class="left" role="email">@Ikon360.com</label>
							<span style="color: red;font-size:10px;float:left;"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></span>
						</div>
						<div>
							<?php echo form_label('Password', $password['id']); ?>
							<?php echo form_password($password); ?>
							<span style="color: red;font-size:10px;"><?php echo form_error($password['name']); ?></span>
						</div>
						<div>
							<label for="confirm_password">Date Of Birth</label>
							<div class="select-box">
								<select name="birthday_month" id="month" class="">
									<option value="" selected="1">mm</option>
									<option value="1"  <?php if($this->form_validation->set_value('birthday_month')==1){echo "selected";}?>>Jan</option>
									<option value="2"  <?php if($this->form_validation->set_value('birthday_month')==2){echo "selected";}?>>Feb</option>
									<option value="3"  <?php if($this->form_validation->set_value('birthday_month')==3){echo "selected";}?>>Mar</option>
									<option value="4"  <?php if($this->form_validation->set_value('birthday_month')==4){echo "selected";}?>>Apr</option>
									<option value="5"  <?php if($this->form_validation->set_value('birthday_month')==5){echo "selected";}?>>May</option>
									<option value="6"  <?php if($this->form_validation->set_value('birthday_month')==6){echo "selected";}?>>Jun</option>
									<option value="7"  <?php if($this->form_validation->set_value('birthday_month')==7){echo "selected";}?>>Jul</option>
									<option value="8"  <?php if($this->form_validation->set_value('birthday_month')==8){echo "selected";}?>>Aug</option>
									<option value="9"  <?php if($this->form_validation->set_value('birthday_month')==9){echo "selected";}?>>Sep</option>
									<option value="10" <?php if($this->form_validation->set_value('birthday_month')==10){echo "selected";}?>>Oct</option>
									<option value="11" <?php if($this->form_validation->set_value('birthday_month')==11){echo "selected";}?>>Nov</option>
									<option value="12" <?php if($this->form_validation->set_value('birthday_month')==12){echo "selected";}?>>Dec</option>
								</select>
								<select name="birthday" id="day" class="">
									<option value="">dd</option>
									<?php 
									for($_count=1;$_count<=31;$_count++)
									{?>
									<option value="<?php echo $_count;?>" <?php if($this->form_validation->set_value('birthday')==$_count){ echo "selected";}?>><?php echo $_count;?></option>
									<?php
									}?>
								</select>
								<select name="birthday_year" id="year" class="">
									<option value="">yyyy</option>
									<?php 
									for($_county=2014;$_county>=1925;$_county--)
									{?>
									<option value="<?php echo $_county;?>" <?php if($this->form_validation->set_value('birthday_year')==$_county){ echo "selected";}?>><?php echo $_county;?></option>
									<?php
									}?>
								</select>
								<span style="color: red;font-size:17px;">
								<?php if(form_error('birthday_month')||form_error('birthday')||form_error('birthday_year')){
											echo 'Date should be valid';
									}?></span>
							</div>
						</div>
						<div class="button">
							<div class="left">
								<p class="white">By clicking this button you accept our</p>
								<p> Terms and Agreement</p>
							</div>
							<?php echo form_input($register);
							 echo form_close(); ?>
						</div>
		  </section>
	
	 <section class="account">
                <h2> Already have a account? Log In! </h2>
		<?php if($this->session->flashdata('message')){?>
   <div style="font-size: 18px;color:red;">
    <?php echo $this->session->flashdata('message');?>
   </div>
   <?php }?>
		<?php echo form_open('auth/login'); ?>
			<div class="clear">
				<div class="left">
					<?php echo form_label('Email', $login['id']); 
						echo form_input($login); ?>
					<span style="color: red;font-size:10px;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></span>
				</div>
				<div class="left">
					<?php echo form_label('Password', $login_password['id']);
						echo form_password($login_password); ?>
					<span style="color: red;font-size:10px;"><?php echo form_error($login_password['name']); ?><?php echo isset($errors[$login_password['name']])?$errors[$login_password['name']]:''; ?></span>
				</div>
				<div class="left btn">
					<?php echo form_input($login_button); ?>
				</div>
			</div>
			
			<div class="clear">
				<p class="remember"> Remember Me</p>
				<p class="forgot"> <a href="<?php echo base_url('auth/forgot_password');?>">Forgot Your Password</a></p>
			</div>
		<?php echo form_close(); ?>
		<div class="clear">
			<h2 class="like">Like Us!</h2>
			<p class="forgot"> Like us with social account</p>
		</div>
		<div class="clear">
			<img src="assets/img/f-icon.png" class="left">
			<img src="assets/img/t-icon.png" class="left">
		</div>
            
                
            </section>
           
        </article>

     

    </div> <!-- #main -->
</div> <!-- #main-container -->
  
    </body>
</html>
