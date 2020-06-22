
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

  <style>
    .error {
      font-size: unset;
      color: #ff0000;
      width: unset;
    }
    .form-control.error {
      width: 100%;
    }
  </style>

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
            <form id="surveiForm" action="../survei/submit" method="post">

              <input type="hidden" name="param[nama_survei]" value="<?= $nama_survei ?>">

            <?= $deskripsi ?>

            <?php
            $index = 0;
            foreach ($pertanyaan as $p):
            ?>

              <hr>

              <div class="form-group" id="pertanyaan">
                <label for="<?= $p['id'] ?>"><?= $p['nama_pertanyaan'] ?></label>
                <input type="hidden" name="param[jawaban][<?= $index ?>][pertanyaan_id]" value="<?= $p['id'] ?>">
                <?php if ($p['tipe'] == 'geo') { ?>
                  <input type="text" class="form-control" id="geo" name="param[jawaban][<?= $index ?>][text]" value="<?= $p['tipe'] ?>" readonly>
                <?php } elseif ($p['tipe'] == 'short') { ?>
                  <input type="text" class="form-control" name="param[jawaban][<?= $index ?>][text]">
                <?php } elseif ($p['tipe'] == 'long') { ?>
                  <textarea class="form-control" rows="3" name="param[jawaban][<?= $index ?>][text]"></textarea>
                <?php } elseif ($p['tipe'] == 'radio') {
                  foreach ($p['opsi'] as $o) { ?>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="param[jawaban][<?= $index ?>][opsi][]" id="<?= $o->id ?>" value="<?= $o->id ?>">
                      <label class="form-check-label" for="<?= $o->id ?>">
                        <?= $o->nama_opsi ?>
                      </label>
                    </div>
                <?php } } elseif ($p['tipe'] == 'check') {
                  foreach ($p['opsi'] as $o) { ?>
                    <div class="form-check">
                      <input class="form-check-input required_group" type="checkbox" name="param[jawaban][<?= $index ?>][opsi][]" value="<?= $o->id ?>" id="<?= $o->id ?>">
                      <label class="form-check-label" for="<?= $o->id ?>">
                        <?= $o->nama_opsi ?>
                      </label>
                    </div>
                <?php } } elseif ($p['tipe'] == 'select') { ?>
                    <select class="form-control" name="param[jawaban][<?= $index ?>][opsi][]">
                  <?php foreach ($p['opsi'] as $o) { ?>
                        <option value="<?= $o->id ?>"><?= $o->nama_opsi ?></option>
                  <?php } ?>
                    </select>
                <?php } ?>

              </div>

            <?php
            $index++;
            endforeach;
            ?>

          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right" name="submit">Submit</button>
          </div>
        </form>
        </div>


      </div>

<?php $this->load->view('_layout/footer') ?>
