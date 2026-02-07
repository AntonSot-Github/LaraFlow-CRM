@extends('layouts.app')

@section('title', "Add deal for: $client->name")

@section('content')

    <form action="{{ route('clients.deals.store', $client) }}" method="POST">
        @csrf

        <div>
            <label>Title</label><br>
            <input type="text" name="title" value="{{ old('title') }}">
        </div>

        <div>
            <label>Amount</label><br>
            <input type="number" step="0.01" name="amount" value="{{ old('amount') }}">
        </div>

        <div>
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

        <button type="submit">Save deal</button>



    </form>


    <a href="{{ route('clients.deals.index', $client) }}">← Back to deals</a>


@endsection
