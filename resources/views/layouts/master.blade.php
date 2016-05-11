<!DOCTYPE html>
<html>
    <head>
        <title>Laravel - @yield('title')</title>
    </head>
    <body>
		@include('layouts.partials.navigation')
            <div class="content">
                @yield('content')
            </div>

    </body>
</html>
