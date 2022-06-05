<?php

/**
 *  My Theme Function
 */

// Theme Title
add_theme_support('title-tag');


// Theme scc and jquery file calling
function rezaul_css_js_file_calling()
{
  wp_enqueue_style('rezaul_style', get_stylesheet_uri());
  wp_register_style('bootstap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), 'v5.1.3', 'all');
  wp_enqueue_style('bootstap');
  wp_register_style('custom', get_template_directory_uri() . '/css/custom.css', array(), '1.0.0', 'all');
  wp_enqueue_style('custom');

  //jquery
  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), 'v5.1.3', 'true');
  wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), 'v5.1.3', 'true');
};
add_action('wp_enqueue_scripts', 'rezaul_css_js_file_calling');

//Google font enqueue
function rezaul_add_google_fonts()
{
  wp_enqueue_style('rezaul_google_fonts', 'https://fonts.googleapis.com/css2?family=Kaisei+Decol&family=Oswald&display=swap', false);
}
add_action('wp_enqueue_scripts', 'rezaul_add_google_fonts');

//Theme Functions
function rezaul_customizar_register($wp_customize)
{
  $wp_customize->add_section('rezaul_header_area', array(
    'title' => __('Header Area', 'rezaul360'),
    'description' => 'If you interested to update your header area, you can do it here.'
  ));

  $wp_customize->add_setting('rezaul_logo', array(
    'default' => get_bloginfo('template_directory') . '/img/logo.png',
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'rezaul_logo', array(
    'label' => 'Logo Upload',
    'description' => 'If you interested to change or update your logo, you can do it',
    'setting' => 'rezaul_logo',
    'section' => 'rezaul_header_area'
  )));
}

add_action('customize_register', 'rezaul_customizar_register');


//Menu Register
register_nav_menu('main menu', __('Main Menu', 'rezaul360'));
