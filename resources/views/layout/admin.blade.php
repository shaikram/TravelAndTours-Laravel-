<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @yield('links')
  </head>

  <body id="page-top"  class="hold-transition sidebar-mini layout-fixed">
    @yield('content')
  </body>

    @yield('scripts')
</html>
