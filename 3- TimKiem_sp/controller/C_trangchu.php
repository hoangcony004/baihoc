<?php 
	//Kiểm tra xem có tồn tại keyword trên thanh url không
	if (isset($_GET['keyword'])) {
		$keyword = $_GET['keyword'];
		//Nếu có tồn tại thì mình sẽ lấy dữ liệu theo tên người dùng tìm kiếm
		$product = $db->get_like('product','name',$keyword);
	}else{
		//Nếu không tồn tại thì sẽ lấy tất cả dữ liệu trong bảng product
		$product = $db->get('product',array());
	}
	require_once('./view/V_trangchu.php');
?>