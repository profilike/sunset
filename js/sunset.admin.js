jQuery(document).ready(function($){

	var mediaUploader;

	$('#upload-button').on('click', function(e){
		e.preventDefault();
		if( mediaUploader ){
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose s Profile Picture',
			button: {
				text: 'Choose Picture'
			},
			multiple: false
		});

		mediaUploader.on('select',function(){
			attachement = mediaUploader.state().get('selection').first().toJSON();
			console.log(attachement);
			$('#profile-picture').val(attachement.url);
			$("#profile-picture-preview").css('background-image','url(' + attachement.url + ')');
		});

		mediaUploader.open();

	});

});