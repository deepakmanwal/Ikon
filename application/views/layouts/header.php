<section class="clear">
	<div class="image">
		<img src="assets/img/profile-img.png" />
		<p>
			<?php echo $user->first_name." ".$user->last_name?>
			<!--<a class="logout" title="Log-Out your account" href="<?php echo base_url('auth/logout')?>">Log Out</a>-->
		</p>
	</div>
	
	<div class="drop-down">
		<img src="assets/img/down-button.png" id="down-btn" style="cursor:pointer">
		<div id="icons" style="display:none">
			<a href="javascript:void(0)" id="music"><img src="assets/img/volume-icon.png" role="volume" data-toggle="tooltip" data-placement="left" title="Music" rel="tooltip"></a>
			<a  href="<?php echo base_url('welcome/edit_profile')?>" id="setting"><img src="assets/img/tools.png" role="tools" data-toggle="tooltip" data-placement="left" title="Setting" rel="tooltip"></a>
			<a href="<?php echo base_url('auth/logout')?>"><img src="assets/img/download-icon.png" role="download" data-toggle="tooltip" data-placement="left" title="Logout" rel="tooltip"></a>
		</div>
	</div>
</section>