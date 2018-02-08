<?php get_header(); ?>

<div id="content" class="clearfix">
	
	<div class="wrapper wrapper-content-main">
	
		<div class="academia-column academia-column-main academia-column-marginright">

			<?php $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author')); ?>
			<div class="post-meta-single">
				<h1 class="title title-l title-post-single"><?php _e('Posts by', 'lectura_lite');?> <span><?php echo $curauth->display_name; ?></span></h1>
			</div><!-- end .post-meta-single -->

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