<div class="container">
	<div class="row">
		<?php foreach ($fetch_data->result() as $row): ?>
			<?php 
			$meow = $row->total_hours;
			$dog = 4.00;
			$cat = $meow / $dog;
			$kwek = floor($cat);
			$yow = $row->company;
			?>
			<div class="col-md-3 text-center">
				<img src="<?php echo base_url(); ?>assets/images/<?php echo $row->user_image; ?>" class="rounded-circle " height="150px">
				<br>
				<h5><?php echo $row->name; ?></h5>
				<?php 
		      $data = $this->db->query('SELECT * FROM admin WHERE id = '.$yow.'');
		      foreach ($data->result() as $key) {
		      	echo '<p>'.$key->company_name.'</p>';
		      }
		      ?>
				<p>
					<div class="progress">
				  	<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: <?php echo $cat; ?>%" aria-valuenow="20%" aria-valuemin="0" aria-valuemax="486"><?php echo $kwek; ?>%</div>
				</div>
				</p>
			</div>
		<?php endforeach; ?>
	</div>
  
</div>