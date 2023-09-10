<?php 
	//lấy id trên trang url
	$id = $_GET['id'];
	//Lấy dữ liệu sản phẩm từ bảng product theo id vừa lấy được
	$product = $db->get('product',array('id'=>$id));
	//Bắt đầu xử lí SESSION giỏ hàng
	//Kiểm tra xem SESSION['cart']/giỏ hàng đã tồn tại mặt hàng nào chưa
	if (isset($_SESSION['cart'])) {
		//Nếu đã tồn tại SESSION['cart']/giỏ hàng thì kiểm tra xem sản phẩm đó đã tồn tại trong giỏ hàng chưa
		if (isset($_SESSION['cart'][$id])) {
			//Nếu sản phẩm đó đã tồn tại ở trong giỏ hàng thì chỉ cần cộng thêm số lượng của nó thêm 1 thôi
			$_SESSION['cart'][$id]['sl']+=1;
		}else{
			//Nếu sản phẩm đó chưa tồn tại trong giở hàng thì thêm dữ liệu sản phẩm cẩn thêm vào giỏ hàng
			$_SESSION['cart'][$id]['id']=$product[0]['id'];
			$_SESSION['cart'][$id]['sl']=1;
			$_SESSION['cart'][$id]['price']=$product[0]['price'];
		 	$_SESSION['cart'][$id]['img_link']=$product[0]['img_link'];
			$_SESSION['cart'][$id]['name']=$product[0]['name'];
		}
	}else{
		//Nếu chưa có sản phẩm nào trong SESSION['cart']/giỏ hàng thì tạo tạo luôn SESSION['cart'] và thêm dữ liệu của sản phẩm cần thêm vào giỏ hàng 
		$_SESSION['cart'][$id]['id']=$product[0]['id'];
		$_SESSION['cart'][$id]['sl']=1;
		$_SESSION['cart'][$id]['price']=$product[0]['price'];
	 	$_SESSION['cart'][$id]['img_link']=$product[0]['img_link'];
		$_SESSION['cart'][$id]['name']=$product[0]['name'];
	}
	//Sau khi xử lí trong thì chúng ta sẽ trở về trang chủ
	header('location: ?controller=trangchu');
?>