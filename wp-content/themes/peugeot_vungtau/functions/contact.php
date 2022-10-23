<?php

/**
 * Khai báo meta box
 **/
function contact_meta_box()
{
    if (in_array(get_page_template_slug(), ['page_contact-template.php'])) {
        add_meta_box('contact-information', 'Contact information', 'render_form_contact', 'page', 'normal', 'high');
        add_meta_box( 'my-post-box', 'Media Field', 'multi_media_uploader_meta_box_func', 'page', 'normal', 'high' );
    }
}

add_action('add_meta_boxes', 'contact_meta_box');


/**
 * @param $post
 * @return void
 */
function render_form_contact($post): void
{
    $short_code_cf7 = get_post_meta($post->ID, '_ct_short_code_cf7', true);
    $phone = get_post_meta($post->ID, '_ct_phone', true);
    $email = get_post_meta($post->ID, '_ct_email', true);
	$working_time = get_post_meta($post->ID, '_ct_working_time', true);

    echo('<table class="form-table" role="presentation">');
    echo('<tbody>');

	echo('<tr>');
	echo('<th scope="row"><label for="contact_phone">HOTLINE</label></th>');
	echo('<td>');
	echo('<input type="text" id="contact_phone" name="contact_phone" value="' . esc_attr($phone) . '" style="width:100%" />');
	echo('</td></tr>');

	echo('<tr>');
	echo('<th scope="row"><label for="email">MAIL</label></th>');
	echo('<td>');
	echo('<input type="text" id="email" name="email" value="' . esc_attr($email) . '" style="width:100%" />');
	echo('</td></tr>');

	echo('<tr>');
	echo('<th scope="row"><label for="email">THỜI GIAN LÀM VIỆC</label></th>');
	echo('<td>');
	echo('<input type="text" id="working_time" name="working_time" value="' . esc_attr($working_time) . '" style="width:100%" />');
	echo('</td></tr>');

    echo('<tr>');
    echo('<th scope="row"><label for="short_code_cf7">Short code CF7</label></th>');
    echo('<td>');
    echo('<input type="text" id="short_code_cf7" name="short_code_cf7" value="' . esc_attr($short_code_cf7) . '" style="width:100%" />');
    echo('</td></tr>');

    echo('</td></tr>');


    echo('</tbody>');
    echo('</table>');
}

function contact_meta_box_save($post_id)
{
    if (isset($_POST['contact_phone'])) {
        update_post_meta($post_id, '_ct_phone', $_POST['contact_phone']);
    }
    if (isset($_POST['email'])) {
        update_post_meta($post_id, '_ct_email', $_POST['email']);
    }
	if (isset($_POST['working_time'])) {
		update_post_meta($post_id, '_ct_working_time', $_POST['working_time']);
	}
    if (isset($_POST['short_code_cf7'])) {
        update_post_meta($post_id, '_ct_short_code_cf7', $_POST['short_code_cf7']);
    }

}

add_action('save_post', 'contact_meta_box_save');

function disable_content_editor()
{
    if (get_page_template_slug() == 'page_contact-template.php') {
        remove_post_type_support('page', 'editor');
    }

}

add_action('admin_init', 'disable_content_editor');


