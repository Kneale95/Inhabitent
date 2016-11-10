/**
* Custom About Page background image
*/
function my_styles_method() {

                if(!is_page_template( 'page-about.php' )){
                    return;
                }

       $url = CFS()->get( 'about_background_image' );//This is grabbing the background image vis Custom Field Suite Plugin
       $custom_css = "
               .about-hero{
                       background-image: url({$url});
               }";
       wp_add_inline_style( 'red-starter-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'my_styles_method' );