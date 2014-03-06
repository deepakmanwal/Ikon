<div class="left-section left">
	<div class="social-icons-2">
		<a href="#"><img src="assets/img/book.png" class="left" data-toggle="tooltip" data-placement="top" title="Books" rel="tooltip"></a>
		<a href="#"><img src="assets/img/smiley.png" class="left" data-toggle="tooltip" data-placement="top" title="Fun" rel="tooltip"></a>
		<a href="#"><img src="assets/img/email.png" class="left" data-toggle="tooltip" data-placement="top" title="Messages" rel="tooltip"></a>
		<a href="#"><img src="assets/img/like.png" class="left" data-toggle="tooltip" data-placement="top" title="Likes" rel="tooltip"></a>
	</div>
	<div class="left-nav">
		<ul>
			<li id="dashboard" class="<?php if($page=='dashboard'){echo "active";}?>"><a href="<?= base_url();?>welcome/dashboard">Dashboard</a></li>
			<li id="profile" class="<?php if($page=='profile'){echo "active";}?>"><a href="<?= base_url();?>welcome/profile">Profile</a></li>
			<li class="<?php if($page=='plugins'){echo "active";}?>"><a href="javascript:void(0)">Plugins</a> </li>
			<li class="<?php if($page=='membership'){echo "active";}?>"><a href="javascript:void(0)">Membership</a> </li>
			<li class="<?php if($page=='settings'){echo "active";}?>"><a href="javascript:void(0)">Settings</a> </li>
		</ul>
	</div>
</div>