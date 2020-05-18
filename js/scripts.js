jQuery(document).ready(function () {   
    hma_single_media_picker();   
    hma_lazyload();
});


function hma_single_media_picker() {
    jQuery(document).on('change', '.single_media_picker', function () {
        var idpicker = jQuery(this).data('idpicker');
        var imgplacer = jQuery(this).data('imgplacer');
        var is_bg = jQuery(this).data('isbg');
        var form_data = new FormData(jQuery('.has_media')[0]);
        form_data.append("action", 'hma_has_media_form_ation');
        jQuery.ajax({
            url: hma_ajax_url,
            type: 'POST',
            data: form_data,
            contentType: false,
            processData: false,
            beforeSend: function () {
                jQuery('.btn_ajax_wait_model').click();
            },
            success: function (response) {
                response = JSON.parse(response);
                jQuery(idpicker).val(response.thumnail_id);
                if(is_bg=='yes'){
                    console.log(is_bg);
                    jQuery(imgplacer).css('background-image','url("'+response.image_url+'")');
                }else{
                 jQuery(imgplacer).html(response.image);   
                }                
                jQuery('.ajax_wait_close').click();
            },
        });

    })
}


function hma_lazyload(){
    jQuery('.hma_lazyload').Lazy();
}