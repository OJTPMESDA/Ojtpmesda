<div class="container">
	<div class="row">
		<div class="col-md-12">
		<legend>List of Company Request</legend>
		<table class="table table-responsive">
		  <thead>
		    <tr>
		      <th scope="col">NO.</th>
		      <th scope="col">IMAGE</th>
		      <th scope="col">NAME</th>
		      <th scope="col">COMPLETE ADDRESS</th>
		      <th scope="col">CONTACT NO.</th>
		      <th scope="col">STATUS</th>
		      <th scope="col">ACTION</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
		  	$counter = 1; 
		  	if (empty($fetch_data->result())) {
		  		echo '<td>No Company Request</td>';
		  	}
		  	?>
		  	<?php foreach ($fetch_data->result() as $row): ?>
		    <tr class="table-bordered">
		    	<td><?php echo $counter++; ?></td>
		    	<td><img src="<?php echo base_url(); ?>assets/images/<?php echo $row->user_image; ?>" class="rounded-circle" height="60px"></td>
		      	<td><?php echo $row->company_name;?></td>
		      	<td><?php echo $row->address;?></td>
		      	<td>0<?php echo $row->contact_no;?></td>
		      	<td>
		      	<?php 
		      	if($row->status == 0)
		      	{
		      		echo '<span class="badge badge-danger">Pending</span>';
		      	}
		      	?>
		      	</td>
		      <td>
		      	<div class="btn-group btn-group-toggle" data-toggle="buttons">
				  <label class="btn btn-success btn-sm">
				    <a href="<?php echo base_url(); ?>students/confirm_company/<?php echo $row->id; ?>" class="btn btn-sm" style="color: #fff;"><i class="fas fa-check"></i></a>
				  </label>
				  <label class="btn btn-danger btn-sm">
				    <a href="<?php echo base_url(); ?>students/delete_company/<?php echo $row->id; ?>" class="btn btn-sm" style="color: #fff;"><i class="fas fa-trash-alt"></i></a>
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