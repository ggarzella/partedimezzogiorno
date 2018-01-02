equalheight = function(nameClass, nameContainer)
{
	var elements = $(nameClass, $(nameContainer));

	var currentRow = elements.closest(nameContainer).get(0), row, maxHeight = 0, currentHeight;

	var counter = 0;

	elements.each(function() {

		row = $(this).closest(nameContainer);

		elementForRow = $(row).find(nameClass).length;

		currentHeight =  $(this).outerHeight(true);

		if (currentHeight > maxHeight)
			maxHeight = currentHeight;

		if (counter === (elementForRow - 1)) {

			$(nameClass, currentRow).outerHeight(maxHeight);

			maxHeight = 0;

			currentRow = row;

			counter = 0;
		}

		counter++;
	});
};

$(document).ready(function()
{
	equalheight('.content-container', '.other-posts');
	equalheight('.title-container', '.other-posts');

	$('.dropdown-submenu a[href="#"]').on("click", function(e) {
		$(this).next('ul').toggle();
		e.stopPropagation();
		e.preventDefault();
	});
});

$(window).resize(function() {
	equalheight('.content-container', '.other-posts');
	equalheight('.title-container', '.other-posts');
});