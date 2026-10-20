<?php
/* Garage Daytona — new Mécanique page design (prices list, steps, booking box, unified navy + wine).
   Live on /mecanique/ (approved by Ahmad, 15 Oct 2026). Built by preview/mec/build_plugin.py — edit fix.css / fix.js there, not here.
   Prices and names are read from the Elementor content, so editing them in Elementor still works. */
if (!defined('ABSPATH')) exit;
function gdmecpv_on() { return function_exists('is_page') && is_page('mecanique'); }
add_action('wp_head', function () {
  if (!gdmecpv_on()) return;
  echo "<script>document.documentElement.classList.add('gdmec-js')</script>\n<style id=\"gdmecpv-css\">" . GDMECPV_CSS . "</style>\n";
}, 99);
add_action('wp_footer', function () {
  if (!gdmecpv_on()) return;
  echo "<script id=\"gdmecpv-js\">try{(" . GDMECPV_JS . ")();}catch(e){document.documentElement.classList.remove('gdmec-js');}</script>\n";
}, 99);
const GDMECPV_CSS = <<<'GDMECPV_CSS_END'
/* ---------- Garage Daytona · Mécanique — preview styles ---------- */
.elementor-element-ef1c14f{width:100%!important;max-width:100%!important}
.elementor-element-d0d3f10{background-image:none!important}
.elementor-element-d0d3f10::before,.elementor-element-d0d3f10>.elementor-background-overlay{display:none!important}
.elementor-element-a091f4e .elementor-heading-title{font-family:'Playfair Display',Georgia,serif!important;font-weight:400!important;color:#0f172a!important;font-size:clamp(26px,6.4vw,40px)!important;line-height:1.15!important}
.elementor-element-71ef363 .elementor-heading-title{text-transform:none!important;font-family:'Hanken Grotesk',system-ui,sans-serif!important;font-weight:400!important;color:#475569!important;font-size:15.5px!important;line-height:1.7!important}
.gdmec-js .elementor-element-51bfb7b1,.gdmec-js .elementor-element-1766f2e4,.gdmec-js .elementor-element-2f3e9f98,.gdmec-js .elementor-element-1efeb914,.gdmec-js .elementor-element-a7a3ae3,.gdmec-js .elementor-element-95395c9,.gdmec-js .elementor-element-9dc5957{display:none!important}

.gdp,.gdt,.gds{--w:#9c2b3b;--w2:#9c2b3b;--nv:#0f172a;--ink:#0f172a;--mut:#64748b;--line:#e6e9ef;--tint:#eef1f6;font-family:'Hanken Grotesk',system-ui,sans-serif;font-variant-numeric:lining-nums}
.gdp svg,.gdt svg,.gds svg{fill:none;stroke:currentColor;stroke-width:1.6;stroke-linecap:round;stroke-linejoin:round}

/* trust points under the presentation */
.gdt{display:flex;flex-wrap:wrap;justify-content:center;gap:8px 10px;padding:4px 16px 40px;max-width:900px;margin:0 auto}
.gdt span{display:inline-flex;align-items:center;gap:8px;padding:9px 14px 9px 10px;border:1px solid var(--line);border-radius:999px;font-size:13px;font-weight:600;color:var(--ink);background:#fff}
.gdt svg{width:18px;height:18px;color:var(--nv)}

/* price sections */
.gdp{background:#f4f6f9;padding:52px 16px 56px}
.gdp-in{max-width:1180px;margin:0 auto}
.gdp-eye{display:block;text-align:center;font-size:11px;font-weight:600;letter-spacing:.22em;text-transform:uppercase;color:var(--w);margin:0 0 10px}
.gdp-h{font-family:'Playfair Display',Georgia,serif;font-weight:400;color:var(--ink);text-align:center;font-size:clamp(27px,6.8vw,42px);line-height:1.15;margin:0 0 30px}
.gdp-grp{margin:0 0 22px}
.gdp-gt{display:flex;align-items:center;gap:12px;margin:0 4px 10px;font-size:11.5px;font-weight:600;letter-spacing:.16em;text-transform:uppercase;color:var(--mut)}
.gdp-gt::after{content:"";flex:1;height:1px;background:#dde2ea}
.gdp-gt i{font-style:normal;color:var(--w)}
.gdp-list{list-style:none;margin:0;padding:2px 0;background:#fff;border-radius:16px;box-shadow:0 1px 2px rgba(15,23,42,.05),0 10px 30px rgba(15,23,42,.06)}
.gdp-it{display:flex;align-items:center;gap:14px;padding:14px 16px;border-top:1px solid var(--line)}
.gdp-it:first-child{border-top:0}
.gdp-ic{flex:0 0 40px;height:40px;border-radius:10px;background:#1e2a47;display:grid;place-items:center;color:#fff}
.gdp-ic svg{width:21px;height:21px}
.gdp-nm{flex:1;min-width:0;font-size:15px;font-weight:600;color:var(--ink);line-height:1.3}
.gdp-nm small{display:block;font-size:12px;font-weight:400;color:var(--mut);margin-top:2px}
.gdp-pr{flex:0 0 auto;text-align:right;font-family:'Playfair Display',Georgia,serif;font-size:19px;color:var(--w);white-space:nowrap;line-height:1.1;font-feature-settings:"lnum" 1}
.gdp-pr em{display:block;font-style:normal;font-family:'Hanken Grotesk',sans-serif;font-size:10.5px;letter-spacing:.04em;color:var(--mut);margin-top:3px}
.gdp-pr b{display:block;font-weight:400;font-family:'Hanken Grotesk',sans-serif;font-size:10px;letter-spacing:.12em;text-transform:uppercase;color:var(--mut)}
.gdp-note{display:flex;align-items:center;justify-content:center;gap:10px;margin:22px auto 0;text-align:center;font-size:14px;font-weight:600;color:var(--nv)}
.gdp-note::before{content:"";flex:0 0 18px;height:18px;border-radius:50%;background:var(--w) url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath d='M6 12.5l4 4 8-9' fill='none' stroke='white' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E") center/12px no-repeat}

/* booking call-to-action */
.gdp-cta{margin:30px auto 0;max-width:880px;border-radius:20px;background:radial-gradient(90% 140% at 100% 0%,#1e2a47 0%,#0f172a 60%);color:#fff;padding:26px 22px;text-align:center;position:relative;overflow:hidden}
.gdp-cta h3{font-family:'Playfair Display',Georgia,serif;font-weight:400;font-size:24px;line-height:1.2;margin:0 0 6px;color:#fff}
.gdp-cta p{margin:0 0 18px;font-size:14px;line-height:1.55;color:rgba(255,255,255,.78)}
.gdp-btns{display:flex;flex-direction:column;gap:10px}
.gdp-btn{display:flex;align-items:center;justify-content:center;gap:9px;height:50px;border-radius:12px;font-size:15px;font-weight:600;text-decoration:none!important}
.gdp-btn svg{width:19px;height:19px}
.gdp-btn.a{background:#9c2b3b;color:#fff!important}
.gdp-btn.a:hover{background:#9c2b3b}
.gdp-btn.b{border:1px solid rgba(255,255,255,.45);color:#fff!important}

/* three steps */
.gds{background:#fff;padding:56px 16px 58px}
.gds-in{max-width:1080px;margin:0 auto}
.gds .gdp-h{margin-bottom:8px}
.gds-lead{text-align:center!important;display:block;color:var(--mut);font-size:15px;line-height:1.6;margin:0 auto 34px;max-width:560px}
.gds ol{list-style:none;margin:0;padding:0;position:relative}
.gds li{position:relative;padding:0 0 26px 62px}
.gds li:last-child{padding-bottom:0}
.gds li::before{content:"";position:absolute;left:21px;top:44px;bottom:2px;width:1px;background:linear-gradient(var(--line),var(--line))}
.gds li:last-child::before{display:none}
.gds-n{position:absolute;left:0;top:0;width:44px;height:44px;border-radius:50%;border:1px solid var(--nv);display:grid;place-items:center;font-family:'Playfair Display',Georgia,serif;font-size:17px;color:#fff;background:#1e2a47}
.gds h4{margin:9px 0 6px;font-size:16.5px;font-weight:600;color:var(--ink)}
.gds p{margin:0;font-size:14.5px;line-height:1.6;color:#475569}

/* reveal on scroll */
.gd-rv{opacity:0;transform:translateY(14px);transition:opacity .6s ease,transform .6s ease}
.gd-rv.in{opacity:1;transform:none}
@media (prefers-reduced-motion:reduce){.gd-rv{opacity:1;transform:none;transition:none}}

@media (min-width:768px){
 .gdt{padding-bottom:56px}
 .gdp{padding:88px 24px 92px}
 .gdp-h{margin-bottom:46px}
 .gdp-svc .gdp-groups{display:grid;grid-template-columns:repeat(3,1fr);gap:22px;align-items:start}
 .gdp-grp{margin:0}
 .gdp-it{padding:16px 18px;transition:background .2s}
 .gdp-it:hover{background:#f8fafc}
 .gdp-parts .gdp-list{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;background:none;box-shadow:none;padding:0}
 .gdp-parts .gdp-it{flex-direction:column;align-items:flex-start;gap:0;border:1px solid var(--line);border-radius:16px;background:#fff;padding:24px 22px 22px;transition:transform .25s,box-shadow .25s}
 .gdp-parts .gdp-it:hover{transform:translateY(-4px);box-shadow:0 14px 34px rgba(15,23,42,.12)}
 .gdp-parts .gdp-ic{margin-bottom:18px;width:46px;height:46px;flex:0 0 auto}
 .gdp-parts .gdp-nm{margin-bottom:16px}
 .gdp-parts .gdp-pr{text-align:left;font-size:25px}
 .gdp-cta{display:flex;align-items:center;justify-content:space-between;gap:24px;text-align:left;padding:30px 34px;margin-top:40px}
 .gdp-cta p{margin:0}
 .gdp-btns{flex-direction:row;flex:0 0 auto}
 .gdp-btn{padding:0 22px}
 .gds{padding:92px 24px}
 .gds ol{display:grid;grid-template-columns:repeat(3,1fr);gap:30px}
 .gds li{padding:0;text-align:center}
 .gds li::before{left:calc(50% + 34px);right:calc(-50% + 4px);top:22px;bottom:auto;width:auto;height:1px}
 .gds-n{position:relative;margin:0 auto 14px;width:46px;height:46px}
 .gds h4{margin-top:0}
}
/* footer + scroll-to-top in the wine of the hero (light wine for thin text on the dark footer) */
#gd-ftr .k i{background:#9c2b3b!important}
#gd-ftr .act .l,#gd-ftr .days li.td span::after{color:#9c2b3b!important}
#gd-ftr .act:nth-child(1){background:radial-gradient(90% 140% at 100% 0%,#9c2b3b 0%,#9c2b3b 60%)!important}
#gd-ftr .act:nth-child(1) .l{color:rgba(255,255,255,.75)!important}
#gd-ftr .cbtn{background:#9c2b3b!important}
#gd-ftr .cbtn:hover{background:#9c2b3b!important}
#gd-ftr .col a{background-image:linear-gradient(#9c2b3b,#9c2b3b)!important}
#gd-ftr a:focus-visible,#gd-ftr button:focus-visible{outline-color:#9c2b3b!important}
html body #ast-scroll-top,html body #ast-scroll-top:hover{background-color:#9c2b3b!important;border-color:#9c2b3b!important;color:#fff!important}
html body #ast-scroll-top:hover{background-color:#9c2b3b!important}
/* car logo (header + footer): light wine so it reads on the dark navy */
#gd-hdr svg [fill="#b84d5c"],#gd-ftr svg [fill="#b84d5c"]{fill:#9c2b3b!important}
#gd-hdr svg [stroke="#b84d5c"],#gd-ftr svg [stroke="#b84d5c"]{stroke:#9c2b3b!important}
/* one wine everywhere (the hero keeps its deep wine) */
.gdp-btn.a:hover,#gd-ftr .cbtn:hover,html body #ast-scroll-top:hover{filter:brightness(1.08)}
/* header + mobile menu: same wine */
#gd-hdr .nav>ul>li.on>a::after,#gd-hdr .nav>ul>li.on>button::after,#gd-hdr .cta::after{background:#9c2b3b!important}
#gd-hdr .menu a.cur{color:#9c2b3b!important}
#gd-hdr .cta,#gd-hdr .cta:hover{background:#9c2b3b!important}
#gd-hdr .cta:hover{filter:brightness(1.08)}
#gd-drw .n{color:#9c2b3b!important}
#gd-drw .sub a.cur::before{background:#9c2b3b!important}
#gd-drw .tels a:first-child{background:#9c2b3b!important;border-color:#9c2b3b!important}
#gd-hdr button:focus-visible,#gd-hdr a:focus-visible{outline-color:#9c2b3b!important}

GDMECPV_CSS_END;
const GDMECPV_JS = <<<'GDMECPV_JS_END'
() => {
  const l = document.createElement('link'); l.rel = 'stylesheet';
  l.href = 'https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&family=Playfair+Display:wght@400&display=swap';
  document.head.appendChild(l);
  const S = p => `<svg viewBox="0 0 24 24" aria-hidden="true">${p}</svg>`;
  const I = {
    tire: S('<circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="4"/><path d="M12 3v2M12 19v2M3 12h2M19 12h2M5.6 5.6l1.4 1.4M17 17l1.4 1.4M5.6 18.4L7 17M17 7l1.4-1.4"/>'),
    geo: S('<path d="M4 20V4l16 16z"/><path d="M8 20v-2M12 20v-2M16 20v-2M4 8h2M4 12h2M4 16h2"/>'),
    diag: S('<path d="M3.5 16a8.5 8.5 0 1117 0"/><path d="M12 16l4.5-5"/><circle cx="12" cy="16" r="1.3"/><path d="M6.5 11.5l1 .8M12 7.5v1.3M17.5 11.5l-1 .8"/>'),
    hour: S('<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/>'),
    wheel: S('<circle cx="12" cy="12" r="8.5"/><circle cx="12" cy="12" r="2.5"/><path d="M12 3.5v6M12 14.5v6M4.6 9.2l5 1.6M14.4 13.2l5 1.6M4.6 14.8l5-1.6M14.4 10.8l5-1.6"/>'),
    drop: S('<path d="M12 3c3.6 4.3 6 7.6 6 10.7a6 6 0 01-12 0C6 10.6 8.4 7.3 12 3z"/><path d="M9 14.5a3 3 0 003 3"/>'),
    garage: S('<path d="M3 10l9-6 9 6v10H3z"/><path d="M7 20v-7h10v7M7 16h10"/>'),
    balance: S('<path d="M12 4v16M7 20h10M5 7h14"/><path d="M5 7l-3 6a3 3 0 006 0zM19 7l-3 6a3 3 0 006 0z"/>'),
    clean: S('<path d="M11 3l1.9 4.8L17.5 9.5l-4.6 1.7L11 16l-1.9-4.8L4.5 9.5l4.6-1.7z"/><path d="M18 14l.8 2 2 .8-2 .8-.8 2-.8-2-2-.8 2-.8z"/>'),
    battery: S('<rect x="3" y="7" width="18" height="13" rx="2"/><path d="M7 7V5h3v2M14 7V5h3v2M7.5 13.5h3M9 12v3M14 13.5h3"/>'),
    truck: S('<path d="M2 16V7h11v9M13 10h4l3.5 3.5V16H13"/><circle cx="6" cy="17" r="2"/><circle cx="17" cy="17" r="2"/><path d="M8 16h7"/>'),
    lug: S('<circle cx="12" cy="12" r="8.5"/><circle cx="12" cy="12" r="2"/><circle cx="12" cy="7.5" r="1"/><circle cx="16.3" cy="10.6" r="1"/><circle cx="14.6" cy="15.6" r="1"/><circle cx="9.4" cy="15.6" r="1"/><circle cx="7.7" cy="10.6" r="1"/>'),
    wash: S('<path d="M3 9.5c6-4.5 12-4.5 18 0l-2.2 9H5.2z"/><path d="M12 18.5l4.5-8"/>'),
    oil: S('<path d="M3 11h9l3 3 5-3v2l-5 5H6a3 3 0 01-3-3z"/><path d="M7 11V8h3M20 16.5c.7.9 1 1.5 1 2a1 1 0 01-2 0c0-.5.3-1.1 1-2z"/>'),
    bulb: S('<path d="M9 18h6M10 21h4M12 3a6 6 0 00-3.6 10.8c.7.5 1.1 1.3 1.1 2.1V16h5v-.1c0-.8.4-1.6 1.1-2.1A6 6 0 0012 3z"/>'),
    check: S('<circle cx="12" cy="12" r="9"/><path d="M8 12.5l2.7 2.7L16 9.5"/>'),
    box: S('<path d="M3.5 7.5L12 3l8.5 4.5v9L12 21l-8.5-4.5z"/><path d="M3.5 7.5L12 12l8.5-4.5M12 12v9"/>'),
    phone: S('<path d="M5 4h3l1.5 4-2 1.3a11 11 0 006.2 6.2l1.3-2L19 15v3a2 2 0 01-2 2A14 14 0 013 6a2 2 0 012-2z"/>'),
    wa: S('<path d="M4 20l1.2-4A8 8 0 1112 20a8 8 0 01-4-1.1z"/><path d="M9 8.5c0 3.3 2.7 6.5 6.5 6.5l1-1.6-2-1-1 .9a5 5 0 01-2.8-2.8l.9-1-1-2z"/>')
  };
  const icon = n => [[/pneu.*montage|montage.*pneu|équilibr/i,'balance'],[/pneu/i,'tire'],[/géom/i,'geo'],[/diag/i,'diag'],[/œuvre/i,'hour'],[/montage de roue/i,'lug'],[/roue/i,'wheel'],[/niveau/i,'drop'],[/garde|gardien/i,'garage'],[/nettoy|lavage/i,'clean'],[/batter/i,'battery'],[/dépann|déplac/i,'truck'],[/lave-glace/i,'wash'],[/huile/i,'oil'],[/ampoule/i,'bulb']].find(([r]) => r.test(n))?.[1] || 'check';
  const group = n => /pneu|géom|roue/i.test(n) ? 0 : /diag|œuvre|niveau|batter/i.test(n) ? 1 : 2;
  const read = box => {
    let name = ((box.querySelector('.elementor-image-box-title') || {}).textContent || '').trim().replace(/œuvrehr$/, 'œuvre'), sub = '';
    const raw = ((box.querySelector('.elementor-image-box-description') || {}).textContent || '').replace(/\s+/g, ' ').trim();
    const m = raw.match(/^(à partir de|dès)?\s*([\d'.,]+)\s*CHF\s*(.*)$/i);
    let pre = '', price = raw, suf = '';
    if (m) { pre = m[1] ? 'dès' : ''; price = m[2] + ' CHF'; const rest = m[3].trim();
      if (/^\(/.test(rest)) sub = rest.replace(/^\(|\)$/g, ''); else if (rest) suf = 'par ' + rest.replace(/^\//, '').toLowerCase(); }
    if (/œuvre$/.test(name)) suf = 'par heure';
    return {name, sub, pre, price, suf};
  };
  const li = (d, k) => `<li class="gdp-it gd-rv" style="transition-delay:${(k % 6) * 60}ms"><div class="gdp-ic">${I[icon(d.name)]}</div><div class="gdp-nm">${d.name}${d.sub ? `<small>${d.sub}</small>` : ''}</div><div class="gdp-pr">${d.pre ? `<b>${d.pre}</b>` : ''}${d.price}${d.suf ? `<em>${d.suf}</em>` : ''}</div></li>`;
  const boxes = ids => ids.flatMap(id => [...document.querySelectorAll(`.elementor-element-${id} .elementor-widget-image-box`)]).map(read);
  const put = (html, before, after) => { const t = document.createElement('div'); t.innerHTML = html; const el = t.firstElementChild;
    const ref = document.querySelector(`.elementor-element-${before || after}`); before ? ref.parentNode.insertBefore(el, ref) : ref.after(el); };

  // trust points
  put(`<div class="gdt gd-rv"><span>${I.check}Devis avant travaux</span><span>${I.box}Pièces sur demande</span><span>${I.clean}Nettoyage offert</span></div>`, null, 'd0d3f10');

  // services, grouped
  // prices from the control panel (/gestion/) when saved there, otherwise from the page's own boxes
  const GPX = (window.GD_PRICES && window.GD_PRICES.items) || null, gpFmt = p => String(p).replace('.', ','), gpGet = id => GPX && GPX.find(x => x.id === id);
  const G = [[], [], []];
  if (GPX) GPX.forEach(x => { const gi = ['mp', 'me', 'ms'].indexOf(x.g); if (gi > -1) G[gi].push({name: x.n, sub: '', pre: x.d ? 'dès' : '', price: gpFmt(x.p) + ' CHF', suf: x.u || ''}); });
  else boxes(['51bfb7b1', '1766f2e4', '2f3e9f98']).forEach(d => G[group(d.name)].push(d));
  const GN = ['Pneus et roues', 'Entretien et diagnostic', 'Services complémentaires'];
  put(`<section class="gdp gdp-svc"><div class="gdp-in"><span class="gdp-eye gd-rv">Tarifs</span><h2 class="gdp-h gd-rv">Nos services et leurs prix</h2><div class="gdp-groups">${G.map((g, i) => g.length ? `<div class="gdp-grp"><div class="gdp-gt gd-rv"><i>0${i + 1}</i>${GN[i]}</div><ul class="gdp-list">${g.map(li).join('')}</ul></div>` : '').join('')}</div><p class="gdp-note gd-rv">Le nettoyage est offert avec tout service réalisé.</p>
  <div class="gdp-cta gd-rv"><div><h3>Prendre rendez-vous</h3><p>Appelez-nous ou écrivez-nous sur WhatsApp pour fixer un rendez-vous ou demander un devis.</p></div><div class="gdp-btns"><a class="gdp-btn a" href="tel:+41227329837">${I.phone}Appeler</a><a class="gdp-btn b" href="https://wa.me/41799198647" target="_blank" rel="noopener">${I.wa}WhatsApp</a></div></div></div></section>`, '51bfb7b1');

  // three steps (from their own paragraph)
  put(`<section class="gds"><div class="gds-in"><span class="gdp-eye gd-rv">Notre méthode</span><h2 class="gdp-h gd-rv">Comment ça se passe</h2><div class="gds-lead gd-rv">Nous proposons tous les services mécaniques possibles, en trois étapes simples.</div><ol>
   <li class="gd-rv"><span class="gds-n">1</span><h4>Inspection</h4><p>Nous inspectons votre véhicule et déterminons les travaux nécessaires.</p></li>
   <li class="gd-rv" style="transition-delay:120ms"><span class="gds-n">2</span><h4>Devis</h4><p>Nous vous communiquons un prix adapté à votre voiture.</p></li>
   <li class="gd-rv" style="transition-delay:240ms"><span class="gds-n">3</span><h4>Réalisation</h4><p>Une fois le devis accepté, nous commandons les pièces et réalisons les travaux.</p></li></ol></div></section>`, 'a7a3ae3');

  // parts
  put(`<section class="gdp gdp-parts"><div class="gdp-in"><span class="gdp-eye gd-rv">Pièces</span><h2 class="gdp-h gd-rv">Pièces et fournitures</h2><ul class="gdp-list">${boxes(['95395c9']).map(li).join('')}</ul><p class="gdp-note gd-rv">Tout type de pièce peut être fourni sur demande.</p></div></section>`, '95395c9');

  // gentle reveal while scrolling
  const io = new IntersectionObserver(es => es.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } }), {rootMargin: '0px 0px -8% 0px'});
  document.querySelectorAll('.gd-rv').forEach(el => io.observe(el));
}
GDMECPV_JS_END;
