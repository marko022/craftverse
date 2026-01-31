<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, minimum-scale=1">
  <meta name="distribution" content="global">

  <title><?php wp_title(); ?></title>

  <link rel="icon" href="<?php echo bloginfo('template_url'); ?>/favicon-32x32.png" sizes="32x32">
  <link rel="icon" href="<?php echo bloginfo('template_url'); ?>/favicon-192x192.png" sizes="192x192">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
  <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/bootstrap-grid.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url');?>/dist/css/style.css">

  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed"
      href="<?php bloginfo('rss2_url'); ?>">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

  <?php wp_get_archives('type=monthly&format=link'); ?>
  <?php wp_head(); ?>

</head>


<body class="body <?php if(is_front_page()) {?>front-page<?php } ?>" >
  
  <header class="header">
    <div class="container-fluid">
      <div class="row">
      
         
      </div>
    </div>
  </header>