
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
            <?= $deskripsi ?>

            <?php foreach ($pertanyaan as $p): ?>

              <?php if ($p['tipe'] == 'geo' || $p['tipe'] == 'non') { ?>
                <div class="form-group">
                  <input type="text" class="form-control" id="geo" value="<?= $p['tipe'] ?>" readonly>
                </div>

              <?php } else { ?> <!-- end if -->

              <hr>

              <div class="form-group">
                <label for="<?= $p['id'] ?>"><?= $p['nama_pertanyaan'] ?></label>
                <?php if ($p['tipe'] == 'short') { ?>
                  <input type="text" class="form-control">
                <?php } elseif ($p['tipe'] == 'long') { ?>
                  <textarea class="form-control" rows="3"></textarea>
                <?php } elseif ($p['tipe'] == 'radio') {
                  foreach ($p['opsi'] as $o) { ?>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="<?= $o->id ?>" value="<?= $o->id ?>" checked>
                      <label class="form-check-label" for="<?= $o->id ?>">
                        <?= $o->nama_opsi ?>
                      </label>
                    </div>
                <?php } } elseif ($p['tipe'] == 'check') {
                  foreach ($p['opsi'] as $o) { ?>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="<?= $o->id ?>" id="<?= $o->id ?>">
                      <label class="form-check-label" for="<?= $o->id ?>">
                        <?= $o->nama_opsi ?>
                      </label>
                    </div>
                <?php } } elseif ($p['tipe'] == 'select') { ?>
                    <select class="form-control" id="exampleFormControlSelect1">
                  <?php foreach ($p['opsi'] as $o) { ?>
                        <option value="<?= $o->id ?>"><?= $o->nama_opsi ?></option>
                  <?php } ?>
                    </select>
                <?php } ?>

              </div>

              <?php } ?>

            <?php endforeach; ?>

          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right" name="submit">Submit</button>
          </div>
        </div>


      </div>

<?php $this->load->view('_layout/footer') ?>