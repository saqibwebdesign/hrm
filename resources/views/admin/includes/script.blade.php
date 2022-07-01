
  <!-- footer  -->
<script src="{{URL::to('/public/admin/assets')}}/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="{{URL::to('/public/admin/assets')}}/js/popper.min.js"></script>
<!-- bootstarp js -->
<script src="{{URL::to('/public/admin/assets')}}/js/bootstrap.min.js"></script>
<!-- sidebar menu  -->
<script src="{{URL::to('/public/admin/assets')}}/js/metisMenu.js"></script>
<!-- waypoints js -->
<script src="{{URL::to('/public/admin/assets')}}/vendors/count_up/jquery.waypoints.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{URL::to('/public/admin/assets')}}/js/custom.js"></script>
<script src="{{URL::to('/public/admin/assets')}}/js/custom2.js"></script>
<script src="{{URL::to('/public/admin/assets')}}/js/dev.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API')}}&libraries=places"></script>
<script src="{{URL::to('/public/admin/assets')}}/vendors/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{URL::to('/public/admin/assets')}}/vendors/datatable/js/dataTables.responsive.min.js"></script>
<script src="{{URL::to('/public/admin/assets')}}/vendors/datatable/js/dataTables.buttons.min.js"></script>

<script type="text/javascript">
   $(document).ready(function() {
   
   setTimeout(function() {
      $('#websiteOverlay').addClass('loaded');
   }, 1000);
})
</script>

