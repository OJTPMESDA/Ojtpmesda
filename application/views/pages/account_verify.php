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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    
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
			    <a class="nav-link" data-toggle="tab" href="#cor">Registration Form</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" data-toggle="tab" href="#consent">Parents Consent</a>
			  </li>
			  
			</ul>
			<div id="myTabContent" class="tab-content">
			  <div class="tab-pane fade active show" id="resume">
			  	<center>
			  	<br>
			  	<?php 
			  	if($fetch_data['resume'] != 'no_pdf.png') {
			  		echo '<a href="'.base_url().'assets/pdf/'.$fetch_data['resume'].'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
			    <legend>'.$fetch_data['resume'].'</legend>';
			    	if($fetch_data['resume_status'] == 0) {
			    		echo 'Status: Pending..';
			    	}
			    	else{
			    		echo 'Status: Approved';
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

				<div class="tab-pane fade" id="clearance">
			  	<center>
			  	<br>
			  	<?php 
			  	if($fetch_data['clearance'] != 'no_pdf.png') {
			  		echo '<a href="'.base_url().'assets/pdf/'.$fetch_data['clearance'].'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
			    <legend>'.$fetch_data['clearance'].'</legend>';
			    	if($fetch_data['clearance_status'] == 0) {
			    		echo 'Status: Pending..';
			    	}
			    	else{
			    		echo 'Status: Approved';
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

				<div class="tab-pane fade" id="waiver">
			  	<center>
			  	<br>
			  	<?php 
			  	if($fetch_data['waiver'] != 'no_pdf.png') {
			  		echo '<a href="'.base_url().'assets/pdf/'.$fetch_data['waiver'].'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
			    <legend>'.$fetch_data['waiver'].'</legend>';
			    	if($fetch_data['waiver_status'] == 0) {
			    		echo 'Status: Pending..';
			    	}
			    	else{
			    		echo 'Status: Approved';
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

				<div class="tab-pane fade" id="good_moral">
			  	<center>
			  	<br>
			  	<?php 
			  	if($fetch_data['good_moral'] != 'no_pdf.png') {
			  		echo '<a href="'.base_url().'assets/pdf/'.$fetch_data['good_moral'].'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
			    <legend>'.$fetch_data['good_moral'].'</legend>';
			    	if($fetch_data['good_moral_status'] == 0) {
			    		echo 'Status: Pending..';
			    	}
			    	else{
			    		echo 'Status: Approved';
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

				<div class="tab-pane fade" id="cor">
			  	<center>
			  	<br>
			  	<?php 
			  	if($fetch_data['registration_form'] != 'no_pdf.png') {
			  		echo '<a href="'.base_url().'assets/pdf/'.$fetch_data['registration_form'].'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
			    <legend>'.$fetch_data['registration_form'].'</legend>';
			    	if($fetch_data['registration_status'] == 0) {
			    		echo 'Status: Pending..';
			    	}
			    	else{
			    		echo 'Status: Approved';
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


				<div class="tab-pane fade" id="consent">
			  	<center>
			  	<br>
			  	<?php 
			  	if($fetch_data['parents_consent'] != 'no_pdf.png') {
			  		echo '<a href="'.base_url().'assets/pdf/'.$fetch_data['parents_consent'].'" target="_blank"><img src="'.base_url().'assets/pdf/pdf.png" width="150px"></a>
			    <legend>'.$fetch_data['parents_consent'].'</legend>';
			    	if($fetch_data['consent_status'] == 0) {
			    		echo 'Status: Pending..';
			    	}
			    	else{
			    		echo 'Status: Approved';
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
  $.ajax({
    url: "<?php echo base_url("Home/get_data"); ?>",
    type: "POST",
    cache: false,
    success: function(data){
      //alert(data);
      $('#table').html(data); 
    }
  });
  </script>

  </body>
</html>
