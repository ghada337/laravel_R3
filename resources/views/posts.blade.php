<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    @include('includes.navpost')
    <div class="container">
        <h2>posts list</h2>
        <p>The .table-hover class enables a hover state on table rows:</p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>title</th>
                    <th>description</th>
                    <th>author</th>
                    <th>published</th>
                    <th>Edit</th>
                    <th>show</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->author}}</td>
                    <td>
                        @if($post->published)
                            Yes
                        @else
                            No
                        @endif
                    </td>
                    <td><a href="updatePost/{{ $post->id }}">Edit</a></td>
                    <td><a href="showPost/{{ $post->id }}">show</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>





























{{-- <!DOCTYPE html>
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
</html> --}}
