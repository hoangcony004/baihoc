<?php 
	//Kiểm tra xem người dùng đã đăng nhập chưua
	if (isset($_SESSION['ss_admin_nhanvien'])) {
	 	//Nếu đã đăng nhập thì lấy thông tin người dùng theo ss
	 	$user = $db->get('admin_nhanvien',array('id'=>$_SESSION['ss_admin_nhanvien']));
	 	//Kiểm tra người dùng có phải admin không
	 	if ($user[0]['lv']==1) {
	 		//Nếu là admin thì lấy id trên url
	 		$id = $_GET['id'];
	 		//Lấy dữ liệu chi tiết order_detail tương ứng
	 		$data_order_detail = $db->get('oder_detail',array('oder_id'=>$id));
	 		//Trừ sản phẩm tương ứng ở trong bảng product đi
	 		foreach ($data_order_detail as $key => $value) {
	 			//Bước 1: lấy dữ liệu sản phẩm 
	 			$product = $db->get('product',array('id'=>$value['product_id']));
	 			//Bước 2: sửa dữ liệu số lượng bảng product
	 			$db->update('product',array(
	 				'amount'=>$product[0]['amount']-$value['qty']
	 			),array(
	 				'id'=>$value['product_id']
	 			));
	 		}
	 		//Chuyển trạng thái order là đã duyệt
	 		$db->update('oder',array(
	 				'status'=>1
	 			),array(
	 				'id'=>$id
	 			));
	 		//Chuyển về trang order
	 		header('location: ?controller=order');
	 	}else{
	 		//Nếu không phải admin thì cho người dùng về trang order
	 		header('location: ?controller=order');
	 	}
	}else{
		//Nếu chưa đăng nhập thì sẽ cho người dùng về trang login
		header('location: ?controller=login');
	} 
	require_once('./view/V_order_detail.php');
?>