function multi_media_uploader_meta_box_func($post) {
    $banner_img = get_post_meta($post->ID,'_project_banner_img',true);
    ?>
    <style type="text/css">
        .multi-upload-medias ul li .delete-img { position: absolute; right: 3px; top: 2px; background: aliceblue; border-radius: 50%; cursor: pointer; font-size: 14px; line-height: 20px; color: red; }
        .multi-upload-medias ul li { width: 120px; display: inline-block; vertical-align: middle; margin: 5px; position: relative; }
        .multi-upload-medias ul li img { width: 100%; }
    </style>

    <table cellspacing="10" cellpadding="10">
        <tr>
            <td>Banner Image</td>
            <td>
                <?php echo multi_media_uploader_field( 'project_banner_img', $banner_img ); ?>
            </td>
        </tr>
    </table>

    <script type="text/javascript">
        jQuery(function($) {

            $('body').on('click', '.wc_multi_upload_image_button', function(e) {
                e.preventDefault();

                var button = $(this),
                    custom_uploader = wp.media({
                        title: 'Insert image',
                        button: { text: 'Use this image' },
                        multiple: true
                    }).on('select', function() {
                        var attech_ids = '';
                        attachments
                        var attachments = custom_uploader.state().get('selection'),
                            attachment_ids = new Array(),
                            i = 0;
                        attachments.each(function(attachment) {
                            attachment_ids[i] = attachment['id'];
                            attech_ids += ',' + attachment['id'];
                            if (attachment.attributes.type == 'image') {
                                $(button).siblings('ul').append('<li data-attechment-id="' + attachment['id'] + '"><a href="' + attachment.attributes.url + '" target="_blank"><img class="true_pre_image" src="' + attachment.attributes.url + '" /></a><i class=" dashicons dashicons-no delete-img"></i></li>');
                            } else {
                                $(button).siblings('ul').append('<li data-attechment-id="' + attachment['id'] + '"><a href="' + attachment.attributes.url + '" target="_blank"><img class="true_pre_image" src="' + attachment.attributes.icon + '" /></a><i class=" dashicons dashicons-no delete-img"></i></li>');
                            }

                            i++;
                        });

                        var ids = $(button).siblings('.attechments-ids').attr('value');
                        if (ids) {
                            var ids = ids + attech_ids;
                            $(button).siblings('.attechments-ids').attr('value', ids);
                        } else {
                            $(button).siblings('.attechments-ids').attr('value', attachment_ids);
                        }
                        $(button).siblings('.wc_multi_remove_image_button').show();
                    })
                        .open();
            });

            $('body').on('click', '.wc_multi_remove_image_button', function() {
                $(this).hide().prev().val('').prev().addClass('button').html('Add Media');
                $(this).parent().find('ul').empty();
                return false;
            });

        });

        jQuery(document).ready(function() {
            jQuery(document).on('click', '.multi-upload-medias ul li i.delete-img', function() {
                var ids = [];
                var this_c = jQuery(this);
                jQuery(this).parent().remove();
                jQuery('.multi-upload-medias ul li').each(function() {
                    ids.push(jQuery(this).attr('data-attechment-id'));
                });
                jQuery('.multi-upload-medias').find('input[type="hidden"]').attr('value', ids);
            });
        })
    </script>

    <?php
}


function multi_media_uploader_field($name, $value = '') {
    $image = '">Add Media';
    $image_str = '';
    $image_size = 'full';
    $display = 'none';
    $value = explode(',', $value);

    if (!empty($value)) {
        foreach ($value as $values) {
            if ($image_attributes = wp_get_attachment_image_src($values, $image_size)) {
                $image_str .= '<li data-attechment-id=' . $values . '><a href="' . $image_attributes[0] . '" target="_blank"><img src="' . $image_attributes[0] . '" /></a><i class="dashicons dashicons-no delete-img"></i></li>';
            }
        }

    }

    if($image_str){
        $display = 'inline-block';
    }

    return '<div class="multi-upload-medias"><ul>' . $image_str . '</ul><a href="#" class="wc_multi_upload_image_button button' . $image . '</a><input type="hidden" class="attechments-ids ' . $name . '" name="' . $name . '" id="' . $name . '" value="' . esc_attr(implode(',', $value)) . '" /><a href="#" class="wc_multi_remove_image_button button" style="display:inline-block;display:' . $display . '">Remove media</a></div>';
}

// Save Meta Box values.
add_action( 'save_post', 'wc_meta_box_save' );

function wc_meta_box_save( $post_id ) {
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if( !current_user_can( 'edit_post' ) ){
        return;
    }

    if( isset( $_POST['project_banner_img'] ) ){
        update_post_meta( $post_id, '_project_banner_img', $_POST['project_banner_img'] );
    }
}
