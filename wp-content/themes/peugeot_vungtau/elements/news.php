<section class="news section-w-title container" id="news">
	<h1 class="text-title text-center text-uppercase">Tin tức</h1>
	<div class="container-fluid">
		<!-- Swiper -->
		<div class="news-swiper mySwiper icon-swipe-left">
			<div class="swiper-wrapper">
				<div class="swiper-slide news-slide">
					<a href="#">
						<img src="https://kiavietnam.com.vn/storage/product/sportage/3.jpg"/>
						<div class="row">
							<div class="col-3 col-date">
								<div class="news-date">
									<ul class="news-date">
										<li class="date">
											23-06
										</li>
										<li class="year">
											2022
										</li>
									</ul>
								</div>
							</div>
							<div class="col-9 col-info">
								<div class="news-info">
									<h3 class="news-title">
										THACO AUTO CHÍNH THỨC XUẤT XƯỞNG MẪU XE KIA SPORTAGE THẾ HỆ HOÀN TOÀN...
									</h3>
									<p class="news-description text-10">
										Vừa qua, THACO AUTO chính thức xuất xưởng Kia Sportage – mẫu xe KIA SUV cao cấp
										thế hệ hoàn toà...
									</p>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="swiper-slide news-slide">
					<a href="#">
						<img src="https://kiavietnam.com.vn/storage/bai-dang-t6-2022/sportage/image-2022-04-12t01-22-26-769z.png"/>
						<div class="row">
							<div class="col-3 col-date">
								<div class="news-date">
									<ul class="news-date">
										<li class="date">
											23-06
										</li>
										<li class="year">
											2022
										</li>
									</ul>
								</div>
							</div>
							<div class="col-9 col-info">
								<div class="news-info">
									<h3 class="news-title">
										THACO AUTO CHÍNH THỨC XUẤT XƯỞNG MẪU XE KIA SPORTAGE THẾ HỆ HOÀN TOÀN...
									</h3>
									<p class="news-description text-10">
										Vừa qua, THACO AUTO chính thức xuất xưởng Kia Sportage – mẫu xe KIA SUV cao cấp
										thế hệ hoàn toà...
									</p>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="swiper-slide news-slide">
					<a href="#">
						<img src="https://kiavietnam.com.vn/storage/bai-dang-t3-2022/16-k3-gt/kia-25th3n2022-1.png"/>
						<div class="row">
							<div class="col-3 col-date">
								<div class="news-date">
									<ul class="news-date">
										<li class="date">
											23-06
										</li>
										<li class="year">
											2022
										</li>
									</ul>
								</div>
							</div>
							<div class="col-9 col-info">
								<div class="news-info">
									<h3 class="news-title">
										THACO AUTO CHÍNH THỨC XUẤT XƯỞNG MẪU XE KIA SPORTAGE THẾ HỆ HOÀN TOÀN...
									</h3>
									<p class="news-description text-10">
										Vừa qua, THACO AUTO chính thức xuất xưởng Kia Sportage – mẫu xe KIA SUV cao cấp
										thế hệ hoàn toà...
									</p>
								</div>
							</div>
						</div>
					</a>
				</div>
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
