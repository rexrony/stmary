<?php get_header(); ?>

<div id="content" class="clearfix">
	
	<div class="wrapper wrapper-content-main">
	
		<div class="academia-column academia-column-main academia-column-marginright">

			<div class="post-meta-single">
				<h1 class="title title-l title-post-single"><?php single_cat_title(); ?></h1>
			</div><!-- end .post-meta-single -->

			<?php if (category_description()) { ?>
			<div class="category-excerpt">
			
				<?php echo category_description(); ?>
				
				<div class="cleaner">&nbsp;</div>
				
			</div><!-- .category-excerpt -->
			
			<div class="divider divider-notop">&nbsp;</div>
			
			<?php } ?>

			<?php get_template_part('loop'); ?>
			
			<div class="cleaner">&nbsp;</div>
		
		</div><!-- .academia-column .academia-column-main .academia-column-marginright -->
		
		<aside class="academia-column academia-column-aside academia-column-last">
		
			<?php get_sidebar(); ?>
			
			<div class="cleaner">&nbsp;</div>
		
		</aside><!-- .academia-column .academia-column-aside .academia-column-last -->
		
		<div class="cleaner">&nbsp;</div>
	
	</div><!-- .wrapper .wrapper-content-main -->

</div><!-- end #content -->

<?php get_footer(); ?>