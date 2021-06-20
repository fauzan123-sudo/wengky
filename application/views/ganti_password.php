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

<body>
<div class="jumbotron">
	<div class="card m-auto shadow-tin rounded-1 overflow-hidden" style="width: 500px;">
		<div class="card-header pb p-4 text-center">
			<h6 class="card-title mb-0"> <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i> Ganti Kata Sandi</h6>
		</div>
		<div class="card-body">
			<form>
				<div class="form-group">
					<label>Kata Sandi Lama</label>
					<input type="password" name="pass_lama" class="form-control">
				</div>
				<div class="form-group">
					<label>Kata Sandi Baru</label>
					<input type="text" name="pass_baru" class="form-control" >
				</div>
				<div class="form-group">
					<label>Konfirmasi Kata Sandi Baru</label>
					<input type="text" name="pass_baru_konfirm" class="form-control" >
				</div>
				<div class="row">
					<div class="col">
						<input type="submit" class="btn btn-danger pb btn-block" value="Simpan">
						
					</div>
					<div class="col">
						<a href="<?= base_url() ?>" class="btn btn-transparent text-danger border border-danger pb btn-block">Kembali</a>
					</div>
				</div>
			</form>
			
		</div>
	</div>
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
	
</body>
</html>