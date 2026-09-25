<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HotelController extends Controller
{
    public function index(Request $request): View
    {
        $categories = Category::all();
        $query = Post::with('category')->latest();

        if ($request->filled('category')) {
            $query->where('category_id', $request->query('category'));
        }

        $posts = $query->get();
        $services = Service::all();
        return view('welcome', compact('categories', 'posts', 'services'));
    }

    /**
     * Detail View
     */
    public function show(Post $post): View
    {
        $post->load('category');
        return view('detail', compact('post'));
    }
}
