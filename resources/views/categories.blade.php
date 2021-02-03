@extends('layouts.main')

@section('content')

<div class='p-5'>
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">ID
            </th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
          </tr>
        </thead>
        <tbody>
            @foreach( $categories as $category )
          <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td>{{$category->slug}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
 </div>