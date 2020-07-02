<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MINSCAT OJTPMESDA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/icon/css/all.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.min.css">
    <!-- <link rel="stylesheet" href="<?php //echo base_url(); ?>assets/css/style.css"> -->
    
  </head>
  <body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
      <div class="container">
      <a class="navbar-brand" href="#"><i class="fas fa-chart-line"></i>&nbspOJTPMESDA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
      	<ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(); ?>home/account_verify/<?= $this->session->userdata('username'); ?>">Requirements</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>home/logout">Logout</a>
            </li>
          </ul>
          </form>
        </div>
    </nav>

	<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php
			$aa = $fetch_data['username'];
			$a = $fetch_data['resume_status'];
			$b = $fetch_data['clearance_status'];
			$c = $fetch_data['waiver_status'];
			$d = $fetch_data['good_moral_status'];
			$e = $fetch_data['registration_status'];
			$f = $fetch_data['consent_status'];
			$g = $a+$b+$c+$d+$e+$f;

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
			    <a class="nav-link <?php echo $this->session->flashdata('good-moral-active'); ?>" data-toggle="tab" href="#good_moral">Good Moral</a>
			  </li>
			   <li class="nav-item">
			    <a class="nav-link <?php echo $this->session->flashdata('registration-active'); ?>" data-toggle="tab" href="#cor">Registration Form</a>
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

				if(!empty($fetch_data['resume'])) {
				  	if($fetch_data['resume'] != 'no_pdf.png') {
				  		$resume = explode('/',$fetch_data['resume']);
				  		$resume = end($resume);
				  		echo '<a href="'.base_url($fetch_data['resume']).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				  		<legend>'.$resume.'</legend>';
				    	if($fetch_data['resume_status'] == 0) {
				    		echo 'Status: Pending..';
				    	} else {
				    		echo 'Status: Approved';
				    	}
				    }
			  	}
			  	else{
			  		echo '<legend>No PDF Uploaded</legend><small>(Make sure you upload complete details about specific requirements needed)</small>';
			  		echo '<div class="col-md-4">
			  				<form method="POST" action="'.base_url('students/upload_resume/'.$this->session->userdata('username')).'" enctype="multipart/form-data">
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
				if(!empty($fetch_data['clearance'])) {
			  		if($fetch_data['clearance'] != 'no_pdf.png') {
			  			$clearance = explode('/',$fetch_data['clearance']);
				  		$clearance = end($clearance);
				  		echo '<a href="'.base_url($fetch_data['clearance']).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.$clearance.'</legend>';
				    	if($fetch_data['clearance_status'] == 0) {
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
			  				<form method="POST" action="'.base_url('students/upload_clearance/'.$this->session->userdata('username')).'" enctype="multipart/form-data">
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
				if(!empty($fetch_data['waiver'])) {
				  	if($fetch_data['waiver'] != 'no_pdf.png') {
				  		$waiver = explode('/',$fetch_data['waiver']);
				  		$waiver = end($waiver);
				  		echo '<a href="'.base_url($fetch_data['waiver']).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.$waiver.'</legend>';
				    	if($fetch_data['waiver_status'] == 0) {
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
			  				<form method="POST" action="'.base_url('students/upload_waiver/'.$this->session->userdata('username')).'" enctype="multipart/form-data">
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
				if(!empty($fetch_data['good_moral'])) {
				  	if($fetch_data['good_moral'] != 'no_pdf.png') {
				  		$good_moral = explode('/',$fetch_data['good_moral']);
				  		$good_moral = end($good_moral);
				  		echo '<a href="'.base_url($fetch_data['good_moral']).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.$good_moral.'</legend>';
				    	if($fetch_data['good_moral_status'] == 0) {
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
			  				<form method="POST" action="'.base_url('students/upload_good_moral/'.$this->session->userdata('username')).'" enctype="multipart/form-data">
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
				if(!empty($fetch_data['registration_form'])) {
				  	if($fetch_data['registration_form'] != 'no_pdf.png') {
				  		$registration_form = explode('/',$fetch_data['registration_form']);
				  		$registration_form = end($registration_form);
				  		echo '<a href="'.base_url($fetch_data['registration_form']).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.$registration_form.'</legend>';
				    	if($fetch_data['registration_status'] == 0) {
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
			  				<form method="POST" action="'.base_url('students/upload_registration_form/'.$this->session->userdata('username')).'" enctype="multipart/form-data">
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
				if(!empty($fetch_data['parents_consent'])) {
				  	if($fetch_data['parents_consent'] != 'no_pdf.png') {
				  		$parents_consent = explode('/',$fetch_data['parents_consent']);
				  		$parents_consent = end($parents_consent);
				  		echo '<a href="'.base_url($fetch_data['parents_consent']).'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
				    	<legend>'.$parents_consent.'</legend>';
				    	if($fetch_data['consent_status'] == 0) {
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
			  				<form method="POST" action="'.base_url('students/upload_consent/'.$this->session->userdata('username')).'" enctype="multipart/form-data">
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
<div class="container">
<footer id="footer" class="text-secondary">
        <div class="row">
          <div class="col-lg-12">

            <ul class="list-unstyled float-lg-right">
              <li><a href="#top">Back to top</a></li>
              
            </ul>
            <p>&copy; 2020-2021 OJT-PMESDA</p>
            <p>All Rights Reserved</p>
          </div>
        </div>

      </footer>
</div>

    </div>

    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

    <script type="text/javascript">
    	$(".btn").on("click", function (event) {         
            if ($(this).hasClass("disabled")) {
                event.stopPropagation()
            } else {
                $('#applyRemoveDialog').modal("show");
            }
        });
  </script>
  
  <script>
  // $.ajax({
  //   url: "<?php //echo base_url("Home/get_data"); ?>",
  //   type: "POST",
  //   cache: false,
  //   success: function(data){
  //     //alert(data);
  //     $('#table').html(data); 
  //   }
  // });
  </script>

  </body>
</html>
