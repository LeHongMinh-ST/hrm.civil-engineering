{{--<!-- Core JS files -->--}}
<script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
{{--<!-- /core JS files -->--}}

{{--<!-- Theme JS files -->--}}
<script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/noty/noty.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/init.js') }}"></script>
{{--<!-- /theme JS files -->--}}

{{--<!-- JS custom -->--}}
<script>
    $(document).ready(() => {
        @if(\session()->has('success'))
        init.showNotySuccess('{{ \session()->pull('success') }}')
        @endif

        @if(\session()->has('error'))
        init.showNotySuccess('{{ \session()->pull('error') }}')
        @endif

        @error('error')
        init.showNotySuccess('{{ $message }}')
        @enderror
    })
</script>

@yield('script_custom')
{{--<!-- /JS custom  -->--}}
