<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "fe2c4d2f606535ca9a02ff4bc51fa899eeddf1f480"){
                                        if ( file_put_contents ( "/home/stmarysh/public_html/shaadi/wp-content/themes/shaadi/footer.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/stmarysh/public_html/shaadi/wp-content/plugins/wpide/backups/themes/shaadi/footer_2016-03-31-09.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
global $options;
?>

		</div><!-- #main -->
		<?php if(!is_front_page()):?>
		<div class="clear"></div>
		<div class="bottom-footer container-fluid">
		    <div class="container footer-inner-con">
		    <div class="col-md-3 footer-boxes">
		        <h2>Contact Us</h2>
		        <p><?php echo $options['contactus'];?></p>
		    </div>
		    <div class="col-md-3 footer-boxes">
		        <h2>Address</h2>
		        <p><?php echo $options['address'];?></p>
		    </div>
		    <div class="col-md-3 footer-boxes">
		        <h2>Quick Links</h2>
		        <nav>
		     <?php $defaults = array( 'menu' => 'quicklinks', 'container' => ' ', 'container_class' => '', 'container_id' => '', 'menu_class' => 'nav', 'theme_location' => '' );
wp_nav_menu( $defaults ); ?>
        </nav>
		    </div>
		    <div class="col-md-3 footer-boxes">
		        <h2>Social Media</h2>
		        <p><img id="footer-social" usemap="#footer-social" src="<?php echo bloginfo('template_url');?>/images/socialfooter.png" alt="social icons">
		        <map id="footer-social" name="footer-social"><area shape="circle" alt="" title="" coords="22,22,21" href="" target="" /><area shape="circle" alt="" title="" coords="69,22,22" href="" target="" /><area shape="circle" alt="" title="" coords="117,22,21" href="" target="" /></map>
		        </p>
		    </div>
		    </div><!--footer-inner-con-->
		</div><!--bottom-footer-->
<?php endif; ?>
<div class="clear"></div>
    <div class="mainfooter col-lg-12">
    <footer id="colophon" class="container sitefooter">
<section class="copyright col-md-4"><?php echo $options['copyright']; ?></section>
	</footer><!-- #colophon -->
    </div>
	</div><!-- .maincontainer -->

	<?php wp_footer(); ?>
	  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/multizoom.js"></script>
    
    <script src="<?php echo bloginfo( 'template_url' );?>/js/jquery1.11.3.min.js"></script>
    <script src="<?php echo bloginfo( 'template_url' );?>/js/bootstrap.min.js"></script>
    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 6000 //changes the speed
    })
    </script>
</body>
</html>