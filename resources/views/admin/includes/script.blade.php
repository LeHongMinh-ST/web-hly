<!-- Core JS files -->
<script type="text/javascript" src="{{asset('assets/admin/js/plugins/loaders/pace.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/core/libraries/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/core/libraries/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/plugins/loaders/blockui.min.js')}}"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script type="text/javascript" src="{{asset('assets/admin/js/plugins/visualization/d3/d3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/plugins/forms/styling/switchery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/core/libraries/jquery_ui/datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/plugins/ui/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/plugins/pickers/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/plugins/pickers/date-vi.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/notifications/pnotify.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/notifications/sweet_alert.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/selects/select2.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('assets/admin/js/plugins/forms/selects/bootstrap_select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/styling/switch.min.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/core/app.js')}}"></script>
<!-- /theme JS files -->

@production
    @php
        $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
    @endphp
    <script type="module" src="/build/{{ $manifest['resources/css/app.css']['file'] }}"></script>
    <script type="module" src="/build/{{ $manifest['resources/js/init.js']['file'] }}"></script>
    @else
        @vite(['resources/js/init.js', 'resources/css/app.css'])
@endproduction
