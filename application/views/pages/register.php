
<div class="container">
	<div class="row">
	<div class="col-md-4"></div>
		<div class="col-md-4 shadow">
			<div class="container">
			<br>
		  	<form method="post" action="<?php echo base_url(); ?>students/add_new_data">
			  	<fieldset>
				    <legend>Register</legend>
				    <div class="form-group">
				    	<label for="exampleInputEmail1">Role</label>
					    <select class="custom-select" name="role">
					      	<option value="1">Student</option>
					      	<option value="2">Company</option>
					    </select>
					</div>
				    <div class="form-group">
				      <label for="exampleInputEmail1">Complete Name if Student | Company Name</label>
				      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter complete name">
				      <span class="text-danger"><?php echo form_error('name'); ?></span>
				    </div>
				    <div class="form-group">
				      <label for="exampleInputEmail1">Contact No.</label>
				      <input type="number" name="contact_no" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your contact no.">
				      <span class="text-danger"><?php echo form_error('contact_no'); ?></span>
				    </div>
				    <div class="form-group">
				      <label for="exampleInputEmail1">Permanent Address</label>
				      <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter valid address">
				      <span class="text-danger"><?php echo form_error('address'); ?></span>
				    </div>
				    <div class="form-group">
				      <label for="exampleInputEmail1">Username</label>
				      <input type="text" name="email" class="form-control" id="email" placeholder="Enter username">
				      <small id="emailHelp" class="form-text text-muted">Pls. Select a unique username</small>
				      <span id="email_result"></span>
				      <span class="text-danger"><?php echo form_error('username'); ?></span>
				    </div>
				    <div class="form-group">
				      <label for="exampleInputPassword1">Password</label>
				      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
				       <small id="emailHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>
				       <span class="text-danger"><?php echo form_error('password'); ?></span>
				    </div>
				    <div class="form-group">
				      <label for="exampleInputPassword1">Confirm Password</label>
				      <input type="password" name="confirm_password" class="form-control" placeholder="Confirm password">
				       <span class="text-danger"><?php echo form_error('confirm_password'); ?></span>
				    </div>
				    <button type="submit" class="btn btn-primary btn-block">Register</button>
				    <br>
				    <center>
				    	<a href="<?php echo base_url(); ?>home/login">Click here to Login</a>
				    </center>
				    <br>
				</fieldset>
			</form>
		</div>
		</div>
	<div class="col-md-4"></div>
	</div>
</div>