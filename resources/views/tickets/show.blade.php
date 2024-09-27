@extends('layouts.app')

@section('content')
<div class="container">
    <p>Ticket Raised By: {{ $ticket->user->name }}</p>
    <h2>{{ $ticket->subject }}</h2>
    <p>{{ $ticket->message }}</p>

    <h4>Responses</h4>
    <ul class="list-group">
        @foreach($ticket->responses as $response)
            <li class="list-group-item">
                {{ $response->message }} - {{ $response->user->name }}
            </li>
        @endforeach
    </ul>

    @if($ticket->status == 'open' && auth()->user()->can('respond_ticket'))
        <form action="{{ route('responses.store', $ticket->id) }}" method="POST" class="mt-2">
            @csrf
            <div class="mb-3">
                <label for="message" class="form-label">Reply</label>
                <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Response</button>
        </form>
        <form action="{{ route('tickets.close', $ticket->id) }}" method="POST" class="mt-2">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-danger">Close Ticket</button>
        </form>
    @endif
    <a href="{{ url('/home') }}" class="btn btn-success mt-2">Go Back</a>
</div>
@endsection
