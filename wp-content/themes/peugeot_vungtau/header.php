<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Peugeot_Vung_Tau
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$logoUrl = get_template_directory_uri() . '/images/logo-kia-new.png';
 if (has_custom_logo()) {
	 $custom_logo_id = get_theme_mod( 'custom_logo' );
	 $logoUrl = wp_get_attachment_image_url($custom_logo_id, 'full');
 }
$locations = get_nav_menu_locations();
$theme_location ='menu-1';
$menu = get_term( $locations[$theme_location], 'nav_menu' );
$menu_items = wp_get_nav_menu_items($menu->term_id);

?>
<header class="nav-main sticky-top" id="nav_main">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid ">
			<a href="<?= esc_url( home_url( '/' ))?>"><img class="logo hide-pc" src="<?= $logoUrl?>" alt="<?= bloginfo( 'name' )?>"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav justify-content-around align-items-center w-100">
					<?php
					$menuIndex = 0;
					$itemMid = intval(count($menu_items)/2);
					foreach ( $menu_items as $menu_item ):
						$menuIndex++;
					?>
					<li class="nav-item active">
						<a class="nav-link" href="<?= $menu_item->url?>"><?= $menu_item->post_title?></a>
					</li>
						<?php if ($menuIndex == $itemMid):?>
							<li class="nav-item hide-tablet hide-mobile">
								<a href="<?= esc_url( home_url( '/' ))?>"><img src="<?= $logoUrl?>" alt="<?= bloginfo( 'name' )?>"></a>
							</li>
						<?php endif;?>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
	</nav>
</header>
