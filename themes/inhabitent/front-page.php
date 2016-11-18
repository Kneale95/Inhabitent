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
	<div class ="front-posts">

<?php
			$args = array(
				'post_type' =>'post',
				'order' => 'DSC',
				'posts_per_page' => 3,);
				$product_posts = get_posts( $args ); // returns an array of posts ?>
				<?php foreach ( $product_posts as $post ) : setup_postdata( $post ); ?>
					<div class="journal-entries">
						<?php the_post_thumbnail(); ?>
						<?php the_date(); ?>
						<?php comments_number(); ?>
						<?php the_title(); ?>
					</div>

				<?php endforeach; wp_reset_postdata(); ?>
				
	</div>
	
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
