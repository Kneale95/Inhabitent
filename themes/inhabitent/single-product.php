<?php
/**
 * The template for displaying all single posts.
 *
 * @package RED_Starter_Theme
 */
get_header(); ?>

<section id="primary" class="content-area">

	<main id="main" class="site-main" role="main">

	<?php while ( have_posts() ) : the_post(); ?>
	<section class = "single-products container">

        <div class = "product-thumb">
		    <?php the_post_thumbnail( 'category-thumb'); ?>
		</div>

		<div class = "single-product-text">

			<h2 class ="single-product-title"><?php the_title();?></h2>
			<p class="single-product-price"><?php echo CFS()->get( 'product_price' );?></p>
                <?php the_content(); ?>
                <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
                    'after'  => '</div>',
                    ) );
                    ?>

		<div class = "social-buttons">

		    <a class = "product-button" href ="#"><i class="fa fa-facebook" aria-hidden="true"></i> Like</a>
			<a class = "product-button" href ="#"><i class="fa fa-twitter" aria-hidden="true"></i> Tweet</a>
		    <a class = "product-button" href ="#"><i class="fa fa-pinterest" aria-hidden="true"></i> Pin</a>

		</div>

		</div> <!--single product div end-->

	   </section>

			<?php
			?>
			
		<?php endwhile; // End of the loop. ?>
	</main><!-- #main -->
</section><!-- #primary -->
<?php get_footer(); ?>

