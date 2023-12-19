
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Show post</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
</head>

<body>
    @include('includes.navpost')
    <h2>{{ $those->title }}</h2>
    <h3>{{ $those->description }}</h3>
    <h3>by :{{ $those->author }}</h3>
    <h5>{{ $those->updated_at }}</h5>
    <h5>{{ $those->created_at }}</h5>
    <p>{{ $those->published? "Published" : "Not Published" }}</p>
</body>

</html>
























{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show post - {{ $those->title }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 700px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .post-title {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .post-description {
            color: #34495e;
            font-size: 1.1em;
            line-height: 1.4em;
            margin-bottom: 20px;
        }
        .timestamp, .author-name {
            color: #7f8c8d;
            font-size: 0.85em;
            margin-bottom: 5px;
        }
        .status {
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
        }
        .status-published {
            background: #2ecc71;
            color: white;
        }
        .status-not-published {
            background: #e74c3c;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="post-title">{{ $those->title }}</h1>
        <div class="post-description">{{ $those->description }}</div>
        <p class="author-name">Author: {{ $those->author }}</p>
        <p class="timestamp">Last Updated: {{ $those->updated_at->format('F j, Y, g:i a') }}</p>
        <p class="timestamp">Created On: {{ $those->created_at->format('F j, Y, g:i a') }}</p>
        <div class="{{ $those->published ? 'status status-published' : 'status status-not-published' }}">
            {{ $those->published ? "Published" : "Not Published" }}
        </div>
    </div>
</body>
</html>
--}}
