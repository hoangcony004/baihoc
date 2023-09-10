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
			<?php if ($user[0]['lv']==1) {?>
				<div class="row">
					<h3 class="text-center col-md-12">Quản lí nhân viên</h3>
				</div>
				<div class="row mt-3">
					<a href="?controller=add_nhanvien" class="col-md-2 btn btn-success">Thêm nhân viên</a>
				</div>
				<div class="row">
					<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">Mã nhân viên</th>
					      <th scope="col">Tên đăng nhập</th>
					      <th scope="col">Họ tên</th>
					      <th scope="col">Thao tác</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					    <?php foreach ($data_nhanvien as $key => $value) {?>
					      <th scope="row"><?php echo $value['id'] ?></th>
					      <td><?php echo $value['username'] ?></td>
					      <td><?php echo $value['full_name'] ?></td>
					      <td>
					      	 <a href="?controller=xuli_nhanvien&method=edit&id=<?php echo $value['id'] ?>" class="btn btn-success">Sửa</a>
					      	 <a href="?controller=xuli_nhanvien&method=del&id=<?php echo $value['id'] ?>" class="btn btn-danger">Xóa</a>
					      </td>
					    </tr>
					    <?php } ?>
					  </tbody>
					</table>
				</div>
			<?php }else{?>
				<div class="row">
					<h3 class="text-center text-danger col-md-12">Bạn không có quyền </h3>
				</div>
			<?php } ?>
				
			</div>
		</div>
	</div>
</body>
</html>