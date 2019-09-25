(function() {
    tinymce.PluginManager.add( 'custom_link_class', function( editor, url ) {
        // Add Button to Visual Editor Toolbar
        editor.addButton('custom_link_class', {
            title: 'Custom AvidXchange Styles',
			image: url + '/icon.png',
            cmd: 'custom_link_class',
			type: 'menubutton',
			menu: [
				{
					text: 'Insert Resources Bar',
					onclick: function() {
						editor.windowManager.open({
							title: 'Insert Additional Resource',
							body: [{
									type: 'textbox',
									name: 'img',
									label: 'Image URL',
									value: '',
									classes: 'my_input_image',
							   	},
							   	{
									type: 'button',
									name: 'my_upload_button',
									label: '',
									text: 'Upload Image',
									classes: 'my_upload_button',
							   	},
								{
									type: 'textbox',
									name: 'linktext',
									label: 'Resource Name'
								},
								{
									type: 'textbox',
									name: 'link',
									label: 'Link'
								}],
							onsubmit: function( e ) {
								editor.insertContent( '[resource img="' + e.data.img + '" text="' + e.data.linktext + '" link="' + e.data.link + '"]' );
							}
						});
					}
				},
				{
					text: 'Insert Quote',
					onclick: function() {
						editor.windowManager.open({
							title: 'Insert Quote',
							body: [{
								type: 'textbox',
								name: 'quote',
								label: 'The Quote'
							}],
							onsubmit: function( e ) {
								editor.insertContent( '[quote text="' + e.data.quote + '"]' );
							}
						});
					}
				},
				{
					text: 'Insert CTA',
					onclick: function() {
						editor.windowManager.open({
							title: 'Insert CTA',
							body: [{
								type: 'textbox',
								name: 'img',
								label: 'Image URL',
								value: '',
								classes: 'my_input_image',
							   },
							   {
								type: 'button',
								name: 'my_upload_button',
								label: '',
								text: 'Upload Image',
								classes: 'my_upload_button',
							   },
							   {
								type: 'textbox',
							    name: 'link',
							    label: 'Link'
							  }],
							onsubmit: function( e ) {
								editor.insertContent( '[cta img="' + e.data.img + '" link="' + e.data.link + '"]');
							}
						});
					}
				}
			]
        });
    });
})();

jQuery(document).ready(function($){
    $(document).on('click', '.mce-my_upload_button', upload_image_tinymce);
 
    function upload_image_tinymce(e) {
        e.preventDefault();
        var $input_field = $('.mce-my_input_image');
        var custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Add Image',
            button: {
                text: 'Add Image'
            },
            multiple: false
        });
        custom_uploader.on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $input_field.val(attachment.url);
        });
        custom_uploader.open();
    }
});