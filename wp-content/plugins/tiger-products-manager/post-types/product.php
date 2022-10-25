<?php

/**
 * Registers the `product` post type.
 */
function product_init() {
	register_post_type(
		'product',
		[
			'labels'                => [
				'name'                  => __( 'Products', 'tiger-products-manager' ),
				'singular_name'         => __( 'Product', 'tiger-products-manager' ),
				'all_items'             => __( 'All Products', 'tiger-products-manager' ),
				'archives'              => __( 'Product Archives', 'tiger-products-manager' ),
				'attributes'            => __( 'Product Attributes', 'tiger-products-manager' ),
				'insert_into_item'      => __( 'Insert into Product', 'tiger-products-manager' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Product', 'tiger-products-manager' ),
				'featured_image'        => _x( 'Featured Image', 'product', 'tiger-products-manager' ),
				'set_featured_image'    => _x( 'Set featured image', 'product', 'tiger-products-manager' ),
				'remove_featured_image' => _x( 'Remove featured image', 'product', 'tiger-products-manager' ),
				'use_featured_image'    => _x( 'Use as featured image', 'product', 'tiger-products-manager' ),
				'filter_items_list'     => __( 'Filter Products list', 'tiger-products-manager' ),
				'items_list_navigation' => __( 'Products list navigation', 'tiger-products-manager' ),
				'items_list'            => __( 'Products list', 'tiger-products-manager' ),
				'new_item'              => __( 'New Product', 'tiger-products-manager' ),
				'add_new'               => __( 'Add New', 'tiger-products-manager' ),
				'add_new_item'          => __( 'Add New Product', 'tiger-products-manager' ),
				'edit_item'             => __( 'Edit Product', 'tiger-products-manager' ),
				'view_item'             => __( 'View Product', 'tiger-products-manager' ),
				'view_items'            => __( 'View Products', 'tiger-products-manager' ),
				'search_items'          => __( 'Search Products', 'tiger-products-manager' ),
				'not_found'             => __( 'No Products found', 'tiger-products-manager' ),
				'not_found_in_trash'    => __( 'No Products found in trash', 'tiger-products-manager' ),
				'parent_item_colon'     => __( 'Parent Product:', 'tiger-products-manager' ),
				'menu_name'             => __( 'Products', 'tiger-products-manager' ),
			],
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'supports'              => [ 'title', 'editor' ],
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => null,
			'menu_icon'             => 'data:image/svg+xml;base64,' . base64_encode('<svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path d="M7.4 2.5C-.8 7.4-.1-13.8.2 225.2l.3 212.7 2.1 2.7c1.1 1.5 3.3 3.7 4.8 4.8 2.7 2.1 3.7 2.1 102.1 2.6l99.3.5 7.2 8.3c22.4 25.9 53.6 44.7 85.5 51.6 45.9 10 95.5-1.9 134-31.9 44.1-34.4 66.2-87.9 59-142.8-.8-6.3-2.6-15.8-4-21.3l-2.5-9.9 10.4-10.5c13.8-14 15.5-17.5 12-25.8-1.6-3.8-42.2-45.7-49.8-51.3-2.9-2.2-5-2.9-8.2-2.9H448l-.2-100.9c-.3-100.2-.3-101-2.4-103.7-1.1-1.5-3.3-3.7-4.8-4.8L437.9.5 224.7.3 11.5 0 7.4 2.5zM161 64.7c0 33 .1 35 2 38.1 1.1 1.8 3.4 4.1 5.2 5.2 3.2 1.9 5.2 2 55.9 2h52.6l3.4-2.3c6.8-4.5 6.9-5.2 6.9-43.5V30h131v184.9l-12.2-5.9c-20.4-9.8-36.5-14.3-57.3-16-56.6-4.6-114 24.3-146.1 73.5-28.4 43.7-33.7 96.2-14.5 144.3 1.2 2.9 2.1 5.7 2.1 6.2 0 .6-29.4 1-80 1H30V30h131v34.7zm96-9.7v25h-66V30h66v25zm110.2 171.3c5.4 1.4 13.5 4.1 18.2 6 8 3.3 24.6 12.5 24.6 13.6 0 .4-16.6 17.2-37 37.6l-37 36.9-13.7-13.6c-21.7-21.3-19.6-21.8-53.6 12-27.5 27.4-28.7 29-27.3 36.9.7 3.4 5.6 8.7 43.4 46.6 46.7 46.7 46.9 46.9 55.3 44.7 4-1 10.2-6.9 63.6-60.3 32.6-32.5 59.4-58.9 59.7-58.7 1 1 2.6 16.6 2.6 24.8 0 55.3-38.9 107.4-92.2 123.6-25.1 7.7-53.1 7.2-79-1.4-40.6-13.5-73.1-48.6-83.9-90.5-4.1-15.9-5.1-37.7-2.4-53.5 9-54.2 52.1-96.7 107.9-106.5 13.1-2.3 38.6-1.4 50.8 1.8zm38.5 115.4L336 411.5 306.5 382 277 352.5l12.2-12.2 12.2-12.3 14.1 13.9c11.6 11.5 14.7 14 17.8 14.6 8.1 1.5 8.4 1.3 65.2-55.5l53-53 12 12 12 12-69.8 69.7z" fill="currentColor"/></svg>'),
			'show_in_rest'          => true,
			'rest_base'             => 'product',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		]
	);

}

add_action( 'init', 'product_init' );

/**
 * Sets the post updated messages for the `product` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `product` post type.
 */
function product_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['product'] = [
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Product updated. <a target="_blank" href="%s">View Product</a>', 'tiger-products-manager' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'tiger-products-manager' ),
		3  => __( 'Custom field deleted.', 'tiger-products-manager' ),
		4  => __( 'Product updated.', 'tiger-products-manager' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Product restored to revision from %s', 'tiger-products-manager' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false, // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Product published. <a href="%s">View Product</a>', 'tiger-products-manager' ), esc_url( $permalink ) ),
		7  => __( 'Product saved.', 'tiger-products-manager' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Product submitted. <a target="_blank" href="%s">Preview Product</a>', 'tiger-products-manager' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Product scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Product</a>', 'tiger-products-manager' ), date_i18n( __( 'M j, Y @ G:i', 'tiger-products-manager' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Product draft updated. <a target="_blank" href="%s">Preview Product</a>', 'tiger-products-manager' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	];

	return $messages;
}

add_filter( 'post_updated_messages', 'product_updated_messages' );

/**
 * Sets the bulk post updated messages for the `product` post type.
 *
 * @param  array $bulk_messages Arrays of messages, each keyed by the corresponding post type. Messages are
 *                              keyed with 'updated', 'locked', 'deleted', 'trashed', and 'untrashed'.
 * @param  int[] $bulk_counts   Array of item counts for each message, used to build internationalized strings.
 * @return array Bulk messages for the `product` post type.
 */
function product_bulk_updated_messages( $bulk_messages, $bulk_counts ) {
	global $post;

	$bulk_messages['product'] = [
		/* translators: %s: Number of Products. */
		'updated'   => _n( '%s Product updated.', '%s Products updated.', $bulk_counts['updated'], 'tiger-products-manager' ),
		'locked'    => ( 1 === $bulk_counts['locked'] ) ? __( '1 Product not updated, somebody is editing it.', 'tiger-products-manager' ) :
						/* translators: %s: Number of Products. */
						_n( '%s Product not updated, somebody is editing it.', '%s Products not updated, somebody is editing them.', $bulk_counts['locked'], 'tiger-products-manager' ),
		/* translators: %s: Number of Products. */
		'deleted'   => _n( '%s Product permanently deleted.', '%s Products permanently deleted.', $bulk_counts['deleted'], 'tiger-products-manager' ),
		/* translators: %s: Number of Products. */
		'trashed'   => _n( '%s Product moved to the Trash.', '%s Products moved to the Trash.', $bulk_counts['trashed'], 'tiger-products-manager' ),
		/* translators: %s: Number of Products. */
		'untrashed' => _n( '%s Product restored from the Trash.', '%s Products restored from the Trash.', $bulk_counts['untrashed'], 'tiger-products-manager' ),
	];

	return $bulk_messages;
}

add_filter( 'bulk_post_updated_messages', 'product_bulk_updated_messages', 10, 2 );
