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
