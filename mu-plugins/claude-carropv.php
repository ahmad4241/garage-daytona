<?php
/* Garage Daytona — new Carrosserie page design. LIVE (approved by Ahmad, 15 Oct 2026) on /carrosserie/. Built by preview/carrosserie/build_plugin.py */
if (!defined('ABSPATH')) exit;
function gdcarro_on() { return function_exists('is_page') && is_page('carrosserie'); }
add_action('wp_head', function () {
  if (!gdcarro_on()) return;
  echo "<script>(function(){var d=document.documentElement;d.classList.add('gdk-js');var s=document.createElement('style');s.id='gdk-head';s.textContent=" . json_encode(GDCARRO_HEAD) . ";document.head.appendChild(s);})();</script>\n";
}, 99);
add_action('wp_footer', function () {
  if (!gdcarro_on()) return;
  echo "<script id=\"gdcarro-js\">try{(" . GDCARRO_JS . ")();}catch(e){document.documentElement.classList.remove('gdk-js');console.error(e);}</script>\n";
}, 99);
const GDCARRO_HEAD = <<<'GDCARRO_HEAD_END'
.gdk-js .elementor-element-7acd1ddb,.gdk-js .elementor-element-32f3e224,.gdk-js .elementor-element-29e2a2f4{display:none!important}
#gd-hero .gdx-sub{display:none!important}
#gd-hero h1{font-size:clamp(26px,7.2vw,32px)!important;line-height:1.22!important}
#gd-hero .gdx-in{padding-top:30px!important;padding-bottom:34px!important}
#gd-hero .gdx-car{max-width:230px!important;margin-bottom:16px!important}
#gd-hero .gdx-rule{margin-bottom:0!important}
@media (min-width:981px){#gd-hero h1{font-size:clamp(38px,3.1vw,48px)!important;max-width:none!important}#gd-hero .gdx-in{min-height:330px!important;padding-top:56px!important;padding-bottom:56px!important}#gd-hero .gdx-car{max-width:none!important}}

html{}
.gk{--w:#9c2b3b;--nv:#0f172a;--ink:#0f172a;--mut:#64748b;--line:#e2e6ee;font-family:'Hanken Grotesk',system-ui,sans-serif;font-variant-numeric:lining-nums}
.gk svg{fill:none;stroke:currentColor;stroke-width:1.6;stroke-linecap:round;stroke-linejoin:round}
.gk-in{max-width:1180px;margin:0 auto}
.gk-eye{display:block;font-size:11px;font-weight:600;letter-spacing:.24em;text-transform:uppercase;color:var(--w);margin:0 0 10px}
.gk-h{font-family:'Playfair Display',Georgia,serif;font-weight:400;color:var(--ink);font-size:clamp(26px,6.8vw,42px);line-height:1.15;margin:0 0 16px}
.gk-p{margin:0 0 12px;font-size:15.5px;line-height:1.75;color:#475569}
.gk-pic{border-radius:20px;overflow:hidden;box-shadow:0 20px 44px rgba(15,23,42,.16);background:#0f172a}
.gk-pic img{display:block;width:100%;aspect-ratio:4/3;object-fit:cover}

/* intro + photo */
.gk-intro{background:#fff;padding:52px 16px 56px}
.gk-grid{display:grid;gap:28px;align-items:center}
.gk-intro .gk-h em{font-style:italic;color:var(--w)}
.gk-intro .gk-grid>div:first-child{text-align:center}
.gk-intro .gk-grid>div:first-child .gk-p{max-width:560px;margin-left:auto;margin-right:auto}

/* insurance */
.gk-ins{background:#fff;padding:0 16px 56px}
.gk-insb{max-width:980px;margin:0 auto;border-radius:22px;background:radial-gradient(90% 140% at 100% 0%,#1e2a47 0%,#0f172a 60%);color:#fff;padding:30px 22px;display:grid;gap:18px}
.gk-insi{width:56px;height:56px;border-radius:16px;background:var(--w);display:grid;place-items:center}
.gk-insi svg{width:28px;height:28px;color:#fff}
.gk-insb h2{font-family:'Playfair Display',Georgia,serif;font-weight:400;font-size:clamp(25px,6.4vw,36px);line-height:1.18;margin:0 0 8px;color:#fff}
.gk-insb p{margin:0;font-size:15px;line-height:1.65;color:rgba(255,255,255,.8)}

.gk-car{max-width:980px;margin:14px auto 0;border-radius:18px;border:1px solid var(--line);background:#fff;padding:22px 20px;display:flex;gap:16px;align-items:flex-start}
.gk-cari{flex:0 0 46px;width:46px;height:46px;border-radius:12px;background:#1e2a47;color:#fff;display:grid;place-items:center}
.gk-cari svg{width:23px;height:23px}
.gk-car h3{margin:2px 0 6px;font-family:'Playfair Display',Georgia,serif;font-weight:400;font-size:22px;color:var(--ink)}
.gk-car p{margin:0;font-size:14.5px;line-height:1.65;color:#475569}
@media (min-width:980px){.gk-car{margin-top:18px;padding:28px 48px;align-items:center;gap:30px}.gk-cari{flex-basis:56px;width:56px;height:56px}}

/* steps */
.gk-steps{background:#f4f6f9;padding:58px 16px}
.gk-steps .gk-h,.gk-steps .gk-eye{text-align:center}
.gk-ol{list-style:none;margin:26px 0 0;padding:0;display:grid;gap:0}
.gk-ol li{position:relative;padding:0 0 28px 64px}
.gk-ol li:last-child{padding-bottom:0}
.gk-ol li::before{content:"";position:absolute;left:22px;top:46px;bottom:4px;width:1px;background:#d5dbe5}
.gk-ol li:last-child::before{display:none}
.gk-n{position:absolute;left:0;top:0;width:46px;height:46px;border-radius:50%;background:#1e2a47;color:#fff;display:grid;place-items:center;font-family:'Playfair Display',Georgia,serif;font-size:18px}
.gk-ol h3{margin:10px 0 6px;font-family:'Hanken Grotesk',sans-serif;font-size:17px;font-weight:600;color:var(--ink)}
.gk-ol p{margin:0;font-size:14.5px;line-height:1.6;color:#475569}

/* commitments + photo */
.gk-vals{background:#fff;padding:58px 16px}
.gk-vlist{display:grid;gap:22px;margin-top:6px}
.gk-v{border-top:2px solid var(--nv);padding-top:16px}
.gk-v span{display:block;font-size:12px;font-weight:600;letter-spacing:.1em;color:var(--w);margin-bottom:8px}
.gk-v h3{margin:0 0 6px;font-family:'Playfair Display',Georgia,serif;font-weight:400;font-size:23px;color:var(--ink)}
.gk-v p{margin:0;font-size:14.5px;line-height:1.6;color:#475569}

/* commitments as real dashboard dials */
.gk-gauges{background:radial-gradient(120% 90% at 50% 0%,#1e2a47 0%,#0f172a 65%);padding:58px 14px 62px;color:#fff;text-align:center}
.gk-gauges .gk-eye{color:#e3aab3}
.gk-gauges .gk-h{color:#fff;margin-bottom:32px}
.gk-gg{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;max-width:1000px;margin:0 auto}
.gk-g h3{margin:12px 0 4px;font-family:'Playfair Display',Georgia,serif;font-weight:400;font-size:16px;color:#fff}
.gk-g p{margin:0 auto;max-width:230px;font-size:11.5px;line-height:1.5;color:rgba(255,255,255,.68)}
.gk .gk-dial{stroke:none;stroke-width:0}
.gk-dial{display:block;width:100%;max-width:170px;margin:0 auto;filter:drop-shadow(0 10px 18px rgba(0,0,0,.45))}
.gk-dial .num{font:600 11px 'Hanken Grotesk',sans-serif;fill:#cfd6e3}
.gk-dial .ndl{transform-origin:100px 100px;transform:rotate(-135deg);transition:transform 1.9s cubic-bezier(.22,1.1,.3,1) var(--d,0s)}
.gk-g.in .gk-dial .ndl{transform:rotate(105deg)}
@media (prefers-reduced-motion:reduce){.gk-dial .ndl{transition:none}}
@media (min-width:980px){.gk-gauges{padding:100px 24px 110px}.gk-gg{gap:48px}.gk-dial{max-width:250px}.gk-g h3{font-size:26px;margin-top:20px}.gk-g p{font-size:14.5px}}
.gk-ctaw{padding-top:56px!important}
@media (min-width:980px){.gk-ctaw{padding-top:96px!important}}

/* free diagnostic */
.gk-ctaw{background:#fff;padding:0 16px 60px}
.gk-cta{max-width:980px;margin:0 auto;border-radius:22px;background:var(--w);color:#fff;padding:38px 22px;text-align:center}
.gk-cta .gk-eye{color:rgba(255,255,255,.75)}
.gk-cta h2{font-family:'Playfair Display',Georgia,serif;font-weight:400;font-size:clamp(28px,7vw,44px);line-height:1.15;margin:0 0 10px;color:#fff}
.gk-cta p{margin:0 auto 22px;max-width:540px;font-size:15px;line-height:1.6;color:rgba(255,255,255,.88)}
.gk-btns{display:flex;flex-direction:column;gap:10px;max-width:440px;margin:0 auto}
.gk-btn{display:flex;align-items:center;justify-content:center;gap:9px;height:52px;border-radius:12px;font-size:15px;font-weight:600;text-decoration:none!important;transition:filter .2s,background .2s}
.gk-btn svg{width:19px;height:19px}
.gk-btn.a{background:#0f172a;color:#fff!important}
.gk-btn.a:hover{filter:brightness(1.25)}
.gk-btn.b{border:1px solid rgba(255,255,255,.55);color:#fff!important}
.gk-btn.b:hover{background:rgba(255,255,255,.1)}

.gd-rv{opacity:0;transform:translateY(16px);transition:opacity .7s ease,transform .7s ease}
.gd-rv.in{opacity:1;transform:none}
@media (prefers-reduced-motion:reduce){.gd-rv{opacity:1;transform:none;transition:none}}

@media (min-width:980px){
 .gk-intro{padding:100px 24px}
 .gk-grid{grid-template-columns:1fr 1fr;gap:64px}
 .gk-ins{padding:0 24px 100px}
 .gk-insb{grid-template-columns:auto 1fr;align-items:center;gap:30px;padding:44px 48px}
 .gk-steps{padding:100px 24px}
 .gk-ol{grid-template-columns:repeat(4,1fr);gap:28px;margin-top:40px}
 .gk-ol li{padding:0;text-align:center}
 .gk-ol li::before{left:calc(50% + 36px);right:calc(-50% + 8px);top:23px;bottom:auto;width:auto;height:1px}
 .gk-n{position:relative;margin:0 auto 12px}
 .gk-vals{padding:100px 24px}
 .gk-vals .gk-grid{grid-template-columns:.95fr 1.05fr}
 .gk-ctaw{padding:0 24px 100px}
 .gk-cta{padding:64px 40px}
 .gk-btns{flex-direction:row;justify-content:center;max-width:none}
 .gk-btn{padding:0 30px}
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

GDCARRO_HEAD_END;
const GDCARRO_JS = <<<'GDCARRO_JS_END'
() => {
  const l = document.createElement('link'); l.rel = 'stylesheet';
  l.href = 'https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&family=Playfair+Display:ital,wght@0,400;1,400&display=swap';
  document.head.appendChild(l);
  const S = p => `<svg viewBox="0 0 24 24" aria-hidden="true">${p}</svg>`;
  const I = {
    shield: S('<path d="M12 3l7 3v5c0 4.5-3 8.3-7 10-4-1.7-7-5.5-7-10V6z"/><path d="M9 12l2.2 2.2L15.5 10"/>'),
    key: S('<circle cx="8" cy="15" r="4.5"/><path d="M11.2 11.8L20 3M16.5 6.5l2.5 2.5M14 9l2 2"/>'),
    phone: S('<path d="M5 4h3l1.5 4-2 1.3a11 11 0 006.2 6.2l1.3-2L19 15v3a2 2 0 01-2 2A14 14 0 013 6a2 2 0 012-2z"/>'),
    wa: S('<path d="M4 20l1.2-4A8 8 0 1112 20a8 8 0 01-4-1.1z"/><path d="M9 8.5c0 3.3 2.7 6.5 6.5 6.5l1-1.6-2-1-1 .9a5 5 0 01-2.8-2.8l.9-1-1-2z"/>')
  };
  const $ = s => document.querySelector(s), el = id => $(`.elementor-element-${id}`);
  // their two photos, kept and framed the same way
  const imgOf = id => { const e = el(id); if (!e) return ''; const i = e.querySelector('img'); if (i) return i.currentSrc || i.src;
    for (const n of [e, ...e.querySelectorAll('*')]) { const b = getComputedStyle(n).backgroundImage; const m = b && b.match(/url\(["']?([^"')]+)/); if (m) return m[1]; } return ''; };
  const p1 = '/wp-content/uploads/claude/carrosserie-peinture.webp', p2 = imgOf('5080f7bb');
  const pic = (src, alt) => src ? `<div class="gk-pic gd-rv"><img src="${src}" alt="${alt}" loading="lazy"></div>` : '';
  let gid = 0;
  const gauge = () => {
    const id = 'g' + (++gid), cx = 100, cy = 100, A0 = -135, A1 = 135, rad = d => (d - 90) * Math.PI / 180;
    const pt = (d, r) => [(cx + r * Math.cos(rad(d))).toFixed(2), (cy + r * Math.sin(rad(d))).toFixed(2)];
    const arcP = (d0, d1, r) => { const [x0, y0] = pt(d0, r), [x1, y1] = pt(d1, r); return `M${x0} ${y0} A${r} ${r} 0 ${d1 - d0 > 180 ? 1 : 0} 1 ${x1} ${y1}`; };
    let t = '';
    for (let k = 0; k <= 50; k++) { const d = A0 + k * 270 / 50, big = k % 10 === 0, mid = k % 5 === 0, red = k >= 40;
      const [x1, y1] = pt(d, 78), [x2, y2] = pt(d, big ? 64 : mid ? 69 : 72);
      t += `<line x1="${x1}" y1="${y1}" x2="${x2}" y2="${y2}" stroke="${red ? '#d0436f' : '#e8ecf3'}" stroke-width="${big ? 2.6 : mid ? 1.6 : 1}" stroke-linecap="round"/>`; }
    let n = '';
    for (let k = 0; k <= 5; k++) { const [x, y] = pt(A0 + k * 54, 52); n += `<text x="${x}" y="${y}" class="num" text-anchor="middle" dominant-baseline="central">${k * 20}</text>`; }
    return `<svg class="gk-dial" viewBox="0 0 200 200" aria-hidden="true"><defs>
      <linearGradient id="${id}b" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#f4f6fa"/><stop offset=".45" stop-color="#8a93a6"/><stop offset=".55" stop-color="#5b6478"/><stop offset="1" stop-color="#d9dee8"/></linearGradient>
      <radialGradient id="${id}f" cx=".5" cy=".42" r=".62"><stop offset="0" stop-color="#1c2438"/><stop offset=".75" stop-color="#0a0f1c"/><stop offset="1" stop-color="#05070d"/></radialGradient>
      <linearGradient id="${id}n" x1="0" y1="0" x2="1" y2="0"><stop offset="0" stop-color="#ff5d8b"/><stop offset=".5" stop-color="#e2386a"/><stop offset="1" stop-color="#9e1f47"/></linearGradient>
      <radialGradient id="${id}c" cx=".38" cy=".32" r=".8"><stop offset="0" stop-color="#ffffff"/><stop offset=".35" stop-color="#c6ccd8"/><stop offset="1" stop-color="#3a4256"/></radialGradient>
      <linearGradient id="${id}g" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#fff" stop-opacity=".16"/><stop offset=".5" stop-color="#fff" stop-opacity="0"/></linearGradient>
    </defs>
    <circle cx="100" cy="100" r="97" fill="url(#${id}b)"/><circle cx="100" cy="100" r="91" fill="#0b0f19"/><circle cx="100" cy="100" r="88" fill="url(#${id}f)"/>
    <path d="${arcP(A0 + 216, A1, 82)}" stroke="#9c2b3b" stroke-width="5" fill="none" opacity=".9"/>
    ${t}${n}
    <g class="ndl"><polygon points="97.6,108 102.4,108 100.8,30 99.2,30" fill="url(#${id}n)"/><polygon points="98.6,108 101.4,108 100,122" fill="#9e1f47"/></g>
    <circle cx="100" cy="100" r="11" fill="url(#${id}c)"/><circle cx="100" cy="100" r="4" fill="#0f172a"/>
    <ellipse cx="100" cy="58" rx="62" ry="34" fill="url(#${id}g)"/>
    </svg>`;
  };
  const wa = 'https://wa.me/41799198647?text=' + encodeURIComponent('Bonjour, je souhaite un diagnostic carrosserie pour mon véhicule.');
  const html = `
  <section class="gk gk-intro"><div class="gk-in gk-grid"><div class="gd-rv"><span class="gk-eye">Carrosserie et peinture</span><h2 class="gk-h">Un service complet, conforme aux plus hautes normes suisses.</h2><p class="gk-p">Nous réparons la carrosserie de tous types de véhicules, endommagés ou accidentés, avec des technologies et des équipements récents.</p><p class="gk-p">Notre équipe d’experts redonne à votre voiture son apparence et sa sécurité d’origine, avec un souci du détail exceptionnel.</p></div>${pic(p1, 'Peinture automobile en cabine')}</div></section>
  <section class="gk gk-ins"><div class="gk-insb gd-rv"><div class="gk-insi">${I.shield}</div><div><h2>Votre véhicule est assuré ?</h2><p>Il vous suffit de nous le confier : nous prenons en charge l’ensemble des démarches avec votre compagnie d’assurance, pour une expérience simple et sans stress.</p></div></div>
  <div class="gk-car gd-rv"><div class="gk-cari">${I.key}</div><div><h3>Voiture de remplacement</h3><p>Si votre véhicule reste longtemps en réparation, nous mettons à votre disposition une voiture de remplacement, pour ne pas perturber vos déplacements quotidiens.</p></div></div></section>
  <section class="gk gk-steps"><div class="gk-in"><span class="gk-eye gd-rv">Notre méthode</span><h2 class="gk-h gd-rv">Chaque étape, assurée par nous</h2><ol class="gk-ol">
    <li class="gd-rv"><span class="gk-n">1</span><h3>Diagnostic</h3><p>Nous examinons les dégâts de votre véhicule.</p></li>
    <li class="gd-rv" style="transition-delay:90ms"><span class="gk-n">2</span><h3>Évaluation</h3><p>Nous évaluons les travaux nécessaires et vous informons clairement.</p></li>
    <li class="gd-rv" style="transition-delay:180ms"><span class="gk-n">3</span><h3>Réparation</h3><p>Nos experts réparent la carrosserie avec des équipements récents.</p></li>
    <li class="gd-rv" style="transition-delay:270ms"><span class="gk-n">4</span><h3>Peinture finale</h3><p>Votre voiture retrouve son apparence d’origine.</p></li>
  </ol></div></section>
  <section class="gk gk-gauges"><div class="gk-in"><span class="gk-eye gd-rv">Nos engagements</span><h2 class="gk-h gd-rv">Parce que votre voiture mérite le meilleur</h2><div class="gk-gg">
    ${[['Transparence', 'Vous savez à chaque étape ce que nous faisons.'], ['Rapidité', 'Votre véhicule vous est rendu au plus vite.'], ['Précision', 'Un travail soigné, jusqu’au moindre détail.']].map((g, i) => `<div class="gk-g gd-rv" style="--d:${i * 0.25}s">${gauge()}<h3>${g[0]}</h3><p>${g[1]}</p></div>`).join('')}
  </div></div></section>
  <section class="gk gk-ctaw"><div class="gk-cta gd-rv"><span class="gk-eye">Petite réparation ou restauration complète</span><h2>Diagnostic gratuit</h2><p>Venez nous rendre visite dans notre atelier, Rue de Lausanne 64-66 à Genève, ou contactez-nous dès aujourd’hui pour un diagnostic rapide et gratuit de votre véhicule.</p><div class="gk-btns"><a class="gk-btn a" href="${wa}" target="_blank" rel="noopener">${I.wa}Demander un diagnostic</a><a class="gk-btn b" href="tel:+41227329837">${I.phone}Appeler</a></div></div></section>`;
  const host = document.createElement('div'); host.innerHTML = html;
  const ref = el('7acd1ddb'); [...host.children].forEach(n => ref.parentNode.insertBefore(n, ref));
  const io = new IntersectionObserver(es => es.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } }), {rootMargin: '0px 0px -8% 0px'});
  document.querySelectorAll('.gd-rv').forEach(n => io.observe(n));
}
GDCARRO_JS_END;
