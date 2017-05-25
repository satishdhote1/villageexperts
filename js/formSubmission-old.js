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

						 $(".loader-exp").show();

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

                                                                           $(".loader-exp").hide();

									 $(".SPerrors").css({"display":"block","color":"green"});

									 $(".SPerrors").text(data.msg+" Please Wait! You are Redrecting..");

									 setTimeout(function(){

										// alert();

									 location.href="centre-announcements.php";

									}, 2000);

								 }

								 else

								 {

 $(".loader-exp").hide();

									  $(".SPerrors").css({"display":"block","color":"red"});

									 $(".SPerrors").text(data.msg);

									 $('html, body').animate({

													scrollTop: $(".SPerrors").offset().top

												}, 2000);

								 }

								} ,      

								 error: function () {

 $(".loader-exp").hide();

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

						$(".loader-exp").show();

						$.ajax({

							url:'ajax.php',

							type: 'POST',

							dataType: "json",

							data: {email:email,pwd:pwd,userType:userType,tag:"login"},  

							success: function(data)    // A function to be called if request succeeds

							{

								$(".loader-exp").hide();

							console.log(data);

							 if(data.success == 1)

							 {

								 $(".SRerrors").css({"display":"block","color":"green"});

								 $(".SRerrors").text(data.msg+" Please Wait! You are Redrecting..");

								 setTimeout(function(){

									// alert();

								 location.href="centre-announcements.php";

								}, 2000);

							 }

							 else

							 {

								  $(".SRerrors").css({"display":"block","color":"red"});

								 $(".SRerrors").text(data.msg);

							 }

							} ,      

							 error: function () {

								$(".loader-exp").hide();

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

					$(".loader-exp").show();

						$.ajax({

							url:'ajax.php',

							type: 'POST',

							dataType: "json",

							data: {email:email,pwd:pwd,userType:userType,tag:"login"},  

							success: function(data)    // A function to be called if request succeeds

							{

								 $(".loader-exp").hide();

							console.log(data);

							 if(data.success == 1)

							 {

								

								 $(".GMerrors").css({"display":"block","color":"green"});

								 $(".GMerrors").text(data.msg+" Please Wait! You are Redrecting..");

								 setTimeout(function(){

									// alert();

								 location.href="centre-announcements.php";

								}, 2000);

							 }

							 else

							 {

								  $(".GMerrors").css({"display":"block","color":"red"});

								 $(".GMerrors").text(data.msg);

							 }

							} ,      

							 error: function () {

 $(".loader-exp").hide();

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

									SPexperience: "required",

									SPrateType1: "required",

									SPrateType2: "required",

									SPrateType3: "required",
									SPdegree:"required",
									SPinstitute: "required",
									SPyop:"required",
									SPemail: {

										required: true,

										email: true

									},

									SPpassword: {

										required: true,

										minlength: 5

									},

									SPcpassword: {
										//equalTo: "#SPpassword"

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
									SPdegree:"Please select your Degree",
									SPinstitute: "Please enter your Institution",
									SPyop:"Please select year of passing",
									
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

				$(document).on("click",".SPsubmit",function(event){

					

					if($("#SPform").valid() == true)
					{
						event.preventDefault();
						var SPemail = $(".SPemail").val();
						$.ajax({

									url:'ajax.php',

									type: 'POST',

									dataType: "json",
									cache:"false",
									data: {email:$.trim(SPemail),userType:"provider",tag:"checkEmail"},  

									success: function(dataSR)    // A function to be called if request succeeds
									{
										if(dataSR.success == 1)
										{
											alert("Email already exist !");
											
										}
										else
										{
											$('#SPform').unbind('submit').submit();
										}
										
									},      
									error: function () {

										alert("Email Checking Error!");

									}  

									 });
					/*

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

					*/

                               }

				});

				

				 $("#SRform").validate({

    

								// Specify the validation rules

								rules: {

									SRname: "required",

									SRaddress: "required",

									SRcity: "required",

									SRcountry: "required",

									SRpin: "required",

									SRmobile: "required",

									sex: "required",

									SRpassword: "required",

									

									SRemail: {

										required: true,

										email: true

									},

									SRpassword: {

										required: true,

										minlength: 5

									},

									SRcpassword: {

		

									  equalTo: "#SRpassword"

									},

									SRmobile: {

										required: true,

										minlength: 10

									},

									agree: "required"

								},

								

								// Specify the validation error messages

								messages: {

									SRname: "Please enter your  name",

									SRaddress: "Please enter your Address",

									SRcity: "Please enter your City",

									SRcountry: "Please enter your Country",

									SRpin: "Please enter your Pin",

									sex: "Please select your Gender",

									//SPexperience: "Please enter the Expirience Field",,

									

									SRpassword: {

										required: "Please provide a password",

										minlength: "Your password must be at least 5 characters long"

									},

									SRmobile: {

										required: "Please provide Your Phone Number",

										minlength: "Your Phone Number must be at least 10 digit long"

									},

									SRemail: "Please enter a valid email address",

									agree: "Please accept our policy"

								}

								/*,submitHandler: function(form) {

									form.submit();

								}*/

							});

					

				//service requester reg

				$(document).on("click",".SRsubmit",function(event){

				   if($("#SRform").valid() == true)
					{
						event.preventDefault();
						var SRemail = $(".SRemail").val();
						$.ajax({

									url:'ajax.php',

									type: 'POST',

									dataType: "json",

									data: {email:$.trim(SRemail),userType:"requestor",tag:"checkEmail"},  

									success: function(dataSR)    // A function to be called if request succeeds
									{
										if(dataSR.success == 1)
										{
											alert("Email already exist !");
											
										}
										else
										{
											$('#SRform').unbind('submit').submit();
										}
										
									},      
									error: function () {

										alert("Email Checking Error!");

									}  

									 });
					/*

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

					*/

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
	    $(document).on("change","#SPspecialisation_id",function(){
			var id = $(".SPspecialisation_id").val();
			//alert(id);
			$(".loader-exp").show();
			$.ajax({

					url:'getSubSpecialization.php',

					type: 'POST',

					dataType: "json",

					data: {id:$.trim(id)},  

					success: function(data)    // A function to be called if request succeeds
					{
						$(".loader-exp").hide();
						if(data.success == 1)
						{
							var appendData = '';
							$.each(data.result,function(key,value){
								appendData+="<option value='"+value.sub_specialisation_id+"'>"+value.sub_specialisation+"</option>";
								
								});
								$(".SPsubSpecialisation_id").html(appendData);
							
						}
						else
						{
							alert("No data found for Sub-Specialization");
						}
						
					},      
					error: function () {
						$(".loader-exp").hide();
						

						alert("Network Error!");

					}  

					 });
		
		
		});
	

});	
$( window ).load(function() {	

	if($(".sploginModalshow").val() == "1")
	{
		
		$('#SPLogin').modal('show');
		$('#SPLogin').on('shown', function() {
			$("#SPLoginPwd").focus();
		
		});
	 }
	
	
		if($(".srloginModalshow").val() == "1")
		{
			$('#SRLogin').modal('show');
			$('#SRLogin').on('shown', function() {
				$("#SRLoginPwd").focus();
			
			});
		 }
	
	
		 if($(".gmloginModalshow").val() == "1")
		{
			
			$('#GMLogin').modal('show');
			$('#GMLogin').on('shown', function() {
				$("#GMLoginPwd").focus();
			
			});
		 }

	});	