$(document).ready(function(){
var $document = $(document);
     var selector = '[data-rangeslider]';
     var $inputRange = $(selector); 
	 
     function valueOutput(element) {
		// alert(element.value);
         var value = element.value;
         var output = $("#js-output");//element.parentNode.getElementsByTagName('output')[0];
         output.text(value);
		 if(value!=parseInt(1))
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
      //Experience range slider
	 var selectorExp = '[data-rangeslider2]';
     var $inputRange2 = $(selectorExp); 
	 
     function valueOutput2(element) {
		// alert(element.value);
         var value = element.value;
         var output = $("#js-outputExperience");//element.parentNode.getElementsByTagName('output')[0];
         output.text(value);
		 if(value!=parseInt(5))
		 $(".experience").val(value);
		 $(".ExperienceIDS").val(getExpID(value));
     } /** * Initial value output */
     for (var i = $inputRange2.length - 1; i >= 0; i--) {
         valueOutput2($inputRange2[i]);
     } /** * Update value output */
     $document.on('input', selectorExp, function (e) {
         valueOutput2(e.target);
     }); /** * Initialize the elements */
     $inputRange2.rangeslider({
         polyfill: false,
		 fillClass: 'rangeslider__fill2'
     });
     function getExpID(value){
		 
		 if(value <=5)
		 return 1
		 else if(value <=10)
		 return 2
		 else if(value <=15)
		 return 3
		 else if(value <=20)
		 return 3
		 else if(value <=25)
		 return 4
		 else
		 return 5
		 
	 }
     
	var allVals = [];
 	var allIDs = [];
     /* get subexperties  */
     $(document).on("click",".expertiesLabel",function() {
     	     $(".loader-exp").show();
            var expertId = $(this).attr("for");
	    var expertValue = $(this).attr("dir");
	      $(".specialisation").val(expertValue);
	      $(".SpecialisationIDS").val(expertId);
			$.ajax({
				type:"POST",
					url:"getSearchData.php",
        	data:{getDataOf:"subSpecial",id:expertId},
        	dataType:'json',
          success: function (result) {
          	$(".loader-exp").hide();
                  console.log(result);
              if(result.success == 1)
               {
                  $("#subSpecialClick").removeClass("disable-section");
                   console.log(result.success);
                    var resultData = '';
                    $(".searchHeader").text("Sub Specialization");
                  	$.each(result.datas, function(i, item) {
    									var id = item.sub_specialisation_id;
                    	var values = item.sub_specialisation;
                    	var images = item.SubSpImages;
						 resultData=resultData+'<li class="bg-gray subE'+id+'  subExp removeSubExp" id=" "><div class="search-profile text-center"><div class="img-provider"><img src="images/SubSpecialization/'+images+'"></div><p class=""><a href="javascript:void(0);" class="search-parson-position text-center subExpertiesLabel" for="'+id+'" dir="'+values+'" >'+values+'</a></p></div></li>';
						
                	});

                      $('.setSubSpecialData').html(resultData);
                      $('html, body').animate({scrollTop: $(".specialData").offset().top}, 2000);
					  $(".removeExp").each(function(index, element) {
					 	 var obj = $(this);
					  if(obj.hasClass("liBGColor"))
					  {
						 obj.removeClass("liBGColor");
					  }
					  });
    				$(".exp"+expertId).addClass("liBGColor");
						  }
						 else
						 {
							 alert("No data Found");
             }
        	},
           error: function (error) {
           	$(".loader-exp").hide();
		alert("Not Succesful !");
           }
        });

    });
    //SETTING VALUE OF subExpertiesLabel
    $(document).on("click",".subExpertiesLabel",function() {
		
		var expertId = $(this).attr("for");
		var expertValue = $(this).attr("dir");
		$(".subSpecial").val(expertValue);
		$(".SubSpecialIDS").val(expertId);
		$(".removeSubExp").each(function(index, element) {
					 var obj = $(this);
					  if(obj.hasClass("liBGColor"))
					  {
						 obj.removeClass("liBGColor");
					  }
					  });
					 // alert(".subE"+expertId);
		$(".subE"+expertId).addClass("liBGColor");
	  });
        //SETTING UP degreeLabel
        $(document).on("click",".degreeLabel",function() {
		var expertId = $(this).attr("for");
		var expertValue = $(this).attr("dir");
		$(".degree").val(expertValue);
		$(".DegreeIDS").val(expertId);
		$(".removeDeg").each(function(index, element) {
					  var obj = $(this);
					  if(obj.hasClass("liBGColor"))
					  {
						 obj.removeClass("liBGColor");
					  }
					  });
		$(".deg"+expertId).addClass("liBGColor");
	  });
	  
	  //SETTING UP experienceLabel
        $(document).on("click",".experienceLabel",function() {
		var expertId = $(this).attr("for");
		var expertValue = $(this).attr("dir");
		$(".experience").val(expertValue);
		$(".ExperienceIDS").val(expertId);
	  });
	  
	 $(document).on("click",".languageLabel",function() {
	   var flag =0;
       	   var obj = $(this);
		   expertId =  obj.attr("for");
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
		 /*$(".removeLan").each(function(index, element) {
					 
					  if($(this).hasClass("liBGColor"))
					  {
						 $(this).removeClass("liBGColor");
					  }
					  });*/
			if($(".lan"+expertId).hasClass("liBGColor"))
			{
				$(".lan"+expertId).removeClass("liBGColor");	
			}
			else
			{
		 		$(".lan"+expertId).addClass("liBGColor");
			}
         });
	  
});
