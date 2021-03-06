<?php
/**
 * Class for saving and getting slider data  
 */
class CycloneSlider_Data {
    
    protected $nonce_name;
    protected $nonce_action;
    protected $image_resizer;
    protected $template_locations;
    protected $settings_page_properties;
    
    public function __construct( $nonce_name, $nonce_action, $image_resizer, $template_locations, $settings_page_properties ){
        $this->nonce_name = $nonce_name;
		$this->nonce_action = $nonce_action;
		$this->image_resizer = $image_resizer;
		$this->template_locations = $template_locations;
        $this->settings_page_properties = $settings_page_properties;
    }
    
    public function run(){
        global $wp_version;
		
		// Save slides. Use better hook if available
		if ( version_compare( $wp_version, '3.7', '>=' ) ) {
			add_action( 'save_post_cycloneslider', array( $this, 'save_slider_post' ) );
		} else {
			add_action( 'save_post', array( $this, 'save_slider_post' ) );
		}
        
        
    }
    
    /**
     * Save post hook
     */
    public function save_slider_post( $post_id ){
        global $cyclone_slider_saved_done;
        
        // Stop! We have already saved..
        if($cyclone_slider_saved_done){
            return $post_id;
        }
        
        // Verify nonce
        $nonce_name = $this->nonce_name;
        if (!empty($_POST[$nonce_name])) {
            if (!wp_verify_nonce($_POST[$nonce_name], $this->nonce_action)) {
                return $post_id;
            }
        } else {
            return $post_id; // Make sure we cancel on missing nonce!
        }
        
        // Check autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }
        
        // Assign POST data with array key checks
        $slides = isset($_POST['cycloneslider_metas']) ? $_POST['cycloneslider_metas'] : array();
        $slider_settings = isset($_POST['cycloneslider_settings']) ? $_POST['cycloneslider_settings'] : array();
        
        // Resize images
        $this->image_resizer->resize_images( $slider_settings, $slides );
        
        // Save slides
        $this->add_slider_slides( $post_id, $slides );
        
        // Save slider settings
        $this->add_slider_settings( $post_id, $slider_settings);
        
        // Marked as done
        $cyclone_slider_saved_done = true;
    }
    
    /**
     * API to add slider
     */
    public function add_slider( $post_title, $slider_settings, $slides ){
        
        $post_data = array(
            'post_type' => 'cycloneslider',
            'post_title' => $post_title,
            'post_content' => '',
            'post_status' => 'publish'
        );

        if( $slider_id = wp_insert_post( $post_data ) ){
            
            // Resize images if needed
            if( $slider_settings['resize'] == 1){
				
                $this->image_resizer->resize_images( $slider_settings, $slides );
            }
            
            // Save slides
            $this->add_slider_slides( $slider_id, $slides );
            
            // Save slider settings
            $this->add_slider_settings( $slider_id, $slider_settings );
			
        }
    }
    
    /**
     * Add Slide Settings
     * 
     * API to add slider settings to slider post meta
     *
     * @param int $slider_id Slider post ID
     * @param array $settings Slider settings array
     * @return void
     */
    public function add_slider_settings( $slider_id, $settings ){
        $settings = wp_parse_args(
            $settings,
            $this->get_slider_defaults()
        );
        
        $settings_to_save['template'] = sanitize_text_field( $settings['template'] );
        $settings_to_save['fx'] = sanitize_text_field( $settings['fx'] );
        $settings_to_save['timeout'] = (int) ( $settings['timeout'] );
        $settings_to_save['speed'] = (int) ( $settings['speed'] );
        $settings_to_save['width'] = (int) ( $settings['width'] );
        $settings_to_save['height'] = (int) ( $settings['height'] );
        $settings_to_save['hover_pause'] = sanitize_text_field( $settings['hover_pause'] );
        $settings_to_save['show_prev_next'] = (int) ( $settings['show_prev_next'] );
        $settings_to_save['show_nav'] = (int) ( $settings['show_nav'] );
        $settings_to_save['tile_count'] = (int) ( $settings['tile_count'] );
        $settings_to_save['tile_delay'] = (int) ( $settings['tile_delay'] );
        $settings_to_save['tile_vertical'] = sanitize_text_field( $settings['tile_vertical'] );
        $settings_to_save['random'] = (int) ( $settings['random'] );
        $settings_to_save['resize'] = (int) ( $settings['resize'] );
        $settings_to_save['width_management'] = sanitize_text_field( $settings['width_management'] );
        $settings_to_save['easing'] = sanitize_text_field( $settings['easing'] );
        $settings_to_save['resize_option'] = sanitize_text_field( $settings['resize_option'] );
        $settings_to_save['allow_wrap'] = sanitize_text_field( $settings['allow_wrap'] );
        $settings_to_save['dynamic_height'] = sanitize_text_field( $settings['dynamic_height'] );
        $settings_to_save['delay'] = (int) ( $settings['delay'] );
        $settings_to_save['swipe'] = sanitize_text_field( $settings['swipe'] );
        
        $settings_to_save = apply_filters('cycloneslider_settings', $settings_to_save, $slider_id); // Apply filters before saving
        
        delete_post_meta($slider_id, '_cycloneslider_settings');
        update_post_meta($slider_id, '_cycloneslider_settings', $settings_to_save);
    }
    
