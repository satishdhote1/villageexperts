$(window).load(function() {



   $(".btn-nav").on("click tap", function() {



     $(".nav-container").toggleClass("showNav hideNav").removeClass("hidden");



     $(this).toggleClass("animated");



	 //$(".search").text("Back");



   });







	$(".btn-nav").click();



 });



 



 $(document).ready(function(){
var $document = $(document);
     var selector = '[data-rangeslider]';
     var $inputRange = $(selector); 
	 
     function valueOutput(element) {
		// alert(element.value);
         var value = element.value;
         var output = $("#js-output");//element.parentNode.getElementsByTagName('output')[0];
         output.text(value);
		 $(".rate").val(value);
     } /** * Initial value output */
     for (var i = $inputRange.length - 1; i >= 0; i--) {
         valueOutput($inputRange[i]);
     } /** * Update value output */
     $document.on('input', selector, function (e) {
         valueOutput(e.target);
     }); /** * Initialize the elements */
     $inputRange.rangeslider({
         polyfill: false
     });
	 
//$("#lang-box").show();

 var allVals = [];

 var allIDs = [];

  $("#expertiseClick").click(function () {
    $(".ratePhour").hide();//HIDE RANGER
	 $(".loader-exp").show();



		   $.ajax({



					type:"POST",



					url:"getSearchData.php",



					data:{getDataOf:"Special"},



					dataType:'json',



					success: function (result) {



						console.log(result);



						if(result.success == 1)



						 {



							 $(".loader-exp").hide();



							 console.log(result.success);



								var resultData = '';



								$(".searchHeader").text("Experties");



								$.each(result.datas, function(i, item) {



									//console.log(item.images);



									var id = item.specialisation_id;



									var values = item.specialisation;



									var images = item.images;



									//result+='<option value="'+id+'">'+values+'</option>';



									resultData=resultData+'<div class="seclect-box"><div class="col-sm-3 no-padding"><div class="search-box"> <img src="images/specialization/'+images+'"> </div></div><div class="col-sm-7 no-padding"><p class="check-name">'+values+'</p></div><div class="col-sm-2"><div class="squaredOne"> <input type="checkbox" value="'+values+'" id="'+id+'" name="check"  class="expertiesCheckbox"/><label for="'+id+'" dir="'+values+'" class="expertiesLabel"></label></div></div><div class="clearfix"></div></div>';



									//console.log(item.sub_specialisation_id);



								});



								//console.log(resultData);



								$('.searchResult').html(resultData);



								//$(".loader-exp").hide();



								$("#lang-box").show();



								//alert(data);



						 }



						 else



						 {



							 $(".loader-exp").hide();



							 alert("No data Found");



						 }



					},



					 error: function (error) {



						 $(".loader-exp").hide();



						alert("Not Succesful !");



					 }



        });



		  



		  



		  



		  



    });



	$(document).on("click",".expertiesLabel",function() {
		$(".ratePhour").hide();//HIDE RANGER
		$(".expertiesCheckbox").attr("checked", false); //uncheck all checkboxes



  		$(this).prev().attr("checked", true); 



        /*if ($(this).is(':checked')) {*/



            var expertId = $(this).attr("for");



			var expertValue = $(this).attr("dir");



			$(".specialisation").val(expertValue);

			$(".SpecialisationIDS").val(expertId);



			$(".loader-exp").show();



			$.ajax({



					type:"POST",



					url:"getSearchData.php",



					data:{getDataOf:"subSpecial",id:expertId},



					dataType:'json',



					success: function (result) {



						console.log(result);



						if(result.success == 1)



						 {



							  $(".loader-exp").hide();



							 $("#subSpecialClick").removeClass("disable-section");



							 console.log(result.success);



								var resultData = '';



								$(".searchHeader").text("Sub Specialization");



								$.each(result.datas, function(i, item) {



									//console.log(item.images);



									var id = item.sub_specialisation_id;



									var values = item.sub_specialisation;



									var images = item.SubSpImages;



									//result+='<option value="'+id+'">'+values+'</option>';



									resultData=resultData+'<div class="seclect-box"><div class="col-sm-3 no-padding"><div class="search-box"> <img src="images/SubSpecialization/'+images+'"> </div></div><div class="col-sm-7 no-padding"><p class="check-name">'+values+'</p></div><div class="col-sm-2"><div class="squaredOne"> <input type="checkbox" value="'+values+'" id="'+id+'" name="check"  class="subExpertiesCheckbox"/><label class="subExpertiesLabel"for="'+id+'" dir="'+values+'"></label></div></div><div class="clearfix"></div></div>';



									//console.log(item.sub_specialisation_id);



								});



								//console.log(resultData);



								$('.searchResult').html(resultData);



								//$(".loader-exp").hide();



								//$("#lang-box").show();



								//alert(data);



						 }



						 else



						 {



							 $(".loader-exp").hide();



							 alert("No data Found");



						 }



					},



					 error: function (error) {



						 $(".loader-exp").hide();



						alert("Not Succesful !");



					 }



        });



			



		//}



			   



    });



	



	$(document).on("click",".subExpertiesLabel",function() {


			$(".ratePhour").hide();//HIDE RANGER
		 $(".subExpertiesCheckbox").attr("checked", false); //uncheck all checkboxes



  		//$(this).prev().attr("checked", true); 



        /*if ($(this).is(':checked')) {*/



            var expertId = $(this).attr("for");



			var expertValue = $(this).attr("dir");



			$(".subSpecial").val(expertValue);

			$(".SubSpecialIDS").val(expertId);

			



			



			



		//}



			   



    });



	$(document).on("click",".degreeClick",function() {



		
		$(".ratePhour").hide();//HIDE RANGER
		var expertValue = $(this).attr("dir");



			$(".degree").val(expertValue);

		 $(".loader-exp").show();



		   $.ajax({



					type:"POST",



					url:"getSearchData.php",



					data:{getDataOf:"degree"},



					dataType:'json',



					success: function (result) {



						console.log(result);



						if(result.success == 1)



						 {



							 $(".loader-exp").hide();



							 console.log(result.success);



								var resultData = '';



								$(".searchHeader").text("Degree");



								$.each(result.datas, function(i, item) {



									//console.log(item.images);



									var id = item.EducationID;



									var values = item.Education;



									var images = item.Image;



									//result+='<option value="'+id+'">'+values+'</option>';



									resultData=resultData+'<div class="seclect-box"><div class="col-sm-3 no-padding"><div class="search-box"> <img src="images/education/'+images+'"> </div></div><div class="col-sm-7 no-padding"><p class="check-name">'+values+'</p></div><div class="col-sm-2"><div class="squaredOne"> <input type="checkbox" value="'+values+'" id="'+id+'" name="check"  class="degreeCheckbox"/><label for="'+id+'" dir="'+values+'" class="degreeLabel"></label></div></div><div class="clearfix"></div></div>';



									//console.log(item.sub_specialisation_id);



								});



								//console.log(resultData);



								$('.searchResult').html(resultData);



								//$(".loader-exp").hide();



								$("#lang-box").show();



								//alert(data);



						 }



						 else



						 {



							 $(".loader-exp").hide();



							 alert("No data Found");



						 }



					},



					 error: function (error) {



						 $(".loader-exp").hide();



						alert("Not Succesful !");



					 }



        });



		  



			   



    });



	$(document).on("click",".degreeLabel",function() {

		$(".ratePhour").hide();//HIDE RANGER
		 $(".degreeCheckbox").attr("checked", false); //uncheck all checkboxes



  		//$(this).prev().attr("checked", true); 



        /*if ($(this).is(':checked')) {*/



            var expertId = $(this).attr("for");



			var expertValue = $(this).attr("dir");



			$(".degree").val(expertValue);

			$(".DegreeIDS").val(expertId);

		   



    });



$(document).on("click",".ExperienceClick",function() {

		$(".ratePhour").hide();//HIDE RANGER
		var expertValue = $(this).attr("dir");



			$(".experience").val(expertValue);

		 $(".loader-exp").show();



		   $.ajax({



					type:"POST",



					url:"getSearchData.php",



					data:{getDataOf:"experience"},



					dataType:'json',



					success: function (result) {



						console.log(result);



						if(result.success == 1)



						 {



							 $(".loader-exp").hide();



							 console.log(result.success);



								var resultData = '';



								$(".searchHeader").text("Experiences");



								$.each(result.datas, function(i, item) {



									//console.log(item.images);



									var id = item.ExperienceID;



									var values = item.Experience;



									var images = item.Image;



									//result+='<option value="'+id+'">'+values+'</option>';



									resultData=resultData+'<div class="seclect-box"><div class="col-sm-3 no-padding"><div class="search-box"> <img src="images/education/'+images+'"> </div></div><div class="col-sm-7 no-padding"><p class="check-name">'+values+'</p></div><div class="col-sm-2"><div class="squaredOne"> <input type="checkbox" value="'+values+'" id="'+id+'" name="check"  class="experienceCheckbox"/><label for="'+id+'" dir="'+values+'" class="experienceLabel"></label></div></div><div class="clearfix"></div></div>';



									//console.log(item.sub_specialisation_id);



								});



								//console.log(resultData);



								$('.searchResult').html(resultData);



								//$(".loader-exp").hide();



								$("#lang-box").show();



								//alert(data);



						 }



						 else



						 {



							 $(".loader-exp").hide();



							 alert("No data Found");



						 }



					},



					 error: function (error) {



						 $(".loader-exp").hide();



						alert("Not Succesful !");



					 }



        });



		  



			   



    });



	$(document).on("click",".experienceLabel",function() {

	$(".ratePhour").hide();//HIDE RANGER
	$(".experienceCheckbox").attr("checked", false); //uncheck all checkboxes



  		//$(this).prev().attr("checked", true); 



        /*if ($(this).is(':checked')) {*/



            var expertId = $(this).attr("for");



			var expertValue = $(this).attr("dir");



			$(".experience").val(expertValue);

			$(".ExperienceIDS").val(expertId);

		   



    });



	$(document).on("click",".rateClick",function() {
									$('.searchResult').html("");
									$(".ratePhour").show();

								//$('.searchResult').html(resultData);
								$(".searchHeader").text("Rate per hour");
								$("#lang-box").show();
								
    });

	
	



	$(document).on("click",".languageClick",function() {

		$(".ratePhour").hide();//HIDE RANGER
	 $(".loader-exp").show();



		   $.ajax({



					type:"POST",



					url:"getSearchData.php",



					data:{getDataOf:"language"},



					dataType:'json',



					success: function (result) {



						console.log(result);



						if(result.success == 1)



						 {



							 $(".loader-exp").hide();



							 console.log(result.success);



								var resultData = '';



								$(".searchHeader").text("Language");



								$.each(result.datas, function(i, item) {



									//console.log(item.images);



									var id = item. language_id;



									var values = item.languages;



									var images = item.images;



									//result+='<option value="'+id+'">'+values+'</option>';



									resultData=resultData+'<div class="seclect-box"><div class="col-sm-3 no-padding"><div class="search-box"> <img src="images/Languages/'+images+'"> </div></div><div class="col-sm-7 no-padding"><p class="check-name">'+values+'</p></div><div class="col-sm-2"><div class="squaredOne"> <input type="checkbox" value="'+values+'" id="'+id+'" name="check['+id+']"  class="languageCheckbox"/><label for="'+id+'" dir="'+values+'" class="languageLabel"></label></div></div><div class="clearfix"></div></div>';



									//console.log(item.sub_specialisation_id);



								});



								//console.log(resultData);



								$('.searchResult').html(resultData);



								//$(".loader-exp").hide();



								$("#lang-box").show();



								//alert(data);



						 }



						 else



						 {



							 $(".loader-exp").hide();



							 alert("No data Found");



						 }



					},



					 error: function (error) {



						 $(".loader-exp").hide();



						alert("Not Succesful !");



					 }



        });



		  



			   



    });



		$(document).on("click",".languageLabel",function() {

				var flag =0;

				var obj = $(this);

				if (obj.attr("checked")) {

					flag = 1;

					 expertValue = obj.attr("dir");

					 expertId =  obj.attr("for");

					obj.attr("checked", false); 

					console.log(allVals);

					console.log(allIDs);   

					allVals = jQuery.grep(allVals, function(value) {

					  return value != expertValue;

					});

					allIDs = jQuery.grep(allIDs, function(value) {

					  return value != expertId;

					});

					console.log(allVals); 

					console.log(allIDs); 

				}

				 //$(".languageCheckbox").attr("checked", false); //uncheck all checkboxes

		

				//$(this).prev().attr("checked", true);

					obj.attr("checked", true); 

				   var expertId = obj.attr("for");

				   var expertValue = obj.attr("dir");

					

				   if(flag ==0){

						 allVals = [];allIDs = [];

					  $(".languageLabel").each(function () {

						  console.log("test1");  

						 if( $(this).attr("checked"))

						 {

							 expertValue = $(this).attr("dir");

							 expertId =  $(this).attr("for");

							 allVals.push(expertValue);

							  allIDs.push(expertId);

								console.log(allIDs);

							console.log(allVals); 

						 }

						});

					}

					

					

					  $(".language").val(allVals);

					 $(".LanguageIDS").val(allIDs);

			//console.log($(".language").val());      



		   



       });

	



	$("#expertiesCheckbox").click(function () {



	 



         // $("#expertise-box").show();



    });



});