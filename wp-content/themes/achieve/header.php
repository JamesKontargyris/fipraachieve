<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hivoutcomes
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Roboto:400,400i,700,700i" rel="stylesheet">

    <!--<script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-103403463-1', 'auto');
        ga('send', 'pageview');

    </script>-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'hivoutcomes' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title">
			<?php else : ?>
                <p class="site-title">
			<?php
			endif; ?>

            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/img/achieve_logo.svg" alt="<?php bloginfo( 'name' ); ?>"></a>

            <?php
            if ( is_front_page() && is_home() ) : ?>
            </h1>
                <?php else : ?>
            </p>
                <?php
                endif; ?>
            <div class="site-strap-line">
                <!--<img src="<?php /*echo get_template_directory_uri(); */?>/img/strap_line.svg" alt="<?php /*bloginfo( 'description' ); */?>">-->
                Associations collaborating on Hepatitis to Immunize and Eliminate the Viruses in Europe
            </div>
		</div><!-- .site-branding -->


		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i> Menu</button>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-primary', 'menu_id' => 'primary-menu', 'depth' => '1' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

    <!--Has a banner thumbnail?-->
	<?php if(has_post_thumbnail()) : ?>
        <div class="page-banner">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'page-banner'); ?>" alt="<?php echo get_the_title(); ?>">
        </div>
	<?php endif; ?>

	<div id="content" class="site-content <?php if(is_front_page()) : ?>no-pad<?php endif; ?>">