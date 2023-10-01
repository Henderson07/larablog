<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('pageTitle')</title>
    <!-- CSS files -->
    <base href="/">
    <link href="./backend/dist/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="./backend/dist/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="./backend/dist/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="./backend/dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('backend/dist/libs/ijaboCropTool/ijaboCropTool.min.css') }}">
    <link href="{{ asset('') }}" rel="stylesheet" />

    @stack('stylesheet')
    @livewireStyles
    <link href="./backend/dist/css/demo.min.css?1684106062" rel="stylesheet" />
</head>

<body>
    <div class="page">
        <!-- Navbar -->
        @include('backend.layouts.inc.header')
        <div class="page-wrapper">
            <!-- Page header -->
            @yield('pageHeader')
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    @yield('content')
                </div>
            </div>
            @include('backend.layouts.inc.footer')
        </div>
    </div>
    <!-- Libs JS -->
    <script src="./backend/dist/libs/apexcharts/dist/apexcharts.min.js?1684106062" defer></script>
    <script src="./backend/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1684106062" defer></script>
    <script src="./backend/dist/libs/jsvectormap/dist/maps/world.js?1684106062" defer></script>
    <script src="./backend/dist/libs/jsvectormap/dist/maps/world-merc.js?1684106062" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('backend/dist/libs/ijaboCropTool/ijaboCropTool.min.js') }}"></script>
    <!-- Tabler Core -->
    <script src="./backend/dist/js/tabler.min.js?1684106062" defer></script>
    @stack('scripts')
    @livewireScripts

    {{-- <script>
        window.addEventListener('showToastr', function(event) {
            console.log('event', event);
            toast.remove();

            if (event.detail.type === 'info') {
                toast.info(event.detail.message);
            } else if (event.detail.message === 'success') {
                toast.success(event.detail.message);
            } else if (event.detail.message === 'error') {
                toast.error(event.detail.messaeg);
            } else if (event.detail.message === 'warning') {
                toast.warning(event.detail.message);
            } else {
                return false;
            }
        });
    </script> --}}
    <script src="./backend/dist/js/demo.min.js?1684106062" defer></script>
</body>

</html>
