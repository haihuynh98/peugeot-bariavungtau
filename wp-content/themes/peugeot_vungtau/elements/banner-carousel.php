<section class="banner-carousel" id="banner_carousel">
	<!-- Swiper -->
	<div class="swiper banner-carousel-swiper">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<a href="#">
					<img src="https://kiavietnam.com.vn/storage/banner-ctbh-thang/t9-2022/banner-web-t9-khong-uu-dai-01.jpg"
						 class="img-fluid w-100 swiper-lazy" alt="Home banner">
				</a>
			</div>
			<div class="swiper-slide">
				<a href="#">
					<img src="https://kiavietnam.com.vn/storage/banner-ctbh-thang/t8-2022/banner-web-1982022-0-03.jpg"
						 class="img-fluid w-100 swiper-lazy" alt="Home banner">
				</a>
			</div>
			<div class="swiper-slide">
				<a href="#">

					<img src="https://kiavietnam.com.vn/storage/banner-ctbh-thang/t9-2022/banner-web-t9-khong-uu-dai-04.jpg"
						 class="img-fluid w-100 swiper-lazy" alt="Home banner">
				</a>
			</div>
			<div class="swiper-slide">
				<a href="#">
					<img src="https://kiavietnam.com.vn/storage/banner-ctbh-thang/t9-2022/banner-web-t9-khong-uu-dai-05.jpg"
						 class="img-fluid w-100 swiper-lazy" alt="Home banner">
				</a>
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
