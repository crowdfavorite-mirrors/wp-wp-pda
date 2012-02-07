//SVN: $Id: script.js 337006 2011-01-25 13:34:58Z imthiaz $

function onPageShow(event, ui){
	$('img').load(function() {
	    // Remove attributes in case img-element has set width and height
	    $(this).removeAttr("width")
	           .removeAttr("height")
	           .css({ width: "", height: "" });
		if(this.width>300){
			this.width=300;
		}
	});
	$('object').each(function() {
	    $(this).removeAttr("width")
        .removeAttr("height")
        .css({ width: "", height: "" });
	});
	$('embed').each(function() {
	    $(this).removeAttr("width")
        .removeAttr("height")
        .css({ width: "", height: "" });
	});
}

$('body').live('pageshow', onPageShow);

