<?php $this->load->view('_layout/header') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Kelola Data Survei</h1>
  <hr>

  <div class="modal fade" id="surveiModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="surveiModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="kelola_survei/tambah" method="post">
            <div class="form-group">
              <label for="namaSurvei">Nama Survei</label>
              <input type="text" class="form-control" name="nama_survei" placeholder="Masukkan nama survei">
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <input type="text" class="form-control" nama="deskripsi" placeholder="Masukkan deskripsi survei">
            </div>
            <hr>
            <div id="parentPertanyaan">
              <!-- <div id="geolocation">
                <div class="form-row mb-2">
                  <div class="col-8">
                    <input type="text" class="form-control" name="pertanyaan[][nama]" placeholder="Geolocation">
                  </div>
                </div>
              </div> -->
              <div id="pertanyaan">
                <div class="form-row mb-2">
                  <div class="col-8">
                    <input type="text" class="form-control" name="param[pertanyaan][0][nama]" placeholder="Masukkan pertanyaan">
                  </div>
                  <div class="col">
                    <select class="form-control" name="param[pertanyaan][0][tipe]" onchange="selectTipe(this)">
                      <option value="short">Jawaban Singkat</option>
                      <option value="long">Paragraf</option>
                      <option value="radio">Pilihan Ganda</option>
                      <option value="check">Kotak Centang</option>
                      <option value="select">Drop-down</option>
                    </select>
                  </div>
                </div>
                <div id="parentOpsi"></div>
              </div>
            </div>
            <hr>
            <button type="button" class="btn btn-primary" onclick="tambahPertanyaan(this)">Tambah Pertanyaan</button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <button type="button" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#surveiModal">
    <span class="icon text-white-50">
      <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah</span>
  </button>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 mt-3">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Survei</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="tabel_survei" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Survei</th>
              <th>Deskripsi</th>
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
