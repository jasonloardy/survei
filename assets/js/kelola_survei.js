$(document).ready(function() {
  tabel_survei();
});

function tabel_survei() {
  $('#tabel_survei').DataTable({
    "ajax" : {
      "url" : "kelola_survei/json_all",
      "dataSrc" : ""
    },
    "columns" : [
      { "data" : "id" },
      { "data" : "nama_survei" },
      { "data" : "deskripsi" },
      { "data" : "id",
        "render" : function (data, type, row) {
          return '<a href="#" class="btn btn-info btn-icon-split btn-sm">' +
                    '<span class="icon text-white-50">' +
                      '<i class="fas fa-edit"></i>' +
                    '</span>' +
                    '<span class="text">Edit</span>' +
                  '</a> ' +
                  '<a href="#" class="btn btn-danger btn-icon-split btn-sm">' +
                    '<span class="icon text-white-50">' +
                      '<i class="fas fa-trash"></i>' +
                    '</span>' +
                    '<span class="text">Delete</span>' +
                  '</a>'
        }
      },
    ]
  });
}

let index = 0;

function selectTipe(elem) {
  if (elem.value == 'short' || elem.value == 'long') {
    $(elem).parent().parent().parent().find("#parentOpsi").empty();
  } else {
    if ($(elem).parent().parent().parent().find("#parentOpsi").is(':empty')) {
      $(elem).parent().parent().parent().find("#parentOpsi").append('<div id="opsi">' +
                                                                      '<div class="form-row mb-2">' +
                                                                      '<div class="col-8">' +
                                                                      '<input type="text" class="form-control" name="param[pertanyaan]['+index+'][opsi][]" placeholder="Masukkan opsi">' +
                                                                      '</div>' +
                                                                      '</div>' +
                                                                      '</div>' +
                                                                      '<button type="button" class="btn btn-primary" onclick="tambahOpsi(this)">Tambah Opsi</button>');
    }
  }
}

function tambahPertanyaan(elem) {
  index++;
  $(elem).parent().find("#parentPertanyaan").append('<div id="pertanyaan">' +
                                                      '<hr>' +
                                                      '<div class="form-row mb-2">' +
                                                      '<div class="col-8">' +
                                                      '<input type="text" class="form-control" name="param[pertanyaan]['+index+'][nama]" placeholder="Masukkan pertanyaan">' +
                                                      '</div>' +
                                                      // '<div class="col-1">' +
                                                      // '</div>' +
                                                      '<div class="col">' +
                                                      '<select class="form-control" name="param[pertanyaan]['+index+'][tipe]" onchange="selectTipe(this)">' +
                                                      '<option value="short">Jawaban Singkat</option>' +
                                                      '<option value="long">Paragraf</option>' +
                                                      '<option value="radio">Pilihan Ganda</option>' +
                                                      '<option value="check">Kotak Centang</option>' +
                                                      '<option value="select">Drop-down</option>' +
                                                      '</select>' +
                                                      '</div>' +
                                                      '<button type="button" class="btn btn-danger col-1" onclick="hapusPertanyaan(this)">&times;</button>' +
                                                      '</div>' +
                                                      '<div id="parentOpsi"></div>' +
                                                      '</div>');
}

function hapusPertanyaan(elem) {
  index--;
  $(elem).parent().parent().remove();
}

function tambahOpsi(elem) {
  $(elem).parent().find("#opsi").append('<div class="form-row mb-2">' +
                                         '<div class="col-8">' +
                                         '<input type="text" class="form-control" name="param[pertanyaan]['+index+'][opsi][]" placeholder="Masukkan opsi">' +
                                         '</div>' +
                                         '<div class="col-4">' +
                                         '<button type="button" class="btn btn-primary" onclick="hapusOpsi(this)">&times;</button>' +
                                         '</div>' +
                                         '</div>');
  console.log("ok");
}

function hapusOpsi(elem) {
  $(elem).parent().parent().remove();
}
