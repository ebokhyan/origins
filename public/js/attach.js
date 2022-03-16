function attachFile($attachField) {
    var attachError, attachedBlock, attachName = null;
    $attachField.on('change',function(){
        var fileSize = this.files[0].size;
        var fileMaxSize = $attachField.data('maxsize') ? $attachField.data('maxsize')*1024*1024 : null;	
        var formats = $(this).attr('accept') ? $(this).attr('accept').toString() : null;		
        var fullPath = $(this).val();
        var fileType = fullPath.substr(fullPath.lastIndexOf('.')).toLowerCase();
        
        if (fileMaxSize && fileSize > fileMaxSize) {
            if(!attachError) {
                $attachField.parents('label').after('<span class="attach_error"></span>');
                attachError = $attachField.parents('label').next('.attach_error');
            };
            attachError.text($attachField.data('sizeerror'));
            $attachField.val('');
        } else if (formats && !formats.includes(fileType)){
            if(!attachError) {
                $attachField.parents('label').after('<span class="attach_error"></span>');
                attachError = $attachField.parents('label').next('.attach_error');
            };
            attachError.text($attachField.data('typeerror'));
            $attachField.val('');
        } else {
            if (fullPath) {
                if(attachError) {
                    $(attachError).remove();
                    attachError = null;
                }
                
                var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
                var filename = fullPath.substring(startIndex);
                if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                    filename = filename.substring(1);
                }
                if(!attachedBlock) {
                    $attachField.parents('label').after('<div class="attached_block"><div class="file_name"></div><span class="attach_remove"></span></div>');
                    attachedBlock = $attachField.parents('label').next('.attached_block');
                    attachName = attachedBlock.find('.file_name');
                }
                attachName.text(filename);
                $attachField.parents('label').attr('hidden','');
            }
        }
    })
	
    $(document).on('click','.attach_remove',function(){
        if(attachedBlock) {
            $(attachedBlock).remove();
            attachedBlock = null;
            $attachField.val('');
            $attachField.parents('label').removeAttr('hidden');
        }
    })
}