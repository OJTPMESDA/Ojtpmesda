<?php

	$this->load->view($this->globalincludes.'header');

	if (!empty($navbar)) {
		$this->load->view($this->globalincludes.'nav-bar');
	}

	$this->load->view($content);

	if ($copyright) {
		$this->load->view($this->globalincludes.'copyright-footer');
	}

	$this->load->view($this->globalincludes.'footer');
	
?>