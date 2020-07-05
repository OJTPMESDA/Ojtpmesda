<div class="container-fluid content">
	<div class="row">
		<div class="col-md-2 ml-3">
            <?php $path = (!empty($results->USER_PHOTO)) ? base_url($results->USER_PHOTO) : base_url('assets/images/no_image.png'); ?>
            <div class="card">
            	<img class="card-img-top" src="<?php echo $path; ?>" alt="Card image">
            	<div class="card-body">
            		<h4 class="card-title"><?php echo $results->FULL_NAME ?? 'N/A'; ?></h4>
            		<label><?= $results->COMPANY_NAME ?? 'N/A'; ?> | <?= $results->COMPANY_ADDRESS ?? 'N/A'; ?></label>
                    <label><?= $results->SCHOOL_NAME ?? 'N/A'; ?> | <?= $results->SCHOOL_ADDRESS ?? 'N/A'; ?></label>
                    <label>Work Hours: <i><?= $results->WORK_HOURS ?? 0; ?> / 400</i></label>
            	</div>
                <div class="card-footer">
                    <div class="input-group">
                        <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control workhours" data-id="<?= $results->USERID ?? 0; ?>" placeholder="Work hours">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-info submit-dtr"><i class="fas fa-plus-circle"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
        	<div id='dtr' class="student-dtr"></div>	
        </div>
	</div>
</div>