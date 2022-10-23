<?php

/**
 * Template Name: Contact template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage mnconcept
 * @since TigerGentlemen
 */
get_header();

$pageID = get_the_ID();


$short_code_cf7 = get_post_meta($pageID, '_ct_short_code_cf7', true);
$phone = get_post_meta($pageID, '_ct_phone', true);
$email = get_post_meta($pageID, '_ct_email', true);
$working_time = get_post_meta($pageID, '_ct_working_time', true);
$banner = wp_get_attachment_url( get_post_meta($pageID, '_project_banner_img', true));
?>

<main id="contact-content">
    <section class="u-clearfix u-grey-90 u-valign-middle-md u-section-1 " id="carousel_09f3">
        <img class="img-banner" src="<?php echo $banner?>" alt="<?= bloginfo( 'name' )?>">
		<ul class="box-contact">
			<li class="box-item" >
				<ul class="box-content" >
					<li class="icon">
						<img class="img-fluid" src="https://kiavietnam.com.vn/themes/main/images/general/phone-icon.png" alt="Icon">
					</li>
					<li class="title" >Hotline</li>
					<li class="content" >
						<a class="text" href="tel:HOTLINE  - 1900 54 55 91" >HOTLINE  - <?php echo $phone?></a>
					</li>
				</ul>
			</li>
			<li class="box-item">
				<ul class="box-content" >
					<li class="icon">
						<img class="img-fluid" src="https://kiavietnam.com.vn/themes/main/images/general/mail-icon.png" alt="Icon">
					</li>
					<li class="label text-14 " Mail</li>
					<li class="content" >
						<a class="text" href="mailto:<?php echo $email?>" ><?php echo $email?></a>
					</li>
				</ul>
			</li>
			<li class="box-item">
				<ul class="box-content" >
					<li class="icon">
						<img class="img-fluid" src="https://kiavietnam.com.vn/themes/main/images/general/clock-icon.png" alt="Icon">
					</li>
					<li class="label text-14" >Thời gian làm việc</li>
					<li class="content" >
						<span class="text"><?php echo $working_time?></span>
					</li>
				</ul>
			</li>
		</ul>
<!--        <div class="u-list u-list-1" style="text-align: center; display: flex;justify-content: space-between;max-width: 80%;margin: 0 auto;">-->
<!--            <div class="u-repeater u-repeater-1" style="flex: 1;text-align: center; border-right: solid 2px #d9d9d9; padding: 15px 0;">-->
<!--                <div class="u-align-center u-container-style u-list-item u-opacity u-opacity-95 u-radius-5 u-repeater-item u-shape-round u-white u-list-item-2">-->
<!--                    <div class="u-container-layout u-similar-container u-valign-middle u-container-layout-2">-->
<!--                        <h5 class="u-text u-text-3">Hotline</h5>-->
<!--                        <p class="u-text u-text-grey-75 u-text-4">--><?php //echo $phone?>
<!--                        </p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="u-align-center u-container-style u-list-item u-opacity u-opacity-95 u-radius-5 u-repeater-item u-shape-round u-white u-list-item-3">-->
<!--                    <div class="u-container-layout u-similar-container u-valign-middle u-container-layout-3">-->
<!--                        <h5 class="u-text u-text-5">Email</h5>-->
<!--                        <p class="u-text u-text-grey-75 u-text-6" autocomplete="off">-->
<!--                            <a href="mailto:--><?php //echo $email?><!--" class="u-active-none u-border-1 u-border-active-black u-border-hover-black u-border-palette-4-dark-2 u-btn u-button-link u-button-style u-hover-none u-none u-text-active-black u-text-hover-black u-text-palette-4-dark-1 u-btn-1">--><?php //echo $email?><!--</a>-->
<!--                        </p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="u-align-center u-container-style u-list-item u-opacity u-opacity-95 u-radius-5 u-repeater-item u-shape-round u-white u-list-item-4">-->
<!--                    <div class="u-container-layout u-similar-container u-valign-middle u-container-layout-4">-->
<!--                        <h5 class="u-text u-text-7">Thời gian làm viêc</h5>-->
<!--                        <p class="u-text u-text-grey-75 u-text-8">--><?php //echo $working_time?>
<!--                        </p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

		<div class="u-clearfix u-layout-wrap u-layout-wrap-1" style="text-align: center; padding-top: 60px;
    text-align: center;" >
            <div class="u-layout">
                <div class="u-layout-row">
                    <div class="u-align-left u-container-style u-grey-60 u-layout-cell u-left-cell u-opacity u-opacity-75 u-size-30 u-layout-cell-1">
                        <div class="u-container-layout u-container-layout-5">
                            <h3 class="u-text u-text-body-alt-color u-text-default u-text-9" style="    font-family: "UTMBanqueBold",sans-serif;
							color: #1f1f1f;
							padding-bottom: 40px;">VUI LÒNG ĐỂ LẠI THÔNG TIN LIÊN HỆ THEO MẪU BÊN DƯỚI</h3>
                            <div class="form-wrap-cf7">
                                <?php echo do_shortcode($short_code_cf7)?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php

    if (have_posts()) {

        while (have_posts()) {
            the_post();

            get_template_part('template-parts/content-cover');
        }
    }

    ?>

</main><!-- #site-content -->

<?php get_template_part('template-parts/footer-menus-widgets'); ?>

<?php get_footer(); ?>


