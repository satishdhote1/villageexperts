$(document).ready(function(e) {
    worker();
	
	var i=0;
	function worker() {
		console.log("test"+i++);
		//if(i==10)return 0;
	//alert("data");
	
				$.ajax({
				type:"POST",
					url:"connectMe.php",
        	//data:{getDataOf:"subSpecial",id:expertId},
        	dataType:'json',
			contentType: false,
            processData: false,
			cache: false,
   			 global: false,
			 async:false,
          success: function (result) {
			  if(result.success == 1)
				{		
				 window.location.href=document.location.origin+":8084/?s=1#/";//https://www.villageexperts.com
				 console.log("if: "+result);
				}
					else{
						console.log("else: "+result);
				 // Schedule the next request when the current one's complete
					  setTimeout(worker, 6000);	
					  }
					  		
			  
			  },
           error: function (error) {
		console.log("Not Succesful !");
           }
        });
					  
	
}
	
});