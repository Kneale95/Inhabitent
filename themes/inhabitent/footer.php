<?php
/**
 * The template for displaying the footer.
 *
 * @package RED_Starter_Theme
 */

?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="site-info">
					<div class="footer">
						<!--<a href="<?php echo esc_url( 'https://wordpress.org/' ); ?>"><?php printf( esc_html( 'Proudly powered by %s' ), 'WordPress' ); ?></a>-->
						<div class = "contact-info footer-info">
							<h3>CONTACT INFO</h3>
							<p><i class="fa fa-envelope" aria-hidden="true"></i><a href="#">info@inhabitent.com</a></p>
							<p><i class="fa fa-phone" aria-hidden="true"></i><a href="#">778-456-7891</a></p>
							<div class="footer-icons">
								<i class="fa fa-facebook-square" aria-hidden="true"></i>
								<i class="fa fa-twitter-square" aria-hidden="true"></i>
								<i class="fa fa-google-plus-square" aria-hidden="true"></i>
							</div>
						</div>
						<div class="hours footer-info">
							<h3>BUSINESS HOURS</h3>
							<p><span>Monday-Friday:</span> 9am-5pm</p>
							<p><span>Saturday:</span> 10am-2pm</p>
							<p><span>Sunday:</span> Closed</p>
						</div>
						<a href="#" class= "footer-image footer-info"></a>
					</div>
					<p class="copyright-footer">COPYRIGHT <i class="fa fa-copyright" aria-hidden="true"></i> 2016 INHABITENT</p>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- #page -->

		<?php wp_footer(); ?>

	</body>
</html>
