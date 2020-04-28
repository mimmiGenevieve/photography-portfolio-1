<!DOCTYPE html>
<html lang="sv">
 <head>

 <!-- stylesheet -->
 <link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory'); ?>/style.css" media="screen" />
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

 <link rel="shortcut icon" href="<?php echo get_bloginfo('template_directory'); ?>favicon.ico" type="image/x-icon">
 <link rel="icon" href="<?php echo get_bloginfo('template_directory'); ?>favicon.ico" type="image/x-icon">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php echo get_bloginfo( 'name' ); ?></title>
  <meta name="description" content="<?php echo get_bloginfo( 'description' ); ?>">
   <?php wp_head();?>

 </head>

 <body>

 <div class="page-wrap"> <!-- wrap div for whole page -->

 <?php

function the_breadcrumb() {
  if (!is_home()) {
      echo "<div class='top'>";
      echo "You are here: ";
      bloginfo('name');
      echo " » ";
      if (is_category() || is_single()) {
        foreach((get_the_category()) as $category){
          echo $category->name;
          }
          if (is_single()) {
              echo " » ";
              the_title();
          }
      } elseif (is_page()) {
          echo the_title();
      }
      echo "</div>";
  }
}

 the_breadcrumb(); ?>

 <div class="menu-wrap">

 <?php // display the logo
 if ( function_exists( 'the_custom_logo' ) ) {
    the_custom_logo();
} 

if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('About Top') ) :  endif; ?>
	 
<!-- some empty span for the hamburger on smaller devices -->
<div class="hamburger">
<div class="hamburger1"></div>
<div class="hamburger2"></div>
<div class="hamburger3"></div>
</div>

 <nav class="mainMenu"> <!-- main menu -->
<?php
	 
 wp_nav_menu( array(
    'theme_location' => 'primary',
    'container_class' => 'mainMenu' ));
    ?>
	 <br />

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('About Bottom') ) :  endif; ?>
 <span class="social"> <!-- start of the div containing social media buttons, they are only displayed if they're set in the custom menu -->

	
	 
<div class="secondMenu"> 
<?php wp_nav_menu( array(
    'theme_location' => 'secondary',
    'container_class' => 'secondMenuStatic' ) );
?>
	
	<br />
</div>

<br />

<span class="socialImg">
 <?php $youtube = get_option('youtube', $youtube_def);
 if ( $youtube){ ?> 
 <a href="<?php echo get_option('youtube'); ?>"> <img src="<?php bloginfo('template_directory'); ?>/images/Youtube.png" /> </a>
 <?php } ?>

 <?php $facebook = get_option('facebook', $facebook_def);
 if ( $facebook){ ?>
 <a href="<?php echo get_option('facebook'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/Facebook.png" /></a>
 <?php } ?>

 <?php $instagram = get_option('instagram', $instagram_def);
 if ( $instagram){ ?>
 <a href="<?php echo get_option('instagram'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/Instagram.png" /></a>
 <?php } ?> 
 
 <br /> <!-- break after three to not mess up the menu-div -->

  <?php $twitter = get_option('twitter', $twitter_def);
 if ( $twitter){ ?>
 <a href="<?php echo get_option('twitter'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/Twitter.png" /></a>
 <?php } ?>

  <?php $linkedin = get_option('linkedin', $linkedin_def);
 if ( $linkedin){ ?>
 <a href="<?php echo get_option('linkedin'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/Linkedin.png" /></a>
 <?php } ?>

  <?php $snapchat = get_option('snapchat', $snapchat_def);
 if ( $snapchat){ ?>
 <a href="<?php echo get_option('snapchat'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/Snapchat.png" /></a>
 <?php } ?>
 </span>
</span>

</nav> <!-- end of main menu -->
 </div> <!-- end of menu-wrap -->
 <div class="content"> <!-- wrap div for content -->