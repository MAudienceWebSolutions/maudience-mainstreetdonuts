<?php 
/*
Template Name: Gallery
*/
get_header(); ?>
<main class="main">
	<div class="shell">
		<section class="section section-product">
			<?php 
			$gallery_title = carbon_get_the_post_meta('crb_gallery_title');
			if ($gallery_title): ?>
				<h3><?php echo $gallery_title; ?></h3>
			<?php endif ?>
			<?php 
			$products = carbon_get_the_post_meta('crb_products','complex');
			if ($products): ?>
				<ul class="products clearfix">
				<?php foreach ($products as $product): ?>
					<li class="product">
						<?php if ($product['image']): ?>
							<div class="product-image">
								<a href="<?php echo wp_get_attachment_url($product['image']); ?>" title="<?php echo $product['title'] ?>" class="cboxElement">
									<?php echo wp_get_attachment_image($product['image'], 'gallery-item'); ?>
								</a>
							</div><!-- /.product-image -->
						<?php endif ?>
						
						<div class="product-content">
							<?php if ($product['title']): ?>
								<h6><?php echo $product['title']; ?></h6>
							<?php endif ?>
							<?php if ($product['description']): ?>
								<?php echo wpautop(do_shortcode($product['description'])); ?>							
							<?php endif ?>
							
							<?php if ($product['price'] || $product['dozen']): ?>
								<div class="section-price">
									<?php if ($product['price']): ?>
										<span>Price: <?php echo $product['price'] ?></span>
									<?php endif ?>
									
									<?php if ($product['dozen']): ?>
										<span>Dozen: <?php echo $product['dozen'] ?></span>
									<?php endif ?>
								</div><!-- /.section-price -->
							<?php endif ?>
						</div><!-- /.product-content -->
					</li><!-- /.product -->
				<?php endforeach ?>
				</ul><!-- /.products -->
			<?php endif ?>
		</section><!-- /.section section-product -->
	</div><!-- /.shell -->
</main><!-- /.main -->
<?php get_footer(); ?>