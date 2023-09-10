<!DOCTYPE html>
<html>
<head>
	<title>cart</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid mt-5 ">
		<div class="row mt-3">
			<a href="?controller=trangchu" class="col-md-3 btn btn-secondary">Trang chu</a>
			<a href="?controller=giohang" class="col-md-3 btn btn-warning">Giỏ hàng</a>
		</div>
		<div class="row mt-5" id="table">
			<div class="col-md-8">
				<div class="row">
					<table class="table table-striped">
					<thead>
					    <tr>
					      <th scope="col">Ảnh</th>
					      <th scope="col">Tên sản phẩm</th>
					      <th scope="col">Đơn giá</th>
					      <th scope="col">Số lượng</th>
					      <th scope="col">Tổng cộng</th>
					      <th scope="col">Thao tác</th>
					    </tr>
					</thead>
					<tbody>
					<?php 	
						$amount =0;
						if (isset($_SESSION['cart'])) {
						foreach ($_SESSION['cart'] as $key => $value) {
						$amount += $value['sl']*$value['price'];
					?>
						<tr>
							<th><img width="50" height="50" src="<?php echo $value['img_link'] ?>"></th>
							<th><?php echo $value['name'] ?></th>
							<th><?php echo $value['price'] ?></th>
							<th><?php echo $value['sl'] ?></th>
							<th><?php echo $value['sl']*$value['price'] ?></th>
							<th>
								<a href="?controller=xuli_cart&method=prev&id=<?php echo $value['id'] ?>" class="btn btn-secondary">-</a>
								<a href="?controller=xuli_cart&method=next&id=<?php echo $value['id'] ?>"  class="btn btn-success">+</a>
								<a href="?controller=xuli_cart&method=del&id=<?php echo $value['id'] ?>"  class="btn btn-danger">Xóa</a>
							</th>
						</tr>	
					<?php } }else{?>
						<h4 class="text text-danger">giỏ hàng rỗng</h4>
					<?php } ?>						
					</tbody>
					</table>
				</div>
			</div>
			<div class="col-md-4">
				<div class="row border-bottom">
					<h6 class="col-md-6">Tổng tiền :</h6>
					<p class="col-md-6 text-info"><?php echo $amount ?>đ</p>
				</div>
				<div class="row mt-2">
					<a href="?controller=thanh_toan" class="col-md-5 m-auto btn btn-success">
						Thanh toán
					</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>