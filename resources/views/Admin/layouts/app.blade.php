<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPINIA - @yield('title') </title>


    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />

</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        @include('Admin.layouts.navigation')

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            @include('Admin.layouts.topnavbar')

            <!-- Main view  -->
            <div>

            <iframe name="main" id="main" src="/admin/minor" width="100%" height="100%" frameborder="no"  marginwidth="0" marginheight="0" scrolling="no"></iframe>
{{--            @yield('content')--}}
            </div>

            <!-- Footer -->
            @include('Admin.layouts.footer')

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>

@section('scripts')
@show
<script>
    var timeIframe;
    window.onload = function() {
        timeIframe = setTimeout(GetIframeStatus, 10);
    }
    function GetIframeStatus() {
        var iframe = document.getElementById("main");
        var iframeWindow = iframe.contentWindow;
        //内容是否加载完
        if (iframeWindow.document.readyState == "complete") {
            var iframeWidth, iframeHeight;
            //获取Iframe的内容实际宽度
            iframeWidth = iframeWindow.document.documentElement.scrollWidth;
            //获取Iframe的内容实际高度
            iframeHeight = iframeWindow.document.documentElement.scrollHeight;
            //设置Iframe的宽度
            iframe.width = iframeWidth;
            //设置Iframe的高度
            iframe.height = iframeHeight;
        } else {
            timeIframe = setTimeout(GetIframeStatus, 10);
        }
    }
    //添加选中事件
    $(document).ready(function () {
        $("#side-menu  [target='main']").parent().click(function () {
            $("#side-menu  [target='main']").parent().removeClass('active');
            $(this).addClass('active');
        })
    });

</script>
</body>
</html>
