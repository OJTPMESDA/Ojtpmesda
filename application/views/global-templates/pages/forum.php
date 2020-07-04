<div class="container">
	<div class="row">
		<div class="col-md-6">
			<p><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Add Post</button></p>
			<?php if (!empty($results)): ?>
				<?php foreach ($results as $row): ?>
					<?php
						$photo = 'assets/images/no_image.png';
				  		
						if ($this->session->role == 1) {
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
								$postBy = $row->student;
							}

							if ($row->POST_BY_COMPANY != 0) {
								if (!empty($row->LOGO)) {
									$photo = $row->LOGO;
								}
								$postBy = $row->partners;
							}
					  	} else {
					  		if (!empty($row->USER_PHOTO)) {
								$photo = $row->USER_PHOTO;
							}
					  		$postBy = $row->FULL_NAME;
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
					   	<a href="<?php echo base_url(); ?>post/delete/<?php echo $row->POST_ID; ?>"class="text-danger"><i class="fas fa-trash-alt"></i></a>
					  	<?php endif; ?>
				  	</div>
				  </div>
				</div>
				<br>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<div id="myModal" class="modal fade">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" style="color:#fff;">ADD POST</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('forums/post'); ?>" enctype="multipart/form-data">
			  	<fieldset>
				  	<div class="form-group">
						<label>Title</label>
							<input type="text" name="post_title" class="form-control"  placeholder="Enter post title" required>
					</div>
					<div class="form-group">
						<label>Content</label>
							<textarea name="post_content" class="form-control" placeholder="Enter post content" required></textarea>
						<span class="text-danger"><?php echo form_error('hours'); ?></span>
					</div>
					<div class="form-group">
			  			<label for="exampleInputEmail1">Add Image</label>
					    <div class="input-group mb-3">
					    <div class="custom-file">
					        <input type="file" name="userfile" class="custom-file-input">
					        <label class="custom-file-label">Choose file</label>
					    </div>
					  </div>
				</fieldset>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-sm">Post</button>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>