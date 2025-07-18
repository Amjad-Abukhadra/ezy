<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Bridgeway')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="https://preview.keenthemes.com/ceres-html-pro">
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- Add this in your <head> before other CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700">

    <!-- Vendor CSS -->
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css">

    <!-- Global Stylesheets -->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css">
</head>

<body id="kt_body" style="background-image: url('{{ asset('assets/media/patterns/header-bg.png') }}');"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">

    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">



                <div id="kt_header" class="header align-items-stretch" data-kt-sticky="true"
                    data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                    <div class="container-xxl d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-3">
                            <!--header-->
                        </div>
                    </div>
                </div>
                <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
                    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
                        <h3 class="text-white fw-bolder fs-2qx me-5">@yield('page_title', 'Default Title')</h3>
                        <div class="d-flex align-items-center flex-wrap py-2">
                            <!--navbar-->
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column-fluid align-items-start container-xxl" id="kt_content_container">
                    <div class="content flex-row-fluid" id="kt_content">
                        <div class="card card-page">
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <script async src="https://www.google-analytics.com/analytics.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-L98VPZFG7E&cx=c&gtm=457e5791za200&tag_exp=...">
    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-37564768-1"></script>

    <!-- Global JS Bundle -->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

    <!-- Page Vendors JS -->
    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>

    <!-- Custom Page JS -->
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
