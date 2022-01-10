<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newspost;

class PublishPost extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        // Validate selected post and add to database
        $this->validate($request, [
            'published' => 'required|boolean'
        ]);

        // dd($request);

        // Update selected post

        $post = Newspost::find($id);

        $post->published = $request->input('published');

        // dd($post);

        $post->save();

        return back();
    }
}
