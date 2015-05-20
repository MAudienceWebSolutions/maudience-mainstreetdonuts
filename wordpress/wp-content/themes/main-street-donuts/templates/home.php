<?php 
/*
Template Name: Home
*/
get_header(); ?>

<?php if (have_posts()): ?>
	<?php while (have_posts()): the_post(); ?>
	<section class="section section-offer">
		<div class="shell">
			<div class="section-body clearfix">
				<div class="section-content">
					<h5><?php the_title(); ?></h5>

	        		<?php the_content(); ?>

				</div><!-- /.section-content -->
				<?php if (has_post_thumbnail()): ?>
					<div class="section-image">
						<?php the_post_thumbnail('home-featured') ?>
					</div><!-- /.section-image -->
				<?php endif ?>
			</div><!-- /.section-body -->
		</div><!-- /.shell -->
	</section><!-- /.section section-offer -->
	<?php 
		$middle_content = carbon_get_the_post_meta('crb_middle_home_content');
		$middle_image = carbon_get_the_post_meta('crb_middle_home_image');
	?>
	<?php if ($middle_image || $middle_content): ?>
		<section class="section section-about">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/content-bg.png" alt="" />

			<div class="shell">
				<div class="section-body clearfix">
					<div class="section-content">
						<?php if ($middle_content): ?>
							<?php echo wpautop(do_shortcode($middle_content)); ?>						
						<?php endif ?>
					</div><!-- /.section-content -->
					
					<?php if ($middle_image): ?>
						<div class="section-image">
							<span class="image-head"></span>

							<?php echo wp_get_attachment_image($middle_image, 'home-middle') ?>

							<span class="image-foot"></span>
						</div><!-- /.section-image -->
					<?php endif ?>
				</div><!-- /.section-body -->
			</div><!-- /.shell -->
		</section><!-- /.section section-about -->
	<?php endif ?>
	<?php endwhile ?>	
<?php endif ?>

<?php get_footer(); ?>