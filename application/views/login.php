<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LOGIN - SIP</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/custom-style.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/style-home.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/login.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.css'); ?>">

</head>
<body class="bg-blue-0">
<div class="jumbotron m-0 p-0 rounded-0 bg-blue-0">
<div class="row m-4">
  <div class="col">
    <div class="media d-flex align-items-center">
    <img src="<?= base_url() ?>assets/img/logo_s.svg" width="100px" height="100px">
    <div class="media-body">
      <h3 class="mt-0 pb text-blue-2">PT. Aptikma Indoneisa</h3>
      <p class="pl text-pink">Perusahaan Software House</p>
    </div>
  </div>
  </div>
</div>
<div class="row m-4">
  <div class="col-sm">
    <img src="<?= base_url() ?>assets/img/ilus2.svg" class="m-auto" width="100%">
  </div>
  <div class="col-sm">
    <div class="card rounded-1 p-4 ml-4 mr-4 mt-0 shadow-tin border-0" style="margin-top: -40px !important;">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h4 class="pb text-blue-2">Login Administrator</h4>
            <p class="pl text-blue-2">Gunakan Username/email atau Password/Kata Sandi untuk login</p>
            <div class="text-danger m-auto" id="alert-msg"></div>
            <form id="data" action="">
                <div class="input-field pb-4" width="100%">
                    <input type="text" name="username" class="text-pink pm pl-2 pr-2" id="name" required />
                    <i class="fa fa-user text-secondary fa-sm"></i>
                    <label for="name" class="pm text-secondary">Username atau Email</label>
                    
                    
                </div>
                <div class="mt-4 mb-4" id="input-field2" width="100%">
                
                    <input type="password" name="password" class="text-pink pm pl-2 pr-2" id="name1" required />
                    <i class="fa fa-key text-secondary fa-sm"></i>
                    <label for="name1" class="pm text-secondary">Password atau Kata Sandi</label>

                </div>
                <button id="btn-login" class="mt-4 p-3 btn-block btn bg-blue-2 rounded-1 text-white pb float-right pl-4 pr-4" type="button">Masuk</button>
                <h6 class="mt-4 p-4 d-flex"><label class="mt-4 pt-4 pl m-auto">Lupa Password</label></h6>
                <h6 class="pt-2 pb-4 d-flex"><label class="pl m-auto">Bantuan</label></h6>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row mx-auto" style="margin-top: -100px;">
  <div class="col p-0 m-0">
    <img src="<?= base_url() ?>assets/img/bg-login.svg" width="100%">
  </div>
</div>

<div class="row mx-auto">

    <!-- <div class="col">
        <img src="<?= base_url() ?>assets/img/ilustrasi_login.png" width="100%" alt="">
    </div>
    <div class="col bg-blue-2 p-4">
        <div class="row">
            <div class="col text-center">
                <img class="m-auto" width="20%;" src="<?= base_url() ?>assets/img/logo_s.svg" alt="">
                <h4 class="font-weight-bold text-white mt-2 ">SYSTEM INFORMASI PEGAWAI</h4>
                
            </div>
        </div> -->
       
     <!--    
        <div class="row">
            <div class="col">
            <form id="data" action="">
                <div class="input-field" width="100%">
                
                    <input type="text" name="username" id="name" required />
                    <i class="fa fa-user fa-sm"></i>
                    <label for="name">Username</label>
                    
                    
                </div>
                <div class="mt-4" id="input-field2" width="100%">
                
                    <input type="password" name="password" id="name1" required />
                    <i class="fa fa-key fa-sm"></i>
                    <label for="name1">Kata Sandi</label>

                </div>
            </form>
            </div>
        </div>
        <div class="row m-auto pt-2 pl" style="width:72%">
            <div class="col ">
                <div class="form-group form-check ">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" >
                    <label class="form-check-label text-white" for="exampleCheck1"><small>Ingatkan saya</small></label>
                </div>
                <button id="btn-login" class=" btn btn-primary text-white pb float-right pl-4 pr-4" type="button">Masuk</button>
            </div>
        </div>
       -->
       
            
        
      
    <!-- </div> -->
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
  <script>
    $(document).ready(function(){
        $('#btn-login').click(function(){
           login();
            
        });
        $(document).on('keypress',function(e) {
          if(e.which == 13){
           login();
          }
        });
        function login(){
            var data = $('#data').serialize();
            $.ajax({
                type: "post",
                dataType : "json",
                url: "<?= base_url() ?>login/proseslogin",
                data : data,
                success : function(status){
                    console.log(status);
                    if(status == 1){
                        window.location.href="<?= base_url() ?>";
                    }else{
                        $("#alert-msg").html("Username atau Password salah !!");
                        $("#alert-msg").css("display","block");
                        $("#alert-msg").css("transition","display 2s");
                    
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
                       //location.reload();
            }
            });
        }
    })
</script>
</body>
</html>






