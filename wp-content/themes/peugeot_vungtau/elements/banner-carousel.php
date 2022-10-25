<?php if(function_exists('getCarouselsListingArray')) :  ?>
<section class="banner-carousel" id="banner_carousel">
	<!-- Swiper -->
	<div class="swiper banner-carousel-swiper">
		<div class="swiper-wrapper">
			<?php $carousels = getCarouselsListingArray(); ?>
			<?php foreach ($carousels as $carousel): ?>
				<div class="swiper-slide">
					<a href="#">
						<img src="<?= $carousel['image'] ?>" class="img-fluid w-100 swiper-lazy" alt="Home banner">
					</a>
				</div>
			<?php endforeach;?>
		</div>
		</div>
		<div class="swiper-button-next" style="background-image: url('<?= get_template_directory_uri() . '/images/icon/slide-right-icon.png'?>') !important;"></div>
		<div class="swiper-button-prev" style="background-image: url('<?= get_template_directory_uri() . '/images/icon/slide-left-icon.png'?>') !important;"></div>
	</div>

	<!-- Initialize Swiper -->
	<script>
		var swiper = new Swiper(".banner-carousel-swiper", {
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
			autoplay: {
				delay: 5000,
			},
		});
	</script>
</section>
<?php endif; ?>
