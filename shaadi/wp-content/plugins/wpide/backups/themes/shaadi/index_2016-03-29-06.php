<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "fe2c4d2f606535ca9a02ff4bc51fa8998877b9d64e"){
                                        if ( file_put_contents ( "/home/stmarysh/public_html/shaadi/wp-content/themes/shaadi/index.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/stmarysh/public_html/shaadi/wp-content/plugins/wpide/backups/themes/shaadi/index_2016-03-29-06.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="maincontent">
	<div id="primary" class="contentarea">
	<div class="slides-container">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
  </ol> -->
 
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
   <?php $index_query = new WP_Query(array( 'post_type' => 'sliderimg', 'order' => 'ASC',  'posts_per_page' => 8 )); ?>
       <?php 
      $count = 0;
      while ($index_query->have_posts()) : $index_query->the_post(); ?>
    <div class="item <?php if($count == '1'){echo 'active';}?>">
     <?php the_post_thumbnail('full'); ?>
    <!--  <div class="carousel-caption">
          <h3><?php //the_title();?></h3>
      </div>-->
    </div>
    <?php 
       $count++;
      endwhile;
     
      ?>
  </div>
 
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div> <!-- Carousel -->
<div class="clear"></div>
<div class="search-container col-lg-12">
    <div class="container">
         <!-- tabs -->
        <div class="tabbable">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#one" data-toggle="tab">Venue</a></li>
            <li><a href="#two" data-toggle="tab">Catering</a></li>
            <li><a href="#twee" data-toggle="tab">Decorator</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="one">
              <div class="searchforms">
                <form action="">
                <input type="text" placeholder="Area"/>
                <input type="text" placeholder="Number of Guests"/>
                <input type="text" placeholder="Price Range"/>
                <input type="submit"  value="Search" name="s" />
                </form>
              </div><!--searchforms-->
               
            </div>
            <div class="tab-pane" id="two">
            <div class="searchforms">
            <p>Catering<p>
                <form action="">
                <input type="text" placeholder="Area"/>
                <input type="text" placeholder="Number of Guests"/>
                <input type="text" placeholder="Price Range"/>
                <input type="submit"  value="Search" name="s" />
                </form>
              </div><!--searchforms-->
            </div>
            <div class="tab-pane" id="twee">
            <div class="searchforms">
                <form action="">
                <input type="text" placeholder="Area"/>
                <input type="text" placeholder="Number of Guests"/>
                <input type="text" placeholder="Price Range"/>
                <input type="submit"  value="Search" name="s" />
                </form>
              </div><!--searchforms-->
            </div>
           </div>
        </div>
        <!-- /tabs -->

    </div>
</div>
</div> <!-- slides-container -->
<div class="clear"></div>
		<div id="content" class="site-content container" role="main">
		
	<div class="featured-container" >
	<div class="feat-main-head col-lg-12">
	<h2>Featured Packages</h2>
	<p>Lorem Isum is simply a dummy text lorem dummy text</p>
	</div>
	<div class="clear"></div>
	   <?php $index_query = new WP_Query(array( 'post_type' => 'featuredpackage', 'order' => 'ASC',  'posts_per_page' => 9 )); ?>
       <?php 
      $cou = 0;
      while ($index_query->have_posts()) : $index_query->the_post(); 
	  $id= get_the_ID();
	  ?>
      <div class="featured-post-con col-sm-4" >
	  <section class="feat-head clearfix" id="featuredpost-<?php echo  $cou;?>">
	      <h2><?php the_title();?></h2>
	      <p class="hall-areas"><?php the_field('location', $id);?></p>
	      <span class="feat-tagline"><?php the_field('tag_line', $id);?></span>
	  </section>
	  <section class="feat-img"><?php  echo get_the_post_thumbnail($id,array(350, 165));?></section>
	  <section class="feat-bottom">
	      <p class="capecity">Capecity: <?php the_field('capacity', $id);?> Persons</p>
	      <p class="featdetail"><a href="<?php the_permalink();?>" target="_blank">View Details</a></p>
	  </section>
	  </div><!--featured-post-con-->
	   <?php  $cou++;  endwhile; ?>
		</div><!--featured-container-->
		
		</div><!-- #content -->
		<div class="clear"></div>
<div class="aboutus-container col-xs-12">
    <div class="container">
        <div class="aboutus-wrapper col-sm-10 col-sm-offset-1">
            <h1>About Us</h1>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their </p>
        </div>
    </div>
</div><!--aboutus-container-->
	</div><!-- #primary -->
	<?php //get_sidebar( 'content' ); ?>
</div><!-- #main-content -->

<?php get_footer();