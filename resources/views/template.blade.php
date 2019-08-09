<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Hotel Merakyat</title>

    @include('partials.cssfile')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          @include('partials.leftbar')
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          @include('partials.header')
        </div>
        <!-- /top navigation -->

        <!-- page content -->

          <!-- /top tiles -->
          @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          @include('partials.footer')
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    @include('partials.jsfile')
  
  </body>
</html>
