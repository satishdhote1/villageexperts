$(document).ready(function(){
	
	
	 $(document).on("change",".mainCategory",function() {
		
		
		 $(".loader-exp").show();
            var mainCategory = $('select[name=mainCategory]').val();
	   		if(mainCategory != ""){
				$.ajax({
				type:"POST",
					url:"getAjaxData.php",
        	data:{mainCategory:mainCategory,tag:"getSub"},
        	dataType:'json',
          success: function (result) {
          	$(".loader-exp").hide();
                  console.log(result);
				  var resultData='';
              if(result.success == 1)
               {
				// console.log(result.datas);
				 
				   resultData = resultData + '<option value="">Select</option>';
                  	$.each(result.datas, function(i, item) {
    					resultData = resultData + '<option value="'+item.id+'" dir="'+item.val+'">'+item.val+'</option>';
						
                   });

                      $('.subCategory').html(resultData);
                      $('html, body').animate({scrollTop: $(".mainCategory").offset().top}, 2000);
    
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
			}
		 
	 });
	  $(document).on("change",".subCategory",function() {
		  var subCategory = $('option:selected', this).attr('dir');
		  var subCategoryID = $('option:selected', this).val();
		  if(subCategory != ""){
			  $(".editMainCategory").val(subCategory);
			   $(".editMainCategoryID").val(subCategoryID);
		  }
		  
	  });
	
	
	
	
	
	
	
	
});