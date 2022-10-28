<?php

/**
 * Template Name: Pricing template
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
	'order'   => 'ASC'
);

$pCats = get_categories($args);

?>

<main id="contact-content" class="container pricing-page">
	<?php if (count($pCats) >0 ):?>
	<?php foreach($pCats as $pCat):?>
	<div class="row pricing-list">
		<div class="col-lg-3 col-md-3 col-sm-12 col-12 col-image">
			<img src="https://kiavietnam.com.vn/storage/product/carnival/edit-car-2.png" alt="car">
			<h3 class="title-cats"><?= $pCat->cat_name ?></h3>
		</div>
		<div class="col-lg-9 col-md-9 col-sm-12 col-12 col-pricing">
			<table>
				<colgroup>
					<col span="1" style="width: 50%">
				</colgroup>
				<tbody>
				<?php
				$product_query = new WP_Query([
					'post_type' => 'product',
					'post_status' => 'publish',
					'tax_query' => array(
						array(
							'taxonomy' => 'product_cat',
							'field' => 'term_id',
							'terms' => $pCat->term_id
						)
					),
					'posts_per_page' => -1
				]);?>
				<?php 	while ($product_query->have_posts()) :
						$product_query->the_post();

					$ProductID = get_the_ID();

					$link = esc_url(get_permalink());
					$titleProduct = get_the_title($ProductID);
					$price = get_post_meta($ProductID,'_price',true) == 0 ? 'Liên hệ' : number_format(get_post_meta($ProductID,'_price',true)) . ' VND';
				?>
				<tr>
					<td class="name-product"><?= $titleProduct?></td>
					<td class="price-product">Gia ban: <?=$price?></td>
					<td class="action-product">
						<a href="<?=$link?>">Chi tiet ></a>
					</td>
				</tr>
				<?php
				endwhile;
				wp_reset_postdata();
				?>
				</tbody>
			</table>
		</div>
	</div>
	<?php endforeach;?>
	<?php else:?>
	<p>Không tìm thấy dữ liệu</p>
	<?php endif;?>


</main><!-- #site-content -->

<?php get_footer(); ?>


