<?php
include_once 'config.php';

$msg='';


if (isset($_GET["code"])) {
  $id = base64_decode($_GET["code"]);
  $company=$_GET["company"];
  $sql = "SELECT * from userprofile where user_id =$id";

  $res=mysqli_query($con,$sql);

  if (mysqli_num_rows($res)> 0) {
    $result=mysqli_fetch_assoc($res);
    if ($result["email_verify"] == 1) {
      $msg.='<div class="col-lg-5"><div class="alert alert-danger" role="alert">
      <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
      <div class="alert-text">Account Already Activatedt!</div>
      </div></div>';


    }
    else {
      $sql = "UPDATE userprofile SET  email_verify = 1 WHERE user_id=".$id;
      mysqli_query($con,$sql);

      $login_update=mysqli_query($con,"update login set active=1 where id=".$id."");
      $msg.='<div class="col-lg-5"><div class="alert alert-success" role="alert">
      <div class="alert-icon"><i class="flaticon-warning"></i></div>
      <div class="alert-text">Account Activated Successfully!</div>
      </div></div>';
    }
  } else {
    $msg.='<div class="col-lg-5"><div class="alert alert-danger" role="alert">
    <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
    <div class="alert-text">No account found!</div>
    </div></div>';

  }
}

?>

<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
  <!--end::Base Path -->
  <meta charset="utf-8" />
  <title>ProcedureRock | Activate Account </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!--begin::Fonts -->
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
  <script>
  WebFont.load({
    google: {
      "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
    },
    active: function() {
      sessionStorage.fonts = true;
    }
  });
  </script>

  <!--end::Fonts -->

  <!--begin::Page Custom Styles(used by this page) -->
  <link href="../../dashboard/assets/css/pages/error/error-1.css" rel="stylesheet" type="text/css" />

  <!--end::Page Custom Styles -->

  <!--begin:: Global Mandatory Vendors -->
  <link href="../../dashboard/assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />

  <!--end:: Global Mandatory Vendors -->

  <!--begin:: Global Optional Vendors -->
  <link href="../../dashboard/assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

  <!--end:: Global Optional Vendors -->

  <!--begin::Global Theme Styles(used by all pages) -->
  <link href="../../dashboard/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

  <!--end::Global Theme Styles -->

  <!--begin::Layout Skins(used by all pages) -->
  <link href="../../dashboard/assets/css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/css/skins/brand/dark.css" rel="stylesheet" type="text/css" />
  <link href="../../dashboard/assets/css/skins/aside/dark.css" rel="stylesheet" type="text/css" />

  <!--end::Layout Skins -->
  <link rel="shortcut icon" href="../../dashboard/assets/media/logos/favicon.ico" />
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

  <!-- begin:: Page -->
  <div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid  kt-error-v1" style="background-image: url(../../dashboard/assets/media//error/bg1.jpg);">
      <div class="kt-error-v1__container">
        <p class="kt-error-v1__desc">
          <?php echo $msg;?>
        </p>
      </div>
    </div>
  </div>

  <!-- end:: Page -->

  <!-- begin::Global Config(global config for global JS sciprts) -->
  <script>
  var KTAppOptions = {
    "colors": {
      "state": {
        "brand": "#5d78ff",
        "dark": "#282a3c",
        "light": "#ffffff",
        "primary": "#5867dd",
        "success": "#34bfa3",
        "info": "#36a3f7",
        "warning": "#ffb822",
        "danger": "#fd3995"
      },
      "base": {
        "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
        "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
      }
    }
  };
  </script>

  <!-- end::Global Config -->

  <!--begin:: Global Mandatory Vendors -->
  <script src="../../dashboard/assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>

  <!--end:: Global Mandatory Vendors -->

  <!--begin:: Global Optional Vendors -->
  <script src="../../dashboard/assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/custom/js/vendors/bootstrap-datepicker.init.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/custom/js/vendors/bootstrap-timepicker.init.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/custom/js/vendors/bootstrap-switch.init.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/custom/js/vendors/bootstrap-markdown.init.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/custom/js/vendors/bootstrap-notify.init.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/custom/js/vendors/jquery-validation.init.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/raphael/raphael.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/morris.js/morris.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/counterup/jquery.counterup.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/custom/js/vendors/sweetalert2.init.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
  <script src="../../dashboard/assets/vendors/general/dompurify/dist/purify.js" type="text/javascript"></script>

  <!--end:: Global Optional Vendors -->

  <!--begin::Global Theme Bundle(used by all pages) -->
  <script src="../../dashboard/assets/js/scripts.bundle.js" type="text/javascript"></script>

  <!--end::Global Theme Bundle -->
</body>

<!-- end::Body -->
</html>
