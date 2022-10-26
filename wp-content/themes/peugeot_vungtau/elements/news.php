<?php
$news_query = new WP_Query([
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => 10
]);

?>

<section class="news section-w-title container" id="news">
	<h1 class="text-title text-center text-uppercase">Tin tức</h1>
	<div class="container-fluid">
		<!-- Swiper -->
		<div class="news-swiper mySwiper icon-swipe-left">
			<div class="swiper-wrapper">
				<?php
				// Start the Loop.
				while ($news_query->have_posts()) :
					$news_query->the_post();

					$newsID = get_the_ID();
					$imagesNews = get_the_post_thumbnail_url($newsID, 'full');

					$links = esc_url(get_permalink());
					$descriptionNews = get_the_excerpt();
					$titleNews = get_the_title($newsID);
					?>
					<div class="swiper-slide news-slide">
						<a href="<?= $links?>">
							<img src="<?= $imagesNews?>"/>
							<div class="row">
								<div class="col-3 col-date">
									<div class="news-date">
										<ul class="news-date">
											<li class="date">
												<?= get_the_date( 'd-m' );?>
											</li>
											<li class="year">
												<?= get_the_date( 'Y' );?>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-9 col-info">
									<div class="news-info">
										<h3 class="news-title">
											<?= $titleNews?>
										</h3>
										<p class="news-description text-10">
											<?= $descriptionNews?>
										</p>
									</div>
								</div>
							</div>
						</a>
					</div>
				<?php endwhile;
				wp_reset_postdata();?>
			</div>
			<div class="swiper-pagination"></div>
		</div>

	</div>

	<!-- Initialize Swiper -->
	<script>
		var swiper = new Swiper(".mySwiper", {
			effect: "coverflow",
			grabCursor: true,
			centeredSlides: true,
			slidesPerView: "auto",
			coverflowEffect: {
				rotate: 0,
				scale: 0.8,
				stretch: -50,
				depth: 50,
				modifier: 1,
				slideShadows: false
			},
			pagination: {
				el: ".swiper-pagination",
			},
		});

		jQuery(function ($) {
			swiper.on('slideChange', function () {
				if ($('.news-swiper').hasClass('icon-swipe-left')) {
					$('.news-swiper').removeClass('icon-swipe-left');
				}
			});
		});

	</script>
</section>
