@extends('_template_web._layouts.main')

<!-- ================== page-css ================== -->
@section('page-css')
<!--  -->
<link href="{{asset('web_assets/css/bootstrap.min.css')}}"
	rel="stylesheet">
<link href="{{asset('web_assets/font-awesome/css/font-awesome.css')}}"
	rel="stylesheet">
<link href="{{asset('web_assets/css/plugins/iCheck/custom.css')}}"
	rel="stylesheet">
<link href="{{asset('web_assets/css/animate.css')}}" rel="stylesheet">
<link href="{{asset('web_assets/css/style.css')}}" rel="stylesheet">
<link
	href="{{asset('web_assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}"
	rel="stylesheet">
<link
	href="{{asset('web_assets/css/plugins/datapicker/datepicker3.css')}}"
	rel="stylesheet">
@endsection
<!-- ================== /page-css ================== -->

<!-- content -->
@section('content')
<!--  -->
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>
						<a href="{{ url('index/web/results')}}">成功案例</a> >>
						{{Session::get('menu_title')}}
					</h5>
				</div>
				<div class="ibox-content">
					<form method="post" class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label">主題</label>
							<div class="col-sm-10">
								<input type="text" id="vTitle" class="form-control"
									value="{{$info->vTitle}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">刊登日期</label>
							<div class="col-sm-10">
								<div class="col-sm-6">
									<input type="text" class="form-control datepicker" id="vDate"
										value="{{$info->vDate}}">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">主要照片</label>
							<div class="col-md-10">
								<img id="Image" data-data=""
									style="width: 25%; min-width: 100px; max-width:150px;height: auto"
									src="{{$info->vImageUrl}}"> <a
									class="btn btn-sm btn-info btn-image-modal"
									data-modal="image-form" data-id="">上傳圖片</a>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">簡介</label>
							<div class="col-sm-10">
								<input type="text" id="vSummary" class="form-control"
									value="{{$info->vSummary}}"> <span class="help-block m-b-none">簡介說明.</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">是否上架</label>
							<div class="col-sm-10">
								<div class="i-checks">
									<label><input type="radio" value="1" name="bShow" @if($info->bShow
										== 1) checked @endif> <i></i> 是 </label>
								</div>
								<div class="i-checks">
									<label> <input type="radio" value="2" name="bShow" @if($info->bShow
										== 2) checked @endif> <i></i> 否
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">是否公開</label>
							<div class="col-sm-10">
								<div class="i-checks">
									<label> <input type="radio" value="1" name="bOpen" @if($info->bOpen
										== 1) checked @endif> <i></i> 是
									</label>
								</div>
								<div class="i-checks">
									<label> <input type="radio" value="2" name="bOpen" @if($info->bOpen
										== 2) checked @endif> <i></i> 否
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">是否置頂</label>
							<div class="col-sm-10">
								<div class="i-checks">
									<label> <input type="radio" value="1" name="bTop" @if($info->bTop
										== 1) checked @endif> <i></i> 是
									</label>
								</div>
								<div class="i-checks">
									<label> <input type="radio" value="2" name="bTop" @if($info->bTop
										== 2) checked @endif> <i></i> 否
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<div class="ibox float-e-margins">
									<div class="ibox-title">
										<h5>編輯內容</h5>
									</div>
									<div class="ibox-content no-padding">
										<div id="vDetail" class="summernote">{!!$info->vDetail!!}</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label"></label>
							<div class="col-sm-10">
								<button class="btn btn-warning" id="sendSave" type="button">儲存</button>
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
<!--  -->
<!-- Mainly scripts -->
<script src="{{asset('web_assets/js/jquery-2.1.1.js')}}"></script>
<script src="{{asset('web_assets/js/bootstrap.min.js')}}"></script>
<script
	src="{{asset('web_assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script
	src="{{asset('web_assets/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('web_assets/js/inspinia.js')}}"></script>
<script src="{{asset('web_assets/js/plugins/pace/pace.min.js')}}"></script>
<!-- Data picker -->
<script
	src="{{asset('web_assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('web_assets/js/plugins/iCheck/icheck.min.js')}}"></script>
@endsection
<!-- ================== /page-js ================== -->
<!-- ================== inline-js ================== -->
@section('inline-js')
<!--  -->
<!-- Public Crop_Image -->
@include('_template_web._js.crop_image')
<!-- end -->
<!-- Public SummerNote -->
@include('_template_web._js.summernote')
<!-- end -->
<!-- Page-Level Scripts -->
<script>
var return_url = "{{ url('index/web/results')}}";
var dosave_url = "{{ url('index/web/results/dosave')}}";
    $(document).ready(function() {

   	 $('.datepicker').datepicker({
	    	format : "yyyy/mm/dd",
	        autoclose: true,
	    });
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
        
        $("#sendSave").click(function() {
            var data = {"id":"{{$info->iId}}","_token":"{{ csrf_token() }}"};
            data.vTitle = $("#vTitle").val();
            data.vDate = $("#vDate").val();
            if( $('#Image').data('data') !=""){
            	data.vImage =  $('#Image').data('data');
            }
            data.vSummary = $("#vSummary").val();
            data.vDetail = $('#vDetail').code(); 
            data.bShow = $("input[name=bShow]:checked").val();
            data.bOpen = $("input[name=bOpen]:checked").val();
            data.bTop = $("input[name=bTop]:checked").val();
    		$.ajax({
    			url : dosave_url,
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
