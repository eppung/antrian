
$("#tess").click(function (e) {

	$.ajax({
		url: 'http://127.0.0.1:9100/htbin/kp.py',
		data: { p: 'Microsoft Print to PDF' },
		success: function (status) {
			console.log(status)
		}
	});

	e.preventDefault();

});

$(document).ready(function () {
	
	var data= [
			{
				"id": 194210039,
				// "node_id": "MDEw	OlJlcG9zaXRvcnkxOTQyMTAwMzk=",
				// "name": "anti-ROOT",
				"text": "pashayogi/anti-ROOT",
				
			},
			{
				"id": 209899554,
				// "node_id": "MDEwOlJlcG9zaXRvcnkyMDk4OTk1NTQ=",
				// "name": "sempak",
				"text": "pengenganteng/sempak",
				
			},
			{
				"id": 224242325,
				// "node_id": "MDEwOlJlcG9zaXRvcnkyMjQyNDIzMjU=",
				// "name": "maimunah00",
				"text": "maimunah007/maimunah00",
				
			},
			
		];
		$("#select_loket2").select2({
			data: data
		  })
	
});

//simpan submit
$("#loket_setting_form").submit(function (e) {
	

   
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
				if (data = true) {
					swal(
						        {
						            position: 'top-end',
						            type: 'success',
						            title: 'Data berhasil disimpan',
						            showConfirmButton: false,
						            timer: 1000
						        }
						    )
				}else{
					swal(
						        {
						            type: 'warning',
						            title: 'Oops...',
						            text: data,
						        }
						    )
				}
                
            }
        });
    
});
//end submit


//select2
$("#select_loket").select2({
	ajax: {
	  url: base_url+"setting/get_loket",
	//   url: "https://api.github.com/search/repositories",
	  dataType: 'json',
	  delay: 250,
	  data: function (params) {
		return {
		  q: params.term, // search term
		//   page: params.page
		};
		
	  },
	  processResults: function (data, params) {
		
		// parse the results into the format expected by Select2
		// since we are using custom formatting functions we do not need to
		// alter the remote JSON data, except to indicate that infinite
		// scrolling can be used
		// params.page = params.page || 1;

		return {
			results: data.items.map(function(item) {
				return {
				  id: item.kode_loket , 
				  text: item.full_name
				};
			  })
		//   results: data.items,
		//   pagination: {
		// 	more: (params.page * 30) < data.total_count
		//   }
		};
	  },
	  cache: true
	},
	placeholder: 'loket apa?',
	minimumInputLength: 1,
	templateResult: formatRepo,
	templateSelection: formatRepoSelection
  });

function formatRepo(repo) {
	if (repo.loading) {
		return repo.text;
	}

	var $container = $(
		"<div class='select2-result-repository clearfix'>" +
		// "<div class='select2-result-repository__avatar'><img src='" + repo.owner.avatar_url + "' /></div>" +
		// "<div class='select2-result-repository__meta'>" +
		"<div class='select2-result-repository__title'></div>" +
		"<div class='select2-result-repository__description'></div>" +
		//   "<div class='select2-result-repository__statistics'>" +
		// "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> </div>" +
		// "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> </div>" +
		// "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> </div>" +
		"</div>" +
		"</div>" +
		"</div>"
	);

	// $container.find(".select2-result-repository__title").text(repo.nama_loket);
	// $container.find(".select2-result-repository__description").text(repo.nama_loket);

	$container.find(".select2-result-repository__title").text(repo.text);
	$container.find(".select2-result-repository__description").text(repo.kode_loket);
	// $container.find(".select2-result-repository__forks").append(repo.forks_count + " Forks");
	// $container.find(".select2-result-repository__stargazers").append(repo.stargazers_count + " Stars");
	// $container.find(".select2-result-repository__watchers").append(repo.watchers_count + " Watchers");

	return $container;
}

function formatRepoSelection(repo) {
	return repo.text;
}
//end select2
