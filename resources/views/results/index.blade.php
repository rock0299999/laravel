@extends('_template_web._layouts.main')

<!-- ================== page-css ================== -->
@section('page-css')
<!--  -->
<link href="{{asset('web_assets/css/bootstrap.min.css')}}"
	rel="stylesheet">
<link href="{{asset('web_assets/font-awesome/css/font-awesome.css')}}"
	rel="stylesheet">
<link
	href="{{asset('web_assets/css/plugins/dataTables/datatables.min.css')}}"
	rel="stylesheet">
<link
	href="{{asset('web_assets/css/plugins/blueimp/css/blueimp-gallery.min.css')}}"
	rel="stylesheet">
<link href="{{asset('web_assets/css/animate.css')}}" rel="stylesheet">
<link href="{{asset('web_assets/css/style.css')}}" rel="stylesheet">
<style>
.table-responsive table img {
	width: 100%;
	height: auto;
}
</style>
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
					<h5>{{Session::get('menu_title')}}</h5>
				</div>
				<div class="ibox-content">
					<div class="">
						<a href="javascript:void(0);" class="btn btn-primary btn-add">新增文章</a>
					</div>
					<div class="table-responsive" style="overflow-x: visible;">
						<table
							class="table table-striped table-bordered table-hover dataTables-travel"
							id="editable">
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- The Gallery as lightbox dialog, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
	<div class="slides"></div>
	<h3 class="title"></h3>
	<a class="prev">‹</a> <a class="next">›</a> <a class="close">×</a> <a
		class="play-pause"></a>
	<ol class="indicator"></ol>
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
<script
	src="{{asset('web_assets/js/plugins/jeditable/jquery.jeditable.js')}}"></script>
<script
	src="{{asset('web_assets/js/plugins/dataTables/datatables.min.js')}}"></script>
<!-- Custom and plugin javascript -->
<script src="{{asset('web_assets/js/inspinia.js')}}"></script>
<script src="{{asset('web_assets/js/plugins/pace/pace.min.js')}}"></script>
<!-- blueimp gallery -->
<script
	src="{{asset('web_assets/js/plugins/blueimp/jquery.blueimp-gallery.min.js')}}"></script>
