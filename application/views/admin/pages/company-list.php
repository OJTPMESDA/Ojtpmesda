<div class="container-fluid">
	<span class="table-title d-line mr-4">List of Company Request</span>
	<button class="btn btn-info d-line mb-2" data-toggle="modal" data-target="#add-company"><i class="fas fa-plus mr-1"></i> Partners</button>
	<table class="table comapny-list">
		<thead>
			<tr>
				<th scope="col">IMAGE</th>
				<th scope="col">NAME</th>
				<th scope="col">COMPLETE ADDRESS</th>
				<th scope="col">CONTACT NO.</th>
				<th scope="col">STATUS</th>
				<th scope="col">ACTION</th>
			</tr>
		</thead>
		<tbody>
			<?php if (!empty($results)):?>
				<?php foreach ($results as $row): ?>
						<?php 
						$status = '<span class="badge badge-danger">Pending</span>';
						$urlApproved = base_url('company/approved/'.$row->CID);
						$btnDisabled = null;
						$path = (!empty($row->LOGO)) ? base_url($row->LOGO) : base_url('assets/images/no_image.png');
						if ($row->CSTATUS != 0) {
							$status = '<span class="badge badge-success">Approved</span>';
							$urlApproved = '#';
							$btnDisabled = 'disabled';
						}
			?>
					<tr class="table-bordered">
						<td><img src="<?php echo $path; ?>" class="rounded-circle" height="60px"></td>
						<td><?php echo $row->COMPANY_NAME;?></td>
						<td><?php echo strlen($row->COMPANY_ADDRESS) > 40 ? substr($row->COMPANY_ADDRESS,0,40)."..." : $row->COMPANY_ADDRESS;?></td>
						<td><?php echo $row->COMPANY_CONTACT_NO;?></td>
						<td><?php echo $status; ?></td>
						<td>
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<label class="btn btn-success btn-sm mr-1" <?=$btnDisabled?>>
									<a href="<?php echo $urlApproved; ?>" <?=$btnDisabled?> class="btn btn-sm text-white"><i class="fas fa-check"></i></a>
								</label>
								<label class="btn btn-danger btn-sm">
									<a href="<?php echo base_url('company/decline/'.$row->CID); ?>" class="btn btn-sm text-white"><i class="fas fa-trash-alt"></i></a>
								</label>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
	<div class="modal fade" id="add-company">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="add-partners" method="POST" action="<?php echo base_url('company/add'); ?>">
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title"><i class="fas fa-building mr-2"></i>Add Partners</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						<div class="form-group">
							<label for="company">Company Name</label>
							<input type="text" name="company" class="form-control" id="company" aria-describedby="emailHelp" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label for="acronym">Acronym <small>(optional)</small></label>
							<input type="text" name="acronym" class="form-control" id="acronym" aria-describedby="emailHelp" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" name="address" class="form-control" id="address" aria-describedby="emailHelp" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label for="contact_no">Contact No</label>
							<input type="text" name="contact_no" maxlength="11" class="form-control" id="contact_no" aria-describedby="emailHelp" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label for="contact_person">Contact Person</label>
							<input type="text" name="contact_person" class="form-control" id="contact_person" aria-describedby="emailHelp" autocomplete="off" required>
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