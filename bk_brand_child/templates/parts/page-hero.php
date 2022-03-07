<?php
/**
 * Template Name: Hero
 * The template for displaying full-width Hero pages.
 *
 * @since 2.0
 * @package Berkeley Brand Brand theme
 *
 */

get_header('hero'); ?>
	<div class="container">
		<?php
		while ( have_posts() ) : the_post();

			do_action( 'berkeley_brand_loop_before' );

			get_template_part( '/templates/parts/content', 'hero-components' );

			do_action( 'berkeley_brand_loop_after' );

		endwhile; ?>
	</div><!-- /container -->
	</div><!-- #content -->

<div id="hero-widgets-container" class="widget widget-area container" role="complementary">
	<?php
	do_action( 'before_sidebar' );
	if ( is_front_page()) berkeley_brand_child_do_sidebar( 'herowidgets' ); 
	?>
</div>

<?php get_sidebar(); ?>
<?php  get_footer(); ?>
