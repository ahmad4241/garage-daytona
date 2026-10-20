<?php
/* Garage Daytona — new Contrôle technique OCV page design. LIVE (approved by Ahmad, 15 Oct 2026) on /controle-technique-ocv/. Built by preview/ocv/build_plugin.py */
if (!defined('ABSPATH')) exit;
function gdocv_on() { return function_exists('is_page') && is_page('controle-technique-ocv'); }
add_action('wp_head', function () {
  if (!gdocv_on()) return;
  echo "<script>(function(){var d=document.documentElement;d.classList.add('gdo-js');var s=document.createElement('style');s.id='gdo-head';s.textContent=" . json_encode(GDOCV_HEAD) . ";document.head.appendChild(s);})();</script>\n";
}, 99);
add_action('wp_footer', function () {
  if (!gdocv_on()) return;
  echo "<script id=\"gdocv-js\">try{(" . GDOCV_JS . ")();}catch(e){document.documentElement.classList.remove('gdo-js');console.error(e);}</script>\n";
}, 99);
const GDOCV_HEAD = <<<'GDOCV_HEAD_END'
.gdo-js .elementor-element-5b99e509,.gdo-js .elementor-element-2e913e61,.gdo-js .elementor-element-5684d8b9{display:none!important}
html,body{overflow-x:hidden}
#gd-hero .gdx-sub{display:none!important}
#gd-hero h1{font-size:clamp(25px,7vw,31px)!important;line-height:1.22!important;max-width:15ch!important;margin-left:auto!important;margin-right:auto!important}
#gd-hero .gdx-in{padding-top:30px!important;padding-bottom:34px!important}
#gd-hero .gdx-car{max-width:230px!important;margin-bottom:16px!important}
#gd-hero .gdx-rule{margin-bottom:0!important}
@media (min-width:981px){#gd-hero h1{font-size:clamp(36px,3vw,46px)!important;max-width:none!important}#gd-hero .gdx-in{min-height:330px!important;padding-top:56px!important;padding-bottom:56px!important}#gd-hero .gdx-car{max-width:none!important}}

html{}
.go{--w:#9c2b3b;--nv:#0f172a;--ink:#0f172a;--mut:#64748b;--line:#e2e6ee;font-family:'Hanken Grotesk',system-ui,sans-serif;font-variant-numeric:lining-nums}
.go svg{fill:none;stroke:currentColor;stroke-width:1.6;stroke-linecap:round;stroke-linejoin:round}
.go-in{max-width:1180px;margin:0 auto}
.go-eye{display:block;font-size:11px;font-weight:600;letter-spacing:.24em;text-transform:uppercase;color:var(--w);margin:0 0 10px}
.go-h{font-family:'Playfair Display',Georgia,serif;font-weight:400;color:var(--ink);font-size:clamp(26px,6.8vw,42px);line-height:1.15;margin:0 0 14px}
.go-c{text-align:center}

/* every 3 years */
.go-three{background:#fff;padding:56px 18px 50px;text-align:center}
.go-big{display:block;font-family:'Playfair Display',Georgia,serif;font-size:clamp(64px,20vw,132px);line-height:1;color:var(--ink);letter-spacing:-.02em}
.go-big em{font-style:italic;color:var(--w)}
.go-three p{max-width:620px;margin:16px auto 0;font-size:15.5px;line-height:1.7;color:#475569}

/* checklist sheet + photo */
.go-check{background:#f4f6f9;padding:56px 16px}
.go-grid{display:grid;gap:28px;align-items:center}
.go-sheet{background:#fff;border-radius:18px;box-shadow:0 18px 44px rgba(15,23,42,.12);padding:22px 20px;position:relative}
.go-sheet::before{content:"";position:absolute;top:-9px;left:50%;transform:translateX(-50%);width:84px;height:18px;border-radius:6px;background:linear-gradient(#c9ced8,#9aa2b1);box-shadow:0 2px 4px rgba(0,0,0,.2)}
.go-shead{display:flex;justify-content:space-between;align-items:center;padding-bottom:14px;margin-bottom:6px;border-bottom:1px dashed #cdd3de}
.go-shead b{font-family:'Playfair Display',Georgia,serif;font-weight:400;font-size:20px;color:var(--ink)}
.go-shead span{font-size:11px;font-weight:600;letter-spacing:.14em;text-transform:uppercase;color:var(--mut)}
.go-list{list-style:none;margin:0;padding:0}
.go-list li{display:flex;align-items:center;gap:14px;padding:13px 2px;border-bottom:1px solid #eef1f5;font-size:15.5px;font-weight:600;color:var(--ink)}
.go-list li:last-child{border-bottom:0}
.go-box{flex:0 0 26px;width:26px;height:26px;border-radius:7px;border:2px solid #c3cad6;display:grid;place-items:center;transition:background .25s,border-color .25s}
.go-box svg{width:16px;height:16px;stroke:#fff;stroke-width:3;stroke-dasharray:24;stroke-dashoffset:24;transition:stroke-dashoffset .35s ease}
.go-list li small{margin-left:auto;font-size:11px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:#16a34a;opacity:0;transition:opacity .3s}
.go-list li.ok .go-box{background:var(--w);border-color:var(--w)}
.go-list li.ok .go-box svg{stroke-dashoffset:0}
.go-list li.ok small{opacity:1}
.go-pic{border-radius:20px;overflow:hidden;box-shadow:0 20px 44px rgba(15,23,42,.16)}
.go-pic img{display:block;width:100%;aspect-ratio:4/3;object-fit:cover}

/* prices */
.go-prices{background:#fff;padding:58px 16px}
.go-pg{display:grid;gap:16px;max-width:980px;margin:22px auto 0}
.go-pc{border-radius:20px;padding:26px 22px;border:1px solid var(--line);background:#fff;display:flex;flex-direction:column;gap:10px}
.go-pc.main{background:radial-gradient(90% 140% at 100% 0%,#1e2a47 0%,#0f172a 60%);border:0;color:#fff}
.go-pc .go-tag{font-size:11px;font-weight:600;letter-spacing:.16em;text-transform:uppercase;color:var(--w)}
.go-pc.main .go-tag{color:#e3aab3}
.go-pc h3{margin:0;font-family:'Playfair Display',Georgia,serif;font-weight:400;font-size:24px;line-height:1.2;color:inherit}
.go-pc .go-pr{font-family:'Playfair Display',Georgia,serif;font-size:40px;line-height:1;color:var(--w);font-feature-settings:"lnum" 1}
.go-pc.main .go-pr{color:#fff}
.go-pc .go-pr small{font:500 13px 'Hanken Grotesk',sans-serif;color:var(--mut);margin-left:6px}
.go-pc.main .go-pr small{color:rgba(255,255,255,.6)}
.go-pc p{margin:0;font-size:14.5px;line-height:1.6;color:#475569}
.go-pc.main p{color:rgba(255,255,255,.78)}

/* steps */
.go-steps{background:#f4f6f9;padding:58px 16px}
.go-ol{list-style:none;margin:26px 0 0;padding:0}
.go-ol li{position:relative;padding:0 0 30px 70px}
.go-ol li:last-child{padding-bottom:0}
.go-ol li::before{content:"";position:absolute;left:26px;top:52px;bottom:4px;width:1px;background:#d5dbe5}
.go-ol li:last-child::before{display:none}
.go-n{position:absolute;left:0;top:0;width:52px;height:52px;border-radius:14px;background:#1e2a47;color:#fff;display:grid;place-items:center;box-shadow:0 8px 18px rgba(15,23,42,.18)}
.go-n svg{width:26px;height:26px}
.go-ol h3{margin:13px 0 6px;font-family:'Hanken Grotesk',sans-serif;font-size:17px;font-weight:600;color:var(--ink)}
.go-ol p{margin:0;font-size:14.5px;line-height:1.6;color:#475569}

/* booking */
.go-ctaw{background:#fff;padding:56px 16px 60px}
.go-cta{max-width:980px;margin:0 auto;border-radius:22px;background:var(--w);color:#fff;padding:38px 22px;text-align:center}
.go-cta h2{font-family:'Playfair Display',Georgia,serif;font-weight:400;font-size:clamp(28px,7vw,44px);line-height:1.15;margin:0 0 10px;color:#fff}
.go-cta p{margin:0 auto 22px;max-width:540px;font-size:15px;line-height:1.6;color:rgba(255,255,255,.88)}
.go-btns{display:flex;flex-direction:column;gap:10px;max-width:440px;margin:0 auto}
.go-btn{display:flex;align-items:center;justify-content:center;gap:9px;height:52px;border-radius:12px;font-size:15px;font-weight:600;text-decoration:none!important;transition:filter .2s,background .2s}
.go-btn svg{width:19px;height:19px}
.go-btn.a{background:#0f172a;color:#fff!important}
.go-btn.a:hover{filter:brightness(1.25)}
.go-btn.b{border:1px solid rgba(255,255,255,.55);color:#fff!important}
.go-btn.b:hover{background:rgba(255,255,255,.1)}

.gd-rv{opacity:0;transform:translateY(16px);transition:opacity .7s ease,transform .7s ease}
.gd-rv.in{opacity:1;transform:none}
@media (prefers-reduced-motion:reduce){.gd-rv{opacity:1;transform:none;transition:none}}

@media (min-width:980px){
 .go-three{padding:100px 24px 90px}
 .go-check{padding:100px 24px}
 .go-grid{grid-template-columns:1fr 1fr;gap:64px;align-items:stretch}
 .go-check .go-grid>div:first-child{display:flex;flex-direction:column}
 .go-sheet{flex:1;display:flex;flex-direction:column}
 .go-list{flex:1;display:flex;flex-direction:column;justify-content:space-around}
 .go-pic{height:100%}
 .go-pic img{height:100%;aspect-ratio:auto}
 .go-sheet{padding:30px 34px}
 .go-prices{padding:100px 24px}
 .go-pg{grid-template-columns:1.1fr 1fr;gap:22px}
 .go-pc{padding:38px 36px}
 .go-pc .go-pr{font-size:52px}
 .go-steps{padding:100px 24px}
 .go-ol{display:grid;grid-template-columns:repeat(3,1fr);gap:30px;margin-top:40px}
 .go-ol li{padding:0;text-align:center}
 .go-ol li::before{left:calc(50% + 44px);right:calc(-50% + 8px);top:32px;bottom:auto;width:auto;height:1px}
 .go-n{position:relative;margin:0 auto 14px;width:64px;height:64px;border-radius:18px}
 .go-n svg{width:30px;height:30px}
 .go-ctaw{padding:96px 24px 100px}
 .go-cta{padding:64px 40px}
 .go-btns{flex-direction:row;justify-content:center;max-width:none}
 .go-btn{padding:0 30px}
}

/* header, footer, scroll-to-top: same wine as the other pages */
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

GDOCV_HEAD_END;
const GDOCV_JS = <<<'GDOCV_JS_END'
() => {
  const l = document.createElement('link'); l.rel = 'stylesheet';
  l.href = 'https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&family=Playfair+Display:ital,wght@0,400;1,400&display=swap';
  document.head.appendChild(l);
  const S = p => `<svg viewBox="0 0 24 24" aria-hidden="true">${p}</svg>`;
  const I = {
    tick: '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12.5l4.5 4.5L19 7.5"/></svg>',
    wrench: S('<path d="M14.5 6.5a4 4 0 00-5.3 5.3L4 17l3 3 5.2-5.2a4 4 0 005.3-5.3l-2.5 2.5-2.5-.5-.5-2.5z"/>'),
    truck: S('<path d="M2 16V7h11v9M13 10h4l3.5 3.5V16H13"/><circle cx="6" cy="17" r="2"/><circle cx="17" cy="17" r="2"/><path d="M8 16h7"/>'),
    back: S('<path d="M9 14l-5-5 5-5"/><path d="M4 9h10.5a5.5 5.5 0 010 11H11"/>'),
    phone: S('<path d="M5 4h3l1.5 4-2 1.3a11 11 0 006.2 6.2l1.3-2L19 15v3a2 2 0 01-2 2A14 14 0 013 6a2 2 0 012-2z"/>'),
    wa: S('<path d="M4 20l1.2-4A8 8 0 1112 20a8 8 0 01-4-1.1z"/><path d="M9 8.5c0 3.3 2.7 6.5 6.5 6.5l1-1.6-2-1-1 .9a5 5 0 01-2.8-2.8l.9-1-1-2z"/>')
  };
  const $ = s => document.querySelector(s), el = id => $(`.elementor-element-${id}`);
  const imgOf = id => { const e = el(id); if (!e) return ''; const i = e.querySelector('img'); if (i) return i.currentSrc || i.src;
    for (const n of [e, ...e.querySelectorAll('*')]) { const b = getComputedStyle(n).backgroundImage; const m = b && b.match(/url\(["']?([^"')]+)/); if (m) return m[1]; } return ''; };
  const photo = '/wp-content/uploads/claude/ocv-inspection.webp';
  // prices read from their own boxes (fallback to the values on the page today)
  const priceOf = (id, d) => { const t = (el(id) || {}).textContent || ''; const m = t.match(/(\d+)\s*CHF/); return m ? m[1] : d; };
  const GPX = (window.GD_PRICES && window.GD_PRICES.items) || null, gpFmt = p => String(p).replace('.', ','), gpGet = id => GPX && GPX.find(x => x.id === id);
  const pPrep = gpGet('ocv_prep') ? gpFmt(gpGet('ocv_prep').p) : priceOf('2bf1437c', '300'), pMove = gpGet('ocv_move') ? gpFmt(gpGet('ocv_move').p) : priceOf('41c65ff0', '100');
  const items = ['Freins', 'Pneus', 'Éclairage', 'Fluides', 'Sécurité générale'];
  const wa = 'https://wa.me/41799198647?text=' + encodeURIComponent('Bonjour, je souhaite préparer mon véhicule pour le contrôle technique.');
  const html = `
  <section class="go go-three"><div class="go-in gd-rv"><span class="go-eye">Selon la réglementation</span><span class="go-big">Tous les <em>3&nbsp;ans</em></span><p>Il est recommandé d’effectuer un contrôle technique tous les 3 ans, pour garantir que votre véhicule est sûr et conforme aux normes routières.</p></div></section>
  <section class="go go-check"><div class="go-in go-grid"><div><span class="go-eye gd-rv">Préparation complète</span><h2 class="go-h gd-rv">Nous contrôlons tout, avant la visite</h2><div class="go-sheet gd-rv"><div class="go-shead"><b>Inspection</b><span>Garage Daytona</span></div><ul class="go-list">${items.map(x => `<li><span class="go-box">${I.tick}</span>${x}<small>OK</small></li>`).join('')}</ul></div></div>${photo ? `<div class="go-pic gd-rv"><img src="${photo}" alt="Contrôle des freins avant le contrôle technique" loading="lazy"></div>` : ''}</div></section>
  <section class="go go-prices"><div class="go-in"><span class="go-eye go-c gd-rv">Tarifs</span><h2 class="go-h go-c gd-rv">Deux services, des prix clairs</h2><div class="go-pg">
    <div class="go-pc main gd-rv"><span class="go-tag">Préparation complète pour la visite</span><h3>Inspection mécanique et visuelle</h3><div class="go-pr">${pPrep}<small>CHF</small></div><p>Contrôle complet des fluides, freins, pneus, éclairage et sécurité générale.</p></div>
    <div class="go-pc gd-rv" style="transition-delay:90ms"><span class="go-tag">Service de déplacement</span><h3>Transport aller-retour</h3><div class="go-pr">${pMove}<small>CHF</small></div><p>Nous emmenons votre véhicule au centre de contrôle et vous le ramenons.</p></div>
  </div></div></section>
  <section class="go go-steps"><div class="go-in"><span class="go-eye go-c gd-rv">Sans stress</span><h2 class="go-h go-c gd-rv">Nous nous occupons de tout</h2><ol class="go-ol">
    <li class="gd-rv"><span class="go-n">${I.wrench}</span><h3>Préparation</h3><p>Nous inspectons et préparons votre véhicule pour la visite.</p></li>
    <li class="gd-rv" style="transition-delay:90ms"><span class="go-n">${I.truck}</span><h3>Transport</h3><p>Nous emmenons votre véhicule au centre de contrôle.</p></li>
    <li class="gd-rv" style="transition-delay:180ms"><span class="go-n">${I.back}</span><h3>Retour</h3><p>Nous vous le ramenons, pour votre confort et votre tranquillité d’esprit.</p></li>
  </ol></div></section>
  <section class="go go-ctaw"><div class="go-cta gd-rv"><h2>Préparez votre contrôle technique</h2><p>Assurez la sécurité et la conformité de votre véhicule avec Garage Daytona Genève.</p><div class="go-btns"><a class="go-btn a" href="${wa}" target="_blank" rel="noopener">${I.wa}Réserver sur WhatsApp</a><a class="go-btn b" href="tel:+41227329837">${I.phone}Appeler</a></div></div></section>`;
  const host = document.createElement('div'); host.innerHTML = html;
  const ref = el('5b99e509'); [...host.children].forEach(n => ref.parentNode.insertBefore(n, ref));
  // the checklist ticks itself, one line after the other
  const sheet = $('.go-sheet');
  const io = new IntersectionObserver(es => es.forEach(e => { if (!e.isIntersecting) return; e.target.classList.add('in'); io.unobserve(e.target);
    if (e.target === sheet) sheet.querySelectorAll('li').forEach((li, k) => setTimeout(() => li.classList.add('ok'), 500 + k * 380)); }), {rootMargin: '0px 0px -10% 0px'});
  document.querySelectorAll('.gd-rv').forEach(n => io.observe(n));
}
GDOCV_JS_END;
