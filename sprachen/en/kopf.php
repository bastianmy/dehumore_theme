<?php
/**
 * Kopfzeile, englische Fassung (britisches Englisch).
 */
?>
<!-- wp:html -->
<header class="dh-header" id="kopf">
	<div class="dh-wrap">
		<a class="dh-logo" href="<?php dehumore_href( '/' ); ?>" aria-label="De:Humore, home"><img src="<?php echo esc_url( get_theme_file_uri( "assets/img/dehumore-logo.png" ) ); ?>" alt="De:Humore" width="126" height="54"></a>
		<button class="dh-burger" id="burger" aria-expanded="false" aria-controls="menue" aria-label="Open menu"><span></span><span></span><span></span></button>
		<nav class="dh-nav" id="menue" aria-label="Main menu">
			<a href="<?php dehumore_href( '/blog/' ); ?>">Humour Insights</a>
			<a href="<?php dehumore_href( '/humor-risk-check/' ); ?>">Humour Risk Check</a>
			<a href="<?php dehumore_href( '/humor-kann-man-trainieren/' ); ?>">Training Humour</a>
			<a href="<?php dehumore_href( '/humor-und-persoenlichkeit/' ); ?>">Humour and Personality</a>
			<a href="<?php dehumore_href( '/humor-in-organisationen/' ); ?>">For Organisations</a>
			<a href="<?php dehumore_href( '/ueber/' ); ?>">About De:Humore</a>
		</nav>
		<?php echo dehumore_sprachregler(); ?>
	</div>
</header>

<!-- /wp:html -->
