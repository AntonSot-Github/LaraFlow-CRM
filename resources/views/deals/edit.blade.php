@extends('layouts.app')

@section('title', "Edit $client->name's $deal->title")


@section('content')

    <form action="{{ route('client.deals.update', [$client, $deal]) }}" method="POST" class="d-flex flex-column justify-center align-items-center">
        @csrf
        @method('PUT')

        <div>
            <label>Title</label><br>
            <input type="text" name="title" value="{{ old('title', $deal->title) }}">
        </div>

        <div>
            <label>Amount</label><br>
            <input type="number" step="0.01" name="amount" value="{{ old('amount', $deal->amount) }}">
        </div>

        <div class="mb-3">
            <label>Status</label><br>
            <select name="status">
                @foreach (['new', 'in_progress', 'won', 'lost'] as $status)
                    <option value="{{ $status }}" @selected(old('status', $deal->status) === $status)>
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

        <button class="btn btn-primary" type="submit">Update deal</button>


    </form>
    <div class="w-100 d-flex flex-row justify-content-end">
        <a href="{{ route('clients.deals.index', $client) }}">← Back to deals</a>
    </div>
    


@endsection
