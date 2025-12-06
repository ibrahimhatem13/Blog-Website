<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class IndexController extends Controller
{
    public function index(){

        $allPosts=Post::all();
        // dd($allPosts);
       
        return view('index',['post'=>$allPosts]);
    }

    public function show($id){
        $singlePostFromDB=Post::findOrFail($id);
       
        return view('show',[
            'post'=>$singlePostFromDB,
        ]);
    }

    public function create(){
        $user=User::all();
        return view('create',['user'=>$user]);
    }

    public function store(){

        request()->validate([
            'title'=>['required','min:3'],
            'description'=>['required','min:5'],
            'posted_by'=>['required',' exists:users,id'],
        ]);

        // $data=request()->all();
        // dd($data);
        
        //or

        $title=request()->title;
        $description=request()->description;
        $posted_by=request()->posted_by;
        // dd($title,$description,$posted_by);

        // $post= new Post;
        // $post->title=$title;
        // $post->description=$description;
        // $post->save();
        // or
        Post::create([
            'title'=>$title,
            'description'=>$description,
            'user_id'=>$posted_by,
        ]);
        
        return to_route('posts.index');
    }
    public function edit(Post $post){
        $user=User::all();
        return view('edit',[
            'post'=>$post,
            'user'=>$user
        ]);
        return to_route('posts.index');
    }
    public function update($postId){

        request()->validate([
            'title'=>['required','min:3'],
            'description'=>['required','min:5'],
            'posted_by'=>['required',' exists:users,id'],
        ]);

        $title=request()->title;
        $description=request()->description;
        $posted_by=request()->posted_by;

        $singlePostFromDB=Post::findOrFail($postId);
        $singlePostFromDB->update([
            'title'=>$title,
            'description'=>$description,
            'user_id'=>$posted_by,
        ]);
        // dd($title,$description,$posted_by); 

        return to_route('posts.show',$postId);
    }
    public function destroy($postId){

        $singlePostFromDB=Post::find($postId);
        // dd($singlePostFromDB);
        $singlePostFromDB->delete();

        // or 

        // Post::where('id',$postId)->delete(); 

        return to_route('posts.index');
    }

}

    
