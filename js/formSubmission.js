$(document).ready(function(){




				//Provider Click

				$(document).on("click",".friendLoginButton",function(){

					//alert();

					var email = $(".friendEmail").val();

					var pwd = $(".friendPwd").val();

					var userType = $(".friendLoginHidden").val();

					if(email == "")

					{

						$(".SPerrors").css({"dilay":"block","color":"red"});

						$(".SPerrors").text("Email can't be blank!");

						

					}
					else if(pwd == "")

					{

						$(".SPerrors").css({"dilay":"block","color":"red"});

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

                                                                           $(".SPloginLoader").hide();

									 $(".SPerrors").css({"dilay":"block","color":"green"});

									 $(".SPerrors").text(data.msg+" Please Wait! You are Redrecting..");

									 setTimeout(function(){

										// alert();

									 location.href="friends-family.php";

									}, 1000);

								 }

								 else

								 {

									 $(".SPloginLoader").hide();
										alert(data.msg);
									  $(".SPerrors").css({"dilay":"block","color":"red"});
										$(".friendPwd").val("");
									 $(".SPerrors").text(data.msg);

									 $('html, body').animate({

													scrollTop: $(".errors").offset().top

												}, 2000);

								 }

								} ,      

								 error: function () {

 $(".SPloginLoader").hide();

									alert("Login not Successful!");

								}  

								 });

						 }

					 

					});

				

				//Add friend validation
				 $("#addFriend").validate({

    

								// ecify the validation rules

								rules: {

									fname: "required",

									lname: "required",

									//city: "required",

									//country: "required",

									pin: "required",
									 pwds: {
										required: true,
										//minlength: 5
									},
									cpwd: {
										required: true,
										//minlength: 5,
										equalTo: ".pwds"
									},

									

									
									email: {

										required: true,

										email: true

									},

									phone: {

										//required: true,

										//minlength: 10,
										//digits:true

									}

								},

								

								// ecify the validation error messages

								messages: {

									fname: "First name required",
									lname: "Last name required",
									

									//city: "Please enter your City",

									//country: "Please enter your Country",

									

									

									email: "email address invalid ",
									pwds: "Enter Password",

								}

								/*,submitHandler: function(form) {

									form.submit();

								}*/

							});
							
				
				//Add friend Submission
				$(document).on("click",".addFriendSubmit",function(event){

					

					if($("#addFriend").valid() == true)
					{
						event.preventDefault();
						var email = $(".email").val();
						var isexpertreg = $(".isexpertreg").val();
						if(isexpertreg == "")
						{
						$.ajax({

									url:'ajax.php',

									type: 'POST',

									dataType: "json",
									cache:"false",
									data: {email:$.trim(email),userType:"addFriend",tag:"checkEmail"},  

									success: function(dataSR)    // A function to be called if request succeeds
									{
										if(dataSR.success == 1)
										{
											alert("Email already exist !");
											
										}
										else
										{
											//alert("fgdfgdf");
											$('#addFriend').unbind('submit').submit();
										
				

                               }
									//}
							   //}
										
									},      
									error: function () {

										alert("Email Checking Error!");

									}  

									 });
					}
					else
					{
						$('#addFriend').unbind('submit').submit();
					}
			}

				});


				//Add expertise  validation
				 $("#SPform").validate({

    

								// ecify the validation rules

								rules: {

									fname: "required",

									lname: "required",

									SPexpertise: "required",
									SP_Sub_Expertise: "required",

									pin: "required",
									 pwds: {
										required: true,
										//minlength: 5
									},
									cpwd: {
										required: true,
										//minlength: 5,
										equalTo: ".pwds"
									},

									

									
									email: {

										required: true,

										email: true

									},

									phone: {

										//required: true,

										//minlength: 10,
										//digits:true

									}

								},

								

								// ecify the validation error messages

								messages: {

									fname: "First name required",
									lname: "Last name required",
									SPexpertise: "Please Select Expertise",
									SP_Sub_Expertise: "Please Select Sub_Expertise",

									//country: "Please enter your Country",

									email: "email address invalid ",
									pwds: "Enter Password",

								}

								/*,submitHandler: function(form) {

									form.submit();

								}*/

							});
				 //add expertise registration
				 $(document).on("click",".SPsubmit",function(event){
				 if($("#SSPform").valid() == true)
					{
						event.preventDefault();
						var email = $(".email").val();
						$.ajax({

									url:'ajax.php',

									type: 'POST',

									dataType: "json",
									cache:"false",
									data: {email:$.trim(email),userType:"addFriend",tag:"checkEmail"},  

									success: function(dataSR)    // A function to be called if request succeeds
									{
										if(dataSR.success == 1)
										{
											alert("Email already exist !");
											
										}
										else
										{
											//alert("fgdfgdf");
											$('#addFriend').unbind('submit').submit();
										
					
/*
					var fname = $(".fname").val();
					var lname = $(".lname").val();
					var city = $(".city").val();
					var country = $(".country").val();
					var phone = $(".phone").val();
					var email = $(".email").val();

					 
						 $(".loader").show();

							$.ajax({

									url:'ajax.php',

									type: 'POST',

									dataType: "json",

									data: {fname:fname,lname:lname,city:city,country:country,phone:phone,email:email,userType:"addFriend",tag:"register"},  

									success: function(data)    // A function to be called if request succeeds

									{

										 $(".loader").hide();

									console.log(data);

									 if(data.success == 1)

									 {

										 $(".regErrors").css({"dilay":"block","color":"green"});

										 $(".regErrors").text(data.msg);

										  $('body').scrollTo('.regErrors',{duration:'slow', offsetTop : '50'});

										 setTimeout(function(){

											

											 alert("Friends Added Succesfully!");

										// location.href="centre-announcements.php";

										}, 4000);

									 }

									 else

									 {

										  $(".regErrors").css({"dilay":"block","color":"red"});

										 $(".regErrors").text(data.msg);

										 $('body').scrollTo('.regErrors',{duration:'slow', offsetTop : '50'});

									 }

									} ,      

									 error: function () {

										alert("Registration Error!");

									}  

									 });

					
					//}

					*/

                               }
									//}
							   //}
										
									},      
									error: function () {

										alert("Email Checking Error!");

									}  

									 });
			//}

				};
				
		});	
				
	});	