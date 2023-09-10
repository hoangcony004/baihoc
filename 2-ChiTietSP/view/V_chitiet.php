<!DOCTYPE html>
<html>
<head>
	<title>Trang chu</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	<div class="container mt-2">
		<!-- Phần hiển thị sản phẩm chính -->
		<div class="row mt-4">
			<h3 class="col-md-12 text-center">Chi tiết sản phẩm</h3>
			<div class="col-md-12"><a href="?controller=trangchu" class="col-md-2 btn btn-secondary">Trang chủ</a></div>
			<div class="col-md-4 mt-5">
				<div class="card">
					<img style="width: 350px; height: 300px;" src="<?php echo $product[0]['img_link'] ?>" class="card-img-top img-thumbnail">
				</div>
			</div>
			<div class="col-md-4 mt-5">
				<h4 class="card-title text-secondary">Danh mục :<?php echo $catalog[0]['name'] ?></h4>
				<h5 class="card-title text-secondary">Tên sản phẩm :<?php echo $product[0]['name'] ?></h5>
				<p class="card-text">Tồn kho: <?php echo number_format($product[0]['amount']) ?></p>
				<p class="card-text">Đơn giá: <?php echo number_format($product[0]['price']) ?>đ</p>
				<p class="card-text">Mô tả: <?php echo $product[0]['content'] ?>đ</p>
				<a href="" class="btn btn-success">+Giỏ hàng</a>
			</div>
				
		</div>
		<!-- Phần hiển thị sản phẩm liên quan -->
		<div class="row mt-5">
			<h3 class="col-md-12 text-center">Những sản phẩm liên quan</h3>
		</div>
		<div class="row mt-3">
		<?php foreach ($product_lienquan as $key => $value) {?>
			<div class="col-md-3 mt-5">
				<div class="card">
					<a href="?controller=chitiet&id=<?php echo $value['id'] ?>"><img style="width: 250px; height: 200px;" src="<?php echo $value['img_link'] ?>" class="card-img-top img-thumbnail"></a>
					<h5 class="card-title text-center text-secondary"><?php echo $value['name'] ?></h5>
					<p class="card-text">Đơn giá: <?php echo number_format($value['price']) ?>đ</p>
					<p class="card-text">Mô tả: <?php echo $value['content'] ?>đ</p>
					<a href="" class="btn btn-success">+Giỏ hàng</a>
				</div>
			</div>		
		<?php } ?>
		</div>
	</div>
</body>
</html>