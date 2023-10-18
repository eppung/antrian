
    $(document).ready(function () {
        $("#loket-form").validate({
            errorClass:"form-control-danger",
            rules: {
                nama_loket : {
                required: true,
               
                },
                kode_loket: {
                required: true,
                
                }
                },
                messages : {
                    nama_loket: {
                        required: "Kolom tidak boleh kosong"
                    },
                    age: {
                        required: "Kolom tidak boleh kosong"
                  
                    }
                    }
        });
    });

    $("#loket-form").submit(function(e) {
            var form = $(this);
        var btntxt = $("#simpan-loket", form).val();
        $("#simpan-loket", form).val('Tunggu...');
        e.preventDefault();
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data) {
                var obj = JSON.parse(data);
                console.log(obj.nama_loket);
                console.log(btntxt);
                // if (obj.status == true) {
                //     //success
                // } else {
                //     //failed
                // }
                $("#simpan-loket", form).val(btntxt);
            }
        });
    });

  

