
<div class="container">
	<div class="row">
	<div class="col-md-4"></div>
		<div class="col-md-4 shadow">
			<div class="container">
			<br>
		  	<form method="post" action="get_login">
			  	<fieldset>
				    <legend>Login</legend>
				    <div class="form-group">
				    	<label for="exampleInputEmail1"><i class="fas fa-grin-hearts"></i>&nbspRole</label>
					    <select class="custom-select" name="role">
					      	<option value="1">Student</option>
					      	<option value="2">Company</option>
					      	<option value="3">Admin</option>
					    </select>
					</div>
				    <div class="form-group">
				      <label for="exampleInputEmail1"><i class="fas fa-user-tie"></i>&nbspUsername</label>
				      <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
				      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				      <span class="text-danger"><?php echo form_error('username'); ?></span>
				    </div>
				    <div class="form-group">
				      <label for="exampleInputPassword1"><i class="fa fa-lock" aria-hidden="true"></i>&nbspPassword</label>
				      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
				       <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				       <span class="text-danger"><?php echo form_error('password'); ?></span>
				    </div>
				    <?php if($this->session->flashdata('error')): ?>
                        <div style="background-color:#F44336;color:#fff;" class="alert alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo $this->session->flashdata('error').'</p>'; ?>
                        </div>    
                    <?php endif; ?>
				    <button type="submit" class="btn btn-primary btn-block">Login</button>
				    <br>
				    <center>
				    	<a href="<?php echo base_url(); ?>home/register">Click here to Register</a>
				    </center>
				    <br>
				</fieldset>
			</form>
		</div>
		</div>
	<div class="col-md-4"></div>
	</div>
</div>