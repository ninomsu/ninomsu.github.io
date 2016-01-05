/*This adds an overlay so you can make the background dark*/

var $overlay = $('<div id="overlay"></div>');
var $image = $("<img>");

$overlay.append($image);

$("body").append($overlay);




/*This stops the image from being opened in a new tab when clicked*/
$("#gallery a").click(function(event){
    event.preventDefault();
    var imageLocation = $(this).attr("href");
    
    $image.attr("src", imageLocation);
    
    $overlay.show();
});


/*When in overlay and you want to get out, clicking will hide the image*/

$overlay.click(function(){
    
    $overlay.hide();
});

/*Paralax Transition*/

var documentEl = $(document),
    hero = $('div.hero');
documentEl.on('scroll', function(){
    var currScrollPos = documentEl.scrollTop();
    hero.css('background-position','0'+ -currScrollPos/4 + 'px');
});


/*Click scroll effect*/

var scrollY = 0;
var distance = 40;
var speed = 24;
function autoScrollTo(el) {
	var currentY = window.pageYOffset;
	var targetY = document.getElementById(el).offsetTop;
	var bodyHeight = document.body.offsetHeight;
	var yPos = currentY + window.innerHeight;
	var animator = setTimeout('autoScrollTo(\''+el+'\')',24);
	if(yPos > bodyHeight){
		clearTimeout(animator);
	} else {
		if(currentY < targetY-distance){
		    scrollY = currentY+distance;
		    window.scroll(0, scrollY);
	    } else {
		    clearTimeout(animator);
	    }
	}
}





