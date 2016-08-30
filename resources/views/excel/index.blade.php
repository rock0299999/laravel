@extends('layouts.app')
<script src="http://dev-89gogo.pin2wall.com/app_assets/js/jquery/jquery.min.js"></script>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">up excel</div>

                <div class="panel-body">
                   hello update file!!!<br />
					<form action="{{ url('EX/IT')}}" method="post" enctype="multipart/form-data">
					   <table>				   
					       <tr>
					            <th>file</th>
					           <th>
					               <input type="file" name="file" id="file">
					           </th>
					       </tr>
					       <tr>
					           <th colspan="2">
					               <input type="hidden" name="_token" value="{{csrf_token()}}"/>
					               <input type="submit" value="submit"> <!-- id="submit" -->
					           </th>
					       </tr>
					   </table>
                    </form>             
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>

$(document).ready(function() {
    $("#submit").click(function() {
		var file = $('#file').val();
		console.log(file);
		var urll = "{{ url('EX/IT')}}";
        $.ajax({
            type: "POST",
            url: urll,
            dataType: "json",
            data: {
		    	"file":file,     				
				"_token":"{{ csrf_token() }}"              
            },
            success: function(data) {
                if (data.status == 1) {
                 	console.log('ok');
                 	console.log(data.message); 
                } else {
                	console.log('xx');
                	console.log(data.message);   
                }                   
            },
            error: function(jqXHR) {
                alert("發生錯誤: " + jqXHR.status);
            }
        })
    })
});


</script>