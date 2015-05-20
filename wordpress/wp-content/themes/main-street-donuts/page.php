<?php get_header(); ?>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<main class="main">
			<div class="shell">
				<div class="main-body clearfix">
					<div class="content">
						<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</div><!-- /.content -->

					<?php get_sidebar(); ?>
				</div><!-- /.main-body -->
			</div><!-- /.shell -->
		</main><!-- /.main -->
		<?php endwhile; ?>
	<?php endif; ?>
	
<?php get_footer(); ?>