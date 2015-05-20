<?php

/**
 * Returns current year
 *
 * @uses [year]
 */
add_shortcode('year', 'crb_shortcode_year');
function crb_shortcode_year() {
	return date('Y');
}

add_shortcode('link', 'crb_shortcode_related_link');
function crb_shortcode_related_link($atts, $content) {
	$a = shortcode_atts(
		array(
			'url' => '#',
			'text' => 'Learn More',
		),
		$atts);
	return '<div class="section-actions"><a href="' . $a['url'] . '">' . $a['text'] . '<span> &gt;</span></a></div>';
}
