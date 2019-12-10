<?php
function my_theme_enqueue_styles() {
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
add_filter( 'rest_authentication_errors', function( $result ) {
    if ( ! empty( $result ) ) {
        return $result;
    }
  
    $whitelist = array('127.0.0.1', "::1");
    if ( ! is_user_logged_in() || (!in_array($_SERVER['REMOTE_ADDR'], $whitelist)) ) {
        return new WP_Error( 'rest_not_logged_in', 'Go Bears! ʕ•ᴥ•ʔ', array( 'status' => 401 ) );
    }
    return $result;
});
?>