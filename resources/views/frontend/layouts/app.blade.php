<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('frontend/app.css') }}">
</head>

<body>

    @include('frontend.components.navbar')

    <main class="py-5">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    {{-- Noty CSS & JS CDN --}}
    <link rel="stylesheet" href="{{ url('noty/noty.min.css') }}">
    <script src="{{ url('noty/noty.js') }}"></script>

    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/b94fe213bc.js" crossorigin="anonymous"></script>

    @if (Session::has('success'))
        <script>
            new Noty({
                theme: 'sunset',
                type: 'success',
                layout: 'topRight',
                text: "{{ session::get('success') }}",
                timeout: 3000,
                closeWith: ['click', 'button']
            }).show();
        </script>
    @endif
</body>

</html>
