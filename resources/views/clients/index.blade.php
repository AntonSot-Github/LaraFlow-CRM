@extends('layouts.app')

@section('title', 'Clients list')

@section('content')

    <div class="container my-auto">
        @if ($clients->isEmpty())
            <p>No clients yet</p>
        @else
            <table class="table">
                <tbody>
                    @foreach ($clients as $client)
                        <tr>


                            <th scope="col">
                                <div>
                                    <a href="{{ route('client.show', $client) }}">{{ $client->name }}</a>
                                    @if ($client->email)
                                        — {{ $client->email }}
                                    @endif
                                </div>
                            </th>
                            <td scope="col">
                                <a href="{{ route('clients.edit', $client) }}">Edit</a>
                            </td>
                            <td scope="col">
                                <form method="POST" action="{{ route('clients.destroy', $client) }}"
                                    onsubmit="return confirm('Delete this client?')" style="display:inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                            <td scope="col">
                                <a href="{{ route('clients.deals.index', $client) }}">
                                    Deals
                                </a>
                            </td>
                    @endforeach
                    </tr>
                </tbody>


            </table>
        @endif
        <div class="d-flex flex-row justify-content-between">
            <a href="{{ route('clients.create') }}">+Add new client</a><br>
            <a href="{{ route('start') }}">← Back to the start page</a>
        </div>

    </div>

@endsection
