<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/custom-style.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/style-home.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.css'); ?>">


</head>
<style type="text/css">
  .dataTables_wrapper .dataTables_processing {
     background-color:transparent;
     border: none;
  }
  .table tr td{
    vertical-align: middle !important;
  }
</style>

<body id="page-top" onload="startTime()">

  <!-- Page Wrapper -->
  <div id="wrapper" class="sidebar-toggled bg-blue-0">