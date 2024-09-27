@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ticket List</h2>
    @if(auth()->user()->can('create_ticket'))
        <a href="{{ route('tickets.create') }}" class="btn btn-primary my-2">New Ticket</a>
    @endif
    <ul class="list-group">
        @foreach($tickets as $ticket)
            <li class="list-group-item">
                <a href="{{ route('tickets.show', $ticket->id) }}">{{ $ticket->subject }}</a>
                <span class="badge bg-{{ $ticket->status == 'open' ? 'success' : 'secondary' }} mx-2">
                    {{ $ticket->status }}
                </span>
                <br/>
                <span class="badge bg-primary">{{ $ticket->user->name }}</span>
            </li>
        @endforeach
    </ul>
    <div class="pagination">
        {{ $tickets->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
@endsection
