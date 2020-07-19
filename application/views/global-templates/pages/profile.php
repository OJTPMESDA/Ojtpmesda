<?php $path = (!empty($row->PHOTO)) ? base_url($row->PHOTO) : base_url('assets/images/no_image.png') ;?>
<?php $show = ($this->uri->segment(1) == 'profile') ? 'active show': null; ?>
<div class="container">
	<img src="<?php echo $path; ?>" class="rounded-circle" width="150px">
	<legend class="mt-1"><?php echo $row->FULLNAME; ?></legend>
	<ul class="nav nav-tabs">
	  <li class="nav-item">
	    <a class="nav-link <?php echo $show; ?>" data-toggle="tab" href="#settings">Settings</a>
	  </li>
	</ul>
	<div id="myTabContent" class="tab-content">
	  <div class="tab-pane fade <?php echo $show; ?>" id="settings">
	    <p>Username: <strong><?php echo $row->USERNAME; ?></strong></p>
		<p>Address: <strong><?php echo $row->ADDRESS; ?></strong></p>
		<p>Email Address: <strong><?php echo $row->EMAIL_ADDRESS; ?></strong></p>
		<p>Contact No: <strong><?php echo $row->CONTACT_NO; ?></strong></p>
		<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Edit Profile</button>
		<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#changePass">Change Password</button>
	  </div>
	</div>
</div>

<div id="myModal" class="modal fade">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" style="color:#fff;">Update Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('profile/update'); ?>" enctype="multipart/form-data">
		  	<fieldset>
		  		<div class="form-group">
		  			<label for="exampleInputEmail1">Image</label>
				    <div class="input-group mb-3">
				      <div class="custom-file">
				        <input type="file" name="userfile" class="custom-file-input" id="inputGroupFile02">
				        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
				      </div>
				  </div>
				<div class="form-group">
			      <label for="username">username</label>
			      <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="username" value="<?php echo $row->USERNAME; ?>">
			    </div>
			    <div class="form-group">
			      <label for="fullname">Fullname</label>
			      <input type="text" name="fullname" class="form-control" id="fullname" aria-describedby="emailHelp" placeholder="fullname" value="<?php echo $row->FULLNAME; ?>">
			    </div>
			    <div class="form-group">
			      <label for="address">Address</label>
			      <input type="text" name="address" class="form-control" id="address" aria-describedby="emailHelp" placeholder="Enter valid Address" value="<?php echo $row->ADDRESS; ?>">
			    </div>
			    <div class="form-group">
			      <label for="email_address">Email Address</label>
			      <input type="text" name="email_address" class="form-control" id="email_address" aria-describedby="emailHelp" placeholder="Enter Email Address" value="<?php echo $row->EMAIL_ADDRESS; ?>">
			    </div>
			    <div class="form-group">
			      <label for="contact_no">Contact No.</label>
			      <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="contact_no" class="form-control" id="contact_no" aria-describedby="emailHelp" placeholder="Enter Contact No." value="<?php echo $row->CONTACT_NO; ?>">
			    </div>
			</fieldset>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-sm">Update</button>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div id="changePass" class="modal fade">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" style="color:#fff;">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('change/password'); ?>" class="change-password">
		  	<fieldset>
		  		<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
				</div>
				<div class="form-group">
					<label for="confirm_password">Confirm Password</label>
					<input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm password" required>
				</div>
			</fieldset>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-sm">Update</button>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>