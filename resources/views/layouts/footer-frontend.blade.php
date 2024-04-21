<!-- JQuery-->
<script src="{{URL::asset('plugins/jquery/jquery-3.6.0.min.js')}}"></script>

<!-- Bootstrap 5-->
<script src="{{URL::asset('plugins/bootstrap-5.0.2/js/bootstrap.bundle.min.js')}}"></script>

<!-- Tippy JS -->
<script src="{{URL::asset('plugins/tippy/popper.min.js')}}"></script>
<script src="{{URL::asset('plugins/tippy/tippy-bundle.umd.min.js')}}"></script>

@yield('js')

<!-- Custom-->
<script src="{{URL::asset('js/custom.js')}}"></script>

<script>
    tippy('[data-tippy-content]', {
        animation: 'scale-extreme',
        theme: 'material',
    });
</script>
