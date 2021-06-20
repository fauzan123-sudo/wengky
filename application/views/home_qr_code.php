<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SAP QR-CODE</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/custom-style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.css'); ?>">
  <link href="<?= base_url() ?>assets/css/style-home.css" rel="stylesheet">

</head>

<body class="bg-blue-2 pl">
<div class="container p-4">
  <h4 class="text-white font-weight-bold text-center"><img src="<?= base_url() ?>assets/img/logo.png" class="mr-2 " style="width: 2%;">CODE QR KARYAWAN<img src="<?= base_url() ?>assets/img/logo.png" class="ml-2 " style="width: 2%;"></h4>
  <form>
    <div class="input-group mb-3 rounded-2 overflow-hidden bg-white">
      <input id="search" type="text" class="form-control m-2 rounded-2  focus-border-none" style="height: 50px;" placeholder="Cari QR-CODE anda dengan Nama" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="input-group-text bg-danger text-white rounded-2 m-2" type="button" id="btn-refresh"><i class="fas fa-qrcode mr-2"></i> Refresh</button>
      </div>
    </div>
  </form>
</div>
<div class="container-fluid p-4" id="data-target">


</div>













  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url() ?>assets/vendor/jquery/jquery.js"></script>
  <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  

  <!-- Core plugin JavaScript-->

  <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->


  <!-- Page level custom scripts -->
 <!--  <script src="<?= base_url() ?>assets/js/demo/chart-area-demo.js"></script>
  <script src="<?= base_url() ?>assets/js/demo/chart-pie-demo.js"></script> -->
 
<script type="text/javascript">
  $(document).ready(function () {
    read_data();
    $('#btn-back').click(function () {
      window.history.back();
    })
      function read_data() {
        var i;
        $.ajax({
          type : "ajax",
          dataType : "json",
          async : false,
          url : "<?= base_url() ?>index.php/admin/read_qr_code",
          success : function (data) {
            console.log(data);

            var html = ' ';
            for (i =0; i<data.length;i++) {
                html += '<div class="card shadow m-2 float-left">'+
                          '<div class="card-body">'+
                              '<img style="width:200px;" src="<?= base_url()?>upload/code_qr/'+ data[i].code_qr +'">'+
                          '</div>'+
                          '<div class="card-footer text-center text-uppercase">'+
                            '<small>'+data[i].nama+'</small>'+
                          '</div>'+
                        '</div>';
            }

            $('#data-target').html(html);

          }
        });
      }

      $('#btn-refresh').click(function () {
         read_data();
      });
       $('#search').on('input',function () {
          var data_search = $(this).val();
          var i;
          $.ajax({
            type : "post",
            dataType : "json",
            url : "<?= base_url() ?>index.php/admin/search_qr_code",
            data : {input_search:data_search},
            success : function (data) {
              console.log(data);
               var html = ' ';
              for (i =0; i<data.length;i++) {
                  html += '<div class="card shadow m-2 float-left">'+
                            '<div class="card-body">'+
                                '<img style="width:200px;" src="<?= base_url()?>upload/code_qr/'+ data[i].code_qr +'">'+
                            '</div>'+
                            '<div class="card-footer text-center text-uppercase">'+
                              '<small>'+data[i].nama+'</small>'+
                            '</div>'+
                          '</div>';
              }
              $('#data-target').html(html);
            }
          })
      })
  })

  
</script>
</body>

</html>
