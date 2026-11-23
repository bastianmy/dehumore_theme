<?php
/**
 * Title: Startseite
 * Slug: dehumore/startseite
 * Inserter: no
 */
?>
<!-- wp:html -->
<main id="start">

	<!-- 1 Hero -->
	<section class="dh-hero dh-wrap" id="hero" aria-labelledby="h-hero">
		<div class="dh-hero-grid">
			<div class="dh-hero-text">
				<p class="dh-kicker">De:Humore · Humorforschung und Kognitionswissenschaft</p>
				<h1 id="h-hero">Mehr <span class="hl">Leichtigkeit</span>, wenn’s ernst wird.</h1>
				<p class="dh-lead">De:Humore verbindet Humorforschung mit Übungen für deinen Alltag und Trainings für Teams. Entdecke, wie Humor entsteht, wie du deinen Blick dafür schärfst und worauf es ankommt, wenn du ihn einsetzt.</p>
				<div class="dh-actions">
					<a class="dh-btn" href="/blog/">Beiträge lesen</a>
					<a class="dh-btn dh-btn--ghost" href="/humor-in-organisationen/">Für Organisationen</a>
				</div>
				<p class="dh-sender"><img src="<?php echo esc_url( get_theme_file_uri( "assets/img/beginnt-zu-lachen.jpg" ) ); ?>" alt="" width="44" height="44"><span>Eine wissenschaftlich fundierte Plattform über die <del class="dh-x">zweitschönste</del> <ins class="dh-y">drittschönste</ins> Sache der Welt. Von <strong>Dr. Bastian Mayerhofer</strong>.</span></p>
			</div>
			<div class="dh-hero-photo">
				<img src="<?php echo esc_url( get_theme_file_uri( "assets/img/witz-karte.jpg" ) ); ?>" alt="" width="1400" height="934">
				<img class="lacht" src="<?php echo esc_url( get_theme_file_uri( "assets/img/witz-karte-lachen.jpg" ) ); ?>" alt="Dr. Bastian Mayerhofer hält eine Karte mit dem Wort „Witz“ und lacht" width="1400" height="934">
			</div>
		</div>
	</section>

	<!-- 2 Drei Einstiegswege -->
	<section class="dh-wrap" aria-labelledby="h-wege">
		<div class="dh-stack">
			<p class="dh-kicker dh-rise">Dein Einstieg</p>
			<h2 class="dh-h2 dh-rise" id="h-wege">Wo möchtest du anfangen?</h2>
		</div>
		<div class="dh-paths">
			<a class="dh-path dh-rise" href="/blog/">
				<span class="ic" style="background: var(--lime)"><svg viewBox="0 0 32 32" fill="none" stroke="#0b303b" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 6c-2-2.5-7-2-8 1.5C5 8 4 11 5.5 13 4 15 4.5 18.5 7 19.5c0 3 3.5 5.5 6.5 4.5L16 26V6Z"/><path d="M16 6c2-2.5 7-2 8 1.5 3 .5 4 3.5 2.5 5.5 1.5 2 1 5.5-1.5 6.5 0 3-3.5 5.5-6.5 4.5L16 26"/></svg></span>
				<h3>Humor verstehen</h3>
				<p>Du willst wissen, warum wir eigentlich lachen? Im Blog findest du Forschung, Erklärungen und Geschichten dazu, wie Humor und Denken zusammenhängen.</p>
				<span class="dh-link">Zu den Beiträgen</span>
			</a>
			<a class="dh-path dh-rise" href="/humor-risk-check/">
				<span class="ic" style="background: var(--peach)"><svg viewBox="0 0 32 32" fill="none" stroke="#0b303b" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 4 5 8v7c0 6.5 4.6 11.5 11 13 6.4-1.5 11-6.5 11-13V8z"/><path d="m11.5 16 3 3 6-6"/></svg></span>
				<h3>Humor einschätzen</h3>
				<p>Du bist unsicher, ob ein Witz passt? Der Humor Risk Check zeigt dir in wenigen Fragen, wann Humor verbindet und wann er verletzen kann.</p>
				<span class="dh-link">Check starten</span>
			</a>
			<a class="dh-path dh-rise" href="/humor-in-organisationen/">
				<span class="ic" style="background: var(--lime)"><svg viewBox="0 0 32 32" fill="none" stroke="#0b303b" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 8h20v13H13l-5 4v-4H6z"/><path d="M11 13h10M11 17h6"/></svg></span>
				<h3>Humor bewusst einsetzen</h3>
				<p>Du willst Humor im Team, in der Führung oder im Gespräch nutzen? Hier erfährst du, wann er verbindet und wann er verletzt.</p>
				<span class="dh-link">Zu den Anwendungen</span>
			</a>
		</div>
	</section>

	<!-- 3 Wissenschaftlicher Aufhänger -->
	<section class="dh-hook dh-section" style="margin-top: var(--section)" aria-labelledby="h-hook">
		<!-- Schritt 1: der Witz wirkt allein -->
		<div class="dh-wrap dh-solo-run" id="solo-run">
			<div class="dh-solo" id="solo">
				<p class="dh-kicker">Kleiner Selbstversuch</p>
				<p class="setup">Ich möchte sanft und friedlich im Schlaf sterben, so wie mein Opa.</p>
				<p class="punch">Nicht angsterfüllt und schreiend wie seine Fahrgäste.</p>
				<p class="src">Bekannter Witz, Urheber unbekannt.</p>
				<p class="hint">Was ist da gerade in deinem Kopf passiert?</p>
			</div>
		</div>
		<!-- Schritt 2: die Erklärung mit farblicher Verknüpfung -->
		<div class="dh-wrap dh-hook-grid">
			<div class="dh-hook-intro dh-stack">
				<p class="dh-kicker">Ein kurzer Blick ins Denken</p>
				<h2 class="dh-h2" id="h-hook">Dein Kopf füllt Lücken, bevor du es merkst.</h2>
				<p class="dh-lead">Ein guter Witz nutzt genau das aus. Hier noch einmal langsam, Schritt für Schritt.</p>
				<div class="dh-gp">
					<h3>Wie eine gute Pointe funktioniert</h3>
					<p>Ein Garden-Path-Witz führt dich wortwörtlich auf einen Gartenweg. Dein Kopf wählt die wahrscheinlichste Deutung und malt sofort ein Bild dazu, mit Ort, Stimmung und Gefühl. Die Pointe zeigt: Der Weg führt woanders hin. Gut ist sie, wenn sie überrascht und trotzdem passt. Alles, was du gelesen hast, ergibt plötzlich einen zweiten Sinn.</p>
					<h3>Was das über dein Denken verrät</h3>
					<p>Dein Kopf sagt ständig voraus, was als Nächstes kommt, und korrigiert sich blitzschnell, wenn es nicht passt. Meist merkst du davon nichts. Ein Witz macht diesen Moment spürbar. Deshalb ist Humor ein Fenster in die Art, wie wir denken. Genau dazu hat Dr. Bastian Mayerhofer geforscht.</p>
				</div>
				<a class="dh-link" href="/2026/08/21/homo-probabilisticus-wie-predictive-processing-unsere-wahrnehmung-praegt/" style="color: var(--paper)">Mehr dazu im Beitrag „Homo Probabilisticus“</a>
			</div>
			<div>
				<div class="dh-demo-run" id="demo-run">
				<div class="dh-demo" id="demo">
					<div class="dh-joke">
						<p class="setup">Ich möchte sanft und friedlich <span class="re">im Schlaf</span> sterben, so wie mein Opa.</p>
						<p class="punch">Nicht angsterfüllt und schreiend wie seine <span class="trig">Fahrgäste</span>.</p>
					</div>
					<div class="dh-model" aria-live="polite"><span class="lbl">Dein Bild im Kopf</span><span class="mm old"><b>Bett</b><small>friedlich, alt, Abschied</small></span><span class="mm new"><b>Steuer</b><small>Unfall, Katastrophe, Leid</small></span></div>
					<p class="dh-joke-src">Schwarzer Humor: Ein Wort kippt ein friedliches Bild in eine Katastrophe.</p>
					<ol class="dh-steps">
						<li data-step="0"><b>Erwartung</b><span>Opa, Bett, friedliches Ende.</span></li>
						<li data-step="1"><b>Überraschung</b><span>Das letzte Wort passt nicht ins Bild.</span></li>
						<li data-step="2"><b>Neue Deutung</b><span>Opa saß am Steuer. „Im Schlaf“ heißt jetzt etwas anderes.</span></li>
					</ol>
				</div>
				</div>
				<div class="dh-map">
					<p class="dh-kicker">Humorforschung als Landkarte</p>
					<p class="dh-small">Das ist eine kognitive Perspektive. Humor lässt sich nicht aus einer einzigen Theorie erklären. De:Humore stellt die wichtigsten Linsen nebeneinander und zeigt, wo sie sich ergänzen und wo sie sich widersprechen.</p>
					<div class="dh-chips">
						<span>Inkongruenz und Auflösung</span><span>Benign Violation</span><span>Überlegenheit</span><span>Entlastung und Spannung</span><span>Spiel und Rahmung</span><span>Evolution und Soziales</span><span>Tabu und Unangemessenheit</span><span>Persönlichkeit und Humor-Stile</span><span>Kultur und Macht</span>
						<span class="own" title="Prediction → Error → Revision → Humor → Adaptation">Unser Denkmodell: Vorhersage und Korrektur</span>
					</div>
				</div>
				<div class="dh-twoways">
					<a class="dh-way" href="/blog/"><span class="dh-kicker">Verstehen</span><b>Tiefer ins Wissen</b><span class="d">Humortheorien, Forschung und Beiträge, die erklären, warum wir lachen.</span><span class="dh-link">Zum Blog</span></a>
					<div class="dh-way dh-way--try"><span class="dh-kicker">Selbst ausprobieren <em class="soon">geplant</em></span><b>Garden-Path-Trainer</b><span class="d">Versteckte Doppeldeutungen entdecken und eigene Pointen bauen, allein oder mit KI-Unterstützung.</span></div>
				</div>
			</div>
		</div>
	</section>

	<!-- 4 Humor Risk Check -->
	<section class="dh-section dh-wrap" aria-labelledby="h-check">
		<div class="dh-check">
			<div class="dh-stack">
				<p class="dh-kicker">Humor Risk Check</p>
				<h2 class="dh-h2" id="h-check">Wann kann Humor verletzen?</h2>
				<p class="dh-lead">Der Humor Risk Check hilft dir einzuschätzen, wie groß das Potenzial eines Witzes ist, andere zu verletzen. Statt eines pauschalen Urteils zeigt er, welche Faktoren dabei eine Rolle spielen – vom Thema über die Absicht bis zur konkreten Situation.</p>
				<div class="dh-actions">
					<a class="dh-btn" href="/humor-risk-check/">Humor Risk Check starten</a>
					<a class="dh-link" href="#newsletter">Über neue Versionen informiert werden</a>
				</div>
			</div>
			<div class="dh-check-card dh-rise">
				<span class="dh-status"><i></i>Wissenschaftlich fundierter Prototyp</span>
				<p class="q">Für dich, wenn du …</p>
				<ul>
					<li>Humor in einer Rede, Präsentation oder einem Post einsetzen möchtest,</li>
					<li>im Team, im Unterricht oder als Führungskraft humorvoll kommunizierst,</li>
					<li>unsicher bist, wie ein Witz bei unterschiedlichen Menschen ankommen könnte,</li>
					<li>verstehen möchtest, warum ein Witz unterschiedlich wahrgenommen wird.</li>
				</ul>
				<p><b>Dein Nutzen:</b> Du erkennst, welche Aspekte eines Witzes möglicherweise problematisch sind und welche seine Wirkung beeinflussen. So kannst du bewusster entscheiden, ob und wie du ihn erzählst.</p>
			</div>
		</div>
	</section>

	<!-- 5 Angebote nach Bedarf -->
	<section class="dh-wrap" aria-labelledby="h-angebote">
		<div class="dh-stack">
			<p class="dh-kicker dh-rise">Angebote</p>
			<h2 class="dh-h2 dh-rise" id="h-angebote">Für Teams und für dich.</h2>
		</div>
		<div class="dh-offers">
			<div class="dh-offer dh-offer--org dh-rise" id="organisationen">
				<p class="dh-kicker">Für Organisationen</p>
				<h3>Humor in Kommunikation, Führung und Teams</h3>
				<p>Trainings, Workshops, Keynotes und Coaching zu Humor, Kommunikation, Führung, Teamdynamik, Persönlichkeit und Fehlerkultur. Klar, anwendungsnah und differenziert.</p>
				<p class="dh-stats-title">Womit positiver Humor in Organisationen zusammenhängt</p>
				<div class="dh-stats">
					<div class="dh-stat"><b>+31%</b><span>Arbeitszufriedenheit</span><small>höher bei mehr positivem Humor</small></div>
					<div class="dh-stat"><b>+27%</b><span>Team-Commitment</span><small>höher bei mehr positivem Humor</small></div>
					<div class="dh-stat"><b>–36%</b><span>Stress und Burnout-Tendenzen</span><small>niedriger bei mehr positivem Humor</small></div>
					<div class="dh-stat"><b>+21%</b><span>Teamleistung</span><small>höher bei mehr positivem Humor</small></div>
				</div>
				<p class="dh-stats-explain"><b>So sind die Werte zu lesen:</b> Untersucht wurde, wie positiver Humor am Arbeitsplatz mit diesen Merkmalen zusammenhängt. Die Prozentwerte sind aus Effektstärken umgerechnet (<span class="dh-ph">[PLATZHALTER – Umrechnungsmethode benennen]</span>). Sie beschreiben Zusammenhänge, keine Ursache und keine garantierten Effekte eines Trainings.</p>
				<p class="dh-stats-src">Quellen: Meta-Analysen und Reviews der Organisationspsychologie, u. a. Mesmer-Magnus et al., 2012; Martin, 2007; Cann &amp; Kuiper, 2014.</p>
				<ul class="dh-effects">
					<li>Humor kann verbinden.</li>
					<li>Humor kann Status markieren.</li>
					<li>Humor kann Spannungen verändern.</li>
					<li>Humor kann Grenzen überschreiten.</li>
				</ul>
				<p>Welche Wirkung entsteht, hängt von Personen, Beziehung, Ziel, Situation und Organisationskultur ab.</p>
				<div class="dh-formats"><span>Business-Trainings</span><span>Workshops</span><span>Keynotes</span><span>Coaching</span></div>
				<div class="dh-actions">
					<a class="dh-btn dh-btn--light" href="/humor-in-organisationen/">Formate ansehen</a>
					<a class="dh-link" href="/kontakt/" style="color: var(--paper)">Anfrage stellen</a>
				</div>
			</div>
			<div class="dh-offer dh-offer--me dh-rise">
				<p class="dh-kicker">Für persönliche Entwicklung</p>
				<h3>Mehr Leichtigkeit für dich</h3>
				<p class="dh-muted">Du möchtest persönlich an mehr Leichtigkeit und einem neuen Blick auf deine Themen arbeiten? In einem kostenlosen, unverbindlichen Kennenlern-Call (15 Minuten) finden wir gemeinsam heraus, ob wir zusammenarbeiten wollen. Oder du lernst im eigenen Tempo mit Übungen und Beiträgen.</p>
				<div class="dh-plan">
					<div>Persönliche Begleitung <span class="dh-tag ok">auf Anfrage</span></div>
					<div>Beiträge und Übungen im Blog <span class="dh-tag ok">verfügbar</span></div>
					<div><a href="https://www.instagram.com/dehumore" rel="noopener" style="text-decoration-color: var(--peach); text-underline-offset: 4px">Videos auf Instagram</a> <span class="dh-tag ok">verfügbar</span></div>
					<div>Masterclasses <span class="dh-tag">geplant</span></div>
					<div>De:Humore-App <span class="dh-tag">geplant</span></div>
				</div>
				<div class="dh-actions">
					<a class="dh-btn" href="https://calendar.app.google/uagqHNJ56Vd2u1ma7" target="_blank" rel="noopener">15 Minuten kostenlos kennenlernen</a>
					<a class="dh-link" href="/blog/">Beiträge und Übungen im Blog</a>
				</div>
			</div>
		</div>
	</section>

	<!-- 6 Ausgewählte Inhalte -->
	<section class="dh-section dh-wrap" aria-labelledby="h-inhalte">
		<div class="dh-head-row">
			<div class="dh-stack">
				<p class="dh-kicker dh-rise">Ausgewählte Inhalte</p>
				<h2 class="dh-h2 dh-rise" id="h-inhalte">Verschiedene Blickwinkel auf Humor.</h2>
			</div>
			<div class="dh-slider-nav"><a class="dh-link" href="/blog/" style="margin-right:16px">Alle Beiträge im Blog</a><button type="button" data-prev aria-label="Vorherige Beiträge">←</button><button type="button" data-next aria-label="Nächste Beiträge">→</button></div>
		</div>
		<div class="dh-slider" data-slider>
			<div class="dh-track" tabindex="0" aria-label="Beitragsempfehlungen, seitlich wischen oder Pfeile nutzen">
			<a class="dh-post" href="/2026/08/21/homo-probabilisticus-wie-predictive-processing-unsere-wahrnehmung-praegt/">
				<span class="img" style="--c: var(--lime)" aria-hidden="true"><em>Beitragsbild</em></span>
				<span class="meta"><i style="background: var(--lime); border: 1.5px solid var(--ink)"></i>Kognition</span>
				<h3>Homo Probabilisticus: Wie Predictive Processing unsere Wahrnehmung prägt</h3>
				<p>Warum Überraschung, Vorurteile, Resilienz und ein guter Witz erstaunlich viel miteinander zu tun haben.</p>
				<span class="use">Für dich, wenn du verstehen willst, wie Erwartungen dein Denken lenken.</span>
			</a>
			<a class="dh-post" href="/2025/07/24/warum-mehr-humor-nicht-automatisch-besser-ist/">
				<span class="img" style="--c: var(--ink)" aria-hidden="true"><em>Beitragsbild</em></span>
				<span class="meta"><i style="background: var(--ink)"></i>Grenzen von Humor</span>
				<h3>Warum mehr Humor nicht automatisch besser ist</h3>
				<p>Humor ist kein neutrales Wohlfühl-Werkzeug. Er wirkt nicht per se gut, sondern bedingt gut.</p>
				<span class="use">Für Teams und Führung, die „mehr Humor“ wollen.</span>
			</a>
			<a class="dh-post" href="/2026/05/21/humor-trainieren-warum-dein-gehirn-dabei-mehr-lernt-als-beim-naechsten-mindset-seminar/">
				<span class="img" style="--c: var(--peach)" aria-hidden="true"><em>Beitragsbild</em></span>
				<span class="meta"><i style="background: var(--peach)"></i>Humor trainieren</span>
				<h3>Humor trainieren: Warum dein Gehirn dabei mehr lernt als beim nächsten Mindset-Seminar</h3>
				<p>Humor ist keine fixe Persönlichkeitseigenschaft, sondern ein kognitiver Prozess.</p>
				<span class="use">Für dich, wenn du Humor üben möchtest.</span>
			</a>
			<a class="dh-post" href="/2025/11/21/warum-wir-lachen-und-warum-humor-ein-evolutionaeres-trainingsprogramm-fuer-den-geist-ist/">
				<span class="img" style="--c: var(--indigo)" aria-hidden="true"><em>Beitragsbild</em></span>
				<span class="meta"><i style="background: var(--indigo)"></i>Evolution und Soziales</span>
				<h3>Humor und Evolution: Warum lachen wir …</h3>
				<p>Was Kognitionswissenschaft, Neurobiologie und Philosophie über den Ursprung von Humor und Lachen sagen.</p>
				<span class="use">Für dich, wenn du wissen willst, warum es Humor überhaupt gibt.</span>
			</a>
					<a class="dh-post" href="/2025/12/19/wenn-20-ernst-reichen-pareto-verbissenheit-und-die-kunst-nicht-hoeher-zu-springen-als-noetig/">
				<span class="img" style="--c: var(--peach)" aria-hidden="true"><em>Beitragsbild</em></span>
				<span class="meta"><i style="background: var(--peach)"></i>Praktische Tipps</span>
				<h3>Wenn 20 % Ernst reichen</h3>
				<p>Pareto, Verbissenheit und die Kunst, nicht höher zu springen als nötig.</p>
				<span class="use">Für dich, wenn du dich gern mal verbeißt.</span>
			</a>
			<a class="dh-post" href="/2025/12/04/humor-marketing-warum-mutige-unternehmen-lauter-lachen-und-besser-wachsen/">
				<span class="img" style="--c: var(--ink)" aria-hidden="true"><em>Beitragsbild</em></span>
				<span class="meta"><i style="background: var(--ink)"></i>Kommunikation</span>
				<h3>Humor im Marketing: Warum mutige Marken mehr bewegen</h3>
				<p>Was passiert, wenn traditionelle Handwerkskunst auf ein fast absurdes Produkt trifft.</p>
				<span class="use">Für Marketing und Markenkommunikation.</span>
			</a>
			</div>
			<div class="dh-dots" aria-hidden="true"></div>
		</div>
	</section>

	<!-- 7 Über De:Humore -->
	<section class="dh-wrap" aria-labelledby="h-kopf">
		<div class="dh-about">
			<div class="dh-about-photo dh-rise"><img src="<?php echo esc_url( get_theme_file_uri( "assets/img/beginnt-zu-lachen.jpg" ) ); ?>" alt="Dr. Bastian Mayerhofer lacht in die Kamera" width="1400" height="934"></div>
			<div class="dh-stack" style="gap:24px">
				<p class="dh-kicker">Der Kopf hinter De:Humore</p>
				<h2 class="dh-h2" id="h-kopf">Dr. Bastian Mayerhofer</h2>
				<p class="dh-lead">Kognitionspsychologe und Psycholinguist. An der Universität Göttingen hat er erforscht, was im Kopf passiert, wenn wir Garden-Path-Jokes verstehen: Witze, die uns erst auf eine Deutung locken und dann umdenken lassen. Bei De:Humore ist er Autor, wissenschaftlicher Kopf und sichtbarer Absender.</p>
				<figure class="dh-frog" id="frog">
					<blockquote>
						<p class="q1">„Humor zu analysieren ist wie einen Frosch zu sezieren.</p>
						<p class="old"><span>Nur wenige interessiert es, und der Frosch stirbt dabei.“</span></p>
						<p class="new dh-voice"><span class="mk">Mit der richtigen Veranlagung</span> <span class="mk">macht es verdammt viel Spaß.</span></p>
					</blockquote>
					<figcaption class="dh-small dh-muted">Frei nach E. B. White. Die Antwort darunter ist von Bastian.</figcaption>
				</figure>
				<div class="dh-facts"><span>Kognitionspsychologie</span><span>Psycholinguistik</span><span>Garden-Path-Jokes</span></div>
				<div class="dh-actions">
					<a class="dh-link" href="/ueber/">Über De:Humore</a>
					<a class="dh-link" href="https://bastianmayerhofer.com/ueber-mich/">Wissenschaftlicher Hintergrund</a>
				</div>
			</div>
		</div>
	</section>

	<!-- 8 Newsletter -->
	<section class="dh-wrap" id="newsletter" style="margin-top: var(--section)" aria-labelledby="h-news">
		<div class="dh-news">
			<div class="dh-stack">
				<p class="dh-kicker">Newsletter</p>
				<h2 class="dh-h2" id="h-news">Neue Beiträge, ohne Frosch-Spam.</h2>
				<p class="dh-gift"><b>Gratis zur Anmeldung:</b> das E-Paper „10 Humor-Hacks für mehr Leichtigkeit“</p>
				<ul class="dh-lead">
					<li>neue Beiträge aus Humorforschung und Kognitionswissenschaft</li>
					<li>praktische Impulse für Kommunikation und Alltag</li>
					<li>Hinweise, wenn neue Formate starten</li>
				</ul>
			</div>
			<div class="dh-form dh-form--mailpoet">[mailpoet_form id="1"]<p class="dh-small dh-muted">Abmelden geht jederzeit, Details in der <a href="/datenschutzerklaerung/">Datenschutzerklärung</a>.</p></div>
		</div>
	</section>

	<!-- 9 Abschluss -->
	<section class="dh-section dh-wrap" style="padding-bottom: 0" aria-labelledby="h-weiter">
		<h2 class="dh-h2" id="h-weiter">Wohin als Nächstes?</h2>
		<div class="dh-onward">
			<a href="/humor-in-organisationen/"><span class="dh-kicker">Für Organisationen</span><b>Ein Format für dein Team finden</b><span>Trainings, Workshops, Keynotes und Coaching.</span></a>
			<a href="/blog/"><span class="dh-kicker">Blog</span><b>Tiefer in die Forschung</b><span>Beiträge zu Humor, Denken und Alltag.</span></a>
			<a href="/kontakt/"><span class="dh-kicker">Kontakt</span><b>Direkt schreiben</b><span>bastian@dehumore.com</span></a>
		</div>
	</section>

</main>
<!-- /wp:html -->
