<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        //dd(123);
    	$posts = Post::paginate(2);
    	$popularPosts = Post::orderBy('wiev', 'desc')->take(4)->get();
        $featuredPosts = Post::where('is_featured', '1')->take(3)->get();
        //$recentPosts = Post::orderBy('date', 'desc')->take(2)->pluck('id')->all();
        $recentPosts = Post::orderBy('date', 'desc')->take(2)->get();
        $categories = Category::all();
        //$users = User::all();
        //dd($user);



    	//return view('pages.index')->with('posts', $posts);
        return view('pages.index', [
            'posts'         => $posts,
            'popularPosts'  => $popularPosts,
            'featuredPosts' => $featuredPosts,
            'recentPosts'   => $recentPosts,
            'categories'      => $categories,
            //'users'      =>  $users
        ]);
    }

    public function show($slug)
    {
    	//dd($slug);
        $post = Post::where('slug', $slug)->firstOrFail();

    	//dd($post->id);
        //$post = Post::where('slug', $slug)->firstOrFail();

    	return view('pages.show', ['post' => $post]);
    }

    public function tag($slug)

    {

        //dd($slug);
        $tag = Tag::where('slug', $slug)->firstOrFail();
        //dd($tag);
        $posts = $tag->posts()->paginate(2);
        //dd($posts);
        return view('pages.list',['posts'  =>  $posts]);
    }


    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        //dd($category);
        $posts = $category->posts()->paginate(2);
        //dd($posts);
        return view('pages.list',['posts'  =>  $posts]);
    }
}
