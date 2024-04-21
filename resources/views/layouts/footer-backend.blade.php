<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- Jquery -->
<script src="{{URL::asset('plugins/jquery/jquery-3.6.0.min.js')}}"></script>

<!-- Bootstrap 5 -->
<script src="{{URL::asset('plugins/bootstrap-5.0.2/js/bootstrap.bundle.min.js')}}"></script>

<!-- Sidemenu -->
<script src="{{URL::asset('plugins/sidemenu/sidemenu.js')}}"></script>

<!-- P-scroll -->
<script src="{{URL::asset('plugins/p-scrollbar/p-scrollbar.js')}}"></script>
<script src="{{URL::asset('plugins/p-scrollbar/p-scroll.js')}}"></script>

@yield('js')

<!-- Simplebar JS -->
<script src="{{URL::asset('plugins/simplebar/js/simplebar.min.js')}}"></script>

<!-- Tippy JS -->
<script src="{{URL::asset('plugins/tippy/popper.min.js')}}"></script>
<script src="{{URL::asset('plugins/tippy/tippy-bundle.umd.min.js')}}"></script>

<!-- Toastr JS -->
<script src="{{URL::asset('plugins/toastr/toastr.min.js')}}"></script>

<!-- Awselect JS -->
<script src="{{URL::asset('plugins/awselect/awselect-custom.js')}}"></script>
<script src="{{URL::asset('js/awselect.js')}}"></script>

<!-- Custom js-->
<script src="{{URL::asset('js/custom.js')}}"></script>

<!-- Google Analytics -->
@if (config('services.google.analytics.enable') == 'on')
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google.analytics.id') }}"></script>
    <script type="text/javascript">
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ config('services.google.analytics.id') }}');
    </script>
@endif

<!-- Mark as Read JS-->
<script type="text/javascript">

    function sendMarkRequest(id = null) {
        return $.ajax("{{ route('user.notifications.mark') }}", {
            method: 'POST',
            data: {"_token": "{{ csrf_token() }}", id}
        });
    }
	
	function changeTemplate(value) {
		let url = '{{ url('user/templates') }}/' + value;
		window.location.href=url;
	}

    var totalNotifications;
    var totalNotifications_a;
    var totalNotifications_b;

    $(function() {     

        $('.mark-as-read').on('click', function() {
            let request = sendMarkRequest($(this).data('id'));
            request.done(() => {
                $(this).parents('div.dropdown-item').remove();
            });

            document.getElementById("total-notifications").innerHTML = --totalNotifications;
            document.getElementById("total-notifications-a").innerHTML = --totalNotifications_a;
            document.getElementById("total-notifications-b").innerHTML = --totalNotifications_b;
        });

        $('#mark-all').on('click', function() {
            let request = sendMarkRequest();
            request.done(() => {
                $('div.notify-menu').remove();
            })

            document.getElementById("total-notifications").innerHTML = 0;
        });
    });        

    $(document).ready(function(){
       
        if (document.getElementById("total-notifications")) {
            totalNotifications = "{{ auth()->user()->unreadNotifications->where('type', '<>', 'App\Notifications\GeneralNotification')->count() }}";
            document.getElementById("total-notifications").innerHTML = totalNotifications;
        }  
        if (document.getElementById("total-notifications-a")) {
            totalNotifications_a = "{{ auth()->user()->unreadNotifications->where('type', '<>', 'App\Notifications\GeneralNotification')->count() }}";
            document.getElementById("total-notifications-a").innerHTML = totalNotifications_a;
        }
        if (document.getElementById("total-notifications-b")) {
            totalNotifications_b = "{{ auth()->user()->unreadNotifications->where('type', '<>', 'App\Notifications\GeneralNotification')->count() }}";
            document.getElementById("total-notifications-b").innerHTML = totalNotifications_b;
        }                  
        
    });

    tippy('[data-tippy-content]', {
        animation: 'scale-extreme',
        theme: 'material',
    });

    toastr.options.showMethod = 'slideDown';
    toastr.options.hideMethod = 'slideUp';
    toastr.options.progressBar = true;

</script>