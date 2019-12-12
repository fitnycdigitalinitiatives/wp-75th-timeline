<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<div class="container my-5 error-404 not-found">
		<div class="row justify-content-center">
			<div class="col-md-8 col-lg-6">
				<h1 class="mb-4 text-center display-4">
					Sorry!
				</h1>
				<p>It appears you have reached this page in error. We're not exactly sure how this happened, but let's get you back to our wonderful <a href="<?php echo home_url(); ?>">timeline</a> as soon as possible.</p>
			</div>
		</div><!-- .row -->
	</div><!-- .container -->

<?php
get_footer();
