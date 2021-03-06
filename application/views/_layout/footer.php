</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; SIG Survei 2020</span>
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    <a class="btn btn-primary" href="<?= base_url() ?>logout">Logout</a>
  </div>
</div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() ?>assets/template/sb-admin-2/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/template/sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>assets/template/sb-admin-2/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>assets/template/sb-admin-2/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url() ?>assets/template/sb-admin-2/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/template/sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script>
if ($(window).width() <= 768) {
  $("#accordionSidebar").addClass("toggled");
}
</script>

<script src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
<script src='https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css' rel='stylesheet' />

<?php
  $segment = $this->uri->segment(1);

  switch ($segment) {
    case 'kelola_survei':
      echo '<script src="'. base_url() .'assets/js/kelola_survei.js"></script>';
      break;
    case 's':
      echo '<script src="'. base_url() .'assets/js/survei.js"></script>';
      break;
    case 'respon_survei':
      if ($this->uri->segment(2) == 'detail') {
        echo '<script src="'. base_url() .'assets/js/detail_survei.js"></script>';
      } else {
        echo '<script src="'. base_url() .'assets/js/respon_survei.js"></script>';
      }
      break;
    default:
      break;
  }
?>

</body>

</html>
