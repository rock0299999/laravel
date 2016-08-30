<script>
$(".logout").click(function(){
    swal({
        title: "{{trans('_web.logout.title')}}",
        text: "{{trans('_web.logout.note')}}",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "{{trans('_web.logout.cancel')}}",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "{{trans('_web.logout.ok')}}",
        closeOnConfirm: false
    }, function () {
    	$.ajax({
    		url : "{{ url('web/dologout')}}",
    		data:{"_token" : "{{ csrf_token() }}"},
    		type : "POST",
    		async : false,
    		success : function(rtndata) {
    			if (rtndata.status) {
    				swal("{{trans('_web.logout.success')}}", rtndata.message, "success");
    				setTimeout(function(){
        				location.reload();
        				},1000);
    			} else {
    				swal("{{trans('_web.logout.success')}}", rtndata.message, "error");
    			}
    		}
    	});
    });
})

$(".btn-modal").click(function() {
    var modal = $(this).data('modal');
    $('#' + modal).modal();
})

</script>


<script>
/*
 * Alert Type And Message example
 */
$('.demo1').click(function(){
	swal("{{trans('_web.notice')}}", rtndata.message);
});

$('.demo2').click(function(){
	swal("{{trans('_web.notice')}}", rtndata.message, "success");
	swal("{{trans('_web.notice')}}", rtndata.message, "error");
});

$('.demo3').click(function () {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function () {
        swal("Deleted!", "Your imaginary file has been deleted.", "success");
    });
});

$('.demo4').click(function () {
    swal({
                title: "Are you sure?",
                text: "Your will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false },
            function (isConfirm) {
                if (isConfirm) {
                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
});
</script>
