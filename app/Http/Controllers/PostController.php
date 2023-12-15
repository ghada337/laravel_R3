<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    private $columns =
    [
        'title', 'description', 'author', 'published'
    ];
    public function index()


    {
        $posts = Post::get();
        return view('posts', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createPost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $post = new Post();
        // $post->title = $request->title;
        // $post->author = $request->author;
        // $post->description = $request->description;
        // if(isset($request->published)){
        //     $post->published = 1;
        // }else{
        // $post->published= 0;
        // }

        // $post->save();
        // return 'Post created successfully!';

        $here = $request->only($this->columns);
        $here['published'] = isset($request->published);
        Post::create($here);
        return redirect ('posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $those = Post::findOrFail($id);
        return view('showPost', compact('those'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $there= Post::findOrFail($id);
        return view('updatePost', compact('there'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $that = $request->only($this->columns);
        $that['published'] = isset($request->published);
        Post::where('id', $id)->update($that);
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
