<?php

add_action( 'after_setup_theme', 'business_consulting_dark_setup' );
function business_consulting_dark_setup(){    
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    $starter_content = array(
        'posts' => array(
             'home',
             'about',
             'contact',
             'blog'
        ),
        'options' => array(
            'show_on_front' => 'posts'
        ),
        'theme_mods' => array(
            'top_header_status'   => false,
            'footer_social_links' => [
                [
                    'icon' => 'fab fa-facebook-f',
                    'link'  => '#',
                    'target' => true
                ],
                [
                    'icon' => 'fab fa-twitter',
                    'link'  => '#',
                    'target' => true
                ],
                [
                    'icon' => 'fab fa-instagram',
                    'link'  => '#',
                    'target' => true
                ],
                [
                    'icon' => 'fab fa-youtube',
                    'link'  => '#',
                    'target' => true
                ],
            ],
        ),
        'nav_menus' => array(
            'menu-1' => array(
                'name' => __( 'Main Menu', 'business-consulting-dark' ),
                'items' => array(
                    'page_home',
                    'page_about',
                    'page_blog',
                    'page_news'
                ),
            ),
            'footer' => array(
                'name' => __( 'Footer Menu', 'business-consulting-dark' ),
                'items' => array(
                    'page_home',
                    'page_about',
                    'page_blog',
                    'page_news'
                ),
            ),
        ),
    );
    add_theme_support( 'starter-content', $starter_content );
}

add_action( 'wp_enqueue_scripts', 'business_consulting_dark_chld_thm_parent_css' );
function business_consulting_dark_chld_thm_parent_css() {

    $business_consulting_dark_theme = wp_get_theme();
    $theme_version = $business_consulting_dark_theme->get( 'Version' );

    wp_enqueue_style( 
    	'business_consulting_dark_chld_css', 
    	trailingslashit( get_template_directory_uri() ) . 'style.css', 
    	array( 
    		'bootstrap',
    		'font-awesome-5',
    		'bizberg-main',
    		'bizberg-component',
    		'bizberg-style2',
    		'bizberg-responsive' 
    	),
        $theme_version
    );
    
}

/**
* Change the theme background
*/
add_filter( 'bizberg_body_background_image', 'business_consulting_dark_body_background_image' );
function business_consulting_dark_body_background_image(){
    return [
        'background-color'      => '#000',
        'background-image'      => '',
        'background-repeat'     => 'repeat',
        'background-position'   => 'center center',
        'background-size'       => 'cover',
        'background-attachment' => 'scroll',
    ];
}

add_filter( 'bizberg_sidebar_widget_link_separator', 'business_consulting_dark_sidebar_widget_link_separator' );
function business_consulting_dark_sidebar_widget_link_separator(){
    return '#303030';
}

add_filter( 'bizberg_primary_header_layout', 'business_consulting_dark_primary_header_layout' );
function business_consulting_dark_primary_header_layout(){
    return 'center';
}

add_filter( 'bizberg_site_title_font', 'business_consulting_dark_site_title_font' );
function business_consulting_dark_site_title_font(){
    return [
        'font-family'    => 'Dancing Script',
        'variant'        => 'regular',
        'font-size'      => '80px',
        'line-height'    => '1.5',
        'letter-spacing' => '0',
        'text-transform' => 'none',
        'text-align'     => 'center',
    ];
}

add_filter( 'bizberg_site_tagline_font', 'business_consulting_dark_site_tagline_font' );
function business_consulting_dark_site_tagline_font(){
    return [
        'font-family'    => 'Open Sans',
        'variant'        => 'regular',
        'font-size'      => '17px',
        'line-height'    => '1.8',
        'letter-spacing' => '2',
        'text-transform' => 'uppercase',
        'text-align'     => 'center',
    ];
}

