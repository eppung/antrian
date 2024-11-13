


$(document).ready(function () {
    //reset loket modal
    var originalForm = $("#dalam_loket").clone();
    
    $("#loket_modal").on("hide.bs.modal", function () {
        $("#dalam_loket").replaceWith(originalForm.clone());
        $("#loket-form").attr('action',base_url+'antrian/Administrator/simpanLoket');

    });

    //reset layanan modal
    var originalFormLayanan = $("#div_formLayanan").clone();
    $("#layanan_modal").on("hide.bs.modal", function () {
        $("#div_formLayanan").replaceWith(originalFormLayanan.clone());
    });

   
   
});


//LOKET

//simpan data loket
$("#loket-form").submit(function (e) {

    if (document.loket_form.nama_loket.value == "") {
        $(loket_form.nama_loket).addClass("form-control-danger");
        document.loket_form.nama_loket.focus();
        return false;
    } else {
        var form = $(this);
        var btntxt = $("#simpan-loket", form).val();
        $("#simpan-loket", form).val('Tunggu...');
        e.preventDefault();

        var url = form.attr('action');
       
        $.ajax({
            type: "POST",
            url: url,
            data: {'loket': $("#input :input").serializeArray(),'layanan': $("#ceklis-layanan :input").serializeArray()},
            success: function (data) {
                var obj = JSON.parse(data);
                
                if (obj.status == "success") {
                    $("#tabel-loket").DataTable().ajax.reload();
                    swal(
                        {
                            position: 'top-end',
                            type: 'success',
                            title: 'Data berhasil disimpan',
                            showConfirmButton: false,
                            timer: 1000
                        }
                    )
                    $("#loket_modal").modal("hide");
                    location.reload();
                } else {
                    swal(
                        {
                            type: 'warning',
                            title: 'Oops...',
                            text: 'Data sudah ada',
                        }
                    )
                }
                $("#simpan-loket", form).val(btntxt);
            }
        });
    }
});
//end simpan data

//loket datatable
var table = $('#tabel-loket').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: base_url + './administrator/loketDatatable', // Change with your own
        method: 'GET', // You are freely to use POST or GET
    }, columnDefs: [
        {
            targets: 3, render: function (data, type, row) {
                if (row[3] == "1") {
                    return 'Aktif'
                } else {
                    return 'Nonaktif'
                }
            }
        }
    ]
});

//modal untuk edit loket
$('#tabel-loket tbody').on('click', '.edit-loket', function () {


    var row = $(this).closest('tr');
    var id = $(this).attr("id");

    var namaLoket = table.row(row).data()[1];
    var aktif = table.row(row).data()[3];
    var kode_loket = table.row(row).data()[2];

    $("#loket-form").attr('action', base_url + 'administrator/updateLoket')

    $("#loket_modal").modal({ backdrop: 'static', keyboard: true, show: true });

    $("#nama_loket").val(namaLoket);
    $("#kode_loket").val(kode_loket);
    $('#aktif').val(aktif).change();
    $("#div_status").attr('hidden', false);
    $("#ceklis-layanan").attr('hidden', false);
    $.ajax({
        type: "POST",
        url: base_url+'administrator/get_layanan_by_loket',
        data: {'loket':kode_loket},
        dataType: "json",
        success: function (response) {
           
            var container = $('#cbcontainer');

            for (let index = 0; index < response.length; index++) {
                const element = index;
                var checked
                if (response[index]['aktif'] == 1) {
                    checked="checked";
                }
                $('<div class="custom-control custom-checkbox mb-5">' +
                    '<input type="checkbox" class="custom-control-input" id="'+ response[index]['kode_layanan'] +'" name="'+ response[index]['kode_layanan'] +'" '+checked+' />' +
                    '<label class="custom-control-label" for="'+ response[index]['kode_layanan'] +'">'+response[index]['nama_layanan'] +
                    '</label></div>').appendTo(container);
            }
        }
    });


});

//hapus data loket
$('#tabel-loket tbody').on('click', '.delete-loket', function () {
    var row = $(this).closest('tr');
    var id = $(this).attr("id");
    var namaLoket = table.row(row).data()[1];
    var aktif = table.row(row).data()[2];
    swal({
        title: 'Hapus data?',
        text: "Data akan dihapus dari database",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
        confirmButtonClass: 'btn btn-success margin-5',
        cancelButtonClass: 'btn btn-danger margin-5',
        buttonsStyling: false
    }).then(
        result => {
            // handle confirm
            if (result.value) {
                // handle confirm
                $.ajax({
                    type: "POST",
                    url: base_url + "Administrator/deleteLoket",
                    data: { id_loket: id, nama_loket: namaLoket },
                    dataType: "json",
                    success: function (response) {
                        if (response.status == "success") {
                            swal(
                                'Terhapus!',
                                'Berhasil diproses.',
                                'success'
                            )
                            $('#tabel-loket').DataTable().ajax.reload();
                        } else {
                            swal(
                                'Gagal!',
                                response.status,
                                'warning'
                            )
                            $('#tabel-loket').DataTable().ajax.reload();
                        }
                    }
                });
            } else {
                // handle dismiss, result.dismiss can be 'cancel', 'overlay', 'close', and 'timer'
                swal(
                    'Batal',
                    'Proses dibatalkan',
                    'error'
                )
            }
        },

    )

});
//END LOKET



