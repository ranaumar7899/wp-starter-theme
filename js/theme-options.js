jQuery(document).ready(function () {
    jQuery('.hma_jquery_ui_tabs').tabs({
        activate: function(event, ui) {
            window.location.hash = ui.newPanel.attr('id');
        }
    });
    hma_single_media_selector();
});
function hma_single_media_selector() {
    var media_uploader;

    jQuery(document).on('click', '.hma_media_picker', function (e) {
        e.preventDefault();
        var id_picker;
        var img_picker;
        id_picker = jQuery(this).data('idpicker');
        img_picker = jQuery(this).data('imagepicker');
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
        });
        media_uploader.open();
    });
}
