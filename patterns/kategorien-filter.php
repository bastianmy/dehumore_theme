<?php
/**
 * Title: Kategorie-Filter
 * Slug: dehumore/kategorien-filter
 * Inserter: no
 */
if ( function_exists( 'dehumore_muster_en' ) && dehumore_muster_en( 'kategorien-filter' ) ) {
	return;
}
?>
<!-- wp:html -->
<?php echo dehumore_kategorien_filter(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
<!-- /wp:html -->
