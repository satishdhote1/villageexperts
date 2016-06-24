
$(document).ready(function(){
				//Provider Click
				$(document).on("click",".SPloginSubmit",function(){
					//alert();
					var email = $(".SPloginEmail").val();
					var pwd = $(".SPloginPwd").val();
					var userType = $(".SPLoginHidden").val();
					if(email == "")
					{
						$(".SPerrors").css({"display":"block","color":"red"});
						$(".SPerrors").text("Email can't be blank!");
					}
					else if(pwd == "")
					{
						$(".SPerrors").css({"display":"block","color":"red"});
						$(".SPerrors").text("Password can't be blank!");
					}
					else
					{
						 $(".SPloginLoader").show();
							$.ajax({
								url:'ajax.php',
								type: 'POST',
								dataType: "json",
								data: {email:email,pwd:pwd,userType:userType,tag:"login"},  
								success: function(data)    // A function to be called if request succeeds
								{
									 $(".SPloginLoader").hide();
								console.log(data);
								 if(data.success == 1)
								 {
									 $(".SPerrors").css({"display":"block","color":"green"});
									 $(".SPerrors").text(data.msg+" Please Wait! You are Redrecting..");
									 setTimeout(function(){
										// alert();
									 location.href="centre-announcements.php";
									}, 4000);
								 }
								 else
								 {
									  $(".SPerrors").css({"display":"block","color":"red"});
									 $(".SPerrors").text(data.msg);
									 $('html, body').animate({
													scrollTop: $(".SPerrors").offset().top
												}, 2000);
								 }
								} ,      
								 error: function () {
									alert("Login not Successful!");
								}  
								 });
						 }
					 
					});
				
				//requester Click
				$(document).on("click",".SRLoginSubmit",function(){
				
				var email = $(".SRLoginEmail").val();
				var pwd = $(".SRLoginPwd").val();
				var userType = $(".SRLoginHidden").val();
				//alert(email+pwd);
				if(email == "")
				{
					$(".SRerrors").css({"display":"block","color":"red"});
					$(".SRerrors").text("Email can't be blank!");
					
				}
				else if(pwd == "")
				{
					$(".SRerrors").css({"display":"block","color":"red"});
					$(".SRerrors").text("Password can't be blank!");
					
				}
				else
				{
						$(".SRloginLoader").show();
						$.ajax({
							url:'ajax.php',
							type: 'POST',
							dataType: "json",
							data: {email:email,pwd:pwd,userType:userType,tag:"login"},  
							success: function(data)    // A function to be called if request succeeds
							{
								$(".SRloginLoader").hide();
							console.log(data);
							 if(data.success == 1)
							 {
								 $(".SRerrors").css({"display":"block","color":"green"});
								 $(".SRerrors").text(data.msg+" Please Wait! You are Redrecting..");
								 setTimeout(function(){
									// alert();
								 location.href="centre-announcements.php";
								}, 4000);
							 }
							 else
							 {
								  $(".SRerrors").css({"display":"block","color":"red"});
								 $(".SRerrors").text(data.msg);
							 }
							} ,      
							 error: function () {
								alert("Login not Successful!");
							}  
							 });
					 }
				 
				});
	 		
			//General Member Click
				$(document).on("click",".GMLoginSubmit",function(){
				//alert();
				var email = $(".GMLoginEmail").val();
				var pwd = $(".GMLoginPwd").val();
				var userType = $(".GMLoginHidden").val();
				if(email == "")
				{
					$(".GMerrors").css({"display":"block","color":"red"});
					$(".GMerrors").text("Email can't be blank!");
					
				}
				else if(pwd == "")
				{
					$(".GMerrors").css({"display":"block","color":"red"});
					$(".GMerrors").text("Password can't be blank!");
				}
				else
				{
					$(".GMloginLoader").show();
						$.ajax({
							url:'ajax.php',
							type: 'POST',
							dataType: "json",
							data: {email:email,pwd:pwd,userType:userType,tag:"login"},  
							success: function(data)    // A function to be called if request succeeds
							{
								$(".GMloginLoader").hide();
							console.log(data);
							 if(data.success == 1)
							 {
								 $(".GMerrors").css({"display":"block","color":"green"});
								 $(".GMerrors").text(data.msg+" Please Wait! You are Redrecting..");
								 setTimeout(function(){
									// alert();
								 location.href="centre-announcements.php";
								}, 4000);
							 }
							 else
							 {
								 $(".GMerrors").css({"display":"block","color":"red"});
								 $(".GMerrors").text(data.msg);
							 }
							} ,      
							 error: function () {
								alert("Login not Successful!");
							}  
							 });
					 }
				 
				});
				
				//form vlidation of service provider
					
					    $("#SPform").validate({
    
								// Specify the validation rules
								rules: {
									SPname: "required",
									SPaddress: "required",
									SPcity: "required",
									SPcountry: "required",
									SPpin: "required",
									SPmobile: "required",
									sex: "required",
									SPpassword: "required",
									//SPexperience: "required",
									SPrateType1: "required",
									SPrateType2: "required",
									SPrateType3: "required",
									SPemail: {
										required: true,
										email: true
									},
									SPpassword: {
										required: true,
										minlength: 5
									},
									SPcpassword: {
		
									  equalTo: "#SPpassword"
									},
									SPmobile: {
										required: true,
										minlength: 10
									},
									agree: "required"
								},
								
								// Specify the validation error messages
								messages: {
									SPname: "Please enter your  name",
									SPaddress: "Please enter your Address",
									SPcity: "Please enter your City",
									SPcountry: "Please enter your Country",
									SPpin: "Please enter your Pin",
									sex: "Please select your Gender",
									//SPexperience: "Please enter the Expirience Field",,
									SPrateType1: "Please enter your RateType1",
									SPrateType2: "Please enter your RateType2",
									SPrateType3: "Please enter your RateType3",
									SPpassword: {
										required: "Please provide a password",
										minlength: "Your password must be at least 5 characters long"
									},
									SPmobile: {
										required: "Please provide Your Phone Number",
										minlength: "Your Phone Number must be at least 10 digit long"
									},
									SPemail: "Please enter a valid email address",
									agree: "Please accept our policy"
								}
								/*,submitHandler: function(form) {
									form.submit();
								}*/
							});
					
					//end for service provider validation
				//service provider reg
				$(document).on("click",".SPsubmit",function(){
					
					 if($("#SPform").valid() == true)
					 {
					 
					
							var SPname = $(".SPname").val();
							var SPaddress = $(".SPaddress").val();
							var SPcity = $(".SPcity").val();
							var SPcountry = $(".SPcountry").val();
							var SPpin = $(".SPpin").val();
							var SPmobile = $(".SPmobile").val();
							var SPemail = $(".SPemail").val();
							var SPsex = $("input[name='sex']:checked").val();
							var SPspecialisation_id = $(".SPspecialisation_id").val();
							var SPsubSpecialisation_id = $(".SPsubSpecialisation_id").val();
							var SPexperience = $(".SPexperience").val();
							var SPlaunguages = $(".SPlaunguages").val();
							var SPtimezone = $(".SPtimezone").val();
							var SPpassword = $(".SPpassword").val();
							var SPcpassword = $(".SPcpassword").val();
							var SPrateType1 = $(".SPrateType1").val();
							var SPrateType2 = $(".SPrateType2").val();
							var SPrateType3 = $(".SPrateType3").val();
							
							 if(SPpassword!=SPcpassword)
							{
								alert("Passwrd did't matched Cnfirm Password!");
							}
							else
							{
								 $(".SPloader").show();
									$.ajax({
											url:'ajax.php',
											type: 'POST',
											dataType: "json",
											data: {SPname:SPname,SPaddress:SPaddress,SPcity:SPcity,SPcountry:SPcountry,SPpin:SPpin,SPmobile:SPmobile,SPemail:SPemail,SPsex:SPsex,SPspecialisation_id:SPspecialisation_id,SPsubSpecialisation_id:SPsubSpecialisation_id,SPexperience:SPexperience,SPlaunguages:SPlaunguages,SPtimezone:SPtimezone,SPrateType1:SPrateType1,SPrateType2:SPrateType2,SPrateType3:SPrateType3,SPpassword:SPpassword,SPcpassword:SPcpassword,userType:"SPreister",tag:"register"},  
											success: function(dataSP)    // A function to be called if request succeeds
											{
												 $(".SPloader").hide();
											console.log(dataSP);
											 if(dataSP.success == 1)
											 {
												 $(".SPregErrors").css({"display":"block","color":"green"});
												 $(".SPregErrors").text(dataSP.msg);
												  $('body').scrollTo('.SPregErrors',{duration:'slow', offsetTop : '50'});
												 setTimeout(function(){
													
													// alert();
												// location.href="centre-announcements.php";
												}, 4000);
											 }
											 else
											 {
												  $(".SPregErrors").css({"display":"block","color":"red"});
												 $(".SPregErrors").text(dataSP.msg);
												 $('body').scrollTo('.SPregErrors',{duration:'slow', offsetTop : '50'});
											 }
											} ,      
											 error: function () {
												alert("Registration Error!");
											}  
											 });
								}
					 }
				});
				
				
				//service provider reg
				$(document).on("click",".SRsubmit",function(){
					
					var SRname = $(".SRname").val();
					var SRaddress = $(".SRaddress").val();
					var SRcity = $(".SRcity").val();
					var SRcountry = $(".SRcountry").val();
					var SRpin = $(".SRpin").val();
					var SRmobile = $(".SRmobile").val();
					var SRemail = $(".SRemail").val();
					var SRsex = $("input[name='sex']:checked").val();
					var SRpassword = $(".SRpassword").val();
					var SRcpassword = $(".SRcpassword").val();
					if(SRemail=="")
					{
						alert("Email can't be blank!!");
					}
					else if(SRpassword!=SRcpassword)
					{
						alert("Passwrd did't matched Cnfirm Password!");
					}
					else
					{
						 $(".SRloader").show();
							$.ajax({
									url:'ajax.php',
									type: 'POST',
									dataType: "json",
									data: {SRname:SRname,SRaddress:SRaddress,SRcity:SRcity,SRcountry:SRcountry,SRpin:SRpin,SRmobile:SRmobile,SRemail:SRemail,SRsex:SRsex,SRSRecialisation_id:SRSRecialisation_id,SRsubSRecialisation_id:SRsubSRecialisation_id,SRexperience:SRexperience,SRlaunguages:SRlaunguages,SRtimezone:SRtimezone,SRrph:SRrph,SRpassword:SRpassword,SRcpassword:SRcpassword,userType:"SRreister",tag:"register"},  
									success: function(dataSR)    // A function to be called if request succeeds
									{
										 $(".SRloader").hide();
									console.log(dataSR);
									 if(dataSR.success == 1)
									 {
										 $(".SRregErrors").css({"display":"block","color":"green"});
										 $(".SRregErrors").text(dataSR.msg);
										 setTimeout(function(){
											  $('body').scrollTo('.SRregErrors',{duration:'slow', offsetTop : '50'});
											// alert();
										// location.href="centre-announcements.php";
										}, 4000);
									 }
									 else
									 {
										  $(".SRregErrors").css({"display":"block","color":"red"});
										 $(".SRregErrors").text(dataSR.msg);
										 $('body').scrollTo('.SRregErrors',{duration:'slow', offsetTop : '50'});
									 }
									} ,      
									 error: function () {
										alert("Login not Successful!");
									}  
									 });
					}
					
				});
			//SP upload
	 	$(document).on("click",".SPupload",function(){
			
			
		var formData = new FormData();
        var file = document.getElementById("SPimage").files[0];

        //formData.append("companyname", $("#companyname").val());
        //formData.append("country", $("#country").val());
        formData.append("file", file);
         $(".SPimageloader").show();
        $.ajax({
            type: "POST",
            url: 'ajax.php',
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
			cache: false,
   			 global: false,
            success: function (dataSPupload) {
				 $(".SPimageloader").hide();
				if(dataSPupload.success == 1)
				 {
					 $(".SPimageErrors").css({"display":"block","color":"green"});
					 $(".SPimageErrors").text(dataSPupload.msg);
					 $('body').scrollTo('.SPimageErrors',{duration:'slow', offsetTop : '50'});
					 $(".SPshowImage").attr("src","images/uploads/"+ dataSPupload.imageName);
					 setTimeout(function(){
						  $(".SPimageErrors").css("display","none");
						  dataSPupload = '';
						 
						// alert();
					// location.href="centre-announcements.php";
					}, 5000);
				 }
				 else
				 {
					 $(".SPimageErrors").css({"display":"block","color":"green"});
					 $(".SPimageErrors").text(dataSPupload.msg);
					  $('body').scrollTo('.SPimageErrors',{duration:'slow', offsetTop : '50'});
					 setTimeout(function(){
						 $(".SPimageErrors").css("display","none");
						 dataSPupload = '';
						// alert();
					// location.href="centre-announcements.php";
					}, 5000);
				 }
              // alert(data);
            },
            error: function (error) {
                
            }
        });
			return false;
				
			//console.log(formdata);	
		
	 
	
	 
	 });
	 
	 
	 //SP upload
	 	$(document).on("click",".SRupload",function(){
			
			
		var formData = new FormData();
        var file = document.getElementById("SRimage").files[0];

        //formData.append("companyname", $("#companyname").val());
        //formData.append("country", $("#country").val());
        formData.append("file", file);
        $(".SRloginLoader").show();
        $.ajax({
            type: "POST",
            url: 'ajax.php',
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
			cache: false,
   			 global: false,
            success: function (dataSRupload) {
				$(".SRloginLoader").hide();
				if(dataSRupload.success == 1)
				 {
					 $(".SRimageErrors").css({"display":"block","color":"green"});
					 $(".SRimageErrors").text(dataSRupload.msg);
					 $('body').scrollTo('.SRimageErrors',{duration:'slow', offsetTop : '50'});
					 $(".SRshowImage").attr("src","images/uploads/"+ dataSRupload.imageName);
					 setTimeout(function(){
						  $(".SRimageErrors").css("display","none");
						  dataSRupload = '';
						// alert();
					// location.href="centre-announcements.php";
					}, 5000);
				 }
				 else
				 {
					 
					 $(".SRimageErrors").css({"display":"block","color":"red"});
					 $(".SRimageErrors").text(dataSRupload.msg);
					 // $('body').scrollTo('.SRimageErrors',{duration:'slow', offsetTop : '50'});
					 setTimeout(function(){
						 $(".SRimageErrors").css("display","none");
						 dataSRupload = '';
						// alert();
					// location.href="centre-announcements.php";
					}, 5000);
				 }
              // alert(data);
            },
            error: function (error) {
                alert("Image Upload Error!");
            }
        });
			return false;
				
			//console.log(formdata);	
		
	 
	
	 
	 });
	
});