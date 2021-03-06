<?php get_header(); ?>
<div class="mh-container">
	<div class="mh-content-wrap clearfix">
		<div id="main-content" class="mh-content"><?php
			if (have_posts()) :
				while (have_posts()) : the_post();
					mh_impact_lite_before_page_content();
					get_template_part('content', 'page');
					get_template_part('comments', 'pages');
				endwhile;
			endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>