<?php
/* Garage Daytona — new Nettoyage détaillé page design. LIVE (approved by Ahmad, 15 Oct 2026) on /nettoyage-detaille/. Built by preview/nettoyage/build_plugin.py */
if (!defined('ABSPATH')) exit;
function gdnet_on() { return function_exists('is_page') && is_page('nettoyage-detaille'); }
add_action('wp_head', function () {
  if (!gdnet_on()) return;
  echo "<script>(function(){var d=document.documentElement;d.classList.add('gdn-js');var s=document.createElement('style');s.id='gdn-head';s.textContent=" . json_encode(GDNET_HEAD) . ";document.head.appendChild(s);})();</script>\n";
}, 99);
add_action('wp_footer', function () {
  if (!gdnet_on()) return;
  echo "<script id=\"gdnet-js\">try{(" . GDNET_JS . ")();}catch(e){document.documentElement.classList.remove('gdn-js');console.error(e);}</script>\n";
}, 99);
const GDNET_HEAD = <<<'GDNET_HEAD_END'
.gdn-js .elementor-element-445d21a,.gdn-js .elementor-element-22728984,.gdn-js .elementor-element-3312a16a{display:none!important}
html,body{overflow-x:hidden}
#gd-hero .gdx-sub{display:none!important}
#gd-hero h1{font-size:clamp(25px,7vw,31px)!important;line-height:1.22!important;max-width:16ch!important;margin-left:auto!important;margin-right:auto!important}
#gd-hero .gdx-in{padding-top:30px!important;padding-bottom:34px!important}
#gd-hero .gdx-car{max-width:230px!important;margin-bottom:16px!important}
#gd-hero .gdx-rule{margin-bottom:0!important}
@media (min-width:981px){#gd-hero h1{font-size:clamp(36px,3vw,46px)!important;max-width:none!important}#gd-hero .gdx-in{min-height:330px!important;padding-top:56px!important;padding-bottom:56px!important}#gd-hero .gdx-car{max-width:none!important}}

html{}
.gn{--w:#9c2b3b;--nv:#0f172a;--ink:#0f172a;--mut:#64748b;--line:#e2e6ee;font-family:'Hanken Grotesk',system-ui,sans-serif;font-variant-numeric:lining-nums}
.gn svg{fill:none;stroke:currentColor;stroke-width:1.6;stroke-linecap:round;stroke-linejoin:round}
.gn-in{max-width:1180px;margin:0 auto}
.gn-eye{display:block;font-size:11px;font-weight:600;letter-spacing:.24em;text-transform:uppercase;color:var(--w);margin:0 0 10px}
.gn-h{font-family:'Playfair Display',Georgia,serif;font-weight:400;color:var(--ink);font-size:clamp(26px,6.8vw,42px);line-height:1.15;margin:0 0 14px}
.gn-h em{font-style:italic;color:var(--w)}
.gn-c{text-align:center}
.gn-p{margin:0 auto;max-width:600px;font-size:15.5px;line-height:1.7;color:#475569}

/* intro */
.gn-intro{background:#fff;padding:56px 18px 48px;text-align:center}

/* photo band */
.gn-photo{position:relative;margin:0 16px;border-radius:22px;overflow:hidden;height:62vw;max-height:520px;min-height:240px;background:#0f172a}
.gn-photo img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover}

/* before / after */
.gn-ba{position:relative;margin:0 16px;border-radius:22px;overflow:hidden;aspect-ratio:16/9;background:#0f172a;box-shadow:0 20px 44px rgba(15,23,42,.18);user-select:none;-webkit-user-select:none;touch-action:pan-y}
.gn-ba img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;pointer-events:none}
.gn-bt{position:absolute;inset:0;clip-path:inset(0 calc(100% - var(--p)) 0 0)}
.gn-lb{position:absolute;bottom:14px;height:28px;padding:0 12px;border-radius:999px;font:600 11px/28px 'Hanken Grotesk',sans-serif;letter-spacing:.14em;text-transform:uppercase;color:#fff;background:rgba(15,23,42,.65);backdrop-filter:blur(4px);pointer-events:none}
.gn-lb.l{left:14px}.gn-lb.r{right:14px;background:var(--w)}
.gn-hd{position:absolute;top:0;bottom:0;left:var(--p);width:2px;margin-left:-1px;background:#fff;box-shadow:0 0 12px rgba(0,0,0,.35);pointer-events:none}
.gn-hd span{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:46px;height:46px;border-radius:50%;background:#fff;color:var(--nv);display:grid;place-items:center;box-shadow:0 6px 18px rgba(0,0,0,.3)}
.gn-hd svg{width:22px;height:22px;stroke-width:2.2}
.gn-ba input{position:absolute;inset:0;width:100%;height:100%;margin:0;opacity:0;cursor:ew-resize;-webkit-appearance:none;appearance:none}
@media (min-width:980px){.gn-ba{max-width:1180px;margin:0 auto}.gn-hd span{width:56px;height:56px}}

/* details */
.gn-det{background:#fff;padding:56px 16px}
.gn-dg{display:flex;flex-wrap:wrap;justify-content:center;gap:20px 8px;max-width:900px;margin:26px auto 0}
.gn-dg .gn-d{flex:0 0 calc(33.33% - 6px)}
.gn-d{text-align:center}
.gn-di{width:58px;height:58px;margin:0 auto 10px;border-radius:16px;background:#1e2a47;color:#fff;display:grid;place-items:center;box-shadow:0 8px 18px rgba(15,23,42,.18)}
.gn-di svg{width:28px;height:28px}
.gn-d b{display:block;font-size:13.5px;font-weight:600;color:var(--ink)}

/* packages */
.gn-pk{background:#f4f6f9;padding:58px 16px}
.gn-pg{display:grid;gap:16px;max-width:980px;margin:24px auto 0}
.gn-pc{position:relative;border-radius:20px;padding:26px 22px;border:1px solid var(--line);background:#fff;display:flex;flex-direction:column;gap:10px}
.gn-pc.main{background:radial-gradient(90% 140% at 100% 0%,#1e2a47 0%,#0f172a 60%);border:0;color:#fff}
.gn-badge{position:absolute;top:18px;right:18px;height:26px;padding:0 11px;border-radius:999px;background:var(--w);color:#fff;font:600 11px/26px 'Hanken Grotesk',sans-serif;letter-spacing:.08em;text-transform:uppercase}
.gn-tag{font-size:11px;font-weight:600;letter-spacing:.16em;text-transform:uppercase;color:var(--w)}
.gn-pc.main .gn-tag{color:#e3aab3}
.gn-pc h3{margin:0;font-family:'Playfair Display',Georgia,serif;font-weight:400;font-size:24px;line-height:1.2;color:inherit}
.gn-pr{font-family:'Playfair Display',Georgia,serif;font-size:42px;line-height:1;color:var(--w);font-feature-settings:"lnum" 1}
.gn-pc.main .gn-pr{color:#fff}
.gn-pr small{font:500 13px 'Hanken Grotesk',sans-serif;color:var(--mut);margin-left:6px}
.gn-pr i{display:block;font:500 11px 'Hanken Grotesk',sans-serif;font-style:normal;letter-spacing:.12em;text-transform:uppercase;color:var(--mut);margin-bottom:6px}
.gn-pc.main .gn-pr small,.gn-pc.main .gn-pr i{color:rgba(255,255,255,.6)}
.gn-ul{list-style:none;margin:6px 0 0;padding:0;display:grid;gap:9px}
.gn-ul li{display:flex;gap:10px;align-items:center;font-size:14.5px;color:#475569}
.gn-pc.main .gn-ul li{color:rgba(255,255,255,.82)}
.gn-ul svg{flex:0 0 18px;width:18px;height:18px;color:var(--w);stroke-width:2.4}
.gn-pc.main .gn-ul svg{color:#e3aab3}
.gn-free{max-width:980px;margin:16px auto 0;display:flex;align-items:center;gap:14px;border-radius:16px;background:#fff;border:1px dashed #cdd3de;padding:16px 18px;font-size:14.5px;color:var(--ink)}
.gn-free b{color:var(--w)}
.gn-free span.i{flex:0 0 40px;width:40px;height:40px;border-radius:11px;background:var(--w);color:#fff;display:grid;place-items:center}
.gn-free svg{width:20px;height:20px}

/* booking */
.gn-ctaw{background:#fff;padding:56px 16px 60px}
.gn-cta{max-width:980px;margin:0 auto;border-radius:22px;background:var(--w);color:#fff;padding:38px 22px;text-align:center}
.gn-cta h2{font-family:'Playfair Display',Georgia,serif;font-weight:400;font-size:clamp(28px,7vw,44px);line-height:1.15;margin:0 0 10px;color:#fff}
.gn-cta p{margin:0 auto 22px;max-width:540px;font-size:15px;line-height:1.6;color:rgba(255,255,255,.88)}
.gn-btns{display:flex;flex-direction:column;gap:10px;max-width:440px;margin:0 auto}
.gn-btn{display:flex;align-items:center;justify-content:center;gap:9px;height:52px;border-radius:12px;font-size:15px;font-weight:600;text-decoration:none!important;transition:filter .2s,background .2s}
.gn-btn svg{width:19px;height:19px}
.gn-btn.a{background:#0f172a;color:#fff!important}
.gn-btn.a:hover{filter:brightness(1.25)}
.gn-btn.b{border:1px solid rgba(255,255,255,.55);color:#fff!important}
.gn-btn.b:hover{background:rgba(255,255,255,.1)}

.gd-rv{opacity:0;transform:translateY(16px);transition:opacity .7s ease,transform .7s ease}
.gd-rv.in{opacity:1;transform:none}
@media (prefers-reduced-motion:reduce){.gd-rv{opacity:1;transform:none;transition:none}}

@media (min-width:980px){
 .gn-intro{padding:100px 24px 70px}
 .gn-photo{max-width:1180px;margin:0 auto;height:480px}
 .gn-det{padding:100px 24px}
 .gn-dg{gap:20px;flex-wrap:nowrap}
 .gn-dg .gn-d{flex:1}
 .gn-di{width:72px;height:72px;border-radius:20px}
 .gn-di svg{width:34px;height:34px}
 .gn-d b{font-size:15.5px}
 .gn-pk{padding:100px 24px}
 .gn-pg{grid-template-columns:1fr 1.1fr;gap:22px}
 .gn-pc{padding:38px 36px}
 .gn-pr{font-size:54px}
 .gn-ctaw{padding:96px 24px 100px}
 .gn-cta{padding:64px 40px}
 .gn-btns{flex-direction:row;justify-content:center;max-width:none}
 .gn-btn{padding:0 30px}
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

GDNET_HEAD_END;
const GDNET_JS = <<<'GDNET_JS_END'
() => {
  const l = document.createElement('link'); l.rel = 'stylesheet';
  l.href = 'https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&family=Playfair+Display:ital,wght@0,400;1,400&display=swap';
  document.head.appendChild(l);
  const S = p => `<svg viewBox="0 0 24 24" aria-hidden="true">${p}</svg>`;
  const I = {
    seat: S('<path d="M8 3h5a2 2 0 012 2l-1 8H8.5L7 5a2 2 0 011-2z"/><path d="M6 13h11a2 2 0 012 2v2H5v-2a2 2 0 011-2zM8 17v4M16 17v4"/>'),
    mat: S('<path d="M6 3h12l1 18H5z"/><path d="M8 7h8M8.5 11h7M9 15h6"/>'),
    dash: S('<path d="M3 15a9 9 0 0118 0"/><path d="M3 15h18v3H3z"/><circle cx="8.5" cy="12" r="1.6"/><circle cx="15.5" cy="12" r="1.6"/>'),
    glass: S('<path d="M4 18L7 6h10l3 12z"/><path d="M10 9l-2 6M14 9l-1 3"/>'),
    light: S('<path d="M4 6h16"/><path d="M8 6c0 3 1.8 5 4 5s4-2 4-5"/><path d="M12 14v2M8 15l-1 1.5M16 15l1 1.5"/>'),
    check: '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12.5l4.5 4.5L19 7.5"/></svg>',
    gift: S('<rect x="3.5" y="9" width="17" height="11" rx="1.5"/><path d="M3 9h18M12 9v11M12 9c-2-4-6-4-6-1.5S9 9 12 9zM12 9c2-4 6-4 6-1.5S15 9 12 9z"/>'),
    arrows: S('<path d="M9 7l-5 5 5 5M15 7l5 5-5 5"/>'),
    phone: S('<path d="M5 4h3l1.5 4-2 1.3a11 11 0 006.2 6.2l1.3-2L19 15v3a2 2 0 01-2 2A14 14 0 013 6a2 2 0 012-2z"/>'),
    wa: S('<path d="M4 20l1.2-4A8 8 0 1112 20a8 8 0 01-4-1.1z"/><path d="M9 8.5c0 3.3 2.7 6.5 6.5 6.5l1-1.6-2-1-1 .9a5 5 0 01-2.8-2.8l.9-1-1-2z"/>')
  };
  const $ = s => document.querySelector(s), el = id => $(`.elementor-element-${id}`);
  const imgOf = id => { const e = el(id); if (!e) return ''; const i = e.querySelector('img'); if (i) return i.currentSrc || i.src;
    for (const n of [e, ...e.querySelectorAll('*')]) { const b = getComputedStyle(n).backgroundImage; const m = b && b.match(/url\(["']?([^"')]+)/); if (m) return m[1]; } return ''; };
  const photo = imgOf('d83a9e4') || imgOf('22728984');
  // prices from their own boxes
  const txt = ((el('3312a16a') || {}).textContent || '').replace(/\s+/g, ' ');
  const all = [...txt.matchAll(/(\d+)\s*CHF/g)].map(m => m[1]);
  const GPX = (window.GD_PRICES && window.GD_PRICES.items) || null, gpFmt = p => String(p).replace('.', ','), gpGet = id => GPX && GPX.find(x => x.id === id);
  const pFull = gpGet('net_full') ? gpFmt(gpGet('net_full').p) : (all[0] || '210'), pIn = gpGet('net_in') ? gpFmt(gpGet('net_in').p) : (all[1] || '150');
  const parts = [['seat', 'Sièges'], ['mat', 'Tapis'], ['dash', 'Tableau de bord'], ['glass', 'Vitres'], ['light', 'Plafonnier']];
  const wa = 'https://wa.me/41799198647?text=' + encodeURIComponent('Bonjour, je souhaite réserver un nettoyage détaillé pour mon véhicule.');
  const li = a => a.map(x => `<li>${I.check}${x}</li>`).join('');
  const html = `
  <section class="gn gn-intro"><div class="gn-in gd-rv"><span class="gn-eye">Nettoyage détaillé</span><h2 class="gn-h">Offrez à votre voiture une propreté <em>irréprochable.</em></h2><p class="gn-p">Chaque détail est soigné pour un intérieur impeccable, frais et parfumé, comme si elle sortait du neuf.</p></div></section>
  <div class="gn gn-ba gd-rv" style="--p:50%"><img class="gn-bb" src="/wp-content/uploads/claude/nettoyage-apres.webp" alt="Intérieur après le nettoyage détaillé" loading="lazy"><div class="gn-bt"><img src="/wp-content/uploads/claude/nettoyage-avant.webp" alt="Intérieur avant le nettoyage" loading="lazy"></div><span class="gn-lb l">Avant</span><span class="gn-lb r">Après</span><div class="gn-hd" aria-hidden="true"><span>${I.arrows}</span></div><input type="range" min="0" max="100" value="50" aria-label="Comparer avant et après"></div>
  <section class="gn gn-det"><div class="gn-in"><span class="gn-eye gn-c gd-rv">Chaque détail compte</span><h2 class="gn-h gn-c gd-rv">Rien n’est laissé au hasard</h2><div class="gn-dg">${parts.map((p, i) => `<div class="gn-d gd-rv" style="transition-delay:${i * 70}ms"><div class="gn-di">${I[p[0]]}</div><b>${p[1]}</b></div>`).join('')}</div></div></section>
  <section class="gn gn-pk"><div class="gn-in"><span class="gn-eye gn-c gd-rv">Tarifs</span><h2 class="gn-h gn-c gd-rv">Choisissez votre formule</h2><div class="gn-pg">
    <div class="gn-pc gd-rv"><span class="gn-tag">Intérieur</span><h3>Nettoyage intérieur détaillé</h3><div class="gn-pr"><i>À partir de</i>${pIn}<small>CHF</small></div><ul class="gn-ul">${li(['Sièges et tapis', 'Tableau de bord', 'Vitres et plafonnier'])}</ul></div>
    <div class="gn-pc main gd-rv" style="transition-delay:90ms"><span class="gn-badge">Complet</span><span class="gn-tag">Intérieur + extérieur</span><h3>Nettoyage détaillé et lavage complet</h3><div class="gn-pr">${pFull}<small>CHF</small></div><ul class="gn-ul">${li(['Nettoyage intérieur détaillé', 'Lavage complet de la voiture', 'Intérieur frais et parfumé'])}</ul></div>
  </div><div class="gn-free gd-rv"><span class="i">${I.gift}</span><span>Le nettoyage est <b>offert</b> avec tout service réalisé au garage.</span></div></div></section>
  <section class="gn gn-ctaw"><div class="gn-cta gd-rv"><h2>Une vraie remise à neuf</h2><p>Réservez le nettoyage de votre voiture, nous vous la rendons comme si elle sortait du neuf.</p><div class="gn-btns"><a class="gn-btn a" href="${wa}" target="_blank" rel="noopener">${I.wa}Réserver sur WhatsApp</a><a class="gn-btn b" href="tel:+41227329837">${I.phone}Appeler</a></div></div></section>`;
  const host = document.createElement('div'); host.innerHTML = html;
  const ref = el('445d21a'); [...host.children].forEach(n => ref.parentNode.insertBefore(n, ref));
  // before / after slider
  const ba = $('.gn-ba');
  if (ba) { const r = ba.querySelector('input'); const set = v => ba.style.setProperty('--p', v + '%'); r.addEventListener('input', () => set(r.value));
    // small hint: slides once when it comes into view
    const hint = new IntersectionObserver(es => es.forEach(e => { if (!e.isIntersecting) return; hint.disconnect(); let t0; const run = t => { t0 = t0 || t; const k = Math.min(1, (t - t0) / 1600); const v = 50 + Math.sin(k * Math.PI * 2) * 22 * (1 - k); set(v); r.value = v; if (k < 1) requestAnimationFrame(run); }; setTimeout(() => requestAnimationFrame(run), 500); }), {threshold: .5});
    hint.observe(ba); }
  const io = new IntersectionObserver(es => es.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } }), {rootMargin: '0px 0px -8% 0px'});
  document.querySelectorAll('.gd-rv').forEach(n => io.observe(n));
}
GDNET_JS_END;
