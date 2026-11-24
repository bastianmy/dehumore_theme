<?php
/**
 * Title: Kategorie-Kopf
 * Slug: dehumore/kategorie-kopf
 * Inserter: no
 */
$dh_term   = get_queried_object();
$dh_name   = ( $dh_term && isset( $dh_term->name ) ) ? $dh_term->name : 'Humor-Wissen';
$dh_desc   = ( $dh_term && isset( $dh_term->description ) ) ? $dh_term->description : '';
$dh_map    = dehumore_kategorien();
$dh_pillar = ( $dh_term && isset( $dh_term->slug, $dh_map[ $dh_term->slug ] ) ) ? $dh_map[ $dh_term->slug ] : null;
?>
<!-- wp:html -->
<section class="dh-wrap bl-hero bl-hero--kat" aria-labelledby="h-kat">
	<p class="dh-kicker"><a href="/blog/">Humor-Wissen</a> · Thema</p>
	<h1 id="h-kat"><?php echo esc_html( $dh_name ); ?></h1>
	<?php if ( $dh_desc ) : ?><p class="dh-lead bl-kat-desc"><?php echo esc_html( wp_strip_all_tags( $dh_desc ) ); ?></p><?php endif; ?>
	<?php if ( $dh_pillar ) : ?><a class="dh-link bl-kat-pillar" href="<?php echo esc_url( $dh_pillar[0] ); ?>">Überblick: <?php echo esc_html( $dh_pillar[1] ); ?></a><?php endif; ?>
</section>
<div class="dh-wrap bl-all"><div class="bl-list-head"><h2 class="dh-h2" id="h-alle">Beiträge zum Thema</h2></div><?php echo dehumore_kategorien_filter(); // phpcs:ignore ?></div>
<!-- /wp:html -->
