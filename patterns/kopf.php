<?php
/**
 * Title: Kopfzeile
 * Slug: dehumore/kopf
 * Inserter: no
 */
?>
<!-- wp:html -->
<header class="dh-header" id="kopf">
	<div class="dh-wrap">
		<a class="dh-logo" href="/" aria-label="De:Humore, zur Startseite"><img src="<?php echo esc_url( get_theme_file_uri( "assets/img/dehumore-logo.png" ) ); ?>" alt="De:Humore" width="126" height="54"></a>
		<button class="dh-burger" id="burger" aria-expanded="false" aria-controls="menue" aria-label="Menü öffnen"><span></span><span></span><span></span></button>
		<nav class="dh-nav" id="menue" aria-label="Hauptmenü">
			<a href="/humor-verstehen/">Wissen</a>
			<a href="/blog/">Blog</a>
			<a href="/humor-risk-check/">Humor Risk Check</a>
			<a href="/humor-kann-man-trainieren/">Humor trainieren</a>
			<a href="/humor-in-organisationen/">Für Organisationen</a>
			<a href="/ueber/">Über De:Humore</a>
		</nav>
	</div>
</header>

<!-- /wp:html -->
