

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php
			if ($this->session->flashdata('remove')) {
				$active = null;
				$show = null;
			} else {
				$active = 'active';
				$show = 'show';
			}
			?>
			<legend>@<?= $this->session->username.' '.$results->requirementsCount.'/6'; ?></legend>
			<ul class="nav nav-tabs">
			  <li class="nav-item">
			    <a class="nav-link <?php echo $active; echo $this->session->flashdata('resume-active'); ?>" data-toggle="tab" href="#resume">Resume</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link <?php echo $this->session->flashdata('clearance-active'); ?>" data-toggle="tab" href="#clearance">Clearance</a>
			  </li>
			   <li class="nav-item">
			    <a class="nav-link <?php echo $this->session->flashdata('waiver-active'); ?>" data-toggle="tab" href="#waiver">Waiver</a>
			  </li>
			   <li class="nav-item">
			    <a class="nav-link <?php echo $this->session->flashdata('good-moral-active'); ?>" data-toggle="tab" href="#good_moral">Good Moral</a>
			  </li>
			   <li class="nav-item">
			    <a class="nav-link <?php echo $this->session->flashdata('registration-active'); ?>" data-toggle="tab" href="#cor">Certificate of Registration</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link <?php echo $this->session->flashdata('consent-active'); ?>" data-toggle="tab" href="#consent">Parents Consent</a>
			  </li>
			  
			</ul>
			<div id="myTabContent" class="tab-content">
			  <div class="tab-pane fade <?php echo ($this->session->flashdata('resume-active')) ? $this->session->flashdata('resume-active').' show' : $active.' '.$show; ?>" id="resume">
			  	<center>
			  	<br>
			  	<?php
				if($this->session->flashdata('resume-error')) {
					echo '<p class="text-danger">'.$this->session->flashdata('resume-error').'</p>';
				}

				if(!empty($results->resume)) {
				  	if($results->resume != 'no_pdf.png') {
				  		$resume = explode('/',$results->resume);
				  		$resume = end($resume);
				  		echo '<a href="'.base_url($results->resume).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				  		<legend>'.$resume.'</legend>';
				    	if($results->resume_status == 0) {
				    		echo 'Status: Pending..';
				    	} else {
				    		echo 'Status: Approved';
				    	}
				    }
			  	} else {
			  		echo '<legend>No PDF Uploaded</legend><small>(Make sure you upload complete details about specific requirements needed)</small>';
			  		echo '<div class="col-md-4">
			  				<form method="POST" action="'.base_url('upload/resume/').'" enctype="multipart/form-data">
						  	<div class="form-group">
						    <div class="input-group mb-3">
						      <div class="custom-file">
						        <input type="file" class="custom-file-input" name="userfile">
						        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
						      </div>
						      <div class="input-group-append">
						        <button type="submit" class="btn btn-success">Upload</button>
						      </div>
						    </div>
						  </div>
						</form>
						</div>';
			  	}
			  	?>
			  	</center>
				</div>

				<div class="tab-pane fade <?php echo ($this->session->flashdata('clearance-active')) ? $this->session->flashdata('clearance-active').' show' : null; ?>" id="clearance">
			  	<center>
			  	<br>
			  	<?php
			  	if($this->session->flashdata('clearance-error')) {
					echo '<p class="text-danger">'.$this->session->flashdata('clearance-error').'</p>';
				}
				if(!empty($results->clearance)) {
			  		if($results->clearance != 'no_pdf.png') {
			  			$clearance = explode('/',$results->clearance);
				  		$clearance = end($clearance);
				  		echo '<a href="'.base_url($results->clearance).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.$clearance.'</legend>';
				    	if($results->clearance_status == 0) {
				    		echo 'Status: Pending..';
				    	}
				    	else{
				    		echo 'Status: Approved';
				    	}
				    }
			  	} else {
			  		echo '<legend>No PDF Uploaded</legend><small>(Make sure you upload complete details about specific requirements needed)</small>';
			  		echo '<div class="col-md-4">
			  				<form method="POST" action="'.base_url('upload/clearance').'" enctype="multipart/form-data">
							  	<div class="form-group">
							    <div class="input-group mb-3">
							      <div class="custom-file">
							        <input type="file" class="custom-file-input" name="userfile">
							        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
							      </div>
							      <div class="input-group-append">
							        <button type="submit" class="btn btn-success">Upload</button>
							      </div>
							    </div>
							  </div>
							</form>
						</div>';
			  	}
			  	?>
			  	</center>
				</div>

				<div class="tab-pane fade <?php echo ($this->session->flashdata('waiver-active')) ? $this->session->flashdata('waiver-active').' show' : null; ?>" id="waiver">
			  	<center>
			  	<br>
			  	<?php 
			  	if($this->session->flashdata('waiver-error')) {
					echo '<p class="text-danger">'.$this->session->flashdata('waiver-error').'</p>';
				}
				if(!empty($results->waiver)) {
				  	if($results->waiver != 'no_pdf.png') {
				  		$waiver = explode('/',$results->waiver);
				  		$waiver = end($waiver);
				  		echo '<a href="'.base_url($results->waiver).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.$waiver.'</legend>';
				    	if($results->waiver_status == 0) {
				    		echo 'Status: Pending..';
				    	}
				    	else{
				    		echo 'Status: Approved';
				    	}
				    }
			  	}
			  	else{
			  		echo '<legend>No PDF Uploaded</legend><small>(Make sure you upload complete details about specific requirements needed)</small>';
			  		echo '<div class="col-md-4">
			  				<form method="POST" action="'.base_url('upload/waiver').'" enctype="multipart/form-data">
						  	<div class="form-group">
						    <div class="input-group mb-3">
						      <div class="custom-file">
						        <input type="file" class="custom-file-input" name="userfile">
						        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
						      </div>
						      <div class="input-group-append">
						        <button type="submit" class="btn btn-success">Upload</button>
						      </div>
						    </div>
						  </div>
						</form>
						</div>';
			  	}
			  	?>
			  	</center>
				</div>

				<div class="tab-pane fade <?php echo ($this->session->flashdata('good-moral-active')) ? $this->session->flashdata('good-moral-active').' show' : null; ?>" id="good_moral">
			  	<center>
			  	<br>
			  	<?php 
			  	if($this->session->flashdata('good-moral-error')) {
					echo '<p class="text-danger">'.$this->session->flashdata('good-moral-error').'</p>';
				}
				if(!empty($results->good_moral)) {
				  	if($results->good_moral != 'no_pdf.png') {
				  		$good_moral = explode('/',$results->good_moral);
				  		$good_moral = end($good_moral);
				  		echo '<a href="'.base_url($results->good_moral).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.$good_moral.'</legend>';
				    	if($results->good_moral_status == 0) {
				    		echo 'Status: Pending..';
				    	}
				    	else{
				    		echo 'Status: Approved';
				    	}
				    }
			  	}
			  	else{
			  		echo '<legend>No PDF Uploaded</legend><small>(Make sure you upload complete details about specific requirements needed)</small>';
			  		echo '<div class="col-md-4">
			  				<form method="POST" action="'.base_url('upload/good-moral').'" enctype="multipart/form-data" class="good-moral">
							  	<div class="form-group">
							    <div class="input-group mb-3">
							      <div class="custom-file">
							        <input type="file" class="custom-file-input" name="userfile">
							        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
							      </div>
							      <div class="input-group-append">
							        <button type="submit" class="btn btn-success">Upload</button>
							      </div>
							    </div>
							  </div>
							</form>
						</div>';
			  	}
			  	?>
			  	</center>
				</div>

				<div class="tab-pane fade <?php echo ($this->session->flashdata('registration-active')) ? $this->session->flashdata('registration-active').' show' : null; ?>" id="cor">
			  	<center>
			  	<br>
			  	<?php
			  	if($this->session->flashdata('registration-error')) {
					echo '<p class="text-danger">'.$this->session->flashdata('registration-error').'</p>';
				}
				if(!empty($results->registration_form)) {
				  	if($results->registration_form != 'no_pdf.png') {
				  		$registration_form = explode('/',$results->registration_form);
				  		$registration_form = end($registration_form);
				  		echo '<a href="'.base_url($results->registration_form).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.$registration_form.'</legend>';
				    	if($results->registration_status == 0) {
				    		echo 'Status: Pending..';
				    	}
				    	else{
				    		echo 'Status: Approved';
				    	}
				    }
			  	}
			  	else{
			  		echo '<legend>No PDF Uploaded</legend><small>(Make sure you upload complete details about specific requirements needed)</small>';
			  		echo '<div class="col-md-4">
			  				<form method="POST" action="'.base_url('upload/registration-form/').'" enctype="multipart/form-data">
						  	<div class="form-group">
						    <div class="input-group mb-3">
						      <div class="custom-file">
						        <input type="file" class="custom-file-input" name="userfile">
						        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
						      </div>
						      <div class="input-group-append">
						        <button type="submit" class="btn btn-success">Upload</button>
						      </div>
						    </div>
						  </div>
						</form>
						</div>';
			  	}
			  	?>
			  	</center>
				</div>
				<div class="tab-pane fade <?php echo ($this->session->flashdata('consent-active')) ? $this->session->flashdata('consent-active').' show' : null; ?>" id="consent">
			  	<center>
			  	<br>
			  	<?php
			  	if($this->session->flashdata('consent-error')) {
					echo '<p class="text-danger">'.$this->session->flashdata('consent-error').'</p>';
				}
				if(!empty($results->parents_consent)) {
				  	if($results->parents_consent != 'no_pdf.png') {
				  		$parents_consent = explode('/',$results->parents_consent);
				  		$parents_consent = end($parents_consent);
				  		echo '<a href="'.base_url($results->parents_consent).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.$parents_consent.'</legend>';
				    	if($results->consent_status == 0) {
				    		echo 'Status: Pending..';
				    	}
				    	else{
				    		echo 'Status: Approved';
				    	}
				    }
			  	}
			  	else{
			  		echo '<legend>No PDF Uploaded</legend><small>(Make sure you upload complete details about specific requirements needed)</small>';
			  		echo '<div class="col-md-4">
			  				<form method="POST" action="'.base_url('upload/consent/').'" enctype="multipart/form-data">
						  	<div class="form-group">
						    <div class="input-group mb-3">
						      <div class="custom-file">
						        <input type="file" class="custom-file-input" name="userfile">
						        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
						      </div>
						      <div class="input-group-append">
						        <button type="submit" class="btn btn-success">Upload</button>
						      </div>
						    </div>
						  </div>
						</form>
						</div>';
			  	}
			  	?>
			  	</center>
				</div>

			</div>
		</div>
	</div>
</div>