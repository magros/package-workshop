@extends('workshop::layout')
@section('body')
    <form method="POST">
        <label for="name">Title</label>
        <input type="text" name="name" id="name" value="{{$post->name}}">

        <label for="body">Body</label>
        <textarea name="body" id="body" cols="30" rows="10">{{$post->body}}</textarea>

        <button type="submit">Guardar</button>
    </form>
@endsection