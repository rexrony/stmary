<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "fe2c4d2f606535ca9a02ff4bc51fa8998877b9d64e"){
                                        if ( file_put_contents ( "/home/stmarysh/public_html/shaadi/wp-content/themes/shaadi/advanced-search-result.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/stmarysh/public_html/shaadi/wp-content/plugins/wpide/backups/themes/shaadi/advanced-search-result_2016-03-29-06.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
get_header();
?>
<div id="main-content" class="main-content container">
<?php
// Get data from URL into variables
$_name = $_GET['name'] != '' ? $_GET['name'] : '';
$_model = $_GET['model'] != '' ? $_GET['model'] : '';

// Start the Query
$v_args = array(
        'post_type'     =>  'featuredpackage', // your CPT
        's'             =>  $_name, // looks into everything with the keyword from your 'name field'
        'meta_query'    =>  array(
                                array(
                                    'key'     => 'location', // assumed your meta_key is 'car_model'
                                    'value'   => $_model,
                                    'compare' => 'LIKE', // finds models that matches 'model' from the select field
                                ),
                            )
    );
$vehicleSearchQuery = new WP_Query( $v_args );

// Open this line to Debug what's query WP has just run
// var_dump($vehicleSearchQuery->request);

// Show the results
if( $vehicleSearchQuery->have_posts() ) :
    while( $vehicleSearchQuery->have_posts() ) : $vehicleSearchQuery->the_post();
        the_title(); // Assumed your cars' names are stored as a CPT post title
    endwhile;
else :
    _e( 'Sorry, nothing matched your search criteria', 'textdomain' );
endif;
wp_reset_postdata();
?>
</div><!-- #main-content -->
<?php get_footer(); ?>