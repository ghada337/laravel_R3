<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show post</title>
</head>
<body>
    <h2>{{ $those->title }}</h2>
    <h3>{{ $those->description }}</h3>
    <h3>by :{{ $those->author }}</h3>
    <h5>{{ $those->updated_at }}</h5>
    <h5>{{ $those->created_at }}</h5>
    <p>{{ $those->published? "Published" : "Not Published" }}</p>
</body>
</html>
