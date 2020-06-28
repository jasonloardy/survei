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
      { "data" : "nama_survei",
        "render" : function (data, type, row) {
          return '<a href="s/'+row.id+'" target="_blank">'+data+'</a>';
        }
      },
      { "data" : "deskripsi" },
      { "data" : "id",
        "render" : function (data, type, row) {
          return '<a href="kelola_survei/hapus/'+data+'" class="btn btn-danger btn-icon-split btn-sm" onclick="return confirm(\'Yakin ingin menghapus Data Survei ini?\')">' +
                    '<span class="icon text-white-50">' +
                      '<i class="fas fa-trash"></i>' +
                    '</span>' +
                    '<span class="text">Hapus</span>' +
                  '</a>';
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
    let indexOpsi = $(elem).parent().parent()[0].children[0].innerHTML;
    indexOpsi = indexOpsi.replace('<input type="text" class="form-control" name="param[pertanyaan][', '');
    indexOpsi = indexOpsi.replace('][nama]" placeholder="Masukkan pertanyaan" required="">', '');
    indexOpsi = parseFloat(indexOpsi);
    if ($(elem).parent().parent().parent().find("#parentOpsi").is(':empty')) {
      $(elem).parent().parent().parent().find("#parentOpsi").append('<div id="opsi">' +
                                                                      '<div class="form-row mb-2">' +
                                                                      '<div class="col-8">' +
                                                                      '<input type="text" class="form-control" name="param[pertanyaan]['+indexOpsi+'][opsi][]" placeholder="Masukkan opsi" required>' +
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
                                                      '<input type="text" class="form-control" name="param[pertanyaan]['+index+'][nama]" placeholder="Masukkan pertanyaan" required>' +
                                                      '</div>' +
                                                      '<div class="col">' +
                                                      '<select class="form-control" name="param[pertanyaan]['+index+'][tipe]" onchange="selectTipe(this)">' +
                                                      '<option value="short">Jawaban Singkat</option>' +
                                                      '<option value="long">Paragraf</option>' +
                                                      '<option value="radio">Pilihan Ganda</option>' +
                                                      '<option value="check">Kotak Centang</option>' +
                                                      '<option value="select">Drop-down</option>' +
                                                      '</select>' +
                                                      '</div>' +
                                                      '<div class="col-1">' +
                                                      '<button type="button" class="btn btn-danger btn-block" onclick="hapusPertanyaan(this)">&times;</button>' +
                                                      '</div>' +
                                                      '</div>' +
                                                      '<div id="parentOpsi"></div>' +
                                                      '</div>');
}

function hapusPertanyaan(elem) {
  index--;
  $(elem).parent().parent().parent().remove();
}

function tambahOpsi(elem) {
  let indexOpsi = $(elem).parent().parent()[0].children[1].children[0].innerHTML;
  indexOpsi = indexOpsi.replace('<input type="text" class="form-control" name="param[pertanyaan][', '');
  indexOpsi = indexOpsi.replace('][nama]" placeholder="Masukkan pertanyaan" required="">', '');
  indexOpsi = parseFloat(indexOpsi);
  $(elem).parent().find("#opsi").append('<div class="form-row mb-2">' +
                                         '<div class="col-8">' +
                                         '<input type="text" class="form-control" name="param[pertanyaan]['+indexOpsi+'][opsi][]" placeholder="Masukkan opsi" required>' +
                                         '</div>' +
                                         '<div class="col-4">' +
                                         '<button type="button" class="btn btn-primary" onclick="hapusOpsi(this)">&times;</button>' +
                                         '</div>' +
                                         '</div>');
}

function hapusOpsi(elem) {
  $(elem).parent().parent().remove();
}
