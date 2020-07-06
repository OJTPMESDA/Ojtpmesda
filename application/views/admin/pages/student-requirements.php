<div class="container">
	<?php
	if ($this->session->flashdata('remove')) {
		$active = null;
		$show = null;
	} else {
		$active = 'active';
		$show = 'show';
	}
	?>
	<legend>@<?= $results->USERNAME.' '.$results->requirementsCount.'/6'; ?></legend>
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
            <a class="nav-link <?php echo $this->session->flashdata('registration-active'); ?>" data-toggle="tab" href="#registration_form">Certificate of Registration</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo $this->session->flashdata('consent-active'); ?>" data-toggle="tab" href="#parents_consent">Parents Consent</a>
        </li>
    </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade <?php echo ($this->session->flashdata('resume-active')) ? $this->session->flashdata('resume-active').' show' : $active.' '.$show; ?>" id="resume">
            	<center>
			  	<br>
                <?php
                if(!empty($results->resume)) {
				  	if($results->resume != 'no_pdf.png') {
				  		$resume = explode('/',$results->resume);
				  		$resume = end($resume);
				  		echo '<a href="'.base_url($results->resume).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.$resume.'</legend>';
				    	if($results->resume_status == 0) {
				    		echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
				    		echo '<a href="'.base_url('confirm/resume/'.$results->studentID.'').'" class="btn btn-success"><i class="fas fa-check"></i></a>';
				    		echo '<a href="'.base_url('decline/resume/'.$results->studentID.'').'" class="btn btn-danger"><i class="fas fa-times"></i></a>';
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
                if(!empty($results->clearance)) {
				  	if($results->clearance != 'no_pdf.png') {
				  		$clearance = explode('/',$results->clearance);
				  		$clearance = end($clearance);
				  		echo '<a href="'.base_url($results->clearance).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.$clearance.'</legend>';
				    	if($results->clearance_status == 0) {
				    		echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
				    		echo '<a href="'.base_url('confirm/clearance/'.$results->studentID.'').'" class="btn btn-success"><i class="fas fa-check"></i></a>';
				    		echo '<a href="'.base_url('decline/clearance/'.$results->studentID.'').'" class="btn btn-danger"><i class="fas fa-times"></i></a>';
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
                if(!empty($results->waiver)) {
				  	if($results->waiver != 'no_pdf.png') {
				  		$waiver = explode('/',$results->waiver);
				  		$waiver = end($waiver);
				  		echo '<a href="'.base_url($results->waiver).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.$waiver.'</legend>';
				    	if($results->waiver_status == 0) {
				    		echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
				    		echo '<a href="'.base_url('confirm/waiver/'.$results->studentID.'').'" class="btn btn-success"><i class="fas fa-check"></i></a>';
				    		echo '<a href="'.base_url('decline/waiver/'.$results->studentID.'').'" class="btn btn-danger"><i class="fas fa-times"></i></a>';
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
                if(!empty($results->good_moral)) {
				  	if($results->good_moral != 'no_pdf.png') {
				  		$good_moral = explode('/',$results->good_moral);
				  		$good_moral = end($good_moral);
				  		echo '<a href="'.base_url($results->good_moral).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.$good_moral.'</legend>';
				    	if($results->good_moral_status == 0) {
				    		echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
				    		echo '<a href="'.base_url('confirm/good-moral/'.$results->studentID.'').'" class="btn btn-success"><i class="fas fa-check"></i></a>';
				    		echo '<a href="'.base_url('decline/good-moral/'.$results->studentID.'').'" class="btn btn-danger"><i class="fas fa-times"></i></a>';
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
                if(!empty($results->registration_form)) {
				  	if($results->registration_form != 'no_pdf.png') {
				  		$registration_form = explode('/',$results->registration_form);
				  		$registration_form = end($registration_form);
				  		echo '<a href="'.base_url($results->registration_form).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.$registration_form.'</legend>';
				    	if($results->registration_status == 0) {
				    		echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
				    		echo '<a href="'.base_url('confirm/registration/'.$results->studentID.'').'" class="btn btn-success"><i class="fas fa-check"></i></a>';
				    		echo '<a href="'.base_url('decline/registration/'.$results->studentID.'').'" class="btn btn-danger"><i class="fas fa-times"></i></a>';
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
                if(!empty($results->parents_consent)) {
				  	if($results->parents_consent != 'no_pdf.png') {
				  		$parents_consent = explode('/',$results->parents_consent);
				  		$parents_consent = end($parents_consent);
				  		echo '<a href="'.base_url($results->parents_consent).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.$parents_consent.'</legend>';
				    	if($results->consent_status == 0) {
				    		echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
				    		echo '<a href="'.base_url('confirm/consent/'.$results->studentID.'').'" class="btn btn-success"><i class="fas fa-check"></i></a>';
				    		echo '<a href="'.base_url('decline/consent/'.$results->studentID.'').'" class="btn btn-danger"><i class="fas fa-times"></i></a>';
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