<div class="banner">
	<div class="banner-content">
		<img src="<?= base_url(); ?>assets/images/minscat.png" height="100px">
		<legend>Mindoro State College of Agriculture and Technology Bongabong Campus</legend>
		<label>On the Job Training Performance Monitoring and Evaluation System with Data Analytics is an website that handles practicum requirements and provide a timeline for posting announcements and monitor their performance of the student trainees. It also use an electronic evaluation sheet for evaluating student's performance.</label>
	</div>
</div>
<div class="container">
	<br>
	<legend class="text-center">LIST OF OJT CANDIDATES</legend>
	<div class="row">
		<?php 
			if (!empty($results)):
		  		foreach ($results as $k):
		  			$meow = $row->hours;
					$dog = 4.00;
					$cat = $meow / $dog;
					$kwek = floor($cat);
					$path = (!empty($k->profile)) ? base_url($k->profile) : base_url('assets/images/no_image.png');
			?>
			<div class="col-md-3 text-center">
				<img src="<?php echo $path; ?>" class="rounded-circle " height="150px">
				<br>
				<h5><?php echo $row->studentName; ?></h5>
				<p><?php echo $row->cname; ?></p>
				<p>
					<div class="progress">
				  	<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: <?php echo $cat; ?>%" aria-valuenow="20%" aria-valuemin="0" aria-valuemax="486"><?php echo $kwek; ?>%</div>
				</div>
				</p>
			</div>
			<?php endforeach; ?>
		<?php else: ?>
		    <td>No Student</td>
		<?php endif; ?>
	</div>
  
</div>