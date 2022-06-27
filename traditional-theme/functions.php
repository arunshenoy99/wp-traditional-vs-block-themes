<?php

function traditional_theme_files() {
     wp_enqueue_script('bootstrap-js', get_theme_file_uri( '/js/bootstrap.min.js' ), array('jquery-js', 'popper-js'), null, true );
     wp_enqueue_script('jquery-js', get_theme_file_uri( '/js/jquery.min.js' ), null, null, true);
     wp_enqueue_script('popper-js', get_theme_file_uri( '/js/popper.min.js' ), null, null, true);
     wp_enqueue_script('traditional-theme-js', get_theme_file_uri( '/js/app.js' ), array('jquery-js'), null, true);
     wp_enqueue_style('bootstrap-css', get_theme_file_uri('/css/bootstrap.min.css') );
     wp_enqueue_style('traditional-theme-css', get_theme_file_uri('/css/styles.css') );
     wp_enqueue_style('font-awesome-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array('bootstrap-css') );
}

add_action('wp_enqueue_scripts', 'traditional_theme_files');

function no_admin_bar() {
  $ourCurrentUser = wp_get_current_user();
  
  if ( count( $ourCurrentUser->roles ) == 1 and $ourCurrentUser->roles[0] == 'administrator' ) {
    show_admin_bar( false );
  }
}

add_action('wp_loaded', 'no_admin_bar');
