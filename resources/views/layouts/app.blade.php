<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta
            name="author"
            content="Firmbee.com - Free Project Management Platform for remote teams"
        />
        <title>Clear blog - @yield("title")</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
            crossorigin="anonymous"
        />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        -->
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
        <script
            src="https://kit.fontawesome.com/0e035b9984.js"
            crossorigin="anonymous"
        ></script>
    </head>
    <body
        data-bs-spy="scroll"
        data-bs-target="#navbar-example"
        data-bs-offset="82"
    >
        @include('inc.navbar')
        <main>@yield('content')</main>
        @include('inc.footer')

        <div class="fb2022-copy">Fbee 2022 copyright</div>
        <!-- <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
            crossorigin="anonymous"
        ></script> -->
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>
