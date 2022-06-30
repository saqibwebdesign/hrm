<script src="{{URL::to('/public/employee')}}/assets/plugins/jquery/jquery.min.js"></script>
<script src="{{URL::to('/public/employee')}}/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="{{URL::to('/public/employee')}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="{{URL::to('/public/employee')}}/js/jquery.slimscroll.js"></script>
<script src="{{URL::to('/public/employee')}}/js/waves.js"></script>
<script src="{{URL::to('/public/employee')}}/js/sidebarmenu.js"></script> 
<script src="{{URL::to('/public/employee')}}/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="{{URL::to('/public/employee')}}/js/custom.min.js"></script>
<script src="{{URL::to('/public/employee')}}/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{URL::to('/public/employee')}}/js/dev.js"></script>
@if(session()->has('success'))
	<script type="text/javascript">
		Swal.fire(
			'Success!',
			'{{ session()->get("success") }}',
			'success'
		);
	</script>
@endif
@if(session()->has('error'))
	<script type="text/javascript">
		Swal.fire(
			'Alert!',
			'{{ session()->get("error") }}',
			'error'
		);
	</script>
@endif