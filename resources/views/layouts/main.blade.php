<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>
    @stack('styles')
</head>


<body class="d-flex flex-column h-100">
    <div class="flex-shrink-o mb-3">
        @include('partials.nav')
        <section class="p-4">
            <a class="btn my-3 ms-3 fs-5 btn-outline-danger" data-bs-toggle="offcanvas" href="#offcanvasExample"
                role="button" aria-controls="offcanvasExample"><i class="fas fa-bars"></i></a>
            <div class="container">
                @yield('container')
            </div>
        </section>
    </div>
    @include('partials.footer')
    <script src="/js/bootstrap.bundle.min.js"></script>
    @stack('script')

</body>

</html>
