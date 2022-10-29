jQuery(function ($) {

	$(document).ready(function () {
		$('.entry-content table').each(function (index) {
			if (indexwidth() > $(window).width()) {
				indexparent().css('overflow', 'scroll');
			}
		})
		if ($('.entry-content table').width() > $(window).width()) {

		}
	})
})
