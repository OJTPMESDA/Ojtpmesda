<div class="container pt-5">
	<div class="row">
	<div class="col-md-4"></div>
		<div class="col-md-4 shadow">
			<div class="container">
			<br>
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
				    <button type="submit" class="btn btn-primary btn-block">Login</button>
				    <br>
				    <?php if (APP == 'STUDENT'): ?>
				    <center>
				    	<a href="<?php echo base_url('register'); ?>">Click here to Register</a>
				    </center>
				    <br>
					<?php endif; ?>
				</fieldset>
			</form>
		</div>
		</div>
	<div class="col-md-4"></div>
	</div>
</div>