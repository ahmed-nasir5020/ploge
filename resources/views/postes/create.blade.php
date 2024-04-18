@extends('layout.app')
@section('title','create')
@section('hello')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{route('postes.store')}}">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">title</label>
        <input name="title" type="text" class="form-control" id="exampleFormControlInput1" value="{{old('title')}}" >
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">description</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{old('description')}}" ></textarea>
      </div>
      <select name="posted_creator" class="form-select" aria-label="Default select example">
        <option >posted creator</option>
        @foreach ($users as $user)
        <option value="{{$user->id}}" >{{$user->name}}</option>
        @endforeach
      
        
      </select>
    <button type="submit" class="btn btn-success mt-3">Submit</button>
  </form>
@endsection