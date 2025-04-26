<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    //
    public function index(){
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }
    //to create a new blog
    public function create(){
        return view('blogs.create');
    }
    //to store
    public function store(Request $request){
        $validated = $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string',
        ]);

        Blog::create($request->all());
        return redirect()->route('blogs.index')->with('success','Blog created successfully');
    }
}