$(window).load(function() {
	function equalizeTextHeights(bub_container, bub_inner) {
		bub_container 	= $(bub_container);
		bub_inner 		= $(bub_inner);
		
		var maxHeightText 	= 0;
		var maxHeightImage 	= 0;
		
		bub_container.css('height', 'auto');
		bub_container.each(function() {
			if (bub_inner.height() > maxHeightText) {
				maxHeightText = bub_inner.height();
			}
		});
		bub_container.height(maxHeightText+50);
	}
	
	function equalizeAllHeights() {
		if ($(window).width() > 860) {
			equalizeTextHeights('.list-of-services li', '.list-of-services li');
		} else {
			$('.list-of-services li').css('height', 'auto');
		}
	}
		
	$(document).ready(function() {
		equalizeAllHeights();
		$(window).bind('resize', equalizeAllHeights);
	});

});