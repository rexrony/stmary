<?php

function mh_impact_lite_customize_register($wp_customize) {

	/***** Register Custom Controls *****/

	class MH_Impact_Lite_Upgrade extends WP_Customize_Control {
        public function render_content() {  ?>
        	<p class="mh-upgrade-thumb">
        		<img src="<?php echo get_template_directory_uri(); ?>/images/mh_impact.png" />
        	</p>
        	<p class="customize-control-title mh-upgrade-title">
        		<?php esc_html_e('MH Impact Pro', 'mh-impact-lite'); ?>
        	</p>
        	<p class="textfield mh-upgrade-text">
        		<?php esc_html_e('If you like the free version of this theme, you will LOVE the full version of MH Impact which includes unique custom widgets, additional features and more useful options to customize your website.', 'mh-impact-lite'); ?>
			</p>
			<p class="customize-control-title mh-upgrade-title">
        		<?php esc_html_e('Additional Features:', 'mh-impact-lite'); ?>
        	</p>
        	<ul class="mh-upgrade-features">
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Options to modify color scheme', 'mh-impact-lite'); ?>
	        	</li>
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Typography options', 'mh-impact-lite'); ?>
	        	</li>
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Additional custom widgets', 'mh-impact-lite'); ?>
	        	</li>
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Social buttons, and more...', 'mh-impact-lite'); ?>
	        	</li>
        	</ul>
			<p class="mh-upgrade-button">
				<a href="http://www.mhthemes.com/themes/mh/impact/" target="_blank" class="button button-secondary">
					<?php esc_html_e('Learn more about MH Impact', 'mh-impact-lite'); ?>
				</a>
			</p><?php
        }
    }

	/***** Add Panels *****/

	$wp_customize->add_panel('mh_theme_options', array('title' => esc_html__('Theme Options', 'mh-impact-lite'), 'description' => '', 'capability' => 'edit_theme_options', 'theme_supports' => '', 'priority' => 1,));

	/***** Add Sections *****/

	$wp_customize->add_section('mh_impact_lite_general', array('title' => esc_html__('General', 'mh-impact-lite'), 'priority' => 1, 'panel' => 'mh_theme_options'));
	$wp_customize->add_section('mh_impact_lite_upgrade', array('title' => esc_html__('More Features', 'mh-impact-lite'), 'priority' => 2, 'panel' => 'mh_theme_options'));

    /***** Add Settings *****/

    $wp_customize->add_setting('mh_impact_lite_options[excerpt_length]', array('default' => 45, 'type' => 'option', 'sanitize_callback' => 'mh_impact_lite_sanitize_integer'));
    $wp_customize->add_setting('mh_impact_lite_options[excerpt_more]', array('default' => esc_html__('[Read More]', 'mh-impact-lite'), 'type' => 'option', 'sanitize_callback' => 'mh_impact_lite_sanitize_text'));
	$wp_customize->add_setting('mh_impact_lite_options[sidebar]', array('default' => 'right', 'type' => 'option', 'sanitize_callback' => 'mh_impact_lite_sanitize_select'));
	$wp_customize->add_setting('mh_impact_lite_options[premium_version_upgrade]', array('default' => '', 'type' => 'option', 'sanitize_callback' => 'esc_attr'));

    /***** Add Controls *****/

    $wp_customize->add_control('excerpt_length', array('label' => esc_html__('Custom Excerpt Length in Words', 'mh-impact-lite'), 'section' => 'mh_impact_lite_general', 'settings' => 'mh_impact_lite_options[excerpt_length]', 'priority' => 1, 'type' => 'text'));
    $wp_customize->add_control('excerpt_more', array('label' => esc_html__('Custom Excerpt More-Text', 'mh-impact-lite'), 'section' => 'mh_impact_lite_general', 'settings' => 'mh_impact_lite_options[excerpt_more]', 'priority' => 2, 'type' => 'text'));
	$wp_customize->add_control('sidebar', array('label' => esc_html__('Sidebar', 'mh-impact-lite'), 'section' => 'mh_impact_lite_general', 'settings' => 'mh_impact_lite_options[sidebar]', 'priority' => 3, 'type' => 'select', 'choices' => array('right' => esc_html__('Right Sidebar', 'mh-impact-lite'), 'left' => esc_html__('Left Sidebar', 'mh-impact-lite'))));
	$wp_customize->add_control(new MH_Impact_Lite_Upgrade($wp_customize, 'premium_version_upgrade', array('section' => 'mh_impact_lite_upgrade', 'settings' => 'mh_impact_lite_options[premium_version_upgrade]', 'priority' => 1)));

}
add_action('customize_register', 'mh_impact_lite_customize_register');

