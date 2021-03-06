@extends('layout')
@section('content')

    <form action="" method="post">
        @csrf

        @if($errors->has('email'))
            @foreach($errors->get('email') as $error)
                <div class="alert alert-danger" role="alert">
                {{$error}}
                </div>
            @endforeach
            @endif

        <div class="container center_div">
        <label for="email"  class="form-label">Email:</label>
        <input type="email" name="email" id="email"  class="form-control">
        </div>

        <br>
        @if($errors->has('password'))
            @foreach($errors->get('password') as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
            @endforeach
        @endif
        <div class="container center_div">
        <label for="password"  class="form-label">Password:</label>
        <input type="password" name="password" id="password"  class="form-control">
        </div>
        <br>
        <div class="container center_div">
        <input type="submit" value="Log in"  class="btn btn-primary">
        </div>

    </form>

@endsection
