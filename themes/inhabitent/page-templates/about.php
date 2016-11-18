<?php /* Template Name: About */ ?>

<?php
/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */
get_header(); ?>


			<section class="about-hero">
				<h1><?php single_post_title(); ?></h1>
			</section>

            <div class="about container">
                <div class="our-story">
                    <?php echo CFS()->get( 'our_story' ); ?>
                </div>

                <div class="our_team">
                    <?php echo CFS()->get( 'our_team' ); ?>
                </div>
            </div>

            
                
		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>