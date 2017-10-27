<?php 
		include_once 'lib/User.php';
		include_once 'inc/header.php';

		Session::checksession();
		$user = new User();

		$logmsg = Session::get("loginmsg");

		if (isset($logmsg)) {
			echo $logmsg;
		}
		Session::set("loginmsg", NULL);
	?>
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>User List <span class="pull-right"><strong>Welcome !</strong>
						<?php 

							$usrname = Session::get("username");
							if (isset($usrname)) {
								echo $usrname;
							}
						?>

					</span></h2>
				</div>
			</div>
			<div class="panel-body">
				<table class="table table-striped">
					<th width="20%">Serial</th>
					<th width="20%">Name</th>
					<th width="20%">User Name</th>
					<th width="20%">Email</th>
					<th width="20%">Action</th>


					<?php 
						$usrdata = $user->getUserData();

						if ($usrdata) {
							$i = 0;
							foreach ($usrdata as $data) {
								$i++;

								?>

								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $data['name']; ?></td>
									<td><?php echo $data['username']; ?></td>
									<td><?php echo $data['email']; ?></td>
									<td>
										<a href="profile.php?id=<?php echo $data['id']; ?>" class="btn btn-info">View</a>
									</td>
								</tr>
								<?php
							}
						}


					?>

					

				</table>
			</div>
		</div>

		<?php 
		include_once 'inc/footer.php';

	?>