add_filter( 'bizberg_sidebar_widget_border_color', 'business_consulting_dark_sidebar_widget_background_color' );
add_filter( 'bizberg_sidebar_widget_select_color', 'business_consulting_dark_sidebar_widget_background_color' );
add_filter( 'bizberg_header_navbar_background_1', 'business_consulting_dark_sidebar_widget_background_color' );
add_filter( 'bizberg_header_navbar_background_2', 'business_consulting_dark_sidebar_widget_background_color' );
add_filter( 'bizberg_header_menu_separator', 'business_consulting_dark_sidebar_widget_background_color' );
function business_consulting_dark_sidebar_widget_background_color(){
    return '#000';
}

add_filter( 'bizberg_primary_header_layout_bottom_border_size', 'business_consulting_dark_primary_header_layout_bottom_border_size' );
function business_consulting_dark_primary_header_layout_bottom_border_size(){
    return '1';
}

add_filter( 'bizberg_primary_header_layout_top_border_color', 'business_consulting_dark_primary_header_layout_top_border_color' );
add_filter( 'bizberg_primary_header_layout_bottom_border_color', 'business_consulting_dark_primary_header_layout_top_border_color' );
function business_consulting_dark_primary_header_layout_top_border_color(){
    return '#2f2f2f';
}

add_filter( 'bizberg_blog_listing_meta_divider_color', 'business_consulting_dark_blog_listing_meta_divider_color' );
add_filter( 'bizberg_blog_detail_meta_divider_color', 'business_consulting_dark_blog_listing_meta_divider_color' );
add_filter( 'bizberg_blog_detail_comment_divider_color', 'business_consulting_dark_blog_listing_meta_divider_color' );
add_filter( 'bizberg_blog_detail_comment_input_border_color', 'business_consulting_dark_blog_listing_meta_divider_color' );
add_filter( 'bizberg_blog_detail_comment_input_background_color', 'business_consulting_dark_blog_listing_meta_divider_color' );
function business_consulting_dark_blog_listing_meta_divider_color(){
    return '#262626';
}

add_filter( 'bizberg_typography_h4', 'business_consulting_dark_typography_h4' );
function business_consulting_dark_typography_h4(){
    return [
        'font-family'    => 'PT Sans',
        'variant'        => '700',
        'font-size'      => '32.81px',
        'line-height'    => '1.1',
        'letter-spacing' => '0',
        'text-transform' => 'inherit'
    ];
}

add_filter( 'bizberg_theme_container_width', 'business_consulting_dark_theme_container_width' );
function business_consulting_dark_theme_container_width(){
    return 1270;
}

add_filter( 'bizberg_typography_body_content', 'business_consulting_dark_typography_body_content' );
function business_consulting_dark_typography_body_content(){
    return [
        'font-family'    => 'Open Sans',
        'variant'        => 'regular',
        'font-size'      => '15px',
        'line-height'    => '1.8'
    ];
}

add_filter( 'bizberg_typography_h2', 'business_consulting_dark_typography_h2' );
function business_consulting_dark_typography_h2(){
    return [
        'font-family'    => 'PT Sans',
        'variant'        => '700',
        'font-size'      => '51.27px',
        'line-height'    => '1',
        'letter-spacing' => '0',
        'text-transform' => 'inherit'
    ];
}

add_filter( 'bizberg_typography_h3', 'business_consulting_dark_bizberg_typography_h3' );
function business_consulting_dark_bizberg_typography_h3(){
    return [
        'font-family'    => 'PT Sans',
        'variant'        => '700',
        'font-size'      => '41.02px',
        'line-height'    => '1',
        'letter-spacing' => '0',
        'text-transform' => 'inherit'
    ];
}

add_filter( 'bizberg_slider_banner_settings', 'business_consulting_dark_slider_banner_settings' );
function business_consulting_dark_slider_banner_settings(){
    return 'none';
}

add_filter( 'bizberg_shape_divider_bottom', 'business_consulting_dark_shape_divider_bottom' );
function business_consulting_dark_shape_divider_bottom(){
    return 'none';
}

