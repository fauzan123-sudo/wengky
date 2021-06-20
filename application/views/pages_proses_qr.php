<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	  
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Proses Update QR Code</title>

	<link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/css/custom-style.css" rel="stylesheet">
</head>
<style type="text/css">
	.progress{
		display: fixed;
		left: 50%;
		top: 50%;
	}
	body{
		padding: 200px;
	}
</style>
<body>
	<center>Sedang Memproses Update QR Code Karyawan</center>
	<center>Mohon Tunggu Sebentar .... </center>
<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" id="proses-progress"></div>
</div>

<script src="<?= base_url() ?>assets/vendor/jquery/jquery.js"></script>
<script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		read_data();
		
		function read_data() {
			$.ajax({
	            type : 'ajax',
	            dataType : 'json',
	            url : '<?= base_url() ?>admin/read_karyawan',
	            async : false,
	            success : function (data) {
	            	console.log(data.length);
	            	var i;
	            	for (i = 0 ; i <= data.length; i++) {
	            		Update(data[i].id_pegawai);
	            	}
	                
	            }
	          })
		}
		function Update(id) {
			
				$.ajax({
	            type : 'ajax',
	            dataType : 'json',
	            url : '<?= base_url() ?>admin/update_qr_code/'+id,
	            success : function (data) {
	                var percentage = 0;
 
				      var timer = setInterval(function(){
				       percentage = percentage + 20;
				       progress_bar_process(percentage, timer);
				      }, 1000);
				      console.log("timer : "+timer);
	            }
	          })
			
			 
		}
		function progress_bar_process(percentage, timer){

		   $('.progress-bar').css('width', percentage + '%');
		   if(percentage > 100){
			    clearInterval(timer);
			    setTimeout(function(){
			     window.location.href = "<?= base_url() ?>admin/karyawan";
			    }, 5000);
		   }
		  }
	})
</script>
</body>
</html>
