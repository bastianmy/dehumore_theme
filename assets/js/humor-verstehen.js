(function () {
	var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	document.documentElement.classList.add(reduce ? 'no-motion' : 'js');
	var head = document.getElementById('kopf'), burger = document.getElementById('burger');
	burger.addEventListener('click', function () {
		var open = head.classList.toggle('is-open');
		burger.setAttribute('aria-expanded', open ? 'true' : 'false');
		burger.setAttribute('aria-label', open ? 'Menü schließen' : 'Menü öffnen');
	});
	var hero = document.getElementById('hero');
	requestAnimationFrame(function () { setTimeout(function () { hero.classList.add('is-in'); }, 60); });
	function onScroll() { head.classList.toggle('is-scrolled', window.scrollY > 8); }
	window.addEventListener('scroll', onScroll, { passive: true }); onScroll();
	var io = new IntersectionObserver(function (entries) { entries.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); } }); }, { threshold: 0.15 });
	document.querySelectorAll('.dh-rise').forEach(function (el) { if (reduce) el.classList.add('is-in'); else io.observe(el); });
})();
