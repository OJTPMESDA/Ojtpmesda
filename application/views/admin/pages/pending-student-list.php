<div class="container">
	<div class="row">
		<div class="col-md-12">
		<legend>List of Pending Student</legend>
		<table class="table table-responsive pending-student-list">
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
		  	if (!empty($results)):?>
		  	<?php foreach ($results as $row): ?>
		  		<?php 
			  		$total = array_sum(
						[
							$row->resume_status,
							$row->clearance_status,
							$row->waiver_status,
							$row->good_moral_status,
							$row->registration_status,
							$row->consent_status
						]
					);

					$progress = $total * 16.66;
				?>
		  		<?php $path = (!empty($row->USER_PHOTO)) ? base_url($row->USER_PHOTO) : base_url('assets/images/no_image.png') ;?>
		    <tr class="table-bordered">
		      <th scope="row"><?php echo $counter++; ?></th>
		      <td><img src="<?php echo $path; ?>" class="rounded-circle" height="60px"></td>
		      <td><?php echo $row->FULL_NAME;?></td>
		      <td><?php echo $row->ADDRESS;?></td>
		      <td><?php echo $row->CONTACT_NO;?></td>
		      <td>
		      	<?php 
		      	if($row->status == 0) {
		      		echo '<span class="badge badge-danger">Pending</span>';
		      	} else {
		      		echo '<span class="badge badge-success">Confirm</span>';
		      	}
		      	?>
		      </td>
		      <td class="text-center">
		      	<small><?php echo $total; ?>/6</small>
		      	<div class="progress">
				  <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: <?php echo $progress; ?>0%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
		      </td>
		      <td>
				<div class="btn-group btn-group-toggle" data-toggle="buttons">
					<?php if($row->STUDENT_STATUS == 0){
						echo '<label class="btn btn-secondary btn-sm">
							    <a href="#" class="btn btn-sm disabled" style="color: #fff;" data-toggle="modal" data-target="#'.$row->USERNAME.'"><i class="fas fa-check"></i></a>
							  </label>';
					} else {
						echo '<label class="btn btn-success btn-sm">
							    <a href="#" class="btn btn-sm" style="color: #fff;" data-toggle="modal" data-target="#'.$row->USERNAME.'"><i class="fas fa-check"></i></a>
							  </label>';
					}
					?>
				  
				  <label class="btn btn-primary btn-sm">
				    <a href="<?= base_url('students/requirements/'.$row->USERID); ?>" class="btn btn-sm" style="color: #fff;"><i class="fas fa-chart-bar"></i></a>
				  </label>
				  <label class="btn btn-danger btn-sm">
				    <a href="<?= base_url('students/requirements/delete/'.$row->USERID); ?>" class="btn btn-sm" style="color: #fff;"><i class="fas fa-trash-alt"></i></a>
				  </label>
				</div>
		      </td>
		    </tr>

		    <div id="<?php echo $row->USERNAME; ?>" class="modal" tabindex="-1" role="dialog">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header bg-primary">
			        <h5 class="modal-title" style="color:#fff;">OJT DEPLOYMENT</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form method="post" class="deployment-form" action="<?php echo base_url('students/confirm/'.$row->USERID); ?>">
					  	<fieldset>
						  	<div class="form-group">
						    	<label for="exampleInputEmail1">SELECT COMPANY</label>
							    <?php echo form_dropdown('partners', partners(),  set_value('partners'), 'class="custom-select" id="partners" required'); ?>
							</div>
						</fieldset>
			      </div>
			      <div class="modal-footer">
			      	<button type="submit" class="btn btn-primary btn-sm">Confirm</button>
			        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
			      </div>
			      </form>
			    </div>
			  </div>
			</div>
		    <?php endforeach; ?>
		    <?php else: ?>
		    	<td>No Student Request</td>
		    <?php endif; ?>
		  </tbody>
		</table> 
	</div>
</div>
</div>



