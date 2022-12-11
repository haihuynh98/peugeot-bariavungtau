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

$product = get_page_by_path(get_query_var('p_slug'), OBJECT, 'product');
$currentPID = $product->ID;
$currentPCat = get_the_terms($currentPID, 'product_cat');


$currentPCatID = $currentPCat[0]->term_id;


$thumbnail_cat_id = get_term_meta($currentPCatID, 'thumbnail_id');
$thumbnail_cat = reset($thumbnail_cat_id);

if ($_thumbnail_id = get_post_meta($currentPID, '_thumbnail_id', true)) {
	$thumbnail_cat = $_thumbnail_id;
}

$license_plate_registration_fee = [
	"default" => 5000000,
	"01" => 20000000,
	"79" => 20000000
];

$currentPrice = get_post_meta($currentPID, '_regular_price', true);
$totalCost = 0;

if ($currentPrice != 0) {
	$registration_fee = $currentPrice * 0.1;
	$discount = 0;
	if (!empty($priceSale = get_post_meta($currentPID, '_sale_price', true))) {
		$discount = $currentPrice - $priceSale;
	}

	//license plate registration fee
	$lpr_fee = $license_plate_registration_fee['default'];
	if (isset($_GET['area'])) {
		$lpr_fee = array_key_exists($_GET['area'], $license_plate_registration_fee) ? $license_plate_registration_fee[$_GET['area']] : $license_plate_registration_fee['default'];

	}

	$totalCost = $currentPrice + $registration_fee + $lpr_fee - $discount;
}


$banks = [
	"acb" => [
		"name" => "Ngân hàng ACB",
		"interest_rate" => 10
	],
	"vcb" => [
		"name" => "Ngân hàng Vietcombank",
		"interest_rate" => 13
	]
];

$loans = [
	1 => [
		"title" => "1 năm",
		"months" => 12
	],
	2 => [
		"title" => "2 năm",
		"months" => 24
	],
	3 => [
		"title" => "3 năm",
		"months" => 36
	],
	4 => [
		"title" => "4 năm",
		"months" => 48
	],
	5 => [
		"title" => "5 năm",
		"months" => 60
	],
	6 => [
		"title" => "6 năm",
		"months" => 72
	],
	7 => [
		"title" => "7 năm",
		"months" => 84
	],
	8 => [
		"title" => "8 năm",
		"months" => 96
	],
];

$loanMoney = [
	50, 60, 70, 80
];

$short_code_cf7 = getTigerOption('short_code_cf7_estimate_cost');
?>

