<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package hivoutcomes
 */

get_header(); ?>

	<div id="primary" class="content-area single">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

		if(get_post_type() == 'event') {

			get_template_part( 'template-parts/content', 'event' );

		} else {

			get_template_part( 'template-parts/content', get_post_format() );

		}


//			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
//			if ( comments_open() || get_comments_number() ) :
//				comments_template();
//			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
