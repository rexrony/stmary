<?php

/***** MH Custom Pages Widget *****/

class mh_impact_lite_pages_widget extends WP_Widget {
    function __construct() {
		parent::__construct(
			'mh_impact_lite_pages_widget', esc_html_x('MH Custom Pages (Homepage)', 'widget name', 'mh-impact-lite'),
			array('classname' => 'mh_impact_lite_pages_widget', 'description' => esc_html__('Display 3 columns of linked pages on your front page.', 'mh-impact-lite'))
		);
	}
    function widget($args, $instance) {
        extract($args);
        $pages = empty($instance['pages']) ? '' : $instance['pages'];

        echo $before_widget; ?>
        <div class="mh-pages-widget widget-wrap mh-row clearfix"><?php
        	$include_ids = explode(',', $pages);
            $args = array('post_type' => 'page', 'post__in' => $include_ids, 'orderby' => 'post__in');
            $widget_loop = new WP_Query($args);
            while ($widget_loop->have_posts()) : $widget_loop->the_post(); ?>
                <div class="pages-widget-item mh-col-1-3">
                	<div class="pages-widget-thumb">
                    	<a href="<?php the_permalink(); ?>"><?php if (has_post_thumbnail()) { the_post_thumbnail('pages-widget'); } else { echo '<img src="' . get_template_directory_uri() . '/images/placeholder-pages-widget.jpg' . '" alt="No Picture" />'; } ?></a>
                	</div>
                    <h3 class="pages-widget-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                    <div class="pages-widget-excerpt"><?php the_excerpt(); ?></div>
				</div><?php
             endwhile;
             wp_reset_postdata(); ?>
		</div> <?php
        echo $after_widget;
    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
		$instance['pages'] = strip_tags($new_instance['pages']);
        return $instance;
    }
    function form($instance) {
        $defaults = array('pages' => '');
        $instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
        	<label for="<?php echo $this->get_field_id('pages'); ?>"><?php _e('Filter Pages by ID (comma separated):', 'mh-impact-lite'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['pages']); ?>" name="<?php echo $this->get_field_name('pages'); ?>" id="<?php echo $this->get_field_id('pages'); ?>" />
	    </p>
	    <p>
    		<strong><?php _e('Info:', 'mh-impact-lite'); ?></strong> <?php _e('This is the lite version of this widget with basic features. If you need more professional features and options, you can upgrade to the premium version of this theme.', 'mh-impact-lite'); ?>
    	</p><?php
    }
}
?>