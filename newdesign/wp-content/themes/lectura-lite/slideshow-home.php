<?php if (get_theme_mod('lectura_lite_display_slideshow') == 1 || get_theme_mod('lectura_lite_page_slideshow') != '') {

$academia_loop = new WP_Query( array( 
	'order'          => 'DESC',
	'orderby'          => 'date',
	'post__not_in' => get_option( 'sticky_posts' ),
	'posts_per_page' => get_theme_mod('lectura_lite_slideshow_number'),
	'meta_key' => 'academia_post_featured',
	'meta_value' => 'on'				
) );

$default_image = esc_url( get_template_directory_uri() ) . '/images/x.gif';

if ($academia_loop->have_posts()) { ?>

<div id="academia-slideshow" class="flexslider widget">
	<ul class="academia-slides">

		<?php while ( $academia_loop->have_posts() ) : $academia_loop->the_post(); ?>

		<li class="academia-slide">
			
			<?php
			$slide_title = get_the_title();
			$slide_url = esc_url( get_permalink($post->ID) );
			?>

			<div class="post-cover">
				<a href="<?php echo $slide_url; ?>"><?php get_the_image( array( 'size' => 'lectura_lite-thumb-slideshow', 'width' => 960, 'height' => 350, 'default_image' => $default_image, 'link_to_post' => false ) ); ?></a>
			</div><!-- .post-cover -->
			
			<div class="post-content">
				<div class="post-content-wrapper">
					<h2 class="title-l title-post"><a href="<?php echo $slide_url; ?>"><?php echo $slide_title; ?></a></h2>
					<p class="post-excerpt"><?php echo get_the_excerpt(); ?></p>
					<span class="read-more-span"><a class="read-more-anchor" href="<?php echo $slide_url; ?>"><?php _e('Continue Reading','lectura_lite'); ?></a></span>
				</div><!-- .post-content-wrapper -->
			</div><!-- .post-content -->
			
		</li><!-- .slide -->

		<?php endwhile; ?>

	</ul><!-- .academia-slides -->
</div><!-- #academia-slideshow .flexslider -->
<?php }
elseif (!$academia_loop->have_posts() && current_user_can('edit_theme_options')) { ?>
<div class="widget"><p class="academia-notice">
	<?php _e('Please mark some posts as "Featured" for the Homepage Slideshow.','lectura_lite'); ?>
	<br />
	<?php _e('For more information please','lectura_lite'); ?> <a href="http://www.academiathemes.com/documentation/lectura-lite/"><?php _e('read the documentation','lectura_lite'); ?></a></p></div>
<?php }
} // if slideshow enabled on Customize screen 
?>