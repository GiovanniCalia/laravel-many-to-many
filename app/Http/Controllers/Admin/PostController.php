<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    protected $validators = [
        'title'          => 'required|max:255',
        'creator'        => 'required|max:50',
        'description'    => 'required',
        'image'          => 'nullable|url|max:255',
        'date_creation'  => 'required|max:20',
    ];

     private function getValidators($model) {
        return [
            'title'          => 'required|max:255',
            'slug' => [
                'required',
                Rule::unique('posts')->ignore($model), // 'required|unique:posts|max:255',
                'max:255'
            ],
            'category_id'  => 'required|exists:App\Category,id',
            'creator'        => 'required|max:50',
            'description'    => 'required',
            'image'          => 'nullable|url|max:255',
            'date_creation'  => 'required|max:20',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(30);

        return view('admin.posts.index', compact('posts'));
    }

    public function indexUser()
    {
        $posts = Post::where('user_id', Auth::user()->id)->paginate(30);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getValidators(null));
        $saveData = $request->all() + ['user_id' => Auth::user()->id];

        $save = Post::create($saveData);
        return redirect()->route('admin.posts.show', $save->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.show', [
            'post'       => $post,
            'categories' => $categories

        ]);//compact('post')
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (Auth::user()->id !== $post->user_id) abort(403);

        $categories = Category::all();

        return view('admin.posts.edit', [
            'post'       => $post,
            'categories' => $categories

        ]); //compact('post')
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if (Auth::user()->id !== $post->user_id) abort(403);

        $request->validate($this->getValidators($post));

        $post->update($request->all());

        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (Auth::user()->id !== $post->user_id) abort(403);

        $post->delete();

        return redirect()->back();
    }
}
