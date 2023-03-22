<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="login/index.css">
	<title>Login</title>
</head>
<style>
    .error
    {
        padding: 0px 20px;
        color: red;
    }
</style>
<body>
    <div class="login_page" class="fluid-container">
        <div class="login_page--left">
            <form id="login_form" action="{{route('login')}}" method="post">
                {{-- <label for="">Username</label> --}}
                <input type="text" name="username" id="" placeholder="TÊN ĐĂNG NHẬP">
                @if($errors->has('username'))
                    <div class="error">{{ $errors->first('username') }}</div>
                @endif
                {{-- <label for="">Password</label> --}}
                <input type="password" name="password" id="" placeholder="MẬT KHẨU">
                @if($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif
                @if (session('message'))
                    <div class="alert alert-success" style="text-align: center;color: red">
                        <h5>{{ session('message') }}</h5>
                    </div>
                @endif
                <button type="submit" class="login-btn">ĐĂNG NHẬP</button>
                @csrf
            </form>
        </div>
        <div class="login_page--right">
            {{-- <img src="/image/login_right.jpg" alt=""> --}}
        </div>
    </div>
</body>
</html>
