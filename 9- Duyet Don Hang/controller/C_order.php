<?php 
	//Kiểm tra xem người dùng đã đăng nhập chưua
	if (isset($_SESSION['ss_admin_nhanvien'])) {
	 	//Nếu đã đăng nhập thì lấy thông tin người dùng theo ss
	 	$user = $db->get('admin_nhanvien',array('id'=>$_SESSION['ss_admin_nhanvien']));
	 	//Lấy dữ liệu order chưa duyệt
	 	$data_order_not_done = $db->get('oder',array('status'=>0));
	 	//Lấy dữ liệu order đã duyệt
	 	$data_order_done = $db->get('oder',array('status'=>1));
	}else{
		//Nếu chưa đăng nhập thì sẽ cho người dùng về trang login
		header('location: ?controller=login');
	} 
	require_once('./view/V_order.php');
?>