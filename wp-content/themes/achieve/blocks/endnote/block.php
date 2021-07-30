<div class="endnote" <?php if(block_value('link-id')) : ?>id="<?php block_field('link-id'); ?>"<?php endif; ?>>
	<?php if(block_value('reference')) : ?><span class="endnote__reference"><?php block_field('reference'); ?></span> <?php endif; ?><?php block_field('endnote'); ?>
</div>