add_filter( 'bizberg_slider_title_font_desktop_tablet', 'business_consulting_dark_slider_title_font_desktop_tablet' );
function business_consulting_dark_slider_title_font_desktop_tablet(){
    return [
        'font-family'    => 'PT Sans',
        'variant'        => '700',
        'font-size'      => '45px',
        'line-height'    => '1.2',
        'letter-spacing' => '0',
        'color'          => '#fff',
        'text-transform' => 'none',
    ];
}

add_filter( 'bizberg_slider_read_more_font', 'business_consulting_dark_slider_read_more_font' );
function business_consulting_dark_slider_read_more_font(){
    return [
        'font-family'    => 'Poppins',
        'variant'        => '600',
        'font-size'      => '14px',
        'line-height'    => '1.2',
        'letter-spacing' => '0px',
        'color'          => '#fff',
        'text-transform' => 'capitalize'
    ];
}

add_filter( 'bizberg_arrow_style', 'business_consulting_dark_bizberg_arrow_style' );
function business_consulting_dark_bizberg_arrow_style(){
    return 'diamond';
}

add_filter( 'bizberg_arrow_size', 'business_consulting_dark_arrow_size' );
function business_consulting_dark_arrow_size(){
    return 50;
}

add_filter( 'bizberg_slider_gradient_primary_color', 'business_consulting_dark_slider_gradient_primary_color' );
function business_consulting_dark_slider_gradient_primary_color(){
    return 'rgba(20,0,0,0.30)';
}

add_filter( 'bizberg_slider_gradient_secondary_color', 'business_consulting_dark_slider_gradient_secondary_color' );
function business_consulting_dark_slider_gradient_secondary_color(){
    return 'rgba(221,51,51,0.3)';
}

add_filter( 'bizberg_blog_listing_border', 'business_consulting_dark_blog_listing_border' );
add_filter( 'bizberg_blog_listing_background', 'business_consulting_dark_blog_listing_border' );
add_filter( 'bizberg_blog_listing_box_shadow', 'business_consulting_dark_blog_listing_border' );
add_filter( 'bizberg_blog_detail_content_border_color', 'business_consulting_dark_blog_listing_border' );
add_filter( 'bizberg_blog_detail_content_background', 'business_consulting_dark_blog_listing_border' );
add_filter( 'bizberg_header_menu_child_menu_background', 'business_consulting_dark_blog_listing_border' );
add_filter( 'bizberg_header_menu_child_menu_border', 'business_consulting_dark_blog_listing_border' );
function business_consulting_dark_blog_listing_border(){
    return '#121213';
}

add_filter( 'bizberg_theme_text_color', 'business_consulting_dark_theme_text_color' );
add_filter( 'bizberg_link_color', 'business_consulting_dark_theme_text_color' );
add_filter( 'bizberg_blog_listing_pagination_border', 'business_consulting_dark_theme_text_color' );
add_filter( 'bizberg_blog_listing_pagination_text', 'business_consulting_dark_theme_text_color' );
add_filter( 'bizberg_sidebar_widget_link_color', 'business_consulting_dark_theme_text_color' );
add_filter( 'bizberg_header_site_title_color', 'business_consulting_dark_theme_text_color' );
add_filter( 'bizberg_header_site_title_color_sticky_menu', 'business_consulting_dark_theme_text_color' );
add_filter( 'bizberg_header_site_tagline_color', 'business_consulting_dark_theme_text_color' );
add_filter( 'bizberg_header_site_tagline_color_sticky_menu', 'business_consulting_dark_theme_text_color' );
add_filter( 'bizberg_header_menu_text_color', 'business_consulting_dark_theme_text_color' );
add_filter( 'bizberg_heading_color', 'business_consulting_dark_theme_text_color' );
add_filter( 'bizberg_header_menu_toggle_color_mobile', 'business_consulting_dark_theme_text_color' );
add_filter( 'bizberg_header_menu_child_menu_text_color', 'business_consulting_dark_theme_text_color' );
add_filter( 'bizberg_header_menu_text_color_sticky_menu', 'business_consulting_dark_theme_text_color' );
add_filter( 'bizberg_header_menu_child_menu_text_color_sticky_menu', 'business_consulting_dark_theme_text_color' );
add_filter( 'bizberg_blog_detail_comment_input_text_color', 'business_consulting_dark_theme_text_color' );
function business_consulting_dark_theme_text_color(){
    return '#fff';
}

