<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>360 icon</title>
    <base href="<?php echo base_url();?>">
    <!-- bootstrap styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="assets/css/icon-style.css" type="text/css" />
    <!-- bootstrap styles -->

</head>

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
$name = array(
	'name'	=> 'name',
	'id'	=> 'name',
	'class' => 'pull-left',
	'value'	=> set_value('name')
);
$dob = array(
	'name'	=> 'dob',
	'id'	=> 'dob',
	'class' => 'pull-left',
	'value'	=> set_value('dob')
);
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
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

<body>
    <div class="outer">
        <div class="container container pad-top cnt-bg">
            <div class="row">
                <div class="span11">
                    <div class="row">
                        <div class="login pull-right" style="padding-bottom:7px">
                            <img src="assets/images/icon-logo.png" class="pull-right" />
                        </div>

                    </div>
                    <div class="row">
                        <div class="span7">
                            <div class="form-title">
                                <h3> Signup</h3>

                            </div>
                            <div class="form-1">
                                <p>Fill your Complete Details !</p>
                                <div class="form-elements">
                                    <div class="form-textbox">
                                        <label for="Name" style="font-size: 15px;">Name</label>
                                        <?php echo form_input($name); ?>
                                    </div>
                                    <div class="form-textbox">
                                        <label for="DOB" style="font-size: 15px;">D.O.B</label>
                                        <?php echo form_input($dob); ?>
                                    </div>
                                </div>
                                <div class="form-elements">
                                    <div class="form-textbox" style="width:453px;">
                                        <label for="Email" style="font-size: 15px;">Email</label>
                                        <?php echo form_input($email); ?>
                                    </div>
                                </div>
                                <div class="form-elements">
                                    <select class="pull-left" style="margin-right:30px; -webkit-appearance: none;padding: 0px 4px;line-height: 16px;margin-bottom: 20px;">
                                        <option>Type</option>
                                        <option>Member</option>
                                        <option>DJ</option>
                                        <option>Artist</option>
                                        <option>blogger</option>
                                        <option>Promoter</option>
                                        <option>Member</option>
                                        <option>venu</option>
                                        <option>Producer</option>
                                        <option>Artist</option>
                                        <option>Label</option>
                                        <option>Actor/Actress</option>
                                    </select>

                                    <label style="color:#ffffff; padding-right:15px">Gender</label>
                                    <input type="radio" class="pull-left" name="male" style="margin-top:8px;">
                                    <img src="assets/images/male-icon.png" class="pull-left">
                                    <input type="radio" class="pull-left" name="female" style="margin-top:8px;">
                                    <img src="assets/images/female.png" class="pull-left">
                                </div>
                                <div class="form-elements">
                                    <select class="pull-left city-select  arrow-webkit">
                                        <option>Country</option>
                                        <option></option>
                                        <option></option>

                                    </select>

                                    <select class="pull-left city-select arrow-webkit">
                                        <option>City</option>
                                        <option></option>
                                        <option></option>
                                    </select>

                                    <input type="text" placeholder="Zipcode" />


                                </div>
                                <div class="form-elements">
                                    <input type="checkbox" class="pull-left" />
                                    <p class="pull-left check">By creating an account, you agree to the Terms of Service and to receive product information unless you choose otherwise.</p>
                                    <div class="signup-buttons">
                                        <input type="button" class="light-red pull-right" value="CANCEL" />
                                        <input type="button" class="light-green pull-right" value="CREATE" />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="like-div">
                                <h3>Like us</h3>
                                <p>llike us with social account !</p>
                                <div>
                                    <img src="assets/images/facebook-icon-big.png" />
                                    <img src="assets/images/twitter-icon-big.png" style="margin-left:20px;" />
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="row social-icons">
                        <div class="span2 offset2">
                            <img src="assets/images/sign-up.png" class="pull-right" />
                            <p style="padding-left:53px">Sign in</p>
                        </div>
                        <div class="span2 offset1">
                            <img src="assets/images/sign-in.png" />
                            <p>Sign up</p>
                        </div>
                        <div class="span3">
                            <img src="assets/images/forgot-password.png" />
                            <p>Forgot password</p>
                        </div>
                    </div>
                </div>





            </div>
        </div>





        <!-- bootstrap script starts -->

        <script src="http://platform.twitter.com/widgets.js" type="text/javascript">
        </script>

        <script src="js/prettify.js">
        </script>
        <script src="js/bootstrap-transition.js">
        </script>
        <script src="js/bootstrap-alert.js">
        </script>
        <script src="js/bootstrap-modal.js">
        </script>
        <script src="js/bootstrap-scrollspy.js">
        </script>
        <script src="js/bootstrap-tab.js">
        </script>
        <script src="js/bootstrap-tooltip.js">
        </script>
        <script src="js/bootstrap-popover.js">
        </script>
        <script src="js/bootstrap-button.js">
        </script>
        <script src="js/bootstrap-collapse.js">
        </script>
        <script src="js/bootstrap-carousel.js">
        </script>
        <script src="js/bootstrap-typeahead.js">
        </script>
        <script src="js/application.js">
        </script>



        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <!-- mandatory file -->
        <script src="js/bootstrap.js"></script>
        <!-- mandatory file -->
        <script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
        <!-- for dropdown-->


        <!-- bootstrap script ends -->

</body>
