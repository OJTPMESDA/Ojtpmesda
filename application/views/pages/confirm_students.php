<div class="container">
	<div class="row">
		<div class="col-md-12">
		<legend>List of OJT Candidates</legend>
		<table class="table table-responsive">
		  <thead>
		    <tr>
		      <th scope="col">NO.</th>
		      <th scope="col">IMAGE</th>
		      <th scope="col">NAME</th>
		      <th scope="col">PHONE</th>
		      <th scope="col">OFFICE NAME</th>
		      <th scope="col">OFFICE ADDRESS</th>
		      <th scope="col">OJT HOURS COMPLETION</th>
		      <th scope="col">OPTION</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
		  	$counter = 1; 
		  	if (empty($fetch_data->result())) {
		  		echo '<td>No Student Request</td>';
		  	}
		  	?>
		  	<?php foreach ($fetch_data->result() as $row): ?>
		  		<?php 
				$meow = $row->total_hours;
				$dog = 4.00;
				$cat = $meow / $dog;
				$yow = $row->company;
				?>
				<?php $path = (!empty($row->user_image)) ? base_url($row->user_image) : base_url('assets/images/no_image.png') ;?>
		    <tr class="table-bordered">
		      <th scope="row"><?php echo $counter++; ?></th>
		      <td><img src="<?php echo $path; ?>" class="rounded-circle" height="60px"></td>
		      <td><?php echo $row->name;?></td>
		      <td>0<?php echo $row->contact_no;?></td>
		      <?php 
		      $data = $this->db->query('SELECT * FROM admin WHERE id = '.$yow.'');
		      foreach ($data->result() as $key) {
		      	echo '<td>'.$key->company_name.'</td>';
		      	echo '<td>'.$key->address.'</td>';
		      }
		      ?>
		      <td class="text-center">
		      	<small><?php echo $meow; ?>/400</small>
		      	<div class="progress">
				  <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: <?php echo $cat; ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
		      </td>
		      <td>
		      	<div class="btn-group btn-group-toggle" data-toggle="buttons">
				  <label class="btn btn-primary btn-sm mr-1">
				    <a href="<?php echo base_url('student/dtr/'.$row->id); ?>" class="btn btn-sm" style="color: #fff;"><i class="fas fa-chart-bar"></i></a>
				  </label>
				  <?php if ($this->session->role == 2): ?>
				  <label class="btn btn-info btn-sm mr-1">
				    <a href="<?php echo base_url('evaluate/'.$row->id); ?>" class="btn btn-sm" style="color: #fff;"><i class="fas fa-code-branch"></i></a>
				  </label>
					<?php endif; ?>
				  <label class="btn btn-success btn-sm mr-1">
				    <a href="<?php echo base_url('profile/'.$row->id); ?>" class="btn btn-sm" style="color: #fff;"><i class="fas fa-user-tie"></i></a>
				  </label>
				</div>
		      </td>
		    </tr>
		    <?php endforeach; ?>
		  </tbody>
		</table> 
	</div>
</div>
</div>