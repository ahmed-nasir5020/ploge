@extends('layout.app')
@section('title','edite')
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
<form method="post" action="{{route('postes.update',$poste->id)}}">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">title</label>
        <input name="title" type="text" value="{{$poste->title}}" class="form-control" id="exampleFormControlInput1" >
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">description</label>
        <textarea name="description"  class="form-control" id="exampleFormControlTextarea1" rows="3">{{$poste->description}}</textarea>
      </div>
      <select name="posted_creator" class="form-select" aria-label="Default select example">
        <option >posted creator</option>
        @foreach ($users as $user)
        <option @if($user->id == $poste->user_id) selected @endif value="{{$user->id}}">{{  $user->name }}</option>
        @endforeach
        
      </select>
    <button type="submit" class="btn btn-primary mt-3">update</button>
  </form>
@endsection
