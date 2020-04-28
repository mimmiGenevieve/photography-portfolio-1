<!-- start of link --><a href="<?php echo get_permalink();?>">
<div class="image-container grid-item">

<?php 
the_post_thumbnail('full');?> <!-- the thumbnail -->

<!-- the div with the posts images that shows when hovering -->
<div class="post-images grid2">
    <?php the_content(); ?>
</div>

<!-- start of link --><a href="<?php echo get_permalink();?>">
<!-- the div with text that shows when hovering -->
<div class="overlay">
<figcaption class="title"><h1><?php echo get_the_title(); ?></h1> <?php the_meta(); ?></figcaption>
</div>
<!-- end of link--></a>
</div>

</a>