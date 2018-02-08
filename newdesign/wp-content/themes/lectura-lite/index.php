<?php get_header(); ?>

<div id="content" class="clearfix">
	
	<div class="wrapper wrapper-content-main">
	
		<?php if ( !is_home() || is_front_page() ) { get_template_part('slideshow', 'home'); } ?>

		<?php
		if ( !dynamic_sidebar('Homepage Content: Main') ) : ?> <?php endif;
		?>

		<?php get_template_part('loop', 'archives'); ?>
		
		<?php if (is_active_sidebar('home-col-1') || is_active_sidebar('home-col-2')) { ?>
		
		<div class="academia-column academia-column-half academia-column-marginright">
		
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
		
		<?php } ?>
		
		<div class="cleaner">&nbsp;</div>
	
	</div><!-- .wrapper .wrapper-content-main -->

</div><!-- end #content -->

<?php get_footer(); ?>