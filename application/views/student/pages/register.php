
<div class="container">
	<div class="row">
	<div class="col-md-4"></div>
		<div class="col-md-4 shadow">
			<div class="container">
		  	<form method="post" action="<?php echo base_url('create'); ?>" class="sign-up-form">
			  	<fieldset>
				    <legend>Certificate of Registration</legend>
				    <div class="form-group">
				      <label for="fname">Fullname</label>
				      <input type="text" name="fname" class="form-control" id="fname" aria-describedby="emailHelp" placeholder="Enter complete name" autocomplete="off" required>
				    </div>
				    <div class="form-group">
				      <label for="contact_no">Contact No.</label>
				      <input type="text" name="contact_no" class="form-control" id="contact_no" onkeypress="return event.charCode >= 48 && event.charCode <= 57" aria-describedby="emailHelp" placeholder="Enter your contact no." maxlength="11" autocomplete="off" required>
				    </div>
				    <div class="form-group">
				      <label for="contact_no">State University</label>
				      <?php echo form_dropdown('school', school(),  set_value('school'), 'class="custom-select" id="school" required'); ?>
				    </div>
				    <div class="form-group">
				      <label for="address">Permanent Address</label>
				      <input type="text" name="address" class="form-control" autocomplete="off" id="address" aria-describedby="emailHelp" placeholder="Enter valid address" required>
				    </div>
				    <div class="form-group">
				      <label for="username">Username</label>
				      <input type="text" name="username" class="form-control" autocomplete="off" id="username" placeholder="Enter username" required>
				    </div>
				    <div class="form-group">
				      <label for="password">Password</label>
				      <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
				    </div>
				    <div class="form-group">
				      <label for="confirm_password">Confirm Password</label>
				      <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm password" required>
				    </div>
				    <button type="submit" class="btn btn-primary btn-block btn-disabled">Register</button>
				    <br>
				    <center>
				    	<a href="<?php echo base_url('login'); ?>">Click here to Login</a>
				    </center>
				    <br>
				</fieldset>
			</form>
		</div>
	</div>
</div>