	
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
	$common_msg ="";
	 
	 
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ration Card Management System |  All Stocks Reports  </title>

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

    <link rel="stylesheet" type="text/css" href="files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="files/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">

    <link rel="stylesheet" type="text/css" href="files/assets/css/style.css">
		
	<link rel="stylesheet" type="text/css" href="files/assets/css/stylesheet.css">
	
    <link rel="stylesheet" type="text/css" href="files/assets/css/jquery.mCustomScrollbar.css">
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
                                            <h5 class="m-b-10">All Reamaing Stocks Reports</h5>
                                            <p class="text-muted m-b-10">You can view all products stocks reports below..</p>
                                            <ul class="breadcrumb-title b-t-default p-t-10">
                                                <li class="breadcrumb-item">
                                                    <a href="dashboard.php"> <i class="fa fa-home"></i> </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="add-stock-details.php">Add Stocks</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="all-stock-reports.php">Stocks Reports</a>
                                                </li>
                                            </ul>
                                        </div>
										<div class="form-group row">
														<div class="col-md-12"> 
															<div class="common_msg" style="color:red;font-size:17px;margin-left: 340px;">
																<?php
																	echo $common_msg;
																?>
															</div>
														</div>
										</div> 
                                    </div>


                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
												 
                                                <div class="card">
                                                     
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
																				<th style="width=30;text-align:center;" >Sr. No</th>
																				<th style="width=30;text-align:center;" >Product</th>   
																				<th style="width=30;text-align:center;" >Total</th>    
																	</tr>
																	
                                                                </thead>
                                                                <tbody>
																<?php
																	$got_details	=	$db->fetch_sugar_total();
																			if(!empty($got_details))
																			{
																				$counter	=	0;
																				
																				foreach($got_details as $record)
																				{
																					$id						=	$got_details[$counter][0];	
																					$Product				=	$got_details[$counter][1];	
																					$product_per_kg	    	=	$got_details[$counter][2];
																					   
																				?>
                                                                    <tr>
                                                                    	<td style="text-align:center;" ><?php echo $counter + 1 ;?></td>
																		
																		<td style="text-align:center;"><?php echo $Product ;?></td> 
																		
																		<td style="text-align:center;"><?php echo $product_per_kg ;?></td>  	  
																		 
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

    <script src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

    <script src="files/bower_components/modernizr/js/modernizr.js"></script>
    <script src="files/bower_components/modernizr/js/css-scrollbars.js"></script>

    <script src="files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="files/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="files/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="files/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <script src="files/assets/pages/data-table/js/data-table-custom.js"></script>
    <script src="files/assets/js/pcoded.min.js"></script>
    <script src="files/assets/js/navbar-image/vertical-layout.min.js"></script>
    <script src="files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="files/assets/js/script.js"></script>
</body>
 </html>