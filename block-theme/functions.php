<?php

function traditional_theme_files() {
	 wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/js/bootstrap.min.js' ), array( 'jquery-js', 'popper-js' ), null, true );
	 wp_enqueue_script( 'jquery-js', get_theme_file_uri( '/js/jquery.min.js' ), null, null, true );
	 wp_enqueue_script( 'popper-js', get_theme_file_uri( '/js/popper.min.js' ), null, null, true );
	 wp_enqueue_script( 'traditional-theme-js', get_theme_file_uri( '/js/app.js' ), array( 'jquery-js' ), null, true );
	 wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/css/bootstrap.min.css' ) );
	 wp_enqueue_style( 'traditional-theme-css', get_theme_file_uri( '/css/styles.css' ) );
	 wp_enqueue_style( 'font-awesome-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array( 'bootstrap-css' ) );
}

add_action( 'wp_enqueue_scripts', 'traditional_theme_files' );
add_action( 'enqueue_block_assets', 'traditional_theme_files' );

function no_admin_bar_for_subscribers() {
	$ourCurrentUser = wp_get_current_user();

	if ( count( $ourCurrentUser->roles ) == 1 and $ourCurrentUser->roles[0] == 'administrator' ) {
		show_admin_bar( false );
	}
}

add_action( 'wp_loaded', 'no_admin_bar_for_subscribers' );

class CustomBlock {
	function __construct( $name, $render_callback = null, $data = null ) {
		$this->name            = $name;
		$this->data            = $data;
		$this->render_callback = $render_callback;
		add_action( 'init', array( $this, 'on_init' ) );
	}

	function render_callback( $attributes, $content ) {
		ob_start();
		require get_theme_file_path( "blocks/{$this->name}/{$this->name}.php" );
		return ob_get_clean();
	}

	function on_init() {
		\wp_register_script(
			$this->name,
			\get_stylesheet_directory_uri() . "/build/{$this->name}.js",
			array( 'wp-blocks', 'wp-editor', 'bootstrap-js', 'jquery-js', 'popper-js' )
		);

		if ( $this->data ) {
			\wp_localize_script( $this->name, $this->name, $this->data );
		}

		$args = array(
			'editor_script' => $this->name,
		);

		if ( $this->render_callback ) {
			$args['render_callback'] = array( $this, 'render_callback' );
		}

		\register_block_type( "blocktheme/{$this->name}", $args );
	}
}
function add_editor_styles() {
	add_theme_support( 'editor-styles' );

	add_editor_style(
		array(
			'css/bootstrap.min.css',
			'css/styles.css',
			'https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css',
		)
	);
}

add_action( 'after_setup_theme', 'add_editor_styles' );

new CustomBlock( 'navbar', true );
new CustomBlock( 'carousel', true );
new CustomBlock(
	'slide',
	true,
	array(
		'fallbackimage' => get_theme_file_uri( '/img/img1.jpg' ),
	)
);
new CustomBlock( 'posts', true );
new CustomBlock( 'customfooter', true );
