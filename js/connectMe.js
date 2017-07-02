$(document).ready(function(e) {
	
	worker();
	
	var i=0;

	function worker() {
		console.log("Worker " , i++);
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
				if(result.success == 1){
					alert(" Refirecting to Communication page"  );
				 	window.location.href="https://"+window.location.hostname+":8084/#"+result.timestamp+"?app=webrtc&name="+result.logged_user_fname;
				 	//document.location.origin+
				 	console.log("if: connectme.php post is succesfull " , result);
				}else{
					console.log("else: connectMe.php is not sucesfull" , result);
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
