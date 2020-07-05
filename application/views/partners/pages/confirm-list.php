<div class="container-fluid content">
	<div class="pl-5 pr-5">
		<legend>List of OJT Candidates</legend>
		<table class="table confim-list">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Contact #</th>
					<th>Guardian</th>
					<th>Guardian #</th>
					<th>School</th>
					<th>Age</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($results)): ?>
				<?php foreach ($results as $k): ?>
					<tr>
						<td><?= $k->FULL_NAME; ?></td>
						<td><?= $k->EMAIL_ADDRESS ?? 'N/A'; ?></td>
						<td><?= $k->CONTACT_NO ?? 'N/A'; ?></td>
						<td><?= $k->GUARDIAN ?? 'N/A'; ?></td>
						<td><?= $k->GURADIAN_NO ?? 'N/A'; ?></td>
						<td><?= $k->SCHOOL_NAME; ?></td>
						<td><?= $k->AGE ?? 'N/A'; ?></td>
						<td>
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<label class="btn btn-primary btn-sm mr-1">
									<a href="<?php echo base_url('students/dtr/'.$k->USERID); ?>" class="btn btn-sm text-white"><i class="fas fa-chart-bar"></i></a>
								</label>
								<?php if ($this->session->role == 2): ?>
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