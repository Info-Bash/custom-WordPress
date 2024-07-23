<?php

/*----------------------------------------------------
 Load cBootstrap css
--------------------------------------------------- */

function load_css(){
  wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all' );
  wp_enqueue_style('bootstrap');


  wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all' );
  wp_enqueue_style('main');
  
  wp_register_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css', array(), null, 'all');
  wp_enqueue_style('bootstrap-icons');

}
add_action('wp_enqueue_scripts', 'load_css');

/*----------------------------------------------------
 Load Bootstrap JavaScript
--------------------------------------------------- */

function load_js(){

  wp_enqueue_script('jquery');

  wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true );
  wp_enqueue_script('bootstrap');

}
add_action('wp_enqueue_scripts', 'load_js');

/*-----------------------------------------------------
load custom fonts
---------------------------------------------------- */

function custom_theme_fonts() {
  wp_enqueue_style( 'typekit-fonts', 'https://use.typekit.net/uzz3kjs.css', array(), null );
}
add_action( 'wp_enqueue_scripts', 'custom_theme_fonts' );

/*----------------------------------------------------
 Load custom JavaScript
--------------------------------------------------- */

function load_custom_js() {
  wp_register_script('custom', get_template_directory_uri() . '/js/custom.js', array(), false, true);
  wp_enqueue_script('custom');
}
add_action('wp_enqueue_scripts', 'load_custom_js');

/*----------------------------------------------------
 Theme Options
--------------------------------------------------- */

add_theme_support('menus');
add_theme_support('post-thumbnails');

/*----------------------------------------------------
 Custom image sizes
--------------------------------------------------- */

add_image_size('blog-large', 900, 450, true);
add_image_size('blog-small', 400, 300, true);

/*----------------------------------------------------
 Top Menus
--------------------------------------------------- */

register_nav_menus(
  array(
    'top_menu' => 'Top Menu Location',
    'mobile_menu' => 'Mobile Menu Location',
  )
);

/*----------------------------------------------------
 footer menu
--------------------------------------------------- */

function my_child_theme_setup() {
  // Add support for menus
  add_theme_support('menus');

  // Register menus
  register_nav_menus(array(
      'footer_menu' => 'Footer Menu Location'
  ));
}
add_action('after_setup_theme', 'my_child_theme_setup');

/*----------------------------------------------------
 Hero section carousel image, h4, p, and button contents
--------------------------------------------------- */

function custom_carousel_customize_register($wp_customize) {
  for ($i = 1; $i <= 3; $i++) {
      $wp_customize->add_section("carousel_section_$i", array(
          'title' => __("Carousel Slide $i", 'yourtheme'),
          'priority' => 30,
      ));

      $wp_customize->add_setting("carousel_image_$i", array(
          'default' => '',
          'transport' => 'refresh',
      ));

      $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "carousel_image_$i", array(
          'label' => __("Background Image $i", 'yourtheme'),
          'section' => "carousel_section_$i",
          'settings' => "carousel_image_$i",
      )));

      $wp_customize->add_setting("carousel_title_$i", array(
          'default' => __("Title $i", 'yourtheme'),
          'transport' => 'refresh',
      ));

      $wp_customize->add_control("carousel_title_$i", array(
          'label' => __("Title $i", 'yourtheme'),
          'section' => "carousel_section_$i",
          'type' => 'text',
      ));

      $wp_customize->add_setting("carousel_text_$i", array(
          'default' => __("Text $i", 'yourtheme'),
          'transport' => 'refresh',
      ));

      $wp_customize->add_control("carousel_text_$i", array(
          'label' => __("Text $i", 'yourtheme'),
          'section' => "carousel_section_$i",
          'type' => 'textarea',
      ));

      // Carousel Button Link
      $wp_customize->add_setting("carousel_button_link_$i", array(
          'default' => '',
          'transport' => 'refresh',
      ));

      $wp_customize->add_control("carousel_button_link_$i", array(
          'label' => __("Button Link $i", 'yourtheme'),
          'section' => "carousel_section_$i",
          'type' => 'url',
      ));

      // Display Carousel Button
      $wp_customize->add_setting("display_carousel_button_$i", array(
          'default' => true,
          'transport' => 'refresh',
      ));

      $wp_customize->add_control("display_carousel_button_$i", array(
          'label' => __("Display Button $i", 'yourtheme'),
          'section' => "carousel_section_$i",
          'type' => 'checkbox',
      ));

      // Carousel Button Text
      $wp_customize->add_setting("carousel_button_text_$i", array(
          'default' => __('Learn More', 'yourtheme'),
          'transport' => 'refresh',
      ));

      $wp_customize->add_control("carousel_button_text_$i", array(
          'label' => __("Button Text $i", 'yourtheme'),
          'section' => "carousel_section_$i",
          'type' => 'text',
      ));
  }
}

add_action('customize_register', 'custom_carousel_customize_register');

/*----------------------------------------------------
 Home Page Pagination Button Link
--------------------------------------------------- */


function mytheme_customize_register($wp_customize) {
  // Add a section for the custom link
  $wp_customize->add_section('custom_links_section', array(
      'title'      => __('Home Pagination Button Link', 'mytheme'),
      'priority'   => 30,
  ));

  // Add setting for the custom link
  $wp_customize->add_setting('custom_blog_link', array(
      'default'    => '',
      'transport'  => 'refresh',
  ));

  // Add control for the custom link
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'custom_blog_link_control', array(
      'label'      => __('Category Post Link', 'mytheme'),
      'section'    => 'custom_links_section',
      'settings'   => 'custom_blog_link',
      'type'       => 'url',
  )));


  /*----------------------------------------------------
 footer description
 --------------------------------------------------- */

  // Add a section for the footer description
  $wp_customize->add_section('footer_section', array(
    'title'    => __('Footer', 'mytheme'),
    'priority' => 32,
  ));

  // Add the setting for the footer description
  $wp_customize->add_setting('footer_description', array(
      'default'           => 'Footer description goes here',
      'sanitize_callback' => 'sanitize_textarea_field',
  ));

  // Add the control for the footer description
  $wp_customize->add_control('footer_description_control', array(
      'label'    => __('Footer Description', 'mytheme'),
      'section'  => 'footer_section',
      'settings' => 'footer_description',
      'type'     => 'textarea',
  ));
}
add_action('customize_register', 'mytheme_customize_register');


/*----------------------------------------------------
 Archive post per page
--------------------------------------------------- */