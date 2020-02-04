<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="all.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body>
    <div class="my-container ">
    <nav class="navbar navbar-expand-lg my-nav">

    <a class="navbar-brand logo" href="<?php echo home_url('/'); ?>"><?php
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    if ( has_custom_logo() ) {
        the_custom_logo();
    } else {
            echo '<li>'. get_bloginfo( 'name' ) .'</li>';
    }?></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars"></i>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php
    wp_nav_menu( array(
        'theme_location'    => 'primary',
        'depth'             => 4,
        'container'         => 'div',
        'container_class'   => 'ml-auto',
        'container_id'      => '',
        'menu_class'        => 'nav navbar-nav',
        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
        'walker'            => new WP_Bootstrap_Navwalker(),
    ) );
    ?>

    <div class="nav-icons">
        <?php
        if(is_active_sidebar('travio_widgets_social')):
        dynamic_sidebar('travio_widgets_social');
        endif;
        ?>
    </div>
  </div>
</nav>
</div>