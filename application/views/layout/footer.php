
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer mt-4">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Created By&copy; SIDP {Fauzan}</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade " id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content text-white bg-blue">
        <div class="modal-header">
          <h5 class="modal-title text-white" id="exampleModalLabel">Apakah yakin anda ingin keluar?</h5>
          <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="<?= base_url() ?>admin/logout">Logout</a>
        </div>
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
  <script src="<?= base_url() ?>assets/js/autoNumeric.js"></script>
  <script type="text/javascript">

    function startTime() {
      var today = new Date();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      document.getElementById('jam').innerHTML =
      h + ":" + m + ":" + s;
      var t = setTimeout(startTime, 500);
     
    }
    function checkTime(i) {
      if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
      return i;
    }
    $(document).ready(function () {
      $('#update_qr').click(function () {
        eks_qr_update();
      })
      function eks_qr_update() {

          window.location.href = '<?= base_url() ?>admin/page_update_qr';
          
      }
    })
  </script>
</body>

</html>