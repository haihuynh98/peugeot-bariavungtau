<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Peugeot_Vung_Tau
 */


$locations_footer = get_nav_menu_locations();
$theme_location_product_footer = 'menu-product-footer';
$menu_product_footer = get_term($locations_footer[$theme_location_product_footer], 'nav_menu');
$menu_items_product_footer = wp_get_nav_menu_items($menu_product_footer->term_id);

$theme_location_policy_footer = 'menu-policy-footer';
$menu_policy_footer = get_term($locations_footer[$theme_location_policy_footer], 'nav_menu');
$menu_items_policy_footer = wp_get_nav_menu_items($menu_policy_footer->term_id);
?>

<footer class="footer-main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-5 col-md-12 col-12 col-company-info">
				<ul class="company">
					<li class="company-info">
						<ul>
							<li class="name">
								<span>CÔNG TY TNHH TRƯỜNG HẢI - VŨNG TÀU</span>
							</li>
							<!--							<li class="lisence">-->
							<!--                                    <span class="text-footer">GIẤY CNĐKDN:-->
							<!--                                        4000779880 NGÀY CẤP 27/10/2010</span>-->
							<!--							</li>-->
							<!--							<li class="lisence">-->
							<!--                                    <span class="text-footer">CƠ QUAN CẤP:-->
							<!--                                        PHÒNG ĐĂNG KÝ KINH DOANH SỞ KẾ HOẠCH VÀ ĐẦU TƯ TỈNH QUẢNG NAM</span>-->
							<!--							</li>-->
							<li class="lisence">
                                    <span class="text-footer">ĐỊA CHỈ:
										422 THỐNG NHẤT MỚI, PHƯỜNG 8, TP VŨNG TÀU, TỈNH BÀ RỊA - VŨNG TÀU, VIỆT NAM</span>
							</li>
						</ul>
					</li>

					<!--					<li class="site">-->
					<!---->
					<!--						<div class="text-info pt-3">-->
					<!--							<a class="text-16" href="http://online.gov.vn/Home/WebDetails/29714?AspxAutoDetectCookieSupport=1" target="_blank">-->
					<!--								<img src="https://kiavietnam.com.vn/themes/main/images/general/bct.png" class="img-fluid" alt="BCT">-->
					<!--							</a>-->
					<!--						</div>-->
					<!--					</li>-->
					<!--					<li class="copyright">-->
					<!--						© 2020 KIA Motors Viet Nam. All right reserved.-->
					<!--					</li>-->
				</ul>
			</div>

			<div class="col-lg-1 col-md-12 col-12 col-has-menu">
				<h4 class="title-footer-menu">Sản phẩm</h4>
				<?php if (count($menu_items_product_footer) > 0) : ?>
					<ul class="footer-menu">
						<?php foreach ($menu_items_product_footer as $menu_item_footer): ?>
							<li class="menu-item"><a
									href="<?= $menu_item_footer->url ?>"><?= $menu_item_footer->title ?></a></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>

			<div class="col-lg-3 col-md-12 col-12 col-has-menu">
				<h4 class="title-footer-menu">Chính sách</h4>

				<ul class="footer-menu">
					<?php if (count($menu_items_policy_footer) > 0) : ?>
						<ul class="footer-menu">
							<?php foreach ($menu_items_policy_footer as $menu_item_footer): ?>
								<li class="menu-item"><a
										class="<?php echo implode($menu_item_footer->classes,' ')  ?>"
										href="<?= $menu_item_footer->url ?>"><?= $menu_item_footer->title ?></a></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</ul>
			</div>
			<div class="col-lg-3 col-md-12 col-12 col-has-menu">
				<h4 class="title-footer-menu">Liên hệ với chúng tôi</h4>

				<ul class="footer-menu">
					<li class="menu-item"><a href="tell:1234565656">HOTLINE: 079 72 99 789</a></li>
					<li class="menu-item"><a href="mailto:cskh@peugeotvietnam.com">hiepnguyenduc1@thaco.com.vn</a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