    /**
     * Add Slider Slides
     * 
     * API to add slides 
     *
     * @param int $slider_id Slider post ID
     * @param array $slides Slides array
     * @return void
     */
    public function add_slider_slides( $slider_id, $slides ){
        
        $slides_to_save = array();
        
        if( is_array($slides) ){

            $i=0;//always start from 0
            foreach($slides as $slide){
                $slide = wp_parse_args(
                    $slide,
                    $this->get_slide_defaults()
                );
                $slides_to_save[$i]['id'] = (int) ($slide['id']);
                $slides_to_save[$i]['type'] = sanitize_text_field($slide['type']);
                $slides_to_save[$i]['hidden'] = (int) ($slide['hidden']);
                
                $slides_to_save[$i]['link'] = esc_url_raw($slide['link']);
                $slides_to_save[$i]['title'] = wp_kses_post($slide['title']);
                $slides_to_save[$i]['description'] = wp_kses_post($slide['description']);
                $slides_to_save[$i]['link_target'] = sanitize_text_field($slide['link_target']);
                
                $slides_to_save[$i]['img_alt'] = sanitize_text_field($slide['img_alt']);
                $slides_to_save[$i]['img_title'] = sanitize_text_field($slide['img_title']);
                
                $slides_to_save[$i]['enable_slide_effects'] = (int) ($slide['enable_slide_effects']);
                $slides_to_save[$i]['fx'] = sanitize_text_field($slide['fx']);
                $slides_to_save[$i]['speed'] = sanitize_text_field($slide['speed']);
                $slides_to_save[$i]['timeout'] = sanitize_text_field($slide['timeout']);
                $slides_to_save[$i]['tile_count'] = sanitize_text_field($slide['tile_count']);
                $slides_to_save[$i]['tile_delay'] = sanitize_text_field($slide['tile_delay']);
                $slides_to_save[$i]['tile_vertical'] = sanitize_text_field($slide['tile_vertical']);
                
                $slides_to_save[$i]['video_thumb'] = esc_url_raw($slide['video_thumb']);
                $slides_to_save[$i]['video_url'] = esc_url_raw($slide['video_url']);
                $slides_to_save[$i]['video'] = $slide['video'];
                
                $slides_to_save[$i]['custom'] = $slide['custom'];
                
                $slides_to_save[$i]['youtube_url'] = esc_url_raw($slide['youtube_url']);
                $slides_to_save[$i]['youtube_related'] = sanitize_text_field($slide['youtube_related']);
                
                $slides_to_save[$i]['vimeo_url'] = esc_url_raw($slide['vimeo_url']);
                
                $slides_to_save[$i]['testimonial'] = wp_kses_post($slide['testimonial']);
                $slides_to_save[$i]['testimonial_author'] = sanitize_text_field($slide['testimonial_author']);
                $slides_to_save[$i]['testimonial_link'] = esc_url_raw($slide['testimonial_link']);
                $slides_to_save[$i]['testimonial_link_target'] = sanitize_text_field($slide['testimonial_link_target']);
            
                $i++;
            }
            
        }
        $slides_to_save = apply_filters('cycloneslider_slides', $slides_to_save); //do filter before saving
        
        delete_post_meta($slider_id, '_cycloneslider_metas');
        update_post_meta($slider_id, '_cycloneslider_metas', $slides_to_save);
    }
    
    
    
