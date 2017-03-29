
 var socket = new WebSocket('ws://192.168.1.120:1337/');
  var sourcevid = document.getElementById('liveVideo');
  var remotevid = document.getElementById('remotevideo');
  var localStream = null;
  var peerConn = null;
  var started = false;


//Function to fetch the video stream.
function fetchVideo()
{
		
	// Replace the source of the video element with the stream from the camera
      try { 
      	//Get the reference of video elements.
      	sourcevid = document.getElementById('liveVideo');
		remotevid = document.getElementById('remotevideo');
		//Get the video stream from the connected deivce.
        navigator.webkitGetUserMedia({audio: true, video: true}, successCallback, errorCallback);
      } catch (e) {
      	//getUserMedia("video,audio", successCallback, errorCallback);
        navigator.webkitGetUserMedia("video,audio", successCallback, errorCallback);
      }
      
      //On success of fetching the video the underlying function is called with argument as stream object.
      function successCallback(stream) {
      	//Provide the stream object to video element.
          sourcevid.src = window.webkitURL.createObjectURL(stream);
          localStream = stream;
      }
      
       //On Error of fetching the video the underlying function is called with argument as error object.
      function errorCallback(error) {
      	//log the error code to the console. It can be viewed in the inspect element of the browser.
          console.error('An error occurred: [CODE ' + error.code + ']');
      }

}

function stopVideo() {
    sourcevid.src = "";
  }

function connect()
{
	document.getElementById('anim').style.visibility='visible';
	 if (!started && localStream) 
	 {
      createPeerConnection();
      console.log('Adding local stream...');
      peerConn.addStream(localStream);
      started = true;
      
     } 
     else 
     {
      alert("Local stream not running yet.");
     }
}


function createPeerConnection()
{
	try {
      console.log("Creating peer connection");
      peerConn = new webkitDeprecatedPeerConnection("STUN stun.l.google.com:19302", onSignal);
    } catch (e) {
      try {
        peerConn = new webkitPeerConnection("STUN stun.l.google.com:19302", onSignal);
      } catch (e) {
        console.log("Failed to create PeerConnection, exception: " + e.message);
      }
    }
    peerConn.addEventListener("addstream", onRemoteStreamAdded, false);
    peerConn.addEventListener("removestream", onRemoteStreamRemoved, false)
}


// when PeerConn is created, send setup data to peer via WebSocket
function onSignal(message) {
    console.log("Sending setup signal");
    socket.send(message);
}

// when remote adds a stream, hand it on to the local video element
function onRemoteStreamAdded(event) {
    console.log("Added remote stream");
    remotevid.src = window.webkitURL.createObjectURL(event.stream);
    document.getElementById('anim').style.visibility='visible';
}
  
  // when remote removes a stream, remove it from the local video element
function onRemoteStreamRemoved(event) {
   console.log("Remove remote stream");
   remotevid.src = "";
}

 // accept connection request
  socket.addEventListener("message", onMessage, false);
  function onMessage(evt) {
    console.log("RECEIVED: "+evt.data);
    if (!started) {
      createPeerConnection();
      console.log('Adding local stream...');
      peerConn.addStream(localStream);
      started = true;
    }
    // Message returned from other side
    console.log('Processing signaling message...');
    peerConn.processSignalingMessage(evt.data);
  }
