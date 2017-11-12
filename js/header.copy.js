equalheight = function(container){

	var currentTallest = 0,
		currentRowStart = 0,
		rowDivs = new Array(),
		$el,
		top_position = 0;

	console.log($(container).parents('.row'));
	console.log($(container).parents('.row').length);

	$(container).each(function() {
		$el = $(this);
		$($el).height('auto');
		top_position = $el.position().top;

		if (currentRowStart != top_position) {
			for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
				rowDivs[currentDiv].height(currentTallest);
			}
			rowDivs.length = 0; // empty the array
			currentRowStart = top_position;
			currentTallest = $el.height();
			rowDivs.push($el);
		} else {
			rowDivs.push($el);
			currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
		}
		for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
			rowDivs[currentDiv].height(currentTallest);
		}
	});
};

$(document).ready(function()
{
	equalheight('.equal-height.group-container .title-container');
	equalheight('.equal-height .member-container .title-container');
	equalheight('.equal-height.other-posts-container .title-container');
	equalheight('.equal-height .content-container .content');
	equalheight('.equal-height.group-container .content');
});


$(window).resize(function(){
	equalheight('.equal-height.group-container .title-container');
	equalheight('.equal-height .member-container .title-container');
	equalheight('.equal-height.other-posts-container .title-container');
	equalheight('.equal-height .content-container .content');
	equalheight('.equal-height.group-container .content');
});