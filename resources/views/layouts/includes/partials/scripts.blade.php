  <!-- Essential javascripts for application to work-->
  <script src="{{ URL::asset('dash/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ URL::asset('dash/js/popper.min.js') }}"></script>
  <script src="{{ URL::asset('dash/js/bootstrap.min.js') }}"></script>
  <script src="{{ URL::asset('dash/js/main.js') }}"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.js"></script> --}}
  {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css"> --}}
  <script type="text/javascript" src="{{ URL::asset('dash/js/plugins/bootstrap-notify.min.js') }}"></script>

  <!-- The javascript plugin to display page loading on top-->
  <script src="{{ URL::asset('dash/js/plugins/pace.min.js') }}"></script>

  <script type="text/javascript">
      window.setTimeout("document.getElementById('openMessage').style.display='none';", 4000);
  </script>

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}