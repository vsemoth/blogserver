<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostdataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all posts in JSON format
        $posts = Post::all();
        $jsonposts = json_encode($posts, JSON_PRETTY_PRINT);
        header('Content-Type: application/json');

        // Return index view with posts data
        return $jsonposts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return create page for posts
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate new post and add to database
        $this->validate($request, [
            'post_title' => 'required|string',
            'slug' => 'required|alpha_dash',
            'post_content' => 'required|string'
        ]);

        $post = new Post;

        $post->post_title = $request->input('post_title');
        $post->slug = $request->input('slug');
        $post->post_content = $request->input('post_content');

        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($value='{slug}')
    {
        // Show selected post page

        // Fetch slug data from database
        $post = Post::where('slug', '=', $value)->first();

        // Return view with post object
        $jsonpost = json_encode($post, JSON_PRETTY_PRINT);
        header('Content-Type: application/json');

        // Return index view with posts data
        // return "works";
        return $jsonpost;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Edit selected post
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
        // Update selected post
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete selected post
    }
}
