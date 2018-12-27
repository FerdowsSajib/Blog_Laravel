<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function addNewComment(Request $request)
    {
        $comment = new Comment();

        $comment->visitor_id = $request->visitor_id;
        $comment->blog_id    = $request->blog_id;
        $comment->comment    = $request->comment;
        $comment->save();

        return redirect('/blog/blog-details/'.$comment->blog_id)->with('message', 'Your comment post successfully');
    }

    public function manageComment()
    {
        return view('admin.comment.manage-comment',[
            'comments'     => DB::table('comments')
                                ->join('visitors', 'comments.visitor_id', '=', 'visitors.id')
                                ->join('blogs', 'comments.blog_id', '=', 'blogs.id')
                                ->select('comments.*','visitors.visitor_name','blogs.blog_title')
                                ->orderBy('comments.id', 'desc')
                                ->get()
        ]);
    }

    public function unpublishedComment($id)
    {
        $comment = Comment::find($id);
        $comment->publication_status = 0;
        $comment->save();

        return redirect('/manage-comment');
    }

    public function publishedComment($id)
    {
        $comment = Comment::find($id);
        $comment->publication_status = 1;
        $comment->save();

        return redirect('/manage-comment');
    }


}
