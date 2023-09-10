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
					<a href="?controller=order" class="col-md-12 m-auto btn btn-info">Đơn hàng</a>
				</div>
				<div class="row mt-4">
					<a href="?controller=log_out" class="col-md-12 m-auto btn btn-info">Đăng xuất</a>
				</div>
			</div>
			<div class="col-md-9">
			<?php if ($user[0]['lv']==1) {?>
				<div class="row">
					<h3 class="text-center col-md-12">Quản lí order</h3>
				</div>
				<div class="row">
					<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">Mã</th>
					      <th scope="col">Họ và tên</th>
					      <th scope="col">Địa chỉ</th>
					      <th scope="col">Số điện thoại</th>
					      <th scope="col">Trạng thái</th>
					      <th scope="col">Thao tác</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					    <?php foreach ($data_order_not_done as $key => $value) {?>
					      <th scope="row"><?php echo $value['id'] ?></th>
					      <td><?php echo $value['full_name'] ?></td>
					      <td><?php echo $value['address'] ?></td>
					      <td><?php echo $value['phone'] ?></td>
					      <td class="text-danger">Chưa duyệt</td>
					      <td>
					      	 <a href="?controller=order_detail&id=<?php echo $value['id'] ?>" class="btn btn-success">Xử lí</a>
					      </td>
					    </tr>
					    <?php } ?>
					    <?php foreach ($data_order_done as $key => $value) {?>
					      <th scope="row"><?php echo $value['id'] ?></th>
					      <td><?php echo $value['full_name'] ?></td>
					      <td><?php echo $value['address'] ?></td>
					      <td><?php echo $value['phone'] ?></td>
					      <td class="text-success">Đã duyệt</td>
					      <td class="text-success">Đã xong</td>
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