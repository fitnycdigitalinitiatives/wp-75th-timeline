<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<div class="container-fluid">
		<div class="row align-items-center justify-content-center py-5" id="landing">
			<div class="col-sm-8 col-md-6 col-lg-4">
				<img class="img-responsive"src="<?php echo get_template_directory_uri() . '/inc/assets/images/75th-anniversary-logo-master.png'; ?>" alt="FIT 75th Anniversary Logo">
			</div>
		</div>
	</div>


<?php // get all posts
$posts = get_posts(array(
	'posts_per_page'	=> -1,
	'orderby' => 'post_date',
	'order' => 'ASC'
));
$prev_divider = '';
if( $posts ):
?>
<?php	$grouped = array(); ?>
<?php	foreach ( $posts as $post ) : ?>
	<?php
	setup_postdata( $post );
	$decade = substr_replace(get_the_date('Y'),'0s',3);
	$grouped[$decade][]	= $post;
	?>
<?php	endforeach; ?>
<?php	wp_reset_postdata(); ?>
	<nav class="sticky-top" id="decade-navigation">
		<ul class="nav nav-justified">
		<?php	foreach ($grouped as $decade => $grouped_posts) : ?>
			<li class="nav-item">
		    <a class="nav-link scroll-link" href="#decade<?php echo $decade; ?>"><?php	echo $decade; ?></a>
		  </li>
		<?php	endforeach; ?>
		</ul>
	</nav>

	<div id="timeline">
		<?php	foreach ($grouped as $decade => $grouped_posts) : ?>
			<div id="decade<?php echo $decade; ?>" class="decade-box">
				<div class="container-fluid">
					<div class="row decade align-items-center justify-content-center">
						<h1>
							<?php	echo $decade; ?>
						</h1>
					</div>
				</div>
				<div class="container events py-1 py-md-5">
				<?php	foreach ($grouped_posts as $post) : ?>
					<?php
						setup_postdata($post);
						$title = the_title(null, null, false);
					?>
					<div class="row align-items-sm-center justify-content-center justify-content-md-between event my-5 my-md-0 py-md-4">
						<div class="date d-flex align-items-center justify-content-center">
							<h3><?php	echo get_the_date('Y'); ?></h3>
						</div>
						<?php if (has_post_thumbnail()) : ?>
							<div class="col-md-5 image p-md-3 p-xl-4 bg-white">
								<?php the_post_thumbnail( $size = 'large', array( 'class' => 'w-100' ) ); ?>
							</div>
						<?php elseif ((has_post_format( 'video' )) && ($key_1_value = get_post_meta( get_the_ID(), 'video', true ))) : ?>
							<div class="col-md-5 image p-md-3 p-xl-4 bg-white">
								<div class="embed-responsive embed-responsive-16by9">
									<?php echo $key_1_value; ?>
								</div>
							</div>
						<?php elseif (has_shortcode( $post->post_content, 'espro-slider')) : ?>
							<div class="col-md-5 image p-md-3 p-xl-4 bg-white">
								<?php the_content(); ?>
							</div>
						<?php else: ?>
							<div class="col-md-5 image blank m-0 p-0">
							</div>
						<?php endif; ?>
						<div class="col-md-5 text p-md-3 p-xl-4 bg-white">
							<h2 class="title">
								<?php echo $title; ?>
							</h2>
							<?php if (!has_shortcode( $post->post_content, 'espro-slider')) : ?>
								<?php the_content(); ?>
							<?php endif; ?>
						</div>
					</div>
					<?php	wp_reset_postdata(); ?>
				<?php	endforeach; ?>
				</div>
			</div>
		<?php	endforeach; ?>
	</div>

<?php endif; ?>
<?php
get_footer();
