<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row mt-3">
			<a href="?controller=trangchu" class="col-md-3 btn btn-secondary">Trang chu</a>
		</div>
		<!-- Body -->
		<div class="row mt-5">
			<h2 class="text-center col-md-12">Hiển thị sản phẩm</h2>
		</div>
		<!-- Phần form tìm kiếm -->
		<div class="row mt-3">
			<form class="form-inline my-2 my-lg-0" method="get" action="index.php">
	    		<input type="hidden" name="controller" value="trangchu">
	      		<input name="keyword" class="form-control " type="search" placeholder="Tên sản phẩm" aria-label="Search" value="<?php echo (isset($_GET['keyword'])) ? $_GET['keyword'] : '' ?>">
	      		<button id="btn-search" class="btn btn-default" type="submit">Tìm kiếm</button>
	    	</form>
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
					<a href="" class="btn btn-success">+Giỏ hàng</a>
				</div>
			</div>	
		<?php } ?>
		</div>
	</div>
</body>
</html>