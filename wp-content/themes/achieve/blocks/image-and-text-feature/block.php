<div class="feature-block feature-block--<?php block_field('layout') ?>">
	<?php if ( block_value( 'image' ) ) : ?>
        <div class="feature-block__image">
            <img src="<?php block_field( 'image' ); ?>" alt="">
        </div>
	<?php endif; ?>
    <div class="feature-block__text">
		<?php if ( block_value( 'title' ) ) : ?>
            <div class="feature-block__text__title"><?php block_field('title'); ?></div>
		<?php endif; ?>
        <?php if ( block_value( 'description' ) ) : ?>
            <div class="feature-block__text__description"><?php block_field('description'); ?></div>
		<?php endif; ?>
        <?php if ( block_rows( 'links' ) ) : ?>
            <div class="feature-block__text__links">
                <?php while(block_rows('links')) : block_row('links'); ?>
                    <a href="<?php block_sub_field('url'); ?>" class="button--dark-blue"><?php block_sub_field('button-text'); ?></a>
                <?php endwhile; reset_block_rows('links'); ?>
            </div>
		<?php endif; ?>
    </div>
</div>