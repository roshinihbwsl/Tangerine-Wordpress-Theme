<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tangerine
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'tangerine' ); ?></a>

	<header id="masthead" class="site-header">
		<div id="site-navigation-outter-box" <?php if (is_front_page()) { echo 'class="site-navigation-outter-box--shadow"'; } ?> >
			<div id="site-navigation-container" class="designfly-content-container">
				<nav id="site-navigation" class="main-navigation">
				<?php 
					if ( has_custom_logo() ) :
						the_custom_logo();
					else :?>
						<img id='logo' src=" <?php echo get_template_directory_uri() . '/assets/home/logo.png' ?> " alt="Logo" />
				<?php endif; ?>
					<div id="menu-n-search-container">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
						?>
						<form id='search-form-nav' action="<?php echo home_url('/'); ?>">
							<input id='search-field-nav' type="text" value="<?php the_search_query() ?>" method='get' name='s'>
							<input id='search-img-nav' type="image" src="<?php bloginfo( 'template_url' ); ?>/assets/home/search-icon.png">
						</form>
					</div>
				</nav><!-- #site-navigation -->
			</div>
		</div>
		<?php
		if (is_front_page()): ?>
			<div id="home-banner-container">
				<div id="home-banner-img-container">
				</div>
				<h1 id='banner-site-title' ><?php bloginfo('name') ?></h1>
				<h2 id='banner-site-description' ><?php bloginfo('description') ?></h2>
				<img id='banner-slider-arrows-left' src="<?php bloginfo( 'template_url' ); ?>/assets/home/slider-arrows-left.png" alt="">
				<img id='banner-slider-arrows-right' src="<?php bloginfo( 'template_url' ); ?>/assets/home/slider-arrows-right.png" alt="">

			</div>
		<?php endif; ?>
		<div id="features-head-outter-box">
			<div id="features-head-container" class="designfly-content-container">
				<div class="feature-head-item">
					<img class="feature-head-img" src="<?php bloginfo( 'template_url' ); ?>/assets/home/feature-icons1.png" alt="">
					<div class="feature-head-text">
						<h3>Advertising</h3>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
					</div>
				</div>
				<div class="feature-head-item">
					<img class="feature-head-img" src="<?php bloginfo( 'template_url' ); ?>/assets/home/feature-icons2.png" alt="">
					<div class="feature-head-text">
						<h3>Multimedia</h3>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
					</div>
				</div>
				<div class="feature-head-item">
					<img class="feature-head-img" src="<?php bloginfo( 'template_url' ); ?>/assets/home/feature-icons3.png" alt="">
					<div class="feature-head-text">
						<h3>Photography</h3>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
