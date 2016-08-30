@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

				<form class="form-horizontal" method="post" action="/user/icon-upload" accept-charset="UTF-8" enctype="multipart/form-data">  
				    <input type="file" class="form-control" id="user_icon_file" name="user_icon_file" placeholder="上傳圖片" value="">
				</form>
            </div>
        </div>
    </div>
</div>
@endsection
