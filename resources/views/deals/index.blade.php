@extends('layouts.app')

@section('title', "Deals for client: $client->name")

@section('content')
    @if ($deals->isEmpty())
        <p>No deals yet.</p>
    @else
        <table border="1" cellpadding="5">
            <tr>
                <th>Title</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Edition</th>
                <th>Delete</th>
            </tr>

            @foreach ($deals as $deal)
                <tr>
                    <td>{{ $deal->title }}</td>
                    <td>{{ $deal->amount ?? '—' }}</td>
                    <td>{{ $deal->status }}</td>
                    <td><a href="{{ route('client.deals.edit', [$client, $deal]) }}">Edit</a></td>
                    <td>
                        <form method="POST" action="{{ route('clients.deals.destroy', [$client, $deal]) }}"
                            style="display:inline" onsubmit="return confirm('Delete this deal?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif

    <a href="{{ route('clients.deals.create', $client) }}"> + Add deal </a>
    <br>
    <a href="{{ route('clients.index') }}">← Back to clients</a>

@endsection
