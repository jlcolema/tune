$(window).load(function() {
	function equalizeTextHeights(bub_container, bub_inner, bub_text, bub_image) {
		bub_container 	= $(bub_container);
		bub_inner 		= $(bub_inner);
		bub_text 		= $(bub_text);
		bub_image 		= $(bub_image);
		
		var maxHeightText 	= 0;
		var maxHeightImage 	= 0;
		
			bub_container.css('height', 'auto');
		bub_container.each(function() {
			if (bub_inner.height() > maxHeightText) {
				maxHeightText = bub_inner.height();
				console.log(maxHeightText);
			}
		});
		console.log(maxHeightText);
		bub_container.height(maxHeightText+15);
	}
	
	function equalizeAllHeights() {
		if ($(window).width() > 600) {
			equalizeTextHeights('.recent-work li', '.recent-work .project');
		} else {
			$('.recent-work li').css('height', 'auto');
		}
	}
		
	$(document).ready(function() {
		equalizeAllHeights();
		$(window).bind('resize', equalizeAllHeights);
	});

});