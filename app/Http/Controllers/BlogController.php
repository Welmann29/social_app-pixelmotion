<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewPostRequest;

class BlogController extends Controller
{

    public function update(Post $post, NewPostRequest $request) {
        $fields = $request->validated();

        $fields['title'] = strip_tags($fields['title']);
        $fields['body'] = strip_tags($fields['body']);

        $post->update($fields);

        return redirect("/post/{$post->id}")->with('success', 'You have updated the post');
    }

    public function editPost(Post $post) {
        return view('edit-post', ['post' => $post]);
    }
    
    public function delete(Post $post) {
        $post->delete();
        return redirect("/profile/".auth()->user()->username)->with('success', 'You have succesfully deleted the post');
    }

    public function showCreatePage() {
        return view('create-post');
    }

    public function createNewPost(NewPostRequest $request) {
        $fields = $request->validated();

        $fields['title'] = strip_tags($fields['title']);
        $fields['body'] = strip_tags($fields['body']);
        $fields['user_id'] = auth()->id();

        $newPost = Post::create($fields);

        return redirect("/post/{$newPost->id}")->with('success', 'You have created a new post');
    }

    public function viewPost(Post $post) {
        return view('single-post', ['post' => $post]);
    }
}
