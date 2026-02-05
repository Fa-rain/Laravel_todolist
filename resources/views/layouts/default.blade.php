@include('include.header')
    @include('include.navbar')
    <div class="container-fluid mb-5">
        @yield('content')
    </div>
    <script src="{{asset("assets/js/bootstrap.min.js")}}"></script>
@include('include.footer')
