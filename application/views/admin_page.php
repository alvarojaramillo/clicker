<html>
	<?php
		if (isset($this->session->userdata['logged_in'])) {
			$username = ($this->session->userdata['logged_in']['username']);
			
		} else {
			header("location: https://audittracker-alvarojaramillo.c9users.io/index.php/user_authentication/user_login_process");
		}
	?>
	<head>
		<title>Admin Page</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/Style.css'); ?>">
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div id="profile">
			
			
		<?php
		echo "Hello <b id='welcome'><i>" . $username . "</i> !</b>";
		echo "<br/>";
		echo "<br/>";
		echo "Welcome to Admin Page";
		echo "<br/>";
		echo "<br/>";
		echo "Your Username is " . $username;
		echo "<br/>";

		?>
		<b id="logout"><a href="logout">Logout</a></b>
		</div>
		<br/>
	</body>
</html>