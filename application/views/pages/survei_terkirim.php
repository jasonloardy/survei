
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $nama_survei ?></title>


  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>assets/template/sb-admin-2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>assets/template/sb-admin-2/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?= base_url() ?>assets/template/sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  </head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Begin Page Content -->
    <div class="container">

      <!-- Main Content -->
      <div id="content">

        <div class="card">
          <h5 class="card-header"><?= $nama_survei ?></h5>
          <div class="card-body">
            <?php if ($this->session->flashdata('msgInsertJawabanOk')) { ?>
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
              <strong><?= $this->session->flashdata('msgInsertJawabanOk') ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php } ?>
          </div>
        </form>
        </div>


      </div>

<?php $this->load->view('_layout/footer') ?>
