<?php
/**
 * Über De:Humore, englische Fassung (britisches Englisch). Entwurf zur Prüfung.
 */
?>
<!-- wp:html -->
<main id="start">

	<section class="ub-hero dh-wrap" id="hero" aria-labelledby="h-ub">
		<div class="ub-hero-grid">
			<div class="dh-stack" style="gap:24px">
				<p class="dh-kicker">About De:Humore</p>
				<h1 id="h-ub">Humour as a window into the human <span class="hl">mind</span>.</h1>
				<p class="dh-lead">De:Humore is Dr Bastian Mayerhofer’s platform for humour research and how to apply it. Find out what humour reveals about the way we think, when it brings people together and when it hurts, and how to use it more consciously in everyday life and at work.</p>
				<div class="dh-actions"><a class="dh-btn" href="#weiter">Where to begin</a><a class="dh-link" href="#kopf">The mind behind it</a></div>
			</div>
			<div class="ub-logo" aria-hidden="true"><img src="<?php echo esc_url( get_theme_file_uri( "assets/img/dehumore-logo.png" ) ); ?>" alt=""></div>
		</div>
	</section>

	<section class="dh-section dh-wrap" aria-labelledby="h-wofuer">
		<div class="ub-head">
			<p class="dh-kicker dh-rise">What De:Humore stands for</p>
			<h2 class="dh-h2 dh-rise" id="h-wofuer">Thinking seriously about humour. Without losing our sense of humour.</h2>
		</div>
		<div class="ub-pillars">
			<article class="ub-pillar dh-rise" style="--c: var(--lime)"><h3>Research made clear</h3><p>What humour research knows, clearly explained. Findings, theories and open questions kept neatly apart.</p></article>
			<article class="ub-pillar dh-rise" style="--c: var(--peach)"><h3>Potential and limits</h3><p>Humour is not good per se. It can connect people and ease tension, but it can also exclude and hurt. Both are part of the picture.</p></article>
			<article class="ub-pillar dh-rise" style="--c: #8f8fe6"><h3>Made to try out</h3><p>Exercises, questions for reflection and the Humour Risk Check bring the research into your everyday life and into teams.</p></article>
		</div>
	</section>

	<section class="dh-wrap" id="kopf" aria-labelledby="h-kopf">
		<div class="ub-kopf">
			<div class="photo dh-rise"><img src="<?php echo esc_url( get_theme_file_uri( "assets/img/dr-bastian-mayerhofer-zwei-finger-1600.jpg" ) ); ?>" srcset="<?php echo esc_url( get_theme_file_uri( "assets/img/dr-bastian-mayerhofer-zwei-finger-900.jpg" ) ); ?> 900w, <?php echo esc_url( get_theme_file_uri( "assets/img/dr-bastian-mayerhofer-zwei-finger-1600.jpg" ) ); ?> 1600w" sizes="(max-width: 900px) 100vw, 600px" alt="Dr Bastian Mayerhofer smiling and pointing upwards with both index fingers" width="1600" height="1068" loading="lazy"></div>
			<div class="dh-stack" style="gap:22px">
				<p class="dh-kicker dh-rise">The mind behind De:Humore</p>
				<h2 class="dh-h2 dh-rise" id="h-kopf">Dr Bastian Mayerhofer</h2>
				<p class="dh-lead dh-rise">Cognitive psychologist and psycholinguist. At the University of Göttingen, he researched what happens in the mind when we understand garden-path jokes: jokes that first lure us into one interpretation and then make us think again. At De:Humore, he is the author, the scientific mind and the visible voice behind it.</p>
				<figure class="dh-frog" id="frog">
					<blockquote>
						<p class="q1">“Analysing humour is like dissecting a frog.</p>
						<p class="old"><span>Few people are interested and the frog dies of it.”</span></p>
						<p class="new dh-voice"><span class="mk">With the right disposition,</span> <span class="mk">it is a hell of a lot of fun.</span></p>
					</blockquote>
					<figcaption class="dh-small dh-muted">After E. B. White. The reply underneath is Bastian’s.</figcaption>
				</figure>
				<a class="dh-link dh-rise" href="https://bastianmayerhofer.com/ueber-mich/" hreflang="de">Full biography and speaker topics (in German)</a>
			</div>
		</div>
	</section>

	<section class="dh-section dh-wrap" id="weiter" aria-labelledby="h-weiter">
		<div class="ub-head">
			<p class="dh-kicker dh-rise">Where to begin</p>
			<h2 class="dh-h2 dh-rise" id="h-weiter">Choose your way in.</h2>
		</div>
		<div class="ub-ways">
			<a class="ub-way dh-rise" href="<?php dehumore_href( '/humor-und-persoenlichkeit/' ); ?>"><b>Humour and Personality</b><span>What we find funny and how we use humour.</span></a>
			<a class="ub-way peach dh-rise" href="<?php dehumore_href( '/humor-risk-check/' ); ?>"><b>Humour Risk Check</b><span>When a joke connects and when it can hurt.</span></a>
			<a class="ub-way dark dh-rise" href="<?php dehumore_href( '/humor-in-organisationen/' ); ?>"><b>For Organisations</b><span>Training, workshops and keynotes for teams and leaders.</span></a>
			<a class="ub-way dh-rise" href="<?php dehumore_href( '/blog/' ); ?>"><b>Humour Insights</b><span>Articles on humour, thinking and everyday life (in German).</span></a>
		</div>
	</section>

	<section class="dh-wrap" aria-labelledby="h-close" style="padding-bottom:var(--section)">
		<div class="ub-close">
			<h2 id="h-close">New articles from humour research, straight to your inbox.</h2>
			<div class="dh-actions"><a class="dh-btn" href="<?php dehumore_href( '/#newsletter' ); ?>">Subscribe to the newsletter</a><a class="dh-link" href="mailto:bastian@dehumore.com">Get in touch</a></div>
		</div>
	</section>

</main>
<!-- /wp:html -->
