<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./login.css">
	<title>Login</title>
</head>
<body>
	<div class="container">
		<div class="container-left">
			<img src="./image/login_left.jpg" alt="">
		</div>
		<div class="container-right">
			<img src="./image/login_right.jpg" alt="">
		</div>
		<form action="" method="post">
			<div class="taitle" style="padding: 10px;">
				<label  for="">ĐĂNG NHẬP HỆ THỐNG</label>
			</div><hr>
			<div class="container-form">
				<label for="uname"><b></b></label>
				<input type="text" placeholder="TÊN ĐĂNG NHẬP" name="uname" required>
		
				<label for="psw"><b></b></label>
				<input type="password" placeholder="MẬT KHẨU" name="psw" required>
			</div>
			<div class="login-btn">
				<button type="submit">Login</button>
			</div>
		</form>
	</div>
	
</body>
</html>
