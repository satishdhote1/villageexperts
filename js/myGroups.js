
$(document).ready(function(){
	/*
	if ($('.rightPanelShow').length) {
		//alert("#"+$('.rightPanelShow').attr("id"));
    $("#"+$('.rightPanelShow').attr("id")).click();
}
	*/
	
		$(document).on("click",".onlineMembersLI",function(){
			//alert("test");
			$(".connectMember").css("display","block");
			 $(this).addClass("active");
			var memberName =  $(this).attr("dir");
			var memberId =  $(this).attr("id");
			$(".connectMember").attr("dir",memberName);
			$(".connectMember").attr("for",memberId);
			$('html,body').animate({ scrollTop: 9999 }, 1000);
			console.log($(".connectMember").attr("dir"));
			
		});
		$(document).on("click",".connectMember",function(){
			//alert("test");
			$(".connSuccess > span").text($(".connectMember").attr("dir"));
			$(".connSuccess").css("display","block");
			//$("html, body").animate({ scrollTop: $(".connSuccess").scrollTop() }, 1000);//scroll to top
			var memberId =  $(this).attr("for"); 
			$('html,body').animate({ scrollTop: 9999 }, 1000);
			 setTimeout(function(){
			 location.href="connect.php?memberId="+memberId+"&my_groups=FaF";

			}, 1000);

		});
});












/*

var gmID = $(this).attr("id");
			var gmName = $(this).attr("dir");
			$(this).addClass("active");
			$(".newGMbutton >a").attr("href","add-new-member.php?id="+gmID);
			
			$('.membersPanelTitle').text(gmName+' Members');
				$.ajax({
							url:'groupsConnection.php',
							type: 'POST',
							dataType: "json",
							data: {gmID:gmID,tag:"fetchmembers"},  
							success: function(data)
							{
								console.log(data);
								if(data.success == 1)
								 {
									 if(data.hasOwnProperty('dataL'))
									 {
										 var data1 = '';
										 $.each(data.dataL, function(index, element) {
											console.log(element); 
											data1 = data1+'<li class="list-group-item" id="'+element.gm_id+'"><a href="javascript:void(0);"><span class="profile-img-mmbr"><img src="images/memberPhotos/'+element.gm_image+'"></span>'+element.gm_name+'</a></li>';
									 
									 });
									$(".onlineMembers").html(data1);
										
									 
								     }
									 if(data.hasOwnProperty('dataNL'))
									 {
										 var data2 = '';
										 $.each(data.dataNL, function(index, element) {
											console.log(element);
										data2 = data2+'<li class="list-group-item" id="'+element.gm_id+'"><a href="javascript:void(0);"><span class="profile-img-mmbr"><img src="images/memberPhotos/'+element.gm_image+'"></span>'+element.gm_name+'</a></li>';
									 
									 });
									$(".offlineMembers").html(data2);
										//$(".rightGMpanel").show();
									 
								     }
									 $(".rightGMpanel").show();
									$(".newGMbutton").show();
									
								 }
								 else
								 {
									alert("Currently Group "+gmName+" has no Members") ;
									$(".newGMbutton").show();
								 }
								
							} ,      
							 error: function () {
								alert("not found!");
							}  
							 });

*/