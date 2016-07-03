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
                    	resultData=resultData+'<li class="bg-gray" id="'+id+'"><div class="search-profile text-center"><img src="images/SubSpecialization/'+images+'"><p class=""><a href="" class="search-parson-position text-center" id="'+id+'">'+values+'</a></p></div></li>';
                	});

                      $('.setSubSpecialData').html(resultData);
    
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
});
