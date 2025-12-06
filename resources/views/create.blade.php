@extends('layouts.app')
 
@section('title') Create Post @endsection
 
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


<form class="container w-75" action="{{route('posts.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input name="title" class="form-control" value="{{old('title')}}"  placeholder="title">
      </div>
      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" value="{{old('description')}}" rows="3"></textarea>
      </div>

    <div class="col-md-4 mb-3">
        <label  class="form-label">Post Creator</label>
        <select name="posted_by" class="form-select">
          @foreach ($user as $user)
            <option value='{{$user->id}}'>{{$user->name}} </option>
          @endforeach
          
        </select>
    </div>
    <div class="col-md-4">
        <button class="btn btn-primary">Confirm</button>
    </div>
</form>

@endsection