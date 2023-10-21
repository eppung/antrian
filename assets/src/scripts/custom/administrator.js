
$(document).ready(function () {
    var originalForm = $("#dalam_loket").clone();
    $("#loket_modal").on("hide.bs.modal", function () {
        $("#dalam_loket").replaceWith(originalForm.clone());
    });
});

// validasi form kosong
function validasi_loket() {
    if (document.loket_form.nama_loket.value == "") {
        $(loket_form.nama_loket).addClass("form-control-danger");
        document.loket_form.nama_loket.focus();
        return false;
    }
}

function validasi_layanan() {
    if (document.loket_form.nama_layanan.value == "") {
        $(loket_form.nama_layanan).addClass("form-control-danger");
        document.loket_form.nama_loket.focus();
        return false;
    }
    if (document.loket_form.kode_layanan.value == "") {
        $(loket_form.kode_layanan).addClass("form-control-danger");
        document.loket_form.nama_loket.focus();
        return false;
    }
}
//end validasi form kosong

//simpan data
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
            data: form.serialize(),
            success: function (data) {
                var obj = JSON.parse(data);
                console.log(obj.status);
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
            targets: 2, render: function (data, type, row) {
                if (row[2] == "1") {
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
    var aktif = table.row(row).data()[2];

    $("#loket_modal").modal({ backdrop: 'static', keyboard: true, show: true });
    $("#judul").text("Edit Data");
    $("#nama_loket").val(namaLoket);
    $("#id_loket").val(id);
    $('#loket_aktif').val(aktif);
    $("#div_status").attr('hidden', false);
});


//nonaktifkan data loket
$('#tabel-loket tbody').on('click', '.delete-loket', function () {
    var row = $(this).closest('tr');
    var id = $(this).attr("id");
    var namaLoket = table.row(row).data()[1];
    var aktif = table.row(row).data()[2];
    swal({
        title: 'Hapus data?',
        text: "Data akan dinonaktifkan",
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
