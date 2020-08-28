<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPINIA - @yield('title') </title>


    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />

</head>
<body class="gray-bg">

  <!-- Wrapper-->

        <!-- Navigation -->
{{--        @include('Admin.layouts.navigation')--}}

        <!-- Page wraper -->
{{--        <div id="page-wrapper" class="gray-bg">--}}

            <!-- Page wrapper -->
{{--            @include('Admin.layouts.topnavbar')--}}

            <!-- Main view  -->
            @yield('content')

            <!-- Footer -->
{{--            @include('Admin.layouts.footer')--}}

{{--        </div>--}}
        <!-- End page wrapper-->

    <!-- End wrapper-->

{{--<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>--}}

@section('scripts')
@show

</body>
</html>
