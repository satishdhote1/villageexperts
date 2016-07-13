$(document).ready(function(){
		$(document).on("click",".mygroupsList",function(){
			var gmID = $(this).attr("id");
				$.ajax({
					url:'ajax.php',
					type: 'POST',
					dataType: "json",
					data: {email:email,pwd:pwd,userType:userType,tag:"login"},  
					success: function(data)
					{
						console.log(data);	
					},      
					error: function () {
						alert("not found!");
					}  
				});
		});
});