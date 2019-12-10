<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Icon -->
    <link rel="icon" href="<?php echo get_template_directory_uri() . '/inc/assets/images/favicon.ico'; ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() . '/inc/assets/images/favicon.ico'; ?>" type="image/x-icon">
<?php wp_head(); ?>
</head>

<?php $classes = get_body_class(); ?>
<?php if (in_array('home',$classes)) : ?>
<body <?php body_class(); ?> data-spy="scroll" data-target="#decade-navigation" data-offset="0.5">
<?php else: ?>
<body <?php body_class(); ?>>
<?php endif; ?>
<div id="page" class="site">
  <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'timeline-theme' ); ?></a>
  <header class="flex-shrink-0">
    <nav class="navbar navbar-light navbar-expand-md" role="navigation" aria-label="Main">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <?php
      wp_nav_menu(array(
      'theme_location'    => 'primary',
      'container'       => 'div',
      'container_id'    => 'main-nav',
      'container_class' => 'collapse navbar-collapse justify-content-end',
      'menu_id'         => false,
      'menu_class'      => 'navbar-nav ml-auto',
      'depth'           => 3,
      'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
      'walker'          => new wp_bootstrap_navwalker()
      ));
      ?>
    </nav>
  </header>
  <main class="flex-shrink-0" id="content">
