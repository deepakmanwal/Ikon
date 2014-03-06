<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
	);
}
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
/* $email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
); */
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
<table>
	<tr>
		<td><?php echo form_label('First Name', $first_name['id']); ?></td>
		<td><?php echo form_input($first_name); ?></td>
		<td style="color: red;"><?php echo form_error($first_name['name']); ?><?php echo isset($errors[$first_name['name']])?$errors[$first_name['name']]:''; ?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Last Name', $last_name['id']); ?></td>
		<td><?php echo form_input($last_name); ?></td>
		<td style="color: red;"><?php echo form_error($last_name['name']); ?><?php echo isset($errors[$last_name['name']])?$errors[$first_name['name']]:''; ?></td>
	</tr>
	<?php if ($use_username) { ?>
	<tr>
		<td><?php echo form_label('Email', $username['id']); ?></td>
		<td><?php echo form_input($username); ?>@Ikon360.com</td>
		<td style="color: red;"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></td>
	</tr>
	<?php } ?>
	<!--<tr>
		<td><?php echo form_label('Email Address', $email['id']); ?></td>
		<td><?php echo form_input($email); ?></td>
		<td style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></td>
	</tr>-->
	<tr>
		<td><?php echo form_label('Password', $password['id']); ?></td>
		<td><?php echo form_password($password); ?></td>
		<td style="color: red;"><?php echo form_error($password['name']); ?></td>
	</tr>
	<!--<tr>
		<td><?php echo form_label('Confirm Password', $confirm_password['id']); ?></td>
		<td><?php echo form_password($confirm_password); ?></td>
		<td style="color: red;"><?php echo form_error($confirm_password['name']); ?></td>
	</tr>-->
	<tr>
		<td><label for="confirm_password">Date Of Birth</label></td>
		<td>
			<select name="birthday_month" id="month" class="">
			  <option value="" selected="1">Month</option>
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
		</td>
		<td style="color: red;">
		<?php 
			if(form_error('birthday_month')||form_error('birthday')||form_error('birthday_year'))
			{
			  echo 'Date should be valid';
			} 
		?></td>
	</tr>

	<?php if ($captcha_registration) {
		if ($use_recaptcha) { ?>
	<tr>
		<td colspan="2">
			<div id="recaptcha_image"></div>
		</td>
		<td>
			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		</td>
		<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
		<td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
		<?php echo $recaptcha_html; ?>
	</tr>
	<?php } else { ?>
	<tr>
		<td colspan="3">
			<p>Enter the code exactly as it appears:</p>
			<?php echo $captcha_html; ?>
		</td>
	</tr>
	<tr>
		<td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
		<td><?php echo form_input($captcha); ?></td>
		<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
	</tr>
	<?php }
	} ?>
</table>
<?php echo form_submit('register', 'Register'); ?>
<?php echo form_close(); ?>