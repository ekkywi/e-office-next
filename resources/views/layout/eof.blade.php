<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield("title")</title>

    {{-- General CSS Files --}}
    <link href="{{ asset("modules/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("modules/fontawesome/css/all.min.css") }}" rel="stylesheet">

    {{-- Template CSS --}}
    <link href="{{ asset("css/style.css") }}" rel="stylesheet">
    <link href="{{ asset("css/components.css") }}" rel="stylesheet">
    <link href="{{ asset("css/menu.css") }}" rel="stylesheet">

</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">

            {{-- Navbar --}}
            @include("components.eof-navbar")

            {{-- Main Content --}}
            <div class="main-content">
                @yield("content")
            </div>

        </div>

        {{-- Footer --}}
        @include("components.eof-footer")

    </div>
    @yield("script")
</body>

</html>
