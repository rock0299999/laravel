<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class PostsController extends Controller
{
    //
    
	public function index(){
		//$posts = \App\Post::all();
		//$data = 'hahaha';//compact('posts');
		return view('posts.index');
	}
	
	public function show($id){
		$posts = \App\Post::find($id);
		$data = compact('post');
		return view('posts.show', $data);		
	}
}
