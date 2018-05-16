<?php
	// MAIN PATHS

	if(!defined('theme_URL')) {
		define('theme_URL', WP_CONTENT_URL.'/themes/'.get_template().'/');
	}

	//////////////////
	// ADMIN FUNCTIONS
	//////////////////

	//SHOW ADMIN BAR
	show_admin_bar(false);	

	// REMOVE ADMIN BAR
	add_action('get_header', 'remove_admin_login_header');
		function remove_admin_login_header() {
			remove_action('wp_head', '_admin_bar_bump_cb');
	}

	//Change Admin footer 
	function remove_footer_admin () {
		echo 'Coded by <a href="http://smultron.pl/" target="_blank" >Chomikoo</a></p>'; 
	}
	 
	add_filter('admin_footer_text', 'remove_footer_admin');


	//Userproof
	// Remove adminbar
	function remove_admin_bar() {
	    if (!current_user_can('administrator') && !is_admin()) {
	      show_admin_bar(false);
	    }
	}
	
	add_action('after_setup_theme', 'remove_admin_bar');

	// Remove menu pages 
	function custom_remove_menu_pages() {
	    if (!current_user_can('administrator') && !is_admin()) {
	      // remove_menu_page( 'index.php' );                  //Dashboard
	      remove_menu_page( 'jetpack' );                    //Jetpack* 
	      // remove_menu_page( 'edit.php' );                   //Posts
	      // remove_menu_page( 'upload.php' );                 //Media
	      // remove_menu_page( 'edit.php?post_type=page' );    //Pages
	      // remove_menu_page( 'edit-comments.php' );          //Comments
	      remove_menu_page( 'themes.php' );                 //Appearance
	      remove_menu_page( 'plugins.php' );                //Plugins
	      remove_menu_page( 'users.php' );                  //Users
	      remove_menu_page( 'tools.php' );                  //Tools
	      remove_menu_page( 'options-general.php' );        //Settings
	    }
	}

	add_action( 'admin_menu', 'custom_remove_menu_pages' );

	//Remove 'Comments' & 'Tools' section
	function remove_admin_menu_items() {
	    if (!current_user_can('update_core')) {

			$remove_menu_items = array(__('Comments'),__('Tools'));
			global $menu;
			end ($menu);
			while (prev($menu)){
				$item = explode(' ',$menu[key($menu)][0]);
				if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
				unset($menu[key($menu)]);}
			}
		}
	}

	add_action('admin_menu', 'remove_admin_menu_items');

	//Hide update notification
	function hide_update_notice_to_all_but_admin_users() {

	    if (!current_user_can('update_core')) {
	        remove_action( 'admin_notices', 'update_nag', 3 );
	    }

	}

	add_action( 'admin_head', 'hide_update_notice_to_all_but_admin_users', 1);

	//cleaning up wp_head() 
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'start_post_rel_link' );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'adjacent_posts_rel_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );

	// remove dashicons from wp_hear
	function wpdocs_dequeue_dashicon() {

	    if (current_user_can( 'update_core' )) {
	        return;
	    }
	    wp_deregister_style('dashicons');

	}
	
	add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );

	/////////////
	// ASSEST 
	/////////////


	//Remove WP jQ from head add in main.min.js

	function myphpinformation_scripts() {    

		    if( !is_admin()){
			 wp_deregister_script('jquery');

		}

	}

	add_action( 'wp_enqueue_scripts', 'myphpinformation_scripts' );


	// ENQUEUE ASSETS

	function my_assets() {
		// cache VERSION //
		$ver = '1';
		///////////////////


		// wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array( 'reset' ) );
		wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/style.css',array(), $ver );

		wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/scripts/main.min.js', array( 'jquery-core' ), $ver, true );

		// wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/src/js/script.js', array('jquery'),'1.01a', true );
	}

	add_action( 'wp_enqueue_scripts', 'my_assets' );


	///////////////////	
	// Custom Post Type
	///////////////////

    add_action('init', 'photo_init_posttypes');
    
    function photo_init_posttypes(){        

        $gallery_args = array(
            'labels' => array(
                'name' => 'Galerie',
                'singular_name' => 'Galerie',
                'all_items' => 'Wszystkie galerie',
                'add_new' => 'Dodaj nową galerie',
                'add_new_item' => 'Dodaj nową galerie',
                'edit_item' => 'Edytuj galerie',
                'new_item' => 'Nowa galerie',
                'view_item' => 'Zobacz galerie',
                'search_items' => 'Szukaj w galeriach',
                'not_found' =>  'Nie znaleziono żadnych galerii',
                'not_found_in_trash' => 'Nie znaleziono żadnych galerii w koszu', 
                'parent_item_colon' => ''
            ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true, 
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-format-image',
            'supports' => array(
                'title','author','thumbnail','custom-fields'
            ),
            'has_archive' => true            
        );
        
        register_post_type('galeria', $gallery_args);
    }

	// Register Menu
	function chomikoo_custom_new_menu() {
	  register_nav_menu('header-menu',__( 'Header menu' ));
	}
	add_action( 'init', 'Chomikoo_custom_new_menu' );



	// CUSTOM THUMBNAILS

	function custom_data_srcset_thumbnail( $post_id ) {
		  $image_t = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'thumbnail' )[0];
		  $image_t_W = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'thumbnail' )[1];
		  $image_l = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'medium' )[0];
		  $image_l_W = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'medium' )[1];
		  $image_f = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' )[0];
		  $image_f_W = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' )[1];
		  $image_alt =  get_post_meta( get_post_thumbnail_id($post_id) )['_wp_attachment_image_alt']['0'];

		  $full_src_imge = '<img class="lazyload" ' .
		  'alt="' . $image_alt . '"' .
		  // 'src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" ' .
		  'data-src="' . $image_l . '" ' .
		  'data-srcset="' . $image_f . ' ' . $image_f_W . 'w, ' .  $image_l . ' ' . $image_l_W . 'w, ' . $image_t . ' ' . $image_t_W . 'w "  />';
		
		  return $full_src_imge;
	}

?>