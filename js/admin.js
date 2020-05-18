jQuery(document).ready(function () {
    jQuery('.hma_wp_color_field').wpColorPicker();
    jQuery('.hma_select2').select2();
    hma_single_media_selector();
});
function hma_single_media_selector() {
    var media_uploader;

    jQuery(document).on('click', '.hma_media_picker', function (e) {
        e.preventDefault();

        id_picker = jQuery(this).data('idpicker');
        img_picker = jQuery(this).data('imagepicker');
        console.log(id_picker);
        console.log(img_picker);
        if (media_uploader) {
            media_uploader.open();
            return;
        }
        media_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Chose Media',
            button: {text: 'Insert'},
            multiple: true
        });
        media_uploader.on('select', function () {
            attachment = media_uploader.state().get('selection').first().toJSON();
            jQuery('.' + id_picker).val(attachment.id);
            //jQuery('.'+url_picker).val(attachment.url);
            jQuery('.' + img_picker).html('<img src="' + attachment.url + '">');
            //jQuery('.media-modal-close').click();//to close the model
        });
        media_uploader.open();
    });
}
