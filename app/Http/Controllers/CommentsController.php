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





	public function update(Request $request, $comment_id){

        // Request $request 요청정보

        $request ['comment'];

        $request -> input('comment');

        $comment = $request ->comment;

        $comment = Comment::find($comment_id);
        /* select * from comments where id =?  */

        $comment->comment = $comment;
        $comment->save();
    }

    public function destroy ($comment_id){

        $comment = Comment::find($comment_id);
        $comment-> delete();
        // delete from comments where id = ?
    }


    public function store(Request $requset, $post_id){

        $comment = new Comment;
        $comment->user_id = auth( )-user( )->id;
        $comment->post_id = $post_id;
        $comment->comment = $request->comment;

        $comment->save; /* id, created_at, updated_at */


    }
}
