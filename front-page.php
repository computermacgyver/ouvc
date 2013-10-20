<?php get_header(); ?>

    <div class="container-fluid">
      <div class="row-fluid">    
        
        <div class="span7 offset1">
<div id="myCarousel" class="carousel slide">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
  </ol>
  <!-- Carousel items (last X posts)-->
  <div class="carousel-inner">

<?php

//$args = array( 'numberposts=2', "category_name=carousel" ); // set this to how many posts you want in the carousel
							//$myposts = get_posts( $args );
							$the_query = new WP_Query("meta_value=carousel&meta_value=true");
							$post_num = 0;
							//foreach( $myposts as $post ) :	setup_postdata($post);
							while ($the_query->have_posts()) {
								$the_query->the_post();
								$post_num++;
								$post_thumbnail_id = get_post_thumbnail_id();
								$featured_src = wp_get_attachment_image_src( $post_thumbnail_id, 'ouvc-featured-carousel' );
							?>

<div class="<?php if($post_num == 1){ echo 'active'; } ?> item">
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'ouvc-featured-carousel' ); ?></a>
		<div class="carousel-caption">
                      <h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                      <p><?php
					                		$excerpt_length = 100; // length of excerpt to show (in characters)
					                		$the_excerpt = get_the_excerpt(); 
					                		if($the_excerpt != ""){
					                			$the_excerpt = substr( $the_excerpt, 0, $excerpt_length );
					                			echo $the_excerpt . '... ';
					                	?>
					                	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="btn btn-primary">Read more &rsaquo;</a>
					                	<?php } ?></p>
	    </div>
	</div>
<?php } //endforeach; ?>	
	</div>
	
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
      
        </div>
        
        <div id="gcf" class="span3">
        
  <div class="gcf-item-container-block">
		<div class="gcf-item-block">
		  <div class="gcf-item-header-block">
		    <div class="gcf-item-title-block">
		      <div class="gcf-item-date">&nbsp;</div>
		      <span class="gcf-item-start-time">&nbsp;</span>
		      <span class="square">&nbsp;</span>
		      <span class="gcf-item-title">Loading...</span>
		    </div>
		  </div>
		</div>
  </div>

        </div>
</div>        
        
        <!--<div class="span9 offset2">-->
          <div class="row-fluid">
            <div class="span5 offset1">

            <ul id="menTabs" class="nav nav-tabs">
              <li class="active"><a href="#m1" data-toggle="tab">M1</a></li>
              <li><a href="#m2" data-toggle="tab">M2</a></li>
              <li><a href="#mnvl" data-toggle="tab">MNVL</a></li>
            </ul>
            <div id="menTabsContent" class="tab-content">
              <div class="tab-pane fade in active" id="m1">
              <!--holder-->
              </div>
              <div class="tab-pane fade" id="m2">
                <p>Coming soon...</p>
              </div>
              <div class="tab-pane fade" id="mnvl">
              </div>
          </div>


            </div><!--/span-->

            <div class="span5">

            <ul id="womenTabs" class="nav nav-tabs">
              <li class="active"><a href="#w1" data-toggle="tab">W1</a></li>
              <li><a href="#w2" data-toggle="tab">W2</a></li>
              <li><a href="#wnvl" data-toggle="tab">WNVL</a></li>
            </ul>
            <div id="womenTabsContent" class="tab-content">
              <div class="tab-pane fade in active" id="w1">
              
              </div>
              <div class="tab-pane fade" id="w2">
                <p>Coming soon...</p>
              </div>
              <div class="tab-pane fade" id="wnvl">
              </div>
          </div>


            </div><!--/span-->
            
          </div><!--/row-->
          <div class="row-fluid">

<?php 

$MAX_POSTS=3;
$count=0; 
//     $count=$count+1;
if ( have_posts() ) : while ( have_posts() && $count<$MAX_POSTS) : the_post(); $count=$count+1; ?>


            <div class="span3 offset1">
              <h2><?php the_title(); ?></h2>

		<?php //the_content(); 
			$more = 0; 
			$content = get_the_content('Read more');
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]&gt;', $content);
			$MAXCHAR=1024;
			if (strlen($content)>$MAXCHAR) {
				$end=strpos($content," ",$MAXCHAR);//Find space to end at
				$content=substr($content,0,$end);
				$content.='... <p><a class="btn" href="'.the_permalink().'">Read more &raquo;</a></p>';
				
			}
			echo $content;
		?>

            </div><!--/span-->

<?php endwhile; endif; ?>

          </div><!--/row-->
        </div><!--/span-->
<!--      </div><!--/row-->

 <?php 
 wp_enqueue_script("globalize");
 wp_enqueue_script("globalize-enGB"); 
 wp_enqueue_script("jquery-gcal"); 
 wp_enqueue_script("jquery-xdomain");
 wp_enqueue_script("removecontent");    
 
 
 get_footer();
 ?>


