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
		array( 'blog', true, is_page( 'blog' ) || is_home() || is_archive() || is_search() ),
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

/**
 * Meta-Beschreibungen für die gestalteten Seiten.
 * Greift nur, wenn in Yoast für die Seite keine eigene Beschreibung steht.
 */
function dehumore_meta_beschreibung() {
	$texte = array(
		'startseite'                => 'De:Humore macht Humorforschung verständlich: warum wir lachen, wann Humor verletzt und wie du ihn im Alltag und im Team bewusst einsetzt.',
		'humor-risk-check'          => 'Wann verbindet ein Witz, wann verletzt er? Der Humor Risk Check hilft dir, einen konkreten Scherz anhand von fünf Dimensionen einzuschätzen.',
		'humor-und-persoenlichkeit' => 'Was sagt unser Humor über uns aus? Erfahre, wie Humorstile, Humorpräferenzen und Persönlichkeit zusammenhängen – und warum Humor keine festen Persönlichkeitstypen verrät.',
		'humor-in-organisationen'   => 'Trainings, Workshops und Keynotes zu Humor in Führung, Kommunikation und Teams: forschungsbasiert, praxisnah, mit Dr. Bastian Mayerhofer.',
		'ueber'                     => 'De:Humore ist die Plattform von Dr. Bastian Mayerhofer für Humorforschung und ihre Anwendung: verständlich, differenziert und zum Ausprobieren.',
		'blog'                      => 'Der Blog von De:Humore: Beiträge aus Humorforschung und Kognitionswissenschaft, verständlich erklärt und mit Impulsen für Kommunikation und Alltag.',
	);
	$seite = dehumore_seite();
	if ( ! $seite || ! isset( $texte[ $seite[0] ] ) ) {
		return '';
	}
	return $texte[ $seite[0] ];
}
add_filter( 'wpseo_metadesc', function ( $desc ) {
	$leer = ! is_string( $desc ) || '' === trim( $desc ) || trim( $desc ) === trim( get_bloginfo( 'description' ) );
	return $leer ? ( dehumore_meta_beschreibung() ?: $desc ) : $desc;
} );
foreach ( array( 'wpseo_opengraph_desc', 'wpseo_twitter_description' ) as $dehumore_filter ) {
	add_filter( $dehumore_filter, function ( $desc ) {
		$leer = ! is_string( $desc ) || '' === trim( $desc ) || trim( $desc ) === trim( get_bloginfo( 'description' ) );
		return $leer ? ( dehumore_meta_beschreibung() ?: $desc ) : $desc;
	} );
}

/**
 * Markenschreibweise: „De:Humore“ mit fettem „Humore“, überall im sichtbaren Text
 * (Theme, Seiten, Beiträge). Attribute, Head, Skripte und Styles bleiben unverändert.
 */
function dehumore_marke_fett( $html ) {
	$body = stripos( $html, '<body' );
	if ( false === $body || false === strpos( $html, 'De:Humore' ) ) {
		return $html;
	}
	$kopf  = substr( $html, 0, $body );
	$teile = preg_split( '/(<[^>]*>)/', substr( $html, $body ), -1, PREG_SPLIT_DELIM_CAPTURE );
	$skip  = '';
	foreach ( $teile as $i => $teil ) {
		if ( '' === $teil ) {
			continue;
		}
		if ( '<' === $teil[0] ) {
			if ( '' === $skip && preg_match( '/^<(script|style|textarea|title|svg|noscript)\b/i', $teil, $m ) ) {
				$skip = strtolower( $m[1] );
			} elseif ( '' !== $skip && preg_match( '/^<\/' . $skip . '\b/i', $teil ) ) {
				$skip = '';
			}
			continue;
		}
		if ( '' === $skip && false !== strpos( $teil, 'De:Humore' ) ) {
			$teile[ $i ] = str_replace( 'De:Humore', 'De:<b class="dh-marke">Humore</b>', $teil );
		}
	}
	return $kopf . implode( '', $teile );
}
add_action( 'template_redirect', function () {
	if ( is_admin() || is_feed() || wp_doing_ajax() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
		return;
	}
	ob_start( 'dehumore_marke_fett' );
}, 1 );

/**
 * Beitragsbild für die kuratierten Beiträge auf der Startseite.
 * Holt das echte Beitragsbild über die URL; ohne Bild bleibt die Farbfläche.
 */
function dehumore_beitragsbild( $pfad, $farbe, $schatten ) {
	$id  = url_to_postid( home_url( $pfad ) );
	$img = $id ? get_the_post_thumbnail( $id, 'medium_large', array( 'loading' => 'lazy', 'alt' => '' ) ) : '';
	$stil = '--c: ' . $farbe . '; --dh-schatten: ' . $schatten;
	if ( $img ) {
		return '<span class="img dh-rahmen" style="' . esc_attr( $stil ) . '" aria-hidden="true">' . $img . '</span>';
	}
	return '<span class="img dh-rahmen" style="' . esc_attr( $stil ) . '" aria-hidden="true"><em>Beitragsbild</em></span>';
}
