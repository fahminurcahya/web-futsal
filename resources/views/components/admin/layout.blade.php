<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard 2</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel=" stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel=" stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css')}}">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <x-admin.navbar />
        <x-admin.sidebar />

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    </div>
                </div>
            </div>
            {{$slot}}
        </div>
        <x-admin.footer />
    </div>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <script src="{{ asset('assets/dist/js/adminlte.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{ asset('assets/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('assets/dist/js/demo.js')}}"></script>
    <script src="{{ asset('assets/dist/js/pages/dashboard2.js')}}"></script>
</body>

</html>
