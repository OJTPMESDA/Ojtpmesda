<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php
			if (empty($fetch_data->result())) {
		  		echo '<legend>No Post Request Found</legend>';
		  	}
		  	?>
			<?php foreach ($fetch_data->result() as $row): ?>
			<div class="card border-light mb-3 shadow">
				<legend class="card-header bg-success" style="color: #fff;"><img src="<?php echo base_url(); ?>assets/images/<?php echo $row->post_image; ?>" class="rounded-circle" height="50px">&nbsp&nbsp<?php echo $row->post_title; ?></legend>
			  <div class="card-body">
			  	<?php if($row->post_image_content != 'no_images.png'): ?>
			  	<a href="<?php echo base_url(); ?>assets/post_images/<?php echo $row->post_image_content; ?>"><img src="<?php echo base_url(); ?>assets/post_images/<?php echo $row->post_image_content; ?>" class="img-thumbnail"></a>
			  	<?php endif; ?>
			    <p class="card-text"><?php echo $row->post_body; ?></p>
			    <small>Posted: <?php echo $row->post_date; ?> </small><small class="text-success">By: <b><?php echo $row->post_by; ?></b></small>
			    <p>
			   	<div class="btn-group mr-2" role="group" aria-label="Second group">
			   		<a href="<?php echo base_url(); ?>forums/approve_post/<?php echo $row->id; ?>"class="btn btn-success"><i class="fas fa-check"></i></a>
				    <a href="<?php echo base_url(); ?>forums/delete_post/<?php echo $row->id; ?>"class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
				</div>
				</p>
			  </div>
			</div>
			<br>
			<?php endforeach; ?>
		</div>
	</div>
</div>