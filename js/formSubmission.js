$(document).ready(function() {

    $(document).on("click",".submitFP",function(){
		var email = $(".emailFP").val();
		if(email == "")
		{
			alert("Emial can not be empty!");
		}
		else
		{
			$.ajax({
					url:'ajax.php',
					type: 'POST',
					dataType: "json",
					data: {email:email,tag:"forgetPWD"},
					success: function(data)    // A function to be called if request succeed
					{
						console.log(data);
						if(data.success == 1)
						{
						alert("A password reset link has been sent to your email. Please check !");
						}
						else
						{
						alert("Sorry ! No account is associated with this email!");

						}
					 } ,
					 error: function () {
						alert("Network error Occured!");
					}

			});
		}

	});

    //Provider Click

    $(document).on("click", ".friendLoginButton", function() {
        var email = $(".friendEmail").val();
        var pwd = $(".friendPwd").val();
        var userType = $(".friendLoginHidden").val();
        if (email == "")
        {

            $(".SPerrors").css({
                "dilay": "block",
                "color": "red"
            });

            $(".SPerrors").text("Email can't be blank!");

        } else if (pwd == "") {

            $(".SPerrors").css({
                "dilay": "block",
                "color": "red"
            });

            $(".SPerrors").text("Password can't be blank!");

        } else {

            $(".SPloginLoader").show();

            $.ajax({
                url: 'ajax.php',
                type: 'POST',
                dataType: "json",
                data: {
                    email: email,
                    pwd: pwd,
                    userType: userType,
                    tag: "login"
                },

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
    $(document).on("click", ".SPsubmit", function(event) {
        if ($("#SSPform").valid() == true) {
            event.preventDefault();
            var email = $(".email").val();
            $.ajax({
                url: 'ajax.php',
                type: 'POST',
                dataType: "json",
                cache: "false",
                data: {
                    email: $.trim(email),
                    userType: "addFriend",
                    tag: "checkEmail"
                },

                success: function(dataSR) // A function to be called if request succeeds
                {
                    if (dataSR.success == 1) {
                        alert("Email already exist !");

                    } else {

                        $('#addFriend').unbind('submit').submit();

                    }
                },
                error: function() {

                    alert("Email Checking Error!");

                }

            });
            //}

        };

    });

});