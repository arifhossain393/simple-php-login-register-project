	<?php 

		include_once 'lib/User.php';
		include_once 'inc/header.php';

		Session::checksession();

		$user = new User();

		if (isset($_GET['id'])) {
			$usrid = (int)$_GET['id'];
		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {

			$usrupdate = $user->userUpdateData($usrid, $_POST);
	
		}

	?>
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>User Update <span class="pull-right"><a href="index.php" class="btn btn-danger">Back</a></span></h2>
				</div>
			</div>
			<div class="panel-body">
				<div class="login-form" style="max-width: 600px; margin: 0 auto;">


					<?php 
						if (isset($usrupdate)) {
							echo $usrupdate;
						}

					

						$usrdata = $user->getProfileId($usrid);



						if ($usrdata) { ?>
					
					<form action="" method="POST">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" id="name" name="name" class="form-control" value="<?php echo $usrdata->name; ?>">
						</div>
						<div class="form-group">
							<label for="username">User Name</label>
							<input type="text" id="username" name="username" class="form-control" value="<?php echo $usrdata->username; ?>">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" id="email" name="email" class="form-control" value="<?php echo $usrdata->email; ?>">
						</div>
						
						<?php 
							$sessId = Session::get("id");
							if ($usrid == $sessId) { ?>
								<button type="submit" name="update" class="btn btn-success">Update</button>
								<a class="btn btn-info" href="changepass.php?id=<?php echo $usrid;?>">Change password</a>
						<?php	}

						?>

						
					</form>


					<?php	}

					?>

				</div>
			</div>
		</div>

		<?php 
		include_once 'inc/footer.php';

	?>