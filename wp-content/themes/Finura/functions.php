<?php

add_action('wp_enqueue_scripts', 'finura_assets');
add_action('after_setup_theme', function () {
    add_theme_support('woocommerce');
});


function finura_assets()
{

    // Bootstrap CSS
    wp_enqueue_style(
        'bootstrap-css',
        get_template_directory_uri() . '/assets/bootstrap/bootstrap.min.css',
        [],
        '5.3.8'
    );

    // Theme CSS
    wp_enqueue_style(
        'finura-style',
        get_stylesheet_uri(),
        ['bootstrap-css'],
        '1.0'
    );

    // Bootstrap JS
    wp_enqueue_script(
        'bootstrap-js',
        get_template_directory_uri() . '/assets/bootstrap/bootstrap.bundle.min.js',
        [],
        '5.3.8',
        true
    );

    //Swiper
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery-4.0.0.min.js', false, null, true);

    wp_enqueue_script('swiper-script', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', false, null, 'footer');
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery', 'swiper-script'), null, 'footer');


    wp_enqueue_style('swiper-style', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css');
}



//Add WooCommerce file
require get_template_directory() . '/inc/woocommerce.php';


//DELETE PRODUCT DESCRIPTION
add_filter( 'woocommerce_product_tabs', function ( $tabs ) {
    unset( $tabs['description'] );
    return $tabs;
}, 98 );



// Custom sale badge with percentage
add_filter('woocommerce_sale_flash', 'custom_sale_badge_percentage', 10, 3);

function custom_sale_badge_percentage($html, $post, $product) {

    if ($product->is_on_sale()) {

        $regular_price = (float) $product->get_regular_price();
        $sale_price    = (float) $product->get_sale_price();

        if ($regular_price > 0) {
            $percentage = round((($regular_price - $sale_price) / $regular_price) * 100);
            $html = '<span class="onsale">-' . $percentage . '%</span>';
        }
    }

    return $html;
}