<?php get_header(); ?>
<div class="mh-container">
	<div class="mh-content-wrap clearfix">
		<div id="main-content" class="loop-content">
			<?php mh_impact_lite_before_page_content(); ?>
			<?php mh_impact_lite_page_title(); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php get_template_part('content'); ?>
			<?php endwhile; ?>
            	<?php mh_impact_lite_pagination(); ?>
			<?php else : ?>
            	<?php get_template_part('content', 'none'); ?>
			<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>