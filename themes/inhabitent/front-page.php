<?php
/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		
			
<section class="hero">
	<div class="hero-logo">
	</div>
</section>
<section class ="front-shop container">
		<h2>Shop stuff</h2>
		<div class = "shop-stuff">
		<?php    
			$terms = get_terms('product_type');   
			foreach ($terms as $term) {
				echo "<div class = 'shop-offers'>";
			$url = get_term_link ($term->slug , 'product_type'); ?>
			<img src="<?php echo get_template_directory_uri();?>/media/images/product-type-icons/<?php echo $term->slug; ?>.svg">
			<?php
			echo "<p> $term->description </p> ";
			echo "<a href= '$url' class='button'> $term->name </a> </div>";
		}
		?>
		</div> <!-- shop stuff -->
</section>

<section class="front-journal container"> 
	 <h2>Inhabitent Journal</h2>
	<div class ="container">

	<ul class="front-posts">
		<?php
		$args = array(  'numberposts'       => 3,
						'orderby'           => 'post_date',
						'order'             => 'DESC',
						'post_type'         => 'post',
					);
		$journal_post = get_posts( $args ); // returns an array of posts                
	?>
	<?php foreach ( $journal_post as $post ) : setup_postdata( $post ); ?>
		<li>
			<div class="front-thumbnail">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'medium-large' ); ?>
			<?php endif; ?>
			</div>

			<div class="journal-entries">
				<p class="entry-meta"><?php echo get_the_date(); ?> / <?php comments_number(); ?></p>

				<p class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
				<p><a class="read-more" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read Entry</a></p>
			</div>
		</li>
	<?php endforeach; wp_reset_postdata(); ?>
	</ul>

</section>
<section class="latest-adventures container">
	<h2>Latest Adventures</h2>
	
	<div class="adventures group">

		<div class="canoe-girl">
			<h3>Getting Back to Nature in a Canoe</h3>
			<a href="#" class="button">Read More</a>
		</div>

		<div class="beach-bonfire">
			<h3>A Night with Friends at the Beach</h3>
			<a href="#" class="button">Read More</a>
		</div>

		<div class="night-sky">
			<h3>Star-Gazing at the Night Sky</h3>
			<a href="#" class="button">Read More</a>
		</div>

		<div class="mountain-hikers">
			<h3>Taking in the View at Big Mountain</h3>
			<a href="#" class="button">Read More</a>
		</div>
		
	</div>

	
</section>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