//LAYANAN
//simpan data layanan
$("#layanan_form").submit(function (e) {

    if (document.layanan_form.nama_layanan.value == "") {
        $(layanan_form.nama_layanan).addClass("form-control-danger");
        document.layanan_form.nama_layanan.focus();
        return false;
    } else {
        var form = $(this);
        var btntxt = $("#simpan_layanan", form).val();
        $("#simpan_layanan", form).val('Tunggu...');
        e.preventDefault();

        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj.status == "success") {
                    $("#tabel-layanan").DataTable().ajax.reload();
                    swal(
                        {
                            position: 'top-end',
                            type: 'success',
                            title: 'Data berhasil disimpan',
                            showConfirmButton: false,
                            timer: 1000
                        }
                    )
                    $("#layanan_modal").modal("hide");

                } else {
                    swal(
                        {
                            type: 'warning',
                            title: 'Oops...',
                            text: 'Data sudah ada',
                        }
                    )
                }
                $("#simpan_layanan", form).val(btntxt);
            }
        });
    }
});
//end simpan data

//layanan datatable
var tableLayanan = $('#tabel-layanan').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: base_url + './administrator/layananDatatable', // Change with your own
        method: 'GET', // You are freely to use POST or GET
    }, columnDefs: [
        {
            targets: 3, render: function (data, type, row) {
                if (row[3] == "1") {
                    return 'Aktif'
                } else {
                    return 'Nonaktif'
                }
            },

        }
    ]
});

//modal untuk edit layanan
$('#tabel-layanan tbody').on('click', '.edit-layanan', function (e) {

    var row = $(this).closest('tr');
    var id = $(this).attr("id");
    var form = $("#layanan_form");

    var btntxt = $("#simpan_layanan", form).val();

    e.preventDefault();

    var namaLayanan = tableLayanan.row(row).data()[1];
    var kodeLayanan = tableLayanan.row(row).data()[2];
    var aktif = tableLayanan.row(row).data()[3];


    $("#layanan_modal").modal({ backdrop: 'static', keyboard: true, show: true });
    $("#judulModalLayanan").text("Edit Data");
    $("#nama_layanan").val(namaLayanan);
    $("#id_layanan").val(id);
    $("#kode_layanan").val(kodeLayanan);
    $('#layanan_aktif').val(aktif);
    $("#div_statusLayanan").attr('hidden', false);
    $("#iconLayanan").attr('hidden', true);
    $("#simpan_layanan").removeAttr('type');
    $("#simpan_layanan").prop('readonly', true);

    // pada saat klik simpan (untuk update data)
    $("#simpan_layanan").on('click', function () {
        $("#simpan_layanan", form).val('Tunggu...');

        $.ajax({
            type: "POST",
            url: base_url + "Administrator/updateLayanan",
            data: $("#layanan_form").serialize(),
            dataType: "json",
            success: function (response) {

                if (response.status == 'success') {
                    $("#tabel-layanan").DataTable().ajax.reload();
                    swal(
                        {
                            position: 'top-end',
                            type: 'success',
                            title: 'Data berhasil disimpan',
                            showConfirmButton: false,
                            timer: 1000
                        }
                    )
                    $("#layaan_modal").modal("hide");
                } else {
                    swal(
                        {
                            type: 'warning',
                            title: 'Oops...',
                            text: response.status,
                        }
                    )
                }
                $("#simpan_layanan", form).val(btntxt);
            }
        });
    });
});

//modal untuk edit layanan
$('#tabel-layanan tbody').on('click', '.edit-gambar-layanan', function (e) {

    var row = $(this).closest('tr');
    var id = $(this).attr("id");
    var form = $("#layanan_form");

    var btntxt = $("#simpan_layanan", form).val();

    var url = form.attr('action');

    e.preventDefault();

    var namaLayanan = tableLayanan.row(row).data()[1];
    var kodeLayanan = tableLayanan.row(row).data()[2];
    var aktif = tableLayanan.row(row).data()[3];

    $("#layanan_modal").modal({ backdrop: 'static', keyboard: true, show: true });
    $("#judulModalLayanan").text("Edit Data");
    $("#nama_layanan").val(namaLayanan);
    $("#nama_layanan").attr('readonly', true);
    $("#id_layanan").val(id);
    $("#id_layanan").attr('readonly', true);;
    $("#kode_layanan").val(kodeLayanan);
    $("#kode_layanan").attr('readonly', true);;
    $("#iconLayanan").attr('hidden', false);



});

$('#tabel-layanan tbody').on('click', '.delete-layanan', function () {
    var row = $(this).closest('tr');
    var id = $(this).attr("id");
    var namaLayanan = tableLayanan.row(row).data()[1];
    var aktif = tableLayanan.row(row).data()[3];
    swal({
        title: 'Hapus data?',
        text: "Data akan dihapus dari database",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
        confirmButtonClass: 'btn btn-success margin-5',
        cancelButtonClass: 'btn btn-danger margin-5',
        buttonsStyling: false
    }).then(
        result => {
            // handle confirm
            if (result.value) {
                // handle confirm
                $.ajax({
                    type: "POST",
                    url: base_url + "Administrator/deleteLayanan",
                    data: { id_layanan: id, nama_layanan: namaLayanan },
                    dataType: "json",
                    success: function (response) {
                        if (response.status == "success") {
                            swal(
                                'Terhapus!',
                                'Berhasil diproses.',
                                'success'
                            )
                            $('#tabel-layanan').DataTable().ajax.reload();
                        } else {
                            swal(
                                'Gagal!',
                                response.status,
                                'warning'
                            )
                            $('#tabel-layanan').DataTable().ajax.reload();
                        }
                    }
                });
            } else {
                // handle dismiss, result.dismiss can be 'cancel', 'overlay', 'close', and 'timer'
                swal(
                    'Batal',
                    'Proses dibatalkan',
                    'error'
                )
            }
        },

    )

});



