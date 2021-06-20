 <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light topbar static-top">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          
          <div class="d-sm-flex align-items-center justify-content-between ml-4 text-blue-2 pb" style="word-spacing: 10;">
            <i class="fas fa-fw fa-home mr-2 "></i>
            <h5 class=" mb-0">Beranda</h5>
            
          </div>
          <!-- Topbar Navbar -->
          <div class="m-auto font-weight-bold rounded-2 jam text-white" >
           
            <label id="jam"  class="bg-dark rounded-2 pl-4 pr-4">12:00:00 AM</label>
            
          </div>
          <ul class="navbar-nav ml-auto d-flex align-items-center">


            <!-- Nav Item - Messages -->
            
            
               <div class="mr-2 d-none d-block text-gray-600 small text-right text-capitalize">
                <div class="mb-0 pb" style="font-size: 12pt; color: #FF7089;"><?= $this->session->userdata("Nama"); ?></div>
                <div class="pb" style="color: black">Jabatan : ceo</div>
              </div>
            <div class="topbar-divider d-none d-sm-block"></div>
            
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="<?= base_url() ?>assets/img/beauty_girl.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url() ?>admin/ganti_pass">
                  <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ganti Kata Sandi
                </a>
                <a class="dropdown-item" href="logout" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
                
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
