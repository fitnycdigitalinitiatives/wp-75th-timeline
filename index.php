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

	<div class="pre-loader" role="alert" aria-live="polite">
		<div class="loading-spinner spinner-1"></div>
		<div class="loading-spinner spinner-2"></div>
		<div class="loading-spinner spinner-3"></div>
		<div class="loading-spinner spinner-4"></div>
		<span class="sr-only">Page is Loading...</span>
	</div>

	<div class="container-fluid">
		<div class="row align-items-center justify-content-center py-2 py-sm-3" id="landing">
			<div class="col-sm-10 d-none d-sm-block">
				<img class="img-responsive"src="<?php echo get_template_directory_uri() . '/inc/assets/images/75th-minds-2.png'; ?>" alt="FIT 75th Anniversary Celebrating unconventional minds">
			</div>
			<div class="col-9 d-sm-none">
				<img class="img-responsive"src="<?php echo get_template_directory_uri() . '/inc/assets/images/75th-SUNY.png'; ?>" alt="FIT 75th Anniversary">
				<img class="img-responsive mt-4"src="<?php echo get_template_directory_uri() . '/inc/assets/images/celebrating.png'; ?>" alt="Celebrating unconventional minds">
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
	$decade = substr_replace(get_the_date('Y', $post),'0s',3);
	$grouped[$decade][]	= $post;
	?>
<?php	endforeach; ?>
	<nav class="sticky-top" id="decade-navigation" role="navigation" aria-label="Decade Navigation">
		<ul class="nav nav-fill">
		<?php	foreach ($grouped as $decade => $grouped_posts) : ?>
			<li class="nav-item">
		    <a class="nav-link scroll-link" href="#decade<?php echo $decade; ?>"><?php	echo $decade; ?></a>
		  </li>
		<?php	endforeach; ?>
			<li class="nav-item">
				<a class="nav-link scroll-link top" href="#top" aria-label="Back to top"><i class="fas fa-angle-double-up" aria-hidden="true" title="Back to top"></i></a>
			</li>
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
				<?php	foreach ($grouped_posts as $single_post) : ?>
					<?php
						$title = get_the_title($single_post);
						$content = get_the_content( null, false, $single_post );
						$content = apply_filters( 'the_content', $content );
						$content = str_replace( ']]>', ']]&gt;', $content );
					?>
					<div class="row align-items-sm-center justify-content-center justify-content-md-between event my-5 my-md-0 py-md-4">
						<div class="col-md-5 text p-md-3 p-xl-4 bg-white">
							<h2 class="title">
								<?php echo $title; ?>
							</h2>
							<?php if (!(has_shortcode( $single_post->post_content, 'espro-slider') || has_block( 'gallery', $single_post ))) : ?>
								<?php echo $content; ?>
							<?php endif; ?>
						</div>
						<div class="date d-flex align-items-center justify-content-center">
							<h3><?php	echo get_the_date('Y', $single_post); ?></h3>
						</div>
						<?php if (has_post_thumbnail($single_post)) : ?>
							<?php if (get_theme_mod('timeline_customizer_images','No') == 'Yes'): ?>
								<div class="col-md-5 image p-md-3 p-xl-4 bg-white">
									<?php $hash = hash("md4", $title); ?>
									<button type="button" class="modal-button w-100" data-toggle="modal" data-target="#post_<?php echo $hash; ?>">
										<?php
											$medium_large = get_the_post_thumbnail_url($single_post, 'medium_large');
											$thumbnail_id = get_post_thumbnail_id($single_post);
											$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
										; ?>
										<img src="<?php echo $medium_large; ?>" alt="<?php echo $alt; ?>" class="w-100">
										<span class="sr-only">Enlarge image</span>
									</button>
									<div class="modal fade" id="post_<?php echo $hash; ?>" data-fullsize="<?php echo get_the_post_thumbnail_url($single_post, 'full'); ?>" tabindex="-1" role="dialog" aria-label="Label_<?php echo $title; ?>" aria-hidden="true" data-backdrop="true">
									  <div class="modal-dialog modal-xl modal-dialog-centered">
									    <div class="modal-content">
												<div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">
									        <img alt="<?php echo $title; ?>">
									      </div>
									    </div>
									  </div>
									</div>
								</div>
							<?php else: ?>
								<div class="col-md-5 image p-md-3 p-xl-4 bg-white">
									<?php echo get_the_post_thumbnail( $single_post, $size = 'large', array( 'class' => 'w-100', 'data-fullsize' => get_the_post_thumbnail_url($single_post, 'full') ) ); ?>
								</div>
							<?php endif; ?>
						<?php elseif ((has_post_format( 'video', $single_post )) && ($youtube_id = get_post_meta( $single_post->ID, 'youtube-id', true ))) : ?>
							<div class="col-md-5 image p-md-3 p-xl-4 bg-white">
								<div class="embed-responsive embed-responsive-16by9 youtube" data-youtube-id="<?php echo $youtube_id; ?>">
									<button class="play-button" aria-label="Load YouTube Video">
										<i class="fas fa-play" aria-hidden="true" title="Load YouTube Video"></i>
									</button>
									<img src="https://img.youtube.com/vi/<?php echo $youtube_id; ?>/sddefault.jpg" alt="<?php echo $title; ?>" class="w-100 embed-responsive-item">
								</div>
							</div>
						<?php elseif (has_shortcode( $single_post->post_content, 'espro-slider') || has_block( 'gallery', $single_post )) : ?>
							<div class="col-md-5 image p-md-3 p-xl-4 bg-white">
								<?php echo $content; ?>
							</div>
						<?php else: ?>
							<div class="col-md-5 image blank m-0 p-0">
							</div>
						<?php endif; ?>
					</div>
				<?php	endforeach; ?>
				</div>
			</div>
		<?php	endforeach; ?>
	</div>

<?php endif; ?>
<?php
get_footer();
