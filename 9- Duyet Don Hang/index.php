<?php 
	//Bắt đầu session
	session_start();
	//require fle database.php vào
	require('./model/database.php');
	//Tạo dối tượng $db
	$db = new database();
	//kiểm tra xem trên đường link có controller= chưa
	if (isset($_GET['controller'])) {
		//Nếu có thì lấy giá trị đó
		$controller = $_GET['controller'];
	}else{
		//nếu không thì mặc định là login
		$controller = 'login';
	}
	//Kiểm tra biến $controller bằng gì để require file tương ứng
	switch ($controller) {
		case 'login':
			require_once('./controller/C_login.php');
			break;
		case 'trangchu':
			require_once('./controller/C_trangchu.php');
			break;
		case 'log_out':
			require_once('./controller/C_log_out.php');
			break;
		case 'order':
			require_once('./controller/C_order.php');
			break;
		case 'order_detail':
			require_once('./controller/C_order_detail.php');
			break;
		case 'xuli_order':
			require_once('./controller/C_xuli_order.php');
			break;
		default:
			echo "lỗi trang";
			break;
	}
?>