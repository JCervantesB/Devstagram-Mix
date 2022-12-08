<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        // // Obtener a quienes seguimos
        $ids = auth()->user()->followings->pluck('id')->toArray();
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);

        // Obtener todos los post de usuarios que no seguimos (random) y que no sean mios
        $postRandoms = Post::inRandomOrder()->whereNotIn('user_id', $ids)->where('user_id', '!=', auth()->user()->id)->paginate(10);

        //Obtener los post que no son mios
        // $postRandoms = Post::inRandomOrder()->where('user_id', '!=', auth()->user()->id)->paginate(20);

        
        return view('home', [
            'posts' => $posts,
            'postRandoms' => $postRandoms
        ] );
    }
}
