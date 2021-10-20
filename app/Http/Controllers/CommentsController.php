<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommentsController extends Controller
{
    public function index($postId) {

        /*
            select * from comments where post_id = ?
        */

        $comments = Comment::where('post_id', $postId)->latest();
        return $comments;

    }

    // http://localhost:8000/post/{id}/comments
    public function index_test(Post $post) {

        /*
         * select *
         * from comments
         * where post_id = $post->id
         */

         // Post 클래스에 comments 함수 구현한 경우..
        return $post->comments;

    }





    public function update() {

    }

    public function destroy(Request $request, $id) {




    }

    public function store() {

    }
}
