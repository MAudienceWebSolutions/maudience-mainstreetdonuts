<?php get_header(); ?>
	<main class="main">
		<div class="shell">
			<div class="main-body clearfix">
				<div class="content">
				<?php 
				crb_the_title('<h3 class="pagetitle">', '</h3>');

				if ( is_single() ) {
					get_template_part( 'loop', 'single' );
				} else {
					get_template_part( 'loop' ); 
				}
				?>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div><!-- /.shell -->
	</main><!-- /.main -->
<?php get_footer(); ?>