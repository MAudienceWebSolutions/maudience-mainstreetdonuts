		<footer class="footer">
			<div class="shell">
				<div class="footer-body">
					<div class="cols">
						<?php  
						$info_content = carbon_get_theme_option('crb_footer_info');
						$open_hours = carbon_get_theme_option('crb_footer_open');
						$contacts = carbon_get_theme_option('crb_footer_contact');
						$order_content = carbon_get_theme_option('crb_footer_order');
						$order_link_text = carbon_get_theme_option('crb_footer_order_link_text');
						$order_link = carbon_get_theme_option('crb_footer_order_link');
						$coords = carbon_get_theme_option('crb_footer_map');
						$coords_split = explode(',', $coords);
						?>

						<?php if ($info_content || $open_hours || $contacts): ?>
							<div class="col col-size1">
								<?php echo wpautop(do_shortcode($info_content)); ?>

								<div class="footer-info">
									<?php if ($open_hours): ?>
										<div class="footer-work">
											<?php echo wpautop(do_shortcode($open_hours)); ?>
										</div><!-- /.footer-work -->
									<?php endif ?>

									<?php if ($contacts): ?>
										<div class="footer-contact">
											<?php echo wpautop(do_shortcode($contacts)); ?>
										</div><!-- /.footer-contact -->
									<?php endif ?>
								</div><!-- /.footer-info -->
							</div><!-- /.col-size1 -->
						<?php endif ?>

						<div class="col col-size2 clearfix">
							<?php if ($order_content || $order_link || $order_link_text): ?>
								<div class="footer-order">
									<?php echo wpautop(do_shortcode($order_content)); ?>
									<?php if ($order_link && $order_link_text): ?>
										<div class="col-actions">
											<a href="<?php echo esc_url($order_link) ?>"><?php echo $order_link_text; ?></a>
										</div><!-- /.col-actions -->
									<?php endif ?>
								</div><!-- /.footer-order -->
							<?php endif ?>

							<?php if ($coords_split): ?>
								<div class="footer-map">
									<div class="google-map" data-lat="<?php echo $coords_split[0]; ?>" data-lng="<?php echo $coords_split[1]; ?>"></div>
								</div><!-- /.footer-map -->
							<?php endif ?>
						</div><!-- /.col-size2 -->
					</div><!-- /.cols -->
				</div><!-- /.footer-body -->

				<div class="footer-foot">
					<div class="footer-socials">
						<span class='st_fblike_hcount' displayText='Facebook Like'></span>
						
						<span class='st_facebook_hcount' displayText='Facebook'></span>
					</div><!-- /.footer-socials -->

					<a href="#">Back to Top</a>
				</div><!-- /.footer-foot -->
			</div><!-- /.shell -->
		</footer><!-- /.footer -->
	</div><!-- /.wrapper -->
	<?php wp_footer(); ?>
</body>
</html>