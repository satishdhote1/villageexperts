<link href="js/rangeslider.js-2.1.1/rangeslider.css" rel="stylesheet">
<script src="js/jquery.js"></script> 
<script src="js/rangeslider.js-2.1.1/rangeslider.min.js"></script> 
<script>
  $(document).ready(function(){

    var $document = $(document);
     var selector = '[data-rangeslider]';
     var $inputRange = $(selector); 
	 
     function valueOutput(element) {
		 alert(element.value);
         var value = element.value;
         var output = element.parentNode.getElementsByTagName('output')[0];
         output.innerHTML = value;
     } /** * Initial value output */
     for (var i = $inputRange.length - 1; i >= 0; i--) {
         valueOutput($inputRange[i]);
     } /** * Update value output */
     $document.on('input', selector, function (e) {
         valueOutput(e.target);
     }); /** * Initialize the elements */
     $inputRange.rangeslider({
         polyfill: false
     }); /** * Example functionality to demonstrate programmatic value changes */
    /* $document.on('click', '#js-example-change-value button', function (e) {
         var $inputRange = $('[data-rangeslider]', e.target.parentNode);
         var value = $('input[type="number"]', e.target.parentNode)[0].value;
         $inputRange.val(value).change();
     });*/ /** * Example functionality to demonstrate programmatic attribute changes */
    /* $document.on('click', '#js-example-change-attributes button', function (e) {
         var $inputRange = $('[data-rangeslider]', e.target.parentNode);
         var attributes = {
             min: $('input[name="min"]', e.target.parentNode)[0].value,
             max: $('input[name="max"]', e.target.parentNode)[0].value,
             step: $('input[name="step"]', e.target.parentNode)[0].value
         };
         $inputRange.attr(attributes).rangeslider('update', true);
     });*/ /** * Example functionality to demonstrate destroy functionality */
     /*$document.on('click', '#js-example-destroy button[data-behaviour="destroy"]', function (e) {
         $('input[type="range"]', e.target.parentNode).rangeslider('destroy');
     }).on('click', '#js-example-destroy button[data-behaviour="initialize"]', function (e) {
         $('input[type="range"]', e.target.parentNode).rangeslider({
             polyfill: false
         });
     });*/
	 
 });

</script>


<section id="top"> <input type="range" min="0" max="100" step="1" value="" data-rangeslider>
 <output id="js-output"></output></section>