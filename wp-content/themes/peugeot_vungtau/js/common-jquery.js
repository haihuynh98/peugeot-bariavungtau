jQuery(function ($) {

	$(document).ready(function () {
		$('.entry-content table').each(function (index) {
			if (index.width() > $(window).width()) {
				index.parent().css('overflow', 'scroll');
			}
		})
		if ($('.entry-content table').width() > $(window).width()) {

		}
	})
})
