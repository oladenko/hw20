@extends('layout')
@section('content')

    <form action="" method="post">
        @csrf
        @if($errors->has('title'))
            @foreach($errors->get('title') as $error)
                <div class="alert alert-danger" role="alert">
                    <p>{{$error}}</p>
                </div>
            @endforeach
        @endif
        <div class="container center_div">
            <label for="title" class="form-label">Title</label>
            <input class="form-control " list="datalistOptions" type="text" name="title"
                   value="{{old('title', $tag->title ?? null)}}"
                   placeholder="Write your title" id="title"/>
        </div>
        @if($errors->has('slug'))
            @foreach($errors->get('slug') as $error)
                <div class="alert alert-danger" role="alert">
                    <p>{{$error}}</p>
                </div>
            @endforeach
        @endif
        <div class="container center_div">
            <label for="slug" class="form-label">Slug</label>
            <input class="form-control " list="datalistOptions" type="text" name="slug"
                   value="{{old('slug', $tag->slug ?? null)}}"
                   placeholder="Write your slug" id="slug"/>
        </div>


        <br>
        <div class="container center_div">
            <button type="submit" class="btn btn-info">Save</button>
        </div>
    </form>


@endsection
