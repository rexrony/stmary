<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "fe2c4d2f606535ca9a02ff4bc51fa8997cd9a6566f"){
                                        if ( file_put_contents ( "/home/stmarysh/public_html/shaadi/wp-content/themes/shaadi/content-single.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/stmarysh/public_html/shaadi/wp-content/plugins/wpide/backups/themes/shaadi/content-single_2016-04-01-09.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<div class="col-lg-12 pckge-detail-top">
<div class="pckge-detail-imgs col-sm-7">
<div class="col-lg-12 pckge-bigimg targetarea diffheight  clearfix">
 <?php //the_post_thumbnail(array(600,525), array( 'id' => 'multizoom2' )); ?>
 <?php $postID = $post->ID;  $image = wp_get_attachment_image_src (get_post_thumbnail_id( $pageID ),'full', true) ;
 $image2 = wp_get_attachment_image_src (get_post_thumbnail_id( $pageID ),'medium', true) ;
 ?>

<img id="hallzoom" alt="zoomable" title=""  src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>">
 <!---<img id="hallzoom" alt="zoomable" title=""  src="http://stmaryshyd.edu.pk/shaadi/wp-content/uploads/2016/03/innerpage.jpg" />-->
</div>
<div class="clear"></div>
<div class="pckge-thumbnails hallzoom thumbs clearfix">
    <ul>
        <li><a href="<?php echo $image[0]; ?>" data-large="<?php echo $image2[0]; ?>" data-magsize="300,300" data-title="Shaadi Hall">
		<img src="<?php echo $image[0]; ?>" alt="Shaadi" title="" width="150" height="157" /></a></li>        
        <?php $rows_image = get_field('more_images');?>
        <!---<pre> <?php  //var_dump($rows_image); ?> </pre>-->
        <?php 
if($rows_image) {
	foreach($rows_image as $row){echo '<li> <a href="'.$row['url'].'" data-large="'.$row['url'].'" data-magsize="300,300" data-title="Shaadi Hall"> <img src="'. $row['url'] .'" alt="Shaadi" title="" width="150" height="157" /></a></li>';	}
} ?>
    </ul>
</div>
</div><!--pckge-detail-imgs-->
<div class="pckge-detail-container col-sm-4 col-sm-push-1">
<div class="pckge-detail-context">
    <header><h2>Shadmaan Wedding Hall</h2></header>
    <div class="area-span"> Block - 2 Clifton Cantt</div>
   <section class="check-style"> 
    <?php $rows = get_field('other_features');
if($rows) {
	echo '<ul>';
	foreach($rows as $row){echo '<li>' . $row['facility'] .'</li>';	}
	echo '</ul>';
} ?>
    </section>
   <section class="showPhone"><a href="#">Show Phone Number</a></section>
   <section class="hallemail"><a href="#" mailto="info@shadman.com">info@shadman.com</a></section>
   <section class="pricerange"><span>Starting From - Rs. <?php the_field('price_range'); ?></span></section>
   <div class="clear"></div>
   <p style="font-size:22px;margin-bottom: 0px;">Location</p>
</div><!--pckge-detail-context-->
<div class="pckage-map">
    <img src="http://placehold.it/300x218">
</div><!--pckage-map-->
</div>
	
</div><!---pckge-detail-top-->
<div class="clear"></div>
<div class="pckage-otherDetails">
    <div class="pckgehead">
    <h2>Other Details:</h2>
    </div>
    <div class="clear"></div>
  <section> <?php the_content(); ?></section>
</div>
