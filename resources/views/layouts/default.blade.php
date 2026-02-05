@include('include.header')
    @include('include.navbar')
    @yield('content')
    <script src="{{asset("assets/js/bootstrap.min.js")}}"></script>
@include('include.footer')
