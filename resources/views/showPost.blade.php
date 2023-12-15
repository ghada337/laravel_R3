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
