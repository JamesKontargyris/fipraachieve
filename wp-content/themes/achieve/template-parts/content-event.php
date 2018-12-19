<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hivoutcomes
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="event">

        <header class="entry-header event__header">

            <div class="event__date"><?php the_date(); ?></div>

            <?php the_title( '<h1 class="event__title">', '</h1>' ); ?>

        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php the_content(); ?>
        </div><!-- .entry-content -->

    </div>

</article><!-- #post-## -->
