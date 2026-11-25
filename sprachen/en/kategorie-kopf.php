<?php
/* Englischer Kategorie-Kopf. Variablen kommen aus patterns/kategorie-kopf.php. */
$dh_de_slug = '';
if ( $dh_term && isset( $dh_term->term_id ) && function_exists( 'pll_get_term' ) ) {
	$dh_de_id = pll_get_term( $dh_term->term_id, 'de' );
	$dh_de    = $dh_de_id ? get_term( $dh_de_id, 'category' ) : null;
	$dh_de_slug = ( $dh_de && ! is_wp_error( $dh_de ) ) ? $dh_de->slug : '';
}
$dh_pillars_en = array(
	'/humor-verstehen/'           => 'Understanding Humour',
	'/humor-risk-check/'          => 'Humour Risk Check',
	'/humor-kann-man-trainieren/' => 'Training Humour',
	'/humor-und-persoenlichkeit/' => 'Humour and Personality',
	'/humor-in-organisationen/'   => 'Humour in Organisations',
);
$dh_pillar = ( $dh_de_slug && isset( $dh_map[ $dh_de_slug ] ) ) ? $dh_map[ $dh_de_slug ] : null;
?>
<!-- wp:html -->
<section class="dh-wrap bl-hero bl-hero--kat" aria-labelledby="h-kat">
	<p class="dh-kicker"><a href="<?php dehumore_href( '/blog/' ); ?>">Humour Insights</a> · Topic</p>
	<h1 id="h-kat"><?php echo esc_html( $dh_name ); ?></h1>
	<?php if ( $dh_desc ) : ?><p class="dh-lead bl-kat-desc"><?php echo esc_html( wp_strip_all_tags( $dh_desc ) ); ?></p><?php endif; ?>
	<?php if ( $dh_pillar ) : ?><a class="dh-link bl-kat-pillar" href="<?php dehumore_href( $dh_pillar[0] ); ?>">Overview: <?php echo esc_html( isset( $dh_pillars_en[ $dh_pillar[0] ] ) ? $dh_pillars_en[ $dh_pillar[0] ] : $dh_pillar[1] ); ?></a><?php endif; ?>
</section>
<div class="dh-wrap bl-all"><div class="bl-list-head"><h2 class="dh-h2" id="h-alle">Articles on this topic</h2></div><?php echo dehumore_kategorien_filter(); // phpcs:ignore ?></div>
<!-- /wp:html -->
