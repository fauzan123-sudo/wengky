<?php 

$this->load->view('layout/header');
$data['data_link'] = $active_link;
$this->load->view('layout/menu',$data);
$this->load->view('layout/header_content');


?>

 <div class="container-fluid p-0 mx-auto">

  <div class="row pl-3 pr-3 ">
     <div class="col mb-4 mt-3" style="display: inline-table;">
      <div class="card bg-pink shadow-tin h-100 py-2 rounded-1 border-0 ">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-white text-capitalize mb-1"><h4 class=" pb">Sistem Informasi Data Pegawai </h4></div>
              <div class="h6 mb-0 text-blue-dark pb">PT. Aptikma Indonesia</div>
              <small><label class="text-light font">Perum Puri Kartika Asri Blok F No 13</label></small>
            </div>
            <div class="col-auto text-right">
              <img src="<?= base_url() ?>assets/img/ilus1.png" width="70%">
            </div>
          </div>
        </div>
      </div>

      <!--  -->

      <div class="row mt-4">
        <div class="col">
            <div class="card shadow-tin rounded-1">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <div class="media d-flex align-items-center">
                        <div class="media-body mr-3">
                          <h6 class="mb-0 pl text-dark" style="font-size: 9pt">Total Karyawan</h6>
                          <label class="mb-0 pb text-pink" style="font-size: 15pt; color: black"><?= $pegawai_count ?> Orang</label>
                        </div>
                        <i class="text-blue-2   fa fa-users fa-5x"></i>
                      </div>
                  </div>  
                </div>
              </div>

            </div>
        </div>
        <div class="col">
          <div class="card shadow-tin rounded-1 bg-blue-2 border-0">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <div class="media d-flex align-items-center">
                        <div class="media-body mr-3">
                          <h6 class="mb-0 pl text-white" style="font-size: 9pt">Total Gaji</h6>
                          <label class="mb-0 pb text-pink" style="font-size: 15pt; color: black">RP. 20.000.000</label>
                        </div>
                        <i class="text-white   fa fa-comment-dollar fa-5x"></i>
                    
                      </div>
                  </div>  
                </div>
              </div>

            </div>
        </div>
      </div>
      <!--  -->
      <div class="row">
        <div class="col">
          <div class="card mt-4 shadow-tin rounded-1">
            <div class="card-body ">
              <div class="row">
                <div class="col d-flex align-items-center justify-content-between">
                  <small class="pb text-pink"><i class="fas fa-chart-pie mr-2"></i> Statistik Absensi</small>
               
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                      <div class="dropdown-header">Statistik :</div>
                      <a class="dropdown-item" href="#">Report Statistik</a>
                      <a class="dropdown-item" href="#">Lihat Detail</a>
                     
                    </div>
                  </div>

                </div>
              </div>
              <div class="row">
                <div class="col">
                  <canvas id="myChart" width="10px" height="300px"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     <div class="col mb-4 mt-3" style="display: inline-table;"  >
      <div class="card shadow-tin h-100 rounded-1">
        <div class="card-body">
          <div class="row mb-2">
            <div class="col col-xl col-md d-flex align-items-center justify-content-between">
              <small class="pb text-pink"><i class="fas fa-history mr-2"></i> Riwayat User</small>
               <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                      <div class="dropdown-header">Statistik :</div>
                      <a class="dropdown-item" href="#">Report</a>
                      <a class="dropdown-item" href="#">Lihat Detail</a>
                     
                    </div>
                  </div>
            </div>
          </div>
          <?php

           ?>
          <?php 
           
       
            foreach ($rlogin as $key){ 
              $data_time = time_indo_convert($key->waktu) ;
            

          ?>
          <div class="row history">
            <div class="col">
              <div class="card border-0">
                <div class="card-body  p-1" style="border-radius: 10px 0px 10px 10px;">
                  <div class="row " >
                    <div class="col">
                      <ul >
                        <li class="pl text-blue-2">Tanggal dan Waktu</li>
                        <li class="pb text-blue-2"><?= $data_time[0] ?></li>
                        <li class="pb " style="color: black;"><?= $data_time[1] ?> WIB</li>
                      </ul>
                    </div>
                    <div class="col text-right">
                      <div class="media d-flex align-items-center">
                        <div class="media-body mr-3">
                          <h6 class="mb-0 pb text-capitalize" ><?= $key->nama ?></h6>
                          <label class="mb-0 pb" style="font-size: 9pt; color: black">Jabatan : <?= $key->jabatan ?></label>
                        </div>
                        <img class="rounded-circle" src="<?= base_url() ?>assets/img/wadmin.png" width="50px" height="50px">
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
           <hr>
         <?php } 
 
         ?>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col ">
          <div class="bg-pink text-white pt-2 pb-2 pr-4 pl-4  rounded-1 shadow-tin d-flex align-items-center justify-content-between">
            <small class="pb"><i class="fas fa-newspaper mr-2"></i> Berita Acara</small>
             <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-white"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                      <div class="dropdown-header">Berita Acara :</div>
                      <a class="dropdown-item" href="#">Report</a>
                      <a class="dropdown-item" href="#">Lihat Detail</a>
                     
                    </div>
                  </div>
          </div>
         
        </div>
      </div>
      <div class="row mt-1">
        <div class="col">
          <?php
           if (count($berita_acara) >= 3) {
            for ($i=0; $i < 3; $i++) { 
           ?>
          <div class="card mt-3 shadow-tin rounded-1">
            <div class="card-body">
               <div class="media d-flex align-items-center">
                  <div class="media-body mr-3">
                    <h6 class="text-blue-2 pb" ><?= $berita_acara[$i]->title ?></h6>
                   <small class="pl text-muted"><p><?php echo substr($berita_acara[$i]->isi, 0,100)."...";  ?></p></small>
                  </div>
                  <img class="img-fluid" src="<?= base_url('upload/berita/'.$berita_acara[$i]->image) ?>" height="100px">
                </div>
                <button class="btn-outline-danger btn-sm btn rounded-1 pb pl-4 pr-4">Cek</button>
            </div>
          </div>
        <?php 
      }}elseif (count($berita_acara) == 2) {
          for ($i=0; $i < 2; $i++) { 
        ?>

        <div class="card mt-3 shadow-tin rounded-1">
            <div class="card-body">
               <div class="media d-flex align-items-center">
                  <div class="media-body mr-3">
                    <h6 class="text-blue-2 pb" ><?= $berita_acara[$i]->title ?></h6>
                   <small class="pl text-muted"><p><?php echo substr($berita_acara[$i]->isi, 0,100)."...";  ?></p></small>
                  </div>
                  <img src="<?= base_url('upload/berita/'.$berita_acara[$i]->image) ?>" height="100px">
                </div>
                <button class="btn-outline-danger btn-sm btn rounded-1 pb pl-4 pr-4">Cek</button>
            </div>
          </div>
        <?php
      }}elseif (count($berita_acara) == 2) {
          for ($i=0; $i < 2; $i++) { 

            ;
            ?>

            <div class="card mt-3 shadow-tin rounded-1">
            <div class="card-body">
               <div class="media d-flex align-items-center">
                  <div class="media-body mr-3">
                    <h6 class="text-blue-2 pb" ><?= $berita_acara[$i]->title ?></h6>
                   <small class="pl text-muted"><p><?php echo substr($berita_acara[$i]->isi, 0,100)."...";  ?></p></small>
                  </div>
                  <img src="<?= base_url('upload/berita/'.$berita_acara[$i]->image) ?>" height="100px">
                </div>
                <button class="btn-outline-danger btn-sm btn rounded-1 pb pl-4 pr-4">Cek</button>
            </div>
          </div>
      <?php } }elseif (count($berita_acara) == 1) {
          for ($i=0; $i < 1; $i++) { 

      ?>

          <div class="card mt-3 shadow-tin rounded-1">
            <div class="card-body">
               <div class="media d-flex align-items-center">
                  <div class="media-body mr-3">
                    <h6 class="text-blue-2 pb" ><?= $berita_acara[$i]->title ?></h6>
                   <small class="pl text-muted"><p><?php echo substr($berita_acara[$i]->isi, 0,100)."...";  ?></p></small>
                  </div>
                  <img src="<?= base_url('upload/berita/'.$berita_acara[$i]->image) ?>" height="100px">
                </div>
                <button class="btn-outline-danger btn-sm btn rounded-1 pb pl-4 pr-4">Cek</button>
            </div>
          </div>
      <?php
      } }else{

        ?>
           <div class="berita_kosong pb overflow-hidden ">
            <div class="news_null m-4 p-4">
              <img src="<?= base_url() ?>assets/img/ilus_kosong.svg" width="40%"><br>
            <label>Berita Kosong </label>
            </div>
            
          </div>
        <?php
      } ?>
        </div>
      </div>

    </div>
  </div>
  

 </div>



<?php
$this->load->view('layout/footer');




?>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: [ 'Sakit', 'Izin', 'Absen', 'Masuk'],
        datasets: [{
            data: [12, 19, 3, 5],
            backgroundColor: [
                'rgba(51, 225, 51, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
                
               
                
            ],

            borderWidth: 1
        }]
    },
    options: {
       responsive: true,
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 100,

                }
            }]
        }
    }
});
</script>