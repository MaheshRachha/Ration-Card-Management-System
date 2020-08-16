<?php
	session_start();
	
		class functions
		{
			private $con;
			function __construct()
			{
				$this->con = new mysqli("localhost","root","","ration_card_management_system");
			
			}	
			function new_user($u_fname,$u_lname,$u_about,$u_address,$u_bday,$u_occupation,$u_mobile,$actual_image_name,$u_email)
			{							
					 
					if($stmt_insert = $this->con->prepare("INSERT INTO `admin`(`first_name`, `last_name`, `about_me`, `address`, `birthday`, `occupation`, `mobile`, `image`, `user_id`) VALUES (?,?,?,?,?,?,?,?,?)"))
					{
						
						$stmt_insert->bind_param("sssssssss",$u_fname,$u_lname,$u_about,$u_address,$u_bday,$u_occupation,$u_mobile,$actual_image_name,$u_email);
	 
							if($stmt_insert->execute())
							{
							
								return true;
							}
								return false;
					} 	
			}	 
			
			function get_password_from_admin($name)
			{
				 
				if($stmt_select = $this->con->prepare("Select `password` from `admin` where `user_id` = ?"))
				{ 
					$stmt_select->bind_param("s",$name);
					
					$stmt_select->bind_result($result_password);
					
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
					return false;
				}
			}	
			 
			
		function get_user_data_from_email($login_email)
		{
			if($stmt_select = $this->con->prepare("SELECT `id`, `first_name`, `last_name`, `about_me`, `address`, `birthday`, `occupation`, `mobile`, `image`, `user_id`, `password` FROM `admin` WHERE `user_id` = ?"))
			{
				$stmt_select->bind_param("s",$login_email);
				
				$stmt_select->bind_result($result_id,$result_fname,$result_lname,$result_about,$result_address,$result_bday,$result_occupation,$result_mobile,$result_image,$result_email,$result_password);
				
				if($stmt_select->execute())
				{
					$data_container	=	array();
					
					if($stmt_select->fetch())
					{
						$data_container[0]	=	$result_id;
						$data_container[1]	=	$result_fname;
						$data_container[2]	=	$result_lname;
						$data_container[3]	=	$result_about;
						$data_container[4]	=	$result_address;
						$data_container[5]	=	$result_bday;
						$data_container[6]	=	$result_occupation;
						$data_container[7]	=	$result_mobile;
						$data_container[8]	=	$result_image;
						$data_container[9]	=	$result_email;		 
						$data_container[10]	=	$result_password;		 
						
						return $data_container;
					}
				}
				return false;
			}
		}
		function get_user_password($email_id)
		{
			if($stmt_select = $this->con->prepare("Select `password` from `admin` where `user_id` = ?"))
			{
				$stmt_select->bind_param("s",$email_id);
				
				$stmt_select->bind_result($result_password);
				
				if($stmt_select->execute())
				{
					if($stmt_select->fetch())
					{
						return $result_password;
					}
				}
				return false;
			}		
		}
		function update_user($u_fname,$u_lname,$u_about,$u_address,$u_bday,$u_occupation,$u_mobile,$actual_image_name,$u_email)
		{
			
			if($stmt_update = $this->con->prepare("UPDATE `admin` SET `first_name`=?,`last_name`=?,`about_me`=?,`address`=? ,`birthday`=? ,`occupation`=? ,`mobile`=? ,`image`=?  WHERE `user_id` = ?"))
			{
				$stmt_update->bind_param("sssssssss",$u_fname,$u_lname,$u_about,$u_address,$u_bday,$u_occupation,$u_mobile,$actual_image_name,$u_email);
				
				if($stmt_update->execute())
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		function update_user_password($login_email,$new_pwd)
		{
			if($stmt_update = $this->con->prepare("UPDATE `admin` SET `password`=? WHERE `user_id` = ?"))
		
			$stmt_update->bind_param("ss",$new_pwd,$login_email);
			
			if($stmt_update->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		function set_cards_details($card_no,$FamilyHead,$dob,$gender,$address,$mobile,$email,$card_color,$cylinders)
		{
			$date = date("Y-m-d");
			$time = date("H:i:sa");
			 
			if($stmt_insert = $this->con->prepare("INSERT INTO `user_details`(`Card no`, `FamilyHead`, `DOB`, `Gender`, `Address`, `Mobile`, `Email`, `Card Color`, `Cylinders`,`date`, `time`) VALUES(?,?,?,?,?,?,?,?,?,?,?)"))
			{	
				$stmt_insert->bind_param("sssssssssss",$card_no,$FamilyHead,$dob,$gender,$address,$mobile,$email,$card_color,$cylinders,$date,$time);
				 
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			}
		}
		
		function fetch_cards_details()
		{
			if($stmt_select = $this->con->prepare("SELECT `id`,`Card no`, `FamilyHead`, `DOB`, `Gender`, `Address`, `Mobile`, `Email`,`Card Color`, `Cylinders`, `date`, `time` FROM `user_details` "))
			{
				$stmt_select->bind_result($id,$card_no,$FamilyHead,$dob,$gender,$address,$mobile,$email,$card_color,$cylinders,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					$counter	=	0;
					
					while($stmt_select->fetch())
					{
						$data[$counter][0] = $id;
						$data[$counter][1] = $card_no;
						$data[$counter][2] = $FamilyHead; 
						$data[$counter][3] = $dob; 
						$data[$counter][4] = $gender;
						$data[$counter][5] = $address;						
						$data[$counter][6] = $mobile;
						$data[$counter][7] = $email;
						$data[$counter][8] = $card_color; 
						$data[$counter][9] = $cylinders; 
						$data[$counter][10] = $date;
						$data[$counter][11] = $time;
						
						 	
						$counter++;
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function fetch_cards_all_details()
		{
			if($stmt_select = $this->con->prepare("SELECT `id`,`Card no`, `FamilyHead`, `DOB`, `Gender`, `Address`, `Mobile`,`email`, `Card Color`, `Cylinders`,`date`, `time` FROM `user_details` "))
			{
				$stmt_select->bind_result($id,$card_no,$FamilyHead,$dob,$gender,$address,$mobile,$email,$card_color,$cylinders,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array(); 
					
					while($stmt_select->fetch())
					{
						$data[0] = $id;
						$data[1] = $card_no;
						$data[2] = $FamilyHead; 
						$data[3] = $dob; 
						$data[4] = $gender;
						$data[5] = $address;						
						$data[6] = $mobile;
						$data[7] = $email;
						$data[8] = $card_color; 
						$data[9] = $cylinders;  
						$data[10] = $date;
						$data[11] = $time;
						 
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function fetch_cards_all_details_by_id($cards_id)
		{
			if($stmt_select = $this->con->prepare("SELECT `id`,`Card no`, `FamilyHead`, `DOB`, `Gender`, `Address`, `Mobile`,`Email`, `Card Color`, `Cylinders`,`date`, `time` FROM `user_details` where `id`= ? "))
			{
				$stmt_select->bind_param("i",$cards_id);
				
				$stmt_select->bind_result($id,$card_no,$FamilyHead,$dob,$gender,$address,$mobile,$email,$card_color,$cylinders,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array(); 
					
					while($stmt_select->fetch())
					{
						$data[0] = $id;
						$data[1] = $card_no;
						$data[2] = $FamilyHead; 
						$data[3] = $dob; 
						$data[4] = $gender;
						$data[5] = $address;						
						$data[6] = $mobile;
						$data[7] = $email;
						$data[8] = $card_color; 
						$data[9] = $cylinders;  
						$data[10] = $date;
						$data[11]= $time;
						 
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		
		function get_user_details_by_card_number($selected_card_no)
		{
			if($stmt_select = $this->con->prepare("SELECT `id`,`Card no`, `FamilyHead`, `DOB`, `Gender`, `Address`, `Mobile`, `Email`,`Card Color`, `Cylinders`,`date`, `time` FROM `user_details` where `Card no`= ? "))
			{
				$stmt_select->bind_param("s",$selected_card_no);
				
				$stmt_select->bind_result($id,$card_no,$FamilyHead,$dob,$gender,$address,$mobile,$email,$card_color,$cylinders,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array(); 
					
					while($stmt_select->fetch())
					{
						$data[0] = $id;
						$data[1] = $card_no;
						$data[2] = $FamilyHead; 
						$data[3] = $dob; 
						$data[4] = $gender;
						$data[5] = $address;						
						$data[6] = $mobile;
						$data[7] = $email;
						$data[8] = $card_color; 
						$data[9] = $cylinders;  
						$data[10] = $date;
						$data[11]= $time;
						 
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function update_cards_full_details_by_id($r_no,$FamilyHead,$dob,$gender,$address,$mobile,$email,$card_color,$cylinders,$cards_id)  
		{ 
			 
			if($stmt_update = $this->con->prepare("UPDATE `user_details` SET `Card no`=?, `FamilyHead`=?, `DOB`=?, `Gender`=?, `Address`=?, `Mobile`=?, `Email`=? , `Card Color`=?, `Cylinders`=?  WHERE `id`=?"))
			{  	 
				$stmt_update->bind_param("ssssssssss",$r_no,$FamilyHead,$dob,$gender,$address,$mobile,$email,$card_color,$cylinders,$cards_id);
				 
				if($stmt_update->execute())
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		
		function delete_cards_full_details_by_id($delete_id)
		{
			if($stmt_delete = $this->con->prepare("delete FROM `user_details` where `id` = ?"))
			{
				$stmt_delete->bind_param("i",$delete_id);
				
				if($stmt_delete->execute())
				{
					return false;
				}
			}
		} 
		function get_cards_number_by_id($selected_number)
		{
			if($stmt_select = $this->con->prepare("SELECT `Card no` FROM `user_details` where `Card no`=".$selected_number.""))
			{				
				$stmt_select->bind_result($result_number);
				
				if($stmt_select->execute())
				{
					if($stmt_select->fetch())
					{
						return $result_number;
					}
				}
					return false;
			}
		}
		
		function set_family_details($selected_card_no,$select_type,$name,$age,$gender)
		{
			$date = date("Y-m-d");
			$time = date("H:i:sa"); 
	 
			if($stmt_insert = $this->con->prepare("INSERT INTO `family_members_details`(`Card no`, `Type`, `name`, `age`, `gender` ,`date`, `time`) VALUES(?,?,?,?,?,?,?)"))
			{	
				$stmt_insert->bind_param("sssssss",$selected_card_no,$select_type,$name,$age,$gender,$date,$time);
				 
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			}
		}
		function fetch_family_details()
		{
			if($stmt_select = $this->con->prepare("SELECT `id`,`Card no`, `Type`, `name`, `age`, `gender` ,`date`, `time` FROM `family_members_details` "))
			{
				$stmt_select->bind_result($id,$selected_card_no,$select_type,$name,$age,$gender,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					$counter	=	0;
					
					while($stmt_select->fetch())
					{
						$data[$counter][0] = $id;
						$data[$counter][1] = $selected_card_no;
						$data[$counter][2] = $select_type; 
						$data[$counter][3] = $name; 
						$data[$counter][4] = $age;
						$data[$counter][5] = $gender;		 
						$data[$counter][6] = $date;
						$data[$counter][7] = $time;
						
						 	
						$counter++;
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function delete_family_members_by_id($delete_id)
		{
			if($stmt_delete = $this->con->prepare("delete FROM `family_members_details` where `id` = ?"))
			{
				$stmt_delete->bind_param("i",$delete_id);
				
				if($stmt_delete->execute())
				{
					return false;
				}
			}
		} 
		function fetch_family_members_details_by_id($member_id)
		{
			if($stmt_select = $this->con->prepare("SELECT `id`, `Card no`, `Type`, `name`, `age`, `gender`, `date`, `time` FROM `family_members_details` where `id`= ? "))
			{
				$stmt_select->bind_param("i",$member_id);
				
				$stmt_select->bind_result($id,$selected_card_no,$select_type,$name,$age,$gender,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array(); 
					
					while($stmt_select->fetch())
					{
						$data[0] = $id;
						$data[1] = $selected_card_no;
						$data[2] = $select_type; 
						$data[3] = $name; 
						$data[4] = $age;
						$data[5] = $gender;		 
						$data[6] = $date;
						$data[7]= $time;
						 
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function update_family_members_details_by_id($r_no,$select_type,$name,$age,$gender,$member_id)  
		{ 
			 
			if($stmt_update = $this->con->prepare("UPDATE `family_members_details` SET `Card no`=?, `Type`=?, `name`=?, `age`=?, `gender`=?  WHERE `id`=?"))
			{  	 
				$stmt_update->bind_param("ssssss",$r_no,$select_type,$name,$age,$gender,$member_id);
				 
				if($stmt_update->execute())
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		} 
		
		function fetch_product_details()
		{
			if($stmt_select = $this->con->prepare("SELECT `id`,`Products` FROM `product_details` "))
			{
				$stmt_select->bind_result($id,$Products);
				
				if($stmt_select->execute())
				{	
					$data = array();
					$counter	=	0;
					
					while($stmt_select->fetch())
					{
						$data[$counter][0] = $id;
						$data[$counter][1] = $Products;  
						 	
						$counter++;
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		} 
		function get_product_name_by_id($selected_id)
		{
			if($stmt_select = $this->con->prepare("SELECT `Products` FROM `product_details` where `id`=".$selected_id.""))
			{				
				$stmt_select->bind_result($result_name);
				
				if($stmt_select->execute())
				{
					if($stmt_select->fetch())
					{
						return $result_name;
					}
				}
					return false;
			}
		}
		 
		function set_stocks_details($select_product,$product_per_kg)
		{
			$date = date("Y-m-d");
			$time = date("H:i:sa"); 
	 
			if($stmt_insert = $this->con->prepare("INSERT INTO `stocks_details`(`Product_id`,`product_per_kg` ,`Date`, `Time`) VALUES(?,?,?,?)"))
			{	
				$stmt_insert->bind_param("iiss",$select_product,$product_per_kg,$date,$time);
				 
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			}
		}
		
		function fetch_stocks_details()
		{
			if($stmt_select = $this->con->prepare("SELECT s.id,p.Products,s.product_per_kg As 'Quantity' FROM `product_details` AS p JOIN `stocks_details` AS s ON p.id = s.Product_id GROUP BY `Product_id` "))
			{
				$stmt_select->bind_result($id,$Product_name,$product_per_kg);
				
				if($stmt_select->execute())
				{	
					$data = array();
					$counter	=	0;
					
					while($stmt_select->fetch())
					{
						$data[$counter][0] = $id;
						$data[$counter][1] = $Product_name;
						$data[$counter][2] = $product_per_kg;  
						
						 	
						$counter++;
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		} 
		
		function update_stocks_details($select_product,$product_per_kg)  
		{   
			if($stmt_update = $this->con->prepare("UPDATE `stocks_details` SET `Product_id`=?,`product_per_kg`=? where `Product_id`=".$select_product.""))
			{  	 
				
				$stmt_update->bind_param("si",$select_product,$product_per_kg);
				 
				if($stmt_update->execute())
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		} 
		function fetch_stocks_full_details()
		{
			if($stmt_select = $this->con->prepare("SELECT `id`,`Product`,`product_per_kg`,`Total` ,`Date`, `Time` FROM `stocks_details` "))
			{
				$stmt_select->bind_result($id,$Product,$product_per_kg,$total,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array(); 
					
					while($stmt_select->fetch())
					{
						$data[0] = $id; 
						$data[1] = $Product;
						$data[2] = $product_per_kg; 
						$data[3] = $total; 
						$data[4] = $date;
						$data[5] = $time;		 
						 
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function fetch_all_supply_details()
		{
			if($stmt_select = $this->con->prepare("SELECT  `Sugar`, `BoiledRice`, `Wheat`, `Dhal` ,`PalmOil`,`Atta`,`Kerosene`  FROM `supply_details` "))
			{
				$stmt_select->bind_result($Sugar,$BoiledRice,$Wheat,$Dhal,$PalmOil,$Atta,$Kerosene);
				
				if($stmt_select->execute())
				{	
					$data = array(); 
					
					while($stmt_select->fetch())
					{
						$data[1] = $Sugar;
						$data[2] = $BoiledRice; 
						$data[3] = $Wheat; 
						$data[4] = $Dhal;
						$data[5] = $PalmOil;		 
						$data[6] = $Atta;
						$data[7] = $Kerosene;
						 
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		
		function set_supply_details($selected_card_no,$select_product,$product_per_kg)
		{
			$date = date("Y-m-d");
			$time = date("H:i:sa"); 
	 
			if($stmt_insert = $this->con->prepare("INSERT INTO `sales_details`(`Card_no`, `Product_id`, `Quantity`, `Date`, `Time`) VALUES(?,?,?,?,?)"))
			{	
				$stmt_insert->bind_param("siiss",$selected_card_no,$select_product,$product_per_kg,$date,$time);
				 
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			}
		}
		function fetch_supply_details()
		{
			if($stmt_select = $this->con->prepare("SELECT s.id,s.Card_no,p.Products,s.Quantity,s.Date,s.Time As 'Quantity' FROM `product_details` AS p JOIN `sales_details` AS s ON p.id = s.Product_id GROUP BY `id` "))
			{
				$stmt_select->bind_result($id,$selected_card_no,$select_product_name,$Quantity,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					$counter	=	0;
					
					while($stmt_select->fetch())
					{
						$data[$counter][0] = $id;
						$data[$counter][1] = $selected_card_no;
						$data[$counter][2] = $select_product_name; 
						$data[$counter][3] = $Quantity;  
						$data[$counter][4] = $date;
						$data[$counter][5] = $time;
						 	
						$counter++;
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function delete_supply_members_by_id($delete_id)
		{
			if($stmt_delete = $this->con->prepare("delete FROM `supply_details` where `id` = ?"))
			{
				$stmt_delete->bind_param("i",$delete_id);
				
				if($stmt_delete->execute())
				{
					return false;
				}
			}
		} 
		function fetch_available_stocks_total()
		{
			if($stmt_select = $this->con->prepare("SELECT d.id,d.Products,s.product_per_kg as 'Stock', SUM(l.`Quantity`) as 'Sold Stock', s.product_per_kg- SUM(l.`Quantity`) as 'Available' FROM product_details d JOIN stocks_details s ON d.id=s.Product_id INNER JOIN sales_details l ON l.Product_id=s.Product_id GROUP BY id"))
			{
				$stmt_select->bind_result($id,$products_name,$Stock,$Sold_Stock,$Available);
				
				if($stmt_select->execute())
				{	
					$data = array(); 
					
					$counter = 0;
					
					while($stmt_select->fetch())
					{
						$data[$counter][0] = $id;  
						$data[$counter][1] = $products_name;  
						$data[$counter][2] = $Stock;  
						$data[$counter][3] = $Sold_Stock; 						
						$data[$counter][4] = $Available;  
						 
						$counter++;
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		
		function fetch_product_name_by_id($Product_id)
		{
			if($stmt_select = $this->con->prepare("SELECT `id`, `Products` FROM `product_details` where `id`= ? "))
			{
				$stmt_select->bind_param("i",$Product_id);
				
				$stmt_select->bind_result($id,$Products);
				
				if($stmt_select->execute())
				{	
					$data = array(); 
					  
					while($stmt_select->fetch())
					{
						$data[0] = $id;
						$data[1] = $Products; 
						
						
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		
		
	}	//class end
	
	?>