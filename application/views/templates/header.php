<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MINSCAT OJTPMESDA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/icon/css/all.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/global.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
    
  </head>
  <body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
      <div class="container">
      <a class="navbar-brand" href="#"><i class="fas fa-chart-line"></i>&nbspOJTPMESDA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">

        <?php if(!$this->session->userdata('login')): ?>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>register">Register</a>
            </li>
          </ul>
          </form>
          <?php endif; ?>

        <?php if($this->session->userdata('role') == 1): ?>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>forums">Forums</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>students/get_confirm_students">Students</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>students/student_profile/<?php echo $this->session->userdata('username'); ?>"><i class="fas fa-user-tie"></i>&nbsp&nbsp<?php echo $this->session->userdata('username'); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>home/logout">Logout</a>
            </li>
          </ul>
          </form>
          <?php endif; ?>

          <?php if($this->session->userdata('role') == 2): ?>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>forums">Forums</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>students/get_confirm_students">Students</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>Company">Evaluate</a>
          </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>students/student_profile"><i class="fas fa-user-tie"></i>&nbsp&nbsp<?php echo $this->session->userdata('username'); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>home/logout">Logout</a>
            </li>
          </ul>
          </form>
          <?php endif; ?>

          <?php if($this->session->userdata('role') == 3): ?>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>forums">Forums</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>students/get_confirm_students">Students</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="#">Reports</a>
            </li>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download">Request <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="download">
                <a class="dropdown-item" href="<?php echo base_url(); ?>students/students_list">Student Request</a>
                <a class="dropdown-item" href="<?php echo base_url(); ?>students/company_list">Company Request</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url(); ?>forums/post_request">Post Request</a>
              </div>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>Admin"><i class="fas fa-user-tie"></i>&nbsp&nbsp<?php echo $this->session->userdata('username'); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>home/logout">Logout</a>
            </li>
          </ul>
          </form>
          <?php endif; ?>
      </div>
    </div>
    </nav>