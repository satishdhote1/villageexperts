$(document).ready(function(){
	$(document).on("click",".btn-search-3-searchProvider ",function(){
		
		$("#search").submit();
	});
	 //rate per hour range slider
	 //*******************************************
	 
	var $element = $('[data-rangeslider]');
	var $handle;
	 $element .rangeslider({
      polyfill: false,
      onInit: function() {
      $handle = $('.rangeslider__handle', this.$range);
      updateHandle($handle[0], this.value);
     }
     }).on('input', function() {
      updateHandle($handle[0], this.value);
    });

    function updateHandle(el, val) {
      el.textContent = val;
      var output = $("#js-output");//element.parentNode.getElementsByTagName('output')[0];
      output.text(val);
	  if(val!=parseInt(0))
	  {
	  $(".rate").val(val);
	$(".RateIDS").val(val);
	}
	/*else if(val==parseInt(1)){console.log("sam--"+val);
		$(".rate").val("10");
	$(".RateIDS").val(val);
	}*/
	 }
	 /*else{
	 	$(".rate").val("0");
		$(".RateIDS").val("0");
	 }*/
 //End of rate per hour range slider

 //**********************************************

 //Experience range slider

   var $element2 = $('[data-rangeslider2]');
   var $handle2;
   $element2.rangeslider({
     polyfill: false,
	 fillClass: 'rangeslider__fill2',
     onInit: function() {
     $handle2 = $('.rangeslider__handle', this.$range);
     updateHandle2($handle2[0], this.value);
     }
    }).on('input', function() {
     updateHandle2($handle2[0], this.value);
    });

  function updateHandle2(el2, val2) {
    el2.textContent = val2;
    var output2 = $("#js-outputExperience");//element.parentNode.getElementsByTagName('output')[0];
         output2.text(getExpCat(val2));
		 if(val2!=parseInt(0))
		 $(".experience").val(val2);
		 $(".ExperienceIDS").val(getExpID(val2));
   }
	 
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
	  function getExpCat(value){
		 if(value <=5)
		 return "1-5";
		 else if(value <=10)
		 return "5-10";
		 else if(value <=15)
		 return "10-15";
		 else if(value <=20)
		 return "15-20";
		 else if(value <=25)
		 return "20-25";
		 else
		 return "25+";
	 }
 // End of Experience range slider	 
	 
	 
     //chckbox group check
     // the selector will match all input controls of type :checkbox
// and attach a click event handler 
/*
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
 */    
     
     
	var allVals = [];
 	var allIDs = [];
     /* get subexperties  */
     $(document).on("click",".expertiesLabel",function() {
     	     $(".loader-exp").show();
			 console.log($(this).attr("for"));
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
               /*
			    resultData = resultData + '<li class="modifi-list-item-2" id="'+id+'"><div class="col-xs-12  text-center" style="padding:0;"><div class="checkbox-icon"><img  src="images/SubSpecialization/'+images+'"></div></div><div class="col-xs-12 text-center" style="padding:0"><p class="block-text"><a href="javascript:void(0);" class="text-center">'+values+'</a></p></div><div class="col-xs-12 text-center"><div class="checkbox padding30" id="checkdiv" style="display:block;margin:7px 0px"><input type="checkbox" name="subSpecial[1][]" id="subSpecial" value="1" class="no-styles"><label for="subSpecial'+id+'" class="my-label"><span class="subExpertiesLabel" id="subExpertiesLabel" for="'+id+'" dir="'+values+'"></span></label><input type="hidden" name="paymentnonce" id="paymentnonce" value="" /></div></div><div class="setHooverSubExprt'+id+' removeSubExp" id=""></div></li>';
			   */
			   
			   resultData = resultData + '<li class="bg-gray exp removeExp subExpertiesLabel" id="'+id+'"  for="'+id+'" dir="'+values+'"><p class="porovider-title"><a href="#" class="search-parson-position text-center ">'+values+'</a></p></li>';
			   
                   });
		//	alert( $(".removeExp").offset().top);
                      $('.SUBspecialData').html(resultData);
                      
                      //For education data fill up 
                      resultData2 = '';
						$.each(result.educationData, function(i, item2) {
						var id2 = item2.EducationID;
						var values2 = item2.Education;
						//var images = item.SubSpImages;
						/*
						resultData = resultData + '<li class="modifi-list-item-2" id="'+id+'"><div class="col-xs-12  text-center" style="padding:0;"><div class="checkbox-icon"><img  src="images/SubSpecialization/'+images+'"></div></div><div class="col-xs-12 text-center" style="padding:0"><p class="block-text"><a href="javascript:void(0);" class="text-center">'+values+'</a></p></div><div class="col-xs-12 text-center"><div class="checkbox padding30" id="checkdiv" style="display:block;margin:7px 0px"><input type="checkbox" name="subSpecial[1][]" id="subSpecial" value="1" class="no-styles"><label for="subSpecial'+id+'" class="my-label"><span class="subExpertiesLabel" id="subExpertiesLabel" for="'+id+'" dir="'+values+'"></span></label><input type="hidden" name="paymentnonce" id="paymentnonce" value="" /></div></div><div class="setHooverSubExprt'+id+' removeSubExp" id=""></div></li>';
						*/
						resultData2 = resultData2 + '<li class="bg-gray exp removeExp degreeLabel" id="'+id2+'"  for="'+id2+'" dir="'+values2+'"><p class="porovider-title"><a href="#" class="search-parson-position text-center ">'+values2+'</a></p></li>';
						});
						//	alert( $(".removeExp").offset().top);
						$('.degreeData').html(resultData2);






                     //alert(  parseInt($(".moveExperties").height()));
                      //$('html,body').animate({scrollTop:  parseInt($(".moveSubSpecial").offset().top)-100}, 500,'swing');
					 $(".removeExp").each(function(index, element) {
					 
					  if($(this).hasClass("over"))
					  {
						 $(this).removeClass("over");
					  }
					  });
					 // $(".setHooverExprt"+expertId).addClass("overDisplay");
    					
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
					 
					  if($(this).hasClass("over"))
					  {
						 //$(this).removeClass("over");
					  }
					  });
		 //$(".setHooverSubExprt"+expertId).addClass("over");
		
		  //$('html,body').animate({scrollTop:  (parseInt($(".moveDegree").offset().top)- 100)}, 500,'swing');
	  });
        //SETTING UP degreeLabel
        $(document).on("click",".degreeLabel",function() {
		var expertId = $(this).attr("for");
		var expertValue = $(this).attr("dir");
		//alert(expertId+"=="+expertValue);
		$(".degree").val(expertValue);
		$(".DegreeIDS").val(expertId);
		 
		// $(".setHooverDegree"+expertId).addClass("over");
		 // $('html,body').animate({scrollTop:  parseInt($(".moveLang").offset().top)- 100}, 500,'swing');
	  });
	  
	  //SETTING UP experienceLabel
        $(document).on("click",".experienceLabel",function() {
		var expertId = $(this).attr("for");
		var expertValue = $(this).attr("dir");
		
		//$(".experience").val(expertValue);
		//$(".ExperienceIDS").val(expertId);
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
		 /*$(".removeLan").each(function(index, element) {
					 
					  if($(this).hasClass("over"))
					  {
						 $(this).removeClass("over");
					  }
					  });*/
		 // $(".setHooverLan"+expertId).addClass("checkbox-icon:hover over");
		   //$('html,body').animate({scrollTop:  (parseInt($(".moveExper").offset().top)- parseInt($(".moveExper").height()))}, 500,'swing');
         });
	  
});

