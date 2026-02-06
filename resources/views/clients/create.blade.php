<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Add Client</title>

</head>

<body>
    <header class="w-100 mb-5 py-4">
        <h1 class="text-center">New Client</h1>
    </header>
    <main class="d-flex flex-column container w-50">
        <form action="{{ route('clients.store') }}" method="POST" class="d-flex flex-column justify-center align-items-center">
            @csrf
            <div >
                <label>Name</label><br>
                <input type="text" name="name" value="{{ old('name') }}">
            </div>

            <div>
                <label>Email</label><br>
                <input type="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="mb-2">
                <label>Phone</label><br>
                <input type="text" name="phone" value="{{ old('phone') }}">
            </div>

            @if ($errors->any())
                <div class=" text-danger mb-2">
                    {{ $errors->first() }}
                </div>
            @endif

            <button class="btn btn-primary mb-2" type="submit">Save</button>
        </form>

        <a class="btn btn-primary mx-auto" href="{{ route('clients.index') }}">Back to list</a>
    </main>
</body>

</html>
