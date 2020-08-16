 <?php
	require_once("lib/class/functions.php");
	$db = new functions();
	if(!isset($_SESSION['current_admin']))
	{	
		header("Location:index.php");
	}
	$flag4	=	0;
	$flag5	=	0;
	$flag6	=	0;
	   
	
	$Sugar		=	"";
	$BoiledRice	=	"";
	$Wheat		=	"";
	$Dhal		=	"";
	$PalmOil	=	"";
	$Atta		=	"";
	$Kerosene	=	"";
	
	 
	$common_msg1 =	"";
	$common_msg	 =	""; 
	
	$selected_card_no_error	=	"";	
	$selected_card_no 		=   "";
	$select_type_error		=	"";
	
	$select_product_error 	=	"";	
	$selected_name          =   "";
	
	
	$flag					=	0;
	$flag1					=	0;
	$flag2					=	0;
	$flag3					=	0;
	
	/* 
	$stocks_data		=	array();
	$stocks_data		=	$db->fetch_stocks_full_details();
			
	
	$result_id					=	"";
	$result_product 			=	"";
	$result_product_per_kg		=	"";
	$result_total				=	""; 
	$result_date				=	"";
	$result_time				=	"";

	
	if(!empty($stocks_data))
	{	
		 
	$result_id					=	$stocks_data[0];
	$result_product 			=	$stocks_data[1];
	$result_product_per_kg 		=	$stocks_data[2];
	$result_total				=	$stocks_data[3];
	$result_date				=	$stocks_data[4];
	$result_time				=	$stocks_data[5];
	  		
	}
	
	 
	
	$supply_data		=	array();
	$supply_data		=	$db->fetch_all_supply_details();
			
	
	$result_supply_Sugar		=	"";
	$result_supply_BoiledRice 	=	"";
	$result_supply_Wheat        =	"";
	$result_supply_Dhal			=	"";
	$result_supply_PalmOil		=	"";
	$result_supply_Atta			=	"";
	$result_supply_Kerosene 	=	"";
	 
	
	if(!empty($supply_data))
	{	
		 
	$result_supply_Sugar				=	$supply_data[1];
	$result_supply_BoiledRice 			=	$supply_data[2];
	$result_supply_Wheat         		=	$supply_data[3];
	$result_Dhal						=	$supply_data[4];
	$result_supply_PalmOil				=	$supply_data[5];
	$result_supply_Atta					=	$supply_data[6];
	$result_supply_Kerosene 			=	$supply_data[7];
	 		
	}
	
	$result_available_sugar 	= $result_Sugar 	 - $result_supply_Sugar ;
	$result_available_BoiledRice= $result_BoiledRice - $result_supply_BoiledRice;
	$result_available_Wheat		= $result_Wheat		 - $result_supply_Wheat;
	$result_available_Dhal	 	= $result_Dhal		 - $result_supply_Dhal ;
	$result_available_PalmOil	= $result_PalmOil	 - $result_supply_PalmOil;
	$result_available_Atta		= $result_Atta		 - $result_supply_Atta;
	$result_available_Kerosene 	= $result_Kerosene 	 - $result_supply_Kerosene;
	
	*/
	if(isset($_POST['submit_btn']))
	{ 
		
		$selected_card_no	=	$_POST['select_card_no']; 
		
		if($selected_card_no=="Select card number")
		{
			$selected_card_no_error	=	"Please select card number";	
			$flag		=	1;
		}
		
		$select_product	=	$_POST['select_product_name'];  
		
		if($select_product=="Select Product Name")
		{
			$select_product_error	=	"Please select product name";	
			$flag		=	1;
		}
		 	
		$product_per_kg	=	$_POST['product_per_kg'];
		
		 	
		if($flag==0)
		{ 
			$db->set_supply_details($selected_card_no,$select_product,$product_per_kg);	 
			 
			$user_details = $db->get_user_details_by_card_number($selected_card_no);
			
			 
			if(!empty($user_details))
			{	
				 
			$result_id					=	$user_details[0];
			$result_card_no				=	$user_details[1];
			$result_FamilyHead 			=	$user_details[2];
			$result_dob         		=	$user_details[3];
			$result_gender				=	$user_details[4];
			$results_address			=	$user_details[5];
			$results_mobile				=	$user_details[6];
			$results_email				=	$user_details[7];			
			$result_card_color 			=	$user_details[8];
			$result_cylinders	    	=	$user_details[9]; 
			$result_date				=	$user_details[10];
			$result_time				=	$user_details[11];
					
			}
			
			$product_name = $db->get_product_name_by_id($select_product);
			
			
			if($user_details!="")
			{
				$to = "$results_email";
				$subject = "Your Ration Purchased Reports";
				$txt = "Hello $result_FamilyHead \n\n Your Todays sold out Ration Reports Below:\n\n Product:$product_name \n Quantity: $product_per_kg";
				$headers = "From: ration.sessolapur@gmail.com" . "\r\n" .
				"CC: ramwaghmode145@gmail.com";
                
                $retval = mail($to,$subject,$txt,$headers);
				
				if( $retval == true ) 
				{
					$common_msg	=	"User Supply Information Added successfully also sent mail on your email kindly check your mail.";
				}
				else
				{
					$common_msg1	=	"User Supply Information not added something went wrong contact administrator";
				}
			}
			 	
		}
		 
	}
	
	
	
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <title> Admin | Add Supply Details </title>

 

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#" />
    <meta name="keywords" content="#" />
    <meta name="author" content="#" />

    <link rel="icon" href="http://html.codedthemes.com/gradient-able/files/assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="files/assets/icon/themify-icons/themify-icons.css">

    <link rel="stylesheet" type="text/css" href="files/assets/icon/icofont/css/icofont.css">

    <link rel="stylesheet" type="text/css" href="files/assets/icon/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="files/assets/pages/j-pro/css/demo.css">
    <link rel="stylesheet" type="text/css" href="files/assets/pages/j-pro/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="files/assets/pages/j-pro/css/j-pro-modern.css">

    <link rel="stylesheet" type="text/css" href="files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="files/assets/css/jquery.mCustomScrollbar.css">
	<!--Ck Editor -->
	<script src="https://cdn.ckeditor.com/4.7.2/standard/ckeditor.js"></script>    
	
