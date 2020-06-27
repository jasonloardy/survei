<?php $this->load->view('_layout/header') ?>

<style>
  .marker {
    background-image: url('https://i.imgur.com/MK4NUzI.png');
    background-size: auto;
    background-repeat: no-repeat;
    width: 40px;
    height: 60px;
    cursor: pointer;
  }

  .mapboxgl-popup {
    max-width: 200px;
  }

  .mapboxgl-popup-content {
    text-align: center;
    font-family: 'Open Sans', sans-serif;
  }
</style>

<!-- Modal -->
<div class="modal fade" id="detailSurveiModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="bodyModal">
          <b>Nama Survei</b><br>Test<br>
          <b>Penjelasan</b><br>Samsdkamsld askdmalskdm asdkmalskd<br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Survei Detail</h1>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 mt-3">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"><?= $nama_survei ?></h6>
    </div>
    <div class="card-body" id="map-container">
      <div id="map" class="map" style="width:100%; height:500px;"></div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php $this->load->view('_layout/footer') ?>
