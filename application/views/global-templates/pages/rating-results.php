<div class="container-fluid content">
	<div class="row ml-3">
		<div class="col-md-3">
			<?php $path = (!empty($results->USER_PHOTO)) ? base_url($results->USER_PHOTO) : base_url('assets/images/no_image.png'); ?>
			<img src="<?php echo $path; ?>" class="rounded-circle" width="130px">
			<legend><?php echo $results->FULL_NAME; ?></legend>
			<label><?= $results->COMPANY_NAME; ?> | <?= $results->COMPANY_ADDRESS; ?></label>
			<label><?= $results->SCHOOL_NAME; ?> | <?= $results->SCHOOL_ADDRESS; ?></label>
		</div>
		<?php if (!empty($rating)): ?>
		<div class="col-md-2">
			<div id="chart" class="donut-chart"></div>
		</div>
		<?php endif; ?>
		<?php if (!empty($dtr)): ?>
		<div class="col-md-2">
			<div id="bar-chart" class="second-donut-chart"></div>
		</div>
		<div class="col-md-2">
			<div id="dounut" class="ojt-hours"></div>
		</div>
		<?php endif; ?>
	</div>
	
	<hr>
	<div class="ml-4 mb-3">
		<h4>Rating Results</h4>
		<?php if (!empty($rating)): ?>
		<div class="col-md-4">
			<span class="d-line text-capitalize font-sm">Remarks:</span>
			<span class="d-line float-right font-sm">By: <?= $rating->FULL_NAME ?? $rating->USERNAME; ?></span>
		</div>
		
		<p class="ml-5 font-sm"><?= $rating->remarks; ?></p>
		<?php endif; ?>
	</div>
	<?php if (!empty($rating)): ?>
	<div class="row ml-3">
		<div class="col-md-4">
			<legend>Quality and Quantity of Work (40%)</legend>
			<table class="table">
				<thead class="table-success">
					<tr>
						<th scope="col">Description</th>
						<th scope="col">Grades</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Ability to Performed the Assigned Work well</td>
						<td><?= $rating->rating_1; ?></td>
					</tr>
					<tr>
						<td>Accuracy of work</td>
						<td><?= $rating->rating_2; ?></td>
						</tr>
					<tr>
						<td>Volume of work accomplished</td>
						<td><?= $rating->rating_3; ?></td>
						</tr>
					<tr>
						<th class="text-danger">Average</th>
						<th class="text-danger"><?= $rating->first; ?></th>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="col-md-4">
			<legend>Knowledge of Work (40%)</legend>
			<table class="table">
				<thead class="table-success">
					<tr>
						<th scope="col">Description</th>
						<th scope="col">Grades</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Knowledge of the Basic Principle Neccessary for the Accomplishment of assigned Work</td>
						<td><?= $rating->rating_4; ?></td>
					</tr>
					<tr>
						<td>Extent of Knowledge with regards to Department Operations</td>
						<td><?= $rating->rating_7; ?></td>
					</tr>
					<tr>
						<td>Ability to follow Instructions</td>
						<td><?= $rating->rating_6; ?></td>
					</tr>
					<tr>
						<th class="text-danger">Average</th>
						<th class="text-danger"><?= $rating->second; ?></th>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="col-md-4">
			<legend>Work Habits and Personality (20%)</legend>
			<table class="table table-responsive">
				<thead class="table-success">
					<tr>
						<th scope="col">Description</th>
						<th scope="col">Grades</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Punctuality</td>
						<td><?= $rating->rating_7; ?></td>
					</tr>
					<tr>
						<td>Attendance</td>
						<td><?= $rating->rating_8; ?></td>
					</tr>
					<tr>
						<td>Deportment/Behavior</td>
						<td><?= $rating->rating_9; ?></td>
					</tr>
					<tr>
						<td>Industry</td>
						<td><?= $rating->rating_10; ?></td>
					</tr>
					<tr>
						<td>Interested and Enthusiasm in the Performance of Work</td>
						<td><?= $rating->rating_11; ?></td>
					</tr>
					<tr>
						<td>Orderliness</td>
						<td><?= $rating->rating_12; ?></td>
					</tr>
					<tr>
						<th class="text-danger">Average</th>
						<th class="text-danger"><?= $rating->third; ?></th>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<?php else: ?>
		<div class="pt-5">
			<center>
				<h3>Empty Results</h3>
				<span>
					<i class="far fa-folder-open fa-8x"></i>
				</span>
			</center>
		</div>
	<?php endif; ?>
</div>