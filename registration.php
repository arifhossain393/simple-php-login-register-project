	<?php 
		include_once 'inc/header.php';
		include_once 'lib/User.php';

		$user = new User();

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {

			$usrreg = $user->userRegestation($_POST);
			
		}

	?>
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>User Registration</h2>
				</div>
			</div>
			<div class="panel-body">
				<div class="login-form" style="max-width: 600px; margin: 0 auto;">
					<?php 
						if (isset($usrreg)) {
							echo $usrreg;
						}

					?>
					<form action="" method="POST">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" id="name" name="name" class="form-control">
						</div>
						<div class="form-group">
							<label for="username">User Name</label>
							<input type="text" id="username" name="username" class="form-control">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" id="email" name="email" class="form-control">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" id="password" name="password" class="form-control">
						</div>
						<button type="submit" name="register" class="btn btn-success">Registration</button>

					</form>

				</div>
			</div>
		</div>
		<?php 
				include_once 'inc/footer.php';

			?>