<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row mt-3">
			<h2 class="text-center col-md-12">Đăng nhập</h2>
		</div>
		<!-- form đăng nhập  -->
		<form action="?controller=login" method="post">
			<div class="row mt-5">
				<h5 class="text col-md-2">Tài khoản</h5>
				<input type="text" name="username" class="form-control col-md-6" value="<?php echo (isset($username))?$username:'' ?>">
			</div>
			<div class="row mt-1">
			<?php if (isset($error['username'])) {?>
				<p class="text-danger"><?php echo $error['username'] ?></p>			
			<?php } ?>
			</div>
			<div class="row mt-5">
				<h5 class="text col-md-2">Mật khẩu</h5>
				<input type="password" name="password" class="form-control col-md-6" value="<?php echo (isset($password))?$password:'' ?>">
			</div>
			<div class="row mt-1">
			<?php if (isset($error['password'])) {?>
				<p class="text-danger"><?php echo $error['password'] ?></p>			
			<?php } ?>
			</div>
			<div class="row mt-5">
				<button type="submit" class="col-md-3 btn btn-info m-auto" name="btn_login">Đăng nhập</button>
			</div>
		</form>
	</div>
</body>
</html>