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

/**
 * Newsletter-Formular von MailPoet.
 * Shortcodes werden in Mustern (Patterns) und HTML-Blöcken nicht ausgeführt,
 * deshalb rendert das Theme das Formular selbst. Genommen wird Formular 1,
 * sonst das neueste aktive MailPoet-Formular.
 */
function dehumore_newsletter_form_id() {
	global $wpdb;
	$table = $wpdb->prefix . 'mailpoet_forms';
	if ( $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $table ) ) !== $table ) {
		return 0;
	}
	$ids = $wpdb->get_col( "SELECT id FROM {$table} WHERE deleted_at IS NULL AND (status = 'enabled' OR status IS NULL) ORDER BY id DESC" );
	$ids = array_map( 'intval', (array) $ids );
	if ( in_array( 1, $ids, true ) ) {
		return 1;
	}
	return $ids ? $ids[0] : 0;
}

function dehumore_newsletter_form() {
	$id   = dehumore_newsletter_form_id();
	$html = $id ? do_shortcode( '[mailpoet_form id="' . $id . '"]' ) : '';
	if ( '' === trim( wp_strip_all_tags( $html, true ) ) && false === strpos( $html, '<form' ) ) {
		return '<!-- dehumore: kein MailPoet-Formular gefunden (id ' . $id . ') --><p><a class="dh-btn" href="/kontakt/">Newsletter per Kontakt anfragen</a></p>';
	}
	return '<!-- dehumore: MailPoet-Formular ' . $id . ' -->' . $html;
}
add_shortcode( 'dehumore_newsletter', 'dehumore_newsletter_form' );

/* Sicherheitsnetz: Shortcodes in HTML-Blöcken von Theme-Vorlagen ausführen. */
add_filter( 'render_block_core/html', function ( $content ) {
	if ( false !== strpos( $content, '[dehumore_newsletter' ) || false !== strpos( $content, '[mailpoet_form' ) ) {
		$content = do_shortcode( $content );
	}
	return $content;
} );
