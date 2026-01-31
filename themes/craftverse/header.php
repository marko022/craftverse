<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, minimum-scale=1">
  <meta name="distribution" content="global">

  <title><?php wp_title(); ?></title>

  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/bootstrap-grid.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/reset.css">
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