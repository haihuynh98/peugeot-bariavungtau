<?php

//add extra fields to category edit form hook
add_action('product_cat_add_form_fields', 'add_custom_fields_product_cat');
add_action('product_cat_edit_form_fields', 'add_custom_fields_product_cat');
//add extra fields to category edit form callback function
function add_custom_fields_product_cat($tag)
{    //check for existing featured ID
	$t_id = $tag->term_id;
	$postStickyProductID = get_term_meta($t_id,"post_sticky_product",true);
	$args = array(
		'post_type' => 'product',
		'orderby' => 'title',
		'order' => 'ASC',
		'tax_query' => array(
			array(
				'taxonomy' => 'product_cat',
				'field' => 'term_id',
				'terms' => $t_id,
			),
		),
		'posts_per_page' => -1,
		'post_status' => 'publish'
	);
	$query = new WP_Query($args);

	?>
	<div class="form-field term-description-wrap">
		<tr class="form-field">
			<th scope="row" valign="top"><label for="post_sticky_product"><?php _e('Product Sticky'); ?></label></th>
			<td>
				<select name="post_sticky_product" id="post_sticky_product">
					<option>-- Chọn sản phẩm --</option>
					<?php if ($query->have_posts()):

						while ($query->have_posts()) : $query->the_post(); ?>
							<option
								value="<?= get_the_ID() ?>" <?= $postStickyProductID == get_the_ID() ? 'selected="selected"' : '' ?>><?= get_the_title() ?></option>
						<?php endwhile;
					endif;
					wp_reset_query(); ?>
				</select>
				<p>Giá trị này chọn ra bài viết được neo.</p>
			</td>
		<tr>
			<th scope="row" valign="top"><label for="brochure_file"><?php _e('Brochure file url'); ?></label></th>

			<td>
				<input type="url" id="brochure_file_url" name="brochure_file_url" style="width:100%" value="<?= get_term_meta($t_id,"brochure_file_url",true)?>">
			</td>
		</tr>
		</tr>
	</div>

	<?php
}


// save extra category extra fields hook
add_action('edited_product_cat', 'save_custom_product_cat_fileds');
function save_custom_product_cat_fileds($term_id)
{
	$t_id = $term_id;

	if (isset($_POST['post_sticky_product'])) {
		$valueTermMeta = $_POST['post_sticky_product'];
		add_term_meta($t_id,'post_sticky_product', $valueTermMeta);
	} else {
		if (!empty(get_option("post_sticky_product_$t_id"))) {
			delete_term_meta($t_id,"post_sticky_product");
		}
	}


	if (isset($_POST['brochure_file_url'])) {
		$valueTermMeta = $_POST['brochure_file_url'];
		add_term_meta($t_id,"brochure_file_url", $valueTermMeta);
	} else {
		if (!empty(get_option("brochure_file_url_$t_id"))) {
			delete_term_meta($t_id,"brochure_file_url");
		}
	}
}
