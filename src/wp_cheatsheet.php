///////////////////
Template checklist
//////////////////

-header.php
-sidebar.php
-footer.php
-index.php
-archive.php
-page.php
-single.php
-comments.php
-search.php




CSS style sheet

/*
Theme Name: Twenty Sixteen
Theme URI: https://wordpress.org/themes/twentysixteen/
Author: the WordPress team
Author URI: https://wordpress.org/
Description: Twenty Sixteen is a modernized take on an ever-popular WordPress layout — the horizontal masthead with an optional right sidebar that works perfectly for blogs and websites. It has custom color options with beautiful default color schemes, a harmonious fluid grid using a mobile-first approach, and impeccable polish in every detail. Twenty Sixteen will make your WordPress look beautiful everywhere.
Version: 1.2
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: black, blue, gray, red, white, yellow, dark, light, one-column, two-columns, right-sidebar, fixed-layout, responsive-layout, accessibility-ready, custom-background, custom-colors, custom-header, custom-menu, editor-style, featured-images, flexible-header, microformats, post-formats, rtl-language-support, sticky-post, threaded-comments, translation-ready
Text Domain: twentysixteen

This theme, like WordPress, is licensed under the GPL.
Use it to make something cool, have fun, and share what you've learned with others.
*/


//////////////////////
Template Include Tags 
//////////////////////

<?php get_header(); ?>

<?php get_footer(); ?>

<?php get_sidebar(); ?>

<?php comments_template(); ?>

<?php get_template_part('example.php'); ?> 

<?php get_search_form(); ?> <- includes the Search Form template



////////////////////////////////
Template Header/ Blogsinfo Tages
////////////////////////////////

<?php bloginfo('name'); ?>

<?php bloginfo('url'); ?>

<?php bloginfo('template_url'); ?>

<?php bloginfo('description'); ?>

<?php bloginfo('atom_url'); ?>

<?php bloginfo('rss2_url'); ?>

<?php bloginfo('pingback_url'); ?>

<?php bloginfo('version'); ?>

<?php site_url();?>

<?php get_stylesheet_directory(); ?>

<?php wp_title(); ?>

//////////////
Template Tags 
//////////////

<?php the_content(); ?>

<?php the_excerpt(); ?>

<?php the_title(); ?>

<?php the_permalink(); ?>

<?php the_category(', '); ?>

<?php the_author(); ?>

<?php the_ID(); ?>

<?php edit_post_link(); ?>

<?php next_post_link(' %link '); ?>

<?php previous_post_link(' %link ') ?>

<?php wp_list_bookmarks( $args); ?>

<?php wp_list_pages(); ?> List all pages

<?php wp_get_archives(); ?> 

<?php wp_list_cats(); ?>

<?php get_calendar(); ?>

<?php wp_register(): ?>

<?php wp_loginout(); ?>


///////////
LOOOOP
/////////


<?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            //
            // Post Content here
            //
        endwhile; // end while
    endif; // end if
?>


<?php 

	next_post_link();

	previous_post_link();

	the_category();

	the_author():

	the_content();

	the_excerpt();

	the_ID();

	the_meta();

	the_shortlink();

	the_tags();

	the_title();

	the_time();

?>


Conditional tags

<?php 
	
	is_front_page()
	is_home()
	is_admin()
	is_single()
	is_page()
	is_page_template('example.php')
	is_category()
	is_tag()
	is_author()
	is_search()
	is_404()
	is_admin_bar_showing()
	has_excerpt()

	is_front_page() and is_home() <-- Blog page

	if ( is_front_page() && is_home() ) {
	  // Default homepage
	} elseif ( is_front_page() ) {
	  // static homepage
	} elseif ( is_home() ) {
	  // blog page
	} else {
	  //everything else
	}


?>