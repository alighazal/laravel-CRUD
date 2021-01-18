@extends('layouts.app')

@section('title')
    <title>Create Ticket</title>
@endsection

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
    <div class="row">
        <form action=" {{ route('create') }}"  method="post"  >
            @csrf
            <div>
                <label for="title">Ticket Title:</label>
                <input type="text"  name="title"/>
            </div>
            <div class="form-group">
                <label for="description">Ticket Description:</label>
                <textarea  name="description"></textarea>
            </div>
            <button type="submit" >Create</button>
        </form>
    </div>
</div>
@endsection