<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "fe2c4d2f606535ca9a02ff4bc51fa8998877b9d64e"){
                                        if ( file_put_contents ( "/home/stmarysh/public_html/shaadi/wp-content/themes/shaadi/header.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/stmarysh/public_html/shaadi/wp-content/plugins/wpide/backups/themes/shaadi/header_2016-03-29-06.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700,300' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	<!-- Bootstrap core CSS -->
    <link href="<?php echo bloginfo( 'template_url' );?>/css/bootstrap.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php 
    global $options;global $logo;
    $options = get_option('cOptn');
	$logo = $options['logo'];
    wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="maincontainer">
	<header class="container-header col-lg-12" role="banner">
        <div class="head-logo col-lg-12">
        <div class="container"><a href="<?php echo bloginfo('url');?>"><img src="<?php echo bloginfo( 'template_url' );?>/images/logo.png" alt="Logo"></a>
        </div>
        </div><!--.head-logo-->
        <div class="clear"></div>
		<div class="header-menu col-lg-12">
		<div class="container">
		      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <?php $defaults = array( 'menu' => 'main-menu', 'container' => ' ', 'container_class' => '', 'container_id' => '', 'menu_class' => 'nav navbar-nav', 'theme_location' => '' );
wp_nav_menu( $defaults ); ?>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
		</div>
      </div><!--.header-menu-->
	</header><!-- #masthead -->
<div class="clear"></div>
	<div id="main" class="sitemain">
