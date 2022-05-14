
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- CSS only -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />

        <title>Admin Panel - @yield('title')</title>
    </head>
    <body>
        @include('inc.admin-nav') @if(session()->has('success'))

        <div class="container">
            <x-alert
                class="alert-success"
                >{{ session()->get('success') }}</x-alert
            >
            @endif
        </div>

        <div class="container">@yield("content")</div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"
        ></script>
        <script src="{{ asset('js/admin.js') }}"></script>
    </body>
</html>
