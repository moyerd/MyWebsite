var $ = function (id) { 
	return document.getElementById(id); 
}
window.onload = function () {
    var slidesNode = $("slides");    
    var captionNode = $("caption");
    var imageNode = $("slide");
        
    var slides = slidesNode.getElementsByTagName("img");
    
    // Start slide show
    var image, imageCounter = 0;
    
	$("next").addEventListener("click", function() { //next button listener
		imageCounter = (imageCounter + 1) % slides.length;
        image = slides[imageCounter];
        imageNode.src = image.src;
        captionNode.firstChild.nodeValue = image.alt;
	});
	
	$("previous").addEventListener("click", function() { //previous button listener
		imageCounter = (imageCounter - 1) % slides.length;
		
		if (imageCounter < 0) { //go to last in image array
			imageCounter = slides.length - 1;
		}
		
		image = slides[imageCounter];
		imageNode.src = image.src;
		captionNode.firstChild.nodeValue = image.alt;
	});
}