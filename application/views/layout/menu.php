
    <!-- Sidebar -->
    <ul class="navbar-nav bg-blue-2 sidebar sidebar-dark accordion toggled pl" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center mt-2" href="index.html">
        <div class="sidebar-brand-icon">
          <img width="100%" src="<?= base_url() ?>assets/img/logo_wengky.svg ?>">
          
        </div>
        <div class="sidebar-brand-text mx-3 font-weight-bold "><small>System Administrasi Pegawai</small></div>
      </a>



      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if($data_link == 0){ echo "active ";} ?>">
        <a class="nav-link" href="<?= base_url() ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <!-- Nav Item - Charts -->
      <li class="nav-item <?php if($data_link == 1){ echo "active";} ?>">
        <a class="nav-link" href="<?= base_url() ?>index.php/admin/karyawan">
          <i class="fa fa-users fa-2x"></i>
          <span>Data Karyawan</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if($data_link == 2){ echo "active";} ?>">
        <a class="nav-link" href="<?= base_url() ?>index.php/admin/gaji">
          <i class="fas fa-fw fa-hand-holding-usd"></i>
          <span>Gaji</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if($data_link == 3){ echo "active";} ?>">
        <a class="nav-link" href="<?= base_url() ?>index.php/admin/absensi">
          <i class="fa fa-list"></i>
          <span>Absensi</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if($data_link == 4){ echo "active";} ?>">
        <a target="_blank" class="nav-link" href="<?= base_url() ?>index.php/admin/view_qr_code">
          <i class="fas fa-qrcode"></i>
          <span>QR Code</span></a>
      </li>
      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if($data_link == 5){ echo "active";} ?>">
        <a class="nav-link" href="<?= base_url() ?>index.php/berita_acara">
          <i class="fa fa-tags"></i>
          <span>Berita Acara</span></a>
      </li>

      <!-- Divider -->
    

      <!-- Sidebar Toggler (Sidebar) -->
      

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column bg-blue-0">
      <!-- Main Content -->
      <div id="content">
