/* Einzelbeitrag: Menü, Lesefortschritt, Inhaltsverzeichnis, Teilen, Weiterlesen. */
(function () {
	var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	document.documentElement.classList.add(reduce ? 'no-motion' : 'js');
	var head = document.getElementById('kopf'), burger = document.getElementById('burger');
	if (burger && head) burger.addEventListener('click', function () {
		var open = head.classList.toggle('is-open');
		burger.setAttribute('aria-expanded', open ? 'true' : 'false');
		burger.setAttribute('aria-label', open ? 'Menü schließen' : 'Menü öffnen');
	});
	var art = document.querySelector('.dh-article'), bar = document.getElementById('fortschritt');
	var toc = document.querySelector('.dh-toc'), list = toc ? toc.querySelector('ol') : null;
	var heads = art ? Array.prototype.slice.call(art.querySelectorAll(':scope > h2, :scope > .wp-block-group h2')) : [];
	heads = heads.filter(function (h) { return !h.closest('.mailpoet_form, .sharedaddy, .wp-block-mailpoet-subscription-form-block') && h.textContent.trim(); });
	function slug(t) { return t.toLowerCase().replace(/ä/g, 'ae').replace(/ö/g, 'oe').replace(/ü/g, 'ue').replace(/ß/g, 'ss').replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '').slice(0, 60) || 'abschnitt'; }
	var used = {};
	var links = [];
	if (list && heads.length >= 3) {
		heads.forEach(function (h) {
			if (!h.id) { var s = slug(h.textContent), n = s, i = 2; while (used[n] || document.getElementById(n)) n = s + '-' + i++; h.id = n; }
			used[h.id] = 1;
			var li = document.createElement('li'), a = document.createElement('a');
			a.href = '#' + h.id; a.textContent = h.textContent.trim(); li.appendChild(a); list.appendChild(li); links.push(a);
		});
		toc.hidden = false;
	} else if (toc) { toc.parentNode.classList.add('no-toc'); }
	var det = toc ? toc.querySelector('details') : null;
	function tocMode() { if (det && window.innerWidth > 900) det.open = true; else if (det && !det.dataset.touched) det.open = false; }
	if (det) det.addEventListener('toggle', function () { det.dataset.touched = 1; });
	tocMode(); window.addEventListener('resize', tocMode);
	var ticking = false;
	function onScroll() {
		ticking = false;
		if (head) head.classList.toggle('is-scrolled', window.scrollY > 8);
		if (art && bar) { var r = art.getBoundingClientRect(); bar.style.setProperty('--p', Math.max(0, Math.min(1, -r.top / Math.max(1, r.height - window.innerHeight))).toFixed(4)); }
		var cur = -1;
		heads.forEach(function (h, i) { if (h.getBoundingClientRect().top < window.innerHeight * .3) cur = i; });
		links.forEach(function (a, i) { a.classList.toggle('is-active', i === cur); });
	}
	window.addEventListener('scroll', function () { if (!ticking) { ticking = true; requestAnimationFrame(onScroll); } }, { passive: true });
	window.addEventListener('resize', onScroll); onScroll();
	var li = document.querySelector('.dh-share-li');
	if (li) li.href = 'https://www.linkedin.com/sharing/share-offsite/?url=' + encodeURIComponent(location.origin + location.pathname);
	var copy = document.getElementById('kopieren');
	if (copy) copy.addEventListener('click', function () { try { navigator.clipboard.writeText(location.origin + location.pathname); copy.textContent = 'Link kopiert'; } catch (e) {} });
	var m = document.body.className.match(/postid-(\d+)/);
	if (m) document.querySelectorAll('.dh-related-grid > li.post-' + m[1]).forEach(function (el) { el.classList.add('is-current'); });
	var els = document.querySelectorAll('.dh-rise');
	if (reduce || !('IntersectionObserver' in window)) { els.forEach(function (el) { el.classList.add('is-in'); }); return; }
	var io = new IntersectionObserver(function (entries) { entries.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); } }); }, { threshold: 0.15 });
	els.forEach(function (el) { io.observe(el); });
})();