    public function get_thumb_name( $image_file, $width, $height ){
        
        // Get image path info and create file name
        $info = pathinfo( $image_file ); // Eg: d:/uploads/image-1.jpg
        if( !isset($info['extension']) or !isset($info['filename'])){
            return false;
        }

        $ext = $info['extension']; // File extension Eg. "jpg"
        $filename = $info['filename']; // Filename Eg. "image-1"
        return "{$filename}-{$width}x{$height}.{$ext}"; // Thumbname. Eg. "image-1-600x300.jpg"
        
    }
    
    /**
    * Get Sliders
    *
    * Get all sliders and their accompanying meta data
    * 
    * @return array|false The array of sliders post and their meta data or false on fail
    */
    public function get_sliders( $args=array() ){
        $defaults = array(
            'post_type' => 'cycloneslider',
            'numberposts' => -1 // Get all
        );
        $args = wp_parse_args($args, $defaults);
        
        $slider_posts = get_posts( $args ); // Use get_posts to avoid filters
        $sliders = array(); // Store it here
        if( !empty($slider_posts) and is_array($slider_posts) ){
            foreach($slider_posts as $index=>$slider_post){
                $sliders[$index] = (array) $slider_post;
                $sliders[$index]['slider_settings'] = $this->get_slider_settings( $slider_post->ID );
                $sliders[$index]['slides'] = $this->get_slider_slides( $slider_post->ID );
            }
            return $sliders;
        } else {
            return false;
        }
    }
    
    /**
    * Get Slider Settings
    *
    * Get slider settings by $slider_id
    *
    * @paramt int $slider_id ID of slider post
    * @return array The array of slider settings
    */
    public function get_slider_settings( $slider_id ) {
        $meta = get_post_custom( $slider_id );
        $slider_settings = array();
        if(isset($meta['_cycloneslider_settings'][0]) and !empty($meta['_cycloneslider_settings'][0])){
            $slider_settings = maybe_unserialize($meta['_cycloneslider_settings'][0]);
        }
        $slider_settings = wp_parse_args($slider_settings, $this->get_slider_defaults() );
        return apply_filters('cycloneslider_get_slider_settings', $slider_settings);
    }
    
    /**
    * Get Slider Slides
    *
    * @param int $slider_id Post ID of the slider custom post.
    * @return array The array of slides settings
    */
    public function get_slider_slides( $slider_id ){
        $meta = get_post_custom( $slider_id );
        
        if(isset($meta['_cycloneslider_metas'][0]) and !empty($meta['_cycloneslider_metas'][0])){
            $slides = maybe_unserialize($meta['_cycloneslider_metas'][0]);
            $defaults = $this->get_slide_defaults();
            
            foreach($slides as $i=>$slide){
                $slides[$i] = wp_parse_args($slide, $defaults);
            }
            
            return apply_filters('cycloneslider_get_slider_slides', $slides);
        }
        return false;
    }
    
    /**
     * Get Slider by Slug
     *
     * @param string $slug Post slug of the slider custom post.
     * @return array|false The array of slider post and associated meta or false if none found
     */
    public function get_slider_by_slug( $slug ) {
        // Get slider by id
        $args = array(
            'post_type' => 'cycloneslider',
            'numberposts' => 1,
            'name'=> $slug
        );

        $slider_posts = get_posts( $args ); // Use get_posts to avoid filters

        $sliders = array(); // Store it here
        if( isset($slider_posts[0]) ){
            $slider_post = $slider_posts[0];
            
            $slider = (array) $slider_post;
            $slider['slider_settings'] = $this->get_slider_settings( $slider_post->ID );
            $slider['slides'] = $this->get_slider_slides( $slider_post->ID );
            
            return $slider;
        }
        
        return false;
    }
    
    /**
    * Gets the number of slides of slideshow
    *
    * @param int $slider_id Post ID of slider custom post
    * @return int|0 Total images or zero
    */
    public function get_slide_count( $slider_id ){
        $meta = get_post_custom( $slider_id );
        
        if(isset($meta['_cycloneslider_metas'][0]) and !empty($meta['_cycloneslider_metas'][0])){
            $slides = maybe_unserialize($meta['_cycloneslider_metas'][0]);
            
            return count($slides);
        }
        return 0;
    }
    
