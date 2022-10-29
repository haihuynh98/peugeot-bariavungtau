<?php if(function_exists('getTigerOption')):?>
<section class="column-option section-w-title" id="column_option">
	<h1 class="text-title text-center text-uppercase">Mua Xe</h1>
	<div class="container-fluid">
		<div class="row-column icon-swipe-left">
			<?php for ($i = 1;$i <=4; $i++):?>
			<div class="col">
				<a href="<?= getTigerOption('home_services_url_' . $i)?>">
					<div class="bg-image"
						 style="background-image: url('<?= getTigerOption('home_services_image_' . $i)?>')">
						<div class="overlay"></div>
						<div class="content">
							<h2 class="title"><?= getTigerOption('home_services_heading_' . $i)?></h2>
							<span class="text-14 text-detail"><?= getTigerOption('home_services_description_' . $i)?></span>
							<div class="button-click">
								<span class="text-12">Khám phá ngay</span>

								<img src="<?= get_parent_theme_file_uri() . '/images/icon/button.png'?>"
									 alt="<?= bloginfo('name')?>" class="img-fluid">
							</div>
						</div>

					</div>
				</a>
			</div>
			<?php endfor;?>
		</div>
	</div>

	<script>
		jQuery(function ($) {
			$(document).ready(function () {
				$('.row-column').scroll(function (event) {
					if ($(this).hasClass('icon-swipe-left')) {
						$(this).removeClass('icon-swipe-left');
					}
				});
			});
		});
	</script>
</section>
<?php endif;?>
