<?php 
	//Lấy dữ liệu ở trong bảng product
	$product = $db->get('product',array());
	require_once('./view/V_trangchu.php');
?>