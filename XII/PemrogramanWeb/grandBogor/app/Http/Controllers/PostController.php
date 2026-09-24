<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('category')->latest();

        if ($request->filled('category')) {
            $query->where('category_id', $request->input('category'));
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->input('search') . '%');
        }

        $posts = $query->paginate(9)->withQueryString();
        $categories = Category::withCount('posts')->get();

        return view('posts', compact('posts', 'categories'));
    }

    public function show(Post $post)
    {
        $post->load('category');
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        return view('detail', compact('post', 'relatedPosts'));
    }
}
