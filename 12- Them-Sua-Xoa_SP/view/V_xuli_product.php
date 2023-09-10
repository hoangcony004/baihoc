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
					<a href="?controller=product" class="col-md-12 m-auto btn btn-info">Sản phẩm</a>
				</div>
				<div class="row mt-4">
					<a href="?controller=log_out" class="col-md-12 m-auto btn btn-info">Đăng xuất</a>
				</div>
			</div>
			<div class="col-md-9">
				<div class="row">
					<h3 class="text-center col-md-12">Hãy nhập thông tin</h3>
				</div>
				<form action="?controller=xuli_product&method=edit&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
					<div class="row mt-5">
						<h5 class="text col-md-2">Tên sản phẩm</h5>
						<input type="text" name="name" class="form-control col-md-6" value="<?php echo $data_product[0]['name'] ?>">
					</div>
					<div class="row mt-1">
					<?php if (isset($error['name'])) {?>
						<p class="text-danger"><?php echo $error['name'] ?></p>			
					<?php } ?>
					</div>
					<div class="row mt-5">
						<h5 class="text col-md-2">Đơn giá</h5>
						<input type="text" name="price" class="form-control col-md-6" value="<?php echo $data_product[0]['price'] ?>">
					</div>
					<div class="row mt-1">
					<?php if (isset($error['price'])) {?>
						<p class="text-danger"><?php echo $error['price'] ?></p>			
					<?php } ?>
					</div>
					<div class="row mt-5">
						<h5 class="text col-md-2">Số lượng</h5>
						<input type="text" name="amount" class="form-control col-md-6" value="<?php echo $data_product[0]['amount'] ?>">
					</div>
					<div class="row mt-1">
					<?php if (isset($error['amount'])) {?>
						<p class="text-danger"><?php echo $error['amount'] ?></p>			
					<?php } ?>
					</div>
					<div class="row mt-5">
						<h5 class="text col-md-2">Mô tả ngắn</h5>
						<input type="text" name="content" class="form-control col-md-6" value="<?php echo $data_product[0]['content'] ?>">
					</div>
					<div class="row mt-1">
					<?php if (isset($error['content'])) {?>
						<p class="text-danger"><?php echo $error['content'] ?></p>			
					<?php } ?>
					</div>
					<div class="row mt-5">
						<h5 class="text col-md-2">Danh mục</h5>
						<select class="form-control col-md-6" name="catalog">	
							<option value="<?php echo $product_catalog[0]['id'] ?>"><?php echo $product_catalog[0]['name'] ?></option>
							<?php foreach ($data_catalog as $key => $value) {
							if ($product_catalog[0]['id']!=$value['id']) {?>
							<option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
							<?php }	} ?>
						</select>
					</div>
					<div class="row mt-5">
						<h5 class="text col-md-2">Ảnh mô tả</h5>
						<img height="150" src="<?php echo $data_product[0]['img_link'] ?>" class="col-md-3">
						<input type="file" name="img_link" class="form-control-file col-md-6">
					</div>
					<div class="row mt-1">
					<?php if (isset($error['img_link'])) {?>
						<p class="text-danger"><?php echo $error['img_link'] ?></p>			
					<?php } ?>
					</div>
					<div class="row mt-5">
						<button type="submit" class="col-md-3 btn btn-success m-auto" name="btn_create">Sửa sản phẩm</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>