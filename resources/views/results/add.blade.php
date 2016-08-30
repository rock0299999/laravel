@extends('_layouts.web')

<!-- ================== page-css ================== -->
@section('page-css')
<!--  -->
<link href="{{asset('web_assets/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('web_assets/css/style.css')}}" rel="stylesheet">






@endsection
<!-- ================== /page-css ================== -->

<!-- content -->
@section('content')
<!--  -->
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">

				<div class="ibox-content">
					<form method="post" class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label">主題</label>
							<div class="col-sm-10">
								<input type="text" id="vTitle" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">主要照片</label>
							<div class="col-md-10">
								<img id="Image" data-data="" style="width: 25%; min-width: 100px; max-width:150px; height: auto" src="{{asset('web_assets/img/empty.jpg')}}"> 
									<a class="btn btn-sm btn-info btn-image-modal" data-modal="image-form" data-id="">上傳圖片</a>
							</div>
						</div>

						
						<div class="form-group">
							<label class="col-md-2 control-label"></label>
							<div class="col-sm-10">
								<button class="btn btn-warning" id="sendSave" type="button">確定新增</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
<!-- /content -->

<!-- ================== page-js ================== -->
@section('page-js')
<!-- Mainly scripts -->
<script src="{{asset('web_assets/js/jquery-2.1.1.js')}}"></script>
<script src="{{asset('web_assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('web_assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('web_assets/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
@endsection
<!-- ================== /page-js ================== -->
<!-- ================== inline-js ================== -->
@section('inline-js')
<!--  -->
<!-- Public Crop_Image -->
@include('_js.crop_image')
<!-- end -->
<!-- Public SummerNote -->

<!-- end -->
<!-- Page-Level Scripts -->
<script>
var return_url = "{{ url('results/add')}}";
var doadd_url = "{{ url('results/doadd')}}";
    $(document).ready(function() {

        


        $("#sendSave").click(function() {
            var data = {"_token":"{{ csrf_token() }}"};
            data.vTitle = $("#vTitle").val();

            if( $('#Image').data('data') ==""){
            	swal("{{trans('_web.notice')}}", "圖片不得為空", "error");
            	return false;
            }
            data.vImage =  $('#Image').data('data');
           /* data.vSummary = $("#vSummary").val();
            data.vDetail = $('#vDetail').code(); 
            data.bShow = $("input[name=bShow]:checked").val();
            data.bOpen = $("input[name=bOpen]:checked").val();
            data.bTop = $("input[name=bTop]:checked").val();*/
    		$.ajax({
    			url : doadd_url,
    			data : data,
    			type : "POST",
    			success : function(rtndata) {
    				if (rtndata.status) {
    					swal("{{trans('_web.notice')}}",  rtndata.message, "success");
	                    setTimeout(function(){
	                        location.href = return_url;
	                    }, 1000);
    				} else {
    					swal("{{trans('_web.notice')}}",  rtndata.message, "error");
    				}
    			}
    		});
            
        });
    });
</script>
@endsection
<!-- ================== /inline-js ================== -->
