<?php /* Template Name: Startsida */

get_header(); ?>

<div id="start">

<?php 
if ( have_posts() ) : while ( have_posts() ) : the_post();

    get_template_part( 'content', get_post_format() );

endwhile; endif; 
?>

</div>

<?php get_footer();