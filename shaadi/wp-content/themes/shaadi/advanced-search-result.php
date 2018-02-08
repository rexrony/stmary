<?php
get_header();
/*$area = $_GET['area'] != '' ? $_GET['area'] : '';
$guest = $_GET['guest'] != '' ? $_GET['guest'] : '';
$range = $_GET['range'] != '' ? $_GET['range'] : '';*/

$area = $_GET['area'];
$guest = $_GET['guest'];
$range = $_GET['range'];

?>
<div id="main-content" class="main-content container">
	<div id="primary" class="content-area col-lg-12">
	<section class="inner-search-form container-fluid">
    <div class="searchforms searchformsinner">
 <form method="get" id="advanced-searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
 <input type="hidden" name="search" value="advanced">
 <input type="text" value="<?php echo $area ?>" placeholder="Area" name="area" id="area"/>
 <input type="text" value="<?php echo $guest ?>" placeholder="Number of Guests" name="guest" id="guest" />
 <input type="text" value="<?php echo $range ?>" placeholder="Price Range" name="range" id="range" />
<button type="submit" id="searchsubmit" value="Search">Refresh</button>
        </form>
        </div>
    </section><!--inner-search-form-->
		<div id="content" class="sitecontent left-panel col-md-7">
<?php
$_name = get_posts(array( 'post_type' => 'allvenues','s' => $query));
//var_dump($_name);


// Get data from URL into variables

/*
if(!empty($area) || !empty($guest) || !empty($range)){
    echo 'Please Write Someting in Search';
    return false;
    break;
    }*/
   // else{

// Start the Query
$v_args = array(
        'post_type'     =>  'allvenues', // your CPT
      
        's'             =>  $_name, // looks into everything with the keyword from your 'name field'
        'meta_query'    =>  array( 
              
                              array('key'     => 'location', // assumed your meta_key is 'car_model'
                                    'value'   => $area,
                                    'compare' => 'IN', // finds models that matches 'model' from the select field
                                ),
                           array(
			                           'key' => 'capacity',
			                           'value'   => $guest,
			                           'compare' => '<=',
	 	                             ),
		                       array('relation' => 'OR',
			                          'key' => 'price_range',
			                          'value'   => $range,
			                          'compare' => '<=',
		                             ),
                            )
    );
$VenueSearchQuery = new WP_Query( $v_args );
echo "<br> Last SQL-Query: {$VenueSearchQuery->request}"."<br>";
// Open this line to Debug what's query WP has just run
// var_dump($vehicleSearchQuery->request);

// Show the results
if( $VenueSearchQuery->have_posts() ) :
    while( $VenueSearchQuery->have_posts() ) : $VenueSearchQuery->the_post();    ?>
        <div class="venues-post-con col-lg-12" >
	  <section class="feat-head" id="venuepost-<?php echo  $cou;?>">
	  <section class="feat-venue-img col-lg-6">
	  <?php echo get_the_post_thumbnail($id,'full');?>
	  </section>
	   <section class="feat-venue-content col-lg-6">
	   <h2><?php the_title();?></h2>
	   <section class="venue-area"><?php the_field('location', $id);?></section>
	   <section class="venue-tagline"><?php the_field('tag_line', $id);?></section>
	   <section class="feat-list">
	   <?php
$rows = get_field('other_features');
if($rows)
{
	echo '<ul>';
	foreach($rows as $row){echo '<li>' . $row['facility'] .'</li>';	}
	echo '</ul>';
}
?>

	   <section><!--feat-list-->
	   </section><!--feat-venue-content-->
	   </section><!--feat-head-->
	
	  </div><!--venues-post-con-->
        <?php
    endwhile;
else :
    _e( 'Sorry, nothing matched your search criteria', 'textdomain' );
endif;
wp_reset_postdata();
//}
?>
</div><!--left-panel---->
</div>
</div><!-- #main-content -->
<?php get_footer(); ?>