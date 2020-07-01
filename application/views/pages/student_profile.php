<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php $path = (!empty($fetch_data['user_image'])) ? base_url($fetch_data['user_image']) : base_url('assets/images/no_image.png') ;?>
			<img src="<?php echo $path; ?>" class="rounded-circle" width="150px">
			<legend><?php echo $fetch_data['name']; ?></legend>
			<ul class="nav nav-tabs">
			  <li class="nav-item">
			    <a class="nav-link active" data-toggle="tab" href="#profile">Profile</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" data-toggle="tab" href="#requirements">OJT Requirements</a>
			  </li>
			   <li class="nav-item">
			    <a class="nav-link" data-toggle="tab" href="#settings">Settings</a>
			  </li>
			  
			</ul>
			<div id="myTabContent" class="tab-content">
			  <div class="tab-pane fade active show" id="profile">
			    <p>Age: <strong><?php echo $fetch_data['age']; ?></strong></p>
				<p>Gender: <strong><?php echo $fetch_data['gender']; ?></strong></p>
				<p>Address: <strong><?php echo $fetch_data['address']; ?></strong></p>
				<p>Email Address: <strong><?php echo $fetch_data['email_address']; ?></strong></p>
				<p>Contact No: <strong>+63<?php echo $fetch_data['contact_no']; ?></strong></p>
				<p>Guardian's Name: <strong><?php echo $fetch_data['parents']; ?></strong></p>
				<p>Contact No. (incase): <strong>+63<?php echo $fetch_data['parents_contact_no']; ?></strong></p>
				<?php if($this->session->userdata('role') == 1): ?>
				<?php
					$this->db->where('username', $this->session->userdata('username'));
					$name = $this->db->get('students');
					foreach ($name->result() as $row) {
						$hey = $row->name;
					}
					if($hey == $fetch_data['name']){
						echo '<p><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Edit Profile</button></p>';
					}	
				?>
				<?php endif; ?>
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
				  	<tr>
				  	<?php
				  	$user = $fetch_data['id'];
				  		$this->db->where('studentID', $user);
						$name = $this->db->get('requirements');
						foreach ($name->result() as $row) {
							$resume = explode('/',$row->resume);
							$resume = end($resume);
							$clearance = explode('/',$row->clearance);
							$clearance = end($clearance);
							$waiver = explode('/',$row->waiver);
							$waiver = end($waiver);
							$good_moral = explode('/',$row->good_moral);
							$good_moral = end($good_moral);
							$registration_form = explode('/',$row->registration_form);
							$registration_form = end($registration_form);
							$parents_consent = explode('/',$row->parents_consent);
							$parents_consent = end($parents_consent);
							echo '<td class="text-center"><a href="'.base_url($row->resume).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="100px"></a><p>'.$resume.'</p></td>';
							echo '<td class="text-center"><a href="'.base_url($row->clearance).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="100px"></a><p>'.$clearance.'</p></td>';
							echo '<td class="text-center"><a href="'.base_url($row->waiver).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="100px"></a><p>'.$waiver.'</p></td>';
							echo '<td class="text-center"><a href="'.base_url($row->good_moral).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="100px"></a><p>'.$good_moral.'</p></td>';
							echo '<td class="text-center"><a href="'.base_url($row->registration_form).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="100px"></a><p>'.$registration_form.'</p></td>';
							echo '<td class="text-center"><a href="'.base_url($row->parents_consent).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="100px"></a><p>'.$parents_consent.'</p></td>';
						}
					?>
					</tr>
				</tbody>
				</table>
			  </div>
			  <div class="tab-pane fade" id="settings">
			    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
			  </div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div id="chart"></div>
				</div>
				<div class="col-md-6">
					<div id="bar-chart"></div>
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
        <form method="post" action="<?php echo base_url('profile/update/'.$fetch_data['id']); ?>" enctype="multipart/form-data">
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
				      <input type="number" name="age" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter age" value="<?php echo $fetch_data['age']; ?>">
				      <span class="text-danger"><?php echo form_error('username'); ?></span>
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
				      <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter valid Address" value="<?php echo $fetch_data['address']; ?>">
				      <span class="text-danger"><?php echo form_error('username'); ?></span>
				    </div>
				    <div class="form-group">
				      <label for="exampleInputEmail1">Email Address</label>
				      <input type="text" name="email_address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email Address" value="<?php echo $fetch_data['email_address']; ?>">
				      <span class="text-danger"><?php echo form_error('username'); ?></span>
				    </div>
				    <div class="form-group">
				      <label for="exampleInputEmail1">Contact No.</label>
				      <input type="number" name="contact_no" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Contact No." value="0<?php echo $fetch_data['contact_no']; ?>">
				      <span class="text-danger"><?php echo form_error('username'); ?></span>
				    </div>
				    <div class="form-group">
				      <label for="exampleInputEmail1">Parents</label>
				      <input type="text" name="parents" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Parents name" value="<?php echo $fetch_data['parents']; ?>">
				      <span class="text-danger"><?php echo form_error('username'); ?></span>
				    </div>
				    <div class="form-group">
				      <label for="exampleInputEmail1">Parents Contact No.</label>
				      <input type="number" name="parents_contact_no" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter parents contact no." value="0<?php echo $fetch_data['parents_contact_no']; ?>">
				      <span class="text-danger"><?php echo form_error('username'); ?></span>
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