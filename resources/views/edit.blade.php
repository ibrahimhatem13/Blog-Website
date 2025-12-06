@extends('layouts.app')
 
@section('title') Update Post @endsection
 
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="container w-75" action="{{route('posts.update', $post->id)}}" method="POST">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input name="title" value="{{$post->title}}" class="form-control"  placeholder="title">
      </div>
      <div class="mb-3">
        <label class="form-label">Example textarea</label>
        <textarea name="description" class="form-control"  rows="3">{{$post->description}}</textarea>
      </div>

    <div class="col-md-4 mb-3">
        <label  class="form-label">Post Creator</label>
        <select name="posted_by" class="form-select">
          @foreach ($user as $user)
          <option @if ($user->id == $user->id) selected @endif value='{{$user->id}}'>{{$user->name}} </option>
          @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <button class="btn btn-primary">Update</button>
    </div>
</form>

@endsection