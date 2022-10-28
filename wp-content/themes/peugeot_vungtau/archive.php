<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Peugeot_Vung_Tau
 */

get_header();

$locations_news = get_nav_menu_locations();
$theme_location_news = 'menu-inside-news';
$menu_news = get_term($locations_news[$theme_location_news], 'nav_menu');
$menu_items_news = wp_get_nav_menu_items($menu_news->term_id);
?>
	<div class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse" id="navbarNews">
			<ul class="navbar-nav justify-content-around align-items-center w-100">
				<?php foreach ($menu_items_news as $menu_item_news):
					?>
					<li class="nav-item">
						<a class="nav-link" href="<?= $menu_item_news->url ?>"
						   style="color: #1f1f1f;"><?= $menu_item_news->title ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<main id="primary" class="site-main container-fluid py-5">
		<?php if (have_posts()) : ?>
			<div class="row w-100 news">


				<?php
				/* Start the Loop */
				while (have_posts()) :
					the_post();

					$newsID = get_the_ID();
					$imagesNews = get_the_post_thumbnail_url($newsID, 'full');

					$links = esc_url(get_permalink());
					$descriptionNews = get_the_excerpt();
					$titleNews = get_the_title($newsID);
					?>

					<div class="col-lg-4 col-md-6 col-sm-12 col-12 news-slide">
						<a href="<?= $links ?>">
							<img src="<?= $imagesNews ?>"/>
							<div class="row">
								<div class="col-3 col-date">
									<div class="news-date">
										<ul class="news-date">
											<li class="date">
												<?= get_the_date('d-m'); ?>
											</li>
											<li class="year">
												<?= get_the_date('Y'); ?>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-9 col-info">
									<div class="news-info">
										<h3 class="news-title">
											<?= $titleNews ?>
										</h3>
										<p class="news-description text-10">
											<?= $descriptionNews ?>
										</p>
									</div>
								</div>
							</div>
						</a>
					</div>
				<?php

				endwhile; ?>
			</div>
			<?php

			the_posts_navigation();

		else :

			get_template_part('template-parts/content', 'none');

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
