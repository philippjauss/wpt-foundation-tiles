<!DOCTYPE html>

<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->

<html class="no-js" lang="de" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php wp_title('&laquo;',true,'right');
            if (!is_home()) { echo "";} else {
            bloginfo('name'); }?>
    </title>
    <meta name="description" content="
          <?php bloginfo('description');?>
          "/>
    <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/foundation.css"> 
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/foundation-icons/foundation-icons.css" />
    
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <link href='http://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
    <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr.js"></script>    
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<?php $options = get_option('wft_theme_options');     ?>
<?php if ($options['share_facebook'] == 1) { ?>    
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php } ?>

<div  class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap">
    <nav class="tab-bar">
      <section class="left-small">
        <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
      </section>

      <section class="middle tab-bar-section">
        <h1 id="pagetop" class="title"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
      </section>

    </nav>

    <aside class="left-off-canvas-menu">
      <ul class="off-canvas-list no-bullet">
          <?php get_sidebar(); ?>

      </ul>
    </aside>


    <section class="main-section">