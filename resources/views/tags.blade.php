@extends('layouts.main')

@section('content')

<div class='p-5'>
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
          </tr>
        </thead>
        <tbody>
            @foreach( $tags as $tag )
          <tr>
            <td>{{$tag->id}}</td>
            <td>{{$tag->name}}</td>
{{-- 
            {{dd($tag->id)}} --}}
          </tr>
          @endforeach
        </tbody>
      </table>
 </div>