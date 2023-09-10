<?php 
	//Kiểm tra xem người dùng đã đăng nhập chưua
	if (isset($_SESSION['ss_admin_nhanvien'])) {
	 	//Nếu đã đăng nhập thì lấy thông tin người dùng theo ss
	 	$user = $db->get('admin_nhanvien',array('id'=>$_SESSION['ss_admin_nhanvien']));
	 	//Kiểm tra có phải là admin không
	 	if ($user[0]['lv']==1) {
	 		//Kiểm tra người dùng muốn làm gì
	 		switch ($_GET['method']) {
	 			case 'edit':
	 				//Lấy id ở url
	 				$id = $_GET['id'];
	 				//Lấy dữ liệu người dùng theo id
	 				$data_product = $db->get('product',array('id'=>$id));
	 				//Lấy dữ liệu tên danh mục của người sản phẩm đó
	 				$product_catalog = $db->get('catalog',array('id'=>$data_product[0]['catalog_id']));
	 				//Lấy dữ liệu tất cả danh mục trong cơ sở dữ liệu
	 				$data_catalog = $db->get('catalog',array());
	 				//Kiểm tra người dùng ấn nút xác nhận sửa hay chưa
	 				if (isset($_POST['btn_create'])) {
	 					//Lấy dữ liệu từ ô người dùng nhập
	 					$name = $_POST['name'];
			 			$price = $_POST['price'];
			 			$amount = $_POST['amount'];
			 			$content = $_POST['content'];
			 			$catalog = $_POST['catalog'];
			 			$img_link=$_FILES['img_link'];
			 			//Tạo 1 biến lỗi
			 			$error = array();
			 			//Kiểm tra tên sản phẩm
			 			if ($data_product[0]['name']!=$name) {
			 				if ($name=='') {
								$error['name']="Tên sản phẩm không được để trống";
							}else{
								$db->update('product',array(
									'name'=>$name
								),array('id'=>$id));
							}
			 			}
			 			//Kiểm tra Giá sản phẩm
			 			if ($data_product[0]['price']!=$price) {
			 				if ($price=='') {
								$error['price']="Đơn giá không được để trống";
							}else{
								$db->update('product',array(
									'price'=>$price
								),array('id'=>$id));
							}
			 			}
			 			//Kiểm tra số lượng sản phẩm
			 			if ($data_product[0]['amount']!=$amount) {
			 				if ($amount=='') {
								$error['amount']="Số lượng không được để trống";
							}else{
								$db->update('product',array(
									'amount'=>$amount
								),array('id'=>$id));
							}
			 			}
			 			//Kiểm tra mô tả sản phẩm
			 			if ($data_product[0]['content']!=$content) {
			 				if ($content=='') {
								$error['content']="Số lượng không được để trống";
							}else{
								$db->update('product',array(
									'content'=>$content
								),array('id'=>$id));
							}
			 			}
			 			//Kiểm tra danh mục sản phẩm
			 			if ($data_product[0]['catalog_id']!=$catalog) {
			 				if ($catalog=='') {
								$error['catalog']="Số lượng không được để trống";
							}else{
								$db->update('product',array(
									'catalog_id'=>$catalog
								),array('id'=>$id));
							}
			 			}
			 			//Kiểm tra ảnh của mô tả của sản phẩm có tồn tại không
			 			if ($img_link['name']!='') {
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
							//Xóa ảnh cũ ở trong thư mục img đi
							unlink($data_product[0]['img_link']);
							//update ảnh vào thư mục img
							move_uploaded_file($img_link['tmp_name'], $target_file);
							//update ảnh vào thư mục
							$db->update('product',array(
									'img_link'=>$target_file
								),array('id'=>$id));
						}
						header('location: ?controller=product');
	 				}
	 				require_once('./view/V_xuli_product.php');
	 				break;
	 			case 'del':
	 				//Lấy id ở url
	 				$id = $_GET['id'];
	 				//Lấy dữ liệu người dùng theo id
	 				$data_product = $db->get('product',array('id'=>$id));
	 				//Xóa ảnh trong thư mục đi
					unlink($data_product[0]['img_link']);
					//xóa trong cơ sở dữ liệu
					$db->delete('product',array('id'=>$id));
					header('location: ?controller=product');
	 				break;
	 			default:
	 				//Nếu không trùng thì cho về trang nhân viên
	 				header('location: ?controller=product');
	 				break;
	 		}
	 	}else{
	 		//Nếu không phải admin thì cho về trang nhan viên
	 		header('location: ?controller=product');
	 	}
	}else{
		//Nếu chưa đăng nhập thì sẽ cho người dùng về trang login
		header('location: ?controller=login');
	} 
?>