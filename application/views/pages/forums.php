<div class="container">
	<div class="row">
		<div class="col-md-6">
			<p><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Add Post</button></p>
			<?php foreach ($fetch_data->result() as $row): ?>
			<div class="card border-light mb-3 shadow">
				<legend class="card-header bg-success" style="color: #fff;"><img src="<?php echo base_url(); ?>assets/images/<?php echo $row->post_image; ?>" class="rounded-circle" height="50px">&nbsp&nbsp<?php echo $row->post_title; ?></legend>
			  <div class="card-body">
			  	<p class="card-text"><?php echo $row->post_body; ?></p>
			  	<?php if($row->post_image_content != 'no_images.png'): ?>
			  	<a href="<?php echo base_url(); ?>assets/post_images/<?php echo $row->post_image_content; ?>"><img src="<?php echo base_url(); ?>assets/post_images/<?php echo $row->post_image_content; ?>" class="img-thumbnail"></a>
			  	<?php endif; ?>
			    <small>Posted: <?php echo $row->post_date; ?> </small><small class="text-success">By: <b><?php echo $row->post_by; ?></b></small>
			    <?php if($this->session->userdata('role') == 3): ?>
			   	<a href="<?php echo base_url(); ?>forums/delete_post/<?php echo $row->id; ?>"class="text-danger"><i class="fas fa-trash-alt"></i></a>
			  	<?php endif; ?>
			  </div>
			</div>
			<br>
			<?php endforeach; ?>
		</div>
	</div>
</div>


<div id="myModal" class="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" style="color:#fff;">ADD POST</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url(); ?>forums/add_post" enctype="multipart/form-data">
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