<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Laravel Blog</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            color: #333;
            background-color: #f4f4f4;
        }
        .posts-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }
        .post {
            background-color: white;
            border: 1px solid #ddd;
            padding: 20px;
            margin: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.3s ease-in-out;
        }
        .post:hover {
            transform: translateY(-5px);
        }
        h1 {
            text-align: center;
            color: #50642b;
        }
        small {
            display: block;
            color: #666;
        }
    </style>
</head>
<body>
    @include('includes.navpost')
    <h1>Our Blog Posts</h1>
    <div class="posts-container">
        @forelse ($posts as $post)
            <div class="post">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->description }}</p>
                <small>Written by: {{ $post->author }}</small>
                <small>Published: {{ $post->published ? 'Yes' : 'No' }}</small>
                <small>Posted on: {{ $post->created_at->format('M d, Y') }}</small>
            </div>
        @empty
            <p>No posts available.</p>
        @endforelse
    </div>
</body>
</html>
