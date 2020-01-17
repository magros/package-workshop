@extends('workshop::layout')
@section('body')
    <table>
        <thead>
        <tr>
            <td>Id</td>
            <td>name</td>
            <td>body</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->name}}</td>
                <td>{{$post->body}}</td>
                <td>
                    <form method="DELETE" action="/package-workshop/posts/{{$post->id}}/delete">
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection