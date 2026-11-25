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

/* ---------- Zweisprachigkeit (Deutsch / britisches Englisch, über Polylang) ---------- */

/**
 * Aktuelle Sprache: 'en' auf englischen Seiten (Polylang), sonst 'de'.
 * Ohne Polylang ist die Site rein deutsch und alles bleibt wie bisher.
 */
function dehumore_sprache() {
	if ( function_exists( 'pll_current_language' ) && 'en' === pll_current_language( 'slug' ) ) {
		return 'en';
	}
	return 'de';
}

function dehumore_en() {
	return 'en' === dehumore_sprache();
}

/**
 * Englische Fassung eines Musters einbinden (sprachen/en/<name>.php).
 * Gibt true zurück, wenn die englische Datei ausgegeben wurde.
 * Muster werden erst beim Rendern geladen, also wenn die Sprache feststeht.
 */
function dehumore_muster_en( $name ) {
	if ( ! dehumore_en() ) {
		return false;
	}
	$datei = get_theme_file_path( 'sprachen/en/' . $name . '.php' );
	if ( ! file_exists( $datei ) ) {
		return false;
	}
	include $datei;
	return true;
}

/**
 * Slug der deutschen Seite zur aktuellen Seite. Englische Seiten sind
 * Polylang-Übersetzungen und bekommen dieselbe Vorlage, dasselbe CSS/JS.
 */
function dehumore_de_slug() {
	if ( ! is_page() ) {
		return '';
	}
	$id = get_queried_object_id();
	if ( function_exists( 'pll_get_post' ) ) {
		$de = pll_get_post( $id, 'de' );
		if ( $de ) {
			$id = $de;
		}
	}
	return (string) get_post_field( 'post_name', $id );
}

function dehumore_ist_seite( $slug ) {
	return '' !== $slug && dehumore_de_slug() === $slug;
}

/**
 * Link auf eine deutsche Adresse (z. B. '/humor-risk-check/#check') in der aktuellen Sprache.
 * Auf englischen Seiten wird die englische Übersetzung verlinkt, falls es sie gibt,
 * sonst bleibt der deutsche Link. So stehen keine englischen Slugs fest im Theme.
 */
function dehumore_link( $pfad ) {
	$anker = '';
	if ( false !== strpos( $pfad, '#' ) ) {
		list( $pfad, $anker ) = explode( '#', $pfad, 2 );
		$anker = '#' . $anker;
	}
	if ( ! dehumore_en() || ! function_exists( 'pll_get_post' ) ) {
		return $pfad . $anker;
	}
	static $cache = array();
	if ( ! isset( $cache[ $pfad ] ) ) {
		$ziel = $pfad;
		if ( '/' === $pfad ) {
			$ziel = function_exists( 'pll_home_url' ) ? pll_home_url( 'en' ) : $pfad;
		} else {
			$seite = get_page_by_path( trim( $pfad, '/' ) );
			$id    = $seite ? $seite->ID : url_to_postid( home_url( $pfad ) );
			$en    = $id ? pll_get_post( $id, 'en' ) : 0;
			if ( $en && 'publish' === get_post_status( $en ) ) {
				$ziel = get_permalink( $en );
			}
		}
		$cache[ $pfad ] = $ziel;
	}
	return $cache[ $pfad ] . $anker;
}

/* Kurzform für die englischen Muster: Link ausgeben. */
function dehumore_href( $pfad ) {
	echo esc_url( dehumore_link( $pfad ) );
}

/* Englische Seite nutzt die Vorlage ihrer deutschen Seite (page-<de-slug>.html). */
add_filter( 'page_template_hierarchy', function ( $vorlagen ) {
	if ( dehumore_en() ) {
		$slug = dehumore_de_slug();
		if ( $slug && ! in_array( 'page-' . $slug . '.php', $vorlagen, true ) ) {
			$pos = array_search( 'page.php', $vorlagen, true );
			array_splice( $vorlagen, false === $pos ? count( $vorlagen ) : $pos, 0, array( 'page-' . $slug . '.php' ) );
		}
	}
	return $vorlagen;
} );

/**
 * Sprachregler DE/EN für die Kopfzeile. Erscheint nur, wenn Polylang aktiv ist
 * und Englisch angelegt wurde. Ohne Übersetzung führt EN zur englischen Startseite.
 */
function dehumore_sprachregler() {
	if ( ! function_exists( 'pll_the_languages' ) ) {
		return '';
	}
	$sprachen = pll_the_languages( array( 'raw' => 1, 'hide_if_empty' => 0, 'hide_if_no_translation' => 0 ) );
	if ( ! is_array( $sprachen ) || empty( $sprachen['de'] ) || empty( $sprachen['en'] ) ) {
		return '';
	}
	$en    = dehumore_en();
	$label = $en ? 'Language' : 'Sprache';
	$html  = '<div class="dh-lang" role="group" aria-label="' . esc_attr( $label ) . '">';
	foreach ( array( 'de' => array( 'DE', 'Deutsch' ), 'en' => array( 'EN', 'English' ) ) as $slug => $text ) {
		$aktiv = ! empty( $sprachen[ $slug ]['current_lang'] );
		$html .= '<a href="' . esc_url( $sprachen[ $slug ]['url'] ) . '" lang="' . esc_attr( $slug ) . '" hreflang="' . esc_attr( $slug ) . '" title="' . esc_attr( $text[1] ) . '"' . ( $aktiv ? ' aria-current="true"' : '' ) . '>' . esc_html( $text[0] ) . '</a>';
	}
	return $html . '<span class="dh-lang-knopf" aria-hidden="true"></span></div>';
}

/**
 * Welche gestaltete Seite gerade angezeigt wird: array( slug, hat_css ) oder null.
 */
