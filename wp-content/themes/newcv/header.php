<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cv
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
    			$description = get_bloginfo( 'description', 'display' );
    			if ( $description || is_customize_preview() ) : ?>
    				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			    endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
            <ul id="categories">
                <?php
                    $my_cat = get_categories();
                   foreach ($my_cat as $cat) {
                       printf('<li><a href="#%s">%s</a>', $cat->cat_ID, $cat->name);
                       printf('<ul id="subcategory">');
                       printf('<li><a href="#%s">%s</a></li>',$cat->cat_ID, $cat->name);
                       printf('</ul>');
                       printf('</li>');
                   }
                ?>
            </ul>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<div id="content" class="site-content">
