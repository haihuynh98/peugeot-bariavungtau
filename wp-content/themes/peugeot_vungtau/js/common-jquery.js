jQuery(function ($) {

	$(document).ready(function () {
		$('.entry-content table').each(function () {
			if ($(this).width() > $(window).width()) {
				$(this).parent().css('overflow', 'scroll');
			}
		})
	})
})
