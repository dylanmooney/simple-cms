<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Traits\ImageUpload;
use Illuminate\Http\Response;

class PostController extends Controller
{

    use ImageUpload;

    private $validationRules = [
        'title' => ['required', 'string', 'unique:posts,title', 'max:255'],
        'body' => ['required', 'string'],
        'category' => ['required', 'exists:categories,id'],
        'image' => ['required', 'image', 'max:2000']
    ];

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::orderBy('name')->get()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->validationRules);

        $request->image = $this->uploadImage($request->user(), $request->file('image'));

        $post = $request->user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category,
            'visible' => $request->visible,
            'thumbnail_id' => $request?->image?->id,
            'published_at' => Carbon::now()
        ]);

        return redirect("admin/posts/$post->id/edit")->with('success', 'Post Published!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.detail', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::orderBy('name')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, array_merge(
            $this->validationRules,
            ['title' => "required|unique:posts,title,$post->id"],
            ['image' => 'nullable|sometimes|image', 'max:2000']
        ));

        if ($request->file('image')) {
            $image = $this->uploadImage($request->user(), $request->file('image'));
            $post->update(array_merge($request->all(), ['thumbnail_id' => $image?->id]));
        } else {
            $post->update($request->all());
        }

        return back()->with("success", "Post updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with("success", "Post deleted!");
    }
}
