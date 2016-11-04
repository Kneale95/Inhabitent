<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package RED_Starter_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function red_starter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'red_starter_body_classes' );

function change_my_wp_login_image() {
echo "
<style>
body.login #login h1 a {
background: url('".get_bloginfo('template_url')."/custom/images/new-login-logo.png') 8px 0 no-repeat transparent;
height:100px;
width:320px; }
</style>
";
}
add_action("login_head", "change_my_wp_login_image");