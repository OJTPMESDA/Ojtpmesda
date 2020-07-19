<div class="container-fluid content">
	<div class="pl-5 pr-5">
		<legend>List of OJT Candidates</legend>
		<table class="table confim-list">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Age</th>
					<th>Contact #</th>
					<th>Guardian</th>
					<th>Guardian #</th>
					<th>State University</th>
					<?php if ($this->session->role == 1): ?>
					<th>Company</th>
					<th>Status</th>
					<?php endif; ?>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($results)): ?>
				<?php foreach ($results as $k): ?>
					<?php
					$status = '<span class="badge badge-warning">Pending</span>';
						if ($k->STUDENT_STATUS == 1) {
							$status = '<span class="badge badge-success">Approved</span>';
						}
					?>
					<tr>
						<td><?= $k->FULL_NAME; ?></td>
						<td><?= $k->EMAIL_ADDRESS ?? 'N/A'; ?></td>
						<td><?= (empty($k->AGE)) ?'N/A' : $k->AGE; ?></td>
						<td><?= $k->CONTACT_NO ?? 'N/A'; ?></td>
						<td><?= $k->GUARDIAN ?? 'N/A'; ?></td>
						<td><?= $k->GURADIAN_NO ?? 'N/A'; ?></td>
						<td><?= $k->SCHOOL_NAME; ?></td>
						<?php if ($this->session->role == 1): ?>
						<td><?= $k->COMPANY_NAME ?? 'N/A'; ?></td>
						<td><?= $status; ?></td>
						<?php endif; ?>
						<td>
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<?php if ($this->session->role == 2): ?>
								<label class="btn btn-primary btn-sm mr-1">
									<a href="<?php echo base_url('students/dtr/'.$k->USERID); ?>" class="btn btn-sm text-white"><i class="fas fa-chart-bar"></i></a>
								</label>
								<label class="btn btn-info btn-sm mr-1">
									<a href="<?php echo base_url('students/evaluate/'.$k->USERID); ?>" class="btn btn-sm text-white"><i class="fas fa-code-branch"></i></a>
								</label>
								<?php endif; ?>
								<label class="btn btn-success btn-sm mr-1">
									<a href="<?php echo base_url('students/profile/'.$k->USERID); ?>" class="btn btn-sm text-white"><i class="fas fa-user-tie"></i></a>
								</label>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>