<?php 
	//require fle database.php vào
	require('./model/database.php');
	//Tạo dối tượng $db
	$db = new database();
	//kiểm tra xem trên đường link có controller= chưa
	if (isset($_GET['controller'])) {
		//Nếu có thì lấy giá trị đó
		$controller = $_GET['controller'];
	}else{
		//nếu không thì mặc định là trang chủ
		$controller = 'trangchu';
	}
	//Kiểm tra biến $controller bằng gì để require file tương ứng
	switch ($controller) {
		case 'trangchu':
			require_once('./controller/C_trangchu.php');
			break;
		default:
			echo "lỗi trang";
			break;
	}
?>