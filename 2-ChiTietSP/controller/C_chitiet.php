<?php 
	//Lấy id trên thanh url
	$id = $_GET['id'];
	//Lấy dữ liệu theo id tương ứng đã lấy được
	$product = $db->get('product',array('id'=>$id));
	//Lấy dữ liệu catalog của product đó
	$catalog = $db->get('catalog',array('id'=>$product[0]['catalog_id']));
	//lấy dữ liệu những sản phẩm liên quan theo catalog_id của sản phẩm đó chỉ lấy 4 sản phẩm 
	$product_lienquan = $db->get_limit('product',array('catalog_id'=>$product[0]['catalog_id']),4);
	require_once('./view/V_chitiet.php');
?>