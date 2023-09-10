<?php 
	//Load những file cần thiết để chạy vào
	include "./PHPMailer/src/PHPMailer.php";
	include "./PHPMailer/src/Exception.php";
	include "./PHPMailer/src/OAuth.php";
	include "./PHPMailer/src/POP3.php";
	include "./PHPMailer/src/SMTP.php";
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception; 
	$mail = new PHPMailer(true);
	//Chạy hàm session_start để dùng với SESSION
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
		//nếu không thì mặc định là trang chủ
		$controller = 'trangchu';
	}
	//Kiểm tra biến $controller bằng gì để require file tương ứng
	switch ($controller) {
		case 'trangchu':
			require_once('./controller/C_trangchu.php');
			break;
		case 'giohang':
			require_once('./controller/C_giohang.php');
			break;
		case 'add_giohang':
			require_once('./controller/C_add_giohang.php');
			break;
		case 'xuli_cart':
			require_once('./controller/C_xuli_cart.php');
			break;
		case 'thanh_toan':
			require_once('./controller/C_thanh_toan.php');
			break;
		default:
			echo "lỗi trang";
			break;
	}
?>