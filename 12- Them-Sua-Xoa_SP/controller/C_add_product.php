<?php 
	//Kiểm tra xem người dùng đã đăng nhập chưua
	if (isset($_SESSION['ss_admin_nhanvien'])) {
	 	//Nếu đã đăng nhập thì lấy thông tin người dùng theo ss
	 	$user = $db->get('admin_nhanvien',array('id'=>$_SESSION['ss_admin_nhanvien']));
	 	//Kiểm tra có phải là admin không
	 	if ($user[0]['lv']==1) {
	 		//lấy dữ liệu danh mục có trong cơ sở dữ liệu
	 		$data_catalog = $db->get('catalog',array());
	 		//Kiểm tra người dùng có ấn nút xác nhận không
	 		if (isset($_POST['btn_create'])) {
	 			//Lấy dữ liệu người dùng nhập vào
	 			$name = $_POST['name'];
	 			$price = $_POST['price'];
	 			$amount = $_POST['amount'];
	 			$content = $_POST['content'];
	 			$catalog = $_POST['catalog'];
	 			$img_link=$_FILES['img_link'];
	 			//Kiểm tra dữ liệu người dùng nhập
				//Bước 1: Tạo 1 biến lỗi cho nó là mảng
				$error= array();
				//Bước 2: Kiểm tra xem tên sản phẩm có trống không
				if ($name=='') {
					$error['name']="Tên sản phẩm không được để trống";
				}
				//Bước 3: Kiểm tra đơn giá sản phẩm có trống không
				if ($price=='') {
					$error['price']="Giá sản phẩm không được để trống";
				}
				//Bước 4: Kiểm tra xem số lượng có trống không
				if ($amount=='') {
					$error['amount']="Số lượng không được để trống";
				}
				//Bước 5: Kiểm tra xem mô tả ngắn có trống không
				if ($content=='') {
					$error['content']="Mô tả ngắn không được để trống";
				}
				//Kiểm tra file update file
				//Bước 1 : Tạo đường dẫn upload lên hệ thống
				$link= '../img/';
				$target_file= $link.basename($img_link['name']);
				//bước 2 : kiểm tra điều kiện upload
				//2.1: kích thước
				if ($img_link['size'] > 5242880) {
					$error['img_link']="Chỉ được upload file dưới 5md";
				}
				//2.2: kiểu file
				$file_type= pathinfo($img_link['name'], PATHINFO_EXTENSION);
				$file_type_allow=array('png','jpg','jpeg','gif');
				if (!in_array(strtolower($file_type), $file_type_allow)) {
						$error['img_link']="Chỉ cho upload img_link ảnh";
				}
				//2.3: kiểm tra tồn tại, nếu tồn tại thì thêm 1 số đằng sau
				$num =1;
				$target_file= substr($target_file, 0, strrpos($target_file, "."));
				while (file_exists($target_file.".".$file_type)) {
					$target_file=$target_file.$num;
					$num++;	
				}
				$target_file.=".".$file_type;
				//Kiểm tra xem còn lỗi không
				if (!$error) {
					//update ảnh vào thư mục img
					move_uploaded_file($img_link['tmp_name'], $target_file);
					//insert vào cơ sở dữ liệu thông tin người dùng nhập
					$db->insert('product',array(
						'catalog_id'=>$catalog,
						'name'=>$name,
						'price'=>$price,
						'amount'=>$amount,
						'img_link'=>$target_file,
						'content'=>$content
					));
					//Chuyển về trang sản phẩm
					header('location: ?controller=product');	
				}
	 		}
	 	}else{
	 		//Nếu không phải admin thì cho về trang nhan viên
	 		header('location: ?controller=product');
	 	}
	}else{
		//Nếu chưa đăng nhập thì sẽ cho người dùng về trang login
		header('location: ?controller=login');
	} 
	require_once('./view/V_add_product.php');
?>