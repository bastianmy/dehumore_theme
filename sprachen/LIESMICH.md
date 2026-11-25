# Englische Fassung (britisches Englisch)

Die Website ist zweisprachig über das Plugin **Polylang** (kostenlos). Das Theme liefert die englischen Texte selbst,
weil die sichtbaren Inhalte in den Mustern (`patterns/`) stecken, nicht im Seiteninhalt.

## So funktioniert es im Theme

- `dehumore_sprache()` liest die aktuelle Sprache aus Polylang (`en` oder `de`). Ohne Polylang ist alles deutsch wie bisher.
- Jedes Muster in `patterns/` bindet auf englischen Seiten seine Fassung aus `sprachen/en/<name>.php` ein.
- Englische Seiten sind Polylang-Übersetzungen der deutschen Seiten. Sie bekommen automatisch die Vorlage,
  das CSS und das JS ihrer deutschen Seite (über den Slug der deutschen Seite).
- Links in den englischen Mustern schreibt man als deutsche Adresse: `<?php dehumore_href( '/humor-risk-check/' ); ?>`.
  Gibt es eine englische Übersetzung, wird sie verlinkt, sonst bleibt der deutsche Link.
- `dehumore_sprachregler()` gibt den DE/EN-Regler in der Kopfzeile aus. Er erscheint erst, wenn Polylang aktiv ist
  und beide Sprachen angelegt sind.

## Polylang einrichten (einmalig)

1. Polylang installieren und aktivieren.
2. Sprachen: Deutsch (`de_DE`, Standard), English (UK) (`en_GB`, Kürzel `en`).
3. Allen vorhandenen Inhalten die Standardsprache Deutsch zuweisen (Polylang bietet das nach dem Anlegen an).
4. URL-Einstellungen: Sprache aus dem Verzeichnisnamen (`/en/…`), **Sprache der Standardsprache in der URL ausblenden**
   (deutsche Adressen bleiben unverändert).
5. Englische Übersetzungen anlegen (Titel/Slug englisch, Inhalt darf leer bleiben, außer beim Risk Check):
   Startseite → `/en/`, Humor Risk Check → `humour-risk-check` (Inhalt mit dem Shortcode `[humor_risk_check]`,
   Vorlage „Humor Risk Check“), Humor trainieren → `training-humour`, Humor verstehen → `understanding-humour`,
   Humor und Persönlichkeit → `humour-and-personality`, Humor in Organisationen → `humour-in-organisations`,
   Über De:Humore → `about`.
6. Polylang › Übersetzungen: Untertitel der Website auf Englisch.
7. Prüfen: hreflang im Seitenkopf, `/en/` in der Yoast-Sitemap.

Blogbeiträge, Newsletter, Impressum und Datenschutz bleiben vorerst deutsch und sind auf den englischen Seiten als
„(in German)“ gekennzeichnet.
