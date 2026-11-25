(function () {
	var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	document.documentElement.classList.add(reduce ? 'no-motion' : 'js');
	var head = document.getElementById('kopf'), burger = document.getElementById('burger');
	burger.addEventListener('click', function () {
		var open = head.classList.toggle('is-open');
		burger.setAttribute('aria-expanded', open ? 'true' : 'false');
		var en = document.documentElement.lang.indexOf('en') === 0; burger.setAttribute('aria-label', open ? (en ? 'Close menu' : 'Menü schließen') : (en ? 'Open menu' : 'Menü öffnen'));
	});
	var hero = document.getElementById('hero');
	requestAnimationFrame(function () { setTimeout(function () { hero.classList.add('is-in'); }, 60); });
	function seg(p, a, b) { return Math.max(0, Math.min(1, (p - a) / (b - a))); }
	function viewP(el, start, len) { var vh = window.innerHeight, r = el.getBoundingClientRect(); return reduce ? 1 : Math.max(0, Math.min(1, (vh * start - r.top) / (vh * len))); }
	/* Reflexionsfrage: Unterlegung läuft beim Scrollen mit, die zweite Hälfte kommt verzögert */
	var voices = Array.prototype.slice.call(document.querySelectorAll('[data-voice]'));
	function voiceAt() {
		voices.forEach(function (el) {
			var p = viewP(el, .85, .4), m = el.querySelectorAll('.mk');
			m[0].style.setProperty('--s1', seg(p, 0, .45).toFixed(3));
			m[1].style.setProperty('--s1', seg(p, .55, 1).toFixed(3));
			m[1].style.setProperty('--s2', seg(p, .45, .7).toFixed(3));
		});
	}
	/* Frosch-Zitat: erst durchstreichen, dann die Antwort einblenden und markieren */
	var frog = document.getElementById('frog');
	function frogAt() {
		var p = viewP(frog, .75, .45);
		frog.style.setProperty('--a', seg(p, .15, .4).toFixed(3));
		frog.style.setProperty('--b', seg(p, .4, .6).toFixed(3));
		frog.style.setProperty('--c', seg(p, .6, .8).toFixed(3));
		frog.style.setProperty('--d', seg(p, .8, 1).toFixed(3));
	}
	var ticking = false;
	function onScroll() { ticking = false; head.classList.toggle('is-scrolled', window.scrollY > 8); voiceAt(); frogAt(); }
	window.addEventListener('scroll', function () { if (!ticking) { ticking = true; requestAnimationFrame(onScroll); } }, { passive: true });
	window.addEventListener('resize', onScroll); onScroll();
	var io = new IntersectionObserver(function (entries) { entries.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); } }); }, { threshold: 0.2 });
	document.querySelectorAll('.dh-rise').forEach(function (el) { if (reduce) el.classList.add('is-in'); else io.observe(el); });
})();
