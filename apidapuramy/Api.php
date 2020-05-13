<?php 

	require_once 'DbConnect.php';
	define('UPLOAD_PATH', 'uploads/');
	define('TRANSFER_PATH', 'transfer/');
	$response = array();
	
	if(isset($_GET['apicall'])){
		
		switch($_GET['apicall']){

			case 'place_transaction':
				
				
				$id_customer = $_POST['id_customer'];
				$price_total= $_POST['price_total'];
				$method=$_POST['method'];
				$status_order=0;
			
				$max ="SELECT MAX(id_order)+1 as id_order FROM transaction";
				$result3 = $conn->query($max);
    			if ($result3->num_rows > 0) {

    			while($row3 = $result3->fetch_assoc()) {                    
    			$id_order=$row3['id_order']; 

    			}
    			} else {
        		echo "mabok";
    			}

				$stmt = $conn->prepare("INSERT INTO transaction (id_order, id_customer, price_total, method,order_date, status_order) values($id_order,?,?,?,CURDATE(),?)");
				$stmt->bind_param("ssss", $id_customer,$price_total, $method,$status_order);
			
							if($stmt->execute()){
								$response['error'] = false; 
								$response['message'] = 'Transaction Place Succsess'; 
							}
			
		break;

			case 'place_order':
				
				$id_product = $_POST['id_product'];
				$qty = $_POST['qty'];
			
				$max ="SELECT MAX(id_order) as id_order FROM transaction";
				$result3 = $conn->query($max);
    			if ($result3->num_rows > 0) {

    			while($row3 = $result3->fetch_assoc()) {                    
    			$id_orderan=$row3['id_order']; 

    			}
    			} else {
        		echo "mabok";
    			}

				$stmt = $conn->prepare("INSERT INTO detail_transaction (id_order, id_product, qty) values($id_orderan,?,?)");
				$stmt->bind_param("ss", $id_product,$qty);
			
							if($stmt->execute()){
								$response['error'] = false; 
								$response['message'] = 'Order Place Succsess'; 
							}
			
		break;
		case 'save_profile':
				
			$id_customer = $_POST['id_customer'];
			$name = $_POST['name'];
			$address = $_POST['address'];
			$stmt = $conn->prepare("UPDATE customer set name=?, address=? WHERE id_customer=?");
			$stmt->bind_param("sss", $name,$address,$id_customer);
		
						if($stmt->execute()){
							$response['error'] = false; 
							$response['message'] = 'Succsess'; 
						}
		
	break;
	case 'get_transfer_list':
		$id_customer = $_POST['id'];
		$stmt = $conn->prepare("SELECT id_customer, id_order, price_total, img  FROM transaction WHERE id_customer=? AND method='TRANSFER'");
		$stmt->bind_param("s", $id_customer);
		$stmt->execute();
		$stmt->bind_result($id_customer, $id_order,$price_total, $img);
		$drink= array(); 
		
		while($stmt->fetch()){
			$sales  = array();
			$sales['id_customer'] = $id_customer;
			$sales['id_order']= $id_order;
			$sales['price_total']=$price_total;
			$sales['img']=$img;

			array_push($drink, $sales); 
		}
		
				
				$stmt->close();
				$response['data']= $drink; 
break;
case 'upload_transfer':

	$id_order= $_POST['id_order']; 
	move_uploaded_file($_FILES['pic']['tmp_name'], TRANSFER_PATH . $_FILES['pic']['name']);
	$stmt = $conn->prepare("UPDATE transaction set img=? where id_order=?");
	$stmt->bind_param("ss", $_FILES['pic']['name'],$id_order);

	if($stmt->execute()){
		$response['error'] = false; 
		$response['message'] = 'Succsess'; 
	}
	else{
		throw new Exception("Could not upload file");
	}

break;
	case 'get_your_order':
			$id_customer = $_POST['id'];
			$stmt = $conn->prepare("SELECT id_customer, id_order, method, order_date, price_total, status_order  FROM transaction WHERE id_customer=?");
			$stmt->bind_param("s", $id_customer);
			$stmt->execute();
			$stmt->bind_result($id_customer, $id_order, $method,$order_date,$price_total, $status_order);
			$drink= array(); 
			
			while($stmt->fetch()){
				$sales  = array();
				$sales['id_customer'] = $id_customer;
				$sales['id_order']= $id_order;
				$sales['method']=$method;
				$sales['order_date']=$order_date; 
				$sales['price_total']=$price_total; 
				$sales['status_order']=$status_order; 
				array_push($drink, $sales); 
			}
			
					
					$stmt->close();
					$response['data']= $drink; 
			
					
		
	break;
	case 'refresh_profile':
		$id_customer = $_POST['id'];
		$stmt = $conn->prepare("SELECT id_customer, name, phone_number, address, status from customer WHERE id_customer=?");
		$stmt->bind_param("s", $id_customer);
		$stmt->execute();
		$stmt->bind_result($id_customer, $name, $phone_number,$address,$status);
		$stmt->fetch();

		$user = array(
		'id_customer'=>$id_customer, 
		'name'=>$name,
		'phone_number'=>$phone_number,
		'address'=>$address,
		'status'=>$status
		);
						
		$response['error'] = false; 
		$response['message'] = 'Login successfull'; 
		$response['user'] = $user; 
		
				
				$stmt->close();
		
		
				
	
break;
	case 'get_profile':
		$id_customer = $_POST['id'];
		$stmt = $conn->prepare("SELECT id_customer,name, phone_number,address from customer where id_customer=?");
		$stmt->bind_param("s", $id_customer);
		$stmt->execute();
		$stmt->bind_result($id_customer, $name, $phone_number, $address);
		$drink= array(); 
		
		while($stmt->fetch()){
			$sales  = array();
			$sales['id_customer'] = $id_customer;
			$sales['name']= $name;
			$sales['phone_number']=$phone_number;
			$sales['address']=$address; 
			array_push($drink, $sales); 
		}
		
				
				$stmt->close();
				$response['data']= $drink; 
		
				
	
break;
	case 'cek_vote':
		$id_customer = $_POST['id'];
		$stmt = $conn->prepare("SELECT * FROM vote WHERE id_customer=? AND tgl=CURDATE()");
		$stmt->bind_param("s", $id_customer);
		$stmt->execute();
		$stmt->store_result();
		
		if($stmt->num_rows > 0){
			$response['error'] = true;
			$response['message'] = 'You Have Been Vooted';
			$stmt->close();
		}else{
			$response['error'] = false;
			$response['message'] = 'You Can Vote';
			$stmt->close();
		}	
	
break;
case 'cek_notif':
	$id_customer = $_POST['id'];
	$stmt = $conn->prepare("SELECT * FROM notification WHERE id_customer=? ");
	$stmt->bind_param("s", $id_customer);
	$stmt->execute();
	$stmt->store_result();
	
	if($stmt->num_rows > 0){
		$response['error'] = false;
		$response['message'] = 'No notif';
		$stmt->close();
	}else{
		$response['error'] = true;
		$response['message'] = 'You Can See';
		$stmt->close();
	}	

break;
	case 'get_detail_transaction':
		$id_order = $_POST['id_order'];
		$stmt = $conn->prepare("SELECT detail_transaction.id_product, product.product_name, product.price,product.picture, detail_transaction.qty
		FROM detail_transaction 
		INNER JOIN product ON detail_transaction.id_product = product.id_product WHERE id_order=?");
		$stmt->bind_param("s", $id_order);
		$stmt->execute();
		$stmt->bind_result($id_product, $product_name, $price,$picture,$qty);
		$drink= array(); 
		
		while($stmt->fetch()){
			$sales  = array();
			$sales['id_product'] = $id_product;
			$sales['product_name']= $product_name;
			$sales['price']=$price;
			$sales['picture']=$picture; 
			$sales['qty']=$qty; 
			array_push($drink, $sales); 
		}
		
				
				$stmt->close();
				$response['data']= $drink; 
		
				
	
break;
case 'get_notification':
	$id_user = $_POST['id_user'];
	$stmt = $conn->prepare("SELECT id_notification, message, id_customer, tanggal, id_order from notification where id_customer=? ");
	$stmt->bind_param("s", $id_user);
	$stmt->execute();
	$stmt->bind_result($id_notification, $message, $id_customer, $tanggal, $id_order);
	$drink= array(); 
	
	while($stmt->fetch()){
		$sales  = array();
		$sales['id_notification'] = $id_notification;
		$sales['message']= $message;
		$sales['id_customer']=$id_customer;
		$sales['tanggal']=$tanggal; 
		$sales['id_order']=$id_order; 
		array_push($drink, $sales); 
	}
	
			
			$stmt->close();
			$response['data']= $drink; 
	
			

break;
		case 'vote_now':
				
			$id_product = $_POST['id_product'];
			$id_customer = $_POST['id_customer'];
		

			$stmt = $conn->prepare("INSERT INTO vote (id_product, id_customer, tgl) values(?,?,CURDATE())");
			$stmt->bind_param("ss", $id_product,$id_customer);
		
						if($stmt->execute()){
							$response['error'] = false; 
							$response['message'] = 'Vote Succsess'; 
						}
		
	break;
	case 'send_token':
				
		$token_fcm = $_POST['token_fcm'];
		$id_customer = $_POST['id_customer'];
	

		$stmt = $conn->prepare("UPDATE customer set token_fcm=? where id_customer=?");
		$stmt->bind_param("ss", $token_fcm,$id_customer);
	
					if($stmt->execute()){
						$response['error'] = false; 
						$response['message'] = 'Token Updated'; 
					}
	
break;
			case 'get_banner':
				
				
					$stmt = $conn->prepare("SELECT id, image_url FROM banner");
					$stmt->execute();
					$stmt->store_result();
					$stmt->bind_result($id,$image_url);
					$bobot= array(); 
					
					while($stmt->fetch()){
						$sales  = array();
						$sales['id'] = $id;
						$sales['image_url']=$image_url; 
						array_push($bobot, $sales); 
					}
					
							
							$stmt->close();
							$response= $bobot; 
					
				
			break; 

			case 'get_ready_product':
				
				
				$stmt = $conn->prepare("SELECT id_product, product_name, description, stock, price, picture from product where status=1 and category='FOOD'");
				$stmt->execute();
				$stmt->store_result();
				$stmt->bind_result($id_product, $product_name, $description, $stock, $price, $picture);
				$product= array(); 
				
				while($stmt->fetch()){
					$sales  = array();
					$sales['id_product'] = $id_product;
					$sales['product_name']= $product_name;
					$sales['description']=$description;
					$sales['stock']=$stock; 
					$sales['price']=$price; 
					$sales['picture']=$picture; 
					array_push($product, $sales); 
				}
				
						
						$stmt->close();
						$response['data']= $product; 
				
			
		break; 

		case 'get_ready_all':
				
				
			$stmt = $conn->prepare("SELECT id_product, product_name, description, stock, price, picture from product where status=1");
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($id_product, $product_name, $description, $stock, $price, $picture);
			$product= array(); 
			
			while($stmt->fetch()){
				$sales  = array();
				$sales['id_product'] = $id_product;
				$sales['product_name']= $product_name;
				$sales['description']=$description;
				$sales['stock']=$stock; 
				$sales['price']=$price; 
				$sales['picture']=$picture; 
				array_push($product, $sales); 
			}
			
					
					$stmt->close();
					$response['data']= $product; 
			
		
	break; 
	case 'get_for_vote':
				
				
		$stmt = $conn->prepare("SELECT id_product, product_name, description, stock, price, picture from product");
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($id_product, $product_name, $description, $stock, $price, $picture);
		$product= array(); 
		
		while($stmt->fetch()){
			$sales  = array();
			$sales['id_product'] = $id_product;
			$sales['product_name']= $product_name;
			$sales['description']=$description;
			$sales['stock']=$stock; 
			$sales['price']=$price; 
			$sales['picture']=$picture; 
			array_push($product, $sales); 
		}
		
				
				$stmt->close();
				$response['data']= $product; 
		
	
break; 

		case 'get_ready_drink':
				
				
			$stmt = $conn->prepare("SELECT id_product, product_name, description, stock, price, picture from product where status=1 and category='DRINK'");
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($id_product, $product_name, $description, $stock, $price, $picture);
			$drink= array(); 
			
			while($stmt->fetch()){
				$sales  = array();
				$sales['id_product'] = $id_product;
				$sales['product_name']= $product_name;
				$sales['description']=$description;
				$sales['stock']=$stock; 
				$sales['price']=$price; 
				$sales['picture']=$picture; 
				array_push($drink, $sales); 
			}
			
					
					$stmt->close();
					$response['data']= $drink; 
			
		
	break;
	 
	case 'signup':
				
		if(isset($_FILES['pic']['name']) && isset($_POST['names'])){
			$phone_number = $_POST['phone_number']; 
			$password = md5($_POST['password']);
			try{
				


				$stmt = $conn->prepare("SELECT id_customer FROM customer WHERE phone_number = ?");
				$stmt->bind_param("s", $phone_number);
				$stmt->execute();
				$stmt->store_result();
				
				if($stmt->num_rows > 0){
					$response['error'] = true;
					$response['message'] = 'User with same phone number already registered';
					$stmt->close();
				}else{
					move_uploaded_file($_FILES['pic']['tmp_name'], UPLOAD_PATH . $_FILES['pic']['name']);
					$stmt = $conn->prepare("INSERT INTO customer (card_identity, name, phone_number, password, address) VALUES (?,?,?,?,?)");
					$stmt->bind_param("sssss", $_FILES['pic']['name'],$_POST['names'],$_POST['phone_number'],$password,$_POST['address'] );

					if($stmt->execute()){
						$stmt = $conn->prepare("SELECT id_customer, name, phone_number, address, status FROM customer WHERE phone_number = ?"); 
						$stmt->bind_param("s",$phone_number);
						$stmt->execute();
						$stmt->bind_result($id_customer, $name, $phone_number, $address,$status);
						$stmt->fetch();
						
						$user = array(
							'id_customer'=>$id_customer, 
							'name'=>$name, 
							'phone_number'=>$phone_number,
							'address'=>$address,
							'status'=>$status
					
						);
						$stmt->close();
						$response['error'] = false; 
						$response['message'] = 'User registered successfully'; 
						$response['user'] = $user; 
					}
					else{
						throw new Exception("Could not upload file");
					}
				}
			}catch(Exception $e){
				$response['error'] = true;
				$response['message'] = 'Could not upload file';
			}
			
		}else{
			$response['error'] = true;
			$response['message'] = "Required params not available";
		}
	
	break;
	
	//in this call we will fetch all the images 
	
	


			case 'login':
				
				if(isTheseParametersAvailable(array('phone_number', 'password'))){
					
					$phone_number = $_POST['phone_number']; 
					$password = md5($_POST['password']); 
					
					$stmt = $conn->prepare("SELECT id_customer, name, phone_number, address,status FROM customer WHERE phone_number = ? AND password = ?");
					$stmt->bind_param("ss",$phone_number, $password);
					
					$stmt->execute();
					
					$stmt->store_result();
					
					if($stmt->num_rows > 0){
						
						$stmt->bind_result($id_customer, $name, $phone_number,$address,$status);
						$stmt->fetch();
						
						$user = array(
							'id_customer'=>$id_customer, 
							'name'=>$name,
							'phone_number'=>$phone_number,
							'address'=>$address,
							'status'=>$status
						);
						
						$response['error'] = false; 
						$response['message'] = 'Login successfull'; 
						$response['user'] = $user; 

					}else{
						$response['error'] = true; 
						$response['message'] = 'Invalid username or password';
					}
				}
			break;
			
			default: 
				$response['error'] = true; 
				$response['message'] = 'Invalid Operation Called';
		}
		
	}else{
		$response['error'] = true; 
		$response['message'] = 'Invalid API Call';
	}
	
	echo json_encode($response);
	
	function isTheseParametersAvailable($params){
		
		foreach($params as $param){
			if(!isset($_POST[$param])){
				return false; 
			}
		}
		return true; 
	}