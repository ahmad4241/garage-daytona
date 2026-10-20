<?php
/* Garage Daytona — new About page design. LIVE (approved by Ahmad, 15 Oct 2026) on /a-propos/. Built by preview/apropos/build_plugin.py */
if (!defined('ABSPATH')) exit;
function gdaprop_on() { return function_exists('is_page') && is_page('a-propos'); }
add_action('wp_head', function () {
  if (!gdaprop_on()) return;
  echo "<script>(function(){var d=document.documentElement;d.classList.add('gda-js');var s=document.createElement('style');s.id='gda-head';s.textContent=" . json_encode(GDAPROP_HEAD) . ";document.head.appendChild(s);})();</script>\n";
}, 99);
add_action('wp_footer', function () {
  if (!gdaprop_on()) return;
  echo "<script id=\"gdaprop-js\">try{(" . GDAPROP_JS . ")();}catch(e){document.documentElement.classList.remove('gda-js');console.error(e);}</script>\n";
}, 99);
const GDAPROP_HEAD = <<<'GDAPROP_HEAD_END'
.gda-js .elementor-element-0b9e35a,.gda-js .elementor-element-10004f6e,.gda-js .elementor-element-5cbcd712{display:none!important}
#gd-hero .gdx-sub{display:none!important}
#gd-hero h1{font-size:clamp(20px,5.6vw,24px)!important;line-height:1.3!important;max-width:none!important;white-space:nowrap;margin-left:auto!important;margin-right:auto!important}
#gd-hero .gdx-in{padding-top:30px!important;padding-bottom:34px!important}
#gd-hero .gdx-car{max-width:230px!important;margin-bottom:16px!important}
#gd-hero .gdx-rule{margin-bottom:0!important}
@media (min-width:981px){#gd-hero h1{font-size:clamp(34px,2.8vw,44px)!important;max-width:none!important}#gd-hero .gdx-in{min-height:330px!important;padding-top:56px!important;padding-bottom:56px!important}#gd-hero .gdx-car{max-width:none!important}}

html{}
.ga{--w:#9c2b3b;--nv:#0f172a;--ink:#0f172a;--mut:#64748b;--line:#e2e6ee;font-family:'Hanken Grotesk',system-ui,sans-serif;font-variant-numeric:lining-nums}
.ga svg{fill:none;stroke:currentColor;stroke-width:1.6;stroke-linecap:round;stroke-linejoin:round}
.ga-in{max-width:1180px;margin:0 auto}
.ga-eye{display:block;font-size:11px;font-weight:600;letter-spacing:.24em;text-transform:uppercase;color:var(--w);margin:0 0 10px}

/* 1 · odometer, big, right under the hero */
.ga-odo{background:#fff;padding:44px 16px 42px;text-align:center}
.odo{display:inline-flex;gap:8px;padding:10px;border-radius:16px;background:linear-gradient(180deg,#1e293b,#0f172a);box-shadow:0 24px 50px rgba(15,23,42,.28),inset 0 1px 0 rgba(255,255,255,.08)}
.odo-d{position:relative;width:64px;height:90px;border-radius:9px;overflow:hidden;background:#0b1120;box-shadow:inset 0 8px 16px rgba(0,0,0,.6),inset 0 -8px 16px rgba(0,0,0,.6)}
.odo-d.w{background:var(--w)}
.odo-d::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(0,0,0,.45) 0%,rgba(0,0,0,0) 28%,rgba(0,0,0,0) 72%,rgba(0,0,0,.45) 100%);pointer-events:none}
.odo-d::before{content:"";position:absolute;left:0;right:0;top:50%;height:1px;background:rgba(0,0,0,.35);z-index:2}
.odo-s{display:flex;flex-direction:column;transform:translateY(0);transition:transform 2.4s cubic-bezier(.16,.84,.24,1)}
.odo-s span{display:block;height:90px;font:500 68px/90px 'Playfair Display',Georgia,serif;color:#fff;font-feature-settings:"lnum" 1}
.odo-lb{display:block;margin-top:22px;font-size:12.5px;font-weight:600;letter-spacing:.34em;text-transform:uppercase;color:var(--nv)}
.odo-sub{max-width:520px;margin:12px auto 0;color:var(--mut);font-size:15px;line-height:1.6}

/* 2 · one big statement */
.ga-say{background:#f4f6f9;padding:64px 20px}
.ga-say blockquote{max-width:980px;margin:0 auto;padding:0;border:0;text-align:center;font-family:'Playfair Display',Georgia,serif;font-weight:400;font-size:clamp(28px,7.6vw,58px);line-height:1.16;color:var(--ink);letter-spacing:-.005em}
.ga-say blockquote::before{content:"";display:block;width:56px;height:2px;background:var(--w);margin:0 auto 26px}
.ga-say em{font-style:italic;color:var(--w)}

/* 3 · full-width photo with the story card over it */
.ga-story{background:#fff;padding:0 0 60px}
.ga-photo{position:relative;height:62vw;max-height:620px;min-height:260px;overflow:hidden;background:#0f172a}
.ga-photo img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;filter:grayscale(.35) contrast(1.05)}
.ga-photo::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(15,23,42,.15),rgba(15,23,42,.55))}
.ga-card{position:relative;z-index:2;margin:-70px 16px 0;background:#fff;border-radius:20px;padding:28px 22px;box-shadow:0 20px 50px rgba(15,23,42,.14)}
.ga-card h2{font-family:'Playfair Display',Georgia,serif;font-weight:400;color:var(--ink);font-size:clamp(26px,6.6vw,38px);line-height:1.15;margin:0 0 14px}
.ga-txt p{margin:0 0 12px!important;font-size:15.5px!important;line-height:1.75!important;color:#475569!important;font-family:'Hanken Grotesk',sans-serif!important}
.ga-txt p:last-child{margin-bottom:0!important}
.ga-txt b,.ga-txt strong{color:var(--ink)!important;font-weight:600}

/* 4 · services as a numbered list */
.ga-do{background:#fff;padding:20px 16px 60px}
.ga-do h2,.ga-vals h2{font-family:'Playfair Display',Georgia,serif;font-weight:400;color:var(--ink);font-size:clamp(26px,6.6vw,40px);line-height:1.15;margin:0 0 22px}
.ga-list{list-style:none;margin:0;padding:0;border-top:1px solid var(--line)}
.ga-list li{margin:0;border-bottom:1px solid var(--line)}
.ga-list a{display:grid;grid-template-columns:38px 1fr auto;align-items:center;gap:12px;padding:20px 2px;text-decoration:none!important;color:inherit}
.ga-n{font-size:12px;font-weight:600;letter-spacing:.1em;color:var(--mut)}
.ga-nm{display:block;font-family:'Playfair Display',Georgia,serif;font-size:24px;line-height:1.15;color:var(--ink);transition:color .25s}
.ga-ds{display:block;font-size:13.5px;color:var(--mut);margin-top:3px}
.ga-ar{width:40px;height:40px;border-radius:50%;border:1px solid var(--line);display:grid;place-items:center;color:var(--ink);transition:background .25s,color .25s,border-color .25s,transform .25s}
.ga-ar svg{width:18px;height:18px}
.ga-list a:hover .ga-nm{color:var(--w)}
.ga-list a:hover .ga-ar{background:var(--w);border-color:var(--w);color:#fff;transform:translateX(3px)}

/* 5 · values, no boxes */
.ga-vals{background:#f4f6f9;padding:60px 16px}
.ga-vgrid{display:grid;gap:30px}
.ga-v{border-top:2px solid var(--nv);padding-top:18px}
.ga-v .ga-n{display:block;margin-bottom:10px;color:var(--w)}
.ga-v h3{margin:0 0 8px;font-family:'Playfair Display',Georgia,serif;font-weight:400;font-size:24px;line-height:1.2;color:var(--ink)}
.ga-v p{margin:0;font-size:14.5px;line-height:1.65;color:#475569}

/* 6 · wine band */
.ga-bandw{background:#fff;padding:20px 16px 56px}
.ga-band{background:var(--w);color:#fff;padding:40px 22px;text-align:center;border-radius:22px;max-width:980px;margin:0 auto}
.ga-band h2{font-family:'Playfair Display',Georgia,serif;font-weight:400;font-size:clamp(28px,7vw,44px);line-height:1.15;margin:0 0 10px;color:#fff}
.ga-band p{margin:0 auto 24px;max-width:520px;font-size:15px;line-height:1.6;color:rgba(255,255,255,.85)}
.ga-btns{display:flex;flex-direction:column;gap:10px;max-width:420px;margin:0 auto}
.ga-btn{display:flex;align-items:center;justify-content:center;gap:9px;height:52px;border-radius:12px;font-size:15px;font-weight:600;text-decoration:none!important;transition:filter .2s,background .2s}
.ga-btn svg{width:19px;height:19px}
.ga-btn.a{background:#0f172a;color:#fff!important}
.ga-btn.a:hover{filter:brightness(1.25)}
.ga-btn.b{border:1px solid rgba(255,255,255,.55);color:#fff!important}
.ga-btn.b:hover{background:rgba(255,255,255,.1)}

.gd-rv{opacity:0;transform:translateY(16px);transition:opacity .7s ease,transform .7s ease}
.gd-rv.in{opacity:1;transform:none}
@media (prefers-reduced-motion:reduce){.gd-rv{opacity:1;transform:none;transition:none}.odo-s{transition:none}}

@media (min-width:980px){
 .ga-odo{padding:70px 24px 64px}
 .odo{gap:10px;padding:12px}
 .odo-d{width:84px;height:118px}
 .odo-s span{height:118px;font-size:90px;line-height:118px}
 .ga-say{padding:120px 24px}
 .ga-photo{height:560px}
 .ga-card{max-width:760px;margin:-150px auto 0;padding:48px 52px}
 .ga-story{padding-bottom:100px}
 .ga-do{padding:20px 24px 110px}
 .ga-do .ga-in,.ga-vals .ga-in{display:grid;grid-template-columns:.8fr 1.2fr;gap:60px;align-items:start}
 .ga-list a{grid-template-columns:56px 1fr auto;padding:26px 4px}
 .ga-nm{font-size:32px}
 .ga-vals{padding:110px 24px}
 .ga-vgrid{grid-template-columns:repeat(3,1fr);gap:34px}
 .ga-bandw{padding:20px 24px 100px}
 .ga-band{padding:64px 40px}
 .ga-btns{flex-direction:row;justify-content:center;max-width:none}
 .ga-btn{padding:0 30px}
}

/* since + languages */
.odo-since{display:inline-block;margin-top:10px;font-family:'Playfair Display',Georgia,serif;font-style:italic;font-size:17px;color:var(--w)}
.ga-lang{background:#fff;padding:56px 16px 20px;text-align:center}
.ga-lang h2{font-family:'Playfair Display',Georgia,serif;font-weight:400;color:var(--ink);font-size:clamp(26px,6.6vw,40px);line-height:1.15;margin:0 0 8px}
.ga-lang p{margin:0 auto 22px;max-width:520px;color:var(--mut);font-size:15px;line-height:1.6}
.ga-langs{display:flex;flex-wrap:wrap;justify-content:center;gap:10px}
.ga-langs span{display:inline-flex;align-items:center;gap:10px;height:48px;padding:0 20px 0 8px;border-radius:999px;border:1px solid var(--line);font-size:15px;font-weight:600;color:var(--ink);background:#fff}
.ga-langs b{display:grid;place-items:center;width:34px;height:34px;border-radius:50%;background:#1e2a47;color:#fff;font-size:11px;letter-spacing:.06em}
@media (min-width:980px){.ga-lang{padding:100px 24px 30px}.ga-langs{gap:14px}}

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

GDAPROP_HEAD_END;
const GDAPROP_JS = <<<'GDAPROP_JS_END'
() => {
  const l = document.createElement('link'); l.rel = 'stylesheet';
  l.href = 'https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&family=Playfair+Display:wght@400;500&display=swap';
  document.head.appendChild(l);
  const S = p => `<svg viewBox="0 0 24 24" aria-hidden="true">${p}</svg>`;
  const I = {
    eye: S('<path d="M2.5 12S6 5.5 12 5.5 21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12z"/><circle cx="12" cy="12" r="3"/>'),
    heart: S('<path d="M12 20s-7.5-4.6-7.5-10A4.3 4.3 0 0112 7.6 4.3 4.3 0 0119.5 10c0 5.4-7.5 10-7.5 10z"/>'),
    bolt: S('<path d="M13 2.5L5 13.5h6l-1 8 8-11h-6z"/>'),
    arrow: S('<path d="M5 12h14M13 6l6 6-6 6"/>'),
    phone: S('<path d="M5 4h3l1.5 4-2 1.3a11 11 0 006.2 6.2l1.3-2L19 15v3a2 2 0 01-2 2A14 14 0 013 6a2 2 0 012-2z"/>'),
    wa: S('<path d="M4 20l1.2-4A8 8 0 1112 20a8 8 0 01-4-1.1z"/><path d="M9 8.5c0 3.3 2.7 6.5 6.5 6.5l1-1.6-2-1-1 .9a5 5 0 01-2.8-2.8l.9-1-1-2z"/>')
  };
  const $ = s => document.querySelector(s), el = id => $(`.elementor-element-${id}`);
  { const h = $('#gd-hero h1'); if (h && /partenaire/.test(h.textContent)) h.innerHTML = 'Plus qu’un garage,<br>un partenaire sur la route.'; }
  const YEARS = 28; // confirmed by Ahmad (15 Oct 2026)

  // their own story text (first block), one paragraph per sentence group
  const src = el('170baa6e'); let story = '';
  if (src) { const w = src.querySelector('.elementor-widget-container') || src;
    const lines = w.innerHTML.replace(/<br\s*\/?>/gi, '\n').replace(/<\/(p|div)>/gi, '\n').split('\n').map(t => t.trim()).filter(t => t.replace(/<[^>]+>/g, '').trim());
    const all = lines.map(t => t.replace(/<(?!\/?(b|strong)\b)[^>]+>/g, '')).join(' ').replace(/&nbsp;|\u00a0/g, ' ').replace(/DAYTONA GARAGE/g, 'Garage Daytona').replace(/([.!?])(?=[A-ZÀ-Ý])/g, '$1 ').replace(/\s+/g, ' ').trim();
    const sents = all.match(/[^.!?]+[.!?]+/g) || [all];
    const half = Math.ceil(sents.length / 2);
    story = [sents.slice(0, half), sents.slice(half)].filter(x => x.length).map(x => `<p>${x.join(' ').trim()}</p>`).join(''); }
  const pic = el('899e537') && el('899e537').querySelector('img');
  const picSrc = pic ? (pic.currentSrc || pic.src) : '';

  const digits = String(YEARS).split('');
  const odo = digits.map((d, i) => `<span class="odo-d${i === digits.length - 1 ? ' w' : ''}"><span class="odo-s" data-d="${d}">${Array.from({length: 10}, (_, k) => `<span>${k}</span>`).join('')}</span></span>`).join('');

  const html = `
  <section class="ga ga-odo"><div class="ga-in"><div class="odo" role="img" aria-label="${YEARS} ans d’expérience">${odo}</div><span class="odo-lb">Ans d’expérience</span><span class="odo-since">Depuis 1998</span><p class="odo-sub">Réparation, entretien, diagnostic, carrosserie et vente de voitures, à Genève.</p></div></section>
  <section class="ga ga-say"><blockquote class="gd-rv">Nous prenons soin de votre véhicule comme s’il était <em>le nôtre.</em></blockquote></section>
  <section class="ga ga-story">${picSrc ? `<div class="ga-photo"><img src="${picSrc}" alt="L’atelier de Garage Daytona à Genève" loading="lazy"></div>` : ''}<div class="ga-card gd-rv"><span class="ga-eye">À propos</span><h2>Une équipe de professionnels qualifiés</h2><div class="ga-txt">${story}</div></div></section>
  <section class="ga ga-do"><div class="ga-in"><div class="gd-rv"><span class="ga-eye">Nos services</span><h2>Ce que nous faisons</h2></div><ul class="ga-list gd-rv">
    <li><a href="/mecanique/"><span class="ga-n">01</span><span><span class="ga-nm">Mécanique</span><span class="ga-ds">Réparations mécaniques complètes</span></span><span class="ga-ar">${I.arrow}</span></a></li>
    <li><a href="/carrosserie/"><span class="ga-n">02</span><span><span class="ga-nm">Carrosserie</span><span class="ga-ds">Travaux de carrosserie et de peinture</span></span><span class="ga-ar">${I.arrow}</span></a></li>
    <li><a href="/controle-technique-ocv/"><span class="ga-n">03</span><span><span class="ga-nm">Contrôle technique</span><span class="ga-ds">Préparation au contrôle technique</span></span><span class="ga-ar">${I.arrow}</span></a></li>
    <li><a href="/vente-de-voitures/"><span class="ga-n">04</span><span><span class="ga-nm">Vente de voitures</span><span class="ga-ds">Achat et vente de voitures</span></span><span class="ga-ar">${I.arrow}</span></a></li>
  </ul></div></section>
  <section class="ga ga-vals"><div class="ga-in"><div class="gd-rv"><span class="ga-eye">Nos valeurs</span><h2>Ce qui nous guide</h2></div><div class="ga-vgrid">
    <div class="ga-v gd-rv"><span class="ga-n">01</span><h3>Transparence et confiance</h3><p>Un prix clair, adapté à votre voiture, avant chaque intervention.</p></div>
    <div class="ga-v gd-rv" style="transition-delay:90ms"><span class="ga-n">02</span><h3>Comme si c’était la nôtre</h3><p>Chaque véhicule est traité avec le même soin que le nôtre.</p></div>
    <div class="ga-v gd-rv" style="transition-delay:180ms"><span class="ga-n">03</span><h3>Rapide, fiable, de qualité</h3><p>Un service soigné, réalisé par une équipe qualifiée.</p></div>
  </div></div></section>
  <section class="ga ga-lang"><div class="ga-in gd-rv"><span class="ga-eye">Langues</span><h2>Nous parlons votre langue</h2><p>Notre équipe vous accueille et vous conseille en trois langues.</p><div class="ga-langs"><span lang="fr"><b>FR</b>Français</span><span lang="en"><b>EN</b>English</span><span lang="de"><b>DE</b>Deutsch</span></div></div></section>
  <section class="ga ga-bandw"><div class="ga-band gd-rv"><h2>Prenez rendez-vous</h2><p>Appelez-nous ou écrivez-nous sur WhatsApp, notre équipe vous répond.</p><div class="ga-btns"><a class="ga-btn a" href="tel:+41227329837">${I.phone}Appeler</a><a class="ga-btn b" href="https://wa.me/41799198647" target="_blank" rel="noopener">${I.wa}WhatsApp</a></div></div></section>`;
  const host = document.createElement('div'); host.innerHTML = html;
  const ref = el('0b9e35a'); [...host.children].forEach(n => ref.parentNode.insertBefore(n, ref));

  // odometer rolls once when it comes into view
  const roll = () => document.querySelectorAll('.odo-s').forEach((s, i) => { const h = s.firstElementChild.offsetHeight; s.style.transitionDelay = (i * 0.25) + 's'; s.style.transform = `translateY(-${(+s.dataset.d) * h}px)`; });
  const odoEl = $('.odo');
  const io = new IntersectionObserver(es => es.forEach(e => { if (!e.isIntersecting) return; if (e.target === odoEl) roll(); else e.target.classList.add('in'); io.unobserve(e.target); }), {rootMargin: '0px 0px -8% 0px'});
  io.observe(odoEl);
  document.querySelectorAll('.gd-rv').forEach(n => io.observe(n));
  addEventListener('resize', () => { if (odoEl.dataset.done) roll(); });
  odoEl.addEventListener('transitionend', () => { odoEl.dataset.done = 1; });
}
GDAPROP_JS_END;
