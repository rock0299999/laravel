<!DOCTYPE html>
<html>
<head>
<meta charset="BIG5">
<title>Insert title here</title>
</head>
<body>

@foreach($posts as $post)
	<h2>{{ $post->title }}</h2>
	<h3>{{ $post->sub_title }}</h3>
	<p>{{ $post->content }}</p>
#endforeach
</body>
</html>