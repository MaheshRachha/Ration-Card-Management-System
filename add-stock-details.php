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
	
	$select_product_error 	=	"";	
	$selected_name          =   "";
	$image_error			=	"";
	$flag					=	0;
	$flag1					=	0;
	$flag2					=	0;
	$flag3					=	0;
	 
	
	if(isset($_POST['submit_btn']))
	{
		  	 
		$select_product	=	$_POST['select_product_name'];  
		
		if($select_product=="Select Product name")
		{
			$select_product_error	=	"Please select product name";	
			$flag		=	1;
		}
		 	
		$product_per_kg	=	$_POST['product_per_kg'];
		 	
			 
		if($flag==0)
		{ 
			$db->update_stocks_details($select_product,$product_per_kg);	
			$common_msg	=	"Stocks Record Updated successfully.";
		}
		
	}
	
	
	
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <title> Admin | Update Stocks Details </title>

 

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
								
									<h5 class="m-b-10">Stocks Reports</h5>
                                       
                                    <div class="page-header card">
                                        <div class="dt-responsive table-responsive">
															 
															 <table class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        
																				<th style="width=30;text-align:center;" >Sr No</th>   
																				<th style="width=30;text-align:center;" >Product</th>   	
																				<th style="width=30;text-align:center;" >Quantity</th>  										
																	</tr>
																	
                                                                </thead>
                                                                <tbody>
																	<?php
																	$got_details	=	$db->fetch_stocks_details();
																			if(!empty($got_details))
																			{
																				$counter	=	0;
																				
																				foreach($got_details as $record)
																				{
																					$got_id					=	$got_details[$counter][0];	
																					$Product_name			=	$got_details[$counter][1];	
																					$Available   			=	$got_details[$counter][2]; 
																			
																					  
																				?>
                                                                    <tr>
																		<td style="text-align:center;"><?php echo $counter + 1 ;?></td>
                                                                    	<td style="text-align:center;"><?php echo $Product_name ;?></td>  
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
                                                        <h5>Upadte Stocks Information</h5>
                                                        <span>Please fill the Stocks details..</span>
                                                    </div>
													<div class="form-group row">
														<div class="col-md-12"> 
															<div class="common_msg" style="color:green;font-size:17px;margin-left: 340px;">
																<?php
																	echo $common_msg1;
																?>
															</div>
														</div>
													</div> 
													<div class="form-group row">
														<div class="col-md-12"> 
															<div class="common_msg" style="color:green;font-size:17px;margin-left: 340px;">
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
																		<div class="j-unit">
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
																				<option value="Select Product name">Select Product name</option>	
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
																		 
																		<div class="j-unit">
																			<div class="j-input">
																				<input type="text" name="product_per_kg" placeholder="Enter Product kg value?" required >
																				<span class="j-tooltip j-tooltip-right-top">Product per Kg value</span>
																			</div>
																		</div> 
                                                                        
																	
																	<div class="j-response"></div>

                                                                </div>

                                                                <div class="j-footer"> 
																	<input type="submit" value="Submit" name="submit_btn" class="btn btn-primary" />		
																	<button type="reset" class="btn btn-default m-r-20"><a href="add-stock-details.php">Refresh</a></button>
                                                                
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