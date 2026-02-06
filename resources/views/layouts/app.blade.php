<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>@yield('title', 'Title')</title>

</head>

<body>
    <header class="w-100 mb-5 py-4">
        <h1 class="text-center">@yield('title', 'Title')</h1>
    </header>
    <main class="d-flex flex-column container w-50">
        @include('components.alert')
        @yield('content')
    </main>
</body>

</html>
