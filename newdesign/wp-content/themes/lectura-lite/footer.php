	</div><!-- .wrapper .wrapper-main -->
	
	<footer>
	
		<?php if ( is_active_sidebar('footer-col-1') || is_active_sidebar('footer-col-2') || is_active_sidebar('footer-col-3') ) { ?>

		<div id="footer-main">
		
			<div class="wrapper wrapper-footer">
			
				<div class="academia-column academia-column-1">
				
					<?php
					if ( !dynamic_sidebar('Footer: Column 1') ) : ?> <?php endif;
					?>
					
					<div class="cleaner">&nbsp;</div>
				
				</div><!-- .academia-column .academia-column-1 -->
	
				<div class="academia-column academia-column-2">
				
					<?php
					if ( !dynamic_sidebar('Footer: Column 2') ) : ?> <?php endif;
					?>
					
					<div class="cleaner">&nbsp;</div>
				
				</div><!-- .academia-column .academia-column-1 -->
	
				<div class="academia-column academia-column-3">
				
					<?php
					if ( !dynamic_sidebar('Footer: Column 3') ) : ?> <?php endif;
					?>
					
					<div class="cleaner">&nbsp;</div>
				
				</div><!-- .academia-column .academia-column-1 -->
			
				<div class="cleaner">&nbsp;</div>
			
			</div><!-- .wrapper .wrapper-footer -->
		
		</div><!-- #footer-main -->
		
		<?php } ?>

		<div id="footer-copy">
		
			<div class="wrapper wrapper-footer-copy">
				
				<p class="academia-credit"><?php _e('Theme by', 'lectura_lite'); ?> <a href="http://www.academiathemes.com" target="_blank">AcademiaThemes</a></p>
				<?php $copyright_default = __('Copyright &copy; ','lectura_lite') . date("Y",time()) . ' ' . get_bloginfo('name') . '. ' . __('All Rights Reserved', 'lectura_lite'); ?>
				<p class="copy"><?php echo esc_attr(get_theme_mod( 'lectura_lite_copyright_text', $copyright_default )); ?></p>
	
				<div class="cleaner">&nbsp;</div>
			
			</div><!-- .wrapper .wrapper-footer-copy -->
		
		</div><!-- #footer-copy -->

	</footer>

</div><!-- end #container -->

<?php 
wp_footer(); 
wp_reset_query();
?>
</body>
</html>