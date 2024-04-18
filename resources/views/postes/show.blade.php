@extends('layout.app')
@section('title','show')
@section('hello')
          {{-- card1 --}}
          <div class="container mt-5 mb-5">
            <div class="text-center">
                <div class="card">
                    <div class="card-header">
                      <h1 >Post Info</h1>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">title : {{$post->title}}</h5>
                      <p class="card-text">description : {{$post->description}}</p>
                    </div>
                  </div>
                  <div class="card">
            </div>
          </div>
            {{-- card2 --}}
            <div class="container mt-5 ">
                <div class="text-center">
                    <div class="card">
                        <div class="card-header">
                          <h1>Post Creator Info</h1>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">name : {{$post->user ? $post->user->name : "not found "}}</h5>
                          <p class="card-text">email : {{$post->user ? $post->user->email: "not found "}}</p>
                          <p class="card-text">creat_at : {{$post->user ? $post->created_at->format('y-a'): "not found "}}</p>
                        </div>
                      </div>
                      <div class="card">
                </div>
              </div>
              @endsection
       

           
     


    
    