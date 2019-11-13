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
	<footer class="mt-auto py-5 text-white text-center text-md-left">
	  <div class="container">
	    <div class="row align-items-center justify-content-between">
	    	<div class="col-md-7 mb-3 mb-md-0">
					<a class="text-dark d-inline-block mb-3" href="https://www.fitnyc.edu/" id="footer-logo">
	          <img src="<?php echo get_template_directory_uri() . '/inc/assets/images/fit-wordmark.png'; ?>" alt="FIT SUNY Logo">
	        </a>
					<address>
						227 West 27th Street
						<br>
						New York City 10001-5992
						<br>
						<a class="text-white" href="tel:212-217-7999">(212) 217-7999</a>
					</address>
					<p class="mb-0" id="copyright">
						&copy;<?php echo date("Y"); ?> Fashion Institute of Technology
					</p>
	    	</div>
				<div class="col-md-5 col-lg-4">
					<ul class="list-inline" id="social">
			      <li class="list-inline-item">
							<a class="text-white" href="https://www.instagram.com/fitnyc/" aria-label="FIT Instagram">
								<i class="fab fa-instagram fa-lg" aria-hidden="" title="FIT Instagram"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a class="text-white" href="https://www.facebook.com/FashionInstituteofTechnology" aria-label="FIT Facebook">
								<i class="fab fa-facebook fa-lg" aria-hidden="" title="FIT Facebook"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a class="text-white" href="https://twitter.com/FIT" aria-label="FIT Twitter">
								<i class="fab fa-twitter fa-lg" aria-hidden="" title="FIT Twitter"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a class="text-white" href="https://news.fitnyc.edu/events/" aria-label="FIT Calendar of Events">
								<i class="fas fa-calendar fa-lg" aria-hidden="" title="FIT Calendar of Events"></i>
							</a>
						</li>
			    </ul>
					<p class="mb-1 font-weight-bold">
						75th Anniversary Timeline
					</p>
					<p class="mb-0">
						This site is an initiative of FIT Communications and External Relations and the <a class="text-white" href="https://www.fitnyc.edu/library/">FIT Library</a>.
					</p>
	    	</div>
	    </div>
	  </div>
	</footer>
	</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
