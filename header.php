<?php
/**
 * The Header template for our theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- force IE to disable compatibility mode on IE9+, due to ed.gov intranet... this must be first in HEAD -->
<meta http-equiv="X-UA-Compatible" content="IE=11;IE=10;IE=9" />

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title('|', true, 'left' ); ?></title>
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/images/favicon.ico" type="image/x-icon">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>

<!--[if lt IE 10]>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/ie-multiple-columns.js" type="text/javascript"></script>
<link rel='stylesheet' id='multicolumn-style-css'  href='<?php echo get_stylesheet_directory_uri(); ?>/css/multicolumn.css' type='text/css' media='all' />
<![endif]-->
</head>

<!--[if IE 7]>
<body <?php body_class("ie ie7"); ?>>
<![endif]-->
<!--[if IE 8]>
<body <?php body_class("ie ie8"); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<body <?php body_class(); ?>>
<!--<![endif]-->

<!-- Skip Content Navigation -->
<div id="skipcontent"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to Content', 'wp-oet-theme' ); ?>"><?php _e( 'Skip to Content', 'wp-oet-theme' ); ?></a></div>

<!-- Container -->
<div class="container-fluid">
	<div class="container">

        <div class="row hdr">
        	<div class="col-md-7 col-sm-8 col-xs-12">
            	<a href="<?php echo site_url();?>" Title="Home">
                    <img src="<?php echo get_stylesheet_directory_uri();?>/images/logo.svg" alt="Office of Innovation and Improvement" class="svg-replace" id="header_logo" />
                </a>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-12 col-md-offset-2">

            	<div class="col-md-12 col-sm-12 col-xs-5">
                	<div class="form-group has-feedback gray_bg">

                        <form id="searchform" class="searchform" action="<?php echo site_url();?>" method="get" role="search">
                        	<input type="text" class="form-control" id="inputSuccess2" placeholder="Search" name="s" />
                      		<a href="javascript:" onClick="jQuery(this).closest('form').submit()">
                                <span class="form-control-feedback ">
                              		<img src="<?php echo get_stylesheet_directory_uri();?>/images/search_icn.png" alt="Search" />
                                </span>
                            </a>
                        </form>

                    </div>
                </div>

                <?php
					define("twitter_url", get_option("twitter_url"));
					define("facebook_url", get_option("facebook_url"));
					define("yotube_url", get_option("yotube_url"));
					define("google_url", get_option("google_url"));
					define("linkedin_url", get_option("linkedin_url"));
					define("linktonwltr", get_option("linktonwltr"));
				?>

                <div class="col-md-11 col-sm-12 col-xs-5 col-xs-offset-2 col-md-offset-1 soclize">

        			<?php if ( twitter_url !== "" ) : ?>
                        <a href="<?php echo twitter_url;?>" target="_blank" title="Follow Us on Twitter">
        				    <span class="socl_icns fa-stack"><i class="fa fa-twitter fa-stack-2x"></i></span>
                        </a>
        			<?php endif; ?>
        			<?php if ( facebook_url !== "" ) : ?>
            			<a href="<?php echo facebook_url;?>" target="_blank" title="Follow Us on Facebook">
            			    <span class="socl_icns fa-stack"><i class="fa fa-facebook fa-stack-2x"></i></span>
            			</a>
        			<?php endif; ?>
        			<?php if ( yotube_url !== "" ) : ?>
            			<a href="<?php echo yotube_url;?>" target="_blank" title="Subscribe on YouTube">
            			    <span class="socl_icns fa-stack"><i class="fa fa-youtube-play fa-stack-2x"></i></span>
            			</a>
        			<?php endif; ?>
        			<?php if ( google_url !== "" ) : ?>
            			<a href="<?php echo google_url;?>" target="_blank" title="Follow Us on Google+">
            			    <span class="socl_icns fa-stack"><i class="fa fa-google-plus fa-stack-2x"></i></span>
            			</a>
        			<?php endif; ?>
        			<?php if ( linktonwltr !== "" ) : ?>
            			<a href="<?php echo linktonwltr;?>" target="_blank" title="Sign Up for our Newsletter">
            			    <span class="socl_icns fa-stack"><i class="fa fa-envelope fa-stack-2x"></i></span>
            			</a>
        			<?php endif; ?>
                </div>

            </div>
        </div>

        <div class="row navi_bg">
        	<div class="main-menu">
			<?php
			$menu_name = "primary";
			$locations = get_nav_menu_locations();
			$menu = wp_get_nav_menu_object( $locations["$menu_name"] );
			$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
			wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'walker' => new oii_walker_nav_menu($menuitems) ) );
			?>
            </div>

            <span class="navi_icn fa-stack"><i class="fa fa-bars fa-stack-2x"></i></span>
            <div class="responsiv-menu">
            	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'responsiv-menu_ul' ) ); ?>
            </div>

        </div>