    /**
    * Get Slide Image URL. 
    */
    public function get_slide_image_url( $slide_image_id, $slider_settings ){
        $width = $slider_settings['width'];
        $height = $slider_settings['height'];
        
        // Get url to full image, its width and height
        $image_dimensions = wp_get_attachment_image_src($slide_image_id, 'full');
        if(!$image_dimensions){
            return false;
        }
        
        // Assign variables
        list($image_url, $orig_width, $orig_height) = $image_dimensions;
        
        // If orig image width and height is the same as slideshow width and height, do not resize and return url
        if($orig_width == $width and $orig_height == $height){
            return $image_url;
        }
        
        //If resize is no, return url
        if( isset( $slider_settings['resize'] ) and $slider_settings['resize'] == 0 ){
            return $image_url;
        }
        
        // Get full path to the slide image
        $image_file = get_attached_file($slide_image_id);
        if(empty($image_file)){
            return false;
        }
        
        $thumb_name = $this->get_thumb_name( $image_file, $width, $height );
        $thumb_url = dirname($image_url).'/'.$thumb_name; // URL to thumbnail
        
        return $thumb_url; 
    }
    
    /**
    * Get Slide Thumbnail URL. 
    */
    public function get_slide_thumbnail_url( $slide_image_id, $width, $height, $resize){
        
        // Get url to full image, its width and height
        $image_dimensions = wp_get_attachment_image_src($slide_image_id, 'full');
        if(!$image_dimensions){
            return false;
        }
        
        // Assign variables
        list($image_url, $orig_width, $orig_height) = $image_dimensions;
        
        // If orig image width and height is the same as width and height, do not resize and return url
        if($orig_width == $width and $orig_height == $height){
            return $image_url;
        }
        
        //If resize is no, return url
        if( $resize == 0 ){
            return $image_url;
        }
        
        // Get full path to the slide image
        $image_file = get_attached_file($slide_image_id);
        if(empty($image_file)){
            return false;
        }
        
        $thumb_name = $this->get_thumb_name( $image_file, $width, $height );
        $thumb_url = dirname($image_url).'/'.$thumb_name; // URL to thumbnail
        
        return $thumb_url; 
    }
    
    /**
     * Get View File
     *
     * Get slider view file from theme or plugin or wp-content location
     *
     * @param string $template_name Name of slider template
     * @return string|false Slider view filepath or false
     */
    public function get_view_file( $template_name ){
        
        $template_locations = $this->template_locations;
        $template_locations = array_reverse($template_locations); // Last added template locations are checked first
        foreach($template_locations as $template_location){
            $view_file = $template_location['path']."{$template_name}/slider.php";
            if(@is_file($view_file)){
                return $view_file;
            }
        }

        return false;
    }
    
    /**
	 * Get all templates in array format
	 */
	public function get_all_templates(){
		if(is_array($this->template_locations) and !empty($this->template_locations)){
			$template_folders = array();
			foreach($this->template_locations as $location){
				if( is_dir($location['path']) ) {
					if($files = scandir($location['path'])){
						$c = 0;
						foreach($files as $name){
							if($name!='.' and $name!='..' and is_dir($location['path'].$name) and @file_exists($location['path'].$name.DIRECTORY_SEPARATOR.'slider.php') ){ // Check if its a directory
								$supported_slide_types = array('image');// Default
								if ( $config = $this->parse_config_json( $location['path'].$name.DIRECTORY_SEPARATOR.'config.json' ) ) {
									$supported_slide_types = $config->slide_types;
								} else if ( @file_exists($location['path'].$name.DIRECTORY_SEPARATOR.'config.txt') ) { // Older templates use ini format
									$ini_array = parse_ini_file($location['path'].$name.DIRECTORY_SEPARATOR.'config.txt'); //Parse ini to get slide types supported
									if($ini_array){
										$supported_slide_types = $ini_array['slide_type'];
									}
								}
								
								$name = sanitize_title($name);// Change space to dash and all lowercase
								$template_folders[$name] = array( // Here we override template of the same names. If there is a template with the same name in plugin and theme directory, the one in theme will take over
									'path'=>$location['path'].$name,
									'url'=>$location['url'].$name,
									'supports' => $supported_slide_types,
									'location_name' => $location['location_name']
								);
							}
						}
					}
				}
			}			
			return $template_folders;
		}
	}
    
