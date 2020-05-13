<?php

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );
function woo_hide_page_title() {
    
    return false;
    
}

add_action('woocommerce_before_main_content', 'get_custom_wc_output_content_wrapper', 11);
add_action('woocommerce_after_main_content', 'get_custom_wc_output_content_wrapper_end', 9);

function get_custom_wc_output_content_wrapper(){

    if(is_shop() OR is_product_category()){ 
       echo '<section class="new-compitions-sec">
          <div class="fl-sec-hdr-title">
            <h1 class="full-width-bdr-title">
              <span><i></i><em></em> NEW COMPETITIONS</span>
            </h1>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="ncsecgrd-cntlr">';
    }


}

function get_custom_wc_output_content_wrapper_end(){
	if(is_shop() OR is_product_category()){ 
    	echo '</div></div></div></div></section>';
	}

}

add_action('recent_ended_competition', 'get_recent_competition');
function get_recent_competition(){
    get_template_part('templates/wc-ended', 'templates');
}


add_filter('woocommerce_catalog_orderby', 'wc_customize_product_sorting');

function wc_customize_product_sorting($sorting_options){
    $sorting_options = array(
        'menu_order' => __( 'sort by', 'woocommerce' ),
        'popularity' => __( 'popularity', 'woocommerce' ),
        'rating'     => __( 'average rating', 'woocommerce' ),
        'date'       => __( 'newness', 'woocommerce' ),
        'price'      => __( 'low price', 'woocommerce' ),
        'price-desc' => __( 'high price', 'woocommerce' ),
    );

    return $sorting_options;
}

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}

/*Loop Hooks*/


/**
 * Add loop inner details are below
 */

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

add_action('woocommerce_shop_loop_item_title', 'add_shorttext_below_title_loop', 5);
if (!function_exists('add_shorttext_below_title_loop')) {
    function add_shorttext_below_title_loop() {
        global $product, $woocommerce, $post;

        echo '<div class="fl-pro-grd-item">';
        echo '<div class="fl-pro-grd-item-fea-img">';
        echo '<a href="'.get_permalink( $product->get_id() ).'">';
        echo wp_get_attachment_image( get_post_thumbnail_id($product->get_id()), 'pgrid' );
        echo '</a>';
        echo '</div>';
        echo '<div class="fl-pro-grd-item-prices">';
        echo '<p><strong>';
        echo $product->get_price_html();
        echo '</strong></p>';
        echo '</div>';
        echo '<div class="fl-pro-grd-item-title mHc">';
        echo '<span class="title-angle"></span>';
        echo '<strong><a href="'.get_permalink( $product->get_id() ).'">';
        echo get_the_title(); 
        echo '</a></strong>';
        echo '</div>';
        echo '</div>';
        
    }
}



/*Remove Single page Woocommerce Hooks & Filters are below*/



//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_action('lottery_price', 'get_lottery_price');

function get_lottery_price(){
    global $product;
    echo '<div class="fl-pro-summary-prices"><div>';
    echo '<label>ENTER FOR:</label>';
    echo $product->get_price_html();
    echo '</div></div>';
}

add_action('wc_product_subtitle', 'get_product_subtitle');
function get_product_subtitle(){
    echo '<h3 class="fl-product-summary-title-1">ENTER NOW FOR A CHANCE TO WIN THE KEYS TO A</h3>';
}

add_action('wc_product_stats', 'get_product_stats');
function get_product_stats(){
    get_template_part('templates/wc/product', 'stats');
}

add_action('wc_product_tab', 'get_single_product_tab');
function get_single_product_tab(){
    get_template_part('templates/wc/product-single', 'tabs');
}

add_action('wc_lottery_countdown', 'get_product_lottery_countdown');
function get_product_lottery_countdown(){
    get_template_part('templates/wc/product-single', 'countdown');
}

add_action('wc_short_description', 'get_product_short_description');
function get_product_short_description(){
   echo '<div class="fl-product-summary-txt">
          <p>You must answer the question correctly when you enter. <br>
          <strong>Competition will close early if all entries are sold prior to end date.</strong><br>
            For postal entry method <a href="#">see here</a></p>
        </div>';
}

// change a number of the breadcrumb defaults.
add_filter( 'woocommerce_breadcrumb_defaults', 'cbv_woocommerce_breadcrumbs' );
if( !function_exists('cbv_woocommerce_breadcrumbs')):
function cbv_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '',
            'wrap_before' => '<div class="fl-breadcrumbs"><ul class="reset-list">',
            'wrap_after'  => '</ul></div>',
            'before'      => '<li>',
            'after'       => '</li>',
            'home'        => _x( 'home', 'breadcrumb', 'woocommerce' ),
        );
}
endif;