@endsection
<!-- ================== /page-js ================== -->
<!-- ================== inline-js ================== -->
@section('inline-js')
<!--  -->
<!-- Page-Level Scripts -->
<script>
var ajax_url = "{{ url('index/web/results/getlist')}}";
var add_url = "{{ url('index/web/results/add')}}";
var edit_url = "{{ url('index/web/results/edit')}}";
var del_url = "{{ url('index/web/results/dodel')}}";
var copy_url = "{{ url('index/web/results/docopy')}}";
var dataTables = ".dataTables-travel";
var editTables = "#editable";
    $(document).ready(function() {
    	/**/
    var i=0;
      var table = $(dataTables).DataTable({
            dom: '<"html5buttons"B>lTfgitp',
            bProcessing: true,
            bServerside: true,
            columnDefs: [
                           { "width": "5%","targets": i},		//編號
                           { "width": "5%","targets": ++i},		//圖片
                           { "width": "15%","targets": ++i},	//主題
                           { "width": "5%","targets": ++i},		//上架
                           { "width": "5%","targets": ++i},		//公開
                           { "width": "*%","targets": ++i}
                         ],
            aoColumns: [
                        {"sTitle":"{{trans('_web.ticket.web.mall.product.table_iId')}}","mData":"iId"},
                        {
                            "sTitle":"{{trans('_web.ticket.web.mall.product.table_vImage')}}",
                            "mData":"vImage",
                            "mRender":function(data,type,row){
                            	return " <div class=\"lightBoxGallery\"><a href='"+ data +"' data-gallery=\"\"><img src='"+ data +"'></a></div>";
                           	}
                        },
             			{"sTitle":"{{trans('_web.ticket.web.mall.product.table_vTitle')}}","mData":"vTitle"},
             			{
                 			"sTitle":"{{trans('_web.ticket.web.mall.product.table_bShow')}}",
                 			"mData":"bShow",
                 			"mRender":function(data,type,row){
                     			var btn = "未知類別";
                     			switch(data){
                     			case 1:
                     				btn = "上架中";
                     				break;
                      			case 2:
                      				btn = "下架中";
                      				break;
                     			}
                     			return btn;
                 			}
                     	},
             			{
                 			"sTitle":"{{trans('_web.ticket.web.mall.product.table_bOpen')}}",
                 			"mData":"bOpen",
                			"mRender":function(data,type,row){
                     			var btn = "未知類別";
                     			switch(data){
                     			case 1:
                     				btn = "公開";
                     				break;
                      			case 2:
                      				btn = "不公開";
                      				break;
                     			}
                     			return btn;
                 			}
                     	},
             			{
                 			"sTitle":"{{trans('_web.ticket.web.mall.product.table_Action')}}",
                            "mRender":function(data,type,row){
                                                  var btn;
                                                  btn  = "<button class=\"btn-copy\" title=\"複製\"><i class=\"fa fa-files-o\" aria-hidden=\"true\"></i></button>&nbsp;";
                                                  btn += "<button class=\"btn-edit\" title=\"編輯\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></button>&nbsp;";
                                                  btn += "<button class=\"pull-right btn-del\" title=\"刪除\"><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i></button>";
                                                  return btn;
                            }
                        },
             			],
            sAjaxSource: ajax_url,
            ajax: ajax_url,
            //aaData: mydata,
            buttons: [{
                    extend: 'copy'
                }, {
                    extend: 'csv'
                }, {
                    extend: 'excel',
                    title: 'ExampleFile'
                }, {
                    extend: 'print',
                    customize: function(win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ],
            oLanguage: {
                "sProcessing":"{{trans('_datatables.oLanguage.sProcessing')}}",
                "sLengthMenu":"{{trans('_datatables.oLanguage.sLengthMenu')}}",
                "sZeroRecords":"{{trans('_datatables.oLanguage.sZeroRecords')}}",
                "sInfo":"{{trans('_datatables.oLanguage.sInfo')}}",
                "sInfoEmpty":"{{trans('_datatables.oLanguage.sInfoEmpty')}}",
                "sInfoFiltered":"{{trans('_datatables.oLanguage.sInfoFiltered')}}",
                "sSearch":"{{trans('_datatables.oLanguage.sSearch')}}",
                "oPaginate":{
                    "sFirst":"{{trans('_datatables.oLanguage.oPaginate.sFirst')}}",
                    "sPrevious":"{{trans('_datatables.oLanguage.oPaginate.sPrevious')}}",
                    "sNext":"{{trans('_datatables.oLanguage.oPaginate.sNext')}}",
                    "sLast":"{{trans('_datatables.oLanguage.oPaginate.sLast')}}"}
                },
             bJQueryUI:true
        });

       $('.btn-add').on('click', function () {
           location.href = add_url;
       } );
   	
       $('#editable tbody').on('click', '.btn-edit', function () {
           var tr = $(this).closest('tr');
           var idx = tr.attr('id');
           location.href = edit_url+"?id="+idx;
       } );

       $('#editable tbody').on('click', '.btn-copy', function () {
           var tr = $(this).closest('tr');
           var idx = tr.attr('id');
           swal({
               title: "複製",
               text: "複製",
               type: "warning",
               showCancelButton: true,
               cancelButtonText: "{{trans('_web.cancel')}}",
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "{{trans('_web.ok')}}",
               closeOnConfirm: false
           }, function () {
               $.ajax({
   				url : copy_url,
   				data : {"id":idx,"_token":"{{ csrf_token() }}"},
   				type : "POST",
       			success : function(rtndata) {
       				if (rtndata.status) {
       					swal("{{trans('_web.notice')}}", rtndata.message, "success");
   	                    setTimeout(function(){
   	                        table.ajax.reload();
   	                    }, 1000);
       				} else {
       					swal("{{trans('_web.notice')}}", rtndata.message, "error");
       				}
       			}
               })
           });
       } );
       
       $('#editable tbody').on('click', '.btn-del', function () {
           var tr = $(this).closest('tr');
           var idx = tr.attr('id');
           swal({
               title: "刪除",
               text: "刪除",
               type: "warning",
               showCancelButton: true,
               cancelButtonText: "{{trans('_web.cancel')}}",
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "{{trans('_web.ok')}}",
               closeOnConfirm: false
           }, function () {
               $.ajax({
   				url : del_url,
   				data : {"id":idx,"_token":"{{ csrf_token() }}"},
   				type : "POST",
       			success : function(rtndata) {
       				if (rtndata.status) {
       					swal("{{trans('_web.notice')}}", rtndata.message, "success");
   	                    setTimeout(function(){
   	                        table.ajax.reload();
   	                    }, 1000);
       				} else {
       					swal("{{trans('_web.notice')}}", rtndata.message, "error");
       				}
       			}
               })
           });
       } );
    });

</script>
@endsection
<!-- ================== /inline-js ================== -->
