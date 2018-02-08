<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "fe2c4d2f606535ca9a02ff4bc51fa8990f3e06bdd3"){
                                        if ( file_put_contents ( "/home/stmarysh/public_html/shaadi/wp-content/themes/shaadi/content-venue.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/stmarysh/public_html/shaadi/wp-content/plugins/wpide/backups/themes/shaadi/content-venue_2016-03-28-07.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
/**
 * Template Name: Venue Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header(); ?>
<div class="innerpage_banner col-xs-12">
    <?php
	if ( has_post_thumbnail() ) :
			if ( 'grid' == get_theme_mod( 'featured_content_layout' ) ) {
				the_post_thumbnail();
			} else {
				the_post_thumbnail( 'full' );
			}
		endif;
?>
</div><!--innerpage_banner-->
<div id="main-content" class="main-content container">


	<div id="primary" class="content-area col-lg-12">
		<div id="content" class="sitecontent left-panel col-md-7">
<?php $index_query = new WP_Query(array( 'post_type' => 'featuredpackage', 'order' => 'ASC',  'posts_per_page' => 4 )); ?>
       <?php 
      $cou = 0;
      while ($index_query->have_posts()) : $index_query->the_post(); 
	  $id= get_the_ID();
	  ?>
      <div class="venues-post-con col-lg-12" >
	  <section class="feat-head" id="venuepost-<?php echo  $cou;?>">
	  <section class="feat-venue-img col-lg-6">
	  <?php  echo get_the_post_thumbnail($id,'full');?>

	  </section>
	   <section class="feat-venue-content col-lg-6">
	   <h2><?php the_title();?></h2>
	   <p class="hall-areas"><?php the_field('location', $id);?></p>
	   <span class="feat-tagline"><?php the_field('tag_line', $id);?></span>
	   </section><!--feat-venue-content-->
	      
	      
	  </section><!--feat-head-->
	
	  </div><!--featured-post-con-->
	   <?php  $cou++;  endwhile; ?>

	</div><!--left-panel---->
	<div class="right-panel col-xs-4">
	   <?php $index_query = new WP_Query(array( 'post_type' => 'featuredpackage', 'order' => 'ASC',  'posts_per_page' => 3 )); ?>
       <?php 
      $cou = 0;
      while ($index_query->have_posts()) : $index_query->the_post(); 
	  $id= get_the_ID();
	  ?>
      <div class="featured-post-con col-lg-12" >
	  <section class="feat-head" id="featuredpost-<?php echo  $cou;?>">
	      <h2><?php the_title();?></h2>
	      <p class="hall-areas"><?php the_field('location', $id);?></p>
	      <span class="feat-tagline"><?php the_field('tag_line', $id);?></span>
	  </section>
	  <section class="feat-img"><?php  echo get_the_post_thumbnail($id,'full');?></section>
	  <section class="feat-bottom">
	      <p class="capecity">Capecity: <?php the_field('capacity', $id);?> Persons</p>
	      <p class="featdetail"><a href="<?php the_permalink();?>" target="_blank">View Details</a></p>
	  </section>
	  </div><!--featured-post-con-->
	   <?php  $cou++;  endwhile; ?>
	</div>
		</div>
			</div>
<?php
get_footer();