
  $(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
    //****************************************Friends manipulation*****************************************
    var i = 0;
    var FLeditFlag = 0;
    $('.flBtnEdit').attr('disabled','disabled');
    $('.flSave >button').attr('disabled','disabled');
    $('.flDelete >button').attr('disabled','disabled');

    //friends add button click
    $(document).on("click", ".flBtnConferenece", function () {
        i = 0;
        var flID = '';
        var memberName, memberId, imagePath, memberEmail;
        $('.flChk:checked').each(function (item) {
            var cur = $(this).parent().parent();
            flID = $(this).attr("id");
            memberName = cur.attr("dir");
            memberId = cur.attr("for");
            imagePath = cur.attr("memberImage");
            memberEmail = cur.attr("memberEmail");
            i++;        
        });

        $("#flRow" + flID).css("background-color", "#7851f7");
        if (i == 0) {
            if ($(".flChk").length > 0) {
                alert("Please select atleast one checkbox!");
            }
            else {
                alert("No one selected for conference");
            }
        }
        //else if (i > 1) { alert("Please select  one checkbox at a time to edit!"); }
        else {
            $(".flFname").focus();

            $(".connSuccess > span").text(memberName);
            $(".connSuccess").css("display", "block");
            //$("html, body").animate({ scrollTop: $(".connSuccess").scrollTop() }, 1000);//scroll to top

            $('html,body').animate({ scrollTop: 9999 }, 1000);
            setTimeout(function () {
                location.href = "connect.php?memberId=" + memberId + "&search=FaF&imagePath=" + imagePath + "&memberName=" + memberName + "&memberEmail=" + memberEmail + "&type=conference";
            }, 4000);
        }
    });

   //friendlist check button click
    $(document).on("change",".flChk",function(){
    flID = $(this).attr("id");
    curOBJ = $(this);
        
    if(this.checked) {
        $('.flDelete >button').removeAttr('disabled'); 
        $('.flChk').attr('disabled','disabled');
        curOBJ.removeAttr('disabled');
        //$('.flBtnEdit').removeAttr('disabled');
        $('.flBtnAdd >button').attr('disabled','disabled');
    }
    else
    {
        $('.flChk').removeAttr('disabled');
        $(".rmvReadonly"+flID).attr("readonly", "readonly"); 
        $('.flSave >button').attr('disabled','disabled');
        $('.flBtnAdd >button').removeAttr('disabled');
        $('.flDelete >button').attr('disabled','disabled');
    //$('.flBtnEdit').attr('disabled','disabled');
    }
    });

    //friends add button click
    $(document).on("click",".flBtnAdd",function(){
        $('.flDelete >button').attr('disabled','disabled');
        $('.flBtnAdd >button').attr('disabled','disabled');
        $( ".addNewRow" ).show("slow");
        $( "#fladdFname" ).focus();
        $('.flSave >button').removeAttr('disabled');

        //disable expert panel
        $('.elBtnAdd >button').attr('disabled','disabled');
        //$('.elDelete >button').attr('disabled','disabled');
        //$('.elSave >button').attr('disabled','disabled');
        $('.elCancel >button').attr('disabled','disabled');
    });

    
    //friends edit button click
    $(document).on("click",".flBtnEdit",function(){
        i=0;
        var flID = '';
        var fname = '';
        var lname = '';
        var email = '';
        var mobile = '';
        var city = '';
        var country = '';

        //disable expert panel
        $('.elBtnAdd >button').attr('disabled','disabled');
        //$('.elDelete >button').attr('disabled','disabled');
        // $('.elSave >button').attr('disabled','disabled');
        $('.elCancel >button').attr('disabled','disabled');

        $('.flChk:checked').each(function (item) {
          var cur = $(this).parent();
          flID = $(this).attr("id");
          /*fname = cur.next().text();
          lname = cur.next().next().text();
          email = cur.next().next().next().text();
          mobile = cur.next().next().next().next().text();
          city = cur.next().next().next().next().next().text();
          country = cur.next().next().next().next().next().next().text();*/
          i++;
          //alert("fdrewe");          
        });

        $("#flRow"+flID).css("background-color", "#7851f7");
        //alert(fname+lname+email+mobile+city+country);
        if(i== 0){
          if ($(".flChk").length > 0) {
            alert("Please select atleast one checkbox!");
          }
          else
          {
            alert("Nothing to edit!");
          }

        }
        else if (i>1) { alert("Please select  one checkbox at a time to edit!"); }
        else{
            $( ".flFname" ).focus();
            $(".rmvReadonly"+flID).removeAttr("readonly"); 
            $("#flEmail"+flID).attr("readonly", "readonly"); 
            $('.flSave >button').removeAttr('disabled');
            FLeditFlag = 1;
        }

    });

      //save friend
    $(document).on("click",".flSave",function(){
        $('.flSave >button').attr('disabled','disabled');
        $('.flDelete >button').removeAttr('disabled');
        $('.flBtnAdd >button').removeAttr('disabled');

        //expert panel
        $('.elBtnAdd >button').removeAttr('disabled');
        $('.elDelete >button').removeAttr('disabled');
        $('.elSave >button').removeAttr('disabled');
        $('.elCancel >button').removeAttr('disabled');


        i=0;
        var checkExists = 0;
        var flID = '';
        var fname = '';
        var lname = '';
        var email = '';
        var mobile = '';
        var city = '';
        var country = '';
        var loggedID = $(".loggedID").val();
                
        var tag = '';
      
                if(FLeditFlag == 1)
                {
                  tag = "editFriendss"

                  $('.flChk:checked').each(function (item) {
                    var cur = $(this).parent();
                    var curOBJ = $(this);
                    curOBJ.removeAttr('disabled');
                    flID = $(this).attr("id");
                    fname = $('#flFname'+flID).val();
                    lname =  $('#flLname'+flID).val();
                    email = $('#flEmail'+flID).val();
                    mobile = $('#flMobile'+flID).val();
                    city = $('#flCity'+flID).val();
                    country = $('#flCountry'+flID).val();
                    i++;
                    //alert("fdrewe");

                         
                  });
                }
                else if(FLeditFlag == 0)
                {
                   tag = "addFriendss"
                   $( ".addNewRow" ).hide("slow");

                   fname = $('.fladdFname').val();
                    lname =  $('.fladdLname').val();
                    email = $('.fladdEmail').val();
                    mobile = $('.fladdMobile').val();
                    city = $('.fladdCity').val();
                    country = $('.fladdCountry').val();

                    /*$.ajax({

                            url:'ajax.php',
                            type: 'POST',
                            dataType: "json",
                            cache:"false",
                            async:false,
                            data: {email:$.trim(email),userType:"provider",tag:"checkEmail"},  
                            success: function(dataSR)    // A function to be called if request succeeds
                            {
                              if(dataSR.success == 1)
                              {
                                alert("Email already exist !");
                                checkExists = 1;
                                return false;
                                
                              }
                              else
                              {     
                                
                              }
                              
                            },      
                            error: function () {

                              alert("Email Checking Error!");

                            }  

                         }); 
                         */

                }
                if(email != ""  && isEmail(email))
                {

                      if(parseInt(checkExists) == 0)
                      {
                                  checkExists = 0;
                                  $.ajax({
                                        url:'ajax.php',
                                        type: 'POST',
                                        dataType: "json",
                                        data: {loggedID:loggedID,flID:flID,fname:fname,lname:lname,phone:mobile,email:email,city:city,country:country,userType:"addFriend",tag:tag},  
                                        success: function(data)    // A function to be called if request succeeds
                                        {
                                            FLeditFlag = 0;
                                            console.log(data);
                                            if(data.success == 1)
                                            {
                                            alert(data.msg);
                                            window.location.reload();
                                            }
                                            else
                                            {
                                            //alert();
                                            }
                                        } ,      
                                        error: function () {
                                            FLeditFlag = 0;
                                            alert("Failed to Save!");
                                        }  
                                    });
                       }
                              




                    
    }
    else
    {
    $('.flSave >button').removeAttr('disabled');
    alert("Valid Email Must be provided!");
    }
  });

    //Friends Delete
    $(document).on("click",".flDelete",function(){
      i=0;
      var fname = '';
      var lname = '';
      var email = '';
      var mobile = '';
      var city = '';
      var country = '';
      var loggedID = $('.loggedID').val();
      //expert panel
          $('.elBtnAdd >button').removeAttr('disabled');
          //$('.elDelete >button').removeAttr('disabled');
          //$('.elSave >button').removeAttr('disabled');
          $('.elCancel >button').removeAttr('disabled');

      //$( "#flFname" ).focus();
      $('.flChk:checked').each(function (item) {
        var cur = $(this).parent();
        flID = $(this).attr("id");
        email = $('#flEmail'+flID).val();
        fname = $('#flFname'+flID).val();
        lname = $('#flLname'+flID).val();
        i++;
        //alert("fdrewe");          
      });
      //alert(fname+lname+email+mobile+city+country);
      if(i== 0){alert("Please select atleast one checkbox!");}
      else if (i>1) {alert("Please select  one checkbox at a time to edit!");}
      else{
      var r = confirm("Are you Sure - You want to Delete "+fname+" "+lname+"?");
      if (r == true) {
          $.ajax({
          url:'ajax.php',
          type: 'POST',
          dataType: "json",
          data: {fname:fname,lname:lname,email:email,tag:"deleteFriendss",isExpertss:"NO",loggedID:loggedID},  
          success: function(data)    // A function to be called if request succeeds
          {
            console.log(data);
            if(data.success == 1)
            {
              alert(data.msg);
              window.location.reload();
            }
            else
            {
            //alert();
            }
          } ,      
          error: function () {
            alert("Failed to Save!");
          }  

          });
       } else {
        // txt = "You pressed Cancel!";
       }
      }
    });

    //friends cancel button click
    $(document).on("click",".flCancel",function(){
        FLeditFlag = 0 ;
        //expert panel
          $('.elBtnAdd >button').removeAttr('disabled');
          //$('.elDelete >button').removeAttr('disabled');
          //$('.elSave >button').removeAttr('disabled');
          $('.elCancel >button').removeAttr('disabled');

        $('.flSave >button').attr('disabled','disabled');
        $('.flChk:checked').each(function (item) {
        var cur = $(this).parent();
        var curOBJ = $(this);
        curOBJ.removeAttr("checked");
        curOBJ.removeAttr('disabled');
        //alert("fdrewe");          
        });
        location.reload();
    });


//****************************************Experts manipulation*****************************************
var j = 0;
var ELeditFlag = 0;
$('.elBtnEdit').attr('disabled','disabled');
$('.elSave >button').attr('disabled','disabled');
$('.elDelete >button').attr('disabled','disabled');
 
   //friendlist check button click


$(document).on("click",".elCancel",function(){
    ELeditFlag = 0 ;
    //expert panel
          $('.elBtnAdd >button').removeAttr('disabled');
          //$('.elDelete >button').removeAttr('disabled');
          //$('.elSave >button').removeAttr('disabled');
          $('.elCancel >button').removeAttr('disabled');
            $('.elSave >button').attr('disabled','disabled');
    $('.elChk:checked').each(function (item) {
                    var cur = $(this).parent();
                    var curOBJ = $(this);
                    curOBJ.removeAttr("checked");
                    //alert("fdrewe");          
                  });
            location.reload();
});

    //friendlist check button click
        $(document).on("change",".elChk",function(){
            elID = $(this).attr("id");
            curOBJ = $(this);
              
        if(this.checked) {
          $('.elDelete >button').removeAttr('disabled');
          $('.elChk').attr('disabled','disabled');
            curOBJ.removeAttr('disabled');
        //$('.flBtnEdit').removeAttr('disabled');
        $('.elBtnAdd >button').attr('disabled','disabled');
        }
        else
        {
          $('.elChk').removeAttr('disabled');
            $(".rmvReadonly"+elID).attr("readonly", "readonly"); 
        $('.elSave >button').attr('disabled','disabled');
        $('.elBtnAdd >button').removeAttr('disabled');
        $('.elDelete >button').attr('disabled','disabled');
        //$('.flBtnEdit').attr('disabled','disabled');
        }
        });

        //friends add button click
        $(document).on("click",".elBtnAdd",function(){
          $('.elDelete >button').attr('disabled','disabled');
         $('.elBtnAdd >button').attr('disabled','disabled');
            $( ".ELaddNewRow" ).show("slow");
            $( "#eladdFname" ).focus();
            $('.elSave >button').removeAttr('disabled');

            //disable expert panel
       $('.flBtnAdd >button').attr('disabled','disabled');
        //$('.elDelete >button').attr('disabled','disabled');
         //$('.elSave >button').attr('disabled','disabled');
          $('.flCancel >button').attr('disabled','disabled');

        });

        //friends edit button click
        $(document).on("click",".elBtnEdit",function(){
            i=0;
            var elID = '';
            var fname = '';
            var lname = '';
            var email = '';
            var mobile = '';
            var city = '';
            var country = '';

            //disable expert panel
       $('.flBtnAdd >button').attr('disabled','disabled');
        //$('.elDelete >button').attr('disabled','disabled');
         //$('.elSave >button').attr('disabled','disabled');
          $('.flCancel >button').attr('disabled','disabled');

                $('.elChk:checked').each(function (item) {
                    var cur = $(this).parent();
                    elID = $(this).attr("id");
                    /*fname = cur.next().text();
                    lname = cur.next().next().text();
                    email = cur.next().next().next().text();
                    mobile = cur.next().next().next().next().text();
                    city = cur.next().next().next().next().next().text();
                    country = cur.next().next().next().next().next().next().text();*/
                    i++;
                    //alert("fdrewe");          
                });
                $("#elRow"+elID).css("background-color", "#7851f7");
                //alert(fname+lname+email+mobile+city+country);
                if(i== 0){
                    if ($(".flChk").length > 0) {
                        alert("Please select atleast one checkbox!");
                    }
                    else
                    {
                        alert("Nothing to edit!");
                    }

                }
                else if (i>1) {alert("Please select  one checkbox at a time to edit!");}
                else{

                    $( "#elFname" ).focus();
                    $(".rmvReadonly"+elID).removeAttr("readonly"); 
                    $("#elEmail"+elID).attr("readonly", "readonly"); 
                    $(".elSave >button").removeAttr("disabled");
                    ELeditFlag = 1;
                    
                }
           });

            //save friend
        $(document).on("click",".elSave",function(){
            $('.elSave >button').attr('disabled','disabled');
            $('.elDelete >button').removeAttr('disabled');
            $('.elBtnAdd >button').removeAttr('disabled');
            //expert panel
          $('.flBtnAdd >button').removeAttr('disabled');
          //$('.elDelete >button').removeAttr('disabled');
          //$('.elSave >button').removeAttr('disabled');
          $('.flCancel >button').removeAttr('disabled');
            i=0;
            var checkExists = 0;
            var elID = '';
            var fname = '';
            var lname = '';
            var email = '';
            var mobile = '';
            var city = '';
            var country = '';
            var loggedID = $(".loggedID").val();
                
            var tag = '';
            
                if(ELeditFlag == 1)
                {
                  tag = "editFriendss"

                  $('.elChk:checked').each(function (item) {
                    var cur = $(this).parent();
                    var curOBJ = $(this);
                    elID = $(this).attr("id");
                    fname = $('#elFname'+elID).val();
                    lname =  $('#elLname'+elID).val();
                    email = $('#elEmail'+elID).val();
                    mobile = $('#elMobile'+elID).val();
                    city = $('#elCity'+elID).val();
                    country = $('#elCountry'+elID).val();
                    i++;
                    //alert("fdrewe");          
                  });

                  
                }
                else if(FLeditFlag == 0)
                {
                   tag = "addFriendss"
                   $( ".ELaddNewRow" ).hide("slow");

                   fname = $('.eladdFname').val();
                    lname =  $('.eladdLname').val();
                    email = $('.eladdEmail').val();
                    mobile = $('.eladdMobile').val();
                    city = $('.eladdCity').val();
                    country = $('.eladdCountry').val();

                    /*$.ajax({
                            url:'ajax.php',
                            type: 'POST',
                            dataType: "json",
                            cache:"false",
                            async:false,
                            data: {email:$.trim(email),userType:"provider",tag:"checkEmail"},  
                            success: function(dataSR)    // A function to be called if request succeeds
                            {
                              if(dataSR.success == 1)
                              {
                                alert("Email already exist !");
                                checkExists = 1;
                                return false;
                                
                              }
                              else
                              {
                                  
                              }
                           },      
                            error: function () {
                                FLeditFlag = 0;
                                alert("Failed to Save!");
                            }  
                        });*/

                }
            if(email != "" && isEmail(email))
            {
                            if(parseInt(checkExists) == 0)
                            {
                        
                                    checkExists = 0;  
                                    $.ajax({
                                    url:'ajax.php',
                                    type: 'POST',
                                    dataType: "json",
                                    data: {loggedID:loggedID,flID:elID,fname:fname,lname:lname,phone:mobile,email:email,city:city,country:country,userType:"addFriend",tag:tag,isexpert:"yes"},  
                                    success: function(data)    // A function to be called if request succeeds
                                    {
                                        FLeditFlag = 0;
                                        console.log(data);
                                        if(data.success == 1)
                                        {
                                        alert(data.msg);
                                        window.location.reload();
                                        }
                                        else
                                        {
                                        //alert();
                                        }
                                    } ,      
                                    error: function () {
                                        FLeditFlag = 0;
                                        alert("Failed to Save!");
                                    }  
                                    });
                              }
                              
        }
        else
        {
        $('.elSave >button').removeAttr('disabled');
        alert("Valid Email Must be provided!");
        }
    });

        //Friends Delete
        $(document).on("click",".elDelete",function(){
            i=0;
            var fname = '';
            var lname = '';
            var email = '';
            var mobile = '';
            var city = '';
            var country = '';
            var loggedID = $('.loggedID').val();
            $('.flBtnAdd >button').removeAttr('disabled');
          //$('.elDelete >button').removeAttr('disabled');
          //$('.elSave >button').removeAttr('disabled');
          $('.flCancel >button').removeAttr('disabled');

           

            //$( "#flFname" ).focus();
            $('.elChk:checked').each(function (item) {
                var cur = $(this).parent();
                flID = $(this).attr("id");
                email = $('#elEmail'+flID).val();
                 fname = $('#elFname'+flID).val();
                lname = $('#elLname'+flID).val();
                i++;
                //alert("fdrewe");          
            });
          //alert(fname+lname+email+mobile+city+country);
          if(i== 0){alert("Please select atleast one checkbox!");}
          else if (i>1) {alert("Please select  one checkbox at a time to edit!");}
          else{
            var r = confirm("Are you Sure - You want to Delete "+fname+" "+lname+"?");
            if (r == true) {
                    $.ajax({
                    url:'ajax.php',
                    type: 'POST',
                    dataType: "json",
                    data: {fname:fname,lname:lname,email:email,tag:"deleteFriendss",isExpertss:"YES",loggedID:loggedID},  
                    success: function(data)    // A function to be called if request succeeds
                    {
                        console.log(data);
                        if(data.success == 1)
                        {
                            alert(data.msg);
                            window.location.reload();
                        }
                        else
                        {
                        //alert();
                        }
                    } ,      
                    error: function () {
                        alert("Failed to Save!");
                    }  

                    });
             } else {
                // txt = "You pressed Cancel!";
             }
          }
        });


//Connection code
$(document).on("click",".FLconnectMember",function(){
        var memberName= $(this).attr("dir");
        $(".connSuccess > span").text(memberName);
        $(".connSuccess").css("display","block");
        //$("html, body").animate({ scrollTop: $(".connSuccess").scrollTop() }, 1000);//scroll to top
        var memberId =  $(this).attr("for"); 
        var imagePath =  $(this).attr("memberImage");
        var memberEmail= $(this).attr("memberEmail"); 
        $('html,body').animate({ scrollTop: 9999 }, 1000);
        setTimeout(function(){
            location.href="connect.php?memberId="+memberId+"&search=FaF&imagePath="+imagePath+"&memberName="+memberName+"&memberEmail="+memberEmail;
        }, 4000);

    });

$(document).on("click",".ELconnectMember",function(){
      //alert("test");
      var memberName= $(this).attr("dir");
      $(".connSuccess > span").text(memberName);
      $(".connSuccess").css("display","block");
      //$("html, body").animate({ scrollTop: $(".connSuccess").scrollTop() }, 1000);//scroll to top
      var memberId =  $(this).attr("for"); 
      var imagePath =  $(this).attr("memberImage");
      var memberEmail= $(this).attr("memberEmail"); 
      $('html,body').animate({ scrollTop: 9999 }, 1000);
       setTimeout(function(){
       location.href="connect.php?memberId="+memberId+"&search=FaF&imagePath="+imagePath+"&memberName="+memberName+"&memberEmail="+memberEmail;

      }, 4000);

    });
    //Make APPOINTMENT button click
    $(document).on("click",".appoint",function(){
            var email = $(this).attr("emails");
            var recieverFname = $(this).attr("names");
            var senderEmail = $(this).attr("seekerEmail");
            var senderName = $(this).attr("seekerName");
            //var appointTime =  $(this).val();
       window.location.href = "Make-Appointment.php?email="+email+"&recieverFname="+recieverFname+"&senderEmail="+senderEmail+"&senderName="+senderName;
    });

              
              
              

});
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function submitUserRow() {

}