    /**
	 * Get Active Templates
	 *
	 * Get templates that are enabled in settings page
	 *
	 * @param array $settings_data Settings page data
	 * @param array $templates List of all templates
	 * @return array Template locations
	 */
	public function get_enabled_templates( $settings_data, $templates ){
		
		foreach($templates as $name=>$template){
			if( !isset($settings_data['load_templates'][$name]) ){
				$settings_data['load_templates'][$name] = 1;
			}
		}
		return $settings_data['load_templates'];
	}
    
    /**
	 * Get template config data from file
	 *
	 * @param string $file Full path to config file
	 * @return object $config_data or false on fail
	 */
	protected function parse_config_json( $file ){
		if( @file_exists($file) ){
			$config = file_get_contents($file); //Get template info
			if($config){
				$config_data = json_decode($config);
				if($config_data){
					return $config_data;
				}
			}
		}
		return false;
	}
    
    /**
	* Get settings data. If there is no data from database, use default values
	*/
	public function get_settings_page_data(){
		return get_option( $this->settings_page_properties['option_name'], $this->get_default_settings_page_data() );
	}
    
    /**
	* Apply default values
	*/
	public function get_default_settings_page_data() {
		$defaults = array();
		$defaults['load_scripts_in'] = 'footer';
		
		$defaults['load_cycle2'] = 1;
		$defaults['load_cycle2_carousel'] = 1;
		$defaults['load_cycle2_swipe'] = 1;
		$defaults['load_cycle2_tile'] = 1;
		$defaults['load_cycle2_video'] = 1;

		$defaults['load_easing'] = 0;
		
		$defaults['load_magnific'] = 0;
		
		$defaults['load_templates'] = array();
		
		$defaults['script_priority'] = 100;
		
		$defaults['license_id'] = '';
		$defaults['license_key'] = '';
		
		return $defaults;
	}
    
    /**
    * Cyclone Slide Settings
    *
    * Prints out cycle2 per slide settings as data attributes
    *
    *
    * @param array $slider_meta Slide settings array.
    * @param array $slider_settings Slider settings array.
    * @param string $slider_id HTML ID of slideshow.
    * @param int $slider_count Current slideshow count.
    * @return string Data attributes for slide.
    */
    public function slide_data_attributes($slider_meta, $slider_settings=array()){
        $cycle2_settings = array();
        if(!empty($slider_meta['enable_slide_effects'])){
            $cycle2_settings['data-cycle-fx'] = $slider_meta['fx'];
            
            if(!empty($slider_meta['speed'])) {
                $cycle2_settings['data-cycle-speed'] = $slider_meta['speed'];
            }
            if(!empty($slider_meta['timeout'])) {
                $cycle2_settings['data-cycle-timeout'] = $slider_meta['timeout'];
            }
            if($slider_meta['fx']=='tileBlind' or $slider_meta['fx']=='tileSlide'){
                if(!empty($slider_meta['tile_count'])) {
                    $cycle2_settings['data-cycle-tile-count'] = $slider_meta['tile_count'];
                }
                if(!empty($slider_meta['tile_delay'])) {
                    $cycle2_settings['data-cycle-tile-delay'] = $slider_meta['tile_delay'];
                }
                $cycle2_settings['data-cycle-tile-vertical'] = $slider_meta['tile_vertical'];
            }
            
        }
        $cycle2_settings = apply_filters('cyclone_cycle2_slide_settings_array', $cycle2_settings, $slider_meta, $slider_settings);
        
        $out = '';
        foreach($cycle2_settings as $data_attr=>$value){ //Array to html string
            $out .= ' '.$data_attr.'="'.esc_attr($value).'" ';
        }
        return $out;
    }

