<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */
?>
<?php session_start(); ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
 <script type="text/javascript" src = "http://localhost/wordpress_onlinetest/wp-includes/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src = "http://localhost/wordpress_onlinetest/wp-includes/js/jquery-ui.js"></script>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
<!--link href="http://localhost/wordpress_onlinetest/wp-content/themes/upright/css/glyphicons.css" rel="stylesheet" /-->

	<?php wp_head(); ?>
<!--link href="../../wp-includes/css/bootstrap.min.css" rel="stylesheet"-->  
<script type="text/javascript">
/*var idleTime = 0;
$(document).ready(function () {

    //Increment the idle time counter every minute.
    var idleInterval = setInterval(timerIncrement, 60000); // 1 minute
//alert(idleInterval);
    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
    });
    $(this).keypress(function (e) {
        idleTime = 0;
    });
});

function timerIncrement() {
    idleTime = idleTime + 1;
    if (idleTime > 1) { // 20 minutes
        window.location.reload();
    }
}*/
</script>   
</head>

<body <?php body_class(); ?>>
	
<div id="page" class="hfeed site"><div id="main" class="layout-<?php echo esc_attr( $mclass ); ?> site_wrapper">


<?php?>

	<header id="masthead" class="site-header sticky-nav" role="banner">
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav role="navigation" class="site-navigation main-navigation group">
				<div class="assistive-text skip-link">
					<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'upright' ); ?>"><span>&nbsp;</span><span><?php _e( 'Skip to content', 'upright' ); ?></span></a>
				</div>
				<div>
					<?php add_filter( 'wp_page_menu', 'upright_strip_div_menu_page' ); ?>

					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'     => 'menu group',
						'container'      => false
					) ); ?>

					<?php remove_filter( 'wp_page_menu', 'upright_strip_div_menu_page' ); ?>

					<?php get_search_form(); ?>
				</div>
			</nav>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-header' ) ) : ?>
			<div id="sidebar-top" class="boxed">
				<?php dynamic_sidebar( 'sidebar-header' ); ?>
			</div>
		<?php endif; ?>

		<div class="logo_boxed" >
			
				<div id = "logo">
				<?php the_custom_logo(); ?></div>
				<!--<div id = "site_title">-->
				<div id = "site_title"><h2 class="site-title h1"><b><?php bloginfo( 'name' ); ?></b></h2></div>
					<?php
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif; ?>
				<!--</div-->
				<div id = "login">&nbsp;</div>
		</div>
		

		<?php if ( has_nav_menu( 'secondary' ) ) : ?>
			<nav role="navigation" class="site-navigation secondary-navigation group">
				<?php wp_nav_menu( array(
					'theme_location' => 'secondary',
					'menu_class' => 'menu group'
				) ); ?>
			</nav>
		<?php endif; ?>

	</header>

	<div id="main" class="site-main boxed group" style="width:1000px; margin:auto; margin-bottom:30px; margin-top:0px;">