/***** Data Sanitization *****/

function mh_impact_lite_sanitize_text($input) {
    return wp_kses_post(force_balance_tags($input));
}
function mh_impact_lite_sanitize_integer($input) {
    return strip_tags(intval($input));
}
function mh_impact_lite_sanitize_checkbox($input) {
    if ($input == 1) {
        return 1;
    } else {
        return '';
    }
}
function mh_impact_lite_sanitize_select($input) {
    $valid = array(
        'right' => esc_html__('Right Sidebar', 'mh-impact-lite'),
        'left' => esc_html__('Left Sidebar', 'mh-impact-lite')
    );
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

/***** Return Theme Options / Set Default Options *****/

if (!function_exists('mh_impact_lite_theme_options')) {
	function mh_impact_lite_theme_options() {
		$theme_options = wp_parse_args(
			get_option('mh_impact_lite_options', array()),
			mh_impact_lite_default_options()
		);
		return $theme_options;
	}
}

if (!function_exists('mh_impact_lite_default_options')) {
	function mh_impact_lite_default_options() {
		$default_options = array(
			'excerpt_length' => 45,
			'excerpt_more' => esc_html__('[Read More]', 'mh-impact-lite'),
			'sidebar' => 'right'
		);
		return $default_options;
	}
}

/***** Enqueue Customizer CSS *****/

function mh_impact_lite_customizer_css() {
	wp_enqueue_style('mh-customizer', get_template_directory_uri() . '/admin/customizer.css', array());
}
add_action('customize_controls_print_styles', 'mh_impact_lite_customizer_css');

/***** Enqueue Customizer JS *****/

function mh_impact_lite_customizer_js() {
	wp_enqueue_script('mh-customizer', get_template_directory_uri() . '/js/mh-customizer.js', array(), '1.0.0', true);
	wp_localize_script('mh-customizer', 'mh_impact_lite_links', array(
		'upgradeURL' => esc_url('http://www.mhthemes.com/themes/mh/impact/'),
		'upgradeLabel' => esc_html__('Upgrade to MH Impact Pro', 'mh-impact-lite'),
		'title'	=> esc_html__('Theme Related Links:', 'mh-impact-lite'),
		'themeURL' => esc_url('http://www.mhthemes.com/themes/mh/impact-lite/'),
		'themeLabel' => esc_html__('Theme Info Page', 'mh-impact-lite'),
		'docsURL' => esc_url('http://www.mhthemes.com/support/documentation-mh-impact/'),
		'docsLabel'	=> esc_html__('Theme Documentation', 'mh-impact-lite'),
		'supportURL' => esc_url('https://wordpress.org/support/theme/mh-impact-lite'),
		'supportLabel' => esc_html__('Support Forum', 'mh-impact-lite'),
		'rateURL' => esc_url('https://wordpress.org/support/view/theme-reviews/mh-impact-lite?filter=5'),
		'rateLabel'	=> esc_html__('Rate this theme', 'mh-impact-lite'),
	));
}
add_action('customize_controls_enqueue_scripts', 'mh_impact_lite_customizer_js');

?>