function dehumore_seite() {
	$seiten = array(
		array( 'startseite', false, is_front_page() ),
		array( 'humor-verstehen', true, dehumore_ist_seite( 'humor-verstehen' ) ),
		array( 'humor-risk-check', true, is_page_template( 'page-humor-risk-check' ) || dehumore_ist_seite( 'humor-risk-check' ) ),
		array( 'humor-trainieren', true, dehumore_ist_seite( 'humor-kann-man-trainieren' ) ),
		array( 'humor-und-persoenlichkeit', true, dehumore_ist_seite( 'humor-und-persoenlichkeit' ) ),
		array( 'humor-in-organisationen', true, dehumore_ist_seite( 'humor-in-organisationen' ) ),
		array( 'ueber', true, dehumore_ist_seite( 'ueber' ) ),
		array( 'beitrag', true, is_singular( 'post' ) ),
		array( 'blog', true, dehumore_ist_seite( 'blog' ) || is_home() || is_archive() || is_search() ),
		array( 'ueber-mich', false, dehumore_ist_seite( 'ueber-mich' ) ),
		array( 'kontakt', false, dehumore_ist_seite( 'kontakt' ) ),
		array( 'wissenschaftliche-publikationen', false, dehumore_ist_seite( 'wissenschaftliche-publikationen' ) ),
		array( 'presse', false, dehumore_ist_seite( 'presse-podcasts-mit-dr-bastian-mayerhofer' ) ),
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
	if ( is_page_template( 'page-person' ) ) {
		wp_enqueue_style( 'dehumore-personen', get_theme_file_uri( 'assets/css/personen.css' ), array( 'dehumore' ), $v );
	}
	$seite  = dehumore_seite();
	$script = 'site';
	if ( $seite ) {
		$script = ( 'blog' !== $seite[0] && file_exists( get_theme_file_path( 'assets/js/' . $seite[0] . '.js' ) ) ) ? $seite[0] : 'site';
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
		'humor-trainieren'          => 'Humor lässt sich trainieren: mit drei kurzen Reflexionsimpulsen für jeden Tag. Perspektivwechsel üben, Mehrdeutigkeiten entdecken, Situationen umdeuten.',
		'humor-und-persoenlichkeit' => 'Was sagt unser Humor über uns aus? Erfahre, wie Humorstile, Humorpräferenzen und Persönlichkeit zusammenhängen – und warum Humor keine festen Persönlichkeitstypen verrät.',
		'humor-in-organisationen'   => 'Trainings, Workshops und Keynotes zu Humor in Führung, Kommunikation und Teams: forschungsbasiert, praxisnah, mit Dr. Bastian Mayerhofer.',
		'ueber'                     => 'De:Humore ist die Plattform von Dr. Bastian Mayerhofer für Humorforschung und ihre Anwendung: verständlich, differenziert und zum Ausprobieren.',
		'ueber-mich'                => 'Dr. Bastian Mayerhofer ist promovierter Kognitionspsychologe, Humorforscher und Trainer. Wie er Humorforschung, Bühne und Markenkommunikation verbindet.',
		'kontakt'                   => 'Kontakt zu Dr. Bastian Mayerhofer und De:Humore: Anfragen zu Workshops, Keynotes und Humortraining per E-Mail oder im kostenlosen 15-Minuten-Gespräch.',
		'wissenschaftliche-publikationen' => 'Wissenschaftliche Publikationen von Dr. Bastian Mayerhofer zu Humor, Garden-Path-Witzen, Mehrdeutigkeit und probabilistischem Denken.',
		'presse'                    => 'Dr. Bastian Mayerhofer in Presse und Podcasts: Interviews über Humorforschung, Humortraining und warum wir worüber lachen.',
		'blog'                      => 'Der Blog von De:Humore: Beiträge aus Humorforschung und Kognitionswissenschaft, verständlich erklärt und mit Impulsen für Kommunikation und Alltag.',
	);
	if ( dehumore_en() ) {
		$texte = array(
			'startseite'                => 'De:Humore makes humour research accessible: why we laugh, when humour hurts and how to use it deliberately in everyday life and at work.',
			'humor-verstehen'           => 'Understanding humour: what happens when we laugh? Key perspectives from humour research, clearly explained, with findings, theories and open questions kept apart.',
			'humor-risk-check'          => 'When does a joke connect, and when does it hurt? The Humour Risk Check helps you assess a specific joke across five dimensions.',
			'humor-trainieren'          => 'Humour can be trained: three short daily prompts for reflection. Practise switching perspectives, spot ambiguity and reframe situations.',
			'humor-und-persoenlichkeit' => 'What does our humour say about us? How humour styles, humour preferences and personality are related, and why humour does not reveal fixed personality types.',
			'humor-in-organisationen'   => 'Training, workshops and keynotes on humour in leadership, communication and teams: research-based and practical, with Dr Bastian Mayerhofer.',
			'blog'                      => 'Humour Insights from De:Humore: articles on humour research and cognitive science, clearly explained, with ideas for communication and everyday life.',
			'ueber'                     => 'De:Humore is Dr Bastian Mayerhofer’s platform for humour research and how to apply it: clear, nuanced and made to try out.',
		);
	}
	if ( is_category() ) {
		$text = wp_strip_all_tags( (string) term_description() );
		if ( '' !== trim( $text ) ) {
			return trim( $text );
		}
	}
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
		if ( ! $leer && is_singular() && '' === trim( (string) get_post_meta( get_queried_object_id(), '_yoast_wpseo_metadesc', true ) ) ) {
			$leer = true; // Yoast hat nur einen Auszug aus dem Inhalt erzeugt.
		}
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
			if ( '' === $skip && preg_match( '/^<(script|style|textarea|title|svg|noscript|option)\b/i', $teil, $m ) ) {
				$skip = strtolower( $m[1] );
			} elseif ( '' !== $skip && preg_match( '/^<\/' . $skip . '\b/i', $teil ) ) {
				$skip = '';
			}
			continue;
		}
		if ( '' === $skip && false !== strpos( $teil, 'De:Humore' ) ) {
			// In einer Span bündeln, damit Flex-/Grid-Container den Text nicht in Einzelteile zerlegen.
			$teile[ $i ] = '<span class="dh-marke-txt">' . str_replace( 'De:Humore', 'De:<b class="dh-marke">Humore</b>', $teil ) . '</span>';
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

/**
 * Weiterleitungen für umgezogene Adressen (301, pfadgenau).
 */
add_action( 'template_redirect', function () {
	$ziele = array(
		'humor-risk-check-test' => '/humor-risk-check/',
	);
	$pfad = trim( (string) wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
	if ( isset( $ziele[ $pfad ] ) ) {
		wp_safe_redirect( home_url( $ziele[ $pfad ] ), 301 );
		exit;
	}
}, 0 );

/**
 * Jetpack-„Teilen mit“ und „Gefällt mir“ auf der ganzen Site aus (Bastian, 24.11.2026).
 */
add_filter( 'sharing_show', '__return_false', 99 );
add_filter( 'wpl_is_likes_visible', '__return_false', 99 );
add_filter( 'jetpack_sharing_counts', '__return_false', 99 );

/**
 * Danke-Seiten nicht in Google und nicht in der Sitemap.
 */
function dehumore_noindex_seite() {
	return is_page( 'newsletter-bestaetigt' );
}
add_filter( 'wpseo_robots', function ( $robots ) {
	return dehumore_noindex_seite() ? 'noindex, follow' : $robots;
} );
add_filter( 'wpseo_exclude_from_sitemap_by_post_ids', function ( $ids ) {
	$seite = get_page_by_path( 'newsletter-bestaetigt' );
	if ( $seite ) {
		$ids[] = $seite->ID;
	}
	return $ids;
} );

/**
 * Standard-Teilen-Bild (1200 × 630) für Seiten ohne eigenes Beitragsbild.
 */
add_action( 'wpseo_add_opengraph_additional_images', function ( $bilder ) {
	if ( is_object( $bilder ) && method_exists( $bilder, 'add_image' ) ) {
		$bilder->add_image(
			array(
				'url'    => get_theme_file_uri( 'assets/img/dehumore-teilen.jpg' ),
				'width'  => 1200,
				'height' => 630,
				'type'   => 'image/jpeg',
				'alt'    => dehumore_en() ? 'De:Humore – humour as a window into the human mind. Dr Bastian Mayerhofer' : 'De:Humore – Humor als Fenster auf den menschlichen Geist. Dr. Bastian Mayerhofer',
			)
		);
	}
} );

/**
 * Themen-Kategorien von Humor-Wissen, in fester Reihenfolge, mit ihrer Pillar-Seite.
 */
function dehumore_kategorien() {
	return array(
		'kognition'           => array( '/humor-verstehen/', 'Humor verstehen' ),
		'evolution-und-spiel' => array( '/humor-verstehen/', 'Humor verstehen' ),
		'kontext-und-grenzen' => array( '/humor-risk-check/', 'Humor Risk Check' ),
		'forschung-kritisch'  => array( '/humor-verstehen/', 'Humor verstehen' ),
		'humor-trainieren'    => array( '/humor-kann-man-trainieren/', 'Humor trainieren' ),
		'persoenlichkeit'     => array( '/humor-und-persoenlichkeit/', 'Humor und Persönlichkeit' ),
		'organisationen'      => array( '/humor-in-organisationen/', 'Humor in Organisationen' ),
	);
}

/**
 * Kategorie-Filter für die Übersicht und die Kategorieseiten.
 * Leere Kategorien werden ausgeblendet, die aktuelle ist markiert.
 */
function dehumore_kategorien_filter() {
	$en    = dehumore_en();
	$blogs = get_page_by_path( 'blog' );
	if ( $en && $blogs && function_exists( 'pll_get_post' ) ) {
		$blog_en = pll_get_post( $blogs->ID, 'en' );
		$blogs   = ( $blog_en && 'publish' === get_post_status( $blog_en ) ) ? get_post( $blog_en ) : $blogs;
	}
	$blog  = $blogs ? get_permalink( $blogs ) : home_url( '/blog/' );
	$alle  = ! is_category();
	$html  = '<nav class="bl-filter" aria-label="' . ( $en ? 'Filter articles by topic' : 'Beiträge nach Thema filtern' ) . '"><span class="bl-filter-label">' . ( $en ? 'Topics' : 'Themen' ) . '</span><ul>';
	$html .= '<li><a href="' . esc_url( $blog ) . '#h-alle"' . ( $alle ? ' aria-current="page"' : '' ) . '>' . ( $en ? 'All' : 'Alle' ) . '</a></li>';
	$aktuell = is_category() ? get_queried_object_id() : 0;
	foreach ( array_keys( dehumore_kategorien() ) as $slug ) {
		$term = get_term_by( 'slug', $slug, 'category' );
		if ( $term && $en ) {
			$en_id = function_exists( 'pll_get_term' ) ? pll_get_term( $term->term_id, 'en' ) : 0;
			$term  = $en_id ? get_term( $en_id, 'category' ) : null;
		}
		if ( ! $term || is_wp_error( $term ) || ( 0 === (int) $term->count && (int) $term->term_id !== $aktuell ) ) {
			continue;
		}
		$aktiv = ( (int) $term->term_id === $aktuell ) ? ' aria-current="page"' : '';
		$html .= '<li><a href="' . esc_url( get_category_link( $term ) ) . '#h-alle"' . $aktiv . '>' . esc_html( $term->name ) . ' <span class="bl-filter-n">' . (int) $term->count . '</span></a></li>';
	}
	return $html . '</ul></nav>';
}

/* Seitentitel der Kategorieseiten statt „… Archive“. */
foreach ( array( 'wpseo_title', 'wpseo_opengraph_title' ) as $dehumore_filter ) {
	add_filter( $dehumore_filter, function ( $title ) {
		if ( is_category() && ! is_paged() ) {
			return single_cat_title( '', false ) . ': Beiträge auf Humor-Wissen | De:Humore';
		}
		return $title;
	} );
}

/*
 * Einmalige Polylang-Einrichtung (Deutsch + British English).
 * Läuft nur, wenn Polylang aktiv ist, und hört auf, sobald alles erledigt ist.
 * Jeder Schritt ist wiederholbar; nichts wird gelöscht.
 */
function dehumore_en_seiten() {
	// EN-Slug => DE-Slug
	return array(
		'humour-risk-check'       => 'humor-risk-check',
		'training-humour'         => 'humor-kann-man-trainieren',
		'understanding-humour'    => 'humor-verstehen',
		'humour-and-personality'  => 'humor-und-persoenlichkeit',
		'humour-in-organisations' => 'humor-in-organisationen',
		'about'                   => 'ueber',
	);
}

function dehumore_seite_nach_slug( $slug ) {
	$treffer = get_posts( array(
		'name'             => $slug,
		'post_type'        => 'page',
		'post_status'      => array( 'draft', 'publish', 'pending', 'private' ),
		'numberposts'      => 1,
		'lang'             => '',
		'suppress_filters' => false,
	) );
	return $treffer ? $treffer[0] : null;
}

add_action( 'init', function () {
	if ( 'fertig' === get_option( 'dehumore_en_setup' ) ) {
		return;
	}
	if ( ! function_exists( 'PLL' ) || ! function_exists( 'pll_set_post_language' ) || ! PLL() || empty( PLL()->model ) ) {
		return;
	}
	if ( get_transient( 'dehumore_en_setup_sperre' ) ) {
		return;
	}
	set_transient( 'dehumore_en_setup_sperre', 1, 60 );

	$model = PLL()->model;
	$log   = array();

	// 1. Sprachen anlegen.
	$sprachen = array(
		array( 'name' => 'Deutsch', 'slug' => 'de', 'locale' => 'de_DE', 'rtl' => 0, 'term_group' => 0, 'flag' => 'de' ),
		array( 'name' => 'English', 'slug' => 'en', 'locale' => 'en_GB', 'rtl' => 0, 'term_group' => 1, 'flag' => 'gb' ),
	);
	$vorhanden = function_exists( 'pll_languages_list' ) ? (array) pll_languages_list( array( 'fields' => 'slug' ) ) : array();
	foreach ( $sprachen as $s ) {
		if ( in_array( $s['slug'], $vorhanden, true ) ) {
			continue;
		}
		if ( isset( $model->languages ) && is_object( $model->languages ) && method_exists( $model->languages, 'add' ) ) {
			$r = $model->languages->add( $s );
		} elseif ( method_exists( $model, 'add_language' ) ) {
			$r = $model->add_language( $s );
		} else {
			$r = new WP_Error( 'dehumore', 'keine Methode zum Anlegen' );
		}
		$log[] = $s['slug'] . ': ' . ( is_wp_error( $r ) ? $r->get_error_message() : 'angelegt' );
	}
	if ( method_exists( $model, 'clean_languages_cache' ) ) {
		$model->clean_languages_cache();
	}
	$vorhanden = (array) pll_languages_list( array( 'fields' => 'slug' ) );
	if ( ! in_array( 'de', $vorhanden, true ) || ! in_array( 'en', $vorhanden, true ) ) {
		update_option( 'dehumore_en_setup', 'fehler: ' . implode( '; ', $log ), false );
		return;
	}

	// 2. Einstellungen: Verzeichnis-URLs, deutsche URLs ohne /de/, keine Browser-Weiterleitung.
	$werte = array( 'force_lang' => 1, 'hide_default' => 1, 'rewrite' => 1, 'browser' => 0, 'redirect_lang' => 0, 'media_support' => 0, 'default_lang' => 'de' );
	$opt   = isset( PLL()->options ) ? PLL()->options : null;
	if ( is_object( $opt ) && $opt instanceof ArrayAccess ) {
		foreach ( $werte as $k => $v ) {
			$opt[ $k ] = $v;
		}
		if ( method_exists( $opt, 'save' ) ) {
			$opt->save();
		}
	} else {
		$o = (array) get_option( 'polylang', array() );
		update_option( 'polylang', array_merge( $o, $werte ) );
	}

	// 3. Englische Seiten verknüpfen.
	$fehlt = array();
	foreach ( dehumore_en_seiten() as $en_slug => $de_slug ) {
		$en = dehumore_seite_nach_slug( $en_slug );
		$de = dehumore_seite_nach_slug( $de_slug );
		if ( ! $en || ! $de ) {
			$fehlt[] = $en_slug;
			continue;
		}
		pll_set_post_language( $en->ID, 'en' );
		pll_set_post_language( $de->ID, 'de' );
		pll_save_post_translations( array( 'de' => $de->ID, 'en' => $en->ID ) );
	}

	// 4. Alles ohne Sprache wird Deutsch.
	{
		$typen = array_filter( array_values( get_post_types( array( 'public' => true ) ) ), function ( $t ) {
			return 'attachment' !== $t && ( ! function_exists( 'pll_is_translated_post_type' ) || pll_is_translated_post_type( $t ) );
		} );
		foreach ( get_posts( array( 'post_type' => array_values( $typen ), 'post_status' => 'any', 'numberposts' => -1, 'fields' => 'ids', 'lang' => '', 'suppress_filters' => false ) ) as $id ) {
			if ( ! pll_get_post_language( $id ) ) {
				pll_set_post_language( $id, 'de' );
			}
		}
		$begriffe = get_terms( array( 'taxonomy' => array( 'category', 'post_tag' ), 'hide_empty' => false, 'lang' => '' ) );
		foreach ( is_wp_error( $begriffe ) ? array() : $begriffe as $t ) {
			if ( function_exists( 'pll_get_term_language' ) && ! pll_get_term_language( $t->term_id ) ) {
				pll_set_term_language( $t->term_id, 'de' );
			}
		}
	}

	// 5. Englische Seiten veröffentlichen.
	if ( ! $fehlt ) {
		foreach ( array_keys( dehumore_en_seiten() ) as $en_slug ) {
			$en = dehumore_seite_nach_slug( $en_slug );
			if ( $en && 'publish' !== $en->post_status ) {
				wp_update_post( array( 'ID' => $en->ID, 'post_status' => 'publish' ) );
			}
		}
	}

	flush_rewrite_rules( false );
	update_option( 'dehumore_en_flush', 1, false );
	update_option( 'dehumore_en_setup', $fehlt ? 'wartet auf: ' . implode( ', ', $fehlt ) : 'fertig', false );
	delete_transient( 'dehumore_en_setup_sperre' );
}, 99 );

// Permalinks nach der Einrichtung einmal neu schreiben, wenn Polylang die Sprachen kennt.
add_action( 'init', function () {
	if ( get_option( 'dehumore_en_flush' ) && function_exists( 'pll_languages_list' ) && pll_languages_list() ) {
		delete_option( 'dehumore_en_flush' );
		flush_rewrite_rules( false );
	}
}, 100 );

// Englischer Untertitel der Website.
add_filter( 'option_blogdescription', function ( $text ) {
	return dehumore_en() ? 'More lightness when things get serious.' : $text;
}, 20 );

/* ---------- Englische Beiträge (Polylang-Übersetzungen) ---------- */

/*
 * Verknüpfung per Meta „dh_uebersetzung_von“ = ID des deutschen Originals.
 * So können Beiträge, Seiten und Kategorien über REST (MCP, Importer) als
 * englische Übersetzung angelegt werden, ohne Polylang Pro.
 */
add_action( 'init', function () {
	foreach ( array( 'post', 'page' ) as $typ ) {
		register_post_meta( $typ, 'dh_uebersetzung_von', array(
			'type'          => 'integer',
			'single'        => true,
			'show_in_rest'  => true,
			'default'       => 0,
			'auth_callback' => function () {
				return current_user_can( 'edit_posts' );
			},
		) );
	}
	register_term_meta( 'category', 'dh_uebersetzung_von', array(
		'type'          => 'integer',
		'single'        => true,
		'show_in_rest'  => true,
		'default'       => 0,
		'auth_callback' => function () {
			return current_user_can( 'manage_categories' );
		},
	) );
} );

function dehumore_verknuepfe_beitrag( $id ) {
	$de = (int) get_post_meta( $id, 'dh_uebersetzung_von', true );
	if ( ! $de || $de === (int) $id || ! get_post( $de ) || ! function_exists( 'pll_save_post_translations' ) ) {
		return;
	}
	if ( 'en' !== pll_get_post_language( $id ) ) {
		pll_set_post_language( $id, 'en' );
	}
	if ( ! pll_get_post_language( $de ) ) {
		pll_set_post_language( $de, 'de' );
	}
	$tr       = pll_get_post_translations( $de );
	$tr['de'] = $de;
	$tr['en'] = (int) $id;
	if ( pll_get_post_translations( $id ) !== $tr ) {
		pll_save_post_translations( $tr );
	}
	// Deutsche Kategorien durch ihre englischen Übersetzungen ersetzen.
	if ( 'post' === get_post_type( $id ) && function_exists( 'pll_get_term' ) ) {
		$alt = wp_get_post_categories( $id );
		$neu = array();
		foreach ( $alt as $k ) {
			$en    = pll_get_term( $k, 'en' );
			$neu[] = $en ? (int) $en : (int) $k;
		}
		if ( $neu && $neu !== array_map( 'intval', $alt ) ) {
			wp_set_post_categories( $id, $neu );
		}
	}
}
add_action( 'wp_after_insert_post', function ( $id ) {
	dehumore_verknuepfe_beitrag( $id );
}, 30 );
foreach ( array( 'post', 'page' ) as $dehumore_typ ) {
	add_action( 'rest_after_insert_' . $dehumore_typ, function ( $post ) {
		dehumore_verknuepfe_beitrag( $post->ID );
	}, 30 );
}

function dehumore_verknuepfe_kategorie( $id ) {
	$de = (int) get_term_meta( $id, 'dh_uebersetzung_von', true );
	if ( ! $de || $de === (int) $id || ! get_term( $de, 'category' ) || ! function_exists( 'pll_save_term_translations' ) ) {
		return;
	}
	pll_set_term_language( $id, 'en' );
	if ( ! pll_get_term_language( $de ) ) {
		pll_set_term_language( $de, 'de' );
	}
	$tr       = pll_get_term_translations( $de );
	$tr['de'] = $de;
	$tr['en'] = (int) $id;
	pll_save_term_translations( $tr );
}
add_action( 'rest_after_insert_category', function ( $term ) {
	dehumore_verknuepfe_kategorie( $term->term_id );
}, 30 );
add_action( 'edited_category', 'dehumore_verknuepfe_kategorie', 30 );

/* Datumsformat und Template-Texte auf Englisch. */
add_filter( 'option_date_format', function ( $f ) {
	return dehumore_en() ? 'j F Y' : $f;
}, 20 );

function dehumore_vorlagen_texte_en() {
	return array(
		'Weiterlesen →'                => 'Read more →',
		'>Start<'                      => '>Home<',
		'>Humor-Wissen<'               => '>Humour Insights<',
		'aria-label="Inhalt"'          => 'aria-label="Contents"',
		'>Inhalt<'                     => '>Contents<',
		'Newsletter abonnieren'        => 'Subscribe to the newsletter (in German)',
		'aria-label="Teilen"'          => 'aria-label="Share"',
		'Auf LinkedIn teilen'          => 'Share on LinkedIn',
		'Link kopieren'                => 'Copy link',
		'Geschrieben von'              => 'Written by',
		'Kognitionspsychologe mit Promotion in Psycholinguistik zur neurokognitiven Verarbeitung von Humor. Der wissenschaftliche Kopf hinter De:Humore.' => 'Cognitive psychologist with a PhD in psycholinguistics on the neurocognitive processing of humour. The scientific mind behind De:Humore.',
		'Mehr über Bastian'            => 'More about Bastian (in German)',
		'Dr. Bastian Mayerhofer'       => 'Dr Bastian Mayerhofer',
		'>Weiterlesen<'                => '>Read on<',
		'Noch ein Frosch gefällig?'    => 'Fancy another frog?',
		'Alle Beiträge'                => 'All articles',
		'Neue Beiträge, ohne Frosch-Spam.' => 'New articles, no frog spam.',
		'<b>Gratis zur Anmeldung:</b> das E-Paper „10 Humor-Hacks für mehr Leichtigkeit“' => '<b>Free when you sign up:</b> the e-paper “10 Humour Hacks for More Lightness” (in German)',
		'Abmelden geht jederzeit, Details in der' => 'You can unsubscribe at any time. Details in our',
		'>Datenschutzerklärung<'       => '>privacy policy (in German)<',
		'Zack. Und wieder stirbt ein Frosch.' => 'Zap … and another frog bites the dust.',
		'Beiträge aus Humorforschung, Kognitionswissenschaft und Alltag: verständlich erklärt, mit Quellen und einem Augenzwinkern.' => 'Articles from humour research, cognitive science and everyday life: clearly explained, with sources and a twinkle in the eye.',
		'„Humor zu analysieren ist wie einen Frosch zu sezieren. Nur wenige interessiert es … und der Frosch stirbt dabei.“<small>Berühmtes Zitat</small>' => '“Humor can be dissected, as a frog can, but the thing dies in the process and the innards are discouraging to any but the pure scientific mind.”<small>E. B. White</small>',
		'„Mit einer speziellen Veranlagung macht es verdammt viel Spaß.“' => '“With the right disposition, it is a hell of a lot of fun.”',
		'aria-label="Themen"'          => 'aria-label="Topics"',
		'>Wann Humor verletzt<'        => '>When humour hurts<',
		'>Humor und Persönlichkeit<'   => '>Humour and personality<',
		'>Humor in Organisationen<'    => '>Humour in organisations<',
		'>Neu<'                        => '>New<',
		'"Neuere"'                     => '"Newer"',
		'>Neuere<'                     => '>Newer<',
		'>Ältere<'                     => '>Older<',
		'Zu diesem Thema gibt es noch keine Beiträge.' => 'There are no English articles on this topic yet.',
		'Alle Beiträge ansehen'        => 'See all articles',
		'Fehler 404'                   => 'Error 404',
		'Diese Seite gibt es nicht. Noch nicht.' => 'This page does not exist. Not yet.',
		'Vielleicht hilft der Weg zurück zur' => 'Perhaps the way back to the',
		'>Startseite<'                 => '>home page<',
	);
}

add_filter( 'render_block', function ( $html, $block ) {
	if ( ! dehumore_en() || empty( $block['blockName'] ) ) {
		return $html;
	}
	$typen = array( 'core/html', 'core/paragraph', 'core/heading', 'core/post-excerpt', 'core/query-pagination-previous', 'core/query-pagination-next', 'core/query-no-results' );
	if ( ! in_array( $block['blockName'], $typen, true ) ) {
		return $html;
	}
	$map  = dehumore_vorlagen_texte_en();
	$html = str_replace( array_keys( $map ), array_values( $map ), $html );
	// Interne Links auf die englische Fassung umbiegen, wenn es eine gibt.
	return preg_replace_callback( '#href="(/[^"\#?]*)(\#[^"]*)?"#', function ( $m ) {
		if ( 0 === strpos( $m[1], '/en/' ) || 0 === strpos( $m[1], '/wp-' ) ) {
			return $m[0];
		}
		return 'href="' . esc_url( dehumore_link( $m[1] . ( isset( $m[2] ) ? $m[2] : '' ) ) ) . '"';
	}, $html );
}, 20, 2 );

/* Englische Kategorien mit den deutschen verknüpfen (EN-Slug => DE-Slug). */
function dehumore_en_kategorien() {
	return array(
		'cognition'               => 'kognition',
		'evolution-and-play'      => 'evolution-und-spiel',
		'context-and-limits'      => 'kontext-und-grenzen',
		'research-under-scrutiny' => 'forschung-kritisch',
		'humour-training'         => 'humor-trainieren',
		'personality'             => 'persoenlichkeit',
		'organisations'           => 'organisationen',
	);
}
add_action( 'init', function () {
	if ( ! function_exists( 'pll_save_term_translations' ) || get_transient( 'dehumore_en_kat_geprueft' ) ) {
		return;
	}
	set_transient( 'dehumore_en_kat_geprueft', 1, HOUR_IN_SECONDS );
	foreach ( dehumore_en_kategorien() as $en_slug => $de_slug ) {
		$en = get_term_by( 'slug', $en_slug, 'category' );
		$de = get_term_by( 'slug', $de_slug, 'category' );
		if ( ! $en || ! $de || (int) pll_get_term( $de->term_id, 'en' ) === (int) $en->term_id ) {
			continue;
		}
		pll_set_term_language( $en->term_id, 'en' );
		pll_set_term_language( $de->term_id, 'de' );
		pll_save_term_translations( array( 'de' => $de->term_id, 'en' => $en->term_id ) );
	}
}, 120 );
