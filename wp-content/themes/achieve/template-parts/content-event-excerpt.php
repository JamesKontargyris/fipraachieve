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

    <div class="event-excerpt">

        <header class="entry-header">

            <div class="event__date"><?php the_date(); ?></div>

            <?php the_title( '<h1 class="event__title">', '</h1>' ); ?>

        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php the_excerpt(); ?>
            <a href="<?php echo get_the_permalink(); ?>" class="button button--dark-blue">Read more</a>
        </div><!-- .entry-content -->

    </div>

</article><!-- #post-## -->
