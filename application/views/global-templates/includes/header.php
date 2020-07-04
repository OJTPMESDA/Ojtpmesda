<?php
	if (isset($title)) {
		if (!empty($title)) {
			$title = $title;
		} else {
			$title = 'MinSCAT OJTPMESDA';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo $title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />

		<link rel="preload" href="<?php echo base_url('assets/icon/css/all.css'); ?>" as="style">
		<link rel="preload" href="<?php echo base_url('assets/css/bootstrap.css'); ?>" as="style">
		<link rel="preload" href="<?php echo base_url('assets/css/custom.min.css'); ?>" as="style">
		<link rel="preload" href="<?php echo base_url('assets/css/global.css'); ?>" as="style">
		<link rel="preload" href="<?php echo base_url('assets/css/c3.css'); ?>" as="style">
		<link rel="preload" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" as="style">
		<link rel="preload" href="https://d3js.org/d3.v5.min.js" as="script">
		<link rel="preload" href="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" as="script">
		<link rel="preload" href='https://cdn.jsdelivr.net/npm/fullcalendar@5.1.0/main.min.css' as="style">
		<link rel="preload" href='https://cdn.jsdelivr.net/npm/fullcalendar@5.1.0/locales-all.min.js' as="script">
		<link rel="preload" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.1.0/main.min.js" as="script">

		<link rel="preconnect" href="https://rawgit.com">
		<link rel="preconnect" href="https://d3js.org">
		<link rel="preconnect" href="//cdn.datatables.net">
		<link rel="preconnect" href="https://cdn.jsdelivr.net">

		<link rel="dns-prefetch" href="https://rawgit.com">
		<link rel="dns-prefetch" href="https://d3js.org">
		<link rel="dns-prefetch" href="//cdn.datatables.net">
		<link rel="dns-prefetch" href="https://cdn.jsdelivr.net">

		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/icon/css/all.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" media="screen">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/global.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/c3.css">
		<link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.1.0/main.min.css">
	</head>
	<body>
