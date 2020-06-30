<div class="container">
	<div class="row">
		<div class="col-md-12">
		<legend>List of Pending Student</legend>
		<table class="table table-responsive">
		  <thead>
		    <tr>
		      <th scope="col">NO.</th>
		      <th scope="col">IMAGE</th>
		      <th scope="col">NAME</th>
		      <th scope="col">ADDRESS</th>
		      <th scope="col">CONTACT</th>
		      <th scope="col">STATUS</th>
		      <th scope="col">OJT REQUIREMENTS</th>
		      <th scope="col">ACTION</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
		  	$counter = 1; 
		  	if (empty($fetch_data)) {
		  		echo '<td>No Student Request</td>';
		  	}
		  	?>
		  	<?php foreach ($fetch_data as $row): ?>
		  		<?php $path = (!empty($row->user_image)) ? base_url($row->user_image) : 'assets/images/no_image.png' ;?>
		    <tr class="table-bordered">
		      <th scope="row"><?php echo $counter++; ?></th>
		      <td><img src="<?php echo $path; ?>" class="rounded-circle" height="60px"></td>
		      <td><?php echo $row->name;?></td>
		      <td><?php echo $row->address;?></td>
		      <td>0<?php echo $row->contact_no;?></td>
		      <td>
		      	<?php 
		      	if($row->status == 0)
		      	{
		      		echo '<span class="badge badge-danger">Pending</span>';
		      	}
		      	else
		      	{
		      		echo '<span class="badge badge-success">Confirm</span>';
		      	}
		      	?>
		      </td>
		      <td class="text-center">
		      	<?php
		      	$this->db->where('studentID', $row->id);
		      	$data = $this->db->get('requirements');
		      	$g = 0;
		      	foreach ($data->result() as $key) {
			      	$a = $key->resume_status;
			      	$b = $key->clearance_status;
			      	$c = $key->waiver_status;
			      	$d = $key->good_moral_status;
			      	$e = $key->registration_status;
			      	$f = $key->consent_status;
			      	$g = $a+$b+$c+$d+$e+$f;
			      	$h = $g*16.66;
		      	}
		      	?>
		      	<small><?php echo $g; ?>/6</small>
		      	<div class="progress">
				  <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: <?php echo $h; ?>0%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
		      </td>
		      <td>
				<div class="btn-group btn-group-toggle" data-toggle="buttons">
					<?php if($row->pending == 0)
					{
						echo '<label class="btn btn-secondary btn-sm">
							    <a href="#" class="btn btn-sm disabled" style="color: #fff;" data-toggle="modal" data-target="#'.$row->username.'"><i class="fas fa-check"></i></a>
							  </label>';
					}
					else{
						echo '<label class="btn btn-success btn-sm">
							    <a href="#" class="btn btn-sm" style="color: #fff;" data-toggle="modal" data-target="#'.$row->username.'"><i class="fas fa-check"></i></a>
							  </label>';
					}
					?>
				  
				  <label class="btn btn-primary btn-sm">
				    <a href="<?= base_url(); ?>Students/students_requirements/<?php echo $row->username; ?>" class="btn btn-sm" style="color: #fff;"><i class="fas fa-chart-bar"></i></a>
				  </label>
				  <label class="btn btn-danger btn-sm">
				    <a href="<?= base_url(); ?>students/delete_request/<?php echo $row->username; ?>" class="btn btn-sm" style="color: #fff;"><i class="fas fa-trash-alt"></i></a>
				  </label>
				</div>
		      </td>
		    </tr>

		    <div id="<?php echo $row->username; ?>" class="modal" tabindex="-1" role="dialog">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header bg-primary">
			        <h5 class="modal-title" style="color:#fff;">OJT DEPLOYMENT</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form method="post" action="<?php echo base_url(); ?>students/confirm_student/<?php echo $row->username; ?>">
						  	<fieldset>
							  	<div class="form-group">
							    	<label for="exampleInputEmail1">SELECT COMPANY</label>
								    <select class="custom-select" name="company">
								    	<?php 
								  		$data = $this->db->query('SELECT * FROM admin WHERE status = 1');
								  		if (empty($data->result())) {
								  				echo '<option>No Company Found</option>';
								  			}
								  		foreach ($data->result() as $row) {
								  			echo '<option value="'.$row->id.'">'.$row->company_name.'</option>';
								  		}
								  		?>
								    </select>
								</div>
							</fieldset>
			      </div>
			      <div class="modal-footer">
			      	<?php 
						$data = $this->db->query('SELECT * FROM admin WHERE status = 1');
							if (empty($data->result())) {
								echo '<button type="button" class="btn btn-secondary disabled btn-sm">Confirm</button>';
							}
							else{
								echo '<button type="submit" class="btn btn-primary btn-sm">Confirm</button>';
							}
						?>
			        
			        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
			      </div>
			      </form>
			    </div>
			  </div>
			</div>

			
		    <?php endforeach; ?>
		  </tbody>
		</table> 
	</div>
</div>
</div>



