<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		
		<div <?php post_class() ?>>
			<h2><?php the_title(); ?></h2>

			<?php get_template_part('fragments/post-meta'); ?>

			<div class="entry">
				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'crb') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div><!-- /div.entry -->
		</div> <!-- /div.post -->
		
		<?php comments_template(); ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_post_link(__('&laquo; %link', 'crb')); ?></div>
			<div class="alignright"><?php next_post_link(__('%link &raquo;', 'crb')); ?></div>
		</div>

	<?php endwhile; ?>
<?php endif; ?>