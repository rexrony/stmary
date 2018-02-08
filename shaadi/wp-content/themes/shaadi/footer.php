<?php
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
    
   <span id="top-link-block" class="hidden">
    <a href="#top" class="well well-sm"  onclick="$('html,body').animate({scrollTop:0},'slow');return false;">
        <i class="glyphicon glyphicon-chevron-up"></i> Back to Top
    </a>
</span><!-- /top-link-block -->
	</div><!-- .maincontainer -->

	<?php wp_footer(); ?>
	  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     
    
    <script src="<?php echo bloginfo( 'template_url' );?>/js/jquery1.11.3.min.js"></script>
    <script src="<?php echo bloginfo( 'template_url' );?>/js/bootstrap.min.js"></script>
    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 6000 //changes the speed
    })
    /*******Back to Top*******/
    if ( ($(window).height() + 100) < $(document).height() ) {
    $('#top-link-block').removeClass('hidden').affix({
        // how far to scroll down before link "slides" into view
        offset: {top:100}
    });
}
    </script>
</body>
</html>