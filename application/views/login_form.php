<html>
	<?php
	//If the user is not logged in it will be redirected to the login process, and in case is already logged in, the user_login_process will redirect the user to the admin page
	if (isset($this->session->userdata['logged_in'])) {
		header("location: https://clicker-v2-1-alvarojaramillo.c9users.io/index.php/user_authentication/user_login_process");
	}?>
	<head>
		<title>Login Form</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/Style.css'); ?>">
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<?php
			if (isset($logout_message)) {
			echo "<div class='message'>";
			echo $logout_message;
			echo "</div>";
			}
		?>
		<?php
			if (isset($message_display)) {
			echo "<div class='message'>";
			echo $message_display;
			echo "</div>";
			}
		?>
		<div id="main">
			<div id="login">
				<h2>Login Form</h2>
				<hr/>
				<?php echo form_open('user_authentication/user_login_process'); ?>
				<?php
					echo "<div class='error_msg'>";
					if (isset($error_message)) {
						echo $error_message;
					}
					echo validation_errors();
					echo "</div>";
				?>
				<label>Username:</label>
				<input type="text" name="username" id="name" placeholder="Your username goes here..."/><br /><br />
				<label>Password:</label>
				<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
				<input type="hidden" name="logindate" id="logindate" value="<?php echo date('Y-m-d H:i:s');?>"/>
				<input type="submit" value=" Login " name="submit"/><br />
				If you don't have a user
				<a href="<?php echo base_url() ?>index.php/user_authentication/user_registration_show">
					Sign-Up Here
				</a>
				<?php echo form_close(); ?>
				
			</div>
		</div>
	</body>
</html>