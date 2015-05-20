<!DOCTYPE html>
<html>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>

<script type="text/javascript">stLight.options({publisher: "4a6bb1ae-a260-4fc6-a558-3574ea4cb615", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

</head>
<body <?php body_class(); ?>>
<div class="wrapper">
	<header class="header">
		<div class="shell">
			<div class="header-inner clearfix">
				<a href="<?php echo home_url('/'); ?>" class="logo" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
				
				<?php 
					wp_nav_menu(array(
						'theme_location'  => 'main-menu',
						'container'       => 'nav',
						'container_class' => 'nav',
						'fallback_cb'     => 'false',
						'items_wrap'      => '<a href="#" class="menu-btn">Services</a><ul class="clearfix">%3$s</ul>',
					));  
				?>
			</div><!-- /.header-inner -->
		</div><!-- /.shell -->
	</header><!-- /.header -->