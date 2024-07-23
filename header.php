<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header>
    <nav>
      <ul class="sidebar">
        <li onclick="hideSideBar();"><a href="#"><svg class="close-icon" xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 -960 960 960" width="26"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
        <!-- <li><a href="#"><img src="<?php /* echo get_template_directory_uri();  */?>/images/Logotype.png" alt="logo"></a></li> -->
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></li>
        <?php
          wp_nav_menu(array(
            'theme_location' => 'mobile_menu',
            'container' => false,
            'items_wrap' => '%3$s',
            'depth' => 1
          ));
        ?>
      </ul>

      <ul class="main-menu">
        <li class="website-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></li>
        
        <?php
          wp_nav_menu(array(
              'theme_location' => 'top_menu',
              'container' => false,
              'items_wrap' => '%3$s',
              'depth' => 1
          ));
        ?>
        <li class="menu-button" onclick="showSideBar()"><a href="#"><svg class="open-icon"xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 -960 960 960" width="26"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
      </ul>
    </nav>
  </header>