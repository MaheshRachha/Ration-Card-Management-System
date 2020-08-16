function saveLead(){
	if(formValidation()){
		return true;
	}
	else
	{
		return false;
	}
}

function formValidation(){
	
	var Name= $('#name').val();
	var Alphabets = new RegExp(/^[a-z A-Z]+$/);
	
	Name = Name.trim();
    if (Name.length == 0) {
       $('#errorname').html("");
	   $('#errorname').html("Please enter name");
	   $('#errorname').show();
        return false;
    }
    if (Name.length < 3) {
        $('#errorname').html("");
		$('#errorname').html("Name must be of 3 characters");
		 $('#errorname').show();
        return false;
    }
    if (!Alphabets.test(Name)) {
		$('#errorname').html("");
		$('#errorname').html("Only alphabets allowed in name field");
		 $('#errorname').show();
        return false;
    }
        $('#errorname').html("");
		$('#errorname').hide();
	
	var DOB = $('#dob').val();
	var validdob = /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/;
	
    if (DOB == "") {
        $('#errordob').css("border-color", "red");
        $('#errordob')[0].innerHTML = "Please enter date of birth";
        $('#errordob').show();

        return false;
    }

    if (!DOB.match(validdob)) {
        $('#errordob').css("border-color", "red");
        $('#errordob')[0].innerHTML = "Please enter a valid date of birth.<br /> ex:dd/mm/yyyy or dd-mm-yyyy or dd.mm.yyyy";
        $('#errordob').show();

        return false;
    }
	if (DOB >= '2018') {
        $('#errordob').css("border-color", "red");
        $('#errordob')[0].innerHTML = "Please enter a valid date of birth,date of birth should be less than 2018";
        $('#errordob').show();

        return false;
    }
	
    $('#errordob').css("border-color", "initial");
    $('#errordob').hide();
	 
	
	var Address= $('#address').val();
	var Alphabets = new RegExp(/^[a-z A-Z]+$/);
	
	Address = Address.trim();
	
    if (Address.length == 0) {
       $('#erroraddress').html("");
	   $('#erroraddress').html("Please enter address");
	   $('#erroraddress').show();
        return false;
    }
    if (Address.length < 3) {
        $('#erroraddress').html("");
		$('#erroraddress').html("Address must be of 3 characters");
		$('#erroraddress').show();
        return false;
    }
     
	$('#erroraddress').html("");
	$('#erroraddress').hide();
	 
	 
	var mobileNO = $('#mobile').val();
	var validphoneno = /^\d{10}$/;
	
    if (mobileNO == "") {
        $('#errormobile').css("border-color", "red");
        $('#errormobile')[0].innerHTML = "Please enter mobile number";
        $('#errormobile').show();

        return false;
    }

    if (!mobileNO.match(validphoneno)) {
        $('#errormobile').css("border-color", "red");
        $('#errormobile')[0].innerHTML = "Please enter a valid mobile number(10 digits).";
        $('#errormobile').show();

        return false;
    }
    $('#errormobile').css("border-color", "initial");
    $('#errormobile').hide();
	
	var EmailAddress = $('#email').val();
     
	var Email = /^([a-z\d]+([\.\-_]?[a-z\d]+)*)@([a-z\d]+[\.\-]?[a-z\d]+|[\.]?[a-z\d]+)+\.([a-z]{2}|com|net|org|edu|biz}info|gov)$/i;

    if (EmailAddress == "") {
        $('#erroremail').css("border-color", "red");
        $('#erroremail')[0].innerHTML = "Please enter email address";
        $('#erroremail').show();

        return false;
    }

    if (!Email.test(EmailAddress)) {
        $('#erroremail').css("border-color", "red");
        $('#erroremail')[0].innerHTML = "Enter valid Email. ex:abc@example.com";
        $('#erroremail').show();

        return false;
    }
    $('#erroremail').css("border-color", "initial");
    $('#erroremail').hide();
	
	 
	return true;
}