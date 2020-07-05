<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php $show = ($this->uri->segment(1) == 'profile') ? 'active show': null; ?>
			<?php $settings = ($this->uri->segment(1) == 'settings') ? 'active show': null; ?>
			<?php $path = (!empty($row->USER_PHOTO)) ? base_url($row->USER_PHOTO) : base_url('assets/images/no_image.png') ;?>
			<img src="<?php echo $path; ?>" class="rounded-circle" width="150px">
			<legend><?php echo $row->FULL_NAME; ?></legend>
			<ul class="nav nav-tabs">
			  <li class="nav-item">
			    <a class="nav-link <?= $show; ?>" data-toggle="tab" href="#profile">Profile</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" data-toggle="tab" href="#requirements">OJT Requirements</a>
			  </li>
			   <li class="nav-item">
			    <a class="nav-link <?= $settings; ?>" data-toggle="tab" href="#settings">Settings</a>
			  </li>
			  
			</ul>
			<div id="myTabContent" class="tab-content">
			  <div class="tab-pane fade <?= $show; ?>" id="profile">
			    <p>Age: <strong><?php echo $row->AGE; ?></strong></p>
				<p>Gender: <strong><?php echo $row->GENDER; ?></strong></p>
				<p>Address: <strong><?php echo $row->ADDRESS; ?></strong></p>
				<p>Email Address: <strong><?php echo $row->EMAIL_ADDRESS; ?></strong></p>
				<p>Contact No: <strong><?php echo $row->CONTACT_NO; ?></strong></p>
				<p>Guardian's Name: <strong><?php echo $row->GUARDIAN; ?></strong></p>
				<p>Contact No. (incase): <strong><?php echo $row->GURADIAN_NO; ?></strong></p>
				<p><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Edit Profile</button></p>
			  </div>
			  <div class="tab-pane fade" id="requirements">
			  	<table class="table table-responsive">
				  <thead class="bg-success">
				    <tr style="color: #fff;">
				      <th scope="col" class="text-center">Resume</th>
				      <th scope="col" class="text-center">Clearance</th>
				      <th scope="col" class="text-center">Waiver</th>
				      <th scope="col" class="text-center">Good Moral</th>
				      <th scope="col" class="text-center">Registration Form</th>
				      <th scope="col" class="text-center">Parents Consent</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
				  		$empty = '<i class="far fa-file-excel fa-5x mr-1"></i><p>Empty</p>';
				  		$resumeOutput = $empty;
				  		$clearanceOutput = $empty;
				  		$waiverOutput = $empty;
				  		$good_moralOutput = $empty;
				  		$registration_formOutput = $empty;
				  		$parents_consentOutput = $empty;
				  		if (!empty($row->resume)) {
				  			$resume = explode('/',$row->resume);
							$resume = end($resume);
							$resumeOutput = '<a href="'.base_url($row->resume).'" target="_blank"><img src="'.base_url('assets/pdf/pdf.png').'" width="100px"></a><p>'.$resume.'</p>';
						}

						if (!empty($row->clearance)) {
				  			$clearance = explode('/',$row->clearance);
							$clearance = end($clearance);
							$clearanceOutput = '<a href="'.base_url($row->clearance).'" target="_blank"><img src="'.base_url('assets/pdf/pdf.png').'" width="100px"></a><p>'.$clearance.'</p>';
						}

						if (!empty($row->waiver)) {
				  			$waiver = explode('/',$row->waiver);
							$waiver = end($waiver);
							$waiverOutput = '<a href="'.base_url($row->waiver).'" target="_blank"><img src="'.base_url('assets/pdf/pdf.png').'" width="100px"></a><p>'.$waiver.'</p>';
						}

						if (!empty($row->good_moral)) {
				  			$good_moral = explode('/',$row->good_moral);
							$good_moral = end($good_moral);
							$good_moralOutput = '<a href="'.base_url($row->good_moral).'" target="_blank"><img src="'.base_url('assets/pdf/pdf.png').'" width="100px"></a><p>'.$good_moral.'</p>';
						}

						if (!empty($row->registration_form)) {
				  			$registration_form = explode('/',$row->registration_form);
							$registration_form = end($registration_form);
							$registration_formOutput = '<a href="'.base_url($row->registration_form).'" target="_blank"><img src="'.base_url('assets/pdf/pdf.png').'" width="100px"></a><p>'.$registration_form.'</p>';
						}

						if (!empty($row->parents_consent)) {
				  			$parents_consent = explode('/',$row->parents_consent);
							$parents_consent = end($parents_consent);
							$parents_consentOutput = '<a href="'.base_url($row->parents_consent).'" target="_blank"><img src="'.base_url('assets/pdf/pdf.png').'" width="100px"></a><p>'.$parents_consent.'</p>';
						}
				  	?>
				  	<tr>
				  		<td class="text-center"><?php echo $resumeOutput; ?></td>
						<td class="text-center"><?php echo $clearanceOutput; ?></td>
						<td class="text-center"><?php echo $waiverOutput; ?></td>
						<td class="text-center"><?php echo $good_moralOutput; ?></td>
						<td class="text-center"><?php echo $registration_formOutput; ?></td>
						<td class="text-center"><?php echo $parents_consentOutput; ?></td>
					</tr>
				</tbody>
				</table>
			  </div>
			  <div class="tab-pane fade <?= $settings; ?>" id="settings">
			    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
			  </div>
			</div>
		</div>	
			
	</div>
</div>


<div id="myModal" class="modal">
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
				      <label for="exampleInputEmail1">Age</label>
				      <input type="number" name="age" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter age" value="<?php echo $row->AGE; ?>">
				    </div>
				    <div class="form-group">
				    	<label for="exampleInputEmail1">Gender</label>
					    <select class="custom-select" name="gender">
					      	<option value="1">Male</option>
					      	<option value="2">Female</option>
					    </select>
					</div>
				    <div class="form-group">
				      <label for="exampleInputEmail1">Address</label>
				      <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter valid Address" value="<?php echo $row->ADDRESS; ?>">
				    </div>
				    <div class="form-group">
				      <label for="exampleInputEmail1">Email Address</label>
				      <input type="text" name="email_address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email Address" value="<?php echo $row->EMAIL_ADDRESS; ?>">
				    </div>
				    <div class="form-group">
				      <label for="exampleInputEmail1">Contact No.</label>
				      <input type="number" name="contact_no" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Contact No." maxlength="11" value="<?php echo $row->CONTACT_NO; ?>">
				    </div>
				    <div class="form-group">
				      <label for="exampleInputEmail1">Parents</label>
				      <input type="text" name="parents" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Parents name" value="<?php echo $row->GUARDIAN; ?>">
				    </div>
				    <div class="form-group">
				      <label for="exampleInputEmail1">Parents Contact No.</label>
				      <input type="text" name="parents_contact_no" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" maxlength="11" placeholder="Enter parents contact no." value="<?php echo $row->GURADIAN_NO; ?>">
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