		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('forums'); ?>">Forums</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('confirm/list'); ?>">Students</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download">Request <span class="caret"></span></a>
				<div class="dropdown-menu" aria-labelledby="download">
					<a class="dropdown-item" href="<?php echo base_url('students/pending/list'); ?>">Student Request</a>
					<a class="dropdown-item" href="<?php echo base_url('company/list'); ?>">Company Request</a>
					<a class="dropdown-item" href="<?php echo base_url('forums/post/request'); ?>">Post Request</a>
				</div>
			</li>
		</ul>