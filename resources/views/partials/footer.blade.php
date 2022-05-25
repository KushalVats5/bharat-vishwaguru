<!-- Bootstrap core JavaScript-->
<script src="{{ asset('tr/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('tr/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('tr/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('tr/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('tr/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<!-- <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script> -->
<!-- select2 js -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@php
$current_route = Request::url();
if(strpos($current_route, 'tr/admin')){
$role_slug = 'tr/admin';
}else if(strpos($current_route, 'tr/freelancer')){
$role_slug = 'tr/freelancer';
}else if(strpos($current_route, 'tr/user')){
$role_slug = 'tr/user';
}else{
$role_slug = '';
}
@endphp
<script>
let ajax_url = "<?php echo url('/'); ?>"; // depracated
let user_ajax_url = "<?php echo url($role_slug . '/'); ?>";
</script>
<script src="{{ asset('tr/js/tr-script.js') }}"></script>
<script>
    $(document).ready(function(){
    $('.mySelect2').select2({
        selectOnClose: true,
        placeholder: 'Select article category',
    });
});
</script>
@yield('script-js')