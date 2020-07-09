<div class="container-fluid">
	<div class="justify-content-center">
		<img src="<?php echo base_url('assets/images/ojtpmesda.png'); ?>" class="rounded mx-auto d-block logo-login">
		<div class="container">
			<div class="col-md-4 offset-md-4">
				<form method="post" action="<?php echo base_url('signin'); ?>" class="login-form">
					<fieldset>
						<div class="form-group">
							<label for="username"><i class="fas fa-user-tie mr-1"></i>Username</label>
							<input type="text" name="username" autocomplete="off" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username">
						</div>
						<div class="form-group">
							<label for="password"><i class="fa fa-lock mr-1" aria-hidden="true"></i>Password</label>
							<input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
						</div>
							<button type="submit" class="btn btn-primary btn-block mb-3">Login</button>
						<?php if (APP == 'STUDENT'): ?>
							<label class="d-flex justify-content-center">Don't have an account? <a href="<?php echo base_url('register'); ?>" class="ml-1">Sign Up</a></label>
						<?php endif; ?>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>