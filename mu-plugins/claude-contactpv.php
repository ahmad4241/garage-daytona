<?php
/* Garage Daytona — new Contact page design. LIVE (approved by Ahmad, 15 Oct 2026) on /contact/. Built by preview/contact/build_plugin.py */
if (!defined('ABSPATH')) exit;
function gdcontact_on() { return function_exists('is_page') && is_page('contact'); }
add_action('wp_head', function () {
  if (!gdcontact_on()) return;
  echo "<script>(function(){var d=document.documentElement;d.classList.add('gdc-js');var s=document.createElement('style');s.id='gdc-head';s.textContent=" . json_encode(GDCONTACT_HEAD) . ";document.head.appendChild(s);})();</script>\n";
}, 99);
add_action('wp_footer', function () {
  if (!gdcontact_on()) return;
  echo "<script id=\"gdcontact-js\">try{(" . GDCONTACT_JS . ")();}catch(e){document.documentElement.classList.remove('gdc-js');console.error(e);}</script>\n";
}, 99);
const GDCONTACT_HEAD = <<<'GDCONTACT_HEAD_END'
.gdc-js .elementor-element-51809b50,.gdc-js .elementor-element-e1f9403,.gdc-js .elementor-element-469a888b{display:none!important}
#gd-hero .gdx-sub{display:none!important}
#gd-hero h1{font-size:clamp(28px,7.4vw,34px)!important}
#gd-hero .gdx-in{padding-top:30px!important;padding-bottom:34px!important}
#gd-hero .gdx-car{max-width:230px!important;margin-bottom:16px!important}
#gd-hero .gdx-rule{margin-bottom:0!important}
@media (min-width:981px){#gd-hero h1{font-size:clamp(40px,3.2vw,50px)!important}#gd-hero .gdx-in{min-height:320px!important;padding-top:56px!important;padding-bottom:56px!important}#gd-hero .gdx-car{max-width:none!important}}

html{}
/* ---------- Garage Daytona · Contact — new design ---------- */

.gc{--w:#9c2b3b;--nv:#0f172a;--ink:#0f172a;--mut:#64748b;--line:#e6e9ef;font-family:'Hanken Grotesk',system-ui,sans-serif;font-variant-numeric:lining-nums}
.gc svg{fill:none;stroke:currentColor;stroke-width:1.6;stroke-linecap:round;stroke-linejoin:round}
.gc-in{max-width:1180px;margin:0 auto}
.gc-eye{display:block;font-size:11px;font-weight:600;letter-spacing:.22em;text-transform:uppercase;color:var(--w);margin:0 0 8px}
.gc-h{font-family:'Playfair Display',Georgia,serif;font-weight:400;color:var(--ink);font-size:clamp(26px,6.6vw,38px);line-height:1.15;margin:0 0 18px}

/* quick actions */
.gc-quick{background:#f4f6f9;padding:28px 16px 30px}
.gc-acts{display:grid;grid-template-columns:1fr 1fr;gap:12px}
.gc-act{display:flex;flex-direction:column;gap:12px;background:#fff;border-radius:16px;padding:18px 16px;text-decoration:none!important;color:inherit;box-shadow:0 1px 2px rgba(15,23,42,.05),0 10px 26px rgba(15,23,42,.06);transition:transform .25s,box-shadow .25s}
.gc-mail{grid-column:1/-1}
.gc-act.main{grid-column:1/-1;flex-direction:row;align-items:center;background:var(--nv);color:#fff}
.gc-ic{width:42px;height:42px;flex:0 0 42px;border-radius:11px;background:#1e2a47;color:#fff;display:grid;place-items:center}
.gc-ic svg{width:21px;height:21px}
.gc-act.main .gc-ic{background:var(--w)}
.gc-l{display:block;font-size:10.5px;font-weight:600;letter-spacing:.16em;text-transform:uppercase;color:var(--mut);margin-bottom:4px}
.gc-act.main .gc-l{color:rgba(255,255,255,.65)}
.gc-v{display:block;font-size:15px;font-weight:600;color:var(--ink);line-height:1.25;word-break:break-word}
.gc-act.main .gc-v{color:#fff;font-size:20px}
.gc-act.main .gc-go{margin-left:auto;color:rgba(255,255,255,.7)}
.gc-go svg{width:20px;height:20px}

/* visit: address + hours + map */
.gc-visit{background:#f4f6f9;padding:0 16px 46px}
.gc-vcard{background:#fff;border-radius:20px;overflow:hidden;box-shadow:0 1px 2px rgba(15,23,42,.05),0 10px 30px rgba(15,23,42,.06)}
.gc-vtxt{padding:24px 20px}
.gc-list{list-style:none;margin:0 0 20px;padding:0;display:grid;gap:14px}
.gc-list li{display:flex;gap:12px;align-items:flex-start;font-size:14px;color:#475569;line-height:1.45}
.gc-list li svg{width:20px;height:20px;color:var(--nv);flex:0 0 20px;margin-top:1px}
.gc-list b{display:block;color:var(--ink);font-weight:600}
.gc-today{display:inline-flex;align-items:center;gap:7px;margin-top:6px;font-size:12.5px;font-weight:600;color:#15803d}
.gc-today i{width:8px;height:8px;border-radius:50%;background:#22c55e}
.gc-today.off{color:var(--mut)}.gc-today.off i{background:#94a3b8}
.gc-map{aspect-ratio:4/3;background:#e2e8f0}
.gc-map iframe{display:block;width:100%;height:100%;border:0;filter:grayscale(.15)}
.gc-btn{display:inline-flex;align-items:center;justify-content:center;gap:9px;height:48px;padding:0 22px;border-radius:12px;font-size:14.5px;font-weight:600;text-decoration:none!important;transition:filter .2s}
.gc-btn svg{width:18px;height:18px}
.gc-btn.a{background:var(--w);color:#fff!important}
.gc-btn.a:hover{filter:brightness(1.08)}
.gc-btn.b{border:1px solid var(--line);color:var(--ink)!important;background:#fff}

/* message form (their own form, restyled) */
.gc-form{background:#fff;padding:52px 16px 56px}
.gc-fcard{max-width:720px;margin:0 auto}
.gc-fcard .gc-lead{color:var(--mut);font-size:14.5px;line-height:1.6;margin:-8px 0 22px}
.gc-fcard .wpr-form-fields-wrap{display:grid!important;gap:14px!important}
.gc-fcard .wpr-field-group{width:100%!important;max-width:100%!important;padding:0!important;margin:0!important}
.gc-fcard .wpr-form-field-label{display:block!important;font:600 13px 'Hanken Grotesk',sans-serif!important;color:var(--ink)!important;margin:0 0 6px!important}
.gc-fcard .wpr-form-field{width:100%!important;border:1px solid #dbe1ea!important;border-radius:12px!important;background:#fff!important;padding:13px 14px!important;font:400 15px 'Hanken Grotesk',sans-serif!important;color:var(--ink)!important;box-shadow:none!important;transition:border-color .2s,box-shadow .2s}
.gc-fcard .wpr-form-field:focus{outline:0!important;border-color:var(--nv)!important;box-shadow:0 0 0 3px rgba(15,23,42,.08)!important}
.gc-fcard textarea.wpr-form-field{min-height:140px!important}
.gc-fcard .wpr-button{display:inline-flex!important;align-items:center!important;justify-content:center!important;line-height:1!important;padding:0 24px!important;width:100%!important;height:50px!important;border:0!important;border-radius:12px!important;background:var(--w)!important;color:#fff!important;font:600 15px 'Hanken Grotesk',sans-serif!important;cursor:pointer}
.gc-fcard .wpr-button:hover{filter:brightness(1.08)}

/* FAQ */
.gc-faq{background:#f4f6f9;padding:52px 16px 60px}
.gc-qs{max-width:820px;margin:0 auto;display:grid;gap:10px}
.gc-q{background:#fff;border-radius:14px;box-shadow:0 1px 2px rgba(15,23,42,.05);overflow:hidden}
.gc-q summary{list-style:none;display:flex;align-items:center;justify-content:space-between;gap:16px;padding:17px 18px;cursor:pointer;font-size:15px;font-weight:600;color:var(--ink);line-height:1.4}
.gc-q summary::-webkit-details-marker{display:none}
.gc-q summary i{flex:0 0 28px;width:28px;height:28px;border-radius:50%;background:#f1f5f9;position:relative;transition:transform .25s,background .25s}
.gc-q summary i::before,.gc-q summary i::after{content:"";position:absolute;left:50%;top:50%;width:11px;height:1.6px;background:var(--nv);transform:translate(-50%,-50%)}
.gc-q summary i::after{transform:translate(-50%,-50%) rotate(90deg);transition:transform .25s}
.gc-q[open] summary i{background:var(--nv)}
.gc-q[open] summary i::before,.gc-q[open] summary i::after{background:#fff}
.gc-q[open] summary i::after{transform:translate(-50%,-50%) rotate(0)}
.gc-q p{margin:0!important;padding:0 18px 18px!important;font-size:14.5px!important;line-height:1.65!important;color:#475569!important}

.gd-rv{opacity:0;transform:translateY(14px);transition:opacity .6s ease,transform .6s ease}
.gd-rv.in{opacity:1;transform:none}
@media (prefers-reduced-motion:reduce){.gd-rv{opacity:1;transform:none;transition:none}}

@media (min-width:980px){
 .gc-quick{padding:56px 24px 28px}
 .gc-acts{grid-template-columns:1.4fr 1fr 1fr 1fr;gap:16px}
 .gc-act.main,.gc-mail{grid-column:auto}
 .gc-act.main{flex-direction:column;align-items:flex-start}
 .gc-act.main .gc-go{display:none}
 .gc-act:hover{transform:translateY(-3px);box-shadow:0 16px 34px rgba(15,23,42,.12)}
 .gc-visit{padding:0 24px 80px}
 .gc-vcard{display:grid;grid-template-columns:.9fr 1.1fr}
 .gc-vtxt{padding:44px 44px}
 .gc-map{aspect-ratio:auto;min-height:380px}
 .gc-form{padding:90px 24px}
 .gc-fcard .wpr-form-fields-wrap{grid-template-columns:1fr 1fr}
 .gc-fcard .wpr-field-group-message,.gc-fcard .wpr-form-field-type-submit{grid-column:1/-1}
 .gc-fcard .wpr-button{width:auto!important;padding:0 34px!important}
 .gc-faq{padding:90px 24px 100px}
}

/* header, footer, scroll-to-top: same wine as the Mécanique page */
#gd-hdr .nav>ul>li.on>a::after,#gd-hdr .nav>ul>li.on>button::after,#gd-hdr .cta::after{background:#9c2b3b!important}
#gd-hdr .menu a.cur{color:#9c2b3b!important}
#gd-hdr .cta,#gd-hdr .cta:hover{background:#9c2b3b!important}
#gd-drw .n{color:#9c2b3b!important}
#gd-drw .sub a.cur::before{background:#9c2b3b!important}
#gd-drw .tels a:first-child{background:#9c2b3b!important;border-color:#9c2b3b!important}
#gd-hdr svg [fill="#b84d5c"],#gd-ftr svg [fill="#b84d5c"]{fill:#9c2b3b!important}
#gd-hdr svg [stroke="#b84d5c"],#gd-ftr svg [stroke="#b84d5c"]{stroke:#9c2b3b!important}
#gd-ftr .k i{background:#9c2b3b!important}
#gd-ftr .act .l,#gd-ftr .days li.td span::after{color:#9c2b3b!important}
#gd-ftr .act:nth-child(1){background:#9c2b3b!important}
#gd-ftr .act:nth-child(1) .l{color:rgba(255,255,255,.75)!important}
#gd-ftr .cbtn,#gd-ftr .cbtn:hover{background:#9c2b3b!important}
#gd-ftr .col a{background-image:linear-gradient(#9c2b3b,#9c2b3b)!important}
html body #ast-scroll-top,html body #ast-scroll-top:hover{background-color:#9c2b3b!important;border-color:#9c2b3b!important;color:#fff!important}
/* contact list: one tidy card, every row the same */
.gc-rows{list-style:none;margin:0;padding:4px 0;background:#fff;border-radius:18px;box-shadow:0 1px 2px rgba(15,23,42,.05),0 10px 30px rgba(15,23,42,.06)}
.gc-rows li{margin:0;border-top:1px solid var(--line)}
.gc-rows li:first-child{border-top:0}
.gc-rows a{display:flex;align-items:center;gap:14px;padding:15px 16px;text-decoration:none!important;color:inherit}
.gc-rows .gc-ic{width:42px;height:42px;flex:0 0 42px;margin:0}
.gc-rows .gc-t{flex:1;min-width:0}
.gc-rows .gc-l{margin-bottom:3px}
.gc-rows .gc-v{font-size:16px;font-weight:600;color:var(--ink);white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.gc-cta{flex:0 0 auto;height:34px;padding:0 14px;border-radius:999px;border:1px solid var(--line);font-size:13px;font-weight:600;color:var(--w);display:inline-flex;align-items:center;transition:background .2s,color .2s,border-color .2s}
.gc-rows a:hover .gc-cta{background:var(--w);border-color:var(--w);color:#fff}
@media (min-width:980px){
 .gc-rows{display:grid;grid-template-columns:repeat(4,1fr);padding:0}
 .gc-rows li{border-top:0;border-left:1px solid var(--line)}
 .gc-rows li:first-child{border-left:0}
 .gc-rows a{flex-direction:column;align-items:flex-start;gap:14px;padding:26px 24px;height:100%}
 .gc-rows .gc-t{width:100%}
 .gc-rows .gc-v{font-size:16.5px}
 .gc-cta{margin-top:auto}
}
.gc-cta{min-width:88px;justify-content:center}
@media (max-width:979px){.gc-rows li:last-child .gc-v{white-space:normal;font-size:14.5px;word-break:normal}}
/* photo of the entrance so visitors recognise it */
.gc-entree{position:relative;margin:4px 0 20px;border-radius:14px;overflow:hidden;aspect-ratio:4/3;background:#e9edf4}
.gc-entree img{display:block;width:100%;height:100%;object-fit:cover}
.gc-entree figcaption{position:absolute;left:10px;bottom:10px;background:rgba(15,23,42,.75);color:#fff;font-size:12.5px;font-weight:600;padding:5px 9px;border-radius:8px}

GDCONTACT_HEAD_END;
const GDCONTACT_JS = <<<'GDCONTACT_JS_END'
() => {
  const l = document.createElement('link'); l.rel = 'stylesheet';
  l.href = 'https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&family=Playfair+Display:wght@400&display=swap';
  document.head.appendChild(l);
  const S = p => `<svg viewBox="0 0 24 24" aria-hidden="true">${p}</svg>`;
  const I = {
    phone: S('<path d="M5 4h3l1.5 4-2 1.3a11 11 0 006.2 6.2l1.3-2L19 15v3a2 2 0 01-2 2A14 14 0 013 6a2 2 0 012-2z"/>'),
    mobile: S('<rect x="7" y="2.5" width="10" height="19" rx="2.2"/><path d="M11 18.5h2"/>'),
    wa: S('<path d="M4 20l1.2-4A8 8 0 1112 20a8 8 0 01-4-1.1z"/><path d="M9 8.5c0 3.3 2.7 6.5 6.5 6.5l1-1.6-2-1-1 .9a5 5 0 01-2.8-2.8l.9-1-1-2z"/>'),
    mail: S('<rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3.5 6.5L12 13l8.5-6.5"/>'),
    pin: S('<path d="M12 21s-6.5-5.6-6.5-11a6.5 6.5 0 0113 0c0 5.4-6.5 11-6.5 11z"/><circle cx="12" cy="10" r="2.4"/>'),
    clock: S('<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/>'),
    cal: S('<rect x="3.5" y="5" width="17" height="15" rx="2"/><path d="M3.5 9.5h17M8 3v4M16 3v4"/>'),
    arrow: S('<path d="M5 12h14M13 6l6 6-6 6"/>')
  };
  const $ = s => document.querySelector(s), el = id => $(`.elementor-element-${id}`);
  const txt = id => { const e = el(id); return e ? e.textContent.replace(/\s+/g, ' ').trim() : ''; };
  // their own numbers, read from the page
  const num = (id, lbl) => (txt(id).replace(lbl, '').match(/\+?[\d ]{9,}/) || [''])[0].trim();
  const mob = num('28ae14de', 'Mobile') || '+41 79 561 8647', fix = num('6e3922d', 'Téléphone Fixe') || '+41 22 732 9837', wa = num('1de8fd0', 'Whatsapp') || '+41 79 919 8647';
  const mail = (txt('32dd067b').match(/[\w.+-]+@[\w.-]+/) || ['garage-daytona@bluewin.ch'])[0];
  const dial = n => n.replace(/[^\d+]/g, ''), nice = n => { const d = dial(n).replace(/^\+41/, '0'); return d.replace(/^(\d{3})(\d{3})(\d{2})(\d{2})$/, '$1 $2 $3 $4'); };

  // today open / closed (Geneva time)
  const now = new Date(new Date().toLocaleString('en-US', {timeZone: 'Europe/Zurich'}));
  const d = now.getDay(), m = now.getHours() * 60 + now.getMinutes(), open = d >= 1 && d <= 5 && m >= 450 && m < 1020;
  const today = open ? '<span class="gc-today"><i></i>Ouvert maintenant · jusqu’à 17:00</span>' : '<span class="gc-today off"><i></i>Fermé maintenant</span>';

  // FAQ from their accordion (questions and answers paired, duplicates removed)
  const acc = el('6538db5b'), qa = [];
  if (acc) acc.querySelectorAll('.wpr-accordion-item-wrap').forEach(w => {
    const q = (w.querySelector('.wpr-acc-title-text') || {}).textContent, a = (w.querySelector('.wpr-acc-panel') || {}).textContent;
    if (q && a) { const Q = q.replace(/\s+/g, ' ').trim().replace(/([^?])$/, '$1 ?'), A = a.replace(/\s+/g, ' ').trim().replace(/([^.!?])$/, '$1.'); if (!/garantie/i.test(Q) && !qa.some(x => x.q === Q)) qa.push({q: Q, a: A}); }
  });

  const map = el('942ca17') && el('942ca17').querySelector('iframe');
  const mapSrc = map ? map.src.replace(/([?&])z=\d+/, '$1z=15') : '';

  const html = `
  <section class="gc gc-quick"><div class="gc-in"><ul class="gc-rows gd-rv">
    <li><a href="tel:${dial(fix)}"><span class="gc-ic">${I.phone}</span><span class="gc-t"><span class="gc-l">Téléphone</span><span class="gc-v">${nice(fix)}</span></span><span class="gc-cta">Appeler</span></a></li>
    <li><a href="tel:${dial(mob)}"><span class="gc-ic">${I.mobile}</span><span class="gc-t"><span class="gc-l">Mobile</span><span class="gc-v">${nice(mob)}</span></span><span class="gc-cta">Appeler</span></a></li>
    <li><a href="https://wa.me/${dial(wa).replace('+', '')}" target="_blank" rel="noopener"><span class="gc-ic">${I.wa}</span><span class="gc-t"><span class="gc-l">WhatsApp</span><span class="gc-v">${nice(wa)}</span></span><span class="gc-cta">Écrire</span></a></li>
    <li><a href="mailto:${mail}"><span class="gc-ic">${I.mail}</span><span class="gc-t"><span class="gc-l">E-mail</span><span class="gc-v">${mail.replace("@", "@<wbr>")}</span></span><span class="gc-cta">Envoyer</span></a></li>
  </ul></div></section>
  <section class="gc gc-visit"><div class="gc-in"><div class="gc-vcard gd-rv">
    <div class="gc-vtxt"><span class="gc-eye">Nous trouver</span><h2 class="gc-h">Venez nous voir</h2>
      <ul class="gc-list"><li>${I.pin}<span><b>Rue de Lausanne 64-66</b>1202 Genève</span></li><li>${I.clock}<span><b>Lundi – vendredi</b>07:30 – 17:00<br>${today}</span></li><li>${I.cal}<span><b>Samedi – dimanche</b>Sur rendez-vous</span></li></ul>
      <figure class="gc-entree"><img src="/wp-content/uploads/claude/atelier/atelier-entree-m.webp" srcset="/wp-content/uploads/claude/atelier/atelier-entree-m.webp 800w, /wp-content/uploads/claude/atelier/atelier-entree.webp 1400w" sizes="(max-width:760px) 100vw, 480px" alt="Entrée du Garage Daytona, Rue de Lausanne 64-66" loading="lazy" decoding="async"><figcaption>Notre entrée</figcaption></figure>
      <a class="gc-btn a" href="https://www.google.com/maps/search/?api=1&query=Rue+de+Lausanne+64+1202+Gen%C3%A8ve" target="_blank" rel="noopener">${I.pin}Itinéraire</a></div>
    ${mapSrc ? `<div class="gc-map"><iframe loading="lazy" src="${mapSrc}" title="Garage Daytona, Rue de Lausanne 64-66, Genève"></iframe></div>` : ''}
  </div></div></section>
  <section class="gc gc-form"><div class="gc-fcard gd-rv"><span class="gc-eye">Message</span><h2 class="gc-h">Écrivez-nous</h2><p class="gc-lead">Une question, un devis, un rendez-vous ? Laissez-nous un message, nous vous répondons rapidement.</p><div class="gc-fslot"></div></div></section>
  ${qa.length ? `<section class="gc gc-faq"><div class="gc-in"><span class="gc-eye gd-rv" style="text-align:center">FAQ</span><h2 class="gc-h gd-rv" style="text-align:center">Questions fréquentes</h2><div class="gc-qs">${qa.map((x, i) => `<details class="gc-q gd-rv"${i ? '' : ' open'}><summary>${x.q}<i></i></summary><p>${x.a}</p></details>`).join('')}</div></div></section>` : ''}`;
  const host = document.createElement('div'); host.innerHTML = html;
  const ref = el('51809b50'); [...host.children].forEach(n => ref.parentNode.insertBefore(n, ref));

  // move their working form into the new block, with French labels
  const form = el('7131a30d');
  if (form) {
    $('.gc-fslot').appendChild(form);
    const fr = {name: 'Nom', email: 'E-mail', message: 'Message'};
    Object.entries(fr).forEach(([k, v]) => { const f = form.querySelector(`#form-field-${k}`), lb = form.querySelector(`label[for="form-field-${k}"]`); if (lb) lb.textContent = v; if (f) f.placeholder = k === 'message' ? 'Votre message' : v; });
    const b = form.querySelector('.wpr-button span span'); if (b) b.textContent = 'Envoyer';
  }

  const io = new IntersectionObserver(es => es.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } }), {rootMargin: '0px 0px -6% 0px'});
  document.querySelectorAll('.gd-rv').forEach(n => io.observe(n));
}
GDCONTACT_JS_END;
