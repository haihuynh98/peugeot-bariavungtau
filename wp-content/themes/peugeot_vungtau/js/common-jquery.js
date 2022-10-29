jQuery(function ($) {

	$(document).ready(function () {

		$('.entry-content table').each(function (e) {
			if (e.width() > $(window).width()) {
				e.parent().css('overflow', 'scroll');
			}
		})
		if ($('.entry-content table').width() > $(window).width()) {

		}
	})
})
