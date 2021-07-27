<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>{{ config('app.name') }} | Official Licenced Merchandise Shopping Online - Collection of Fashion, Lifestyle,
    Tech Accessories and more.</title>
  <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 10]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <!-- Favicon icon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
  <!-- Google font-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
  <!-- Required Fremwork -->
  <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/bower_components/bootstrap/css/bootstrap.min.css') }}">
  <!-- themify-icons line icon -->
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/icon/themify-icons/themify-icons.css') }}">
  <!-- ico font -->
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/icon/icofont/css/icofont.css') }}">
  <!-- Menu-Search css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/pages/menu-search/css/component.css') }}">
  <!-- jquery file upload Frame work -->
  <link href="{{ asset('backend/assets/pages/jquery.filer/css/jquery.filer.css') }}" type="text/css"
        rel="stylesheet"/>
  <link href="{{ asset('backend/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}"
        type="text/css" rel="stylesheet"/>
  <!--forms-wizard css-->
  <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/bower_components/jquery.steps/css/jquery.steps.css') }}">
  <!-- Switch component css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/switchery/css/switchery.min.css') }}">
  <!-- Style.css -->

  <link rel="stylesheet"
        href="{{asset('backend/bower_components/datatimepicker/css/jquery.datetimepicker.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/jquery.mCustomScrollbar.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/toastr.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/sweetalert/css/sweetalert.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/custom.css') }}">
  @yield('header')
  <script type="application/javascript">
    function base_url() {
      return "{{url('')}}"
    }
  </script>
</head>
<body>
<div id="pcoded" class="pcoded">
  <div class="pcoded-overlay-box"></div>
  <div class="pcoded-container navbar-wrapper">
    @include('partials.backend.topNavigation')
    <div class="pcoded-main-container">
      <div class="pcoded-wrapper">
        @include('partials.backend.leftSideNavigation')
        <div class="pcoded-content">
          <div class="pcoded-inner-content">
            <div class="main-body">
              <div class="page-wrapper">
                <div class="page-body">
                  @section('content')
                    <h1 class="text-center text-info" style="margin-top: 20%;">Under Development</h1>
                  @show
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@yield('models')
<!-- Required Jquery -->
<script type="text/javascript" src="{{ asset('backend/bower_components/jquery/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/bower_components/popper.js/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript"
        src="{{ asset('backend/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{ asset('backend/bower_components/modernizr/js/modernizr.js') }}"></script>

<!--Forms - Wizard js-->
<script src="{{ asset('backend/bower_components/jquery.cookie/js/jquery.cookie.js') }}"></script>
<script src="{{ asset('backend/bower_components/jquery.steps/js/jquery.steps.js') }}"></script>
<script src="{{ asset('backend/bower_components/jquery-validation/js/jquery.validate.js') }}"></script>
@if (isset($fileUpload))
  <!-- jquery file upload js -->
  <script src="{{ asset('backend/assets/pages/jquery.filer/js/jquery.filer.min.js') }}"
          type="text/javascript"></script>
  <script src="{{ asset('backend/assets/pages/filer/custom-filer.js') }}" type="text/javascript"></script>
  <script src="{{ asset('backend/assets/pages/filer/jquery.fileuploads.init.js') }}" type="text/javascript"></script>
@endif
<!-- Switch component js -->
<script type="text/javascript" src="{{ asset('backend/bower_components/switchery/js/switchery.min.js') }}"></script>
<!-- ck editor -->
<script src="{{ asset('backend/assets/pages/ckeditor/ckeditor.js') }}"></script>

<!-- Custom js -->
<script type="text/javascript" src="{{ asset('backend/assets/js/SmoothScroll.js') }}"></script>
<script src="{{ asset('backend/assets/pages/forms-wizard-validation/form-wizard.js') }}"></script>
<script src="{{ asset('backend/assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/demo-12.js') }}"></script>
<script src="{{ asset('backend/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/assets/js/script.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/assets/js/toastr.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/assets/js/jquery.form.min.js') }}"></script>
<script src="{{asset('backend/bower_components/datatimepicker/js/jquery.datetimepicker.full.min.js')}}"></script>

<script src="{{ asset('backend/bower_components/sweetalert/js/sweetalert.min.js') }}"></script>
@yield('footer')
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
<script>
  @if(Session::has('message'))
    toastr.options.closeDuration = 1000;
  toastr.options.closeEasing = 'swing';
  toastr.options.showMethod = 'slideDown';
  toastr.options.hideMethod = 'slideUp';
  toastr.options.closeMethod = 'slideUp';
  toastr.options.progressBar = true;
  toastr.options.closeButton = true;
  toastr.options.positionClass = "toast-bottom-right";
  const type = "{{ Session::get('type','info') }}";
  switch (type) {
    case 'info':
      toastr.info("{{ Session::get('message') }}");
      break;
    case 'success':
      toastr.success("{{ Session::get('message') }}");
      break;
    case 'warning':
      toastr.warning("{{ Session::get('message') }}");
      break;
    case 'error':
      toastr.error("{{ Session::get('message') }}");
      break;
  }
  @endif
  $(".switch").each(function () {
    new Switchery(document.getElementById('switch_' + $(this).data('id')), {size: 'small'});
    const switch_box = document.querySelector('#switch_' + $(this).data('id'));
    switch_box.onchange = function () {
      $.post($(this).data('route'), {_method: 'PUT', _token: '{{ csrf_token() }}', active: switch_box.checked});
    }
  });
  $(document).on('click', '.deleted', function (e) {
    let that = $(this), route = that.data('route'), id = that.data('id');
    e.preventDefault();
    if (confirm("Are your want to delete this item?")) {
      $.ajax({
        type: 'POST',
        url: route,
        data: {
          _method: 'DELETE',
          _token: '{{ csrf_token() }}'
        },
        success: function (data) {
          if (data.msg === 'success') {
            $(`#row_${id}`).remove();
            swal({title: 'Deleted!', text: 'Your file has been deleted.', type: 'success', timer: 2000});
          } else {
            swal({title: 'Failed!', text: 'Not deleted successfully, please try again!.', type: 'failed', timer: 2000});
          }
        }
      });
    }
  });
</script>
@yield('customjs')
</body>
</html>
