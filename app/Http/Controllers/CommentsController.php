<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use App\Comment;
use App\News;

class CommentsController extends Controller
{
    public function index()
    {
        //
    }

    public function create($new_id)
    {
        return view('comments.add', ['new_id' => $new_id]);
    }

    public function store(Request $request)
    {
        $comment = Comment::create([
            'new_id' => $request->new_id,
            'user_id' => $request->user_id,
            'comment' => $request->comment,
        ]);

        if ($comment) {
            $news = News::find($request->new_id);
            $news->comments = $news->comments + 1;
            $news->save();
            return Response::json(['result' => 'success']);
        }
        else
            return Response::json(['result' => 'fail']);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);

        if(!$comment) {
            return Response::json(['result' => 'not_found']);
        }

        $new_id = $comment->new_id;

        if ($comment->delete()) {
            $news = News::find($new_id);
            $news->comments = $news->comments - 1;
            $news->save();
            return Response::json(['result' => 'success']);
        }
        else
            return Response::json(['result' => 'fail']);
    }
}
