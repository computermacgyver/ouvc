<?php get_header(); ?>

    <div class="container-fluid">
      <div class="row-fluid">    
        <div class="span10 offset1">

 <?php 
 remove_filter ('the_content', 'wptexturize');//Serve exactly as is in DB, do not try to add <p> tags, convert -- to em dash, etc.
//Or edit wp_texturize() function, which is defined in wp-includes/formatting.php.
 if ( have_posts() ) : while ( have_posts() ) : the_post();
 ?>

   <?php the_content(); ?>
   
<?php endwhile; else: ?>

 <!-- The very first "if" tested to see if there were any Posts to -->
 <!-- display.  This "else" part tells what do if there weren't any. -->
 <p>Sorry, no posts matched your criteria.</p>

 <!-- REALLY stop The Loop. -->
 <?php endif; ?>


        </div><!--/span-->
      </div><!--/row-->
   </div><!--/container-->

<?php get_footer(); ?>

