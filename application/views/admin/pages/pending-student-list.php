<div class="container-fluid content">
	<div class="pl-5 pr-5">
		<legend>List of Pending Student</legend>
		<table class="table pending-list">
			<thead>
				<tr>
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
				<?php if (!empty($results)): ?>
					<?php foreach ($results as $k): ?>
						<?php 
					  		$total = array_sum(
								[
									$k->resume_status,
									$k->clearance_status,
									$k->waiver_status,
									$k->good_moral_status,
									$k->registration_status,
									$k->consent_status
								]
							);

							$progress = $total * 16.66;
							$path = (!empty($k->USER_PHOTO)) ? base_url($k->USER_PHOTO) : base_url('assets/images/no_image.png');

							$status = '<span class="badge badge-danger">Pending</span>';
							if ($k->STUDENT_STATUS == 1) {
								$status = '<span class="badge badge-success">Confirm</span>';
							}
						?>
						<tr>
							<td><img src="<?php echo $path; ?>" class="rounded-circle" height="60px"></td>
							<td><?= $k->FULL_NAME ?? 'N/A'; ?></td>
							<td><?= $k->ADDRESS ?? 'N/A'; ?></td>
							<td><?= $k->CONTACT_NO ?? 'N/A'; ?></td>
							<td><?= $status ?? 'N/A'; ?></td>
							<td>
								<small><?php echo $total; ?>/6</small>
								<div class="progress">
									<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: <?php echo $progress; ?>0%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</td>
							<td>
								<?php if($k->STUDENT_STATUS == 0): ?>
									<label class="btn btn-secondary btn-sm">
										<a href="#" class="btn btn-sm disabled text-white" data-toggle="modal" data-target="#<?= $k->USERNAME; ?>"><i class="fas fa-check"></i></a>
									</label>
								<?php else: ?>
									<label class="btn btn-secondary btn-sm">
										<a href="#" class="btn btn-sm text-white" data-toggle="modal" data-target="#<?= $k->USERNAME; ?>"><i class="fas fa-check"></i></a>
									</label>
								<?php endif; ?>
								<label class="btn btn-primary btn-sm">
									<a href="<?= base_url('students/requirements/'.$k->USERID); ?>" class="btn btn-sm text-white"><i class="fas fa-chart-bar"></i></a>
								</label>
								<label class="btn btn-danger btn-sm">
									<a href="<?= base_url('students/requirements/delete/'.$k->USERID); ?>" class="btn btn-sm text-white"><i class="fas fa-trash-alt"></i></a>
								</label>
							</td>
						</tr>
						<div id="<?php echo $k->USERNAME; ?>" class="modal fade" tabindex="-1" role="dialog">
							<div class="modal-dialog" role="document">
								<form method="post" class="deployment-form" action="<?php echo base_url('students/confirm/'.$k->USERID); ?>">
									<div class="modal-content">
										<div class="modal-header bg-primary">
											<h5 class="modal-title" style="color:#fff;">OJT DEPLOYMENT</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
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
									</div>
								</form>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>



