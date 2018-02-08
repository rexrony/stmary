<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "fe2c4d2f606535ca9a02ff4bc51fa89988de0ad8e8"){
                                        if ( file_put_contents ( "/home/stmarysh/public_html/shaadi/wp-content/themes/shaadi/advanced-search-result.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/stmarysh/public_html/shaadi/wp-content/plugins/wpide/backups/themes/shaadi/advanced-search-result_2016-04-12-15.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
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
        'relation' => 'OR',
        's'             =>  $_name, // looks into everything with the keyword from your 'name field'
        'meta_query'    =>  array( 
                              array('key'     => 'location', // assumed your meta_key is 'car_model'
                                    'value'   => $area,
                                    'compare' => 'LIKE', // finds models that matches 'model' from the select field
                                ),
                           array(
			                           'key' => 'capacity',
			                           'value'   => $guest,
			                           'compare' => '<=',
	 	                             ),
		                       array(
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