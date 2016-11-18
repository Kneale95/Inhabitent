<?php
/**
 * The template for displaying archive pages.
 *
 * @package RED_Starter_Theme
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
	<div class='container'>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1>Shop Stuff</h1>
			
                <div class="shop-stuff-catagories">
                    <?php    
                        $terms = get_terms( array(
                                            'taxonomy' => 'product_type',
                                            'orderby' => 'name',
                                        ));
                        foreach ($terms as $term) :
                            $url = get_term_link ($term->slug , 'product_type');              
                    	?>                       
                        <a href='<?php echo $url?>' class='stuff_titles'><?php echo $term->name; ?></a>
                    <?php
                        endforeach;
                    ?>
                </div> <!-- shop stuff -->
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<div class="grid">
				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="items">
							<header class="header">

								<?php if ( has_post_thumbnail() ) : ?>
									<?php if ( is_archive('product') ) : ?>
									<div class="thumbnail">
										<a href="<?php esc_url(the_permalink()); ?>">
										<?php the_post_thumbnail( 'large' ); ?>
										</a>
									</div>
									<?php endif; ?>
								<?php endif; ?>
								
								<div class="product-price-summary">
									<span><?php the_title(); ?></span>
									<span><?php echo CFS()->get( 'product_price' ); ?></span>
								</div>

								<?php if ( 'post' === get_post_type() ) : ?>
								<div class="entry-meta">
									<?php red_starter_posted_on(); ?> / <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?> / <?php red_starter_posted_by(); ?>
								</div><!-- .entry-meta -->
								<?php endif; ?>
							</header><!-- .entry-header -->
						</div>
					</article><!-- #post-## -->

				<?php endwhile; ?>

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php get_footer(); ?>