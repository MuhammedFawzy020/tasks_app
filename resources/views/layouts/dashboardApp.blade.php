<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partial.header')
<body>
<div class="container-scroller">
    @include('partial.navbar')
    <div class="container-fluid page-body-wrapper">
        @include('partial.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
           @yield('content')
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            @include('partial.footer')
            <!-- partial -->
        </div>
    </div>
</div>

    @include('partial.script') 
</body>
</html>