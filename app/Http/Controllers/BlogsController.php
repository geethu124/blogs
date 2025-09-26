<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{
    // Show the form to create a new blog
    public function create()
    {
        return view('User.blogs.create');
    }
    public function list() {
    $blogs = Blogs::where('user_id', Auth::id())->get();
    return view('User.blogs.list', compact('blogs'));
}

    // Store new blog in DB
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image',
        ]);

        $blog = new Blogs();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->user_id = Auth::user()->id;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('blogs', 'public');
            $blog->image = $path;
        }

        $blog->save();

        return redirect()->route('user.dashboard')->with('success', 'Blog added successfully!');
    }

    // Show the form to edit an existing blog
    public function edit(Blogs $blog)
    {
        // dd($blog);
        return view('User.blogs.edit', compact('blog'));
    }

    // Update the blog in DB
    public function update(Request $request, Blogs $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image',
        ]);

        $blog->title = $request->title;
        $blog->content = $request->content;

        if ($request->hasFile('image')) {
            // dd('test');
            // if ($blog->image) {
            //     Storage::disk('public')->delete($blog->image);
            // }

            $path = $request->file('image')->store('blogs', 'public');
            $blog->image = $path;
        }

        $blog->save();

        return redirect()->route('blogs.edit', $blog->id)->with('success', 'Blog updated successfully!');
    }

    // Optional: Delete blog
    public function destroy(Blogs $blog)
    {
        // if ($blog->image) {
        //     Storage::disk('public')->delete($blog->image);
        // }

        $blog->delete();

        return redirect()->route('blogs.list')->with('success', 'Blog deleted successfully!');
    }

    // Optional: List all blogs
    public function adminlist()
    {
        $blogs = Blogs::latest()->paginate(10);
        return view('Admin.blogs.list', compact('blogs'));
    }

    public function approve(Blogs $blog)
    {
        $blog->status = 1;
        $blog->save();

        return redirect()->back()->with('success', 'Blog approved successfully!');
    }

    public function reject(Blogs $blog)
    {
        $blog->status = 2;
        $blog->save();

        return redirect()->back()->with('success', 'Blog rejected successfully!');
    }
    public function view(Blogs $blog)
    {
        return view('Admin.blogs.view', compact('blog'));
    }

}
