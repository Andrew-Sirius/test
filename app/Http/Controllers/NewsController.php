<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;

use App\News;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', ['news' => News::with('comment')->get()]);
    }

    public function create()
    {
        return view('news.add');
    }

    public function store(Request $request)
    {
        $news = News::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'short_text' => $request->short_text,
            'text' => $request->text,
        ]);

        if ($news)
            return Response::json(['result' => 'success']);
        else
            return Response::json(['result' => 'fail']);
    }

    public function destroy($id)
    {
        $news = News::find($id);

        if(!$news) {
            return Response::json(['result' => 'not_found']);
        }

        if ($news->delete()) {
            // TODO наверное не нужно удалять комментарии у новости, которая мягко удалена.
            $news = Comment::where('new_id', $id);
            $news->delete();
            return Response::json(['result' => 'success']);
        }
        else
            return Response::json(['result' => 'fail']);
    }
}
