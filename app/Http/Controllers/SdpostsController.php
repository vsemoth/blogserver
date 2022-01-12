<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sdpost;


class SdpostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all posts
        $posts = Sdpost::all();

        // Return index view with posts data
        return view('sdposts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return create page for posts
        return view('sdposts.create');
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
            'post_content' => 'required|string'
        ]);

        $post = new Sdpost;

        $post->post_title = $request->input('post_title');

        $str = $post->post_title;
        $sep='-';
        $res = strtolower($str);
        $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
        $res = preg_replace('/[[:space:]]+/', $sep, $res);
        $slug = trim($res, $sep);

        $post->slug = $slug;

        $post->post_content = $request->input('post_content');

        // dd($post);

        $post->save();

        return redirect()->route('sdposts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Show selected post page
        $post = Sdpost::find($id);

        return view('sdposts.show')->withPost($post);
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
        $post = Sdpost::find($id);
        return view('sdposts.edit')->withPost($post);
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
        // Validate selected post and add to database
        $this->validate($request, [
            'post_title' => 'required|string',
            'post_content' => 'required|string'
        ]);

        // dd($request);

        // Update selected post

        $post = Sdpost::find($id);

        $post->post_title = $request->input('post_title');

        $str = $post->post_title;
        $sep='-';
        $res = strtolower($str);
        $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
        $res = preg_replace('/[[:space:]]+/', $sep, $res);
        $slug = trim($res, $sep);

        $post->slug = $slug;

        $post->post_content = $request->input('post_content');

        // $post->published = $request->input('published');

        // dd($post);

        $post->save();

        return redirect()->route('sdposts.show', $post->id);
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
        $post = Sdpost::find($id);
        $post->delete();
        return back()->with('Success', 'Post' . $post->post_title . ' has been deleted!');
    }
}
