<!DOCTYPE html>
<html lang="en">
    @include('web.inc.head')

    <body>

        <!--=================================
header -->
        @include('web.inc.header')
        <!--=================================
 header -->
        <div id="wrapper">
            @yield('main-body')
        </div>
        <!--=================================
footer-->
        @include('web.inc.footer')
        <!--=================================
footer-->

        <!--=================================
Javascript -->

        @include('web.inc.script')

    </body>

</html>