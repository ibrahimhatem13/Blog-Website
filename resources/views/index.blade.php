@extends('layouts.app')
 
@section('title') Codezilla Blog @endsection
 
@section('content')


    <div action="" method="POST">
        <div class="text-center mt-5">
            <a href="{{route('posts.create')}}" type="button" class="btn btn-success">Create Post</a>
        </div>
        
        <table class="table mt-5 w-75 mx-auto">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Ttle</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created at</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($post as $post)
                    
                <tr>
                    <th scope="row">{{$post['id']}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user? $post->user->name : 'No User'}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>
                        <a href="{{route('posts.show',$post['id'])}}" class="btn btn-info">View</a>
                        <a href="{{route('posts.edit',$post['id'])}}" class="btn btn-primary">Edit</a>
                        <form class="d-inline" method="POST" action="{{route('posts.destroy',$post['id'])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
             
            </tbody>
          </table>
          
    </div>



    @endsection
     
    
    