<?php print_r(get_content_url('')) ?>
<main class="estimate-page mb-5" id="estimate_page">
	<div class="header-tab" id="header_tab">
		<div class="container-fluid">
			<div class="nav-header-tab row">
				<div class="nav-container col-lg-8 col-12">
					<a href="javascript:;" class="nav-item step-1 active" id="nav_header_tab_1">Dự toán chi phí</a>
					<a href="javascript:;" class="nav-item step-2" id="nav_header_tab_2">Đăng ký nhận ưu đãi</a>
				</div>
				<div class="groupbutton col-lg-4 col-12 text-lg-end text-center text-nowrap">
					<a href="javascript:;" class="btn red-button step-1 active" id="btn_header_tab_1">Quay lại</a>
					<a href="javascript:;" class="btn red-button step-2" id="btn_header_tab_2">Tiếp theo <i
							class="fa fa-arrow-right" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid container-estimate-info px-md-5">
		<div class="row">
			<div class="col-lg-8 col-md-12 col-12 left-panel">
				<div class="row car-info">
					<div class="col-xl-6 col-lg-12 col-12 order-md-2 order-lg-1 order-2 compare-container">
						<div class="result-compare">
							<h1>Tổng chi phí dự tính</h1>
							<span class="color-price total-cost-label"><?= number_format($totalCost) . ' VNĐ'; ?></span>
							<div class="button">
								<a class="btn red-button popup_dklt" href="javascript:;">Đăng ký lái thử</a>
								<?php if ($brochureLink = get_term_meta($currentPCatID, "brochure_file_url", true)): ?>
									<a class="btn gray-button " href="<?= $brochureLink ?>">Tải E-Brochure</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-12 col-12 order-lg-2 order-1">
						<div class="image-car">
							<?php echo wp_get_attachment_image($thumbnail_cat, 'large') ?>
						</div>
					</div>
				</div>
				<div class="credit-form" id="credit_form">
					<h3 class="title-form">Vay trả góp ngân hàng</h3>
					<div class="card-body text-14">
						<div class="content-body content-select">
							<div class="row">
								<div class="col-12 col-lg-6 col-content">
									<label for="bank" class="form-label">Chọn ngân hàng<span
											class="text-danger">*</span></label>
									<select id="bank" class="form-select">
										<option value="">Chọn một ngân hàng</option>

										<?php foreach ($banks as $codeBank => $bank): ?>
											<option
												value="<?= $codeBank ?>" <?= isset($_GET['bank-code']) && $_GET['bank-code'] == $codeBank ? 'selected' : '' ?>
												data-interest_rate="<?= $bank['interest_rate'] ?>"
												data-bank_name="<?= $bank["name"] ?>"><?= $bank["name"] . ' (' . $bank["interest_rate"] . '%)' ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-12 col-lg-6 col-content">
									<label for="loan" class="form-label">Thời gian vay<span class="text-danger">*</span></label>
									<select id="loan" class="form-select">
										<option value="" disabled>Chọn thời gian vay</option>

										<?php foreach ($loans as $key => $loan): ?>
											<option
												value="<?= $key ?>" <?= isset($_GET['loan']) && $_GET['loan'] == $key ? 'selected' : '' ?>
												data-months="<?= $loan['months'] ?>"><?= $loan["title"] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-12 col-lg-6 col-content">
									<label for="total_price" class="form-label">Giá trị tài sản định mua<span
											class="text-danger">*</span></label>
									<input type="text" class="form-control total-cost-number total-cost-label"
										   name="total_price" disabled id="total_price" data-number="<?= $totalCost ?>"
										   value="<?= number_format($totalCost) . ' VNĐ'; ?>">
								</div>

								<div class="col-12 col-lg-6 col-content">
									<label for="loan_money" class="form-label">Số tiền vay<span
											class="text-danger">*</span></label>
									<select id="loan_money" class="form-select">
										<option disabled>Chọn số tiền vay</option>

										<?php foreach ($loanMoney as $percent): ?>
											<option
												value="<?= $percent ?>" <?= isset($_GET['loan-percent']) && $_GET['loan-percent'] == $percent ? 'selected' : '' ?>
												data-number="<?= $totalCost * ($percent / 100) ?>"><?= $percent . '% - ' . number_format($totalCost * ($percent / 100)) . ' VNĐ'; ?></option>
										<?php endforeach; ?>
									</select>
								</div>

								<div class="col-12 col-content" id="loan_estimate_table">
									<label for="loan_estimate" class="form-label">Ước tính</label>
									<div class="loan-estimate" id="loan_estimate">
										<div class="row line-center">
											<div class="col-md-6 col-12 col-content">
												<p class="title">Số tiền phải trả hàng tháng</p>
												<strong class="color-price"><span class="price-per-month"
																				  id="price_per_month">123,456,789</span>
													VNĐ</strong>
												<input type="hidden" name="price_per_month" value="123456789">
											</div>
											<div class="col-md-6 col-12 col-content">
												<p class="title">Số năm</p>
												<strong><span class="months" id="months">12</span> tháng (<span
														class="year" id="year">1</span> năm)</strong>
												<input type="hidden" name="months" value="12">
											</div>
											<div class="col-md-6 col-12 col-content">
												<p class="title">Ngân hàng</p>
												<strong><span class="bank-name"
															  id="bank_name">Ngân hàng ACB</span></strong>
												<input type="hidden" name="bank_code" value="vnb"
													   data-bank_name="Vietcombank">
											</div>
											<div class="col-md-6 col-12 col-content">
												<p class="title">Tổng tiền</p>
												<strong class="color-price"><span class="total-loan-money"
																				  id="total_loan_money">123,456,789</span>
													VNĐ</strong>
												<input type="hidden" name="total_loan_money" value="123456789">
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 col-content">
									<p class="notes">GIÁ CHỈ MANG TÍNH CHẤT THAM KHẢO <br>
										ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT, KHÁCH HÀNG VUI LÒNG LIÊN HỆ HOTLINE: <a
											class="text-danger" ref="tel:(+84)797299789"> 079 72 99 789</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="contact-form" id="contact_form" style="display: none;">
					<p>CẢM ƠN QUÝ KHÁCH ĐÃ CHỌN PEUGEOT. VUI LÒNG ĐIỀN ĐẦY ĐỦ THÔNG TIN DƯỚI ĐÂY ĐỂ ĐẠI LÝ NHẬN ĐẶT HÀNG
						VÀ LIÊN HỆ</p>
					<div class="form-wrap-cf7">
						<?php echo do_shortcode($short_code_cf7) ?>
					</div>
				</div>
				<div class="loan-detail-table w-100" id="loan_detail_table">
					<div class="d-flex w-100 justify-content-between align-items-center">
						<a href="javascript:;" class="show-table">Xem chi tiết</a>
