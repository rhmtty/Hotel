<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ url('assets/favicon.ico') }}" type="image/ico" />

    <title>@yield('title') | Guest House</title>

    @include('partials.cssfile')
  </head>

  <body class="nav-sm">
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
        <div class="right_col" role="main">
          <!-- top tiles -->
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
    <script>
      jQuery('#datepicker-start').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd' 
      });
      jQuery('#datepicker-end').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd'
      });
    </script>
    <script>
      $(document).on('click', '#log-out', function() {
        $('#ModalLogout').modal('show');
      });
    </script>
  @if(count($errors) > 0)
    <div id="ModalNotif" class="modal fade text-danger" role="dialog">
      <div class="modal-dialog">
      <!-- Modal content-->
          <div class="modal-content panel-warning" style="border-radius: 0px;">
              <div class="modal-header bg-danger" style="padding: 0px 10px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body" style="min-height: 80px;">
                <div class="alert alert-primary" style="padding: 1px 5px;border-radius: 0px;">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              </div>
          </div>
      </div>
    </div>
    <script type="text/javascript">$('#ModalNotif').modal('show');</script>
  @endif
  </body>
</html>
