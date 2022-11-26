<?php

/**
 * Template Name: Brochure template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage mnconcept
 * @since TigerGentlemen
 */
get_header();
$args = array(
	'taxonomy' => 'product_cat',
	'orderby' => 'name',
	'order' => 'ASC'
);

$pCats = get_categories($args);
?>
<section class="banner-header"
		 style="background-image: url('<?= get_theme_file_uri() . '/images/banner/banner-pricing-page.jpg' ?>')">
</section>

<main id="contact-content" class="container pricing-page">
	<?php if (count($pCats) > 0): ?>
		<?php foreach ($pCats as $pCat): ?>
			<div class="row pricing-list">
				<div class="col-12 col-pricing">
					<table>
						<colgroup>
							<col span="1" style="width: 50%">
						</colgroup>
						<tbody>
						<?php
						$product_query = new WP_Query([
							'post_type' => 'product',
							'post_status' => 'publish',
							'orderby' => 'title',
							'order' => 'ASC',
							'tax_query' => array(
								array(
									'taxonomy' => 'product_cat',
									'field' => 'term_id',
									'terms' => $pCat->term_id
								)
							),
							'meta_query' => array(
								array(
									'key' => '_publish_main_product',
									'value' => 1,
									'compare' => '=',
								),
							),
							'posts_per_page' => -1
						]); ?>
						<?php while ($product_query->have_posts()) :
							$product_query->the_post();

							$ProductID = get_the_ID();
							$titleProduct = get_the_title($ProductID);
							$price = get_post_meta($ProductID, '_regular_price', true) == 0 ? 'Liên hệ' : number_format(get_post_meta($ProductID, '_regular_price', true)) . ' VNĐ';
							?>
							<?php if ($brochureLink = get_term_meta($pCat->term_id, "brochure_file_url", true)): ?>
							<tr>
								<td class="name-product"><?= $titleProduct ?></td>
								<td class="price-product">Giá bán: <?= $price ?></td>
								<td class="action-product">

									<a href="<?= $brochureLink ?>">Tải Brochure ></a>

								</td>
							</tr>
						<?php endif; ?>
						<?php
						endwhile;
						wp_reset_postdata();
						?>
						</tbody>
					</table>
				</div>
			</div>
		<?php endforeach; ?>
	<?php else: ?>
		<p>Không tìm thấy dữ liệu</p>
	<?php endif; ?>


</main><!-- #site-content -->

<?php get_footer(); ?>


