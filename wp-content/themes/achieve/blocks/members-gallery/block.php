<?php
$members = get_members();
if ( $members->have_posts() ) : ?>
    <div class="members-gallery">
        <ul class="members-gallery__blocks">
			<?php while ( $members->have_posts() ) : $members->the_post(); ?>
                <li class="members-gallery__member">
                    <div class="members-gallery__member__logo">
						<?php if ( get_field( 'member_url' ) ) : ?>
                        <a href="<?php the_field( 'member_url' ); ?>" target="_blank">
							<?php endif; ?>

							<?php if ( get_field( ( 'member_logo' ) ) ) : ?>
                                <img src="<?php echo wp_get_attachment_image_url( get_field( 'member_logo' ), 'member_logo' ); ?>"
                                     alt="<?php the_title(); ?>">
							<?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/member_logo_placeholder.png"
                                     alt="<?php the_title(); ?>">
							<?php endif; ?>

							<?php if ( get_field( 'member_url' ) ) : ?>
                        </a>
					<?php endif; ?>
                    </div>
                    <div class="member-gallery__member__name">
						<?php if ( get_field( 'member_url' ) ) : ?>
                            <a href="<?php the_field( 'member_url' ); ?>" target="_blank"><?php the_title(); ?></a>
						<?php else : ?>
							<?php the_title(); ?>
						<?php endif; ?>
                    </div>
                </li>
			<?php endwhile;
			wp_reset_postdata(); ?>
        </ul>
    </div>
<?php endif; ?>