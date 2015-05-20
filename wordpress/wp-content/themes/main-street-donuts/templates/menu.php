<?php 
/*
Template Name: Menu
*/
get_header(); ?>

<?php if (have_posts()): ?>
	<?php while (have_posts()): the_post(); ?>
		
	<main class="main">
		<div class="shell">
			<section class="section section-menu">
				<h3><?php the_title(); ?></h3>
				<?php 
				$menus = carbon_get_the_post_meta('crb_menu_types','complex');
				$splitted_menus = array_chunk($menus, 2, true);
				?>
				<?php if ($menus): ?>
				<div class="cols">
					<?php foreach ($splitted_menus as $n => $menu_part): ?>
						<div class="col col-1of2">
							<?php foreach ($menu_part as $menu): ?>
								<div class="section-donuts">
									<h2><?php echo $menu['title'] ?></h2>
									<?php $menu_class = $menu['crb_menu_class']; ?>
									<ul>
										<?php foreach ($menu_class as $class): ?>
											<li>
												<h6><?php echo $class['title'] ?></h6>

												<?php echo wpautop(do_shortcode($class['description'])); ?>
												
												<?php if ($class['price'] || $class['dozen_price']): ?>
													<div class="section-price">
														<?php if ($class['price']): ?>
															<span>Single <?php echo $class['price']; ?></span>
														<?php endif ?>

														<?php if ($class['dozen_price']): ?>
															<span>Dozen <?php echo $class['dozen_price']; ?></span>
														<?php endif ?>	
													</div><!-- /.section-price -->
												<?php endif ?>	
											</li>
										<?php endforeach ?>
									</ul>
								</div><!-- /.section-donuts -->	
							<?php endforeach ?>
						</div><!-- /.col col-1of2 -->
					<?php endforeach ?>
				</div><!-- /.cols -->
				<?php endif ?>
			</section><!-- /.section section-menu -->
		</div><!-- /.shell -->
	</main><!-- /.main -->
	<?php endwhile ?>	
<?php endif ?>

<?php get_footer(); ?>