@extends('layout.app')
@section('title','index')
@section('hello')
      {{-- add button --}}
      <div class="container mt-5 mb-5">
          <div class="text-center">
              <a href="{{route('postes.create')}}" type="button" class="btn btn-success">Add New Post</a>
          </div>
      </div>
      {{-- table --}}
      <div class="container ">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">posted by</th>
            <th scope="col">creat at</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>
@foreach ($postes as $post)
<tr>
  <th scope="row">{{$post->id}}</th>
  <td>{{$post->title}}</td>
  <td>{{$post->user ? $post->user->name : "not found "}}</td>
  <td>{{$post->created_at->format('Y-M-D')}}</td> {{--object --}}
  <td>
      <a href="{{route('postes.show',$post['id'])}}" type="button" class="btn btn-info">view</a>
      <a href="{{route('postes.edite',$post['id'])}}" type="button" class="btn btn-primary">Edit</a>
      <form action="{{route('postes.destroy',$post['id'])}}" method="post" style="display: inline">
        @csrf
        @method('delete')
        <button  type="submit" class="btn btn-danger">Delte</button>
      </form>
  </td>
</tr>
@endforeach
        </tbody>
      </table>
      </div>
      @endsection