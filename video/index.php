<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>village expart</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/mainstyle.css" rel="stylesheet">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bounce-style.css">
</head>
<style>
.over-lap {
	display: block !important
}
.video-section {
	margin-top: 20px;
}
.block-one {
	border: 1px solid #fff;
}
.block-two {
	
	padding-top: 0px;
	
}
.inner-block {
	background: #fff;
	height: 700px;
	margin-top: 15px;
	margin-bottom: 15px;
}
.time-function {
	width: 99%;
	background: #000;
	text-align: center;
	color: #fff;
	padding: 5px 0px;
	font-family: Helvetica;
	font-size: 17px;
	letter-spacing: 1px;
	text-transform: uppercase;
}
.controler-block {
	background: #c1c2ff;
	padding: 3px 0px;
	border-top: 1px solid #cccdff;
	border-bottom: 1px solid #cccdff;
	border-radius:5px;
}
.border-right {
	border-right: 2px solid #000;
}
.btn-modify-video {
	background: rgba(0,0,0,0);
	border: 0px;
	padding: 0px;
	color: #f60000;
	font-size: 22px;
}
.btn-modify-chat {
	background: rgba(0,0,0,0);
	border: 0px;
	color: #fff;
	font-size: 16px;
	padding: 3px 0px
}
.btn-modify-chat .fa {
	line-height: 19px;
	margin: 0;
	padding: 0;
}
.btn-modify-video .fa {
	text-shadow: 1px 1px 1px #a50000;
	line-height: 19px;
	margin: 0;
	padding: 0;
}
.controler-video .fa {
	text-shadow: 1px 1px 1px #a50000;
	line-height: 24px;
	margin: 0;
	padding: 0;
	color: #fff;
	width: 25px;
	height: 25px;
	background: #787eff;
	font-size: 14px;
	border-radius: 50%;
}
.btn-modify-chat.focus, .btn-modify-chat:focus, .btn-modify-chat:hover {
	color: #FF3737;
}
.btn.active.focus, .btn.active:focus, .btn.focus, .btn.focus:active, .btn:active:focus, .btn:focus {
	outline: none;
}
.btn-modify-video.focus, .btn-modify-video:focus, .btn-modify-video:hover {
	color: #fff;
}
.btn-block.focus, .btn-block:focus, .btn-block:hover {
	color: #fff;
	background: #e30000;
}
.btn-block {
	width: 100%;
	background: #54556f;
	border-radius: 2px;
	margin: 2px 0px;
	border: 0px;
	color: #fff;
}
.btn-block:hover {
	background: #e30000;
	color: #fff;
}
.block-section {
	margin: 5px 0px;
}
.video-block {
	
	width: 100%;
}
.controler-video {
	background: #606060 none repeat scroll 0 0;
	margin: 0;
	padding: 3px 0 9px;
	position:relative;
}
.video-screen{position:relative;}
.file-controler-block {
	background: #333;position:relative;
}
.name-video-1 {
	font-size: 11px;
	color: #fff;
	letter-spacing: 1px;
	line-height: 14px;
	padding-top: 3px;
	margin: 0px;
}
.screen-shear {
	margin: 3px 0px;
	background: #686fff;
}
.btn-shear {
	width: 100%;
	margin: 3px 0px;
	padding: 3px 0px;
	border-radius: 3px;
}
.bg-modify {
	background: #06C;
	color: #fff;
}
.bg-modify:hover {
	background: #990;
	color: #fff;
}
.chating-area {
	background: #f0f0f0;
	height: 400px;
	overflow-x: scroll;
	overflow-x: -moz-hidden-unscrollable;
}
.online-pro-pict img {
	height: auto;
	width: 100%;
}
.online-pro-pict {
	border: 1px solid #CCC;
	border-radius: 50%;
	margin: 7px;
	overflow: hidden;
}
.online-chat-text span, .online-chat-text-reply span {
	color: gray;
	display: inherit;
	font-size: 10px;
	margin-top: 5px;
}
.online-chat-text {
	background: #fff;
	padding: 5px;
	color: #666;
	margin: 10px 0px 0px 0px;
	font-family: Helvetica;
	font-size: 15px;
	font-weight: bold;
}
.online-chat-text-reply {
	background: #FBFD9F;
	padding: 5px;
	color: #036;
	margin: 10px 0px 0px 0px;
	font-family: Helvetica;
	font-size: 15px;
	font-weight: bold;
}
.chat-text-area {
	margin: 5px 0px
}
.panel-seassion{background:#fff;margin:5px 0px;padding-top:10px;border-radius:3px;position:relative;}
.arrow {  border-radius: 50%;
    display: inline-block;
    height: auto;
    left: -20px;
    position: absolute;
    text-align: center;
    top: 0;
   
	
}



.arrow .fa{
   
    color: #fff;
    font-size: 18px;
    padding: 2px;
   
}

.question-circle {
   
    color: #fff;
    font-size: 18px;
    padding: 2px;
    
}

.table-data{margin:10px 0px;}
#hover-panel{display:none; transition:all ease-in-out 0.2s 0s;}
.video-screen:hover #hover-panel{display:block;}
.icon-markup-block{background:#f3f3f3;border-radius:5px;}
</style>
<body class="bodybg">
<div class="container-fluid header-part">
  <div class="row">
    <div class="col-md-12 text-center">
      <div class="logo"> <img src="images/logo.png" alt="logo" > </div>
      <div class="over-lap">
        <div class="profile pull-left"> <img src="images/img-3.jpg" class="img-responsive"> </div>
        <div class="pull-right">
          <p class="loginname">Test User</p>
          <button class="btn btn-info bg-blue">Logout</button>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<section class="video-section">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-9">
        <div class="block-one">
          <div class="col-xs-12">
            <div class="inner-block"></div>
          </div>
          <div class="col-xs-12">
            <div class="inner-block"></div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="block-two">
        <div class="panel-seassion">
          <div class="col-xs-6">
            <p class="time-function">14:23:18</p>
          </div>
          <div class="col-xs-6">
            <p class="time-function">pst</p>
          </div>
          <div class="col-xs-6">
            <p class="time-function">00:12:36</p>
          </div>
          <div class="col-xs-6">
            <p class="time-function">00:45:00</p>
          </div>
          <div class="col-xs-6">
            <p class="time-function">14:23:18</p>
          </div>
          <div class="col-xs-6">
            <p class="time-function">14:23:18</p>
          </div>
          <div class="clearfix"></div>
          <div class="arrow bounce"  data-toggle="tooltip" title="Session Data Points">
         <i class="fa fa-shield"></i></div>
          </div>
        <div class="panel-seassion" style="background:rgba(0,0,0,0);padding:0px 0px;">
          <div class="controler-block">
            <div class="col-xs-3 text-center">
              <button class="btn btn-modify-video" data-toggle="tooltip" data-placement="bottom" title="Stop Recording"><i class="fa fa-stop"></i></button>
            </div>
            <div class="col-xs-3 text-center border-right">
              <button class="btn btn-modify-video" data-toggle="tooltip" data-placement="bottom" title="Record"><i class="fa fa-circle"></i></button>
            </div>
            <div class="col-xs-3 text-center">
              <button class="btn btn-modify-video" data-toggle="tooltip" data-placement="bottom" title="Stop Recording"><i class="fa fa-stop"></i></button>
            </div>
            <div class="col-xs-3 text-center">
              <button class="btn btn-modify-video" data-toggle="tooltip" data-placement="bottom" title="Record"><i class="fa fa-circle"></i></button>
            </div>
            <div class="clearfix"></div>
          </div>
           <div class="arrow bounce"  data-toggle="tooltip" title="Recording Controls">
         <i class="fa fa-shield"></i></div>
          </div>
             </div>
        <div class="panel-seassion">
          <div class="video-screen">
          
            <div class="block-section col-xs-12">
              <video src="#" controls class="video-block"></video>
            </div>
            <div class="arrow bounce"  data-toggle="tooltip" title="Video 1 Feed">
        <i style="border-radius:0px;background:rgba(0,0,0,0);height:auto;width:auto;" class="fa fa-shield"></i></div>
            <div class="clearfix"></div>
            <div class="controler-video">
            <div class="arrow bounce"  data-toggle="tooltip" title="Video 1 Control">
        <i style="border-radius:0px;background:rgba(0,0,0,0);height:auto;width:auto;" class="fa fa-shield question-circle"></i></div>
              <div class="col-xs-3 text-center">
                <button class="btn btn-modify-video" data-toggle="tooltip" data-placement="bottom" title="Video"><i class="fa fa-video-camera"></i></button>
              </div>
              <div class="col-xs-3 text-center border-right">
                <button class="btn btn-modify-video" data-toggle="tooltip" data-placement="bottom" title="Audio"><i class="fa fa-microphone"></i></button>
              </div>
              <div class="col-xs-4 text-center">
                <p class="name-video-1" title="Name">Name 1 Demo Name</p>
              </div>
              <div class="col-xs-2 text-center">
                <button class="btn btn-modify-video" data-toggle="tooltip" data-placement="bottom" title="Minimize"><i class="fa fa-caret-down"></i></button>
              </div>
              <div class="clearfix"></div>
            </div>
            </div>
            </div>
        <div class="panel-seassion">
          <div class="video-screen">
            <div class="block-section col-xs-12">
              <video class="video-block" controls src="#"></video>
            </div>
            <div class="arrow bounce"  data-toggle="tooltip" title="Video 2 Feed">
         <i class="fa fa-shield"></i></div>
            <div class="clearfix"></div>
            <div class="controler-video">
            <div class="arrow bounce"  data-toggle="tooltip" title="Video 2 Control">
         <i class="fa fa-shield question-circle" style="border-radius:0px;background:rgba(0,0,0,0);height:auto;width:auto;"></i></div>
              <div class="col-xs-3 text-center">
                <button title="Video" class="btn btn-modify-video" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-video-camera"></i></button>
              </div>
              <div class="col-xs-3 text-center border-right">
                <button title="Audio" class="btn btn-modify-video" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-microphone"></i></button>
              </div>
              <div class="col-xs-4 text-center">
                <p title="Name" class="name-video-1">Name 1 Demo Name</p>
              </div>
              <div class="col-xs-2 text-center">
                <button title="Minimize" class="btn btn-modify-video" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-caret-down"></i></button>
              </div>
             
              <div class="clearfix"></div>
               
              
            </div>
            </div>
            </div>
        <div class="panel-seassion" style="background:rgba(0,0,0,0);padding-top:0px;">
          <div class="controler-block" style="background:#BFA97B;margin-bottom: 5px">
            <div class="col-xs-3 text-center">
              <button class="btn btn-modify-video" data-toggle="tooltip" data-placement="bottom" title="Screen Share"><i class="fa fa-star"></i></button>
            </div>
            <div class="col-xs-3 text-center border-right">
              <button class="btn btn-modify-video" data-toggle="tooltip" data-placement="bottom" title="Screen Share"><i class="fa fa-share"></i></button>
            </div>
            <div class="col-xs-6">
              <button class="btn btn-shear bg-modify" data-toggle="tooltip" data-placement="bottom">Screen Share</button>
            </div>
            <div class="arrow bounce"  data-toggle="tooltip" title="Screen Share & View Controls">
         <i class="fa fa-shield question-circle" style="border-radius:0px;background:rgba(0,0,0,0);height:auto;width:auto;"></i></div>
            <div class="clearfix"></div>
          </div>
          <div class="controler-block">
            <div class="col-xs-6 border-right">
              <button class="btn btn-shear bg-modify">View</button>
            </div>
            <div class="col-xs-2 text-center">
              <button class="btn btn-modify-video" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-sign-in"></i></button>
            </div>
            <div class="col-xs-2 text-center">
              <button class="btn btn-modify-video" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-reply"></i></button>
            </div>
            <div class="col-xs-2 text-center">
              <button class="btn btn-modify-video" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-picture-o"></i></button>
            </div>
            <div class="clearfix"></div>
          </div>
          </div>
        <div class="panel-seassion">
             <div class="chating-area">
            <div class="chat-text-area">
            <div class="arrow bounce"  data-toggle="tooltip" title="Messaging">
         <i class="fa fa-shield question-circle" style="border-radius:0px;background:rgba(0,0,0,0);height:auto;width:auto;"></i></div>
              <div class="col-xs-3" style="padding:0px;">
                <div class="online-pro-pict"><img src="images/img-3.jpg" class="img-circle"></div>
              </div>
              <div class="col-xs-9" style="padding-left:0px;">
                <div class="online-chat-text">Hi, I am ... ... ... .. <span>1 Min</span> </div>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="chat-text-area">
              <div class="col-xs-9" style="padding-right:0px;">
                <div class="online-chat-text-reply">Hi, I am ... ... ... .. <span>1 Min</span> </div>
              </div>
              <div class="col-xs-3" style="padding:0px;">
                <div class="online-pro-pict"><img src="images/img-3.jpg" class="img-circle"></div>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="chat-text-area">
              <div class="col-xs-3" style="padding:0px;">
                <div class="online-pro-pict"><img src="images/img-3.jpg" class="img-circle"></div>
              </div>
              <div class="col-xs-9" style="padding-left:0px;">
                <div class="online-chat-text">Hi, I am ... ... ... .. <span>1 Min</span> </div>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="chat-text-area">
              <div class="col-xs-9" style="padding-right:0px;">
                <div class="online-chat-text-reply">Hi, I am ... ... ... .. <span>1 Min</span> </div>
              </div>
              <div class="col-xs-3" style="padding:0px;">
                <div class="online-pro-pict"><img src="images/img-3.jpg" class="img-circle"></div>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="chat-text-area">
              <div class="col-xs-3" style="padding:0px;">
                <div class="online-pro-pict"><img src="images/img-3.jpg" class="img-circle"></div>
              </div>
              <div class="col-xs-9" style="padding-left:0px;">
                <div class="online-chat-text">Hi, I am ... ... ... .. <span>1 Min</span> </div>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="chat-text-area">
              <div class="col-xs-9" style="padding-right:0px;">
                <div class="online-chat-text-reply">Hi, I am ... ... ... .. <span>1 Min</span> </div>
              </div>
              <div class="col-xs-3" style="padding:0px;">
                <div class="online-pro-pict"><img src="images/img-3.jpg" class="img-circle"></div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          </div>
          
           <div class="panel-seassion" style="padding-top:0px;">
          <div class="file-controler-block">
            <div class="col-xs-1 text-right" style="padding-right:0px;">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="bottom"  title="Scroll Top"><i class="fa fa-caret-down"></i></button>
            </div>
            <div class="col-xs-1 text-left" style="padding-left:0px;">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="bottom" title="Scrol Down"><i class="fa fa-caret-up"></i></button>
            </div>
            <div class="col-xs-2 text-right" style="padding-right:0px;">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-arrow-down"></i></button>
            </div>
            <div class="col-xs-2 text-left" style="padding-left:0px;">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-arrow-up"></i></button>
            </div>
            <div class="col-xs-3 text-center">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="bottom" title="Upload File"><i class="fa fa-file"></i></button>
            </div>
            <div class="col-xs-3 text-center">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="bottom" title="Minimize"><i class="fa fa-caret-down"></i></button>
            </div>
            <div class="arrow bounce"  data-toggle="tooltip" title="Messaging Controls">
         <i class="fa fa-shield question-circle" style="border-radius:0px;background:rgba(0,0,0,0);height:auto;width:auto;"></i></div>
            <div class="clearfix"></div>
          </div>
          </div>
           <div class="panel-seassion">
           
          <div class="table-data col-xs-12">
            <table class="table table-striped">
            <div class="arrow bounce"  data-toggle="tooltip" title="File Listing">
         <i class="fa fa-shield question-circle" style="border-radius:0px;background:rgba(0,0,0,0);height:auto;width:auto;"></i></div>
              <thead>
                <tr bgcolor="#00CCFF" style="color:#fff;">
                  <th>User</th>
                  <th>Time Stamp</th>
                  <th>File Name</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Tanmay</td>
                  <td>Bangalore</td>
                  <td>560001</td>
                </tr>
                <tr>
                  <td>Sachin</td>
                  <td>Mumbai</td>
                  <td>400003</td>
                </tr>
                <tr>
                  <td>Uma</td>
                  <td>Pune</td>
                  <td>411027</td>
                </tr>
              </tbody>
            </table>
          
          </div>
        
          <div class="clearfix"></div>
            </div>
          <div class="file-controler-block">
          <div class="arrow bounce"  data-toggle="tooltip" title="File Transfer Controls">
         <i class="fa fa-shield question-circle" style="border-radius:0px;background:rgba(0,0,0,0);height:auto;width:auto;"></i></div>
            <div class="col-xs-1 text-right" style="padding-right:0px;">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="top" title="Scroll Top"><i class="fa fa-caret-down"></i></button>
            </div>
            <div class="col-xs-1 text-left" style="padding-left:0px;">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="top" title="Scrol Down"><i class="fa fa-caret-up"></i></button>
            </div>
            <div class="col-xs-2 text-right" style="padding-right:0px;">
              <button class="btn btn-modify-chat"data-toggle="tooltip" data-placement="top"  title="View"><i class="fa fa-arrow-down"></i></button>
            </div>
            <div class="col-xs-2 text-left" style="padding-left:0px;">
              <button class="btn btn-modify-chat"data-toggle="tooltip" data-placement="bottom"  title="View"><i class="fa fa-arrow-up"></i></button>
            </div>
            <div class="col-xs-3 text-center">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="bottom"  title="Upload File"><i class="fa fa-file"></i></button>
            </div>
            <div class="col-xs-3 text-center">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="bottom"  title="Minimize"><i class="fa fa-caret-down"></i></button>
            </div>
            
            <div class="clearfix"></div>
          </div>
          
          <div class="panel-seassion" style="padding-top:0px;">
          <div class="icon-markup-block">
          <div class="arrow bounce"  data-toggle="tooltip" title="File Transfer Controls">
         <i class="fa fa-shield question-circle" style="border-radius:0px;background:rgba(0,0,0,0);height:auto;width:auto;"></i></div>
            <div class="col-xs-2" style="padding-right:0px;">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="top" title="Demo"><img src="images/13.png"></button>
            </div>
            <div class="col-xs-2">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="top" title="Demo"><img src="images/14.png"></button>
            </div>
            <div class="col-xs-2">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="top" title="Demo"><img src="images/15.png"></button>
            </div>
            <div class="col-xs-2">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="bottom" title="Demo"><img src="images/16.png"></button>
            </div>
            <div class="col-xs-2 text-center">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="bottom" title="Demo"><img src="images/17.png"></button>
            </div>
            <div class="col-xs-2 text-center">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="bottom" title="Demo"><img src="images/18.png"></button>
            </div>
            
            <div class="clearfix"></div>
          </div>
          </div>
          
          <div class="panel-seassion" style="padding-top:0px;">
          <div class="icon-markup-block">
          <div class="arrow bounce"  data-toggle="tooltip" title="File Transfer Controls">
         <i class="fa fa-shield question-circle" style="border-radius:0px;background:rgba(0,0,0,0);height:auto;width:auto;"></i></div>
           
            <div class="col-xs-1  text-center" style="padding:0px">
              <button class="btn btn-modify-chat"  data-toggle="tooltip" data-placement="top" title="Demo"><img src="images/1.png"></button>
            </div>
            <div class="col-xs-1  text-center" style="padding:0px;">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="top" title="Demo"><img src="images/2.png"></button>
            </div>
            <div class="col-xs-1 text-center" style="padding:0px;">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="top" title="Demo"><img src="images/3.png"></button>
            </div>
            <div class="col-xs-1 text-center" style="padding:0px;">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="top" title="Demo"><img src="images/4.png"></button>
            </div>
            <div class="col-xs-1 text-center" style="padding:0px;">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="top" title="><img src="images/5.png"></button>
            </div>
            <div class="col-xs-1 text-center" style="padding:0px;">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="top" title="Demo"><img src="images/6.png"></button>
            </div>
             <div class="col-xs-1  text-center" style="padding:0px;">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="top" title="Demo"><img src="images/7.png"></button>
            </div>
            <div class="col-xs-1  text-center" style="padding:0px;">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="top" title="Demo"><img src="images/8.png"></button>
            </div>
            <div class="col-xs-1 text-center" style="padding:0px;">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="top" title="Demo"><img src="images/9.png"></button>
            </div>
            <div class="col-xs-1 text-center" style="padding:0px;">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="top" title="Demo"><img src="images/10.png"></button>
            </div>
            <div class="col-xs-1 text-center" style="padding:0px;">
              <button class="btn btn-modify-chat" data-toggle="tooltip" data-placement="top" title="Demo"><img src="images/11.png"></button>
            </div>
            <div class="col-xs-1 text-center" style="padding:0px;">
              <button class="btn btn-modify-chat" data-toggle="tooltip" title="Hooray!" ><img src="images/12.png"></button>
            </div>
           
            <div class="clearfix"></div>
          </div>
          </div>
            
        </div>
      </div>
    </div>
  </div>
</section>
<!-- jQuery Version 1.11.1 --> 
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script> 

<!-- Bootstrap Core JavaScript --> 



</body>
</html>
