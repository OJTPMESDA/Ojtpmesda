<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
	<?php $this->load->view('global-templates/includes/hamburger-navbar'); ?>
	<div class="collapse navbar-collapse" id="navbarColor01">

		<?php $this->load->view($navbar); ?>

		<form class="form-inline my-2 my-lg-0">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="profile-navbar"><i class="fas fa-user-tie mr-2"></i><?php echo $this->session->userdata('username'); ?> <span class="caret"></span></a>
					<div class="dropdown-menu" aria-labelledby="dropdown">
						<a class="dropdown-item" href="<?php echo base_url('profile'); ?>"><i class="far fa-id-card mr-2"></i>Profile</a>
						<a class="dropdown-item" href="<?php echo base_url('settings'); ?>"><i class="fas fa-cogs mr-2"></i>Settings</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?php echo base_url('logout'); ?>"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
					</div>
				</li>
			</ul>
		</form>

	</div>
</nav>