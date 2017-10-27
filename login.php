<?php 
		include_once 'inc/header.php';
		include_once  'lib/User.php';
		Session::checklogin();

		$user = new User();

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {

			$usrlog = $user->userLogin($_POST);
			
		}

	?>
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>User Login</h2>
				</div>
			</div>
			<div class="panel-body">
				<div class="login-form" style="max-width: 600px; margin: 0 auto;">

					<?php
						if (isset($usrlog)) {
							echo $usrlog;
						}

					 ?>
					<form action="" method="POST">
						
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" id="email" name="email" class="form-control">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" id="password" name="password" class="form-control">
						</div>
						<button type="submit" name="login" class="btn btn-success">Login</button>

					</form>

				</div>
			</div>
		</div>

		<?php 
		include_once 'inc/footer.php';

	?>