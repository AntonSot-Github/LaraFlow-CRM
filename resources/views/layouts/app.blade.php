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
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom bg-primary-subtle">
        <div class="d-flex flex-row justify-content-center mb-3 mb-md-0 me-md-auto w-100">
            <h1 >@yield('title', 'Title')</h1>
        </div>        
    </header>
    <main class="d-flex flex-column container w-50">
        @include('components.alert')
        @yield('content')
    </main>
</body>

</html>
