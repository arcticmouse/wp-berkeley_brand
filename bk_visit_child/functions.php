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
?>