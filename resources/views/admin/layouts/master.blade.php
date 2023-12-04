<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Dashboard - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    @include("admin.layouts.vendor-css")

</head>
<body>

<div class="page">
    <!-- Sidebar -->
    @include("admin.layouts.left-sidebar")

    <div class="page-wrapper">
        <!-- Page header -->
        @include("admin.layouts.topbar")
        <!-- Page body -->
        @yield('content')

        @include("admin.layouts.footer")
    </div>
</div>

@include("admin.layouts.vendor-scripts")

</body>
</html>
