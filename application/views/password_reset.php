<html>
	<?php
		if (isset($this->session->userdata['logged_in'])) {
			//header("location: https://audittracker-alvarojaramillo.c9users.io/index.php/user_authentication/user_login_process");
			 $userdata = array(
            'username' => $this->session->userdata['logged_in']['username']
            );
		};
		
	
	
	?>
	<head>
		<title>Registration Form</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/Style.css'); ?>">
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
	</head>
	<body>
		
		<div id="main">
			<div id="login">
				<h2>Password Reset</h2>
				<hr/>
				
				
				<?php echo form_open('user_authentication/first_login'); ?>
				<label>Username: <?php echo $userdata['username']?></label>
				<br /><br />
				<label>Password:</label>
				<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
				<input type="hidden" name="logindate" id="logindate" value="<?php echo date('Y-m-d H:i:s');?>"/>
				<input type="submit" value=" Login " name="submit"/><br />
				<?php echo form_close(); ?>
			</div>
		</div>
	</body>
</html>