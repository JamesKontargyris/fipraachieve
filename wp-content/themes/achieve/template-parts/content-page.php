<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hivoutcomes
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! is_home() && ! is_front_page() ) : ?>
        <header class="entry-header">
            <h1><?php the_title(); ?></h1>
        </header><!-- .entry-header -->
	<?php endif; ?>

    <div class="entry-content">
		<?php
		the_content();

		//			wp_link_pages( array(
		//				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hivoutcomes' ),
		//				'after'  => '</div>',
		//			) );
		?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <!--entry footer content-->
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
