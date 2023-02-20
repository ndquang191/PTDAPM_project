<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login/index.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="">Username</label>
            <input type="text" name="username" id="">
            <label for="">Password</label>
            <input type="password" name="password" id="">
            <label for="">Role</label>
            <input type="text" name="role" id="">
            <button type="submit" class="login-btn">Register</button>
            @csrf
        </form>
    </div>
</body>
</html>