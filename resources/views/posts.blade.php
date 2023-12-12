<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>My Laravel Page</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

<body>
    <h1>Our Blog Posts</h1>
    <div class="posts-container">
        @forelse ($posts as $post)
            <div class="post">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->description }}</p>
                <small>Written by: {{ $post->author }}</small><br>
                <small>Published: {{ $post->published ? 'Yes' : 'No' }}</small>
                <br>
                <small>Posted on: {{ $post->created_at->format('M d, Y') }}</small>
            </div>
        @empty
            <p>No posts available.</p>
        @endforelse
    </div>
</body>
</html>
