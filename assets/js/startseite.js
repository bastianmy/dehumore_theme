(function () {
	var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	document.documentElement.classList.add(reduce ? 'no-motion' : 'js');

	var head = document.getElementById('kopf'), burger = document.getElementById('burger');
	burger.addEventListener('click', function () {
		var open = head.classList.toggle('is-open');
		burger.setAttribute('aria-expanded', open ? 'true' : 'false');
		var en = document.documentElement.lang.indexOf('en') === 0; burger.setAttribute('aria-label', open ? (en ? 'Close menu' : 'Menü schließen') : (en ? 'Open menu' : 'Menü öffnen'));
	});
	document.querySelectorAll('#menue a').forEach(function (a) {
		a.addEventListener('click', function () { head.classList.remove('is-open'); burger.setAttribute('aria-expanded', 'false'); });
	});

	function seg(p, a, b) { return Math.max(0, Math.min(1, (p - a) / (b - a))); }
	function viewP(el, start, len) { var vh = window.innerHeight, r = el.getBoundingClientRect(); return reduce ? 1 : Math.max(0, Math.min(1, (vh * start - r.top) / (vh * len))); }

	/* Hero: Lime-Markierung beim Laden, nach kurzer Pause lacht das Foto */
	var hero = document.getElementById('hero');
	requestAnimationFrame(function () { hero.classList.add('is-in'); });
	setTimeout(function () { hero.classList.add('is-laughing'); }, reduce ? 0 : 1800);

	/* Aufhänger: die Pointe taucht auf, dann werden „im Schlaf“ und „mein Opa“ neu markiert, die drei Schritte leuchten nacheinander */
	/* Fortschritt durch den hohen Abschnitt, in dem die Karte stillsteht. Witz, Bild im Kopf und Schritte schalten an denselben Punkten. */
	var run = document.getElementById('demo-run'), demo = document.getElementById('demo'), steps = demo.querySelectorAll('[data-step]');
	function demoAt() {
		var p;
		if (reduce) p = 1; else {
			var r = run.getBoundingClientRect(), span = run.offsetHeight - demo.offsetHeight - 40;
			p = Math.max(0, Math.min(1, (window.innerHeight * .35 - r.top) / Math.max(1, span)));
		}
		var stage = p < .3 ? 0 : (p < .6 ? 1 : 2);
		demo.style.setProperty('--s1', seg(p, 0, .12).toFixed(3));
		demo.style.setProperty('--s2', seg(p, .3, .42).toFixed(3));
		demo.style.setProperty('--s3', seg(p, .42, .54).toFixed(3));
		demo.classList.toggle('is-doubt', stage === 1);
		demo.classList.toggle('is-flip', stage === 2);
		steps.forEach(function (li, k) { li.classList.toggle('on', k === stage); });
	}

	/* Stimme: Unterlegung läuft beim Durchscrollen mit, die Pointe kommt verzögert */
	var voices = Array.prototype.slice.call(document.querySelectorAll('[data-voice]'));
	function voiceAt() {
		voices.forEach(function (el) {
			var p = viewP(el, .85, .4), m = el.querySelectorAll('.mk');
			m[0].style.setProperty('--s1', seg(p, 0, .45).toFixed(3));
			m[1].style.setProperty('--s1', seg(p, .55, 1).toFixed(3));
			m[1].style.setProperty('--s2', seg(p, .45, .7).toFixed(3));
		});
	}

	/* Frosch-Zitat: erst durchstreichen, dann Bastians Antwort einblenden und markieren */
	var frog = document.getElementById('frog');
	function frogAt() {
		var p = viewP(frog, .68, .45);
		frog.style.setProperty('--a', seg(p, .15, .4).toFixed(3));
		frog.style.setProperty('--b', seg(p, .4, .6).toFixed(3));
		frog.style.setProperty('--c', seg(p, .6, .8).toFixed(3));
		frog.style.setProperty('--d', seg(p, .8, 1).toFixed(3));
	}

	/* Schritt 1: Pointe erst nach einer Lesepause, dann die Frage nach unten */
	var soloRun = document.getElementById('solo-run'), solo = document.getElementById('solo');
	function soloAt() {
		var p = 1;
		if (!reduce) { var r = soloRun.getBoundingClientRect(), span = soloRun.offsetHeight - solo.offsetHeight; p = Math.max(0, Math.min(1, -r.top / Math.max(1, span))); }
		solo.style.setProperty('--t', seg(p, .3, .55).toFixed(3));
		solo.style.setProperty('--u', seg(p, .75, .95).toFixed(3));
	}

	var ticking = false;
	function onScroll() { ticking = false; head.classList.toggle('is-scrolled', window.scrollY > 8); soloAt(); demoAt(); voiceAt(); frogAt(); }
	window.addEventListener('scroll', function () { if (!ticking) { ticking = true; requestAnimationFrame(onScroll); } }, { passive: true });
	window.addEventListener('resize', onScroll);
	onScroll();


	/* Slider: Pfeile blättern um eine Kartenbreite, Punkte zeigen die Position */
	document.querySelectorAll('[data-slider]').forEach(function (sl) {
		var track = sl.querySelector('.dh-track'), dots = sl.querySelector('.dh-dots');
		var scope = sl.closest('section'), prev = scope.querySelector('[data-prev]'), next = scope.querySelector('[data-next]');
		var cards = track.children;
		for (var k = 0; k < cards.length; k++) dots.appendChild(document.createElement('i'));
		function step() { return cards[0].getBoundingClientRect().width + 20; }
		function upd() {
			var max = track.scrollWidth - track.clientWidth - 2, x = track.scrollLeft;
			if (prev) prev.disabled = x <= 2; if (next) next.disabled = x >= max;
			var cur = Math.round(x / step()), vis = Math.max(1, Math.round(track.clientWidth / step()));
			Array.prototype.forEach.call(dots.children, function (d, k) { d.classList.toggle('on', k >= cur && k < cur + vis); });
		}
		if (prev) prev.addEventListener('click', function () { track.scrollBy({ left: -step(), behavior: reduce ? 'auto' : 'smooth' }); });
		if (next) next.addEventListener('click', function () { track.scrollBy({ left: step(), behavior: reduce ? 'auto' : 'smooth' }); });
		track.addEventListener('scroll', upd, { passive: true }); window.addEventListener('resize', upd); upd();
	});

	document.querySelectorAll('[aria-disabled="true"]').forEach(function (a) { a.addEventListener('click', function (e) { e.preventDefault(); }); });

	/* Einblenden beim Reinscrollen (threshold 0.2, funktioniert auch mobil) */
	var io = new IntersectionObserver(function (entries) {
		entries.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); } });
	}, { threshold: 0.2 });
	document.querySelectorAll('.dh-rise').forEach(function (el) { if (reduce) el.classList.add('is-in'); else io.observe(el); });
})();
