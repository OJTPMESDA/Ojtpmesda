

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<img src="<?php echo base_url(); ?>assets/images/<?php echo $fetch_data['user_image']; ?>" class="rounded-circle" width="130px">

	<?php
	$id = $fetch_data['id'];
	$this->db->select_sum('ojt_hours');
	$this->db->where('studentID', $id);
	$data = $this->db->get('students_dtr');
	foreach ($data->result() as $row) {
		$sum = $row->ojt_hours;
	}
	?>
	<legend><?php echo $fetch_data['name']; ?> | <?php echo $sum; ?>(hours)</legend>
	<?php if($this->session->userdata('role') == 2) : ?>
	<?php 
	$now = date('Y-m-d');
	$this->db->select('ojt_date');
	$this->db->where('studentID', $id);
	$this->db->where('ojt_date', $now);
	$data = $this->db->get('students_dtr');
	
		if($data->num_rows() == 0)
			{
				echo '<p><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i></button></p>';
			}
			else
			{
				echo '<p><button type="button" class="btn btn-secondary btn-sm disabled"><i class="fas fa-plus"></i></button></p>';
			}
	?>
	
	<?php endif; ?>
	<?php
	$counter = 1;
	$this->db->order_by('ojt_date', 'DESC');
	$this->db->where('studentID', $id);
	$data = $this->db->get('students_dtr');
	?>
	<table class="table table-responsive">
		  <thead class="table-success">
		    <tr>
		      <th scope="col">NO.</th>
		      <th scope="col">DATE</th>
		      <th scope="col">CHECK BY</th>
		      <th scope="col">OJT HOURS</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
		    	if (empty($data->result())) {
		    		echo '<td scope="col">No Attendance Found</td>';
				}
				?>
		  	<?php foreach ($data->result() as $row): ?>
		    <tr class="table-bordered">
			    <th scope="row"><?php echo $counter++; ?></th>
			    <td><?php echo $row->ojt_date; ?></td>
			    <td><?php echo $row->check_by; ?></td>
			    <td>
			    <?php 
			    if($row->ojt_hours == 0)
			    	 echo 'Absent';
				else{
					echo $row->ojt_hours;
				}
			    ?>
		      	
		      </td>
		    </tr>
		    <?php endforeach; ?>
		  </tbody>
		</table>
		</div>
		<div class="col-md-6">
		<canvas id="myData" width="400" height="400"></canvas>
		</div>
	</div>
</div>

<div id="myModal" class="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" style="color:#fff;">OJT HOURS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url(); ?>work/hours/<?php echo $fetch_data['id']; ?>">
			  	<fieldset>
				  	<div class="form-group">
						<label>Date Time</label>
							<input type="date" name="ojt_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" disabled>
					</div>
					<div class="form-group">
						<label>No. of hours Attended today</label>
							<input type="number" onKeyPress="if(this.value.length==2) return false;" name="ojt_hours" class="form-control" placeholder="Enter hours" required>
						<span class="text-danger"><?php echo form_error('hours'); ?></span>
					</div>
				</fieldset>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-sm">Update</button>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

