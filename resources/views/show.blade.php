@extends('layouts.app')
 
@section('title') Show Post @endsection
 
@section('content')


    <div>
        <div class="text-center mt-5">
            <a href="{{route('posts.create')}}" type="button" class="btn btn-success">Create Post</a>
        </div>

        <div class="card w-75 mt-5 mx-auto">
            <div class="card-header">
              Post Info 
            </div>
            <div class="card-body">
              <h5 class="card-title">Title :{{$post->title}}</h5>
              <p class="card-text">Desreption : {{$post->description}}</p>
              <p class="card-text">Created At : {{$post->created_at}}</p>

            </div>
        </div>

        <div class="card w-75 mt-5 mx-auto">
            <div class="card-header">
              Post Creator Info 
            </div>
            <div class="card-body">
              <h5 class="card-title">Name : {{$post->user? $post->user->name : 'No User'}}</h5>
              <p class="card-text">Email : {{$post->user? $post->user->email : 'No email'}}</p>
            </div>
        </div>

         

        </div>


        @endsection