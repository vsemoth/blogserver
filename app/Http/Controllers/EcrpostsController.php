<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ecrpost;


class EcrpostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all posts
        $posts = Ecrpost::all();

        // Return index view with posts data
        return view('ecrposts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return create page for posts
        return view('ecrposts.create');
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

        $post = new Ecrpost;

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

        return redirect()->route('ecrposts.index');
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
        $post = Ecrpost::find($id);

        return view('ecrposts.show')->withPost($post);
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
        $post = Ecrpost::find($id);
        return view('ecrposts.edit')->withPost($post);
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

        $post = Ecrpost::find($id);

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

        return redirect()->route('ecrposts.show', $post->id);
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
        $post = Ecrpost::find($id);
        $post->delete();
        return back()->with('Success', 'Post' . $post->post_title . ' has been deleted!');
    }
}
