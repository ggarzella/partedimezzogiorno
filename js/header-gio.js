equalheight = function(nameClass)
{
	var elements = $(nameClass);

	var currentRow = elements.closest('.row').get(0), row, maxHeight = 0, currentHeight;

	var total = elements.length;

	elements.each(function(index) {

		row = $(this).closest('.row.app');

		currentHeight =  $(this).outerHeight(true);

		if (currentHeight > maxHeight)
			maxHeight = currentHeight;

		if (!row.is(currentRow) || (index == total - 1)) {

			$(nameClass, $(currentRow)).css('height', maxHeight);

			if (index != total - 1)
				maxHeight = 0;

			currentRow = row;
		}
	});
};

$(document).ready(function()
{
	equalheight('.equal-height');

	$('.dropdown-submenu a[href="#"]').on("click", function(e) {
		$(this).next('ul').toggle();
		e.stopPropagation();
		e.preventDefault();
	});
});

$(window).resize(function(){
	equalheight('.equal-height');
});