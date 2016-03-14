<!DOCTYPE html>
<html>
<head>
    <title>Add comment</title>

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
        <div class="title">Add comment</div>
        <div class="news">
            <form action="{{url('/comment/save')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="user_id" value="1">
                <input type="hidden" name="new_id" value="{{$new_id}}">
                <div>
                    <label for="comment"> Comment
                        <textarea id="comment" name="comment"></textarea>
                    </label>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
