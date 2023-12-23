<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use App\Traits\Common;

class PostController extends Controller
{

    use Common;
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

        // $here = $request->only($this->columns);

        $messages = $this->messages();
        $here = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ] , $messages);

        $fileName = $this->uploadFile($request->image, 'assets/images');
        $here['image'] = $fileName;
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
        Post::where('id', $id)->delete();
        return redirect('posts');
    }

    //trash list
    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('trashedPost', compact('posts'));
    }

    public function forceDelete(string $id)
    {
        Post::where('id', $id)->forceDelete();
        return redirect('posts');
    }

    public function restore(string $id)
    {
        Post::where('id', $id)->restore();
        return redirect('posts');
    }

    public function messages(){
        return [
            'title.required' => 'please provide a title',
            'title.max' => 'title cannot be more than 255 characters',
            'description.required' => 'please provide a description',
            'description.max' => 'description cannot be more than 255 characters',
            'author.required' => 'please provide an author',
            'author.max' => 'author cannot be more than 255 characters',
            'image.required'=> 'Please be sure to select an image',
            'image.mimes'=> 'Incorrect image type',
            'image.max'=> 'Max file size exceeded',
        ];
    }

}


