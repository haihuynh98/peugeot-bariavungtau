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
			<?php $thumbnail_term_id = get_term_meta($pCat->term_id, 'thumbnail_id');
			$thumbnail_id = reset($thumbnail_term_id);
			?>
			<div class="row pricing-list">
				<div class="col-lg-3 col-md-12 col-sm-12 col-12 col-image">
					<?php echo wp_get_attachment_image($thumbnail_id, 'large') ?>
					<h3 class="title-cats"><?= $pCat->cat_name ?></h3>
				</div>
				<div class="col-lg-9 col-md-12 col-sm-12 col-12 col-pricing">
					<table>
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
							'posts_per_page' => -1
						]); ?>
						<?php while ($product_query->have_posts()) :
							$product_query->the_post();

							$ProductID = get_the_ID();

							$link = get_permalink(get_term_meta($pCat->term_id,'post_sticky_product',true));
							$titleProduct = get_the_title($ProductID);
							$price = get_post_meta($ProductID, '_regular_price', true) == 0 ? 'Liên hệ' : number_format(get_post_meta($ProductID, '_regular_price', true)) . ' VNĐ';
							$slug= get_post_field('post_name',$ProductID)
							?>
							<tr>
								<td class="name-product"><?= $titleProduct ?></td>
								<td class="price-product">Giá bán: <?= $price ?></td>
								<td class="action-product">
									<?php if ($link):?>
									<a href="<?= $link ?>">Chi tiết ></a>
									<?php endif;?>
									<a href="/du-toan-chi-phi/<?= $slug?>">Dự toán ></a>
									<?php if ($brochureLink = get_term_meta($pCat->term_id,"brochure_file_url",true)):?>
										<a href="<?= $brochureLink ?>">Tải Brochure ></a>
									<?php endif;?>
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
		<?php endforeach; ?>
	<?php else: ?>
		<p>Không tìm thấy dữ liệu</p>
	<?php endif; ?>


</main><!-- #site-content -->

<?php get_footer(); ?>


