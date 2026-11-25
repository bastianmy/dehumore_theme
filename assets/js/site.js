/* Menü, Kopfzeile und Einblenden für Seiten ohne eigenes Skript. */
(function () {
	var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	document.documentElement.classList.add(reduce ? 'no-motion' : 'js');
	var head = document.getElementById('kopf'), burger = document.getElementById('burger');
	if (burger && head) burger.addEventListener('click', function () {
		var open = head.classList.toggle('is-open');
		burger.setAttribute('aria-expanded', open ? 'true' : 'false');
		var en = document.documentElement.lang.indexOf('en') === 0; burger.setAttribute('aria-label', open ? (en ? 'Close menu' : 'Menü schließen') : (en ? 'Open menu' : 'Menü öffnen'));
	});
	function onScroll() { if (head) head.classList.toggle('is-scrolled', window.scrollY > 8); }
	window.addEventListener('scroll', onScroll, { passive: true }); onScroll();
	var els = document.querySelectorAll('.dh-rise');
	if (reduce || !('IntersectionObserver' in window)) { els.forEach(function (el) { el.classList.add('is-in'); }); return; }
	var io = new IntersectionObserver(function (entries) { entries.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); } }); }, { threshold: 0.15 });
	els.forEach(function (el) { io.observe(el); });
})();
