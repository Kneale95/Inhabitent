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

// function change_my_wp_login_image() {
// echo "
// <style>
// body.login #login h1 a {
// background: url('"get_template_directory_uri('tem')."/custom/images/new-login-logo.png') 8px 0 no-repeat transparent;
// background: url('".get_bloginfo('template_url')."/custom/images/new-login-logo.png') 8px 0 no-repeat transparent;
// height:100px;
// width:320px; }
// </style>
// ";
// }
// add_action("login_head", "change_my_wp_login_image");

/**
* Custom About Page background image
*/
function my_styles_method() {

                if(!is_page_template( 'page-templates/about.php' )){
                    return;
                }

       $url = CFS()->get( 'about_background_image' );//This is grabbing the background image vis Custom Field Suite Plugin
       $custom_css = "
               .about-hero{

					background: linear-gradient( to bottom, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.4) 100% ),
					 url({$url}) no-repeat center bottom;
					   background-size: cover, cover;
					   height: 100vh;
					   
               }";
       wp_add_inline_style( 'red-starter-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'my_styles_method' );

function product_posts_per_page ( $query ) {
  if ( is_post_type_archive('product') && !is_admin() && $query->is_main_query() ) {
    $query->set('posts_per_page', '16' );
    $query->set('orderby', 'title' );
    $query->set('order', 'ASC' );
  }
}
add_action ( 'pre_get_posts', 'product_posts_per_page');

/**
 * Customize excerpt length and style.
 *
 * @param  string The raw post content.
 * @return string
 */
function red_wp_trim_excerpt( $text ) {
	$raw_excerpt = $text;
	
	if ( '' == $text ) {
		// retrieve the post content
		$text = get_the_content('');
		
		// delete all shortcode tags from the content
		$text = strip_shortcodes( $text );
		
		$text = apply_filters( 'the_content', $text );
		$text = str_replace( ']]>', ']]&gt;', $text );
		
		// indicate allowable tags
		$allowed_tags = '<p>,<a>,<em>,<strong>,<blockquote>,<cite>';
		$text = strip_tags( $text, $allowed_tags );
		
		// change to desired word count
		$excerpt_word_count = 50;
		$excerpt_length = apply_filters( 'excerpt_length', $excerpt_word_count );
		
		// create a custom "more" link
		$excerpt_end = '<span>[...]</span><p><a href="' . get_permalink() . '" class="read-more">Read more &rarr;</a></p>'; // modify excerpt ending
		$excerpt_more = apply_filters( 'excerpt_more', ' ' . $excerpt_end );
		
		// add the elipsis and link to the end if the word count is longer than the excerpt
		$words = preg_split( "/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY );
		
		if ( count( $words ) > $excerpt_length ) {
			array_pop( $words );
			$text = implode( ' ', $words );
			$text = $text . $excerpt_more;
		} else {
			$text = implode( ' ', $words );
		}
	}
	
	return apply_filters( 'wp_trim_excerpt', $text, $raw_excerpt );
}

remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
add_filter( 'get_the_excerpt', 'red_wp_trim_excerpt' );

function enqueue_our_required_stylesheets(){
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'); 
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script ( 'search-bar', get_template_directory_uri() . '/js/scripts.js', array ( 'jquery' ), false, true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action('wp_enqueue_scripts','enqueue_our_required_stylesheets');

function title_filter( $title ) {
   if ( is_category() ) {
       $title = single_cat_title( '', false );
   } elseif ( is_tag() ) {
       $title = single_tag_title( '', false );
   } elseif ( is_author() ) {
       $title = '<span class="vcard">' . get_the_author() . '</span>';
   } elseif ( is_post_type_archive() ) {
       $title = post_type_archive_title( '', false );
   } elseif ( is_tax() ) {
       $title = single_term_title( '', false );
   }
 
   return $title;
}

add_filter( 'get_the_archive_title', 'title_filter' );


function custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url(file:///C:/MAMP/htdocs/tent/wp-content/themes/inhabitent/media/images/logos/inhabitent-logo-text-dark.svg) !important; }
    </style>';
}

add_action('login_head', 'custom_login_logo');