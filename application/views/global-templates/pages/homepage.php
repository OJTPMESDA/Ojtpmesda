<div class="container-fluid content">
	<h3 class="mb-4"><i class="fas fa-chart-line"></i> Summary Report</h3>
		
	<div class="requirements mt-5 pt-5">
		<div class="row ml-2">
			<div class="col-sm-2">
				<div class="card bg-info">
					<div class="card-body">
						<h4 class="card-title text-white"><i class="fas fa-users text-white mr-2"></i> Pending Student <?= $pending;?></h4>
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="card bg-success">
					<div class="card-body">
						<h4 class="card-title text-white"><i class="fas fa-users text-white mr-2"></i> Confirm Student <?= $confirm;?></h4>
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="card bg-warning">
					<div class="card-body">
						<h4 class="card-title text-white"><i class="fas fa-handshake text-white mr-2"></i> Partner Request <?= $pending;?></h4>
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="card bg-secondary">
					<div class="card-body">
						<h4 class="card-title text-white"><i class="fas fa-handshake text-white mr-2"></i> Confirm Partner <?= $confirm;?></h4>
					</div>
				</div>
			</div>
		</div>
		<div id="requirements"></div>
	</div>
</div>