<?php
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
<div class="innerpage_heading col-lg-12">
   <div class="container">
    <h2><?php the_title(); ?></h2>
    <section class="inner-search-form container-fluid">
    <div class="searchforms searchformsinner">
 <form method="get" id="advanced-searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
 <input type="hidden" name="search" value="advanced">
 <input type="text" value="" placeholder="Area" name="area" id="area"/>
 <input type="text" value="" placeholder="Number of Guests" name="guest" id="guest" />
 <input type="text" value="" placeholder="Price Range" name="range" id="range" />
<button type="submit" id="searchsubmit" value="Search">Refresh</button>
        </form>
        </div>
    </section><!--inner-search-form-->
   </div>
</div>
</div><!--innerpage_banner-->
<div id="main-content" class="main-content container">


	<div id="primary" class="content-area col-lg-12">
		<div id="content" class="sitecontent left-panel col-md-8">
<?php $index_query = new WP_Query(array( 'post_type' => 'allvenues', 'order' => 'DESC',  'posts_per_page' => 4 )); ?>
       <?php 
      $cou = 0;
      while ($index_query->have_posts()) : $index_query->the_post(); 
	  $id= get_the_ID();
	  ?>
      <div class="venues-post-con col-lg-12" >
	  <section class="feat-head" id="venuepost-<?php echo  $cou;?>">
	  <section class="feat-venue-img col-lg-6">
	  <?php echo get_the_post_thumbnail($id,'full');?>
	  </section>
	   <section class="feat-venue-content col-lg-6">
	   <h2><?php the_title();?></h2>
	   <section class="venue-area"><?php the_field('location', $id);?></section>
	   <section class="feat-list">
	   <?php $rows = get_field('other_features');
if($rows) {
	echo '<ul>';
	foreach($rows as $row){echo '<li>' . $row['facility'] .'</li>';	}
	echo '</ul>';
} ?>

           </section><!--feat-list-->
           <section class="venue-pricing">
               Starting From: Rs 80,000
           </section>
           <section class="venue-details"><a href="<?php the_permalink(); ?>">View Details</a></section>
	   </section><!--feat-venue-content-->
	   </section><!--feat-head-->
	
	  </div><!--venues-post-con-->
	   <?php  $cou++;  endwhile; ?>

	</div><!--left-panel---->
	<div class="right-panel col-md-4">
	   <?php $index_query = new WP_Query(array( 'post_type' => 'allvenues', 'order' => 'ASC',  'posts_per_page' => 3 )); ?>
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