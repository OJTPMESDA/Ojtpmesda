<div class="container-fluid content">
	<div class="row">
		<div class="col-md-2 ml-3">
            <?php $path = (!empty($results->USER_PHOTO)) ? base_url($results->USER_PHOTO) : base_url('assets/images/no_image.png'); ?>
            <div class="card">
            	<img class="card-img-top" src="<?php echo $path; ?>" alt="Card image">
            	<div class="card-body">
            		<h4 class="card-title"><?php echo $results->FULL_NAME; ?></h4>
            		<label><?= $results->COMPANY_NAME; ?> | <?= $results->COMPANY_ADDRESS; ?></label>
            	<label><?= $results->SCHOOL_NAME; ?> | <?= $results->SCHOOL_ADDRESS; ?></label>
            	</div>
            </div>
        </div>
        <div class="col-md-9">
        	<div id='dtr' class="student-dtr"></div>	
        </div>
	</div>
</div>