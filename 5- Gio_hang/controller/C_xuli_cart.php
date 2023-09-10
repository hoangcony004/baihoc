<?php 
	//Lấy giá trị method ở trên thanh url để xem người dùng muốn làm gì
	$method = $_GET['method'];
	//Lấy giá trị id ở trên thanh url để xem người dùng muốn làm gì với sản phẩm nào trong giỏ hàng
	$id = $_GET['id'];
	//Kiểm tra biến $method để xử lí từng trường hợp một
	switch ($method) {
		//Nếu người $method = prev thì thực hiện trừ số lượng sản phẩm tương ứng
		case 'prev':
			//Bước 1: Trừ số lượng của sản phẩm đi 1
			$_SESSION['cart'][$id]['sl']-=1;
			//Bước 2: Kiểm tra xem số lượng của sản phẩm có bằng 0 chưa
			if ($_SESSION['cart'][$id]['sl']==0) {
				//Nếu bằng 0 thì xóa sản phẩm khỏi giỏ hàng
				unset($_SESSION['cart'][$id]);
			}
			//Bước 3: Kiểm tra xem biến SESSION['cart'] có rỗng không
			if (empty($_SESSION['cart'])) {
				//Nếu rỗng thì xóa luôn
				unset($_SESSION['cart']);
			}
			//Bước 4: Trở về trang giỏ hàng
			header('location: ?controller=giohang');
			break;


		//Nếu người $method = next thì thực hiện tăng số lượng sản phẩm tương ứng
		case 'next':
			//Bước 1: Tăng số lượng của sản phẩm đi 1
			$_SESSION['cart'][$id]['sl']+=1;
			//Bước 2: Trở về trang giỏ hàng
			header('location: ?controller=giohang');
			break;

		//Nếu người $method = del thì thực hiện xóa luôn sản phẩm đó trong giỏ hàng
		case 'del':
			//Bước 1: Xóa sản phẩm đó trong giỏ hàng đi
			unset($_SESSION['cart'][$id]);
			//Bước 2: Kiểm tra xem biến SESSION['cart'] có rỗng không
			if (empty($_SESSION['cart'])) {
				//Nếu rỗng thì xóa luôn
				unset($_SESSION['cart']);
			}
			//Bước 3: Trở về trang giỏ hàng
			header('location: ?controller=giohang');
			break;
		//Nếu người dùng cố tình làm sai method thì sẽ cho người dùng về trang chủ
		default:
			header('location: ?controller=trangchu');
			break;
	}
?>