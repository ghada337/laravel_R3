<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Post</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    @include('includes.navpost')
    <div class="container">
        <h2>Add new Post</h2>
        <form action="{{ route('storePost') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
            </div>
            <div class="form-group">
                <label for="description">description:</label>
                <textarea class="form-control" name="description" id="" cols="60" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" class="form-control" id="author" placeholder="Enter author" name="author" required>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="published"> Published me</label>
            </div>


            <button type="submit" class="btn btn-default">Insert</button>
        </form>
    </div>

</body>

</html>


































{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Post</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    @include('includes.navpost')

<div class="container mt-5">
    <h2>Create a New Post</h2>


    <form action="{{ route('storePost') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>

        <div class="form-group">
            <label for="published">Published:</label>
            <div class="checkbox">
                <label><input type="checkbox" name="published"> Publish it now</label>
            </div>
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

</body>
</html> --}}
