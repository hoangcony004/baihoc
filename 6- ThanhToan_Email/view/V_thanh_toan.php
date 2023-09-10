<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row mt-3">
			<a href="?controller=trangchu" class="col-md-3 btn btn-secondary">Trang chu</a>
			<a href="?controller=giohang" class="col-md-3 btn btn-warning">Giỏ hàng</a>
		</div>
		<!-- Body -->
		<div class="row mt-5">
			<h2 class="text-center col-md-12">Điền thông tin cá nhân</h2>
		</div>
		<!-- Phần form điền thông tin -->
		<form action="?controller=thanh_toan" method="post">
			<div class="row mt-5">
				<h4 class="col-md-2">Họ tên:</h4>
				<input type="text" name="full_name" class="form-control col-md-6">
			</div>
			<div class="row mt-2">
				<h4 class="col-md-2">Địa chỉ:</h4>
				<input type="text" name="address" class="form-control col-md-6">
			</div>
			<div class="row mt-2">
				<h4 class="col-md-2">Số điện thoại:</h4>
				<input type="text" name="phone" class="form-control col-md-6">
			</div>
			<div class="row mt-2">
				<h4 class="col-md-2">Email:</h4>
				<input type="email" name="email" class="form-control col-md-6">
			</div>
			<div class="row mt-5">
				<button type="submit" name="btn_xacnhan" class="btn btn-success col-md-2 ">Xác nhận</button>
			</div>
		</form>
		
	</div>
</body>
</html>