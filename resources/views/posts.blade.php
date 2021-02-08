@extends('layouts.main')

@section('content')

<div class='p-5'>
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">ID
            </th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
            <th scope="col">Description</th>
            <th scope="col">Details</th>
          </tr>
        </thead>
        <tbody>
            @foreach( $posts as $post )
          <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->author}}</td>
            <td>{{$post->post->title}}</td>
            
            
            @if ($post->postInformation == null)
            <td>No Data</td>
            @else
            <td>{{$post->postInformation->description}}</td>
            @endif

            <td>
              <a href="{{route('post.show', $post->id)}}">Dettagli</a>
            </td>

            <td>
              <a href="{{route('post.show', $post->id)}}">Aggiorna</a>
            </td>

            <td>
              <a href="{{route('post.show', $post->id)}}">Elimina</a>
            </td>
            
        </tr>
          @endforeach
        </tbody>
      </table>
 </div>