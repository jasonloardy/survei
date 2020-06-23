$(document).ready(function() {
  tabel_respon();
});

function tabel_respon() {
  $('#tabel_respon').DataTable({
    "ajax" : {
      "url" : "kelola_survei/json_all",
      "dataSrc" : ""
    },
    "columns" : [
      { "data" : "id",
        "render" : function (data, type, row) {
          return '<a href="s/'+data+'" target="_blank">'+data+'</a>';
        }
      },
      { "data" : "nama_survei",
        "render" : function (data, type, row) {
          return '<a href="s/'+row.id+'" target="_blank">'+data+'</a>';
        }
      },
      { "data" : "deskripsi" },
      { "data" : "responden" },
      { "data" : "id",
        "render" : function (data, type, row) {
          return '<a href="respon_survei/detail/'+data+'" class="btn btn-info btn-icon-split btn-sm">' +
                    '<span class="icon text-white-50">' +
                      '<i class="fas fa-info"></i>' +
                    '</span>' +
                    '<span class="text">Detail</span>' +
                  '</a>';
        }
      },
    ]
  });
}
