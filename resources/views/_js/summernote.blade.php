<!-- SUMMERNOTE -->
<link href="{{asset('web_assets/css/plugins/summernote/summernote.css')}}" rel="stylesheet">
<link href="{{asset('web_assets/css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">
<script src="{{asset('web_assets/js/plugins/summernote/summernote.min.js')}}"></script>
<script>
$(document).ready(function() {
	$('.summernote').summernote({
	      maxHeight:null,
	      minHeight:null,
	      onImageUpload: function(files, editor, welEditable) {
	    	  sendFile(files[0],editor,welEditable);
	    	  }
	  });

	function sendFile(files,editor,welEditable) {
	    if( files.size > 2*1024*1024 ){
	    	swal("{{trans('_web_alert.notice')}}", "檔案大小不得超過 2MB", "error");
	    	return;
	    }
	    data = new FormData();
	    data.append("_token", "{{ csrf_token() }}");
	    data.append("files", files);
	    $.ajax({
	        data: data,
	        type: "POST",
	        url: "{{url('web/upload_image')}}",
	        cache: false,
	        contentType: false,
	        processData: false,
	        success: function(data) {
	        	data = JSON.parse(data);
	        	if(data.files[0].error){
	        		swal("{{trans('_web_alert.notice')}}",  data.files[0].error, "error");
	        		return false
	        	}
	        	editor.insertImage(welEditable,data.files[0].url);
	        }
	    });
	}
});
</script>