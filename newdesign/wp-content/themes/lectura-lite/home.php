<?php if ( is_home() && !is_front_page() ) { ?>
<?php get_header(); ?>

<div id="content" class="clearfix">
<?php } ?>

<div class="wrapper wrapper-content-main">

	<?php if ( ( is_front_page() || is_home() ) && $paged < 2 ) { 
		
		get_template_part('slideshow', 'home'); 

		get_template_part('featured-pages');

	} ?>

	<?php
	if ( !dynamic_sidebar('Homepage Content: Main') ) : ?> <?php endif;
	?>
	
	<div class="academia-column academia-column-half academia-column-marginright">
	
		<?php
		if ( get_option ( 'page_for_posts' ) != 0 ) {
		
			$homepage = get_post (get_option ( 'page_for_posts' ) );
			?>
			
			<div class="post-meta-single">
			<h1 class="title title-l title-post-single"><?php print $homepage->post_title; ?></h1>
			</div><!-- .post-meta-single -->
		
		<?php } else { ?>

			<p class="title-s title-widget title-widget-red"><?php _e('Recent Posts', 'lectura_lite'); ?></p>

		<?php } ?>


		<?php get_template_part('loop', 'archives'); ?>

		<?php
		if ( !dynamic_sidebar('Homepage Content: Left Column') ) : ?> <?php endif;
		?>
		
		<div class="cleaner">&nbsp;</div>
	
	</div><!-- .academia-column .academia-column-half -->
	
	<div class="academia-column academia-column-half academia-column-last">
	
		<?php
		if ( !dynamic_sidebar('Homepage Content: Right Column') ) : ?> <?php endif;
		?>
		
		<div class="cleaner">&nbsp;</div>
	
	</div><!-- .academia-column .academia-column-half -->
	
	<div class="cleaner">&nbsp;</div>

</div><!-- .wrapper .wrapper-content-main -->

<?php if ( is_home() && !is_front_page() ) { ?>
</div><!-- end #content -->

<?php get_footer(); ?>
<?php } ?>