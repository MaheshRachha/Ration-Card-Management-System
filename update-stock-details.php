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
	
	$stocks_data		=	array();
	$stocks_data		=	$db->fetch_stocks_full_details();
			
	
	$result_Sugar				=	"";
	$result_BoiledRice 			=	"";
	$result_Wheat         		=	"";
	$result_Dhal				=	"";
	$result_PalmOil				=	"";
	$result_Atta				=	"";
	$result_Kerosene 			=	"";
	 
	
	if(!empty($stocks_data))
	{	
		 
	$result_Sugar				=	$stocks_data[1];
	$result_BoiledRice 			=	$stocks_data[2];
	$result_Wheat         		=	$stocks_data[3];
	$result_Dhal				=	$stocks_data[4];
	$result_PalmOil				=	$stocks_data[5];
	$result_Atta				=	$stocks_data[6];
	$result_Kerosene 			=	$stocks_data[7];
	 		
	}
	
	 
	$common_msg1 =	"";
	$common_msg	 =	""; 
	
	$selected_name_error	=	"";	
	$selected_name          =   "";
	$image_error			=	"";
	$flag					=	0;
	$flag1					=	0;
	$flag2					=	0;
	$flag3					=	0;
	 
	
	if(isset($_POST['submit_btn']))
	{
		$Sugar			=	$_POST['Sugar'];  
		$BoiledRice		=	$_POST['BoiledRice'];  
		$Wheat			=	$_POST['Wheat'];  
		$Dhal			=	$_POST['Dhal'];
		$PalmOil		=	$_POST['PalmOil']; 
		$Atta			=	$_POST['Atta'];		
		$Kerosene		=	$_POST['Kerosene'];
		 	 
		if($flag==0)
		{ 
			$db->update_stocks_details($Sugar,$BoiledRice,$Wheat,$Dhal,$PalmOil,$Atta,$Kerosene);	
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

                                    <div class="page-header card">
                                        <div class="card-block">
                                            <h5 class="m-b-10">Update Stock Entry</h5>
                                            <p class="text-muted m-b-10">You can add Update stocks details..</p>
                                            <ul class="breadcrumb-title b-t-default p-t-10">
                                                <li class="breadcrumb-item">
                                                    <a href="dashboard.php"> <i class="fa fa-home"></i> </a>
                                                </li>
                                                 <li class="breadcrumb-item"><a href="add-cards-details.php">Update stocks Entry</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="cards-reports.php">Stocks Reports</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>


                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Add Stocks Information</h5>
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
																				<input type="text" name="Sugar" placeholder="Sugar" value="<?php echo $result_Sugar; ?>"> 
																				<span class="j-tooltip j-tooltip-right-top">Sugar</span>
																			</div>
																		</div>
																	
																		<div class="j-unit">
																			<div class="j-input">
																				<input type="text" name="BoiledRice" placeholder="BoiledRice" required  value="<?php echo $result_BoiledRice;?>">
																				<span class="j-tooltip j-tooltip-right-top">BoiledRice</span>
																			</div>
																		</div>
																		
																		<div class="j-unit">
																			<div class="j-input">
																				<input type="text" name="Wheat" placeholder="Wheat" required  value="<?php echo $result_Wheat;?>">
																				<span class="j-tooltip j-tooltip-right-top">Wheat</span>
																			</div>
																		</div>
																		
						 												<div class="j-unit">
																			<div class="j-input">
																				<input type="text" name="Dhal" placeholder="Dhal" required  value="<?php echo $result_Dhal;?>">
																				<span class="j-tooltip j-tooltip-right-top">Dhal</span>
																			</div>
																		</div>
																		  
                                                                    </div>

																	<div class="j-row">
																		
																		<div class="j-unit">
																			<div class="j-input">
																				<input type="text" name="PalmOil" placeholder="Palm Oil" required  value="<?php echo $result_PalmOil;?>">
																				<span class="j-tooltip j-tooltip-right-top">Palm Oil</span>
																			</div>
																		</div>   
																		
																		<div class="j-unit">
																			<div class="j-input">
																				<input type="text" name="Atta" placeholder="Atta" required  value="<?php echo $result_Atta;?>">
																				<span class="j-tooltip j-tooltip-right-top">Atta</span>
																			</div>
																		</div> 
																	
																		<div class="j-unit">
																			<div class="j-input">
																				<input type="text" name="Kerosene" placeholder="Kerosene" required  value="<?php echo $result_Kerosene;?>">
																				<span class="j-tooltip j-tooltip-right-top">Kerosene</span>
																			</div>
																		</div> 
                                                                        
																	
																	<div class="j-response"></div>

                                                                </div>

                                                                <div class="j-footer"> 
																	<input type="submit" value="Update" name="submit_btn" class="btn btn-primary" />		
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