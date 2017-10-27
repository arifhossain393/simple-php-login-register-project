<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once $filepath.'/../lib/Session.php';
    Session::init();

?>

<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/font-awesome.css">
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
		
		 <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <?php 
        if (isset($_GET['action']) && $_GET['action'] == 'logout') {
            Session::destroy();
        }

    ?>

    <body>

		<div class="container">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<a href="index.php" class="navbar-brand">User Login System</a>
					</div>
					<ul class="nav navbar-nav pull-right">

                    <?php
                        $id = Session::get("id");
                        $usrlogin = Session::get("login");

                        if ($usrlogin == true) { ?>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="profile.php?id=<?php echo $id; ?>">Profile</a></li>
                            <li><a href="?action=logout">Logout</a></li>
                      <?php  }else { ?>
                          <li><a href="registration.php">Sign Up</a></li>
                          <li><a href="login.php">Login</a></li>
                        

                    <?php  }

                     ?>

						

						
					</ul>

				</div>
			</nav>
		</div>