    /**
     * Trim White Spaces
     *
     */
    public function trim_white_spaces($buffer, $off=false){
        if($off){
            return $buffer;
        }
        $search = array(
            '/\>[^\S ]+/s', //strip whitespaces after tags, except space
            '/[^\S ]+\</s', //strip whitespaces before tags, except space
            '/(\s)+/s'  // shorten multiple whitespace sequences
        );
        $replace = array(
            '>',
            '<',
            '\\1'
        );
        return preg_replace($search, $replace, $buffer);
    }
    
    
    /*
     * Combine admin and shortcode settings
     */
    public function combine_slider_settings($admin_settings, $shortcode_settings ){
        // Use shortcode settings if present and override admin settings
        if( null !== $shortcode_settings['fx'] ){
            $admin_settings['fx'] = $shortcode_settings['fx'];
        }
        if( null !== $shortcode_settings['timeout'] ){
            $admin_settings['timeout'] = $shortcode_settings['timeout'];
        }
        if( null !== $shortcode_settings['speed'] ){
            $admin_settings['speed'] = $shortcode_settings['speed'];
        }
        if( null !== $shortcode_settings['width'] ){
            $admin_settings['width'] = $shortcode_settings['width'];
        }
        if( null !== $shortcode_settings['height'] ){
            $admin_settings['height'] = $shortcode_settings['height'];
        }
        if( null !== $shortcode_settings['hover_pause'] ){
            $admin_settings['hover_pause'] = $shortcode_settings['hover_pause'];
        }
        if( null !== $shortcode_settings['show_prev_next'] ){
            $admin_settings['show_prev_next'] = $shortcode_settings['show_prev_next'];
        }
        if( null !== $shortcode_settings['show_nav'] ){
            $admin_settings['show_nav'] = $shortcode_settings['show_nav'];
        }
        if( null !== $shortcode_settings['tile_count'] ){
            $admin_settings['tile_count'] = $shortcode_settings['tile_count'];
        }
        if( null !== $shortcode_settings['tile_delay'] ){
            $admin_settings['tile_delay'] = $shortcode_settings['tile_delay'];
        }
        if( null !== $shortcode_settings['tile_vertical'] ){
            $admin_settings['tile_vertical'] = $shortcode_settings['tile_vertical'];
        }
        if( null !== $shortcode_settings['random'] ){
            $admin_settings['random'] = $shortcode_settings['random'];
        }
        if( null !== $shortcode_settings['resize'] ){
            $admin_settings['resize'] = $shortcode_settings['resize'];
        }
        if( null !== $shortcode_settings['resize_option'] ){
            $admin_settings['resize_option'] = $shortcode_settings['resize_option'];
        }
        if( null !== $shortcode_settings['easing'] ){
            $admin_settings['easing'] = $shortcode_settings['easing'];
        }
        if( null !== $shortcode_settings['allow_wrap'] ){
            $admin_settings['allow_wrap'] = $shortcode_settings['allow_wrap'];
        }
        if( null !== $shortcode_settings['dynamic_height'] ){
            $admin_settings['dynamic_height'] = $shortcode_settings['dynamic_height'];
        }
        if( null !== $shortcode_settings['delay'] ){
            $admin_settings['delay'] = $shortcode_settings['delay'];
        }
        if( null !== $shortcode_settings['swipe'] ){
            $admin_settings['swipe'] = $shortcode_settings['swipe'];
        }
        if( null !== $shortcode_settings['width_management'] ){
            $admin_settings['width_management'] = $shortcode_settings['width_management'];
        }
        return $admin_settings;
    }
    
    /**
    * Gets the slider default settings. 
    *
    * @return array The array of slider defaults
    */
    public function get_slider_defaults(){
        return array(
            'template' => 'standard',
            'fx' => 'fade',
            'timeout' => '4000',
            'speed' => '1000',
            'width' => '960',
            'height' => '600',
            'hover_pause' => 'true',
            'show_prev_next' => '1',
            'show_nav' => '1',
            'tile_count' => '7',
            'tile_delay' => '100',
            'tile_vertical' => 'true',
            'random' => 0,
            'resize' => 1,
            'width_management' => 'responsive',
            'resize_option' => 'auto',
            'easing' => '',
            'allow_wrap' => 'true',
            'dynamic_height' => 'off',
            'delay' => 0,
            'swipe' => 'false'
        );
    }
    
    /**
    * Gets the slide default settings. 
    *
    * @return array The array of slide defaults
    */
    public function get_slide_defaults(){
        return array(
            'enable_slide_effects'=>0,
            'type' => 'image',
            'hidden' => 0,
            'id' => '',
            'link' => '',
            'title' => '',
            'description' => '',
            'link_target' => '_self',
            'fx' => 'default',
            'speed' => '',
            'timeout' => '',
            'tile_count' => '7',
            'tile_delay' => '100',
            'tile_vertical' => 'true',
            'img_alt' => '',
            'img_title' => '',
            
            'video_thumb' => '',
            'video_url' => '',
            'video' => '',
            
            'custom' => '',
            
            'youtube_url' => '',
            'youtube_related' => 'false',
            
            'vimeo_url' => '',
            
            'testimonial' => '',
            'testimonial_author' => '',
            'testimonial_link' => '',
            'testimonial_link_target' => '_self'
        );
    }
    
