<?php

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page('Opções Extras');

}

add_action( 'after_setup_theme', 'cyb_add_image_sizes' );
function cyb_add_image_sizes() {
	add_image_size( 'thumb-news', 570, 325, true );
	add_image_size( 'galeria-g', 1405, 937, true );
}

function register_my_menus() {
  register_nav_menus(
    array(
      'menu-topo' => __( 'Menu Topo' ),
      'menu-rodape' => __( 'Menu Rodapé' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


function seopress_theme_slug_setup() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'seopress_theme_slug_setup' );

add_theme_support('post-thumbnails');
function setup_types() {
    register_post_type('mytype', array(
        'label' => __('Post Thumbnail'),
        'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
        'show_ui' => true,
    ));
}
add_action('init', 'setup_types');

function is_child($pageID) { 
	global $post; 
	if( is_page() && ($post->post_parent==$pageID) ) {
               return true;
	} else { 
               return false; 
	}
}

add_theme_support( 'title-tag' );

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

function default_gravatar ($avatar_defaults) {
     $myavatar = get_bloginfo('template_directory') . '/img/ico-user.png';
     $avatar_defaults[$myavatar] = "Default Gravatar";
     return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'default_gravatar' );  

