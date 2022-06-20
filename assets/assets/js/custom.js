$(document).ready(function () {
	
    $(".sortable").sortable();

    $(".content-container, .image_list_container").on('click', '.remove-btn', function () {
        var $data_url = $(this).data("url");

        swal({
            title: 'Emin misiniz?',
            text: "Bu işlemi geri alamayacaksınız!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet',
            cancelButtonText : "Hayır"
        }).then(function (result) {
            if (result.value) {
                window.location.href = $data_url;
            }
        });

    })

    $(".content-container, .image_list_container").on('change', '.isActive', function(){

        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if(typeof $data !== "undefined" && typeof $data_url !== "undefined"){

            $.post($data_url, { data : $data}, function (response) {

            });

        }

    })

    $(".image_list_container").on('change', '.isCover', function(){

        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if(typeof $data !== "undefined" && typeof $data_url !== "undefined"){

            $.post($data_url, { data : $data}, function (response) {

                $(".image_list_container").html(response);

                $('[data-switchery]').each(function () {
                    var $this = $(this),
                        color = $this.attr('data-color') || '#188ae2',
                        jackColor = $this.attr('data-jackColor') || '#ffffff',
                        size = $this.attr('data-size') || 'default'

                    new Switchery(this, {
                        color: color,
                        size: size,
                        jackColor: jackColor
                    });
                });

                $(".sortable").sortable();

            });

        }

    })

    $(".content-container, .image_list_container").on("sortupdate", '.sortable',  function(event, ui){

        var $data = $(this).sortable("serialize");
        var $data_url = $(this).data("url");

        $.post($data_url, {data : $data}, function(response){})

    })


    $(".button_usage_btn").change(function(){

        $(".button-information-container").slideToggle();

    })


    var uploadSection = Dropzone.forElement("#dropzone");

	uploadSection.on("addedfile", function(file) {

		var fn = file.name.toLowerCase();
		
		if(!fn.includes(".pdf") && !fn.includes(".doc") && !fn.includes(".docx") && !fn.includes(".xls") && !fn.includes(".xlsx") && !fn.includes(".jpg") && !fn.includes(".jpeg") && !fn.includes(".png") && !fn.includes(".gif") && !fn.includes(".svg")) {
			uploadSection.removeFile(file);
			swal({
	            title: 'Hata',
	            text: "Dosya formatı uyumsuz",
	            type: 'error',
	            confirmButtonColor: '#3085d6',
	            confirmButtonText: 'Tamam'
	        }).then(function (result) {
		
	        });

			return;
		} 		
		if(file && file.size > 20971520) { //20MB
			uploadSection.removeFile(file);
			swal({
	            title: 'Hata',
	            text: "Boyutu 20 MB'den büyük olan dosyalar yüklenemez",
	            type: 'error',
	            confirmButtonColor: '#3085d6',
	            confirmButtonText: 'Tamam'
	        }).then(function (result) {
	        });
		}
		
    });

    uploadSection.on("complete", function(file){
		var $data_url = $("#dropzone").data("url");
		
        $.post($data_url, {}, function(response){
			
            $(".image_list_container").html(response);

            $('[data-switchery]').each(function () {
                var $this = $(this),
                    color = $this.attr('data-color') || '#188ae2',
                    jackColor = $this.attr('data-jackColor') || '#ffffff',
                    size = $this.attr('data-size') || 'default'

                new Switchery(this, {
                    color: color,
                    size: size,
                    jackColor: jackColor
                });
            });

            $(".sortable").sortable();

        });

    })

});
