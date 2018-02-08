<?php
/**
 * Template Name: Homepage
 */

get_header(); ?>

<div id="content" class="clearfix">
	
	<div class="wrapper wrapper-content-main clearfix">
	
		<div class="academia-column academia-column-large academia-column-main clearfix">
		
			<?php get_template_part('slideshow', 'home'); ?>

			<div class="academia-column academia-column-double">

				<div class="academia-column-wrapper clearfix">
				
					<?php
					if ( !dynamic_sidebar('Homepage Content: Middle Column') ) : ?> <?php endif;
					?>

					<?php
					if ( get_option ( 'page_for_posts' ) != 0 ) {
					
						$homepage = get_post (get_option ( 'page_for_posts' ) );
						?>
						
						<div class="post-meta-single">
						<h1 class="title-post"><?php print $homepage->post_title; ?></h1>
						</div><!-- .post-meta-single -->
					
					<?php } ?>

					<?php get_template_part('loop', 'archives'); ?>

				</div><!-- .academia-column-wrapper -->
			
			</div><!-- .academia-column .academia-column-double -->
			
			<div class="academia-column academia-column-narrow clearfix">
			
				<?php
				if ( !dynamic_sidebar('Sidebar: Right') ) : ?> <?php endif;
				?>

			</div><!-- .academia-column .academia-column-narrow -->

		</div><!-- .academia-column .academia-column-large -->

		<div class="academia-column academia-column-narrow">
		
			<div class="academia-column-wrapper">
			
				<?php get_sidebar(); ?>
			
			</div><!-- .academia-column-wrapper -->

		</div><!-- .academia-column .academia-column-narrow -->
	
	</div><!-- .wrapper .wrapper-content-main -->

</div><!-- end #content -->

<?php get_footer(); ?>