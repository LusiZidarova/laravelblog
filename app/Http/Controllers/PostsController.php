<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Validator;

class PostsController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the 
     * 
     * resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category_id = null)
    {
        $posts =  Post::with('category')->with('user')->orderBy('updated_at', 'DESC')->get();
        $categories = Category::all();
        if ($category_id == null) {

            return view('blog/index', [
                'posts' => $posts,
                'categories' => $categories,
            ]);
        } else {
            $posts =  Post::where('category_id', $category_id)->with('category')->with('user')->orderBy('updated_at', 'DESC')->get();

            return view('blog/index', [
                'posts' => $posts,
                'categories' => $categories,
            ]);
        }
    }

    public function showPostCat($category_id)
    {
        $categories = Category::all();
        $posts =  Post::where('category_id', $category_id)->with('category')->with('user')->orderBy('updated_at', 'DESC')->get();

        return redirect()->route('blog.index', [
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('blog.create', [
            'categories' => $categories,
        ]);
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
        ]);

        $user_id = auth()->user()->id;

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image_path' => 'images/' . $newImageName,
            'user_id' => $user_id,
            'category_id' => $request->input('category'),
        ]);

        return redirect('/blog')->with('message', 'Your post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post =  Post::where('id', $id)->with('category')->with('user')->get();

        return view('blog.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post =  Post::where('id', $id)->with('category')->with('user')->get();
        $categories = Category::all();

        return view('blog.edit', [
            'post' => $post,
            'categories' => $categories,
        ]);
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
        $user_id = auth()->user()->id;

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|nimes:jpg,png,jpeg|max:5048',
            'category' => 'required'
        ]);
        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        Post::where('id', $id)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'image_path' => 'images/' . $newImageName,
                'user_id' => $user_id,
                'category_id' => $request->input('category'),
            ]);

        return redirect('/blog')->with('message', 'Your post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('id', $id);
        $post->delete();
        return redirect('/blog')->with('message', 'Your post has been deleted!');
    }
}
