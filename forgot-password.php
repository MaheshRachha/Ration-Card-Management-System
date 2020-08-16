 
<?php
	require_once("lib/class/functions.php");
	$db = new functions(); 
	
	if(isset($_SESSION['current_admin']))
	{
		header("Location:dashboard.php");
	}
	
	if(isset($_GET['logout']))
	{
		unset($_SESSION['current_admin']);
	}
	 
	$flag	=	0;
	$email_error	="";
	$success_msg	=	"";
	
	if(isset($_POST['submit_btn']))
	{
		$email_id	=	$_POST['user_email'];
		
		if($flag==0)
		{
			$db_password = $db->get_user_password($email_id);
			
			if($db_password!="")
			{
				//Send Email
                $to = "$email_id";
				$subject = "Your Ration Card Password";
				$txt = "Hello Admin,Your Password is:$db_password";
				$headers = "From: ration.sessolapur@gmail.com" . "\r\n" .
				"CC: ramwaghmodw145@gmail.com";
                
                $retval = mail($to,$subject,$txt,$headers);
				
				if( $retval == true ) 
				{
					$success_msg	=	"Your password sent on your email kindly check your mail.";
				}
				else
				{
					$success_msg	=	"Mail could not be sent...";
				}
			}
			else
			{
				$email_error	= "This is user is not exist";
			}
		}
		
		
	}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Ration Card Management System Admin | Forgot Password</title>
   
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="#" />
		<meta name="keywords" content="#" />
		<meta name="author" content="#" />
		
	  <link rel="icon" href="files/assets/images/favicon.ico" type="image/x-icon">
	  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">
      <!--<link rel="stylesheet" type="text/css" href="files/assets/icon/themify-icons/themify-icons.css"> -->
      <link rel="stylesheet" type="text/css" href="files/assets/icon/icofont/css/icofont.css">
      <link rel="stylesheet" type="text/css" href="files/assets/icon/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="files/assets/css/style.css">
	  
 </head>
   <body class="fix-menu">
      <div class="theme-loader">
         <div class="loader-track">
            <div class="loader-bar"></div>
         </div>
      </div>
      <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
         <div class="container">
            <div class="row">
			  <div class="col-sm-12 text-center" >
				              
								 <input type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" value="Ration Card Management System" />
                             
              </div>  
               <div class="col-sm-12">
                  <div class="login-card card-block auth-body mr-auto ml-auto">
                     <form action="<?php echo $_SERVER['PHP_SELF']; ?>"   method="post" >
                        <!--
						<div class="text-center">
                           <img src="files/assets/images/logo.png" alt="logo.png">
                        </div> -->
						 
                        <div class="auth-box">
                           <div class="row m-b-20">
                              <div class="col-md-12">
                                 <h3 class="text-left txt-primary"> Forget Password </h3>
								 <h4 class="text-left txt-primary" style="color:black;font-size:17px;"><?php echo $success_msg;?></h4>
								 
                              </div>
                           </div>
                           <hr />
                           <div class="input-group">
                              <input type="email" name="user_email" class="form-control" required placeholder="Your Email Address">
                              <span class="md-line"></span>
                           </div>
						    <span class="error_msgs" style="color:red;font-size:13px;"><?php echo $email_error; ?></span>
                           <div class="row m-t-25 text-left">
                              <div class="col-12">
                                 
                                 <div class="forgot-phone text-right f-right">
                                    <a href="index.php" class="text-right f-w-600 text-inverse"> Know Password? Sign In Here</a>
                                 </div>
                              </div>
                           </div>
                           <div class="row m-t-30">
                              <div class="col-md-12">
								 <input type="submit" name="submit_btn" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" value="Submit" />
                              </div>
                           </div>
                           <hr />
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      
      <script src="files/bower_components/jquery/js/jquery.min.js"></script>
      <script src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
      <script src="files/bower_components/popper.js/js/popper.min.js"></script>
      <script src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>
      <script src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
      <script src="files/bower_components/modernizr/js/modernizr.js"></script>
      <script src="files/bower_components/modernizr/js/css-scrollbars.js"></script>
      <script src="files/bower_components/i18next/js/i18next.min.js"></script>
      <script src="files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
      <script src="files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
      <script src="files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
      <script src="files/assets/js/common-pages.js"></script>
   </body>
</html>