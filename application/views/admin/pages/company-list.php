<div class="container-fluid">
	<legend>List of Company Request</legend>
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
</div>