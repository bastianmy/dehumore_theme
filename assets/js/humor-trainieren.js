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
	var voices = Array.prototype.slice.call(document.querySelectorAll('[data-voice]'));
	function voiceAt() {
		voices.forEach(function (el) {
			var p = viewP(el, .85, .4), m = el.querySelectorAll('.mk');
			m[0].style.setProperty('--s1', seg(p, 0, .45).toFixed(3));
			m[1].style.setProperty('--s1', seg(p, .55, 1).toFixed(3));
			m[1].style.setProperty('--s2', seg(p, .45, .7).toFixed(3));
		});
	}
	var ticking = false;
	function onScroll() { ticking = false; head.classList.toggle('is-scrolled', window.scrollY > 8); voiceAt(); }
	window.addEventListener('scroll', function () { if (!ticking) { ticking = true; requestAnimationFrame(onScroll); } }, { passive: true });
	window.addEventListener('resize', onScroll); onScroll();
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
	document.querySelectorAll('.tr-tip').forEach(function (tip) {
		var btn = tip.querySelector('.tr-tip-btn');
		btn.addEventListener('click', function (e) { e.stopPropagation(); var o = tip.classList.toggle('is-open'); btn.setAttribute('aria-expanded', o ? 'true' : 'false'); });
		document.addEventListener('click', function () { tip.classList.remove('is-open'); btn.setAttribute('aria-expanded', 'false'); });
		document.addEventListener('keydown', function (e) { if (e.key === 'Escape') { tip.classList.remove('is-open'); btn.setAttribute('aria-expanded', 'false'); btn.blur(); } });
	});
	var io = new IntersectionObserver(function (entries) { entries.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); } }); }, { threshold: 0.15 });
	document.querySelectorAll('.dh-rise').forEach(function (el) { if (reduce) el.classList.add('is-in'); else io.observe(el); });
})();
