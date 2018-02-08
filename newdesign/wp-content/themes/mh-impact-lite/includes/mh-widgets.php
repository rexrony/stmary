<?php

/***** Register Widgets *****/

function mh_impact_lite_register_widgets() {
	register_widget('mh_impact_lite_action_widget');
	register_widget('mh_impact_lite_pages_widget');
	register_widget('mh_impact_lite_recent_posts');
	register_widget('mh_impact_lite_slider_widget');
}
add_action('widgets_init', 'mh_impact_lite_register_widgets');

/***** Include Widgets *****/

require_once('widgets/mh-action.php');
require_once('widgets/mh-pages.php');
require_once('widgets/mh-recent-posts.php');
require_once('widgets/mh-slider.php');

?>