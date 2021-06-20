<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

<title>Print Karyawan</title>
 <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/custom-style.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/style-home.css" rel="stylesheet">
</head>
<style type="text/css">
	body{
			background: #c1bebe;  
			padding: 0;
			margin:0;
			box-sizing: border-box;
		}
	 
    .content{
    	font-family: "Calibri", Times, serif;
         box-shadow: 0rem 0rem 2rem rgba(97, 97, 95, 0.7);
         padding: 5px;

         background: white;
         width: max-content;
         margin-left: auto !important;
         margin-right: auto !important;
         margin: auto;
         }
         table{
         	width: 100% !important;
         	

         }
         thead{
         	color: white;
         	text-align: center;
         }
         th{
         	padding: 5px;
         }
         td{
      
         	padding: 5px;
         	
         }
         .hidden-head-table{
         	position: fixed;
         	right: 0;
         	bottom:0;
         	color: white;
         	padding: 10px;
         	border-radius: 10px 0px 0px 0px;
         	transition: right 1s;
         	width: 15%;
         }
        .hide{
        	position: absolute;
        	margin-left: -35px;
   			border-radius: 10px 0px 0px 10px;
   			cursor: pointer;
        }
        .animation-hide{
        	right: -15%;
        	transition: right 1s;
        }
        h1,h2,h3,h4,h5,h6{
        	margin-bottom: 0;
        }
@media print {
	.hidden-head-table{
		display: none;
	}
	td{
		color: black;
	}
	th{
		background: #24107e  !important;
	}

}
@page { size:auto; margin:0mm; }
</style>
<body>


<div class=" bg-pink shadow hidden-head-table " >
	<div class="hide bg-pink p-2">
		<i class="fa fa-chevron-left"></i>
	</div>
	<h6 class="font-weight-bold text-center text-white">Sembunyikan Kolom</h6>
	<input type="checkbox" class="mr-2" id="1" name="" value="1"><label for="id_nama">Title</label><br>
	<input type="checkbox" class="mr-2" id="2" name="" value="2"><label for="id_tmp_lahir">Isi Berita</label><br>

</div>
	
	<div class="content w-75 p-4" style="background-image: url('<?= base_url() ?>assets/img/header_kop.svg');background-repeat: no-repeat;background-size: 100%;">
		
		
		<div class="row">
			<div class="col align-items-center d-flex justify-content-between">
				<img src="<?= base_url() ?>assets/img/logooriginal.svg" width="120px">
				<div class="header-brand float-right text-right text-muted" >
					<h3 class="font-weight-bold text-uppercase " style="color:black !important;">PT. Aptikma Indonesia</h3>
					<h6>Perum Puri Kartika Asri Blok F No 13, Arjowinangun, Kec. Kedungkandang, Kota Malang, Jawa Timur 65132</h6>
					<h6><small>Telp. (0341) 750 705 4 Mobile. 0821-4368-0044 </small></h6>
					<h6><small>Website: www.aptikma.co.id Email: info@aptikma.co.id</small></h6>
				</div>
				
			</div>
		</div>
		<div class="d-flex align-items-center">
			<hr class="bg-dark" style="padding: 1px; width: 100%; position: relative;">
			<div class="ml-auto bg-white text-right" style="position: relative;padding: 10px;width: 250px;right: 0;">
				<label><?= tanggal_indo();?></label>
			</div>
			
		</div>
		
		<h4 class="font-weight-bold text-center text-uppercase" style="color:black;">Data Berita</h4>
		
		<table class="table table-striped mt-4" cellspacing ="0" style="width: 100%">
			<thead class="bg-blue-1 text-white ">
				<tr>
					<th >No</th>
					<th class="1">Title</th>
					<th class="2">Isi Berita</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
				
				 $no=1; foreach ($berita as $key) { 
				 	?>

					<tr>
						<td class="text-center"><?= $no ?></td>
						<td class="1"><?= $key->title ?></td>
						<td class="2"><?= $key->isi ?></td>
						
						
					</tr>

				<?php $no++; };?>
			</tbody>
		</table>
	</div>
	<!-- Bootstrap core JavaScript-->
  <script src="<?= base_url() ?>assets/vendor/jquery/jquery.js"></script>
  <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.js'); ?>"></script>
  <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
 <!--  <script src="<?= base_url() ?>assets/js/demo/chart-area-demo.js"></script>
  <script src="<?= base_url() ?>assets/js/demo/chart-pie-demo.js"></script> -->
  <script src="<?= base_url() ?>assets/js/sweetalert2.all.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('.hide').click(function () {
				$('.hidden-head-table').toggleClass('animation-hide');
			});
			$('#1').click(function () {
				$('.1').toggleClass('d-none');
			});
			$('#2').click(function () {
				$('.2').toggleClass('d-none');
			});
			
			
		})
	</script>
</body>
</html>