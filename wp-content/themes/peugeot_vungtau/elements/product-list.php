<?php
$product_query = new WP_Query([
	'post_type' => 'product',
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'orderby' => 'title',
	'order' => 'ASC',
	'meta_query' => array(
		array(
			'key'     => '_publish_main_product',
			'value'   => 1,
			'compare' => '=',
		),
	),

]);

?>

<section class="product-list section-w-title" id="product_list">
	<h1 class="text-title text-center text-uppercase">Sản Phẩm</h1>

	<div class="container-fluid">
		<div class="product-slide" id="product_slide">
			<div class="swiper-product car-swiper">
				<div class="swiper-wrapper">
					<?php
					// Start the Loop.
					while ($product_query->have_posts()) :
						$product_query->the_post();

						$ProductID = get_the_ID();
						$imagesSrc = get_the_post_thumbnail_url($ProductID, 'full');

						$link = esc_url(get_permalink());
						$titleProduct = get_the_title($ProductID);
						$price = get_post_meta($ProductID,'_price',true) == 0 ? 'Liên hệ' : number_format(get_post_meta($ProductID,'_price',true)) . ' VND';
						?>
						<div class="swiper-slide">
							<img src="<?php echo $imagesSrc ?>"/>
							<div class="car-detail">
								<a href="<?= $link ?>">
									<h4> <?= $titleProduct ?></h4>
								</a>
<!--								<div class="car-slogan text-15">Sắc màu thời trang - Khẳng định phong cách</div>-->
								<div class="car-price text-15">Giá chỉ từ</div>
								<div class="car-price text-20">
									<?php echo $price?>
								</div>
							</div>
						</div>
					<?php
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<div class="swiper-pagination"></div>
			</div>
			<!-- Initialize Swiper -->
			<script>
				var swiper = new Swiper(".car-swiper", {
					effect: "coverflow",
					grabCursor: true,
					centeredSlides: true,
					slidesPerView: "auto",
					coverflowEffect: {
						rotate: 0,
						stretch: 0,
						depth: 50,
						modifier: 1,
						scale: 0.8,
						slideShadows: false
					},
					pagination: {
						el: ".swiper-pagination"
					},
				});
			</script>

		</div>
	</div>
</section>
