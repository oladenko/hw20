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
            <input    class="form-control " list="datalistOptions" type="text" name="title" value="{{old('title', $post->title ?? null)}}"
                   placeholder="Write your title" id="title"/>
        </div>
        <br>
        @if($errors->has('user_id'))
            @foreach($errors->get('user_id') as $error)
                <div class="alert alert-danger" role="alert">
                    <p>{{$error}}</p>
                </div>
            @endforeach
        @endif
        <div class="container center_div">
            <label for="user_id" class="form-label">User</label>
            <select name="user_id" id="" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                @foreach($users as $user)

                    <option @if($user->id == old('user_id',  $post->user_id ?? null)) selected @endif value="{{$user->id}}"> {{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <br>
        @if($errors->has('category_id'))
            @foreach($errors->get('category_id') as $error)
                <div class="alert alert-danger" role="alert">
                    <p>{{$error}}</p>
                </div>
            @endforeach
        @endif
        <div class="container center_div">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="" class="form-select form-select-lg mb-3"
                    aria-label=".form-select-lg example">

                @foreach($categories as $category)
                    <option @if($category->id == old('category_id' ,  $post->category_id ?? null)) selected @endif value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <br>
        @if($errors->has('tags'))
            @foreach($errors->get('tags') as $error)
                <div class="alert alert-danger" role="alert">
                    <p>{{$error}}</p>
                </div>
            @endforeach
        @endif
        <div class="container center_div">
            <label for="tags[] " class="form-label" >Tags</label>
            <select name="tags[]" id="tags[]"   class="form-select" aria-label="multiple select example"  multiple>
                @foreach($tags as $tag)
                    <option  @if(in_array($tag->id, old('tags',$post->tags-> pluck('id')->toArray() ?? []) ?? [])) selected @endif value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
        <br>
        @if($errors->has('body'))
            @foreach($errors->get('body') as $error)
                <div class="alert alert-danger"  role="alert" >
                    <p>{{$error}}</p>
                </div>
            @endforeach
        @endif
        <div class="container center_div">
            <label for="body" class="form-label" >Info</label>
            <textarea class="form-control" id="body" name="body" rows="3">{{old('body', $post->body ?? null)}}</textarea>
        </div>
        <br>
        <div class="container center_div">
            <button type="submit" class="btn btn-info">Save</button>
        </div>
    </form>


@endsection
