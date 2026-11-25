<?php
/**
 * Startseite, englische Fassung (britisches Englisch). Entwurf zur Prüfung.
 */
?>
<!-- wp:html -->
<main id="start">

	<!-- 1 Hero -->
	<section class="dh-hero dh-wrap" id="hero" aria-labelledby="h-hero">
		<div class="dh-hero-grid">
			<div class="dh-hero-text">
				<p class="dh-kicker">De:Humore · Humour research and cognitive science</p>
				<h1 id="h-hero">More <span class="hl">lightness</span> when things get serious.</h1>
				<p class="dh-lead">De:Humore brings together humour research, exercises for your everyday life and training for teams. Discover how humour arises, how to sharpen your eye for it and what matters when you use it.</p>
				<div class="dh-actions">
					<a class="dh-btn" href="<?php dehumore_href( '/blog/' ); ?>">Read the articles</a>
					<a class="dh-btn dh-btn--ghost" href="<?php dehumore_href( '/humor-in-organisationen/' ); ?>">For organisations</a>
				</div>
				<p class="dh-sender"><img src="<?php echo esc_url( get_theme_file_uri( "assets/img/beginnt-zu-lachen.jpg" ) ); ?>" alt="" width="44" height="44"><span>A science-based platform about the <del class="dh-x">second most beautiful</del> <ins class="dh-y">third most beautiful</ins> thing in the world. By <strong>Dr Bastian Mayerhofer</strong>.</span></p>
			</div>
			<div class="dh-hero-photo">
				<img src="<?php echo esc_url( get_theme_file_uri( "assets/img/witz-karte.jpg" ) ); ?>" alt="" width="1400" height="934">
				<img class="lacht" src="<?php echo esc_url( get_theme_file_uri( "assets/img/witz-karte-lachen.jpg" ) ); ?>" alt="Dr Bastian Mayerhofer holding a card with the German word „Witz“ (joke) and laughing" width="1400" height="934">
			</div>
		</div>
	</section>

	<!-- 2 Drei Einstiegswege -->
	<section class="dh-wrap" aria-labelledby="h-wege">
		<div class="dh-stack">
			<p class="dh-kicker dh-rise">Getting started</p>
			<h2 class="dh-h2 dh-rise" id="h-wege">Where would you like to begin?</h2>
		</div>
		<div class="dh-paths">
			<a class="dh-path dh-rise" href="<?php dehumore_href( '/blog/' ); ?>">
				<span class="ic" style="background: var(--lime)"><svg viewBox="0 0 32 32" fill="none" stroke="#0b303b" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 6c-2-2.5-7-2-8 1.5C5 8 4 11 5.5 13 4 15 4.5 18.5 7 19.5c0 3 3.5 5.5 6.5 4.5L16 26V6Z"/><path d="M16 6c2-2.5 7-2 8 1.5 3 .5 4 3.5 2.5 5.5 1.5 2 1 5.5-1.5 6.5 0 3-3.5 5.5-6.5 4.5L16 26"/></svg></span>
				<h3>Understanding humour</h3>
				<p>Ever wondered why we actually laugh? The articles cover research, explanations and stories about how humour and thinking are connected.</p>
				<span class="dh-link">To the articles</span>
			</a>
			<a class="dh-path dh-rise" href="<?php dehumore_href( '/humor-risk-check/' ); ?>">
				<span class="ic" style="background: var(--peach)"><svg viewBox="0 0 32 32" fill="none" stroke="#0b303b" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 4 5 8v7c0 6.5 4.6 11.5 11 13 6.4-1.5 11-6.5 11-13V8z"/><path d="m11.5 16 3 3 6-6"/></svg></span>
				<h3>Assessing humour</h3>
				<p>Not sure whether a joke will land? In just a few questions, the Humour Risk Check shows you when humour connects people and when it can hurt.</p>
				<span class="dh-link">Start the check</span>
			</a>
			<a class="dh-path dh-rise" href="<?php dehumore_href( '/humor-in-organisationen/' ); ?>">
				<span class="ic" style="background: var(--lime)"><svg viewBox="0 0 32 32" fill="none" stroke="#0b303b" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 8h20v13H13l-5 4v-4H6z"/><path d="M11 13h10M11 17h6"/></svg></span>
				<h3>Using humour deliberately</h3>
				<p>Want to use humour in your team, as a leader or in conversation? Find out when it brings people together and when it hurts.</p>
				<span class="dh-link">To the applications</span>
			</a>
		</div>
	</section>

	<!-- 3 Wissenschaftlicher Aufhänger -->
	<section class="dh-hook dh-section" style="margin-top: var(--section)" aria-labelledby="h-hook">
		<!-- Schritt 1: der Witz wirkt allein -->
		<div class="dh-wrap dh-solo-run" id="solo-run">
			<div class="dh-solo" id="solo">
				<p class="dh-kicker">A little self-experiment</p>
				<p class="setup">I want to die peacefully in my sleep, like my grandfather.</p>
				<p class="punch">Not screaming and terrified, like his passengers.</p>
				<p class="src">Well-known joke, author unknown.</p>
				<p class="hint">What just happened in your head?</p>
			</div>
		</div>
		<!-- Schritt 2: die Erklärung mit farblicher Verknüpfung -->
		<div class="dh-wrap dh-hook-grid">
			<div class="dh-hook-intro dh-stack">
				<p class="dh-kicker">A quick look at how we think</p>
				<h2 class="dh-h2" id="h-hook">Your mind fills in the gaps before you notice.</h2>
				<p class="dh-lead">A good joke exploits exactly that. Here it is again, slowly, step by step.</p>
				<div class="dh-gp">
					<h3>How a good punchline works</h3>
					<p>A garden-path joke quite literally leads you up the garden path. Your mind picks the most likely interpretation and instantly paints a picture to go with it, complete with place, mood and feeling. The punchline reveals that the path leads somewhere else. It works when it surprises you and still fits. Everything you have just read suddenly takes on a second meaning.</p>
					<h3>What this reveals about your thinking</h3>
					<p>Your mind is constantly predicting what comes next and corrects itself in a flash when something does not fit. Most of the time you notice none of this. A joke makes that moment tangible. That is why humour is a window into the way we think. It is exactly what Dr Bastian Mayerhofer researched.</p>
				</div>
				<a class="dh-link" href="<?php dehumore_href( '/2026/08/21/homo-probabilisticus-wie-predictive-processing-unsere-wahrnehmung-praegt/' ); ?>" style="color: var(--paper)">More in the article “Homo Probabilisticus” (in German)</a>
			</div>
			<div>
				<div class="dh-demo-run" id="demo-run">
				<div class="dh-demo" id="demo">
					<div class="dh-joke">
						<p class="setup">I want to die peacefully <span class="re">in my sleep</span>, like my grandfather.</p>
						<p class="punch">Not screaming and terrified, like his <span class="trig">passengers</span>.</p>
					</div>
					<div class="dh-model" aria-live="polite"><span class="lbl">The picture in your head</span><span class="mm old"><b>Bed</b><small>peaceful, old age, farewell</small></span><span class="mm new"><b>Steering wheel</b><small>crash, disaster, suffering</small></span></div>
					<p class="dh-joke-src">Dark humour: a single word tips a peaceful picture into a disaster.</p>
					<ol class="dh-steps">
						<li data-step="0"><b>Expectation</b><span>Grandad, bed, a peaceful end.</span></li>
						<li data-step="1"><b>Surprise</b><span>The last word does not fit the picture.</span></li>
						<li data-step="2"><b>New interpretation</b><span>Grandad was at the wheel. “In my sleep” now means something else.</span></li>
					</ol>
				</div>
				</div>
				<div class="dh-map">
					<p class="dh-kicker">Humour research as a map</p>
					<p class="dh-small">This is a cognitive perspective. Humour cannot be explained by a single theory. De:Humore puts the most important lenses side by side and shows where they complement and where they contradict each other.</p>
					<div class="dh-chips">
						<span>Incongruity and resolution</span><span>Benign violation</span><span>Superiority</span><span>Relief and tension</span><span>Play and framing</span><span>Evolution and the social</span><span>Taboo and inappropriateness</span><span>Personality and humour styles</span><span>Culture and power</span>
						<span class="own" title="Prediction → Error → Revision → Humour → Adaptation">Our working model: prediction and correction</span>
					</div>
				</div>
				<div class="dh-twoways">
					<a class="dh-way" href="<?php dehumore_href( '/blog/' ); ?>"><span class="dh-kicker">Understand</span><b>Deeper into the research</b><span class="d">Humour theories, research and articles that explain why we laugh.</span><span class="dh-link">To Humour Insights</span></a>
					<a class="dh-way dh-way--try" href="<?php dehumore_href( '/humor-kann-man-trainieren/' ); ?>"><span class="dh-kicker">Try it yourself</span><b>Training humour</b><span class="d">Three short daily prompts for reflection: observe, spot ambiguity, reframe situations.</span><span class="dh-link">To the prompts</span></a>
				</div>
			</div>
		</div>
	</section>

	<!-- 4 Humor Risk Check -->
	<section class="dh-section dh-wrap" aria-labelledby="h-check">
		<div class="dh-check">
			<div class="dh-stack">
				<p class="dh-kicker">Humour Risk Check</p>
				<h2 class="dh-h2" id="h-check">When can humour hurt?</h2>
				<p class="dh-lead">The Humour Risk Check helps you gauge how much potential a joke has to hurt others. Rather than giving a blanket verdict, it shows which factors play a part, from the topic and the intention to the specific situation.</p>
				<div class="dh-actions">
					<a class="dh-btn" href="<?php dehumore_href( '/humor-risk-check/#check' ); ?>">Start the Humour Risk Check</a>
					<a class="dh-link" href="#newsletter">Hear about new versions</a>
				</div>
			</div>
			<div class="dh-check-card dh-rise">
				<span class="dh-status"><i></i>Science-based prototype</span>
				<p class="q">For you if you …</p>
				<ul>
					<li>want to use humour in a speech, a presentation or a post,</li>
					<li>communicate with humour in a team, in the classroom or as a leader,</li>
					<li>are unsure how a joke might come across to different people,</li>
					<li>want to understand why a joke is perceived so differently.</li>
				</ul>
				<p><b>What you get:</b> you can see which aspects of a joke may be problematic and which ones shape its effect. That way you can decide more consciously whether, and how, to tell it.</p>
			</div>
		</div>
	</section>

	<!-- 5 Angebote nach Bedarf -->
	<section class="dh-wrap" aria-labelledby="h-angebote">
		<div class="dh-stack">
			<p class="dh-kicker dh-rise">What we offer</p>
			<h2 class="dh-h2 dh-rise" id="h-angebote">For teams and for you.</h2>
		</div>
		<div class="dh-offers">
			<div class="dh-offer dh-offer--org dh-rise" id="organisationen">
				<p class="dh-kicker">For organisations</p>
				<h3>Humour in communication, leadership and teams</h3>
				<p>Training, workshops, keynotes and coaching on humour, communication, leadership, team dynamics, personality and error culture. Clear, practical and nuanced.</p>
				<p class="dh-stats-title">What positive humour in organisations is associated with</p>
				<div class="dh-stats">
					<div class="dh-stat"><b>+31%</b><span>Job satisfaction</span><small>higher with more positive humour</small></div>
					<div class="dh-stat"><b>+27%</b><span>Team commitment</span><small>higher with more positive humour</small></div>
					<div class="dh-stat"><b>–36%</b><span>Stress and burnout tendencies</span><small>lower with more positive humour</small></div>
					<div class="dh-stat"><b>+21%</b><span>Team performance</span><small>higher with more positive humour</small></div>
				</div>
				<p class="dh-stats-explain"><b>How to read these figures:</b> the studies examined how positive humour at work is related to these characteristics. The percentages correspond to transformed effect sizes. They describe associations, not causes, and not guaranteed effects of a training programme.</p>
				<p class="dh-stats-src">Figures based on meta-analyses and reviews in organisational psychology (including Mesmer-Magnus et al., 2012; Martin, 2007; Cann &amp; Kuiper, 2014).</p>
				<ul class="dh-effects">
					<li>Humour can connect.</li>
					<li>Humour can signal status.</li>
					<li>Humour can shift tension.</li>
					<li>Humour can cross lines.</li>
				</ul>
				<p>Which effect it has depends on the people, the relationship, the aim, the situation and the organisational culture.</p>
				<div class="dh-formats"><span>Business training</span><span>Workshops</span><span>Keynotes</span><span>Coaching</span></div>
				<div class="dh-actions">
					<a class="dh-btn dh-btn--light" href="<?php dehumore_href( '/humor-in-organisationen/' ); ?>">See the formats</a>
					<a class="dh-link" href="mailto:bastian@dehumore.com" style="color: var(--paper)">Send an enquiry</a>
				</div>
			</div>
			<div class="dh-offer dh-offer--me dh-rise">
				<p class="dh-kicker">For personal development</p>
				<h3>More lightness for you</h3>
				<p class="dh-muted">Would you like to work on more lightness and a fresh perspective on the things that occupy you? In a free, no-obligation 15-minute introductory call, we will find out together whether we want to work together. Or learn at your own pace with exercises and articles.</p>
				<div class="dh-plan">
					<div>One-to-one support <span class="dh-tag ok">on request</span></div>
					<div>Articles and exercises (in German) <span class="dh-tag ok">available</span></div>
					<div><a href="https://www.instagram.com/dehumore" rel="noopener" style="text-decoration-color: var(--peach); text-underline-offset: 4px">Videos on Instagram</a> <span class="dh-tag ok">available</span></div>
					<div>Masterclasses <span class="dh-tag">planned</span></div>
					<div>De:Humore app <span class="dh-tag">planned</span></div>
				</div>
				<div class="dh-actions">
					<a class="dh-btn" href="https://calendar.app.google/uagqHNJ56Vd2u1ma7" target="_blank" rel="noopener">Book a free 15-minute call</a>
					<a class="dh-link" href="<?php dehumore_href( '/blog/' ); ?>">Articles and exercises</a>
				</div>
			</div>
		</div>
	</section>

	<!-- 6 Ausgewählte Inhalte -->
	<section class="dh-section dh-wrap" aria-labelledby="h-inhalte">
		<div class="dh-head-row">
			<div class="dh-stack">
				<p class="dh-kicker dh-rise">Selected reading (in German)</p>
				<h2 class="dh-h2 dh-rise" id="h-inhalte">Different angles on humour.</h2>
			</div>
			<div class="dh-slider-nav"><a class="dh-link" href="<?php dehumore_href( '/blog/' ); ?>" style="margin-right:16px">All articles</a><button type="button" data-prev aria-label="Previous articles">←</button><button type="button" data-next aria-label="Next articles">→</button></div>
		</div>
		<div class="dh-slider" data-slider>
			<div class="dh-track" tabindex="0" aria-label="Recommended articles, swipe sideways or use the arrows">
			<a class="dh-post" href="<?php dehumore_href( '/2026/08/21/homo-probabilisticus-wie-predictive-processing-unsere-wahrnehmung-praegt/' ); ?>" hreflang="de">
				<?php echo dehumore_beitragsbild( "/2026/08/21/homo-probabilisticus-wie-predictive-processing-unsere-wahrnehmung-praegt/", "var(--lime)", "var(--lime)" ); ?>
				<span class="meta"><i style="background: var(--lime); border: 1.5px solid var(--ink)"></i>Cognition</span>
				<h3>Homo Probabilisticus: how predictive processing shapes our perception</h3>
				<p>Why surprise, prejudice, resilience and a good joke have a surprising amount in common.</p>
				<span class="use">For you if you want to understand how expectations steer your thinking.</span>
			</a>
			<a class="dh-post" href="<?php dehumore_href( '/2025/07/24/warum-mehr-humor-nicht-automatisch-besser-ist/' ); ?>" hreflang="de">
				<?php echo dehumore_beitragsbild( "/2025/07/24/warum-mehr-humor-nicht-automatisch-besser-ist/", "var(--ink)", "var(--peach)" ); ?>
				<span class="meta"><i style="background: var(--ink)"></i>Limits of humour</span>
				<h3>Why more humour is not automatically better</h3>
				<p>Humour is not a neutral feel-good tool. It is not good per se, but good under certain conditions.</p>
				<span class="use">For teams and leaders who want “more humour”.</span>
			</a>
			<a class="dh-post" href="<?php dehumore_href( '/2026/05/21/humor-trainieren-warum-dein-gehirn-dabei-mehr-lernt-als-beim-naechsten-mindset-seminar/' ); ?>" hreflang="de">
				<?php echo dehumore_beitragsbild( "/2026/05/21/humor-trainieren-warum-dein-gehirn-dabei-mehr-lernt-als-beim-naechsten-mindset-seminar/", "var(--peach)", "#c9c9f4" ); ?>
				<span class="meta"><i style="background: var(--peach)"></i>Training humour</span>
				<h3>Training humour: why your brain learns more from it than from the next mindset seminar</h3>
				<p>Humour is not a fixed personality trait but a cognitive process.</p>
				<span class="use">For you if you want to practise humour.</span>
			</a>
			<a class="dh-post" href="<?php dehumore_href( '/2025/11/21/warum-wir-lachen-und-warum-humor-ein-evolutionaeres-trainingsprogramm-fuer-den-geist-ist/' ); ?>" hreflang="de">
				<?php echo dehumore_beitragsbild( "/2025/11/21/warum-wir-lachen-und-warum-humor-ein-evolutionaeres-trainingsprogramm-fuer-den-geist-ist/", "var(--indigo)", "var(--lime)" ); ?>
				<span class="meta"><i style="background: var(--indigo)"></i>Evolution and the social</span>
				<h3>Humour and evolution: why do we laugh …</h3>
				<p>What cognitive science, neurobiology and philosophy say about the origins of humour and laughter.</p>
				<span class="use">For you if you want to know why humour exists at all.</span>
			</a>
			<a class="dh-post" href="<?php dehumore_href( '/2025/12/19/wenn-20-ernst-reichen-pareto-verbissenheit-und-die-kunst-nicht-hoeher-zu-springen-als-noetig/' ); ?>" hreflang="de">
				<?php echo dehumore_beitragsbild( "/2025/12/19/wenn-20-ernst-reichen-pareto-verbissenheit-und-die-kunst-nicht-hoeher-zu-springen-als-noetig/", "var(--peach)", "var(--peach)" ); ?>
				<span class="meta"><i style="background: var(--peach)"></i>Practical tips</span>
				<h3>When 20 % seriousness is enough</h3>
				<p>Pareto, doggedness and the art of not jumping higher than you need to.</p>
				<span class="use">For you if you tend to dig your heels in.</span>
			</a>
			<a class="dh-post" href="<?php dehumore_href( '/2025/12/04/humor-marketing-warum-mutige-unternehmen-lauter-lachen-und-besser-wachsen/' ); ?>" hreflang="de">
				<?php echo dehumore_beitragsbild( "/2025/12/04/humor-marketing-warum-mutige-unternehmen-lauter-lachen-und-besser-wachsen/", "var(--ink)", "#c9c9f4" ); ?>
				<span class="meta"><i style="background: var(--ink)"></i>Communication</span>
				<h3>Humour in marketing: why bold brands make more of an impact</h3>
				<p>What happens when traditional craftsmanship meets an almost absurd product.</p>
				<span class="use">For marketing and brand communication.</span>
			</a>
			</div>
			<div class="dh-dots" aria-hidden="true"></div>
		</div>
	</section>

	<!-- 7 Über De:Humore -->
	<section class="dh-wrap" aria-labelledby="h-kopf">
		<div class="dh-about">
			<div class="dh-about-photo dh-rise"><img src="<?php echo esc_url( get_theme_file_uri( "assets/img/dr-bastian-mayerhofer-zwei-finger-1600.jpg" ) ); ?>" srcset="<?php echo esc_url( get_theme_file_uri( "assets/img/dr-bastian-mayerhofer-zwei-finger-900.jpg" ) ); ?> 900w, <?php echo esc_url( get_theme_file_uri( "assets/img/dr-bastian-mayerhofer-zwei-finger-1600.jpg" ) ); ?> 1600w" sizes="(max-width: 900px) 100vw, 600px" alt="Dr Bastian Mayerhofer smiling and pointing upwards with both index fingers" width="1600" height="1068" loading="lazy"></div>
			<div class="dh-stack" style="gap:24px">
				<p class="dh-kicker">The mind behind De:Humore</p>
				<h2 class="dh-h2" id="h-kopf">Dr Bastian Mayerhofer</h2>
				<p class="dh-lead">Cognitive psychologist and psycholinguist. At the University of Göttingen, he researched what happens in the mind when we understand garden-path jokes: jokes that first lure us into one interpretation and then make us think again. At De:Humore, he is the author, the scientific mind and the visible voice behind it.</p>
				<figure class="dh-frog" id="frog">
					<blockquote>
						<p class="q1">“Analysing humour is like dissecting a frog.</p>
						<p class="old"><span>Few people are interested and the frog dies of it.”</span></p>
						<p class="new dh-voice"><span class="mk">With the right disposition,</span> <span class="mk">it is a hell of a lot of fun.</span></p>
					</blockquote>
					<figcaption class="dh-small dh-muted">After E. B. White. The reply underneath is Bastian’s.</figcaption>
				</figure>
				<div class="dh-facts"><span>Cognitive psychology</span><span>Psycholinguistics</span><span>Garden-path jokes</span></div>
				<div class="dh-actions">
					<a class="dh-link" href="<?php dehumore_href( '/ueber/' ); ?>">About De:Humore</a>
					<a class="dh-link" href="https://bastianmayerhofer.com/ueber-mich/" hreflang="de">Scientific background (in German)</a>
				</div>
			</div>
		</div>
	</section>

	<!-- 8 Newsletter -->
	<section class="dh-wrap" id="newsletter" style="margin-top: var(--section)" aria-labelledby="h-news">
		<div class="dh-news">
			<div class="dh-stack">
				<p class="dh-kicker">Newsletter (in German)</p>
				<h2 class="dh-h2" id="h-news">New articles, no frog spam.</h2>
				<p class="dh-gift"><b>Free when you sign up:</b> the e-paper “10 Humour Hacks for More Lightness” (in German)</p>
				<ul class="dh-lead">
					<li>new articles from humour research and cognitive science</li>
					<li>practical ideas for communication and everyday life</li>
					<li>a heads-up when new formats launch</li>
				</ul>
			</div>
			<div class="dh-form dh-form--mailpoet">[dehumore_newsletter]<p class="dh-small dh-muted">You can unsubscribe at any time. Details in the <a href="<?php dehumore_href( '/datenschutzerklaerung/' ); ?>" hreflang="de">privacy policy (in German)</a>.</p></div>
		</div>
	</section>

	<!-- 9 Abschluss -->
	<section class="dh-section dh-wrap" aria-labelledby="h-weiter">
		<h2 class="dh-h2" id="h-weiter">Where to next?</h2>
		<div class="dh-onward">
			<a href="<?php dehumore_href( '/humor-in-organisationen/' ); ?>"><span class="dh-kicker">For organisations</span><b>Find a format for your team</b><span>Training, workshops, keynotes and coaching.</span></a>
			<a href="<?php dehumore_href( '/blog/' ); ?>"><span class="dh-kicker">Humour Insights</span><b>Deeper into the research</b><span>Articles on humour, thinking and everyday life.</span></a>
			<a href="mailto:bastian@dehumore.com"><span class="dh-kicker">Contact</span><b>Write directly</b><span>bastian@dehumore.com</span></a>
		</div>
	</section>

</main>
<!-- /wp:html -->
