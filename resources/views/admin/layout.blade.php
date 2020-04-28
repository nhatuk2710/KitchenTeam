<!DOCTYPE html>
<html lang="en">
<head>
@includeIf('admin.html.head')
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        @includeIf('admin.html.leftnav')

        <!-- top navigation -->
        @includeIf('admin.html.topnav')
        <!-- /top navigation -->
        @yield('home')
        <!-- page content -->

        @includeIf('admin.html.footer')
    </div>
</div>

<!-- jQuery -->@includeIf('admin.html.script')
</body>
</html>
