<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>{{ __('Top News') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('frontend/assets/css/styles.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Header news -->
    @include('frontend.layouts.header')
    <!-- End Header news -->

    {{-- contents --}}
    @yield('content')
    {{-- End contents --}}

    {{-- footer --}}
    @include('frontend.layouts.footer')
    {{-- End footer --}}

    <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

    <script type="text/javascript" src="{{ asset('frontend/assets/js/index.bundle.js') }}"></script>
</body>

</html>
