<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <link rel="stylesheet" href="{{ asset('creator') }}/css/mdb.min.css" />
    <link rel="stylesheet" href="{{ asset('creator') }}/css/admin.css" />
    <link href="{{ asset('template') }}/css/sb-admin-2.min.css" rel="stylesheet">
    @yield('header')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
        integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
        crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,800&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            /* font-weight: 400; */
            /* overflow-x: hidden; */
            /* background-color: #ffffff; */
            line-height: 1.5;
        }

    </style>
</head>

<body>
    <header>
        <!-- Sidebar -->
        @include('layouts.creator.sidebar')
        <!-- Sidebar -->

        <!-- Navbar -->
        @include('layouts.creator.nav')
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 58px">
        <div class="pt-4">
            @yield('content')
        </div>
    </main>
    <!--Main layout-->
    <!-- MDB -->
    <script type="text/javascript" src="{{ asset('creator') }}/js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('template') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('template') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('template') }}/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('template') }}/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('template') }}/js/demo/chart-area-demo.js"></script>
    <script src="{{ asset('template') }}/js/demo/chart-pie-demo.js"></script>
    @yield('script')
</body>

</html>
