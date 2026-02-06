<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'To Do List App')</title>
    <link href="{{asset("assets\css\bootstrap.min.css")}}" rel="stylesheet">
    <script>
        setTimeout(() => {
            document.querySelectorAll('.flash-message').forEach(el => {
                el.style.opacity = "0";
                setTimeout(() => el.remove(), 500);
            });
        }, 3000);
    </script>


</head>
<body class = "bg-body-tertiary d-flex flex-column min-vh-100">
