<?php
    
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {
        acf_register_block_type(array(
            'name'              =>  'imgwithcontent',
            'title'             =>  __('Img With Content'),
            'description'       =>  __('This block use for 2 Type Layout.' ),
           'render_callback'   =>   'img_with_content_callback',
            'align'             =>  'full',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'imgwithcontent'),
            'supports'          =>  array(
                'align'     => true,
                'align_text' => true,
                'align_content' => true
            ),
            'enqueue_style' => get_template_directory_uri() .'/assets/css/main.css'
        ));
    }
}

require_once( TEHEME_DIRECTORY . '/blocks/callbacks/img_with_content.php' );


?>