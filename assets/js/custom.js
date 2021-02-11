$(document).ready(function(){

	function copyToClipboard(element) {
	    var $temp = $("<input>");
	    $("body").append($temp);
	    $temp.val($(element).val()).select();
	    document.execCommand("copy");
	    $temp.remove();
	}



	$(document).on('click', '#copyBtn', function(){
		copyToClipboard($('#share-link'));
		alert('Copied!');
	});
});