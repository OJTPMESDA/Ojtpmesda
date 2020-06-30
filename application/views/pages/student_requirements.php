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
	?>
	<legend>@<?= $fetch_data['username'].' '.$g.'/6'; ?></legend>
	<ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#resume">Resume</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#clearance">Clearance</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#waiver">Waiver</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#good_moral">Good Moral</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#registration_form">Registration Form</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#parents_consent">Parents Consent</a>
        </li>
    </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade show active" id="resume">
            	<center>
			  	<br>
                <?php
                if(!empty($fetch_data['resume'])) {
				  	if($fetch_data['resume'] != 'no_pdf.png') {
				  		echo '<a href="'.base_url($fetch_data['resume']).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.end(explode('/',$fetch_data['resume'])).'</legend>';
				    	if($fetch_data['resume_status'] == 0) {
				    		echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
				    		echo '<a href="'.base_url('admin/confirm_resume/'.$fetch_data['studentID'].'').'" class="btn btn-success"><i class="fas fa-check"></i></a>';
				    		echo '<a href="'.base_url('admin/decline_resume/'.$fetch_data['studentID'].'').'" class="btn btn-danger"><i class="fas fa-times"></i></a>';
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

            <div class="tab-pane fade" id="clearance">
            	<center>
			  	<br>
                <?php 
                if(!empty($fetch_data['clearance'])) {
				  	if($fetch_data['clearance'] != 'no_pdf.png') {
				  		echo '<a href="'.base_url($fetch_data['clearance']).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.end(explode('/',$fetch_data['clearance'])).'</legend>';
				    	if($fetch_data['clearance_status'] == 0) {
				    		echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
				    		echo '<a href="'.base_url('admin/confirm_clearance/'.$fetch_data['studentID'].'').'" class="btn btn-success"><i class="fas fa-check"></i></a>';
				    		echo '<a href="'.base_url('admin/decline_clearance/'.$fetch_data['studentID'].'').'" class="btn btn-danger"><i class="fas fa-times"></i></a>';
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

            <div class="tab-pane fade" id="waiver">
            	<center>
			  	<br>
                <?php
                if(!empty($fetch_data['waiver'])) {
				  	if($fetch_data['waiver'] != 'no_pdf.png') {
				  		echo '<a href="'.base_url($fetch_data['waiver']).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.end(explode('/',$fetch_data['waiver'])).'</legend>';
				    	if($fetch_data['waiver_status'] == 0) {
				    		echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
				    		echo '<a href="'.base_url('admin/confirm_waiver/'.$fetch_data['username'].'').'" class="btn btn-success"><i class="fas fa-check"></i></a>';
				    		echo '<a href="'.base_url('admin/decline_waiver/'.$fetch_data['username'].'').'" class="btn btn-danger"><i class="fas fa-times"></i></a>';
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

            <div class="tab-pane fade" id="good_moral">
            	<center>
			  	<br>
                <?php
                if(!empty($fetch_data['good_moral'])) {
				  	if($fetch_data['good_moral'] != 'no_pdf.png') {
				  		echo '<a href="'.base_url($fetch_data['good_moral']).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.end(explode('/',$fetch_data['good_moral'])).'</legend>';
				    	if($fetch_data['good_moral_status'] == 0) {
				    		echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
				    		echo '<a href="'.base_url('admin/confirm_good_moral/'.$fetch_data['username'].'').'" class="btn btn-success"><i class="fas fa-check"></i></a>';
				    		echo '<a href="'.base_url('admin/decline_good_moral/'.$fetch_data['username'].'').'" class="btn btn-danger"><i class="fas fa-times"></i></a>';
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

            <div class="tab-pane fade" id="registration_form">
            	<center>
			  	<br>
                <?php
                if(!empty($fetch_data['registration_form'])) {
				  	if($fetch_data['registration_form'] != 'no_pdf.png') {
				  		echo '<a href="'.base_url($fetch_data['registration_form']).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.end(explode('/',$fetch_data['registration_form'])).'</legend>';
				    	if($fetch_data['registration_status'] == 0) {
				    		echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
				    		echo '<a href="'.base_url('admin/confirm_registration/'.$fetch_data['username'].'').'" class="btn btn-success"><i class="fas fa-check"></i></a>';
				    		echo '<a href="'.base_url('admin/decline_registration/'.$fetch_data['username'].'').'" class="btn btn-danger"><i class="fas fa-times"></i></a>';
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

            <div class="tab-pane fade" id="parents_consent">
            	<center>
			  	<br>
                <?php
                if(!empty($fetch_data['parents_consent'])) {
				  	if($fetch_data['parents_consent'] != 'no_pdf.png') {
				  		echo '<a href="'.base_url($fetch_data['parents_consent']).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.end(explode('/',$fetch_data['parents_consent'])).'</legend>';
				    	if($fetch_data['consent_status'] == 0) {
				    		echo '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
				    		echo '<a href="'.base_url('admin/confirm_consent/'.$fetch_data['username'].'').'" class="btn btn-success"><i class="fas fa-check"></i></a>';
				    		echo '<a href="'.base_url('admin/decline_consent/'.$fetch_data['username'].'').'" class="btn btn-danger"><i class="fas fa-times"></i></a>';
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