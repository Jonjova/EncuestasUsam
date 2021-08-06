<!DOCTYPE html>
<html>
<head>
	<title><?= $title; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Icono USAM -->
	<link rel="icon" href="<?=base_url()?>assets/img/usam.png" type="image/gif">
	<!-- DATATABLES PAPA BUSQUEDA Y PAGINACION AL MOSTRAR LOS DATOS CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href=" https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
	<!-- BOOTSTRAP WIZARD CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/gsdk-bootstrap-wizard.css">
	<!-- BOOTSTRAP 4 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
	<!--custom-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	<!-- SIDEBAR CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/sidebar.css')?>">
	<!--Select2 -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-select.css');?>">
	<!-- FONTAWESOME -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
	<!-- ALERTAS CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/sweetalert2.css">
	<!-- LIBRERIA DE PDF MPDF -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/pdf.css">
	<!-- JQUERY 3.5.1 Para evitar cualquier bloqueo al DOM se incluye aqui -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- MASCARA DE CAMPOS -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.maskedinput.js"></script>	
</head>

