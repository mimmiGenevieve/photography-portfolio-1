<?php /* Template Name: Inlägg */

get_header(); ?>

<div class="slider">

<?php 
if ( have_posts() ) : while ( have_posts() ) : the_post();

    get_template_part( 'content-single', get_post_format() );

endwhile; endif; 
?>

<div class="prev">&#10094;</div>
<div class="next">&#10095;</div>
</div>

<?php get_footer();