add_filter( 'bizberg_header_menu_child_menu_border', 'business_consulting_dark_header_menu_child_menu_border' );
function business_consulting_dark_header_menu_child_menu_border(){
    return 'rgba(37,37,38,0.57)';
}

add_filter( 'bizberg_header_menu_color_hover_sticky_menu', 'business_consulting_dark_header_menu_color_hover_sticky_menu' );
function business_consulting_dark_header_menu_color_hover_sticky_menu(){
    return '#c71d1d';
}

add_filter( 'bizberg_header_menu_child_menu_border_sticky_menu', 'business_consulting_dark_header_menu_child_menu_border_sticky_menu' );
function business_consulting_dark_header_menu_child_menu_border_sticky_menu(){
    return '#df4343';
}

add_filter( 'bizberg_header_columns_middle_style', 'business_consulting_dark_header_columns_middle_style' );
function business_consulting_dark_header_columns_middle_style(){
    return 'col-sm-2|col-sm-8|col-sm-2';
}

add_filter( 'bizberg_footer_copyright_background', 'business_consulting_dark_footer_copyright_background' );
function business_consulting_dark_footer_copyright_background(){
    return '#067fbb';
}

add_filter( 'bizberg_banner_spacing', 'business_consulting_banner_spacing' );
function business_consulting_banner_spacing(){
    return [
        'padding-top'    => '165px',
        'padding-bottom' => '165px',
        'padding-left'   => '0px',
        'padding-right'  => '0px',
    ];
}

add_filter( 'bizberg_banner_text_position', 'business_consulting_dark_banner_text_position' );
function business_consulting_dark_banner_text_position(){
    return 'center';
}

add_filter( 'bizberg_typography_h1', 'business_consulting_dark_typography_h1' );
function business_consulting_dark_typography_h1(){
    return [
        'font-family'    => 'PT Sans',
        'variant'        => '700',
        'font-size'      => '64.09px',
        'line-height'    => '1.1',
        'letter-spacing' => '0',
        'text-transform' => 'inherit'
    ];
}

add_filter( 'bizberg_body_typo_heading_3_status', 'business_consulting_dark_body_typo_heading_3_status' );
add_filter( 'bizberg_body_typo_heading_2_status', 'business_consulting_dark_body_typo_heading_3_status' );
add_filter( 'bizberg_body_content_typo_status', 'business_consulting_dark_body_typo_heading_3_status' );
add_filter( 'bizberg_body_typo_heading_4_status', 'business_consulting_dark_body_typo_heading_3_status' );
add_filter( 'bizberg_body_typo_heading_1_status', 'business_consulting_dark_body_typo_heading_3_status' );
add_filter( 'bizberg_sidebar_widget_heading_font_size_status', 'business_consulting_dark_body_typo_heading_3_status' );
add_filter( 'bizberg_dark_mode_status', 'business_consulting_dark_body_typo_heading_3_status' );
add_filter( 'bizberg_woo_product_color_status', 'business_consulting_dark_body_typo_heading_3_status' );
function business_consulting_dark_body_typo_heading_3_status(){
    return true;
}

add_filter( 'bizberg_theme_output_css', 'business_consulting_dark_theme_output_css' );
function business_consulting_dark_theme_output_css( $output ){

    $output[] = array(
        'element'  => '.primary_header_2 a.logo:focus h3,.primary_header_2 a.logo:focus p',
        'property' => 'color'
    );

    $output[] = array(
        'element'  => '.detail-content.single_page a, .bizberg-list .entry-content p a, .comment-list .comment-content a, .widget_text.widget a, #comments ul.comment-item li .comment-header > a:focus',
        'property' => 'color'
    );

    $output[] = array(
        'element'  => '.detail-content.single_page .bizberg_post_date a:after, #comments a:focus code',
        'property' => 'background'
    );

    $output[] = array(
        'element'  => '.wp-block-search .wp-block-search__inside-wrapper,.search-form',
        'property' => 'border-color'
    );

    return $output;

}
 
add_filter( 'bizberg_number_setting_desktop_sidebar_widget_heading_font_sizes', 'business_consulting_dark_number_setting_desktop_sidebar_widget_heading_font_sizes' );
function business_consulting_dark_number_setting_desktop_sidebar_widget_heading_font_sizes(){
    return 32.81;
}
 
add_filter( 'bizberg_number_setting_tablet_sidebar_widget_heading_font_sizes', 'business_consulting_dark_number_setting_tablet_sidebar_widget_heading_font_sizes' );
function business_consulting_dark_number_setting_tablet_sidebar_widget_heading_font_sizes(){
    return 29.69;
}
 
add_filter( 'bizberg_number_setting_mobile_sidebar_widget_heading_font_sizes', 'business_consulting_dark_number_setting_mobile_sidebar_widget_heading_font_sizes' );
function business_consulting_dark_number_setting_mobile_sidebar_widget_heading_font_sizes(){
    return 23.44;
}

add_filter( 'bizberg_theme_color', 'business_consulting_dark_change_theme_color' );
add_filter( 'bizberg_link_color_hover', 'business_consulting_dark_change_theme_color' );
add_filter( 'bizberg_blog_listing_pagination_active_hover_color', 'business_consulting_dark_change_theme_color' );
add_filter( 'bizberg_sidebar_widget_link_color_hover', 'business_consulting_dark_change_theme_color' );
add_filter( 'bizberg_sidebar_widget_title_color', 'business_consulting_dark_change_theme_color' );
add_filter( 'bizberg_header_menu_color_hover', 'business_consulting_dark_change_theme_color' );
add_filter( 'bizberg_slider_title_box_highlight_color', 'business_consulting_dark_change_theme_color' );
add_filter( 'bizberg_slider_arrow_background_color', 'business_consulting_dark_change_theme_color' );
add_filter( 'bizberg_read_more_background_color', 'business_consulting_dark_change_theme_color' );
add_filter( 'bizberg_read_more_background_color_2', 'business_consulting_dark_change_theme_color' );
add_filter( 'bizberg_slider_dot_active_color', 'business_consulting_dark_change_theme_color' );
add_filter( 'bizberg_header_navbar_background_1_sticky_menu', 'business_consulting_dark_change_theme_color' );
add_filter( 'bizberg_header_navbar_background_2_sticky_menu', 'business_consulting_dark_change_theme_color' );
add_filter( 'bizberg_header_menu_separator_sticky_menu', 'business_consulting_dark_change_theme_color' );
add_filter( 'bizberg_header_menu_child_menu_background_sticky_menu', 'business_consulting_dark_change_theme_color' );
add_filter( 'bizberg_footer_social_icon_color', 'business_consulting_dark_change_theme_color' );
add_filter( 'bizberg_shop_sale_tag_color', 'business_consulting_dark_change_theme_color' );
add_filter( 'bizberg_shop_quick_view_background', 'business_consulting_dark_change_theme_color' );
add_filter( 'bizberg_shop_price_color', 'business_consulting_dark_change_theme_color' );
add_filter( 'bizberg_shop_add_to_cart_background', 'business_consulting_dark_change_theme_color' );
add_filter( 'bizberg_background_color_1', 'business_consulting_dark_change_theme_color' );
add_filter( 'bizberg_background_color_2', 'business_consulting_dark_change_theme_color' );
function business_consulting_dark_change_theme_color(){
    return '#0088cc';
}

add_filter( 'bizberg_woocommerce_secondary_color', 'business_consulting_dark_woocommerce_secondary_color' );
function business_consulting_dark_woocommerce_secondary_color(){
    return '#121213';
}

add_filter( 'bizberg_sidebar_spacing_status', 'business_consulting_dark_sidebar_spacing_status' );
function business_consulting_dark_sidebar_spacing_status(){
    return '0px';
}

add_filter( 'bizberg_sidebar_widget_background_color', 'business_consulting_dark_sidebar_widget_background_color1' );
function business_consulting_dark_sidebar_widget_background_color1(){
    return 'rgba(251,251,251,0)';
}

add_filter( 'bizberg_sidebar_widget_border_color', 'business_consulting_dark_sidebar_widget_border_color' );
function business_consulting_dark_sidebar_widget_border_color(){
    return 'rgba(251,251,251,0)';
}

add_filter( 'bizberg_sticky_header_status', 'business_consulting_dark_sticky_header_status' );
function business_consulting_dark_sticky_header_status(){
    return 'false';
}

add_filter( 'bizberg_sticky_content_sidebar' , 'business_consulting_dark_sticky_content_sidebar' );
function business_consulting_dark_sticky_content_sidebar(){
    return false;
}

add_filter( 'bizberg_inline_style', 'business_consulting_dark_inline_style' );
function business_consulting_dark_inline_style( $css ){

    $body_background_image = bizberg_get_theme_mod( 'body_background_image' );
    $color = !empty( $body_background_image['background-color'] ) ? $body_background_image['background-color'] : 'rgba(255,255,255,0)';

    $css .= '.wp-block-search .wp-block-search__input,.widget.widget_search .search-form input.search-field { background-color: ' . esc_attr( $color ) . ' }';
    return $css;

}

add_filter( 'bizberg_sidebar_widget_select_color', 'business_consulting_dark_sidebar_widget_select_color' );
function business_consulting_dark_sidebar_widget_select_color(){
    return '#fff';
}

add_action( 'customize_register', 'business_consulting_dark_customizer_options', 100 );
function business_consulting_dark_customizer_options( $wp_customize ){

    /**
    * Remove sections/panels/control of parent theme
    */
    
    $wp_customize->remove_section("transparent_header");
    $wp_customize->remove_section("progress_bar");

    $wp_customize->remove_control("header_menu_color_hover_sticky_menu");
    $wp_customize->remove_control("header_menu_separator_sticky_menu");
    $wp_customize->remove_control("header_menu_text_color_sticky_menu");
    $wp_customize->remove_control("header_navbar_background_2_sticky_menu");
    $wp_customize->remove_control("header_navbar_background_1_sticky_menu");
    $wp_customize->remove_control("header_site_tagline_color_sticky_menu");
    $wp_customize->remove_control("header_site_title_color_sticky_menu");
    $wp_customize->remove_control("header_sticky_menu_options_heading");
    $wp_customize->remove_control("header_menu_child_menu_background_sticky_menu");
    $wp_customize->remove_control("header_menu_child_menu_border_sticky_menu");
    $wp_customize->remove_control("header_menu_child_menu_text_color_sticky_menu");
    $wp_customize->remove_control("header_button_color_sticky_menu");
    $wp_customize->remove_control("header_button_color_hover_sticky_menu");
    $wp_customize->remove_control("header_button_border_color_sticky_menu");
    $wp_customize->remove_control("header_menu_slide_in_animation");

}

add_filter( 'bizberg_footer_social_links', 'business_consulting_dark_footer_social_links' );
function business_consulting_dark_footer_social_links(){
    return array();
}

add_filter( 'bizberg_top_bar_border_bottom_color', 'business_consulting_dark_top_bar_border_bottom_color' );
function business_consulting_dark_top_bar_border_bottom_color(){
    return '#000';
}

add_filter( 'bizberg_getting_started_screenshot', function(){
    return true;
});