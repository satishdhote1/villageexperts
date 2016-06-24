function previewImage(input) {
    var preview = document.getElementById('preview');
	 var previewLogo = document.getElementById('previewLogo');
	 
	// var previewSP = document.getElementById('SPimagePreview')
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        preview.setAttribute('src', e.target.result);
		previewLogo.setAttribute('src', e.target.result);
		//previewSP.setAttribute('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    } else {
      preview.setAttribute('src', 'images/img-3.jpg');
	   previewLogo.setAttribute('src', 'images/img-3.jpg');
	   //previewSP.setAttribute('src', 'images/img-3.jpg');
    }
  }

$(document).ready(function(){
	
	
	
});