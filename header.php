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
<html <?php language_attributes(); ?> class="h-100">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<?php $classes = get_body_class(); ?>
<?php if (in_array('home',$classes)) : ?>
<body <?php body_class('h-100'); ?> data-spy="scroll" data-target="#decade-navigation" data-offset="0.5">
<?php else: ?>
<body <?php body_class('h-100'); ?>>
<?php endif; ?>
<div id="page" class="site d-flex flex-column h-100">
  <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'timeline-theme' ); ?></a>
  <header class="flex-shrink-0">
    <nav class="navbar navbar-light navbar-expand-lg">
      <a class="navbar-brand" href="<?php echo home_url(); ?>">
        <img class="mr-0 mr-md-1" src="<?php echo get_template_directory_uri() . '/inc/assets/images/75th-anniversary-strip-lockup.png'; ?>" alt="Museum at FIT Logo"/>
      </a>
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
