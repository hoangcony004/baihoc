<!DOCTYPE html>
<html>
<head>
	<title>trangchu</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<h1 class="text-center col-md-12">Chào mừng: <?php echo $user[0]['full_name'] ?></h1>
		</div>
		<div class="row mt-5">
			<div class="col-md-3">
				<div class="row">
					<a href="?controller=trangchu" class="col-md-12 m-auto btn btn-info">Trang chủ</a>
				</div>
				<div class="row mt-3">
					<a href="?controller=nhanvien" class="col-md-12 m-auto btn btn-info">Nhân viên</a>
				</div>
				<div class="row mt-4">
					<a href="?controller=log_out" class="col-md-12 m-auto btn btn-info">Đăng xuất</a>
				</div>
			</div>
			<div class="col-md-9">
				<div class="row">
					<h3 class="text-center col-md-12">Hãy điền thông tin</h3>
				</div>
				<form action="?controller=add_nhanvien" method="post">
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
						<h5 class="text col-md-2">Họ tên</h5>
						<input type="text" name="full_name" class="form-control col-md-6" value="<?php echo (isset($full_name))?$full_name:'' ?>">
					</div>
					<div class="row mt-1">
					<?php if (isset($error['full_name'])) {?>
						<p class="text-danger"><?php echo $error['full_name'] ?></p>			
					<?php } ?>
					</div>
					<div class="row mt-5">
						<button type="submit" class="col-md-3 btn btn-success m-auto" name="btn_create">Tạo nhân viên</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>