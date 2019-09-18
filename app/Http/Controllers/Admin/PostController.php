<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('index');
        $posts = Post::all();
        //dd($posts);
        return view('admin.posts.index', ['viewPosts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::pluck('title', 'id')->all();
        $categories = Category::pluck('title', 'id')->all();
        //dd($tags);
        return view('admin.posts.create ', compact('categories', 'tags') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
             'date' =>'required',
            'image' => 'nullable|image'
        ]);

        //dd($request->all());
        $post = Post::add($request->all());
        $post->uploadImage($request->file('image'));
        $post->setCategory($request->get('category_ig'));
        $post->setTags($request->get('tags'));
        $post->toggleFeature($request->get('is_featured'));
        $post->toggleStatus($request->get('status'));
        //dd($post);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::find($id);

        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('admin.posts.edit ', compact('categories', 'tags', 'post') );







    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'date' =>'required',
            'image' => 'nullable|image'
            //'image' => 'nullable|image'
        ]);

        //dd($request->all());
        $post = Post::find($id);
        $post->edit($request->all());
        //dd($request->all(), $request->file('image'));
        $post->uploadImage($request->file('image'));
        $post->setCategory($request->get('category_ig'));
        $post->setTags($request->get('tags'));
        $post->toggleFeature($request->get('is_featured'));
        $post->toggleStatus($request->get('status'));
        //dd($post);
        //$user->uploadAvatar($request->file('avatar'));

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->remuv();
        return redirect()->route('posts.index');
    }
}
