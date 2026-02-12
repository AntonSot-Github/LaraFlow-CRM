@extends('layouts.app')

@section('title', "Add deal for: $client->name")

@section('content')

    <form action="{{ route('clients.deals.store', $client) }}" method="POST" class="d-flex flex-column justify-center align-items-center">
        @csrf

        <div>
            <label>Title</label><br>
            <input type="text" name="title" value="{{ old('title') }}">
        </div>

        <div>
            <label>Amount</label><br>
            <input type="number" step="0.01" name="amount" value="{{ old('amount') }}">
        </div>

        <div class="mb-3">
            <label>Status</label><br>
            <select name="status">
                @foreach (['new', 'in_progress', 'won', 'lost'] as $status)
                    <option value="{{ $status }}" @selected(old('status', 'new') === $status)>
                        {{ ucfirst(str_replace('_', ' ', $status)) }}
                    </option>
                @endforeach
            </select>
        </div>

        @if ($errors->any())
            <div style="color:red">
                {{ $errors->first() }}
            </div>
        @endif

        <button class="btn btn-primary" type="submit">Save deal</button>



    </form>


    <a class="text-end" href="{{ route('clients.deals.index', $client) }}">← Back to deals</a>


@endsection
