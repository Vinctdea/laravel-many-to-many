<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css'
        integrity='sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=='
        crossorigin='anonymous' />
    <title>BoolFolio | Admin</title>

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    @include('admin.partials.header')

    <div class="d-flex wrapper">

        <div>
            @auth
                @include('admin.partials.aside')
            @endauth
        </div>
        <div class="p-3 ms_content">
            @yield('content')
        </div>
    </div>
</body>

</html>
