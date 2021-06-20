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
         	width: max-content;

         }
         thead{
         	color: white;
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
	<input type="checkbox" class="mr-2" id="1" name="" value="1"><label for="id_nama">Nama</label><br>
	<input type="checkbox" class="mr-2" id="2" name="" value="2"><label for="id_tmp_lahir">Tempat Lahir</label><br>
	<input type="checkbox" class="mr-2" id="3" name="" value="3"><label for="id_tgl_lahir">Tanggal Lahir</label><br>
	<input type="checkbox" class="mr-2" id="4" name="" value="4"><label for="id_alamat">Alamat</label><br>
	<input type="checkbox" class="mr-2" id="5" name="" value="5"><label for="id_email">Email</label><br>
	<input type="checkbox" class="mr-2" id="6" name="" value="6"><label for="id_telepon">Telepon</label><br>
	<input type="checkbox" class="mr-2" id="7" name="" value="6"><label for="id_jabatan">Jabatan</label><br>
	<input type="checkbox" class="mr-2" id="8" name="" value="6"><label for="id_nip">NIP</label><br>
	<input type="checkbox" class="mr-2" id="9" name="" value="6"><label for="id_username">Username</label>
</div>
	
	<div class="content p-4" style="background-image: url('<?= base_url() ?>assets/img/header_kop.svg');background-repeat: no-repeat;background-size: 100%;">
		
		
		<div class="row">
			<div class="col align-items-center d-flex justify-content-between">
				<img class="ml-4" src="<?= base_url() ?>assets/img/aptikma.png" width="200px">
				<div class="header-brand float-right text-right text-muted" >
					<h3 class="font-weight-bold " style="color:black !important;">PT. Aptikma Indonesia</h3>
					<h6>Perum Puri Kartika Asri Blok F No 13, Arjowinangun, Kec. Kedungkandang, Kota Malang, Jawa Timur 65132</h6>
					<h6><small>Telp. (0341) 750 705 4 Mobile. 0821-4368-0044</small></h6>
					<h6><small>Website: www.aptikma.co.id Email: info@aptikma.co.id</small></h6>
				</div>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<hr class="bg-dark" style="padding: 1px; width: 100%; position: relative;">
			<div class="ml-auto text-right bg-white" style="position: relative;padding: 10px;width: 250px;right: 0;">
				<label><?= tanggal_indo();?></label>
			</div>
			
		</div>
		<h4 class="font-weight-bold text-center text-uppercase" style="color:black;">Data Karyawan</h4>
		
		<table class="table table-striped mt-4" cellspacing ="0">
			<thead class="bg-blue-1 text-white ">
				<tr>
					<th>No</th>
					<th class="1">NIP</th>
					<th class="2">Nama</th>
					<th class="3">Tempat Lahir</th>
					<th class="4">Telepon	</th>
					<th class="5">Jabatan</th>
					<th class="6">Gaji Pokok</th>
					<th class="7">Asuransi</th>
					<th class="8">Potongan</th>

					
				</tr>
			</thead>
			<tbody>
				<?php
				$gaji = $this->db->query("SELECT * FROM `gaji` INNER JOIN pegawai k ON k.id_pegawai = gaji.id_pegawai INNER JOIN potongan p ON p.potongan = gaji.potongan")->result();
				 $no=1; foreach ($gaji as $key) { 
				 	?>

					<tr>
						<td><?= $no ?></td>
						<td class="1"><?= $key->nip ?></td>
						<td class="2"><?= $key->nama ?></td>
						<td class="3"><?= $key->tempat_lahir ?></td>
						<td class="4"><?= $key->no_tlp ?></td>
						<td class="5"><?= $key->jabatan ?></td>
						<td class="6"><?= $key->gaji_pokok ?></td>
						<td class="7"><?= $key->asuransi ?></td>
						<td class="8"><?= $key->potong_gaji ?></td>
						
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
			$('#3').click(function () {
				$('.3').toggleClass('d-none');
			});
			$('#4').click(function () {
				$('.4').toggleClass('d-none');
			});
			$('#5').click(function () {
				$('.5').toggleClass('d-none');
			});
			$('#6').click(function () {
				$('.6').toggleClass('d-none');
			});
			$('#7').click(function () {
				$('.7').toggleClass('d-none');
			});
			$('#8').click(function () {
				$('.nip').toggleClass('d-none');
			});
			// $('#9').click(function () {
			// 	$('.9').toggleClass('d-none');
			// });
		})
	</script>
</body>
</html>