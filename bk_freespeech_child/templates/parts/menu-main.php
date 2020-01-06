<?php
/**
 * The template used to load the Main Menu in header*.php
 *
 * @since 2.0
 * @package Berkeley Brand
 *
 */
?>
<!-- Main menu -->
<div class="<?php echo apply_filters( 'berkeley_brand_main_navbar_class' , 'navbar navbar-default navbar-static-top yamm' ); ?>" role="navigation">
				<div class="container">
					<?php get_template_part( '/templates/parts/header', 'wordmark' ); ?>

			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex2-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<div class="collapse navbar-collapse navbar-ex2-collapse" id="main-nav">
			<div id="tools-nav">
				<div class="container">

					<?php
                    if ( of_get_option( 'berkeley_brand_search_bar', '1' ) ) {
                        get_search_form();
                    }
                    ?>

				</div>
	      	</div>
			<nav id="primary-nav">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'main',
				'depth'          => 2,
				'container'      => false,
				'menu_class'     => 'nav navbar-nav',
				'walker'         => new wp_bootstrap_navwalker(),
				'fallback_cb'    => 'wp_bootstrap_navwalker::fallback'
				)
			);
			?>
			</nav><!-- #site-navigation -->
		</div>
	</div>
</div>
<!-- End Main menu -->
