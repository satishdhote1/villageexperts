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
     
     //chckbox group check
     // the selector will match all input controls of type :checkbox
// and attach a click event handler 
$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
     
     
     
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
                    	
                    	 
              resultData=resultData+'<li class="modifi-list-item-2" id="'+id+'"><div class="col-xs-4" style="padding:0;"><img src="images/SubSpecialization/'+images+'" class="img-responsive"></div><div class="col-xs-5" style="padding:0"><p class="block-text"><a href="javascript:void(0);" class="text-center">'+values+'</a></p></div><div class="col-xs-2"><div class="checkbox padding30" id="checkdiv" style="display:block;"><input type="checkbox" name="dsetting" id="defaultcard" value="1" class="no-styles"><label for="defaultcard" class="my-label"><span class="subExpertiesLabel" id="subExpertiesLabel" for="'+id+'" dir="'+values+'"></span></label><input type="hidden" name="paymentnonce" id="paymentnonce" value="" /></div></div><div class="" id="setHooverSubExprt"></div></li>';'
             
                   });

                      $('.setSubSpecialData').html(resultData);
                      $('html, body').animate({scrollTop: $(".specialData").offset().top}, 2000);
    
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
	  });
        //SETTING UP degreeLabel
        $(document).on("click",".degreeLabel",function() {
		var expertId = $(this).attr("for");
		var expertValue = $(this).attr("dir");
		$(".degree").val(expertValue);
		$(".DegreeIDS").val(expertId);
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
         });
	  
});
