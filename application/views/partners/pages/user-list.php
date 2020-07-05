<div class="container-fluid content">
	<div class="pl-5 pr-5">
		<div class="mb-3">
			<span class="table-title d-line mr-4">User list</span>
			<button class="btn btn-info d-line mb-2" data-toggle="modal" data-target="#add-user"><i class="fas fa-user-plus"></i> User</button>
		</div>
		<table class="table confim-list mt-4">
			<thead>
				<tr>
					<th>Name</th>
					<th>Username</th>
					<th>Email</th>
					<th>Contact #</th>
					<th>Address</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($results)): ?>
				<?php foreach ($results as $k): ?>
					<?php
						$status = '<span class="badge badge-info">Pending</span>';

						if ($k->PARTNERS_STATUS == 1) {
							$status = '<span class="badge badge-success">Activated</span>';
						}

						if ($k->PARTNERS_STATUS == 2) {
							$status = '<span class="badge badge-warning">Suspended</span>';
						}

						if ($k->PARTNERS_STATUS == 3) {
							$status = '<span class="badge badge-danger">Delete</span>';
						}
					?>
					<tr>
						<td><?= $k->FULL_NAME ?? 'N/A'; ?></td>
						<td><?= $k->USERNAME ?? 'N/A'; ?></td>
						<td><?= $k->EMAIL_ADDRESS ?? 'N/A'; ?></td>
						<td><?= ($k->CONTACT_NO == 0) ? 'N/A' : $k->CONTACT_NO; ?></td>
						<td><?= $k->ADDRESS ?? 'N/A'; ?></td>
						<td><?= $status; ?></td>
						<td>
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<?php if ($k->PARTNERS_STATUS == 1): ?>
								<label class="btn btn-danger btn-sm mr-1">
									<a href="<?php echo base_url('user/remove/'.$k->PARTNERS_ID); ?>" class="btn btn-sm text-white"><i class="fas fa-user-times"></i></a>
								</label>
								<?php endif; ?>
								<?php if ($k->PARTNERS_STATUS == 1): ?>
								<label class="btn btn-warning btn-sm mr-1">
									<a href="<?php echo base_url('user/suspended/'.$k->PARTNERS_ID); ?>" class="btn btn-sm text-white"><i class="fas fa-ban"></i></a>
								</label>
								<?php endif; ?>
								<?php if (in_array($k->PARTNERS_STATUS,[0,2,3])): ?>
								<label class="btn btn-success btn-sm mr-1">
									<a href="<?php echo base_url('user/activate/'.$k->PARTNERS_ID); ?>" class="btn btn-sm text-white"><i class="fas fa-user-check"></i></a>
								</label>
								<?php endif; ?>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
	<div class="modal fade" id="add-user">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="add-partners" method="POST" action="<?php echo base_url('user/add'); ?>">
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title"><i class="fas fa-user mr-2"></i>Add User</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Username" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label for="fname">Fullname</label>
							<input type="text" name="fname" class="form-control" id="fname" aria-describedby="emailHelp" placeholder="Juan Dela Cruz" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label for="email">Email Address</label>
							<input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="juan@example.com" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label for="contact_no">Password</label>
							<input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
						</div>
						<div class="form-group">
							<label for="contact_person">Confirm Password</label>
							<input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm password" required>
						</div>
					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="submit" class="btn btn-info">Save</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>