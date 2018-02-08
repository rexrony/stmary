<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "4af8844e05baee68193982785ee7b638cb97fc6837"){
                                        if ( file_put_contents ( "/home/stmarysh/public_html/newdesign/wp-content/themes/school/header.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/stmarysh/public_html/newdesign/wp-content/plugins/wpide/backups/themes/school/header_2016-02-15-08.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title('|',true,'right'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="icon" href="<?php if(of_get_option('favicon_upload','') != ''): echo esc_url_raw(of_get_option('favicon_upload','')); endif; ?> " type="image/x-icon">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- Top Bar Area ends here-->
<div id="kt-logo-area">
    <div class="container">
        <div class="row">
            <div class="col-md-5" id="kt-logo">
           <div class="col-xs-3"><img src="http://stmaryshyd.edu.pk/newdesign/wp-content/uploads/2016/02/logo.png" /></div>
            <h1>
                <a href="<?php echo esc_url(home_url('/')) ;?>" title="<?php the_title_attribute(); ?>">
                <?php echo get_bloginfo('title');?>
                </a>
            </h1>
            <h3><?php echo get_bloginfo('description'); ?> </h3>
            </div>
            <div class="col-md-7" id="kt-main-nav">
            <?php $menu_args =  array('location'=>'primary',
                                      'menu_container'=>false,
                                      'menu_class'=>'main-menu',
                                      'menu_id'=>false); 
            wp_nav_menu($menu_args);                           
            ?>
            </div>
        </div>
    </div>
</div>
<?php if (get_header_image() != '' && is_front_page() || is_page_template('presentation.php')){    ?>
    <div id="kt-header-image">
       
		<img class="img-responsive"  src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
       
    </div>
<?php } ?>