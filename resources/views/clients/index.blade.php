<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Clients</title>

</head>

<body>
    <header class="w-100 mb-5 py-4"><h1 class="text-center">Clients</h1></header>
    <main class="d-flex flex-column">
        <div class="container my-auto">
            @if ($clients->isEmpty())
                <p>No clients yet</p>
            @else
                <ul>
                    @foreach ($clients as $client)
                        {{ $client->name }}
                        @if ($client->email)
                            — {{ $client->email }}
                        @endif
                    @endforeach
                </ul>
            @endif
        </div>
    </main>
</body>

</html>
