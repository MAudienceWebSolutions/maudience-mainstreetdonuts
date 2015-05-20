<?php get_header(); ?>
	<main class="main">
		<div class="shell">
			<div class="main-body clearfix">
				<div class="content">
					<?php crb_the_title('<h2 class="pagetitle">', '</h2>'); ?>
					<?php printf(__('<p>Please check the URL for proper spelling and capitalization.<br />If you\'re having trouble locating a destination, try visiting the <a href="%1$s">home page</a>.</p>', 'crb'), home_url('/')); ?>
				</div><!-- /.content -->

				<?php get_sidebar(); ?>
			</div><!-- /.main-body -->
		</div><!-- /.shell -->
	</main><!-- /.main -->

		
<?php get_footer(); ?>