--						<a href="javascript:;" class="btn red-button" id="pdf_download" style="display:none">Xuất PDF</a>-
					</div>
					<table
						class="table table-striped table-hover table-responsive-sm table-responsive-md text-center w-100"
						id="loan-table" style="display:none">
						<thead>
						<tr>
							<th scope="col">Kì hạn (Tháng)</th>
							<th scope="col">Tổng tiền phải trả</th>
							<th scope="col">Tiền gốc</th>
							<th scope="col">Tiền lãi</th>
							<th scope="col">Tổng còn lại</th>
							<th scope="col">Lãi suất thật(%) trên tháng</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
				<div class="w-100 text-end">
				</div>
			</div>
			<div class="col-lg-4 col-md-12 col-12 left-line right-panel">
				<div class="select-cars">
					<div class="nav nav-tabs nav-fill nav-model" id="nav-tab" role="tablist">
						<?php if (count($pCats) > 0): ?>
							<?php foreach ($pCats as $pCat): ?>
								<button
									class="nav-item nav-link <?= $currentPCatID == $pCat->term_id ? 'active' : '' ?>"
									id="category_car_<?= $pCat->term_id ?>" data-bs-toggle="tab"
									data-bs-target="#category_<?= $pCat->term_id ?>" role="tab"
									aria-controls="category_<?= $pCat->term_id ?>" aria-selected="false">
									<span><?= $pCat->cat_name ?></span>
								</button>
							<?php endforeach; ?>
						<?php endif; ?>

					</div>
					<div class="tab-content tab-choose-car" id="nav-tabContent">

						<?php if (count($pCats) > 0): ?>
							<?php foreach ($pCats as $pCat): ?>
								<?php $thumbnail_term_id = get_term_meta($pCat->term_id, 'thumbnail_id');
								$thumbnail_id = reset($thumbnail_term_id); ?>
								<div
									class="tab-pane <?= $currentPCatID == $pCat->term_id ? 'active' : '' ?> fadecategory-<?= $pCat->term_id ?>"
									id="category_<?= $pCat->term_id ?>" role="tabpanel"
									aria-labelledby="category_car_<?= $pCat->term_id ?>">
									<div class="car-list">
										<div class="content-list">
											<div class="list">
												<div class="text-center w-100">
													<?php echo wp_get_attachment_image($thumbnail_id, 'medium') ?>
												</div>
												<h1 class="name-cat"><?= $pCat->name ?></h1>
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
															'key'     => '_publish_main_product',
															'compare' => 'NOT EXISTS',
														),
													),
													'posts_per_page' => -1
												]); ?>
												<?php while ($product_query->have_posts()) :
													$product_query->the_post();

													$ProductID = get_the_ID();

													$link = get_permalink(get_term_meta($pCat->term_id, 'post_sticky_product', true));
													$titleProduct = get_the_title($ProductID);
													$price = get_post_meta($ProductID, '_regular_price', true) == 0 ? 'Liên hệ' : number_format(get_post_meta($ProductID, '_regular_price', true)) . ' VNĐ';
													$slug = get_post_field('post_name', $ProductID)
													?>
													<div
														class="choose-model <?= $currentPID == $ProductID ? 'active' : '' ?>">
														<a href="/du-toan-chi-phi/<?= $slug ?>">
															<h2 class="car-name"><?= $titleProduct ?></h2>
															<span class="car-price"><?= $price ?></span>
														</a>
													</div>
												<?php
												endwhile;
												wp_reset_postdata();
												?>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>

					</div>
				</div>
				<div class="select-district mt-3">
					<div class="form-floating">
						<?php $districtVI = get_district_vi(); ?>
						<select class="form-select" id="area">
							<option value="" selected>Chọn 1 Tỉnh/Thành Phố</option>
							<?php foreach ($districtVI as $key => $district): ?>
								<option
									value="<?= $district['code'] ?>" <?= isset($_GET['area']) && $_GET['area'] == $district['code'] ? 'selected' : '' ?>
									data-lprfee="<?= array_key_exists($key, $license_plate_registration_fee) ? $license_plate_registration_fee[$district['code']] : $license_plate_registration_fee['default'] ?>"><?= $district['name'] ?></option>
							<?php endforeach; ?>
						</select>
						<label for="floatingSelect">Tỉnh/Thành Phố</label>
					</div>
				</div>
				<div class="model-information mt-3">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Thông tin xe</h5>
							<hr>
							<h6 class="card-subtitle mt-2 text-muted">Model xe</h6>
							<p class="card-text"><?= get_the_title($currentPID) ?></p>
						</div>
					</div>
				</div>
				<?php if ($currentPrice != 0): ?>
					<div class="cost-detail mt-3">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-5 text-start"><h5 class="card-title">Chi Phí (Tạm tính)</h5></div>
									<div class="col-7 text-end color-price text-nowrap"><span
											class="total-cost-label"><?= number_format($totalCost) . ' VNĐ'; ?></span>
									</div>
								</div>
								<hr>
								<table class="cost-detail-table w-100">
									<tbody>
									<tr>
										<td class="title align-middle"><span>Phí xe</span></td>
										<td class="price align-middle text-nowrap">
											<span><?= number_format($currentPrice); ?></span><span> VNĐ</span></td>
									</tr>
									<tr>
										<td class="title align-middle"><span>Phí trước bạ (10%)</span></td>
										<td class="price align-middle text-nowrap">
											<span
												id="label_registration_fee"><?= number_format($registration_fee); ?></span><span> VNĐ</span>
										</td>
									</tr>
									<tr>
										<td class="title align-middle"><span>Phí đăng kiểm biển số</span></td>
										<td class="price align-middle text-nowrap">
											<span
												id="label_lpr_fee"><?= number_format($lpr_fee); ?></span><span> VNĐ</span>
										</td>
									</tr>

									<tr>
										<td class="title align-middle"><span>Ưu đãi</span></td>
										<td class="price align-middle text-nowrap"><span
												id="label"
												style="font-weight: bold"><?= number_format($discount) . ' VNĐ'; ?></span>
										</td>
									</tr>
									</tbody>
									<input type="hidden" value="<?= $currentPrice ?>" id="cost_car" name="cost_car">
									<input type="hidden" value="<?= $registration_fee ?>" id="registration_fee"
										   name="registration_fee">
									<input type="hidden" value="<?= $lpr_fee ?>" id="lpr_fee" name="lpr_fee">
									<input type="hidden" value="<?= $discount ?>" id="discount" name="discount">
								</table>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script>
<script src="<?=get_template_directory_uri()?>/js/jspdf.plugin.autotable.min.js"></script>
<script src="<?=get_template_directory_uri()?>/js/tableHTMLExport.js"></script>
<!---->
<!--<script>-->
<!--	$('#pdf_download').on('click',function () {-->
<!--		$("#loan-table").tableHTMLExport({type:'pdf',filename:'sample.pdf'});-->
<!--	})-->
<!--</script>-->

<?php get_footer(); ?>


