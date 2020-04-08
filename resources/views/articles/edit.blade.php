@extends('layout')

@section('head')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <form action="/articles/{{ $article->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="@error('title') is-invalid @enderror form-control" type="text" id="title" name="title" value="{{ $article->title }}">

                    @error('title')
                        <p class="is-invalid text-danger">{{ $errors->first('title') }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="excerpt">Excerpt</label>
                    <input class="@error('title') is-invalid @enderror form-control" type="text" id="excerpt" name="excerpt" value="{{ $article->excerpt }}">

                    @error('excerpt')
                        <p class="is-invalid text-danger">{{ $errors->first('excerpt') }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea class="@error('body') is-invalid @enderror form-control"  id="body" name="body" required>{{ $article->body }}</textarea>

                    @error('body')
                        <p class="is-invalid text-danger">{{ $errors->first('body') }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection
