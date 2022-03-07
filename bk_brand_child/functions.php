<?php
function my_theme_enqueue_styles() {
    //wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    //wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', $berkeley_brand['Version'], 'all' ); 
    //wp_enqueue_style( 'entypo', get_template_directory_uri() . '/css/entypo.css', $berkeley_brand['Version'], 'all' );    

    $parent_style = 'berkeley_brand'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );    
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


/*REQUIRE AUTHENTICATION FOR REST API																	*/
/*whitelist localhost																							*/
/*https://developer.wordpress.org/rest-api/using-the-rest-api/frequently-asked-questions/#require-authentication-for-all-requests */
/*add_filter( 'rest_authentication_errors', function( $result ) {
    if ( ! empty( $result ) ) {
        return $result;
    }
  
    $whitelist = array('127.0.0.1', "::1");
    if ( ! is_user_logged_in() || (!in_array($_SERVER['REMOTE_ADDR'], $whitelist)) ) {
        return new WP_Error( 'rest_not_logged_in', 'Go Bears! ʕ•ᴥ•ʔ', array( 'status' => 401 ) );
    }
    return $result;
});
*/
function berkeley_brand_child_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Homepage Widgets 4', 'berkeley_brand' ),
		'description'   => __( 'Second row of widgets displayed on pages created with the Hero template', 'berkeley_brand' ),
		'id'            => 'herowidgets-4',
		'before_widget'  => '<div class="'. bs_count_widgets( 'herowidgets-4' ) .'">',
	    'after_widget'   => '</div>',
//		'before_widget' => '<div class="col-sm-4">',
//		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'berkeley_brand_child_widgets_init' );



function berkeley_brand_child_do_sidebar( $prefix = false ) {
    if ( ! $prefix )
        _doing_it_wrong( __FUNCTION__, __( 'You must specify a prefix when using berkeley_brand_do_sidebar.', 'berkeley_brand' ), '2.0' );


    if ( current_theme_supports( 'theme-layouts' ) && 'layout-1c' !== theme_layouts_get_layout() || 'footer' == $prefix || !current_theme_supports( 'theme-layouts' ) ):

        // Get our grid class
        $sidebar_class = berkeley_brand_sidebar_class( $prefix );

        if ( $sidebar_class ): ?>

                <?php if ( is_active_sidebar( $prefix.'-1' ) ): ?>
            <div class="container">
                <div class="<?php echo $prefix; ?>-sidebar-row row">
                    <aside id="<?php echo $prefix; ?>-sidebar-1" class="sidebar widget col-sm-12">
                        <?php dynamic_sidebar( $prefix.'-1' ); ?>
                    </aside>
                </div><!-- .row -->
            </div><!-- .container -->
                <?php endif;


                if ( is_active_sidebar( $prefix.'-2' ) ): ?>
            <div class="container">
                <div class="<?php echo $prefix; ?>-sidebar-row row">
                    <aside id="<?php echo $prefix; ?>-sidebar-2" class="sidebar widget col-sm-12">
                        <?php dynamic_sidebar( $prefix.'-2' ); ?>
                    </aside>
                </div><!-- .row -->
            </div><!-- .container -->
                <?php endif;


                if ( is_active_sidebar( $prefix.'-3' ) ): ?>
            <div class="container">
                <div class="<?php echo $prefix; ?>-sidebar-row row">
                    <aside id="<?php echo $prefix; ?>-sidebar-3" class="sidebar widget col-sm-12">
                        <?php dynamic_sidebar( $prefix.'-3' ); ?>
                    </aside>
                </div><!-- .row -->
            </div><!-- .container -->
                <?php endif;

                if ( is_active_sidebar( $prefix.'-4' ) ): ?>
            <div class="container">
                <div class="<?php echo $prefix; ?>-sidebar-row row">
                    <aside id="<?php echo $prefix; ?>-sidebar-4" class="sidebar widget col-sm-12">
                        <?php dynamic_sidebar( $prefix.'-4' ); ?>
                    </aside>
                </div><!-- .row -->
            </div><!-- .container -->
                <?php endif;                

        endif; //$sidebar_class

    endif; //current_theme_supports

}
?>