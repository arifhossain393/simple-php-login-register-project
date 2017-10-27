	<?php 

		include_once 'lib/User.php';
		include_once 'inc/header.php';

		Session::checksession();

		$user = new User();

		if (isset($_GET['id'])) {
			$usrid = (int)$_GET['id'];
			$sessId = Session::get('id');

			if ($usrid != $sessId) {
				header("Location: index.php");
			}

		}


		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatepass'])) {

			$updpass = $user->userUpdatePass($usrid, $_POST);
		
		}

	?>
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>User Update <span class="pull-right"><a href="profile.php?id=<?php echo $usrid; ?>" class="btn btn-danger">Back</a></span></h2>
				</div>
			</div>
			<div class="panel-body">
				<div class="login-form" style="max-width: 600px; margin: 0 auto;">


					<?php 
						if (isset($updpass)) {
							echo $updpass;
						}

						 ?>
					
					<form action="" method="POST">
						
						<div class="form-group">
							<label for="old_password">Old Password</label>
							<input type="password" id="old_password" name="old_password" class="form-control">
						</div>
						<div class="form-group">
							<label for="password">New Password</label>
							<input type="password" id="password" name="password" class="form-control">
						</div>
						
						
						<button type="submit" name="updatepass" class="btn btn-success">Update</button>
						
					</form>


				</div>
			</div>
		</div>

		<?php 
		include_once 'inc/footer.php';

	?>