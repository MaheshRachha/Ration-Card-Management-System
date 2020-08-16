 
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
	$flag7	=	0;
	$common_msg	="";
	$common_msg1="";
	
	 if(isset($_GET['member-id']))
	 {
		$member_id = $_GET['member-id'];		
		$_SESSION['member_id'] = $member_id;
	 }
	 else if(isset($_SESSION['member_id']))
	 {
		 $member_id = $_SESSION['member_id'];
	 }
 
	$select_type_error	=	"";	
	 
	$flag					=	0;
	$flag1					=	0;
	$flag2					=	0;
	$flag3					=	0;
	
	 
	$member_data		=	array();
	$member_data		=	$db->fetch_family_members_details_by_id($member_id);
			
	
	$result_id					=	"";
	$result_selected_card_no	=	"";
	$result_selected_type		=	"";
	$result_name				=	"";
	$result_age         		=	"";
	$result_gender				=	"";
	$result_date				=	"";
	$result_time				=	"";

	
	if(!empty($member_data))
	{	
		 
	$result_id					=	$member_data[0];
	$result_selected_card_no	=	$member_data[1];
	$result_selected_type 		=	$member_data[2];
	$result_name         		=	$member_data[3];
	$result_age					=	$member_data[4];
	$result_gender				=	$member_data[5]; 
	$result_date				=	$member_data[6];
	$result_time				=	$member_data[7];
			
	}
	if(isset($_POST['edit']))
	{
		$r_no			=	$_POST['r_no'];  
		
		$select_type	=	$_POST['select_type'];  
		
		if($select_type=="Select Type")
		{
			$select_type_error	=	"Please select type";	
			$flag		=	1;
		}
		$name			=	$_POST['name'];  
		$age			=	$_POST['age'];    
		$gender			=	$_POST['gender'];
		
	 	 if($flag==0)
		 {
			if($db->update_family_members_details_by_id($r_no,$select_type,$name,$age,$gender,$member_id))
			{
					  $common_msg	=	"Family Member Records Updated Successfully.";
			}
			else
			{
					$common_msg1	= "Failed";
					 
			}
		 }
	}   
	
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <title> Admin | Edit family members Details </title>

 

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
                                            <h5 class="m-b-10">Edit family members Details</h5>
                                            <p class="text-muted m-b-10">You can edit family members Details..</p>
                                            <ul class="breadcrumb-title b-t-default p-t-10">
                                                <li class="breadcrumb-item">
                                                    <a href="dashboard.php"> <i class="fa fa-home"></i> </a>
                                                </li>  
												<li class="breadcrumb-item"><a href="add-family-members.php">Add Family Members</a>
                                                </li>
												<li class="breadcrumb-item"><a href="family-members-reports.php">cards Reports</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>


                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Edit family members</h5>
                                                        <span>Please fill the below details..</span>
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
													<div class="form-group row">
														<div class="col-md-12"> 
															<div class="common_msg" style="color:red;font-size:17px;margin-left: 340px;">
																<?php
																	echo $common_msg1;
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
																			 	<input type="text" name="r_no" placeholder="Ration card No." readonly  value="<?php echo $result_selected_card_no; ?>"> 
																				<span class="j-tooltip j-tooltip-right-top">Ration card No.</span>
																			 </div>
																		</div>
																		 
																			<div class="j-span6 j-unit">
																				<div class="j-input"> 
																					<select name="select_type">
																					  <option value="Select Type" selected>Select Type</option>
																					  <option value="Adult">Adult</option>
																					  <option value="children">Children</option> 
																					</select>
																					<br/>
																					<span class="error_msgs"><?php echo $select_type_error; ?></span>
																				
																				</div>
																			</div> 
																		  
																		</div> 
																	
																		<div class="j-unit">
																			<div class="j-input">
																				<input type="text" name="name" placeholder="Enter Name" required  value="<?php echo $result_name;?>">
																				<span class="j-tooltip j-tooltip-right-top">Name</span>
																			</div>
																		</div>
																		
																		<div class="j-unit">
																			<div class="j-input">
																				<input type="text" name="age" placeholder="Enter Age" required  value="<?php echo $result_age;?>">
																				<span class="j-tooltip j-tooltip-right-top">Age</span>
																			</div>
																		</div>
																		
						 												<div class="j-unit">
																			<div class="j-input">
																				  <input type="radio" name="gender" value="Male" checked> Male 
																				  <input type="radio" name="gender" value="Female"> Female 
																				  <input type="radio" name="gender" value="Other"> Other 
																			</div>
																		</div> 
                                                                    </div>  
																	<div class="j-response"></div>

                                                                </div>

                                                                <div class="j-footer"> 
																	<input type="submit" value="Update" name="edit" class="btn btn-primary" />		
																	<a href="family-members-reports.php" class="btn btn-primary">Back</a>
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

                            <div id="styleSelector">
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