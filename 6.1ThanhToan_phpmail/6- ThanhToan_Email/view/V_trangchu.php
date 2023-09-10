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
			<h2 class="text-center col-md-12">Hiển thị sản phẩm</h2>
		</div>
		<!-- Phần hiển thị sản phẩm -->
		<div class="row">
		<?php foreach ($product as $key => $value) {?>
			<div class="col-md-3 mt-5">
				<div class="card">
					<a href=""><img style="width: 250px; height: 200px;" src="<?php echo $value['img_link'] ?>" class="card-img-top img-thumbnail"></a>
					<h5 class="card-title text-center text-secondary"><?php echo $value['name'] ?></h5>
					<p class="card-text">Đơn giá: <?php echo number_format($value['price']) ?>đ</p>
					<p class="card-text">Mô tả: <?php echo $value['content'] ?>đ</p>
					<a href="?controller=add_giohang&id=<?php echo $value['id'] ?>" class="btn btn-success">+Giỏ hàng</a>
				</div>
			</div>	
		<?php } ?>
		</div>
	</div>
</body>
</html>