<?php if(!defined('ABSPATH')) die('Direct access denied.'); ?>

<div class="wrap">
	<?php echo $screen_icon; ?>
	<h2><?php echo $page_title; ?></h2>
	<div class="intro">
		<p><?php _e('Play with these settings if Cyclone Slider is not working or if you want to optimize it.', $textdomain); ?></p>
	</div>
	<?php settings_errors();?>
	<?php echo $debug; ?>
	<form method="post" action="options.php">
		<?php
		echo $settings_fields;
		?>
		<table class="form-table">
			<tr>
				<th><label for="cs2-settings-load_scripts_in"><?php _e('Load scripts in:', $textdomain); ?></label></th>
				<td>
					<select name="<?php echo esc_attr( $option_name."[load_scripts_in]" ); ?>" id="cs2-settings-load_scripts_in">
						<option value="header" <?php selected($settings_data['load_scripts_in'], 'header'); ?>><?php _e('Header', $textdomain); ?></option>
						<option value="footer" <?php selected($settings_data['load_scripts_in'], 'footer'); ?>><?php _e('Footer', $textdomain); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<th><label for=""><?php _e('Load these scripts:', $textdomain); ?></label></th>
				<td>
					<label for="cs2-settings-load_cycle2">
						<input type="hidden" name="<?php echo esc_attr( $option_name."[load_cycle2]" ); ?>" value="0">
						<input type="checkbox" id="cs2-settings-load_cycle2" name="<?php echo esc_attr( $option_name."[load_cycle2]" ); ?>" value="1" <?php checked($settings_data['load_cycle2'], 1); ?> />
						<span><em><?php _e('Cycle 2. This is the core script needed by the plugin.', $textdomain); ?></em></span>
					</label> <br />
					<label for="cs2-settings-load_cycle2_carousel">
						<input type="hidden" name="<?php echo esc_attr( $option_name."[load_cycle2_carousel]" ); ?>" value="0">
						<input type="checkbox" id="cs2-settings-load_cycle2_carousel" name="<?php echo esc_attr( $option_name."[load_cycle2_carousel]" ); ?>" value="1" <?php checked($settings_data['load_cycle2_carousel'], 1); ?> />
						<span><em><?php _e('Cycle 2 - Carousel. Used by these templates: Galleria, Lea, Dos.', $textdomain); ?></em></span>
					</label> <br />
					<label for="cs2-settings-load_cycle2_swipe">
						<input type="hidden" name="<?php echo esc_attr( $option_name."[load_cycle2_swipe]" ); ?>" value="0">
						<input type="checkbox" id="cs2-settings-load_cycle2_swipe" name="<?php echo esc_attr( $option_name."[load_cycle2_swipe]" ); ?>" value="1" <?php checked($settings_data['load_cycle2_swipe'], 1); ?> />
						<span><em><?php _e('Cycle 2 - Swipe. For touch swipe events.', $textdomain); ?></em></span>
					</label> <br />
					<label for="cs2-settings-load_cycle2_tile">
						<input type="hidden" name="<?php echo esc_attr( $option_name."[load_cycle2_tile]" ); ?>" value="0">
						<input type="checkbox" id="cs2-settings-load_cycle2_tile" name="<?php echo esc_attr( $option_name."[load_cycle2_tile]" ); ?>" value="1" <?php checked($settings_data['load_cycle2_tile'], 1); ?> />
						<span><em><?php _e('Cycle 2 - Tile. Used for tile transition effects.', $textdomain); ?></em></span>
					</label> <br />
					<label for="cs2-settings-load_cycle2_video">
						<input type="hidden" name="<?php echo esc_attr( $option_name."[load_cycle2_video]" ); ?>" value="0">
						<input type="checkbox" id="cs2-settings-load_cycle2_video" name="<?php echo esc_attr( $option_name."[load_cycle2_video]" ); ?>" value="1" <?php checked($settings_data['load_cycle2_video'], 1); ?> />
						<span><em><?php _e('Cycle 2 - Video. Used by YouTube template.', $textdomain); ?></em></span>
					</label> <br />
					<label for="cs2-settings-load_magnific">
						<input type="hidden" name="<?php echo esc_attr( $option_name."[load_magnific]" ); ?>" value="0">
						<input type="checkbox" id="cs2-settings-load_magnific" name="<?php echo esc_attr( $option_name."[load_magnific]" ); ?>" disabled value="1" <?php checked($settings_data['load_magnific'], 1); ?> />
						<span class="cs2-disabled"><em><?php _e('Magnific Popup - Enable lightbox option.', $textdomain); ?></em></span> <a href="http://www.codefleet.net/cyclone-slider-pro/"><?php _e('Available in pro version.', $textdomain); ?></a>
					</label> <br />
					<label for="cs2-settings-load_easing">
						<input type="hidden" name="<?php echo esc_attr( $option_name."[load_easing]" ); ?>" value="0">
						<input type="checkbox" id="cs2-settings-load_easing" name="<?php echo esc_attr( $option_name."[load_easing]" ); ?>" disabled value="1" <?php checked($settings_data['load_easing'], 1); ?> />
						<span class="cs2-disabled"><em><?php _e('Easing - Enable easing options.', $textdomain); ?></em></span> <a href="http://www.codefleet.net/cyclone-slider-pro/"><?php _e('Available in pro version.', $textdomain); ?></a>
					</label> <br />
				</td>
			</tr>
			<tr>
				<th><label for="cs2-settings-script_priority"><?php _e('Scripts loading priority:', $textdomain); ?></label></th>
				<td>
					<input type="number" id="<?php echo esc_attr( 'script_priority' ); ?>" name="<?php echo esc_attr( $option_name."[script_priority]" ); ?>" value="<?php echo esc_attr( $settings_data['script_priority'] ); ?>" />
					<em><?php _e('Make this value bigger to load scripts last.', $textdomain); ?></em>
				</td>
			</tr>
			<tr>
				<th><label for=""><?php _e('Load these templates:', $textdomain); ?></label></th>
				<td>
					<?php foreach($templates as $name=>$template): ?>
					<label for="cs2-settings-load_templates-<?php echo esc_attr( $name ); ?>">
						<input type="hidden" name="<?php echo esc_attr( $option_name."[load_templates][$name]" ); ?>" value="0">
						<input type="checkbox" id="cs2-settings-load_templates-<?php echo esc_attr( $name ); ?>" name="<?php echo esc_attr( $option_name."[load_templates][$name]" ); ?>" value="1" <?php checked(@$settings_data['load_templates'][$name], 1); ?> />
						<span><em><?php echo esc_attr( ucwords($name) ); ?></em></span>
					</label> <br />
					<?php endforeach; ?>
				</td>
			</tr>
		</table>
		<br /><br />
		<?php submit_button( __('Save Options', $textdomain), 'primary', 'submit', false) ?>
		<?php submit_button( __('Restore Defaults', $textdomain), 'secondary', 'reset', false) ?>
	</form>
	
</div>