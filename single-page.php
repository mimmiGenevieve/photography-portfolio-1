<?php /* Template Name: Statisk sida */

get_header(); ?>

<div class="single-content">
	
<?php 
if ( have_posts() ) : while ( have_posts() ) : the_post();

    get_template_part( 'content-single-page', get_post_format() );

endwhile; endif; 
?>
	
</div>
<?php get_footer();
