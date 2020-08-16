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
	  
	$r_no		 =	"";
	$FamilyHead	 =	"";	
	$dob		 =	"";	 
	$gender  	 =  "";
	$address 	 =	"";	
	$mobile		 =	"";
	$email		 =	"";
	$cylinders	 =	"";
	$family_members	 =  "";
	$Adult		 =	"";
	$Children	 =	"";
	 
	$common_msg1 =	"";
	$common_msg	 =	""; 
	
	$selected_name_error	=	"";	
	$selected_name          =   "";
	$image_error			=	"";
	$flag					=	0;
	$flag1					=	0;
	$flag2					=	0;
	$flag3					=	0;
	
	
	$card_data		=	array();
	$card_data		=	$db->fetch_cards_all_details();
			
	
	$result_id					=	"";
	$result_card_no				=	""; 
	 
	if(!empty($card_data))
	{	
		 
	$result_id					=	$card_data[0];
	$result_card_no				=	$card_data[1]; 
	 
	 $result_card_no++;
	}
	 
	
	if(isset($_POST['submit_btn']))
	{
		$r_no			=	$_POST['r_no'];  
		$FamilyHead		=	$_POST['FamilyHead'];  
		$dob			=	$_POST['dob'];  
		$gender			=	$_POST['gender'];
		$address		=	$_POST['address']; 
		$mobile			=	$_POST['mobile'];	
		$email			=	$_POST['email'];
		$card_color		=	$_POST['card_color'];
		$cylinders		=	$_POST['cylinders'];
	 		 
			 
			 
		if($flag==0)
		{ 
			$db->set_cards_details($r_no,$FamilyHead,$dob,$gender,$address,$mobile,$email,$card_color,$cylinders);	
			$common_msg	=	"Cards Record Added successfully.";
		}
		
	}
	
	
	
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <title> Admin | Add Cards Details </title>

 

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
	
	 <style> 
    em {
        display: none;
        font-size: 13px !important;
        color: #f00
    }
</style>
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
                                            <h5 class="m-b-10">New Ration Card Entry</h5>
                                            <p class="text-muted m-b-10">You can add new ration cards details..</p>
                                            <ul class="breadcrumb-title b-t-default p-t-10">
                                                <li class="breadcrumb-item">
                                                    <a href="dashboard.php"> <i class="fa fa-home"></i> </a>
                                                </li>
                                                 <li class="breadcrumb-item"><a href="add-cards-details.php">New Entry</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="cards-reports.php">Cards Reports</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>


                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Add Cards Information</h5>
                                                        <span>Please fill the Cards details..</span>
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
																				<input type="text" name="r_no" placeholder="Ration card No." readonly  value="<?php echo $result_card_no; ?>"> 
																				<span class="j-tooltip j-tooltip-right-top">Ration card No.</span>
																			</div>
																		</div>
																	
																		<div class="j-unit">
																			<div class="j-input">
																				<input type="text" name="FamilyHead" id="name" placeholder="FamilyHead"  autocomplete="off" onblur="formValidation()" onkeyup="formValidation()"  value="<?php echo $FamilyHead;?>">
																				<span class="j-tooltip j-tooltip-right-top">FamilyHead</span>
																				  <em id="errorname"></em>
																			</div>
																		</div>
																		
																		<div class="j-unit">
																			<div class="j-input">
																				<input id="dob" type="text" name="dob" placeholder="DOB" autocomplete="off" onblur="formValidation()" onkeyup="formValidation()"   value="<?php echo $dob;?>">
																				<span class="j-tooltip j-tooltip-right-top">DOB</span>
																				 <em id="errordob"></em>
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

																	<div class="j-row">
																		
																		 <div class="j-unit">
																			<div class="j-input">
																				<textarea spellcheck="false" name="address" id="address" placeholder="Address" autocomplete="off" onblur="formValidation()" onkeyup="formValidation()"  ><?php echo $address;?></textarea>
																				<span class="j-tooltip j-tooltip-right-top">Address</span>
																				<em id="erroraddress"></em>
																			</div>
																		</div> 
																		
																		<div class="j-unit">
																			<div class="j-input">
																				<input type="text" name="mobile" id="mobile" placeholder="Mobile Number"  autocomplete="off" onblur="formValidation()" onkeyup="formValidation()" value="<?php echo $mobile;?>">
																				<span class="j-tooltip j-tooltip-right-top">Mobile Number</span>
																				 <em id="errormobile"></em>
																			</div>
																		</div> 
																		
																		<div class="j-unit">
																			<div class="j-input">
																				<input type="email" name="email" id="email" placeholder="Email"  autocomplete="off" onblur="formValidation()" onkeyup="formValidation()" value="<?php echo $email;?>">
																				<span class="j-tooltip j-tooltip-right-top">Email</span>
																				<em id="erroremail"></em>
																			</div>
																		</div> 
																		
                                                                        <div class="j-span6 j-unit">
                                                                            <div class="j-input">
																			<label>Select Card Color</label>
																				<select name="card_color">
																				  <option value="Orange" selected>Orange</option>
																				  <option value="Yellow ">Yellow</option>
																				  <option value="White">White</option>
																				</select>
                                                                            </div>
                                                                        </div>
																		
																		<div class="j-span6 j-unit">
                                                                            <div class="j-input">
																				<label>No of cylinders</label>
																				<select name="cylinders"> 
																				  <option value="None" selected>None</option>
																				  <option value="1">1</option>
																				  <option value="2">2</option>
																				  <option value="3">3</option>
																				</select>
                                                                            </div>
                                                                        </div>
																		 
																	  
                                                                    </div> 
																	
																	<div class="j-response"></div>

                                                                </div>

                                                                <div class="j-footer"> 
																	<input type="submit" value="Submit" name="submit_btn"  onclick="return saveLead()" class="btn btn-primary" />		
                                                                    <button type="reset" class="btn btn-default m-r-20">Reset</button>
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
	<script src="js/form.js"></script>
	<!--<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'decription' ); 
	</script> 
	---->
	
</body>
</html>