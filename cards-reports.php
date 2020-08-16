	
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
	
	if(isset($_GET['del_cards_id']))
	 {
		$delete_id = $_GET['del_cards_id'];		
		
		$db->delete_cards_full_details_by_id($delete_id);
		$common_msg	=	"Cards details deleted successfully.";
	 }
	 
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ration Card Management System |  All Card Reports  </title>

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
                                            <h5 class="m-b-10">All Cards Reports</h5>
                                            <p class="text-muted m-b-10">You can view all All Cards below..</p>
                                            <ul class="breadcrumb-title b-t-default p-t-10">
                                                <li class="breadcrumb-item">
                                                    <a href="dashboard.php"> <i class="fa fa-home"></i> </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="add-cards-details.php">Add Cards</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="cards-reports">Cards Reports</a>
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
                                                    <div class="card-header">
                                                        <h5>All Cards By Multi-Column Ordering</h5>
                                                        <span>DataTables allows ordering by multiple columns at the same time, which can be activated in a number of different ways</span>
                                                    </div>
                                                    <div class="card-block">
														<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
															<script type="text/javascript">
																  $(document).ready(function() {
																  $("#btnExport").click(function(e) {
																	e.preventDefault();

																	//getting data from our table
																	var data_type = 'data:application/vnd.ms-excel';
																	var table_div = document.getElementById('table_wrapper');
																	var table_html = table_div.outerHTML.replace(/ /g, '%20');

																	var a = document.createElement('a');
																	a.href = data_type + ', ' + table_html;
																	a.download = 'Ration-User-Report.xls';
																	a.click();
																  });
																});
															</script>
													
														<center><button id="btnExport" class="btn btn-primary"  >Export to xls</button></center>
													    
														
                                                        <div class="dt-responsive table-responsive" id="table_wrapper" >
														  
                                                            <table  class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        
																				<th style="width=30;text-align:center;" >Sr. No</th>
																				<th style="width=30;text-align:center;" >Card No.</th>   
																				<th style="width=30;text-align:center;" >FamilyHead</th> 
																				<th style="width=30;text-align:center;" >DOB</th> 						
																				<th style="width=30;text-align:center;" >Gender</th>
																				<th style="width=30;text-align:center;">Address</th>	
																				<th style="width=30;text-align:center;">Mobile</th> 	
																				<th style="width=30;text-align:center;" >Card Color</th>
																				<th style="width=30;text-align:center;">Cylinders</th>	 																					
																				<th style="width=30;text-align:center;">Option</th>	
																				<th style="width=30;text-align:center;">Option</th>	
																																
																	</tr>
																	
                                                                </thead>
                                                                <tbody>
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
																					$got_date				=	$got_details[$counter][9];
																					$got_time				=	$got_details[$counter][10];
																					
																					  
																				?>
                                                                    <tr>
                                                                    	<td><?php echo $counter + 1 ;?></td>
																		<td><?php echo $card_no ;?></td> 
																		<td><?php echo $FamilyHead ;?></td> 
																		<td><?php echo $dob ;?></td> 
																		<td><?php echo $gender ;?></td>  
																		<td><?php echo $address ;?></td> 
																		<td><?php echo $mobile ;?></td> 
																		<td><?php echo $card_color ;?></td> 	 	
																		<td><?php echo $cylinders ;?></td>  
																		 
																		<td><a href="/edit-cards-details.php?cards-id=<?php echo $got_id; ?>" target="_blank" class="Edit_option">Edit</a></td>
																			
																		<td><a href="/cards-reports.php?del_cards_id=<?php echo $got_id; ?>" class="delete_option">Delete</a></td>
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
                                                              <!--  <tfoot>
                                                                    <tr>
                                                                        <th style="width=30;text-align:center;" >Sr. No</th>
																		<th style="width=30;text-align:center;" >Card No.</th>  
																		<th style="width=30;text-align:center;" >FamilyHead</th> 
																		<th style="width=30;text-align:center;" >DOB</th> 						
																		<th style="width=30;text-align:center;" >Gender</th>
																		<th style="width=30;text-align:center;">Address</th>	
																		<th style="width=30;text-align:center;">Mobile</th> 	
																		<th style="width=30;text-align:center;" >Card Color</th>
																		<th style="width=30;text-align:center;">Cylinders</th>	 																					
																		<th style="width=30;text-align:center;">Option</th>	
																		<th style="width=30;text-align:center;">Option</th>	
                                                                    </tr>
                                                                </tfoot>
																
																--->
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