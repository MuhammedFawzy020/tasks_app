<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="{{url('/')}}/assets/vendors/js/vendor.bundle.base.js"></script>
<script src="{{url('/')}}/assets/vendors/chart.js/Chart.min.js"></script>
<script src="{{url('/')}}/assets/js/jquery.cookie.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/js/off-canvas.js"></script>
<script src="{{url('/')}}/assets/js/hoverable-collapse.js"></script>
<script src="{{url('/')}}/assets/js/misc.js"></script>
<script src="{{url('/')}}/assets/js/dashboard.js"></script>
<script src="{{url('/')}}/assets/js/todolist.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<script>
    $( '#admin_name' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
    } );
    $( '#assigned_to' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
    } );
</script>
