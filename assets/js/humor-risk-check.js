(function () {
	var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	document.documentElement.classList.add(reduce ? 'no-motion' : 'js');
	var head = document.getElementById('kopf'), burger = document.getElementById('burger');
	burger.addEventListener('click', function () {
		var open = head.classList.toggle('is-open');
		burger.setAttribute('aria-expanded', open ? 'true' : 'false');
		var en = document.documentElement.lang.indexOf('en') === 0; burger.setAttribute('aria-label', open ? (en ? 'Close menu' : 'Menü schließen') : (en ? 'Open menu' : 'Menü öffnen'));
	});
	function seg(p, a, b) { return Math.max(0, Math.min(1, (p - a) / (b - a))); }
	function viewP(el, start, len) { var vh = window.innerHeight, r = el.getBoundingClientRect(); return reduce ? 1 : Math.max(0, Math.min(1, (vh * start - r.top) / (vh * len))); }
	var hero = document.getElementById('hero');
	requestAnimationFrame(function () { setTimeout(function () { hero.classList.add('is-in'); }, 60); });
	var quote = document.querySelector('[data-quote]');
	var voices = Array.prototype.slice.call(document.querySelectorAll('[data-voice]'));
	function onScroll() {
		head.classList.toggle('is-scrolled', window.scrollY > 8);
		var p = viewP(quote, .75, .45);
		quote.style.setProperty('--s', seg(p, .2, .55).toFixed(3));
		quote.style.setProperty('--t', seg(p, .55, .9).toFixed(3));
		voices.forEach(function (el) {
			var q = viewP(el, .85, .4), m = el.querySelectorAll('.mk');
			m[0].style.setProperty('--s1', seg(q, 0, .45).toFixed(3));
			m[1].style.setProperty('--s1', seg(q, .55, 1).toFixed(3));
			m[1].style.setProperty('--s2', seg(q, .45, .7).toFixed(3));
		});
	}
	var ticking = false;
	window.addEventListener('scroll', function () { if (!ticking) { ticking = true; requestAnimationFrame(function () { ticking = false; onScroll(); }); } }, { passive: true });
	window.addEventListener('resize', onScroll); onScroll();
	var io = new IntersectionObserver(function (entries) { entries.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); } }); }, { threshold: 0.2 });
	document.querySelectorAll('.dh-rise').forEach(function (el) { if (reduce) el.classList.add('is-in'); else io.observe(el); });
})();
