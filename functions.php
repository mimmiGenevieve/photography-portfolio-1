<?php

// add custom logo
 function themename_custom_logo_setup() {
    $defaults = array(
       // 'height'      => 92,
        'width'       => 225,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

// add menu
function register_my_menus() {
register_nav_menus(
			array(
        'primary' => __( 'Main menu', 'hannakero' ),
        'secondary' => __( 'Static pages', 'hannakero' ),
			)
        );
      }
add_action( 'init', 'register_my_menus' );


// Custom settings for social media links
function custom_settings_add_menu() {
    add_menu_page( 'Custom Settings', 'Custom Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99 );
  }
  add_action( 'admin_menu', 'custom_settings_add_menu' );

  // Create Custom Global Settings
function custom_settings_page() { ?>
    <div class="wrap">
      <h1>Custom Settings</h1>
      <form method="post" action="options.php">
         <?php
             settings_fields( 'section' );
             do_settings_sections( 'theme-options' );      
             submit_button(); 
         ?>          
      </form>
    </div>
  <?php }

  // Youtube
function setting_youtube() { ?>
    <input type="text" name="youtube" id="youtube" value="<?php echo get_option( 'youtube' ); ?>" />
  <?php }

    // Facebook
function setting_facebook() { ?>
    <input type="text" name="facebook" id="facebook" value="<?php echo get_option( 'facebook' ); ?>" />
  <?php }

    // Instagram
function setting_instagram() { ?>
    <input type="text" name="instagram" id="instagram" value="<?php echo get_option( 'instagram' ); ?>" />
  <?php }

  // Twitter
function setting_twitter() { ?>
  <input type="text" name="twitter" id="twitter" value="<?php echo get_option( 'twitter' ); ?>" />
<?php }

// LinkedIn
function setting_linkedin() { ?>
  <input type="text" name="linkedin" id="linkedin" value="<?php echo get_option( 'linkedin' ); ?>" />
<?php }

// Snapchat
function setting_snapchat() { ?>
  <input type="text" name="snapchat" id="snapchat" value="<?php echo get_option( 'snapchat' ); ?>" />
<?php }

function custom_settings_page_setup() {
    add_settings_section( 'section', 'All Settings', null, 'theme-options' );
    add_settings_field( 'youtube', 'Youtube URL', 'setting_youtube', 'theme-options', 'section' );
    add_settings_field( 'facebook', 'Facebook URL', 'setting_facebook', 'theme-options', 'section' );
    add_settings_field( 'instagram', 'Instagram URL', 'setting_instagram', 'theme-options', 'section' );
    add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section' );
    add_settings_field( 'linkedin', 'LinkedIn URL', 'setting_linkedin', 'theme-options', 'section' );
    add_settings_field( 'snapchat', 'Snapchat URL', 'setting_snapchat', 'theme-options', 'section' );
  
    register_setting('section', 'youtube');
    register_setting('section', 'facebook');
    register_setting('section', 'instagram');
    register_setting('section', 'twitter');
    register_setting('section', 'linkedin');
    register_setting('section', 'snapchat');
  }
  add_action( 'admin_init', 'custom_settings_page_setup' );



//add feautured image on posts
add_theme_support( 'post-thumbnails' );

//add another feautured image (if needed)
if (class_exists('MultiPostThumbnails')) {
new MultiPostThumbnails(array(
'label' => 'Secondary Image',
'id' => 'secondary-image',
'post_type' => 'post'
 ) );
}

// remove default gallery styling
add_filter( 'use_default_gallery_style', '__return_false' );

// remove automatic tags to img
add_filter( 'get_image_tag_class', '__return_empty_string' );


// add widgets
if ( function_exists('register_sidebar') )

  // shorter description widget
  register_sidebar(array(
    'name' => 'About Top',
    'before_widget' => '<div class="aboutTop">',
    'after_widget' => '</div>',
  ));
				   
  register_sidebar(array(
    'name' => 'About Bottom',
    'before_widget' => '<div class="aboutBottom">',
    'after_widget' => '</div>',
  ));



function strip_shortcode_gallery( $content ) {
    preg_match_all( '/' . get_shortcode_regex() . '/s', $content, $matches, PREG_SET_ORDER );

    if ( ! empty( $matches ) ) {
        foreach ( $matches as $shortcode ) {
            if ( 'gallery' === $shortcode[2] ) {
                $pos = strpos( $content, $shortcode[0] );
                if( false !== $pos ) {
                    return substr_replace( $content, '', $pos, strlen( $shortcode[0] ) );
                }
            }
        }
    }

    return $content;
}