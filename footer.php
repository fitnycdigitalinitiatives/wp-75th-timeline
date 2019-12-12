<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
</main><!-- #content -->
<footer class="py-5 text-white text-center mt-auto">
  <div class="container">
		<div class="row justify-content-center">
    	<div class="col-md-6 col-lg-5 col-xl-4">
				<img class="w-100 mb-5 px-2 px-md-0" src="<?php echo get_template_directory_uri() . '/inc/assets/images/unconventionalthennow.png'; ?>" alt="unconventional then, unconventional now">
				<a class="text-dark d-inline-block mb-4" href="https://www.fitnyc.edu/" id="footer-logo">
          <img src="<?php echo get_template_directory_uri() . '/inc/assets/images/fit-wordmark.png'; ?>" alt="FIT SUNY Logo">
        </a>
				<address class="mb-4">
					227 West 27th Street
					<br>
					New York City 10001-5992
					<br>
					<a class="text-white" href="tel:212-217-7999">(212) 217-7999</a>
				</address>
				<ul class="list-inline" id="social">
		      <li class="list-inline-item">
						<a class="text-white" href="https://www.instagram.com/fitnyc/" aria-label="FIT Instagram">
							<i class="fab fa-instagram fa-2x" aria-hidden="true" title="FIT Instagram"></i>
						</a>
					</li>
					<li class="list-inline-item">
						<a class="text-white" href="https://www.facebook.com/FashionInstituteofTechnology" aria-label="FIT Facebook">
							<i class="fab fa-facebook fa-2x" aria-hidden="true" title="FIT Facebook"></i>
						</a>
					</li>
					<li class="list-inline-item">
						<a class="text-white" href="https://twitter.com/FIT" aria-label="FIT Twitter">
							<i class="fab fa-twitter fa-2x" aria-hidden="true" title="FIT Twitter"></i>
						</a>
					</li>
					<li class="list-inline-item">
						<a class="text-white" href="https://news.fitnyc.edu/events/" aria-label="FIT Calendar of Events">
							<i class="fas fa-calendar fa-2x" aria-hidden="true" title="FIT Calendar of Events"></i>
						</a>
					</li>
		    </ul>
				<p>
					This site is an initiative of FIT Communications and External Relations and the <a class="text-white" href="https://www.fitnyc.edu/library/">FIT Library</a>.
				</p>
				<p class="mb-0" id="copyright">
					&copy;<?php echo date("Y"); ?> Fashion Institute of Technology
				</p>
    	</div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
