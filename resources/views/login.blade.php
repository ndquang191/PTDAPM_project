<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login/index.css">
    <title>Login</title>
</head>
<body>
    <div class="login_page" class="fluid-container">

        <div class="login_page--left">


            <form id="login_form" action="{{route('login')}}" method="post">
                {{-- <label for="">Username</label> --}}
                <input type="text" name="username" id="">
                @if($errors->has('username'))
                    <div class="error">{{ $errors->first('username') }}</div>
                @endif
                {{-- <label for="">Password</label> --}}
                <input type="password" name="password" id="">
                @if($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif
                <button type="submit" class="login-btn">Login</button>
                @csrf
            </form>

        </div>
        <div class="login_page--right">
            <img src="/image/login_right.jpg" alt="">
        </div>
    </div>
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
</body>
</html>