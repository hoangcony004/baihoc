<?php 
	//Kiểm tra người dùng có ấn nút xác nhận thanh toán không
	if (isset($_POST['btn_xacnhan'])) {
		/*
		//Lấy thông tin người dùng nhập ở form
		$full_name = $_POST['full_name'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		//Lấy giá trị cho oder_id
		$oder_id = 1;
		//Bước 1: Lấy dữ liệu từ bảng oder ra trước
		$data_oder = $db->get('oder',array());
		//Bước 2 :Lặp dữ liệu từ bảng oder để có 1 id ko trùng lặp
		foreach ($data_oder as $key => $value) {
			$oder_id +=$value['id'];
		}

		//Thêm dữ liệu vào bảng oder_detail
		foreach ($_SESSION['cart'] as $key => $value) {
			$db->insert('oder_detail',array(
				'oder_id'=>$oder_id,
				'product_id'=>$value['id'],
				'qty'=>$value['sl'],
				'price'=>$value['price'],
				'amount'=>$value['sl']*$value['price']
			));
		}

		//Thêm dữ liệu vào bảng oder
		//Bước 1:Lấy dữ liệu của các bảng oder_detail theo oder_id vừa tạo
		$data_oder_detail = $db->get('oder_detail',array('oder_id'=>$oder_id));
		//Bước 2: Tính tổng tiền
		$amount = 0;
		foreach ($data_oder_detail as $key => $value) {
			$amount += $value['amount'];
		}
		//Bước 3: Thêm dữ liệu vào bảng oder
		$db->insert('oder',array(
			'id'=>$oder_id,
			'full_name'=>$full_name,
			'address'=>$address,
			'phone'=>$phone,
			'email'=>$email,
			'amount'=>$amount,
			'status'=>0
		));

		//Gửi email cho người dùng
		//Chuẩn bị cấu trúc thư gửi cho người mua
		//Bước 1: chuẩn bị phần thông tin người nhận
		$content= '<p>Người nhận :'.$full_name.'</p>';
		$content.= '<p>Số điện thoại :'.$phone.'</p>';
		$content.= '<p>Địa chỉ người nhận :'.$address.'</p>';
		$content.= '<p>Tổng tiền :'.number_format($amount).'đ</p>';
		$content.= '<table class="mt-3 p-0 table table-borderless">
					<thead>
						<tr>	
							<th>Sản phẩm</th>
							<th>Hình ảnh</th>
							<th>Đơn giá</th>
							<th>Số lượng</th>
							<th>Thành tiền</th>
					   	</tr>	
					</thead>';
		//Bước 2: Lặp các sản phẩm người dùng mua ra
		foreach ($_SESSION['cart'] as $key => $value) {
			$content.= '<tr>
							<td>'.$value['name'].'</td>
							<td><img id="anh-cart" src="'.$value['img_link'].'"></td>
							<td>'.number_format($value['price']).'đ</td>
							<td >'.$value['sl'].'</td>
							<td>'.number_format($value['price']*$value['sl']).'đ</td></tr>';
		}
		//Bước 3:đóng thẻ table
		$content.='</tbody>
		</table>';
*/
		//Bắt đầu gửi thư cho người mua
		try{
			$email = $_POST['email'];
			$full_name = $_POST['full_name'];
			    //Server settings
			    $mail->SMTPDebug = 0;
			    $mail->CharSet = 'UTF-8';                   // Enable verbose debug output
			    $mail->isSMTP();                                            // Send using SMTP
			    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			    $mail->Username   = 'abccbaabcr@gmail.com';                     // SMTP username
			    $mail->Password   = '1a2b3c4d@';                               // SMTP password
			    $mail->SMTPSecure = 'tls';  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			    $mail->Port       = 587; 

			    $mail->setFrom('petcare@xxx.com', 'TestShop');
    			$mail->addAddress($email,$full_name);// TCP port to connect to, use 465 for 
			    // Content
			    $mail->isHTML(true);   // Set email format to HTML
			    $mail->Subject = 'Cám ơn bạn đã mua hàng của chúng tôi';
			    $mail->Body    = 'Content email la o day';

			    $mail->send();
			    unset($_SESSION['cart']);
			    header('location: ?controller=trangchu');
			}catch (Exception $e) {
			}
	
	}
	require_once('./view/V_thanh_toan.php');
?>