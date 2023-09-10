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
					<h3 class="text-center col-md-12">Xử lí đơn hàng</h3>
				</div>
				<div class="row">
					<b class="text col-md-12">Mã đơn: <?php echo $data_order[0]['id'] ?></b>
					<b class="text col-md-12">Họ tên: <?php echo $data_order[0]['full_name'] ?></b>
					<b class="text col-md-12">Địa chỉ: <?php echo $data_order[0]['address'] ?></b>
					<b class="text col-md-12">Số điện thoại: <?php echo $data_order[0]['phone'] ?></b>
					<b class="text col-md-12">Email: <?php echo $data_order[0]['email'] ?></b>
					<b class="text col-md-12">Tổng đơn: <?php echo number_format($data_order[0]['amount']) ?>đ</b>
				</div>
				<div class="row">
					<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">Ảnh</th>
					      <th scope="col">Tên sản phẩm</th>
					      <th scope="col">Số lượng</th>
					      <th scope="col">Đơn giá</th>
					      <th scope="col">Tổng tiền</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					    <?php foreach ($data_order_detail as $key => $value) {
					    	//Lấy dữ liệu sản phẩm tương ứng
					    	$data_product = $db->get('product',array('id'=>$value['product_id']))
					   	?>
					      <th scope="row"><img height="50" width="50" src="<?php echo $data_product[0]['img_link'] ?>"></th>
					      <td><?php echo $data_product[0]['name'] ?></td>
					      <td><?php echo $value['qty'] ?></td>
					      <td><?php echo $value['price'] ?></td>
					      <td><?php echo $value['amount'] ?></td>	      
					    </tr>
					    <?php } ?>
					  </tbody>
					</table>
				</div>
				<div class="row mt-4">
					<div class="col-md-10"></div>
					<a href="?controller=xuli_order&id=<?php echo $id ?>" class="btn btn-success col-md-2">Duyệt đơn</a>
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