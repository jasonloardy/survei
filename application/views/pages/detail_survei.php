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
      <div id="map" class="map" style="width:70%; height:600px;"></div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php $this->load->view('_layout/footer') ?>
