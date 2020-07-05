<div class="container-fluid content">
	<?php if (!empty($results)): ?>
		<div class="col-md-4">
			<?php foreach ($results as $row): ?>
			  	<?php
			  		$photo = 'assets/images/no_image.png';
			  		if ($row->POST_BY_ADMIN != 0) {
			  			if (!empty($row->PHOTO)) {
			  				$photo = $row->PHOTO;
			  			}
			  			
			  			$postBy = $row->admin;
			  		}

			  		if ($row->POST_BY_STUDENT != 0) {
			  			if (!empty($row->sphoto)) {
			  				$photo = $row->sphoto;
			  			}
			  			$postBy = strtok($row->student, " ");
			  		}

			  		if ($row->POST_BY_COMPANY != 0) {
			  			if (!empty($row->LOGO)) {
			  				$photo = $row->LOGO;
			  			}
			  			$postBy = strtok($row->partners, " ");
			  		}
			  	?>
			<div class="card border-light mb-3 shadow">
				<?php $imgPath = (empty($row->IMAGE) ? base_url('assets/images/no_image.png') : base_url($row->IMAGE)); ?>
				<legend class="card-header bg-success" style="color: #fff;"><img src="<?php echo $imgPath; ?>" class="rounded mr-2" height="28px" width="9%"><?php echo $row->POST_TITLE; ?></legend>
			  <div class="card-body">
			  	<p class="card-text"><?php echo $row->POST_DESC; ?></p>
			  	<div class="d-inline">
			  		<a href="<?php echo base_url($photo); ?>" class="mr-1">
				  		<img src="<?php echo base_url($photo); ?>" class="rounded" width="7%">
				  	</a>
					<small class="mr-2">Posted: <?php echo date("F j, Y, g:i a", strtotime($row->POST_AT)); ?> </small>
					<small class="text-success">
						By: <b class="mr-1"><?php echo $postBy; ?></b>
					</small>
				    <?php if($this->session->userdata('role') == 1): ?>
				   	<a href="<?php echo base_url('forums/post/approved/'.$row->POST_ID); ?>" class="text-success mr-1"><i class="fas fa-check"></i></a>
				   	<a href="<?php echo base_url('forums/post/decline/'.$row->POST_ID); ?>" class="text-danger"><i class="fas fa-trash-alt"></i></a>
				  	<?php endif; ?>
			  	</div>
			  </div>
			</div>
			<?php endforeach; ?>
		</div>
	<?php else: ?>
		<div class="pt-5">
			<center>
				<h3>Empty Request</h3>
				<span>
					<i class="far fa-folder-open fa-8x"></i>
				</span>
			</center>
		</div>
	<?php endif; ?>
</div>