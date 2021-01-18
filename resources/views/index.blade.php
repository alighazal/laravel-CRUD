@extends('layouts.app')

@section('title')
    <title>Your Tickets</title>
@endsection


@section('content')

    <h1>Here are Your Tickets</h1>

    @foreach ($tickets as $ticket)


    <tr>
        <td>{{$ticket->id}}</td>
        <td>{{$ticket->title}}</td>
        <td>{{$ticket->description}}</td>
        <a href="{{route('edit', $ticket->id)}}"> edit </a>

        <form action="{{route('destroy', $ticket->id)}}" method="post"  >
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>

    </tr>



    @endforeach

@endsection