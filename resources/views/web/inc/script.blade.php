<!-- JS Global Compulsory (Do not remove)-->
<script src="{{ asset('') }}assets/web/js/jquery-3.6.0.min.js"></script>
<script src="{{ asset('') }}assets/web/js/popper/popper.min.js"></script>
<script src="{{ asset('') }}assets/web/js/bootstrap/bootstrap.min.js"></script>

<!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
<script src="{{ asset('') }}assets/web/js/jquery.appear.js"></script>
<script src="{{ asset('') }}assets/web/js/counter/jquery.countTo.js"></script>
<script src="{{ asset('') }}assets/web/js/select2/select2.full.js"></script>
<script src="{{ asset('') }}assets/web/js/range-slider/ion.rangeSlider.min.js"></script>
<script src="{{ asset('') }}assets/web/js/owl-carousel/owl.carousel.min.js"></script>
<script src="{{ asset('') }}assets/web/js/jarallax/jarallax.min.js"></script>
<script src="{{ asset('') }}assets/web/js/jarallax/jarallax-video.min.js"></script>
<script src="{{ asset('') }}assets/web/js/magnific-popup/jquery.magnific-popup.min.js"></script>
<!-- Sweet Alerts js -->
<script src="{{ asset('') }}assets/admin/libs/sweetalert2/sweetalert2.min.js"></script>
<!-- Template Scripts (Do not remove)-->
<script src="{{ asset('') }}assets/web/js/custom.js"></script>


@if ($massage = Session::get('success'))
<script>
    Swal.fire({
  position: "top-end",
  icon: "success",
  title: "{{ $massage }}",
  showConfirmButton: !1,
  timer: 3000
  })
  Swal();
</script>
@endif


@if ($massage = Session::get('error'))
<script>
    Swal.fire({
position: "top-end",
icon: "Error",
title: "{{ $massage }}",
showConfirmButton: !1,
timer: 3000
})
Swal();
</script>
@endif