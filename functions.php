<?php
/**
 * De:Humore – Theme-Funktionen.
 *
 * @package dehumore
 */

defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', function () {
	add_editor_style( 'style.css' );
	add_theme_support( 'responsive-embeds' );
} );

/**
 * Welche gestaltete Seite gerade angezeigt wird: array( slug, hat_css ) oder null.
 */
function dehumore_seite() {
	$seiten = array(
		array( 'startseite', false, is_front_page() ),
		array( 'humor-verstehen', true, is_page( 'humor-verstehen' ) ),
		array( 'humor-risk-check', true, is_page_template( 'page-humor-risk-check' ) || is_page( 'humor-risk-check' ) ),
		array( 'humor-trainieren', true, is_page( 'humor-kann-man-trainieren' ) ),
		array( 'humor-und-persoenlichkeit', true, is_page( 'humor-und-persoenlichkeit' ) ),
		array( 'humor-in-organisationen', true, is_page( 'humor-in-organisationen' ) ),
		array( 'ueber', true, is_page( 'ueber' ) ),
		array( 'beitrag', true, is_singular( 'post' ) ),
		array( 'blog', true, is_page( 'blog' ) || is_home() ),
	);
	foreach ( $seiten as $s ) {
		if ( $s[2] ) {
			return array( $s[0], $s[1] );
		}
	}
	return null;
}

add_action( 'wp_enqueue_scripts', function () {
	$v = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'dehumore', get_stylesheet_uri(), array(), $v );
	$seite  = dehumore_seite();
	$script = 'site';
	if ( $seite ) {
		$script = in_array( $seite[0], array( 'blog' ), true ) ? 'site' : $seite[0];
		if ( $seite[1] ) {
			wp_enqueue_style( 'dehumore-' . $seite[0], get_theme_file_uri( 'assets/css/' . $seite[0] . '.css' ), array( 'dehumore' ), $v );
		}
	}
	wp_enqueue_script( 'dehumore-' . $script, get_theme_file_uri( 'assets/js/' . $script . '.js' ), array(), $v, array( 'in_footer' => true, 'strategy' => 'defer' ) );
} );

add_action( 'init', function () {
	register_block_style( 'core/paragraph', array( 'name' => 'kicker', 'label' => 'Kicker' ) );
	register_block_style( 'core/paragraph', array( 'name' => 'stimme', 'label' => 'Bastians Stimme' ) );
	register_block_pattern_category( 'dehumore', array( 'label' => 'De:Humore' ) );
} );
