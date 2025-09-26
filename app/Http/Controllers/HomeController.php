<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function home() {
        $blogs = Blogs::with('user')->where('status', 1)->latest()->get();
        return view('home', compact('blogs'));
    }


    public function single(Blogs $blog) {
        if($blog->status != 1) {
            abort(404);
        }
        return view('single_blog', compact('blog'));
    }

}
