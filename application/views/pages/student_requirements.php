<div class="container">
	<?php
	$aa = $fetch_data['studentID'];
	$a = $fetch_data['resume_status'];
	$b = $fetch_data['clearance_status'];
	$c = $fetch_data['waiver_status'];
	$d = $fetch_data['good_moral_status'];
	$e = $fetch_data['registration_status'];
	$f = $fetch_data['consent_status'];
	$g = $a+$b+$c+$d+$e+$f;
	if($g == 6){
		$aab = array(
			'pending' => 1
		);
			$this->db->where('id', $aa);
			$this->db->update('students', $aab);
	}

	if ($this->session->flashdata('remove')) {
		$active = null;
		$show = null;
	} else {
		$active = 'active';
		$show = 'show';
	}
	?>
	<legend>@<?= $fetch_data['username'].' '.$g.'/6'; ?></legend>
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
            <a class="nav-link <?php echo $this->session->flashdata('good-moral-active');?>" data-toggle="tab" href="#good_moral">Good Moral</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo $this->session->flashdata('registration-active'); ?>" data-toggle="tab" href="#registration_form">Registration Form</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo $this->session->flashdata('consent-active'); ?>" data-toggle="tab" href="#parents_consent">Parents Consent</a>
        </li>
    </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade <?php echo $active.' '.$show; ?>" id="resume">
            	<center>
			  	<br>
                <?php
                if(!empty($fetch_data['resume'])) {
				  	if($fetch_data['resume'] != 'no_pdf.png') {
				  		$resume = explode('/',$fetch_data['resume']);
				  		$resume = end($resume);
				  		echo '<a href="'.base_url($fetch_data['resume']).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.$resume.'</legend>';
				    	if($fetch_data['resume_status'] == 0) {
				    		echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
				    		echo '<a href="'.base_url('confirm/resume/'.$fetch_data['studentID'].'').'" class="btn btn-success"><i class="fas fa-check"></i></a>';
				    		echo '<a href="'.base_url('decline/resume/'.$fetch_data['studentID'].'').'" class="btn btn-danger"><i class="fas fa-times"></i></a>';
				    		echo '</div>';
				    	}
				    	else{
				    		echo 'Status: Approved';
				    	}
				    } else {
				    	echo '<legend>No PDF Uploaded</legend>';
				    }
			    	
			  	} else {
			  		echo '<legend>No PDF Uploaded</legend>';
			  	}
			  	?>
			    </center>
            </div>

            <div class="tab-pane fade <?php echo ($this->session->flashdata('clearance-active')) ? $this->session->flashdata('clearance-active').' show' : null; ?>" id="clearance">
            	<center>
			  	<br>
                <?php 
                if(!empty($fetch_data['clearance'])) {
				  	if($fetch_data['clearance'] != 'no_pdf.png') {
				  		$clearance = explode('/',$fetch_data['clearance']);
				  		$clearance = end($clearance);
				  		echo '<a href="'.base_url($fetch_data['clearance']).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.$clearance.'</legend>';
				    	if($fetch_data['clearance_status'] == 0) {
				    		echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
				    		echo '<a href="'.base_url('confirm/clearance/'.$fetch_data['studentID'].'').'" class="btn btn-success"><i class="fas fa-check"></i></a>';
				    		echo '<a href="'.base_url('decline/clearance/'.$fetch_data['studentID'].'').'" class="btn btn-danger"><i class="fas fa-times"></i></a>';
				    		echo '</div>';
				    	}
				    	else{
				    		echo 'Status: Approved';
				    	}
				    } else {
				    	echo '<legend>No PDF Uploaded</legend>';
				    }
			  	}
			  	else{
			  		echo '<legend>No PDF Uploaded</legend>';
			  	}
			  	?>
			    </center>
            </div>

            <div class="tab-pane fade <?php echo ($this->session->flashdata('waiver-active')) ? $this->session->flashdata('waiver-active').' show' : null; ?>" id="waiver">
            	<center>
			  	<br>
                <?php
                if(!empty($fetch_data['waiver'])) {
				  	if($fetch_data['waiver'] != 'no_pdf.png') {
				  		$waiver = explode('/',$fetch_data['waiver']);
				  		$waiver = end($waiver);
				  		echo '<a href="'.base_url($fetch_data['waiver']).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.$waiver.'</legend>';
				    	if($fetch_data['waiver_status'] == 0) {
				    		echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
				    		echo '<a href="'.base_url('confirm/waiver/'.$fetch_data['studentID'].'').'" class="btn btn-success"><i class="fas fa-check"></i></a>';
				    		echo '<a href="'.base_url('decline/waiver/'.$fetch_data['studentID'].'').'" class="btn btn-danger"><i class="fas fa-times"></i></a>';
				    		echo '</div>';
				    	}
				    	else{
				    		echo 'Status: Approved';
				    	}
				    } else {
				    	echo '<legend>No PDF Uploaded</legend>';
				    }
			    	
			  	}
			  	else{
			  		echo '<legend>No PDF Uploaded</legend>';
			  	}
			  	?>
			    </center>
            </div>

            <div class="tab-pane fade <?php echo ($this->session->flashdata('good-moral-active')) ? $this->session->flashdata('good-moral-active').' show' : null; ?>" id="good_moral">
            	<center>
			  	<br>
                <?php
                if(!empty($fetch_data['good_moral'])) {
				  	if($fetch_data['good_moral'] != 'no_pdf.png') {
				  		$good_moral = explode('/',$fetch_data['good_moral']);
				  		$good_moral = end($good_moral);
				  		echo '<a href="'.base_url($fetch_data['good_moral']).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.$good_moral.'</legend>';
				    	if($fetch_data['good_moral_status'] == 0) {
				    		echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
				    		echo '<a href="'.base_url('confirm/good-moral/'.$fetch_data['studentID'].'').'" class="btn btn-success"><i class="fas fa-check"></i></a>';
				    		echo '<a href="'.base_url('decline/good-moral/'.$fetch_data['studentID'].'').'" class="btn btn-danger"><i class="fas fa-times"></i></a>';
				    		echo '</div>';
				    	}
				    	else{
				    		echo 'Status: Approved';
				    	}
				    } else {
				    	echo '<legend>No PDF Uploaded</legend>';
				    }
			    	
			  	}
			  	else{
			  		echo '<legend>No PDF Uploaded</legend>';
			  	}
			  	?>
			    </center>
            </div>

            <div class="tab-pane fade <?php echo ($this->session->flashdata('registration-active')) ? $this->session->flashdata('registration-active').' show' : null; ?>" id="registration_form">
            	<center>
			  	<br>
                <?php
                if(!empty($fetch_data['registration_form'])) {
				  	if($fetch_data['registration_form'] != 'no_pdf.png') {
				  		$registration_form = explode('/',$fetch_data['registration_form']);
				  		$registration_form = end($registration_form);
				  		echo '<a href="'.base_url($fetch_data['registration_form']).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.$registration_form.'</legend>';
				    	if($fetch_data['registration_status'] == 0) {
				    		echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
				    		echo '<a href="'.base_url('confirm/registration/'.$fetch_data['studentID'].'').'" class="btn btn-success"><i class="fas fa-check"></i></a>';
				    		echo '<a href="'.base_url('decline/registration/'.$fetch_data['studentID'].'').'" class="btn btn-danger"><i class="fas fa-times"></i></a>';
				    		echo '</div>';
				    	}
				    	else{
				    		echo 'Status: Approved';
				    	}
				    } else {
				    	echo '<legend>No PDF Uploaded</legend>';
				    }
			    	
			  	}
			  	else{
			  		echo '<legend>No PDF Uploaded</legend>';
			  	}
			  	?>
			    </center>
            </div>

            <div class="tab-pane fade <?php echo ($this->session->flashdata('consent-active')) ? $this->session->flashdata('consent-active').' show' : null; ?>" id="parents_consent">
            	<center>
			  	<br>
                <?php
                if(!empty($fetch_data['parents_consent'])) {
				  	if($fetch_data['parents_consent'] != 'no_pdf.png') {
				  		$parents_consent = explode('/',$fetch_data['parents_consent']);
				  		$parents_consent = end($parents_consent);
				  		echo '<a href="'.base_url($fetch_data['parents_consent']).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.$parents_consent.'</legend>';
				    	if($fetch_data['consent_status'] == 0) {
				    		echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
				    		echo '<a href="'.base_url('confirm/consent/'.$fetch_data['studentID'].'').'" class="btn btn-success"><i class="fas fa-check"></i></a>';
				    		echo '<a href="'.base_url('decline/consent/'.$fetch_data['studentID'].'').'" class="btn btn-danger"><i class="fas fa-times"></i></a>';
				    		echo '</div>';
				    	}
				    	else{
				    		echo 'Status: Approved';
				    	}
				    } else {
				    	echo '<legend>No PDF Uploaded</legend>';
				    }
			  	}
			  	else{
			  		echo '<legend>No PDF Uploaded</legend>';
			  	}
			  	?>
			    </center>
            </div>
        </div>
</div>