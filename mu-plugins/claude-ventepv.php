<?php
/* Garage Daytona — new Vente de voitures design. LIVE on /vente-de-voitures/ (?apercu=1 = uncached noindex check). Built by preview/vente/build_plugin.py */
if (!defined('ABSPATH')) exit;
function gdvente_on() { return function_exists('is_page') && is_page('vente-de-voitures'); }
function gdvente_pv() { return isset($_GET['apercu']); }
add_action('wp', function () {
  if (!gdvente_on()) return;
  if (!gdvente_pv()) return;
  if (!defined('DONOTCACHEPAGE')) define('DONOTCACHEPAGE', true);
  if (!headers_sent()) { nocache_headers(); header('X-Robots-Tag: noindex, nofollow'); }
});
add_action('wp_head', function () {
  if (!gdvente_on()) return;
  echo (gdvente_pv() ? "<meta name=\"robots\" content=\"noindex,nofollow\">\n" : "") . "<script>window.GD_CARS=" . wp_json_encode(function_exists('gdg_public_cars') ? gdg_public_cars() : array()) . ";</script>\n<script>(function(){var d=document.documentElement;d.classList.add('gdv-js');var s=document.createElement('style');s.id='gdv-head';s.textContent=" . json_encode(GDVENTE_HEAD) . ";document.head.appendChild(s);})();</script>\n";
}, 99);
add_action('wp_footer', function () {
  if (!gdvente_on()) return;
  echo "<script id=\"gdvente-js\">try{(" . GDVENTE_JS . ")();}catch(e){document.documentElement.classList.remove('gdv-js');console.error(e);}</script>\n";
}, 99);
const GDVENTE_HEAD = <<<'GDVENTE_HEAD_END'
.gdv-js .elementor-element-f89750b,.gdv-js .elementor-element-2ab72ec2,.gdv-js .elementor-element-1862b0f,.gdv-js .elementor-element-d6e753a,.gdv-js .elementor-element-13cd2fb3{display:none!important}
#gd-hero h1{font-size:clamp(23px,6.2vw,29px)!important;max-width:16ch!important;margin-left:auto!important;margin-right:auto!important}
#gd-hero .gdx-in{padding-top:30px!important;padding-bottom:32px!important}
#gd-hero .gdx-car{max-width:230px!important;margin-bottom:16px!important}
@media (min-width:981px){#gd-hero h1{font-size:clamp(34px,2.9vw,44px)!important;max-width:20ch!important}#gd-hero .gdx-in{min-height:340px!important;padding-top:56px!important;padding-bottom:56px!important}#gd-hero .gdx-car{max-width:none!important}}
#gd-hero .gdx-sub{display:none!important}
#gd-hero h1{font-size:clamp(19px,5.3vw,23px)!important;line-height:1.3!important;max-width:none!important;letter-spacing:.01em!important;white-space:nowrap}
#gd-hero .gdx-rule{margin-top:18px!important;margin-bottom:0!important}
@media (min-width:981px){#gd-hero h1{font-size:clamp(34px,2.8vw,44px)!important;max-width:none!important}}

html{}
/* ---------- Garage Daytona · Vente de voitures — showroom design ---------- */
/* smaller hero title on this page */

.gv{--w:#9c2b3b;--nv:#0f172a;--ink:#0f172a;--mut:#64748b;--line:#e6e9ef;font-family:'Hanken Grotesk',system-ui,sans-serif;font-variant-numeric:lining-nums}
.gv svg{fill:none;stroke:currentColor;stroke-width:1.6;stroke-linecap:round;stroke-linejoin:round}
.gv-in{max-width:1220px;margin:0 auto}
.gv-eye{display:block;font-size:11px;font-weight:600;letter-spacing:.22em;text-transform:uppercase;color:var(--w);margin:0 0 8px}
.gv-h{font-family:'Playfair Display',Georgia,serif;font-weight:400;color:var(--ink);font-size:clamp(26px,6.6vw,40px);line-height:1.15;margin:0 0 8px}
.gv-lead{color:var(--mut);font-size:14.5px;line-height:1.6;margin:0}

/* showroom */
.gv-show{background:#f4f6f9;padding:30px 16px 54px}
.gv-top{margin-bottom:18px}
.gv-bar{display:flex;align-items:center;justify-content:space-between;gap:10px;margin:18px 0 16px}
.gv-count{font-size:13px;color:var(--mut);white-space:nowrap}
.gv-count b{color:var(--ink)}
.gv-sort{appearance:none;-webkit-appearance:none;border:1px solid var(--line);background:#fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath d='M7 10l5 5 5-5' fill='none' stroke='%230f172a' stroke-width='2' stroke-linecap='round'/%3E%3C/svg%3E") right 10px center/16px no-repeat;border-radius:10px;height:38px;padding:0 34px 0 12px;font:500 13px 'Hanken Grotesk',sans-serif;color:var(--ink);cursor:pointer}
.gv-chips{display:flex;gap:8px;overflow-x:auto;scrollbar-width:none;margin:0 -16px;padding:0 16px 2px}
.gv-chips::-webkit-scrollbar{display:none}
.gv-chip{flex:0 0 auto;height:36px;padding:0 15px;border-radius:999px;border:1px solid var(--line);background:#fff;font:600 13px 'Hanken Grotesk',sans-serif;color:var(--ink);cursor:pointer;transition:background .2s,color .2s,border-color .2s}
.gv-chip.on{background:var(--nv);border-color:var(--nv);color:#fff}
.gv-grid{display:grid;gap:16px}
.gv-car{background:#fff;border-radius:18px;overflow:hidden;box-shadow:0 1px 2px rgba(15,23,42,.05),0 10px 30px rgba(15,23,42,.07);display:flex;flex-direction:column;text-decoration:none!important;color:inherit;transition:transform .25s,box-shadow .25s}
.gv-ph{position:relative;aspect-ratio:4/3;background:radial-gradient(90% 80% at 50% 100%,#dfe4ec 0%,#c9d0db 60%,#b9c1ce 100%);display:grid;place-items:center;overflow:hidden}
.gv-ph svg.car{width:74%;opacity:.55;fill:#fff;stroke:none}
.gv-ph img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover}
.gv-tag{position:absolute;top:12px;left:12px;height:26px;padding:0 10px;border-radius:999px;font:600 11px/26px 'Hanken Grotesk',sans-serif;letter-spacing:.06em;text-transform:uppercase;background:#fff;color:var(--ink)}
.gv-tag.new{background:var(--w);color:#fff}
.gv-tag.res{background:var(--nv);color:#fff}
.gv-ex{position:absolute;top:12px;right:12px;height:22px;padding:0 8px;border-radius:6px;font:600 10px/22px 'Hanken Grotesk',sans-serif;letter-spacing:.08em;text-transform:uppercase;background:rgba(15,23,42,.55);color:#fff}
.gv-cnt{position:absolute;bottom:10px;right:10px;display:flex;align-items:center;gap:5px;height:24px;padding:0 8px;border-radius:6px;background:rgba(15,23,42,.6);color:#fff;font:600 11px/24px 'Hanken Grotesk',sans-serif}
.gv-cnt svg{width:13px;height:13px}
.gv-body{padding:16px 18px 18px;display:flex;flex-direction:column;flex:1}
.gv-name{font-size:17px;font-weight:600;color:var(--ink);line-height:1.25;margin:0}
.gv-ver{font-size:13px;color:var(--mut);margin:3px 0 14px}
.gv-specs{display:grid;grid-template-columns:1fr 1fr;gap:8px 12px;margin:0 0 16px;padding:14px 0 0;border-top:1px solid var(--line)}
.gv-specs span{display:flex;align-items:center;gap:7px;font-size:13px;color:#334155}
.gv-specs svg{width:16px;height:16px;color:var(--mut);flex:0 0 16px}
.gv-foot{display:flex;align-items:flex-end;justify-content:space-between;margin-top:auto}
.gv-price{font-family:'Playfair Display',Georgia,serif;font-size:24px;color:var(--w);line-height:1;font-feature-settings:"lnum" 1}
.gv-price small{display:block;font:500 10.5px 'Hanken Grotesk',sans-serif;letter-spacing:.08em;text-transform:uppercase;color:var(--mut);margin-bottom:5px}
.gv-go{display:inline-flex;align-items:center;gap:6px;font-size:13.5px;font-weight:600;color:var(--nv)}
.gv-go svg{width:16px;height:16px;transition:transform .2s}
.gv-more{display:flex;justify-content:center;margin-top:26px}
.gv-btn{display:inline-flex;align-items:center;justify-content:center;gap:9px;height:48px;padding:0 22px;border-radius:12px;font-size:14.5px;font-weight:600;text-decoration:none!important;transition:filter .2s,background .2s}
.gv-btn svg{width:18px;height:18px}
.gv-btn.a{background:var(--w);color:#fff!important}
.gv-btn.a:hover{filter:brightness(1.08)}
.gv-btn.b{border:1px solid var(--line);color:var(--ink)!important;background:#fff}
.gv-btn.c{border:1px solid rgba(255,255,255,.4);color:#fff!important}

/* compact services strip */
.gv-strip{background:#fff;padding:34px 16px}
.gv-items{display:grid;gap:18px}
.gv-item{display:flex;gap:14px;align-items:flex-start}
.gv-ic{flex:0 0 42px;width:42px;height:42px;border-radius:11px;background:#1e2a47;color:#fff;display:grid;place-items:center}
.gv-ic svg{width:21px;height:21px}
.gv-item h3{margin:1px 0 3px;font-size:15.5px;font-weight:600;color:var(--ink);font-family:'Hanken Grotesk',sans-serif}
.gv-item p{margin:0;font-size:13.5px;line-height:1.55;color:#475569}

/* sell / trade-in band on the garage photo */
.gv-sell{padding:0 16px 56px;background:#fff}
.gv-band{position:relative;overflow:hidden;border-radius:20px;color:#fff;padding:34px 22px;background:#0f172a}
.gv-band::before{content:"";position:absolute;inset:0;background:var(--img) center/cover no-repeat;opacity:.45}
.gv-band::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(15,23,42,.45),rgba(15,23,42,.94))}
.gv-band>*{position:relative;z-index:1}
.gv-band .gv-eye{color:#e3aab3}
.gv-band h2{font-family:'Playfair Display',Georgia,serif;font-weight:400;font-size:clamp(26px,6.6vw,40px);line-height:1.15;margin:0 0 10px;color:#fff}
.gv-band p{margin:0 0 20px;max-width:560px;font-size:14.5px;line-height:1.6;color:rgba(255,255,255,.82)}
.gv-btns{display:flex;flex-direction:column;gap:10px}

.gd-rv{opacity:0;transform:translateY(14px);transition:opacity .6s ease,transform .6s ease}
.gd-rv.in{opacity:1;transform:none}
@media (prefers-reduced-motion:reduce){.gd-rv{opacity:1;transform:none;transition:none}}

@media (min-width:640px){.gv-grid{grid-template-columns:repeat(2,1fr)}}
@media (min-width:980px){
 .gv-show{padding:56px 24px 80px}
 .gv-top{display:flex;align-items:flex-end;justify-content:space-between;gap:30px}
 .gv-bar{margin:26px 0 22px}
 .gv-chips{margin:0;padding:0}
 .gv-grid{grid-template-columns:repeat(3,1fr);gap:22px}
 .gv-car:hover{transform:translateY(-4px);box-shadow:0 18px 40px rgba(15,23,42,.13)}
 .gv-car:hover .gv-go svg{transform:translateX(3px)}
 .gv-strip{padding:56px 24px}
 .gv-items{grid-template-columns:repeat(3,1fr);gap:34px}
 .gv-sell{padding:0 24px 90px}
 .gv-band{padding:64px 56px;display:flex;align-items:center;justify-content:space-between;gap:40px}
 .gv-band p{margin-bottom:0}
 .gv-btns{flex-direction:row;flex:0 0 auto}
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
.gv .gv-sort{width:auto!important;min-width:150px;max-width:200px;margin:0!important}
@media (min-width:980px){.gv-tools{display:flex;align-items:center;justify-content:space-between;gap:20px;margin:26px 0 22px}.gv-tools .gv-bar{margin:0;order:2;gap:16px}.gv-tools .gv-chips{order:1}}
/* services strip now sits first, right under the hero */
.gv-strip{padding:30px 16px 26px;border-bottom:1px solid #eef1f5}
.gv-show{padding-top:34px}
@media (min-width:980px){.gv-strip{padding:46px 24px 40px}.gv-show{padding-top:56px}}
/* services strip: three equal tiles in one row */
.gv-strip{padding:22px 12px!important;border-bottom:1px solid #eef1f5}
.gv-strip .gv-items{display:grid!important;grid-template-columns:repeat(3,1fr)!important;gap:8px!important}
.gv-strip .gv-item{display:flex;flex-direction:column;align-items:center;text-align:center;gap:0;padding:4px 2px}
.gv-strip .gv-item+.gv-item{border-left:1px solid #eef1f5}
.gv-strip .gv-ic{width:40px;height:40px;flex:0 0 auto;border-radius:11px;margin:0 0 10px}
.gv-strip .gv-ic svg{width:20px;height:20px}
.gv-strip h3{margin:0 0 3px!important;font-size:13px!important;line-height:1.25!important;font-weight:600;color:#0f172a}
.gv-strip p{margin:0!important;font-size:11.5px!important;line-height:1.35!important;color:#64748b!important}
@media (min-width:980px){.gv-strip{padding:40px 24px!important}.gv-strip .gv-items{gap:20px!important;max-width:900px;margin:0 auto}.gv-strip .gv-ic{width:46px;height:46px}.gv-strip h3{font-size:15.5px!important}.gv-strip p{font-size:13px!important}}
/* hero on this page: no small line under the title, calmer title */
/* card actions */
.gv-acts{display:flex;align-items:center;gap:10px}
.gv-wa{width:38px;height:38px;border-radius:10px;border:1px solid var(--line);display:grid;place-items:center;color:var(--w);cursor:pointer;transition:background .2s}
.gv-wa svg{width:19px;height:19px}
.gv-wa:hover{background:#f9eef2}

/* visit section */
.gv-visit{background:#f4f6f9;padding:0 16px 40px}
.gv-vcard{background:#fff;border-radius:20px;padding:28px 22px;box-shadow:0 1px 2px rgba(15,23,42,.05),0 10px 30px rgba(15,23,42,.06)}
.gv-vinfo{list-style:none;margin:20px 0 22px;padding:0;display:grid;gap:14px}
.gv-vinfo li{display:flex;gap:12px;align-items:flex-start;font-size:14px;color:#475569;line-height:1.45}
.gv-vinfo li svg{width:20px;height:20px;color:var(--nv);flex:0 0 20px;margin-top:1px}
.gv-vinfo b{display:block;color:var(--ink);font-weight:600}
.gv-visit .gv-btns{display:flex;flex-direction:column;gap:10px}
.gv-sell{background:#f4f6f9!important}

/* car page */
html.gv-lock,html.gv-lock body{overflow:hidden!important}
.gv-detail{position:fixed;inset:0;z-index:99999;background:#fff;overflow-y:auto;-webkit-overflow-scrolling:touch;opacity:0;visibility:hidden;transform:translateY(16px);transition:opacity .3s,transform .3s,visibility 0s .3s}
.gv-detail.on{opacity:1;visibility:visible;transform:none;transition:opacity .3s,transform .3s}
.gv-dtop{position:sticky;top:0;z-index:3;display:flex;align-items:center;justify-content:space-between;height:58px;padding:0 16px;background:rgba(255,255,255,.94);backdrop-filter:blur(8px);border-bottom:1px solid var(--line)}
.gv-back{display:inline-flex;align-items:center;gap:8px;font-size:14.5px;font-weight:600;color:var(--ink)!important;text-decoration:none!important}
.gv-back svg{width:19px;height:19px}
.gv-dtop .gv-ex{position:static;background:var(--nv)}
.gv-din{max-width:1220px;margin:0 auto}
.gv-gal{position:relative}
.gv-track{display:flex;overflow-x:auto;scroll-snap-type:x mandatory;scrollbar-width:none}
.gv-track::-webkit-scrollbar{display:none}
.gv-slide{flex:0 0 100%;scroll-snap-align:center;aspect-ratio:4/3;position:relative;display:grid;place-items:center;background:radial-gradient(90% 80% at 50% 100%,#dfe4ec 0%,#c9d0db 60%,#b9c1ce 100%)}
.gv-slide svg.car{width:70%;opacity:.55;fill:#fff;stroke:none}
.gv-sn{position:absolute;bottom:12px;right:12px;height:24px;padding:0 9px;border-radius:6px;background:rgba(15,23,42,.6);color:#fff;font:600 11.5px/24px 'Hanken Grotesk',sans-serif}
.gv-nav{position:absolute;top:50%;transform:translateY(-50%);width:40px;height:40px;border-radius:50%;border:0;background:rgba(255,255,255,.92);color:var(--ink);display:none;place-items:center;cursor:pointer;box-shadow:0 4px 14px rgba(15,23,42,.15)}
.gv-nav svg{width:20px;height:20px}
.gv-nav.l{left:14px}.gv-nav.r{right:14px}
.gv-dinfo{padding:22px 16px 48px}
.gv-dname{font-family:'Playfair Display',Georgia,serif;font-weight:400;font-size:clamp(28px,7vw,40px);line-height:1.12;color:var(--ink);margin:0}
.gv-dinfo .gv-ver{font-size:14.5px;margin:4px 0 18px}
.gv-dprice{font-family:'Playfair Display',Georgia,serif;font-size:32px;color:var(--w);margin:0 0 20px;font-feature-settings:"lnum" 1}
.gv-dprice small{display:block;font:500 11px 'Hanken Grotesk',sans-serif;letter-spacing:.1em;text-transform:uppercase;color:var(--mut);margin-bottom:6px}
.gv-dinfo .gv-btns{display:flex;flex-direction:column;gap:10px}
.gv-st{font-family:'Hanken Grotesk',sans-serif;font-size:13px;font-weight:600;letter-spacing:.16em;text-transform:uppercase;color:var(--mut);margin:30px 0 12px}
.gv-tab{margin:0;border:1px solid var(--line);border-radius:14px;overflow:hidden}
.gv-tab div{display:flex;justify-content:space-between;gap:16px;padding:13px 16px;border-top:1px solid var(--line);font-size:14.5px}
.gv-tab div:first-child{border-top:0}
.gv-tab div:nth-child(even){background:#f8fafc}
.gv-tab dt{color:var(--mut);margin:0}
.gv-tab dd{color:var(--ink);font-weight:600;margin:0;text-align:right}
.gv-dnote{margin:18px 0 0;font-size:13.5px;line-height:1.6;color:var(--mut)}

@media (min-width:980px){
 .gv-visit{padding:0 24px 56px}
 .gv-vcard{display:grid;grid-template-columns:1.1fr 1fr auto;align-items:center;gap:40px;padding:40px 44px}
 .gv-vinfo{margin:0}
 .gv-visit .gv-btns{flex-direction:column}
 .gv-din{display:grid;grid-template-columns:1.35fr 1fr;gap:44px;padding:30px 24px 70px;align-items:start}
 .gv-gal{position:sticky;top:88px;border-radius:18px;overflow:hidden}
 .gv-nav{display:grid}
 .gv-dinfo{padding:6px 0 0}
 .gv-dinfo .gv-btns{flex-direction:row}
 .gv-dtop{padding:0 max(24px,calc((100vw - 1220px)/2 + 24px))}
}
.gv-nav{padding:0!important;min-width:0!important;min-height:0!important;line-height:1!important}

.gv-slide img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover}
.gv-slide .gv-sn{z-index:1}
.gv-desc{margin:0 0 18px;color:#475467;font-size:15px;line-height:1.6}

.gv-empty{grid-column:1/-1;background:#fff;border:1px solid #e3e7ee;border-radius:18px;padding:40px 22px;text-align:center}
.gv-empty svg{width:44px;height:44px;stroke:#9c2b3b;fill:none;stroke-width:1.6;margin:0 auto 12px;display:block}
.gv-empty h3{margin:0 0 8px;font:400 24px/1.2 'Playfair Display',serif;color:#0f172a}
.gv-empty p{margin:0 auto 18px;max-width:460px;color:#475467;font-size:15px;line-height:1.6}
.gv-empty .gv-btns{justify-content:center}

GDVENTE_HEAD_END;
const GDVENTE_JS = <<<'GDVENTE_JS_END'
() => {
  const l = document.createElement('link'); l.rel = 'stylesheet';
  l.href = 'https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&family=Playfair+Display:wght@400&display=swap';
  document.head.appendChild(l);
  const S = p => `<svg viewBox="0 0 24 24" aria-hidden="true">${p}</svg>`;
  const I = {
    cal: S('<rect x="3.5" y="5" width="17" height="15" rx="2"/><path d="M3.5 9.5h17M8 3v4M16 3v4"/>'),
    road: S('<path d="M7 21L10 3M17 21L14 3M12 5v2M12 11v2M12 17v2"/>'),
    fuel: S('<path d="M4 20V5a2 2 0 012-2h6a2 2 0 012 2v15M3 20h12M6.5 8h5"/><path d="M14 9h2a2 2 0 012 2v5a1.5 1.5 0 003 0V8l-3-3"/>'),
    gear: S('<circle cx="6" cy="6" r="2"/><circle cx="12" cy="6" r="2"/><circle cx="18" cy="6" r="2"/><circle cx="6" cy="18" r="2"/><circle cx="12" cy="18" r="2"/><path d="M6 8v8M12 8v8M18 8v4H6"/>'),
    arrow: S('<path d="M5 12h14M13 6l6 6-6 6"/>'),
    cam: S('<path d="M4 8h3l2-2.5h6L17 8h3v11H4z"/><circle cx="12" cy="13" r="3.2"/>'),
    lease: S('<rect x="3" y="5.5" width="18" height="13" rx="2"/><path d="M3 9.5h18M7 14.5h4"/>'),
    key: S('<circle cx="8" cy="15" r="4.5"/><path d="M11.2 11.8L20 3M16.5 6.5l2.5 2.5M14 9l2 2"/>'),
    shield: S('<path d="M12 3l7 3v5c0 4.5-3 8.3-7 10-4-1.7-7-5.5-7-10V6z"/><path d="M9 12l2.2 2.2L15.5 10"/>'),
    ext: S('<path d="M14 4h6v6M20 4l-9 9M18 14v5a1 1 0 01-1 1H5a1 1 0 01-1-1V7a1 1 0 011-1h5"/>'),
    phone: S('<path d="M5 4h3l1.5 4-2 1.3a11 11 0 006.2 6.2l1.3-2L19 15v3a2 2 0 01-2 2A14 14 0 013 6a2 2 0 012-2z"/>'),
    pin: S('<path d="M12 21s-6.5-5.6-6.5-11a6.5 6.5 0 0113 0c0 5.4-6.5 11-6.5 11z"/><circle cx="12" cy="10" r="2.4"/>'),
    clock: S('<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/>'),
    close: S('<path d="M6 6l12 12M18 6L6 18"/>'),
    back: S('<path d="M19 12H5M11 6l-6 6 6 6"/>'),
    left: S('<path d="M15 5l-7 7 7 7"/>'),
    right: S('<path d="M9 5l7 7-7 7"/>'),
    wa: S('<path d="M4 20l1.2-4A8 8 0 1112 20a8 8 0 01-4-1.1z"/><path d="M9 8.5c0 3.3 2.7 6.5 6.5 6.5l1-1.6-2-1-1 .9a5 5 0 01-2.8-2.8l.9-1-1-2z"/>')
  };
  const $ = s => document.querySelector(s), el = id => $(`.elementor-element-${id}`);
  { const h = $('#gd-hero h1'); if (h && /vous attend/.test(h.textContent)) h.innerHTML = 'Votre nouvelle voiture<br>vous attend chez Garage Daytona.'; }
  const nf = n => n.toLocaleString('fr-CH').replace(/[  ,]/g, '’');

  // PREVIEW ONLY: sample cars to judge the layout — replaced by the garage's real cars (then by the control panel)
  const SAMPLE = [
    {mk: 'Volkswagen', md: 'Golf', v: '1.5 TSI Life', y: 2020, km: 48500, f: 'Essence', g: 'Manuelle', p: 18900, tag: 'new', ph: 14, hp: 150, col: 'Gris', dr: 5},
    {mk: 'Audi', md: 'A3 Sportback', v: '35 TFSI S tronic', y: 2019, km: 62000, f: 'Essence', g: 'Automatique', p: 22500, ph: 18, hp: 150, col: 'Noir', dr: 5},
    {mk: 'Mercedes-Benz', md: 'Classe A', v: 'A 180 Progressive', y: 2018, km: 84000, f: 'Essence', g: 'Automatique', p: 18400, tag: 'res', ph: 16, hp: 136, col: 'Blanc', dr: 5},
    {mk: 'Toyota', md: 'Yaris', v: '1.5 Hybrid Trend', y: 2021, km: 39000, f: 'Hybride', g: 'Automatique', p: 17900, ph: 11, hp: 116, col: 'Rouge', dr: 5},
    {mk: 'Škoda', md: 'Octavia Combi', v: '2.0 TDI Style', y: 2019, km: 98000, f: 'Diesel', g: 'Automatique', p: 16500, ph: 15, hp: 150, col: 'Bleu', dr: 5}
  ];
  // real cars from the control panel (/gestion/); the samples above only show while the garage has added none
  const REAL = Array.isArray(window.GD_CARS) && window.GD_CARS.length > 0;
  const CARS = REAL ? window.GD_CARS : []; // live page: only the garage's real cars, never the samples
  const esc = s => String(s == null ? '' : s).replace(/[&<>"']/g, c => ({'&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'}[c]));
  const carSvg = (() => { const s = $('#gd-hero .gdx-car svg'); return s ? s.outerHTML.replace('<svg', '<svg class="car"') : ''; })();
  const slug = c => ((c.id ? c.id + '-' : '') + c.mk + '-' + c.md + '-' + c.y).toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/[^a-z0-9]+/g, '-');
  const waCar = c => 'https://wa.me/41799198647?text=' + encodeURIComponent(`Bonjour, je suis intéressé par la ${c.mk} ${c.md}${c.v ? ' ' + c.v : ''} (${c.y}) à CHF ${nf(c.p)}.–`);
  const card = (c, i) => `<a class="gv-car gd-rv" href="#voiture-${slug(c)}" style="transition-delay:${(i % 3) * 70}ms" data-f="${esc(c.f)}">
    <div class="gv-ph">${c.photos ? `<img src="${esc(c.photos[0].t)}" alt="${esc(c.mk + ' ' + c.md)}" loading="lazy" decoding="async">` : carSvg}${c.tag ? `<span class="gv-tag ${c.tag}">${c.tag === 'new' ? 'Nouveau' : 'Réservé'}</span>` : ''}${REAL ? '' : '<span class="gv-ex">Exemple</span>'}<span class="gv-cnt">${I.cam}${c.photos ? c.photos.length : c.ph}</span></div>
    <div class="gv-body"><h3 class="gv-name">${esc(c.mk)} ${esc(c.md)}</h3><p class="gv-ver">${esc(c.v)}</p>
    <div class="gv-specs"><span>${I.cal}${c.y}</span><span>${I.road}${nf(c.km)} km</span>${c.f ? `<span>${I.fuel}${esc(c.f)}</span>` : ''}${c.g ? `<span>${I.gear}${esc(c.g)}</span>` : ''}</div>
    <div class="gv-foot"><div class="gv-price"><small>Prix</small>CHF ${nf(c.p)}.–</div><span class="gv-acts"><span class="gv-wa" role="link" tabindex="0" data-wa="${waCar(c)}" aria-label="WhatsApp">${I.wa}</span><span class="gv-go">Voir ${I.arrow}</span></span></div></div></a>`;

  const stockBox = el('13cd2fb3'); const scout = stockBox && stockBox.querySelector('a[href*="autoscout24"]');
  const scoutUrl = scout ? scout.href.split('?')[0] : 'https://www.autoscout24.ch/de/s/seller-64380';
  const flip = id => { const f = el(id); if (!f) return null; const fr = f.querySelector('.wpr-flip-box-front') || f;
    return {t: ((fr.querySelector('.wpr-flip-box-title') || {}).textContent || '').trim(), d: ((fr.querySelector('.wpr-flip-box-description') || {}).textContent || '').replace(/\s+/g, ' ').trim()}; };
  const lease = flip('70ce5201'), visit = flip('6a0edda0');
  const garage = el('a36a11c') && el('a36a11c').querySelector('img');
  const gImg = garage ? (garage.currentSrc || garage.src) : '';
  const sellTitle = ((el('72775e0') || {}).textContent || 'Vendre / Échanger mon véhicule').trim();

  const fuels = ['Tous', ...new Set(CARS.map(c => c.f).filter(Boolean))];
  const html = `
  <section class="gv gv-strip"><div class="gv-in gv-items">
    <div class="gv-item gd-rv"><div class="gv-ic">${I.shield}</div><h3>Voitures certifiées</h3><p>Occasions<br>sélectionnées</p></div>
    <div class="gv-item gd-rv" style="transition-delay:80ms"><div class="gv-ic">${I.lease}</div><h3>Leasing</h3><p>Conditions<br>flexibles</p></div>
    <div class="gv-item gd-rv" style="transition-delay:160ms"><div class="gv-ic">${I.key}</div><h3>Essai sur place</h3><p>Lun – ven<br>07:30 – 17:00</p></div>
  </div></section>
  <section class="gv gv-show"><div class="gv-in">
    <div class="gv-top"><div><span class="gv-eye">Vente de voitures</span><h2 class="gv-h">Nos voitures disponibles</h2><p class="gv-lead">Voitures d’occasion certifiées, stock régulièrement mis à jour.</p></div></div>
    <div class="gv-tools"><div class="gv-bar"><span class="gv-count"><b>${CARS.length}</b> véhicules</span><select class="gv-sort" aria-label="Trier"><option value="new">Plus récents</option><option value="pa">Prix croissant</option><option value="pd">Prix décroissant</option><option value="km">Kilométrage</option></select></div>
    <div class="gv-chips" role="group" aria-label="Carburant">${fuels.map((f, i) => `<button class="gv-chip${i ? '' : ' on'}" data-f="${f}">${f}</button>`).join('')}</div></div>
    <div class="gv-grid" style="margin-top:16px"></div>
    <div class="gv-more"><a class="gv-btn b" href="${scoutUrl}" target="_blank" rel="noopener">Tout notre stock sur Autoscout24 ${I.ext}</a></div>
  </div></section>
  <section class="gv gv-visit"><div class="gv-in"><div class="gv-vcard gd-rv">
    <div class="gv-vtxt"><span class="gv-eye">Essai</span><h2 class="gv-h">Venez essayer</h2><p class="gv-lead">Visitez notre showroom et essayez le véhicule qui vous intéresse.</p></div>
    <ul class="gv-vinfo"><li>${I.pin}<span><b>Rue de Lausanne 64-66</b>1202 Genève</span></li><li>${I.clock}<span><b>Lundi – vendredi</b>07:30 – 17:00</span></li><li>${I.cal}<span><b>Samedi – dimanche</b>Sur rendez-vous</span></li></ul>
    <div class="gv-btns"><a class="gv-btn a" href="https://wa.me/41799198647?text=${encodeURIComponent('Bonjour, je souhaite réserver un essai.')}" target="_blank" rel="noopener">${I.wa}Réserver un essai</a><a class="gv-btn b" href="https://www.google.com/maps/search/?api=1&query=Rue+de+Lausanne+64+1202+Gen%C3%A8ve" target="_blank" rel="noopener">${I.pin}Itinéraire</a></div>
  </div></div></section>
  <section class="gv gv-sell"><div class="gv-in"><div class="gv-band gd-rv" style="--img:${gImg ? `url('${gImg}')` : 'none'}"><div><span class="gv-eye">Reprise</span><h2>${sellTitle}</h2><p>Nous reprenons votre voiture selon son état, sa marque et son kilométrage, ou l’échangeons contre un véhicule de notre stock. Estimation gratuite au garage.</p></div>
    <div class="gv-btns"><a class="gv-btn a" href="https://wa.me/41799198647?text=${encodeURIComponent('Bonjour, je souhaite vendre / échanger mon véhicule.')}" target="_blank" rel="noopener">${I.wa}Proposer mon véhicule</a><a class="gv-btn c" href="tel:+41227329837">${I.phone}Appeler</a></div></div></div></section>`;
  const host = document.createElement('div'); host.innerHTML = html;
  const ref = el('f89750b'); [...host.children].forEach(n => ref.parentNode.insertBefore(n, ref));

  const grid = $('.gv-grid'), sortSel = $('.gv-sort'); let fuel = 'Tous';
  const draw = () => {
    let list = CARS.filter(c => fuel === 'Tous' || c.f === fuel);
    const s = sortSel.value; list = [...list].sort((a, b) => s === 'pa' ? a.p - b.p : s === 'pd' ? b.p - a.p : s === 'km' ? a.km - b.km : b.y - a.y);
    grid.innerHTML = list.length ? list.map(card).join('') : `<div class="gv-empty">${I.key}<h3>Demandez-nous nos voitures disponibles</h3><p>Écrivez-nous sur WhatsApp pour connaître les voitures en vente, ou consultez notre stock sur Autoscout24.</p><div class="gv-btns"><a class="gv-btn a" href="https://wa.me/41799198647?text=${encodeURIComponent('Bonjour, quelles voitures avez-vous en vente en ce moment ?')}" target="_blank" rel="noopener">${I.wa}WhatsApp</a><a class="gv-btn b" href="${scoutUrl}" target="_blank" rel="noopener">Autoscout24 ${I.ext}</a></div></div>`;
    $('.gv-count b').textContent = list.length; const tl = $('.gv-tools'); if (tl) tl.style.display = CARS.length ? '' : 'none';
    grid.querySelectorAll('.gd-rv').forEach(n => io.observe(n));
  };
  const io = new IntersectionObserver(es => es.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } }), {rootMargin: '0px 0px -6% 0px'});
  document.querySelectorAll('.gv-chip').forEach(b => b.addEventListener('click', () => { document.querySelectorAll('.gv-chip').forEach(x => x.classList.toggle('on', x === b)); fuel = b.dataset.f; draw(); }));
  sortSel.addEventListener('change', draw);
  draw();
  grid.addEventListener('click', e => { const w = e.target.closest('.gv-wa'); if (w) { e.preventDefault(); e.stopPropagation(); window.open(w.dataset.wa, '_blank', 'noopener'); } });

  // car page (preview: opens over the page, with its own #link)
  const dv = document.createElement('div'); dv.className = 'gv gv-detail'; dv.setAttribute('role', 'dialog'); dv.setAttribute('aria-modal', 'true'); document.body.appendChild(dv);
  let lastY = 0;
  const open = c => {
    const n = c.photos ? c.photos.length : c.ph, slides = Array.from({length: n}, (_, k) => `<div class="gv-slide">${c.photos ? `<img src="${esc(c.photos[k].l)}" alt="${esc(c.mk + ' ' + c.md)} ${k + 1}"${k ? ' loading="lazy"' : ''} decoding="async">` : carSvg}<span class="gv-sn">${k + 1} / ${n}</span></div>`).join('');
    dv.innerHTML = `<div class="gv-dtop"><a class="gv-back" href="#">${I.back}Retour</a>${REAL ? '' : '<span class="gv-ex">Exemple</span>'}</div>
      <div class="gv-din"><div class="gv-gal"><div class="gv-track">${slides}</div><button class="gv-nav l" aria-label="Précédente">${I.left}</button><button class="gv-nav r" aria-label="Suivante">${I.right}</button></div>
      <div class="gv-dinfo"><span class="gv-eye">${esc(c.mk)}</span><h1 class="gv-dname">${esc(c.mk)} ${esc(c.md)}</h1><p class="gv-ver">${esc(c.v)}</p>
      <div class="gv-dprice"><small>Prix</small>CHF ${nf(c.p)}.–</div>
      <div class="gv-btns"><a class="gv-btn a" href="${waCar(c)}" target="_blank" rel="noopener">${I.wa}Je suis intéressé</a><a class="gv-btn b" href="tel:+41227329837">${I.phone}Appeler</a></div>
      <h2 class="gv-st">Caractéristiques</h2><dl class="gv-tab">
        ${[['Année', c.y], ['Kilométrage', c.km || c.km === 0 ? nf(c.km) + ' km' : ''], ['Carburant', c.f], ['Boîte de vitesses', c.g], ['Puissance', c.hp ? c.hp + ' ch' : ''], ['Couleur', c.col], ['Portes', c.dr || '']].filter(r => r[1]).map(r => `<div><dt>${r[0]}</dt><dd>${esc(r[1])}</dd></div>`).join('')}</dl>
      ${c.desc ? `<h2 class="gv-st">Description</h2><p class="gv-desc">${esc(c.desc).replace(/\n/g, '<br>')}</p>` : ''}
      <p class="gv-dnote">Essai possible au garage, du lundi au vendredi de 07:30 à 17:00. Leasing et reprise de votre véhicule possibles.</p></div></div>`;
    lastY = scrollY; dv.classList.add('on'); document.documentElement.classList.add('gv-lock'); dv.scrollTop = 0;
    const tr = dv.querySelector('.gv-track'); let k = 0;
    const go = d => { k = Math.max(0, Math.min(n - 1, k + d)); tr.scrollTo({left: k * tr.clientWidth, behavior: 'smooth'}); };
    dv.querySelector('.gv-nav.l').onclick = () => go(-1); dv.querySelector('.gv-nav.r').onclick = () => go(1);
    tr.addEventListener('scroll', () => { k = Math.round(tr.scrollLeft / tr.clientWidth); }, {passive: true});
  };
  const close = () => { dv.classList.remove('on'); document.documentElement.classList.remove('gv-lock'); scrollTo(0, lastY); };
  const route = () => { const m = location.hash.match(/^#voiture-(.+)$/); const c = m && CARS.find(x => slug(x) === m[1]); c ? open(c) : dv.classList.contains('on') && close(); };
  addEventListener('hashchange', route);
  dv.addEventListener('click', e => { if (e.target.closest('.gv-back')) { e.preventDefault(); history.pushState('', '', location.pathname + location.search); close(); } });
  addEventListener('keydown', e => { if (e.key === 'Escape' && dv.classList.contains('on')) { history.pushState('', '', location.pathname + location.search); close(); } });
  route();
  document.querySelectorAll('.gd-rv').forEach(n => io.observe(n));
}
GDVENTE_JS_END;
