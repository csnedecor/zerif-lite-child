<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="content">
 */
?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="http://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Alegreya:700" rel="stylesheet" type="text/css" />

<!--[if lt IE 9]>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/ie.css" type="text/css">
<![endif]-->

<?php wp_head(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-72096939-1', 'auto');
  ga('send', 'pageview');

</script>

<!-- Twitter single-event website tag code -->
<script src="//platform.twitter.com/oct.js" type="text/javascript"></script>
<script type="text/javascript">twttr.conversion.trackPid('nukkj', { tw_sale_amount: 0, tw_order_quantity: 0 });</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://analytics.twitter.com/i/adsct?txn_id=nukkj&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" />
<img height="1" width="1" style="display:none;" alt="" src="//t.co/i/adsct?txn_id=nukkj&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" />
</noscript>
<!-- End Twitter single-event website tag code -->

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '560847620758062');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=560847620758062&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

</head>

<?php if(isset($_POST['scrollPosition'])): ?>

  <body <?php body_class(); ?> onLoad="window.scrollTo(0,<?php echo intval($_POST['scrollPosition']); ?>)">

<?php else: ?>

  <body <?php body_class(); ?> >

<?php endif;

  global $wp_customize;

  /* Preloader */

  if(is_front_page() && !isset( $wp_customize ) && get_option( 'show_on_front' ) != 'page' ):

    $zerif_disable_preloader = get_theme_mod('zerif_disable_preloader');

    if( isset($zerif_disable_preloader) && ($zerif_disable_preloader != 1)):
      echo '<div class="preloader">';
        echo '<div class="status">&nbsp;</div>';
      echo '</div>';
    endif;

  endif; ?>

<header id="home" class="header">

  <div id="main-nav" class="navbar navbar-inverse bs-docs-nav" role="banner">

    <div class="container">

      <div class="navbar-header responsive-logo">

        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">

        <span class="sr-only"><?php _e('Toggle navigation','zerif-lite'); ?></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        </button>

        <?php

          $zerif_logo = get_theme_mod('zerif_logo');

          if(isset($zerif_logo) && $zerif_logo != ""):

            echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand">';

              echo '<img src="'.$zerif_logo.'" alt="'.get_bloginfo('title').'">';

            echo '</a>';

          else:

            echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand">';

              if( file_exists(get_stylesheet_directory()."/images/logo.png")):

                echo '<img src="'.get_stylesheet_directory_uri().'/images/logo.png" alt="'.get_bloginfo('title').'">';

              else:

                echo '<img src="'.get_template_directory_uri().'/images/logo.png" alt="'.get_bloginfo('title').'">';

              endif;

            echo '</a>';

          endif;

        ?>

      </div>

      <nav class="navbar-collapse bs-navbar-collapse collapse" role="navigation"   id="site-navigation">
        <a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'zerif-lite' ); ?></a>
        <?php wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right responsive-nav main-nav-list', 'fallback_cb'     => 'zerif_wp_page_menu')); ?>
      </nav>

    </div>

  </div>
  <!-- / END TOP BAR -->