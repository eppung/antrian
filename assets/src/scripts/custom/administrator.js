
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

//ketika modal ditutup
$("#loket_modal").on("hide.bs.modal", function () {
    $(loket_form).trigger('reset');
    $('input').removeClass('form-control-danger');
});
//end ketika modal ditutup

//simpan data
$("#loket-form").submit(function (e) {
    validasi_loket();
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
});
//end simpan data

//loket datatable
$('#tabel-loket').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: base_url+'./administrator/loketDatatable', // Change with your own
      method: 'GET', // You are freely to use POST or GET
    },    
  })