    /**
    * Get Resize Options
    *
    * @return array The array of resize options in a key-value pair
    */
    public function get_resize_options(){
        return array(
            'auto' => 'Auto',
            'crop' => 'Crop',
            'exact' => 'Exact',
            'landscape' => 'Landscape',
            'portrait' => 'Portrait'
        );
    }
    
    /**
    * Gets the slide effects. 
    *
    * @return array The array of supported slide effects
    */
    public function get_slide_effects(){
        return array(
            'fade'=>'Fade',
            'fadeout'=>'Fade Out',
            'none'=>'None',
            'scrollHorz'=>'Scroll Horizontally',
            'tileBlind'=>'Tile Blind',
            'tileSlide'=>'Tile Slide'
        );
    }
    
    /**
     * Get array of jquery easing options
     *
     * @return array Easing options
     */
    public function get_jquery_easing_options(){
        return array(
            array(
                'text' => 'Default',
                'value' => ''
            ),
            array(
                'text' => 'Swing',
                'value' => 'swing'
            ),
            array(
                'text' => 'Ease-In Quad',
                'value' => 'easeInQuad'
            ),
            array(
                'text' => 'Ease-Out Quad',
                'value' => 'easeOutQuad'
            ),
            array(
                'text' => 'Ease-In OutQuad',
                'value' => 'easeInOutQuad'
            ),
            array(
                'text' => 'Ease-In Cubic',
                'value' => 'easeInCubic'
            ),
            array(
                'text' => 'Ease-Out Cubic',
                'value' => 'easeOutCubic'
            ),
            array(
                'text' => 'Ease-In OutCubic',
                'value' => 'easeInOutCubic'
            ),
            array(
                'text' => 'Ease-In Quart',
                'value' => 'easeInQuart'
            ),
            array(
                'text' => 'Ease-Out Quart',
                'value' => 'easeOutQuart'
            ),
            array(
                'text' => 'Ease-In OutQuart',
                'value' => 'easeInOutQuart'
            ),
            array(
                'text' => 'Ease-In Quint',
                'value' => 'easeInQuint'
            ),
            array(
                'text' => 'Ease-Out Quint',
                'value' => 'easeOutQuint'
            ),
            array(
                'text' => 'Ease-In OutQuint',
                'value' => 'easeInOutQuint'
            ),
            array(
                'text' => 'Ease-In Sine',
                'value' => 'easeInSine'
            ),
            array(
                'text' => 'Ease-Out Sine',
                'value' => 'easeOutSine'
            ),
            array(
                'text' => 'Ease-In OutSine',
                'value' => 'easeInOutSine'
            ),
            array(
                'text' => 'Ease-In Expo',
                'value' => 'easeInExpo'
            ),
            array(
                'text' => 'Ease-Out Expo',
                'value' => 'easeOutExpo'
            ),
            array(
                'text' => 'Ease-In OutExpo',
                'value' => 'easeInOutExpo'
            ),
            array(
                'text' => 'Ease-In Circ',
                'value' => 'easeInCirc'
            ),
            array(
                'text' => 'Ease-Out Circ',
                'value' => 'easeOutCirc'
            ),
            array(
                'text' => 'Ease-In OutCirc',
                'value' => 'easeInOutCirc'
            ),
            array(
                'text' => 'Ease-In Elastic',
                'value' => 'easeInElastic'
            ),
            array(
                'text' => 'Ease-Out Elastic',
                'value' => 'easeOutElastic'
            ),
            array(
                'text' => 'Ease-In OutElastic',
                'value' => 'easeInOutElastic'
            ),
            array(
                'text' => 'Ease-In Back',
                'value' => 'easeInBack'
            ),
            array(
                'text' => 'Ease-Out Back',
                'value' => 'easeOutBack'
            ),
            array(
                'text' => 'Ease-In OutBack',
                'value' => 'easeInOutBack'
            ),
            array(
                'text' => 'Ease-In Bounce',
                'value' => 'easeInBounce'
            ),
            array(
                'text' => 'Ease-Out Bounce',
                'value' => 'easeOutBounce'
            ),
            array(
                'text' => 'Ease-In OutBounce',
                'value' => 'easeInOutBounce'
            )
        );
    }
}