</head>

<body>

    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
				<?php require_once('include/navigation.php'); ?>	
					
				<div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    
					<?php require_once('include/dashboard-left-part.php'); ?>
				
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <div class="main-body">
                                <div class="page-wrapper">
										<h5 class="m-b-10">Available Stocks Reports</h5>
                                        
                                    <div class="page-header card">
										                   
                                        <div class="dt-responsive table-responsive">
															 
															 <table class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        
																				<th style="width=30;text-align:center;" >Sr No</th>   
																				<th style="width=30;text-align:center;" >Product</th> 
																				<th style="width=30;text-align:center;" >Stock</th> 						
																				<th style="width=30;text-align:center;" >Sold Stock</th> 	
																				<th style="width=30;text-align:center;" >Available</th>  										
																	</tr>
																	
                                                                </thead>
                                                                <tbody>
																	<?php
																	$got_details	=	$db->fetch_available_stocks_total();
																			if(!empty($got_details))
																			{
																				$counter	=	0;
																				
																				foreach($got_details as $record)
																				{
																					$got_id					=	$got_details[$counter][0];	
																					$products_name			=	$got_details[$counter][1];	
																					$Stock	    			=	$got_details[$counter][2];
																					$Sold_Stock	    		=	$got_details[$counter][3]; 
																					$Available   			=	$got_details[$counter][4]; 
																			
																					  
																				?>
                                                                    <tr>
																		<td style="text-align:center;"><?php echo $counter + 1 ;?></td>
                                                                    	<td style="text-align:center;"><?php echo $products_name ;?></td> 
																		<td style="text-align:center;"><?php echo $Stock ;?></td> 
																		<td style="text-align:center;"><?php echo $Sold_Stock ;?></td> 
																		<td style="text-align:center;"><?php echo $Available ;?></td>   	  
																		 
																   </tr>
																	   <?php
																		$counter++;
																		}
																		
																	}
																	else
																	{
																?>		<tr>
																			<td colspan="8">No data to list</td>
																		</tr>
																<?php
																	}				
																?>	
                                                                </tbody> 
                                                            </table>
                                                        </div>
									</div>


                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Supply Product </h5>
                                                        <span>Here you can supply the product for ration card users..</span>
                                                    </div>
													<div class="form-group row">
														<div class="col-md-12"> 
															<div class="common_msg" style="color:red;font-size:17px;margin-left: 200px;">
																<?php
																	echo $common_msg1;
																?>
															</div>
														</div>
													</div> 
													<div class="form-group row">
														<div class="col-md-12"> 
															<div class="common_msg" style="color:green;font-size:17px;margin-left: 185px;">
																<?php
																	echo $common_msg;
																?>
															</div>
														</div>
													</div> 
													
													 
                                                    <div class="card-block">
                                                        <div class="j-wrapper j-wrapper-640">
                                                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="j-pro" id="j-pro" enctype="multipart/form-data" >

                                                                <div class="j-content">

                                                                    <div class="j-row">
																		 
																		<div class="j-row">
																		 
																		 <div class="j-span6 j-unit">
                                                                            <div class="j-input">
																			
																				<select name="select_card_no" id="select_card_no" class="login_txt" style="width:250px">
																				<?php
																				if($selected_card_no!="")
																				{		
																					echo $title_number_by_id	=	$db->get_cards_number_by_id($selected_card_no);
																				?>
																					<option value="<?php echo $selected_card_no;?>"><?php echo $title_number_by_id;?></option>
																				<?php
																				}
																				?>
																				<option value="Select card number" selected>Select Card Number</option>	
																				<?php
																				$got_details	=	$db->fetch_cards_details();
																							if(!empty($got_details))
																							{
																								$counter	=	0;
																								
																								foreach($got_details as $record)
																								{
																										$got_id					=	$got_details[$counter][0];	
																										$card_no				=	$got_details[$counter][1];	
																										$FamilyHead	    		=	$got_details[$counter][2];
																										$dob	    			=	$got_details[$counter][3]; 
																										$gender	    			=	$got_details[$counter][4];
																										$address   				=	$got_details[$counter][5]; 
																										$mobile				    =	$got_details[$counter][6];
																										$card_color		    	=	$got_details[$counter][7];
																										$cylinders				=	$got_details[$counter][8];
																										$family_members			=	$got_details[$counter][9];
																										$adults				    =	$got_details[$counter][10];
																										$Childrens		   		=	$got_details[$counter][11]; 
																										$got_date				=	$got_details[$counter][12];
																										$got_time				=	$got_details[$counter][13];
																										  
																								?>
																					<option value="<?php echo $card_no;?>"><?php echo $card_no; ?></option>	
																				<?php
																						$counter++;
																					}
																				}
																				?>								
																			</select>
																				<br/>
																				<span class="error_msgs"><?php echo $selected_card_no_error; ?></span>
																				<br/>
																			</div>
                                                                        </div>
																		<div class="j-span6 j-unit">
                                                                            <div class="j-input">
																			
																			<select name="select_product_name">
																				<?php
																				if($selected_name!="")
																				{		
																					echo $title_name_by_id	=	$db->get_product_name_by_id($selected_name);
																				?>
																					<option value="<?php echo $selected_name;?>"><?php echo $title_name_by_id;?></option>
																				<?php
																				}
																				?>
																				<option value="Select Product Name">Select Product Name</option>	
																				<?php  
																					$get_product_name	=	$db->fetch_product_details();
																					if(!empty($get_product_name))
																					{
																						$counter	=	0;
																						foreach($get_product_name as $record)
																						{
																							$list_id		  		=	$get_product_name[$counter][0];	
																							$list_product_name     	=	$get_product_name[$counter][1]; 
																				?>
																					<option value="<?php echo $list_id;?>"><?php echo $list_product_name; ?></option>	
																				<?php
																						$counter++;
																					}
																				}
																				?>								
																			</select> 
																					<br/>
																					<span class="error_msgs"><?php echo $select_product_error; ?></span>
																					 
																			</div> 
																		 </div>
																		 
																		</div> 
																		<div class="j-unit">
																			<div class="j-input">
																				<input type="text" name="product_per_kg" placeholder="Enter Product kg value?" required >
																				<span class="j-tooltip j-tooltip-right-top">Product per Kg value</span>
																			</div>
																		</div> 
																		
                                                                    </div>
 
																	<div class="j-response"></div>

                                                                </div>

                                                                <div class="j-footer"> 
																	<input type="submit" value="Submit" name="submit_btn" class="btn btn-primary" />		
                                                                    <button type="reset" class="btn btn-default m-r-20"><a href="add-supply-details.php">Refresh</button>
                                                                </div>

                                                            </form>
                                                        </div> 
                                                    </div>  
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
 
                        </div>
                    </div>
                </div>
			</div>
            </div>
        </div>
    </div>
   

    <script src="files/bower_components/jquery/js/jquery.min.js"></script>
    <script src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script src="files/bower_components/popper.js/js/popper.min.js"></script>
    <script src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>

    <script src="files/assets/pages/j-pro/js/jquery.ui.min.js"></script>
    <script src="files/assets/pages/j-pro/js/jquery.maskedinput.min.js"></script>
    <script src="files/assets/pages/j-pro/js/jquery.j-pro.js"></script>

    <script src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

    <script src="files/bower_components/modernizr/js/modernizr.js"></script>
    <script src="files/bower_components/modernizr/js/css-scrollbars.js"></script>

    <!--<script src="files/assets/pages/j-pro/js/custom/form-job.js"></script> -->
    <script src="files/assets/js/pcoded.min.js"></script>
    <script src="files/assets/js/navbar-image/vertical-layout.min.js"></script>
    <script src="files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="files/assets/js/script.js"></script>
	
	<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'decription' ); 
	</script> 
	
</body>
</html>