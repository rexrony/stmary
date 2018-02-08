<?php

/***** Theme Info Page *****/

if (!function_exists('mh_impact_lite_theme_info_page')) {
	function mh_impact_lite_theme_info_page() {
		add_theme_page(esc_html__('Welcome to MH Impact lite', 'mh-impact-lite'), esc_html__('Theme Info', 'mh-impact-lite'), 'edit_theme_options', 'impact', 'mh_impact_lite_display_theme_page');
	}
}
add_action('admin_menu', 'mh_impact_lite_theme_info_page');

if (!function_exists('mh_impact_lite_display_theme_page')) {
	function mh_impact_lite_display_theme_page() {
		$theme_data = wp_get_theme(); ?>
		<div class="theme-info-wrap">
			<h1>
				<?php printf(esc_html__('Welcome to %1s %2s', 'mh-impact-lite'), $theme_data->Name, $theme_data->Version); ?>
			</h1>
			<div class="theme-description">
				<?php echo $theme_data->Description; ?>
			</div>
			<hr>
			<div class="theme-links clearfix">
				<p>
					<strong><?php esc_html_e('Important Links:', 'mh-impact-lite'); ?></strong>
					<a href="<?php echo esc_url('http://www.mhthemes.com/themes/mh/impact-lite/'); ?>" target="_blank">
						<?php esc_html_e('Theme Info Page', 'mh-impact-lite'); ?>
					</a>
					<a href="<?php echo esc_url('http://www.mhthemes.com/support/'); ?>" target="_blank">
						<?php esc_html_e('Support Center', 'mh-impact-lite'); ?>
					</a>
					<a href="<?php echo esc_url('https://wordpress.org/support/view/theme-reviews/mh-impact-lite?filter=5'); ?>" target="_blank">
						<?php esc_html_e('Rate this theme', 'mh-impact-lite'); ?>
					</a>
				</p>
			</div>
			<hr>
			<div id="getting-started">
				<h3>
					<?php printf(esc_html__('Getting Started with %s', 'mh-impact-lite'), $theme_data->Name); ?>
				</h3>
				<div class="row clearfix">
					<div class="col-1-2">
						<div class="section">
							<h4>
								<?php esc_html_e('Theme Documentation', 'mh-impact-lite'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('Need any help with configuring %s? The documentation for this theme includes all theme related information that is needed to get your site up and running in no time. In case you have any additional questions, feel free to reach out in the theme support forums on WordPress.org.', 'mh-impact-lite'), $theme_data->Name); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('http://www.mhthemes.com/support/documentation-mh-impact/'); ?>" target="_blank" class="button button-secondary">
									<?php esc_html_e('Visit Documentation', 'mh-impact-lite'); ?>
								</a>
							</p>
						</div>
						<div class="section">
							<h4>
								<?php esc_html_e('Theme Options', 'mh-impact-lite'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('%s supports the Theme Customizer for all theme settings. Click "Customize Theme" to open the Customizer now.',  'mh-impact-lite'), $theme_data->Name); ?>
							</p>
							<p>
								<a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary">
									<?php esc_html_e('Customize Theme', 'mh-impact-lite'); ?>
								</a>
							</p>
						</div>
						<div class="section">
							<h4>
								<?php esc_html_e('MH Impact Pro', 'mh-impact-lite'); ?>
							</h4>
							<p class="about">
								<?php esc_html_e('If you like the free version of this theme, you will LOVE the full version of MH Impact which includes unique custom widgets, additional features and more useful options to customize your website.', 'mh-impact-lite'); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('http://www.mhthemes.com/themes/mh/impact/'); ?>" target="_blank" class="button button-secondary">
									<?php esc_html_e('Learn more about MH Impact', 'mh-impact-lite'); ?>
								</a>
							</p>
						</div>
					</div>
					<div class="col-1-2">
						<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="Theme Screenshot" />
					</div>
				</div>
			</div>
			<hr>
			<div id="theme-author">
				<p><?php printf(esc_html__('%1s is proudly brought to you by %2s. If you like %3s: %4s.', 'mh-impact-lite'),
					$theme_data->Name,
					'<a target="_blank" href="http://www.mhthemes.com/" title="MH Themes">MH Themes</a>',
					$theme_data->Name,
					'<a target="_blank" href="https://wordpress.org/support/view/theme-reviews/mh-impact-lite?filter=5" title="MH Impact lite Review">' . esc_html__('Rate this theme', 'mh-impact-lite') . '</a>'); ?>
				</p>
			</div>
		</div> <?php
	}
}

?>