@extends('layout')

@section('head')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
@endsection

@section('content')
<div id="wrapper">
    <div id="page" class="container">
        <form action="/articles" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input class="@error('title') is-invalid @enderror form-control" type="text" id="title" name="title" value="{{ old('title') }}">

                @error('title')
                    <p class="is-invalid text-danger">{{ $errors->first('title') }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="excerpt">Excerpt</label>
                <input class="@error('excerpt') is-invalid @enderror form-control" type="text" id="excerpt" name="excerpt" value="{{ old('excerpt') }}">

                @error('excerpt')
                    <p class="is-invalid text-danger">{{ $errors->first('excerpt') }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="@error('body') is-invalid @enderror form-control" id="body" name="body">{{ old('body') }}</textarea>

                @error('body')
                    <p class="is-invalid text-danger">{{ $errors->first('body') }}</p>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="tag">Tags</label>
                
                <select class="selectpicker" name="tags[]" multiple id="tag" data-live-search="true">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>

                @error('tags')  
                    <p class="is-invalid text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>

@endsection
