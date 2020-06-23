<?php $this->load->view('_layout/header') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Lihat Respon Survei</h1>
  <hr>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 mt-3">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Survei</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="tabel_respon" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Survei</th>
              <th>Deskripsi</th>
              <th>Responden</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php $this->load->view('_layout/footer') ?>
