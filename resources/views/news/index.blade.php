<!DOCTYPE html>
<html>
<head>
    <title>News</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }
        .news {
            text-align: left;
            color: #555555;
        }
        .news h4 {
            font-size: 150%;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">news index</div>
        <div class="news">
        @foreach($news as $item)
            <h4>{{$item->title}}</h4>
            <p>{{$item->text}}</p>
            <p>Comments: {{$item->comments}}</p>
            <p><a href="{{url('/news/delete/'.$item->id)}}">Delete article</a></p>
            <p><a href="{{url('comment/add/'.$item->id)}}">Add comment</a></p>
            @foreach($item->comment as $comment)
                <div style="border:1px solid #ededed;">{{$comment->comment}}<p><a href="{{url('/comment/delete/'.$comment->id)}}">Delete</a></p></div>
            @endforeach
            <hr>
        @endforeach
        </div>
    </div>
</div>
</body>
</html>
