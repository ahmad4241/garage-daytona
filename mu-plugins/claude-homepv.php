<?php
/* Garage Daytona — new homepage. HIDDEN PREVIEW: only on /?apercu=1. Built by preview/home/build_plugin.py */
if (!defined('ABSPATH')) exit;
function gdhome_on() { return function_exists('is_front_page') && is_front_page(); }
add_action('wp', function () {
  if (!gdhome_on() || !isset($_GET['apercu'])) return;
  if (!defined('DONOTCACHEPAGE')) define('DONOTCACHEPAGE', true);
  if (!headers_sent()) { nocache_headers(); header('X-Robots-Tag: noindex, nofollow'); }
});
add_action('wp_head', function () {
  if (!gdhome_on()) return;
  echo (isset($_GET['apercu']) ? "<meta name=\"robots\" content=\"noindex,nofollow\">\n" : "") . "<link rel=\"preload\" as=\"image\" href=\"/wp-content/uploads/claude/hero/1-axes.webp?v=2\" media=\"(min-width:761px)\">\n<link rel=\"preload\" as=\"image\" href=\"/wp-content/uploads/claude/hero/1-axes-m.webp?v=2\" media=\"(max-width:760px)\">\n<script>(function(){var d=document.documentElement;d.classList.add('gdh-js');var s=document.createElement('style');s.id='gdh-head';s.textContent=" . json_encode(GDHOME_HEAD) . ";document.head.appendChild(s);})();</script>\n";
}, 99);
add_action('wp_body_open', function () {
  if (!gdhome_on()) return;
  $car = defined('GDHERO_CAR') ? str_replace('<path ', '<path pathLength="1" ', GDHERO_CAR) : '';
  echo '<script>(function(){var s=document.createElement("style");s.textContent=' . json_encode(GDHOME_HCSS) . ';document.head.appendChild(s);})();</script>';
  echo str_replace('%CAR%', $car, GDHOME_HERO);
}, 30);
add_action('wp_footer', function () {
  if (!gdhome_on()) return;
  echo "<script src=\"/wp-content/uploads/claude/js/gsap-3.12.5.min.js\"></script>\n<script id=\"gdhome-hero\">try{(" . GDHOME_HJS . ")();}catch(e){console.error(e);}</script>\n<script id=\"gdhome-js\">try{(" . GDHOME_JS . ")();}catch(e){document.documentElement.classList.remove('gdh-js');console.error(e);}</script>\n<script id=\"gdhome-voy\">try{(" . GDHOME_VJS . ")();}catch(e){console.error(e);}</script>\n<script id=\"gdhome-at\">try{(" . GDHOME_AJS . ")();}catch(e){console.error(e);}</script>\n";
}, 99);
const GDHOME_HEAD = <<<'GDHOME_HEAD_END'
.gdh-js .elementor-element-4f990c01,.gdh-js .elementor-element-13b6997d,.gdh-js .elementor-element-1de1a4d7,.gdh-js .elementor-element-4a994048,.gdh-js .elementor-element-721a6e50,.gdh-js .elementor-element-73fddee8,.gdh-js .elementor-element-fce4824,.gdh-js .elementor-element-54eb534a,.gdh-js .elementor-element-6fec2d4,.gdh-js .elementor-element-6dce673,.gdh-js .elementor-element-33d6b68a{display:none!important}
html,body{overflow-x:hidden}

html{}
.gh{--w:#9c2b3b;--nv:#0f172a;--ink:#0f172a;--mut:#64748b;--line:#e2e6ee;font-family:'Hanken Grotesk',system-ui,sans-serif;font-variant-numeric:lining-nums}
.gh svg{fill:none;stroke:currentColor;stroke-width:1.6;stroke-linecap:round;stroke-linejoin:round}
.gh-in{max-width:1180px;margin:0 auto}
.gh-eye{display:block;font-size:11px;font-weight:600;letter-spacing:.24em;text-transform:uppercase;color:var(--w);margin:0 0 10px}
.gh-h{font-family:'Playfair Display',Georgia,serif;font-weight:400;color:var(--ink);font-size:clamp(27px,7vw,44px);line-height:1.14;margin:0 0 12px}
.gh-h em{font-style:italic;color:var(--w)}
.gh-c{text-align:center}
.gh-lead{margin:0 auto;max-width:560px;font-size:15px;line-height:1.65;color:var(--mut)}

/* trust strip */
.gh-trust{background:#0f172a;color:#fff;padding:14px 12px}
.gh-tr{display:flex;flex-wrap:wrap;justify-content:center;gap:8px 18px;font-size:12.5px;font-weight:600;color:rgba(255,255,255,.85)}
.gh-tr a{color:inherit!important;text-decoration:none!important;display:inline-flex;align-items:center;gap:7px}
.gh-tr b{color:#fff}
.gh-stars{color:#f5b301;letter-spacing:1px;font-size:13px}
.gh-tr .sep{opacity:.3}
@media (max-width:640px){.gh-tr .sep{display:none}.gh-tr{gap:6px 16px}}

/* services */
.gh-svc{background:#fff;padding:58px 16px 60px;scroll-margin-top:80px}
.gh-sg{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-top:26px}
.gh-s{position:relative;display:flex;flex-direction:column;gap:10px;padding:20px 16px 18px;border-radius:18px;background:#fff;border:1px solid var(--line);text-decoration:none!important;color:inherit;transition:transform .25s,box-shadow .25s,border-color .25s}
.gh-si{width:46px;height:46px;border-radius:13px;background:#1e2a47;color:#fff;display:grid;place-items:center;box-shadow:0 8px 18px rgba(15,23,42,.16)}
.gh-si svg{width:23px;height:23px}
.gh-s h3{margin:4px 0 0;font-family:'Playfair Display',Georgia,serif;font-weight:400;font-size:19px;line-height:1.2;color:var(--ink)}
.gh-s p{margin:0;font-size:12.5px;line-height:1.5;color:var(--mut)}
.gh-s .pr{margin-top:auto;font-size:12.5px;font-weight:600;color:var(--w)}
.gh-s .ar{position:absolute;top:18px;right:16px;width:30px;height:30px;border-radius:50%;border:1px solid var(--line);display:grid;place-items:center;color:var(--ink);transition:background .25s,color .25s,border-color .25s}
.gh-s .ar svg{width:15px;height:15px}
.gh-s:hover{border-color:transparent;box-shadow:0 18px 40px rgba(15,23,42,.12);transform:translateY(-4px)}
.gh-s:hover .ar{background:var(--w);border-color:var(--w);color:#fff}

/* stats */
.gh-stats{background:radial-gradient(120% 90% at 50% 0%,#1e2a47 0%,#0f172a 65%);color:#fff;padding:58px 16px 62px;text-align:center}
.gh-stats .gh-eye{color:#b84d5c}
.gh-stats .gh-h{color:#fff}
.gh-stats .gh-lead{color:rgba(255,255,255,.7)}
.gh-sts{display:grid;grid-template-columns:1fr 1fr;gap:26px 10px;max-width:1000px;margin:34px auto 0}
.gh-st b{display:block;font-family:'Playfair Display',Georgia,serif;font-weight:400;font-size:clamp(42px,12vw,66px);line-height:1;color:#fff;font-feature-settings:"lnum" 1}
.gh-st b small{font-size:.55em;color:#b84d5c;margin-left:2px}
.gh-st span{display:block;margin-top:10px;font-size:11.5px;font-weight:600;letter-spacing:.16em;text-transform:uppercase;color:rgba(255,255,255,.65)}
.gh-st::after{content:"";display:block;width:30px;height:2px;background:var(--w);margin:14px auto 0}

/* reviews */
.gh-rev{background:#f4f6f9;padding:58px 16px 60px}
.gh-rsum{display:inline-flex;align-items:center;gap:12px;margin:6px auto 0;padding:10px 16px;border-radius:999px;background:#fff;box-shadow:0 1px 2px rgba(15,23,42,.05),0 8px 22px rgba(15,23,42,.06);font-size:13.5px;color:var(--ink)}
.gh-rsum .g{width:22px;height:22px}
.gh-rsum b{font-size:17px}
.gh-rg{display:grid;gap:14px;margin-top:28px}
.gh-r{position:relative;background:#fff;border-radius:18px;padding:24px 20px 20px;box-shadow:0 1px 2px rgba(15,23,42,.05),0 10px 28px rgba(15,23,42,.06);display:flex;flex-direction:column;gap:14px}
.gh-r::before{content:"“";position:absolute;top:6px;right:18px;font:400 72px/1 'Playfair Display',Georgia,serif;color:#f1e3e8}
.gh-r .s{color:#f5b301;letter-spacing:2px;font-size:15px}
.gh-r q{quotes:none;font-family:'Playfair Display',Georgia,serif;font-size:17.5px;line-height:1.5;color:var(--ink)}
.gh-r q::before,.gh-r q::after{content:none}
.gh-r .who{margin-top:auto;display:flex;align-items:center;gap:10px;font-size:13px;color:var(--mut)}
.gh-r .who i{width:34px;height:34px;border-radius:50%;background:#1e2a47;color:#fff;display:grid;place-items:center;font-style:normal;font-weight:600;font-size:13px}
.gh-r .who b{display:block;color:var(--ink);font-weight:600}
.gh-rmore{display:flex;justify-content:center;margin-top:24px}
.gh-btn{display:inline-flex;align-items:center;justify-content:center;gap:9px;height:50px;padding:0 22px;border-radius:12px;font-size:14.5px;font-weight:600;text-decoration:none!important;transition:filter .2s,background .2s}
.gh-btn svg{width:18px;height:18px}
.gh-btn.o{border:1px solid var(--line);background:#fff;color:var(--ink)!important}
.gh-btn.o:hover{border-color:var(--ink)}

/* tires + payment */
.gh-tp{background:#fff;padding:58px 16px}
.gh-tg{display:grid;gap:14px;max-width:1080px;margin:0 auto}
.gh-tire{position:relative;overflow:hidden;border-radius:22px;background:radial-gradient(90% 140% at 100% 0%,#1e2a47 0%,#0f172a 60%);color:#fff;padding:30px 24px;text-decoration:none!important;display:flex;flex-direction:column;gap:12px}
.gh-tire .gh-eye{color:#b84d5c}
.gh-tire h3{margin:0;font-family:'Playfair Display',Georgia,serif;font-weight:400;font-size:28px;line-height:1.15;color:#fff}
.gh-tire p{margin:0;font-size:14.5px;line-height:1.6;color:rgba(255,255,255,.78);max-width:420px}
.gh-tire .go{margin-top:8px;display:inline-flex;align-items:center;gap:8px;font-size:14.5px;font-weight:600;color:#fff}
.gh-tire .go svg{width:18px;height:18px;transition:transform .2s}
.gh-tire:hover .go svg{transform:translateX(4px)}
.gh-tire .wheel{position:absolute;right:-50px;bottom:-60px;width:200px;height:200px;color:rgba(255,255,255,.08);animation:ghSpin 30s linear infinite}
@keyframes ghSpin{to{transform:rotate(360deg)}}
.gh-pay{border-radius:22px;border:1px solid var(--line);padding:26px 22px}
.gh-pay h3{margin:0 0 6px;font-family:'Playfair Display',Georgia,serif;font-weight:400;font-size:24px;color:var(--ink)}
.gh-pay>p{margin:0 0 18px;font-size:13.5px;line-height:1.6;color:var(--mut)}
.gh-pm{list-style:none;margin:0;padding:0;display:grid;gap:10px}
.gh-pm li{display:flex;align-items:center;gap:14px;padding:12px 14px;border-radius:14px;background:#f4f6f9;font-size:15px;font-weight:600;color:var(--ink)}
.gh-pm i{width:38px;height:38px;border-radius:10px;background:#1e2a47;color:#fff;display:grid;place-items:center}
.gh-pm svg{width:19px;height:19px}

/* booking */
.gh-ctaw{background:#fff;padding:0 16px 60px}
.gh-cta{max-width:1080px;margin:0 auto;border-radius:22px;background:var(--w);color:#fff;padding:38px 22px;text-align:center}
.gh-cta h2{font-family:'Playfair Display',Georgia,serif;font-weight:400;font-size:clamp(28px,7vw,44px);line-height:1.15;margin:0 0 10px;color:#fff}
.gh-cta p{margin:0 auto 22px;max-width:540px;font-size:15px;line-height:1.6;color:rgba(255,255,255,.88)}
.gh-btns{display:flex;flex-direction:column;gap:10px;max-width:440px;margin:0 auto}
.gh-btns .gh-btn{height:52px;font-size:15px}
.gh-btn.a{background:#0f172a;color:#fff!important}
.gh-btn.a:hover{filter:brightness(1.25)}
.gh-btn.b{border:1px solid rgba(255,255,255,.55);color:#fff!important}
.gh-btn.b:hover{background:rgba(255,255,255,.1)}

.gd-rv{opacity:0;transform:translateY(16px);transition:opacity .7s ease,transform .7s ease}
.gd-rv.in{opacity:1;transform:none}
@media (prefers-reduced-motion:reduce){.gd-rv{opacity:1;transform:none;transition:none}.gh-tire .wheel{animation:none}}

@media (min-width:980px){
 .gh-tr{font-size:13.5px;gap:10px 26px}
 .gh-svc{padding:100px 24px}
 .gh-sg{grid-template-columns:repeat(3,1fr);gap:20px;margin-top:44px}
 .gh-s{padding:30px 28px 26px;gap:12px}
 .gh-si{width:56px;height:56px;border-radius:16px}
 .gh-si svg{width:28px;height:28px}
 .gh-s h3{font-size:26px}
 .gh-s p,.gh-s .pr{font-size:14px}
 .gh-s .ar{top:28px;right:26px;width:40px;height:40px}
 .gh-stats{padding:100px 24px}
 .gh-sts{grid-template-columns:repeat(4,1fr)}
 .gh-rev{padding:100px 24px}
 .gh-rg{grid-template-columns:repeat(3,1fr);gap:22px}
 .gh-r{padding:32px 30px 26px}
 .gh-tp{padding:100px 24px}
 .gh-tg{grid-template-columns:1.15fr 1fr;gap:22px}
 .gh-tire{padding:46px 44px}
 .gh-tire h3{font-size:36px}
 .gh-tire .wheel{width:300px;height:300px;right:-70px;bottom:-90px}
 .gh-pay{padding:40px 38px}
 .gh-ctaw{padding:0 24px 100px}
 .gh-cta{padding:64px 40px}
 .gh-btns{flex-direction:row;justify-content:center;max-width:none}
 .gh-btns .gh-btn{padding:0 30px}
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
/* real tyre from the stock in the tyre box */
.gh-tire img.wheel{position:absolute;right:-40px;bottom:-70px;width:280px;height:280px;opacity:.95;filter:drop-shadow(0 24px 30px rgba(0,0,0,.55));transition:transform 1.2s cubic-bezier(.2,.7,.2,1);animation:none}
.gh-tire:hover img.wheel{transform:rotate(-25deg) translateX(-8px)}
.gh-tire p,.gh-tire h3,.gh-tire .gh-eye,.gh-tire .go{position:relative;z-index:1}
@media (max-width:760px){.gh-tire img.wheel{width:190px;height:190px;right:-40px;bottom:-50px;opacity:.85}}
/* real tyre from the stock in the tyre box */
.gh-tire img.wheel{position:absolute;right:-40px;bottom:-70px;width:280px;height:280px;opacity:.95;filter:drop-shadow(0 24px 30px rgba(0,0,0,.55));transition:transform 1.2s cubic-bezier(.2,.7,.2,1);animation:none}
.gh-tire:hover img.wheel{transform:rotate(-25deg) translateX(-8px)}
.gh-tire p,.gh-tire h3,.gh-tire .gh-eye,.gh-tire .go{position:relative;z-index:1}
@media (max-width:760px){.gh-tire img.wheel{width:190px;height:190px;right:-40px;bottom:-50px;opacity:.85}}
/* sport tyre picture on the navy card: its black background melts into the navy */
.gh-tire img.wheel{width:300px;height:auto;right:-30px;bottom:-40px;mix-blend-mode:lighten;filter:none;opacity:1}
.gh-tire:hover img.wheel{transform:translateX(-6px) scale(1.03)}
@media (max-width:760px){.gh-tire img.wheel{width:200px;height:auto;right:-36px;bottom:-34px;opacity:.9}}

/* Les voyants — smart dashboard services section (scoped to #nos-services) */
@property --a{syntax:'<color>';inherits:true;initial-value:rgba(0,0,0,0)}
#nos-services{  --ink:#0b0d10; --hero:#141619; --navy:#0f172a;
  --wine:#9c2b3b; --rose:#b84d5c; --pink:#b84d5c;
  --amber:#ffb020; --red:#ff4141; --green:#3ddc84; --blue:#5ab8ff; --white:#eef3ff;
  --line:rgba(255,255,255,.12); --mute:rgba(255,255,255,.66);
  --serif:'Playfair Display',Georgia,'Times New Roman',serif;
  --sans:'Hanken Grotesk',system-ui,-apple-system,'Segoe UI',sans-serif;
  --mono:'JetBrains Mono',ui-monospace,Menlo,Consolas,monospace;
  color-scheme:dark;
  color:#fff;font-family:var(--sans);-webkit-font-smoothing:antialiased}
#nos-services *,#nos-services *::before,#nos-services *::after{box-sizing:border-box}
#nos-services button,#nos-services a{box-shadow:none;text-transform:none;text-decoration:none;min-height:0;line-height:normal;letter-spacing:normal;font-family:inherit}
#nos-services a{color:inherit}
#nos-services p{margin:0}
#nos-services .wrap{max-width:1180px;margin:0 auto;padding-left:max(20px,env(safe-area-inset-left,0px));padding-right:max(20px,env(safe-area-inset-right,0px))}
#nos-services{background:radial-gradient(90% 60% at 50% 30%,#1a1e25 0%,var(--hero) 60%);padding-block:clamp(70px,9vw,120px)}
#nos-services-hd{text-align:center;max-width:720px;margin:0 auto clamp(30px,4vw,48px)}
#nos-services .eyebrow{margin:0 0 14px;font-size:12px;font-weight:600;letter-spacing:.26em;text-transform:uppercase;color:var(--rose)}
#nos-services h2{margin:0;font:400 clamp(32px,4.8vw,58px)/1.05 var(--serif);text-wrap:balance}
#nos-services h2 em{font-style:italic;color:var(--rose)}
#nos-services-hd p{margin:14px auto 0;color:var(--mute);font-size:16px;line-height:1.6;max-width:520px}
#nos-services .cl{position:relative;max-width:1020px;margin:0 auto;border-radius:200px 200px 44px 44px / 150px 150px 44px 44px;padding:clamp(18px,3vw,34px) clamp(16px,3vw,40px) clamp(18px,2.4vw,26px);background:radial-gradient(120% 120% at 50% 0%,#14171d 0%,#07080a 70%);box-shadow:0 0 0 1px rgba(255,255,255,.07),0 0 0 9px #0e1013,0 0 0 10px rgba(255,255,255,.08),0 40px 90px rgba(0,0,0,.6),0 0 110px color-mix(in srgb,var(--a) 40%,transparent),inset 0 2px 0 rgba(255,255,255,.05)}
#nos-services .cl-row{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1.15fr) minmax(0,1fr);align-items:center;gap:clamp(8px,2vw,26px)}
#nos-services .gauge{width:100%;max-width:300px;justify-self:center;display:block}
#nos-services .gauge .face{fill:url(#gface)}
#nos-services .gauge .rim{fill:none;stroke:rgba(255,255,255,.1);stroke-width:2}
#nos-services .gauge .tk{stroke:rgba(255,255,255,.75);stroke-width:2.2;stroke-linecap:round}
#nos-services .gauge .tk.s{stroke:rgba(255,255,255,.35);stroke-width:1.4}
#nos-services .gauge .tk.r{stroke:var(--red)}
#nos-services .gauge .num{font:600 17px var(--sans);fill:rgba(255,255,255,.85);text-anchor:middle;dominant-baseline:middle}
#nos-services .gauge .num.r{fill:var(--red)}
#nos-services .gauge .unit{font:600 10px var(--sans);letter-spacing:.18em;fill:rgba(255,255,255,.45);text-anchor:middle}
#nos-services .gauge .ndl{fill:var(--pink);filter:drop-shadow(0 0 6px rgba(184,77,92,.8))}
#nos-services .gauge .hub{fill:#15181d;stroke:rgba(255,255,255,.18);stroke-width:2}
#nos-services .gauge .redarc{fill:none;stroke:var(--red);stroke-width:5;opacity:.75}
#nos-services .gauge .glow{fill:none;stroke:var(--pink);stroke-width:2;opacity:.25}
#nos-services .lcd{position:relative;align-self:stretch;min-height:230px;border-radius:18px;background:linear-gradient(180deg,#0b1220,#070b14);box-shadow:inset 0 0 0 1px rgba(120,160,255,.14),inset 0 0 40px rgba(60,110,255,.08);padding:16px 18px;font-family:var(--mono);display:flex;flex-direction:column;overflow:hidden}
#nos-services .lcd::after{content:"";position:absolute;inset:0;pointer-events:none;background:repeating-linear-gradient(0deg,rgba(255,255,255,.025) 0 1px,transparent 1px 3px)}
#nos-services .lcd-top{display:flex;justify-content:space-between;font-size:10.5px;letter-spacing:.14em;color:#7d8aa3;border-bottom:1px solid rgba(255,255,255,.08);padding-bottom:8px}
#nos-services .lcd-body{flex:1;display:flex;flex-direction:column;justify-content:center;gap:8px;padding-top:10px;min-width:0}
#nos-services .lcd .q{font-size:clamp(15px,1.7vw,19px);font-weight:700;color:#e8f0ff;line-height:1.35}
#nos-services .lcd .ln{font-size:13px;line-height:1.5;color:#b9c6dd;min-height:1.5em}
#nos-services .lcd .sv{display:flex;justify-content:space-between;gap:10px;font-size:12px;letter-spacing:.12em;color:#7d8aa3;text-transform:uppercase}
#nos-services .lcd .sv b{color:#fff;letter-spacing:.04em;font-size:14px;text-transform:none}
#nos-services .lcd .cur{display:inline-block;width:.6em;height:1.05em;background:#e8f0ff;vertical-align:-2px;margin-left:2px;animation:bl 1s steps(2) infinite}
#nos-services .wa{align-self:flex-start;margin-top:4px;display:inline-flex;align-items:center;gap:8px;font:700 13px var(--sans);padding:10px 15px;border-radius:999px;background:#1fa855;color:#fff;opacity:0;pointer-events:none;transition:opacity .4s,transform .4s;transform:translateY(6px)}
#nos-services .wa.on{opacity:1;pointer-events:auto;transform:none}
#nos-services .wa svg{width:16px;height:16px}
#nos-services .tt{display:flex;justify-content:center;gap:clamp(10px,2.4vw,26px);margin-top:clamp(12px,2vw,20px);padding-top:clamp(10px,1.6vw,16px);border-top:1px solid rgba(255,255,255,.06)}
#nos-services .tt svg{width:clamp(20px,2.6vw,28px);height:clamp(20px,2.6vw,28px);color:rgba(255,255,255,.08);transition:color .15s,filter .15s}
#nos-services .tt svg.lit{color:var(--c);filter:drop-shadow(0 0 6px var(--c)) drop-shadow(0 0 14px var(--c))}
#nos-services{position:relative;overflow:hidden;--a:rgba(0,0,0,0);transition:--a 1.1s ease}
#nos-services > .wrap{position:relative;z-index:1}
#nos-services .amb{position:absolute;inset:0;pointer-events:none;background:radial-gradient(60% 46% at 50% 52%,color-mix(in srgb,var(--a) 30%,transparent),transparent 72%)}
#nos-services .cl .gauge,#nos-services .cl .lcd,#nos-services .cl .tt{transition:opacity .7s ease,filter .7s ease}
#nos-services .cl.off .gauge,#nos-services .cl.off .lcd,#nos-services .cl.off .tt{opacity:.3;filter:saturate(.3)}
#nos-services .cl.off .lcd-body{visibility:hidden}
#nos-services .start{position:absolute;left:50%;top:44%;transform:translate(-50%,-50%);z-index:4;width:clamp(104px,12vw,132px);aspect-ratio:1;border-radius:50%;border:0;cursor:pointer;color:#fff;background:radial-gradient(circle at 50% 32%,#30353e,#0c0e11 72%);box-shadow:0 0 0 2px #2b2f36,0 0 0 7px #0a0b0d,0 0 0 8px rgba(255,255,255,.14),0 20px 44px rgba(0,0,0,.7),inset 0 2px 0 rgba(255,255,255,.1)}
#nos-services .start span{display:flex;flex-direction:column;align-items:center;font:700 10px var(--sans);letter-spacing:.2em;color:rgba(255,255,255,.7)}
#nos-services .start b{font-size:clamp(17px,2vw,21px);letter-spacing:.08em;color:#fff;margin:4px 0}
#nos-services .start::before{content:"";position:absolute;inset:-14px;border-radius:50%;border:2px solid var(--pink);animation:breath 2.2s ease-in-out infinite}
#nos-services .start::after{content:"";position:absolute;left:50%;top:16%;width:6px;height:6px;margin-left:-3px;border-radius:50%;background:var(--pink);box-shadow:0 0 10px var(--pink)}
#nos-services .start:hover{filter:brightness(1.15)}
#nos-services .start:active{transform:translate(-50%,-50%) scale(.95)}
#nos-services .start:focus-visible{outline:2px solid var(--rose);outline-offset:6px}
#nos-services .start.gone{display:none}
#nos-services .mute{position:absolute;top:clamp(14px,2vw,22px);right:clamp(22px,4vw,48px);z-index:4;width:34px;height:34px;border-radius:50%;border:1px solid var(--line);background:rgba(255,255,255,.04);color:rgba(255,255,255,.7);display:grid;place-items:center;cursor:pointer}
#nos-services .mute svg{width:17px;height:17px}
#nos-services .mute .x{display:none}
#nos-services .mute.m .x{display:inline}
#nos-services .mute.m .w{display:none}
#nos-services .opts{display:flex;gap:8px;flex-wrap:wrap;margin-top:4px}
#nos-services .ob{appearance:none;cursor:pointer;border:1px solid rgba(120,160,255,.4);background:rgba(90,140,255,.1);color:#e8f0ff;font:700 12.5px var(--mono);padding:9px 12px;border-radius:10px}
#nos-services .ob:hover{background:rgba(90,140,255,.22)}
#nos-services .ob:focus-visible{outline:2px solid var(--rose)}
#nos-services .lcd .qq{color:#fff;font-weight:700}
#nos-services .cl-row{grid-template-columns:minmax(0,.82fr) minmax(0,1.7fr) minmax(0,.82fr)}
#nos-services .lcd{min-height:clamp(330px,34vw,380px);padding:12px 14px 10px;border-radius:20px;background:radial-gradient(120% 90% at 50% 0%,#101a2e,#060a12 70%);cursor:default}
#nos-services .cl.off .lcd{cursor:pointer}
#nos-services .lcd-top{font-size:10px}
#nos-services .view{flex:1;display:flex;flex-direction:column;gap:10px;padding-top:12px;min-width:0;font-family:var(--sans)}
#nos-services .h-q{font:400 clamp(19px,2vw,24px)/1.15 var(--serif);color:#fff}
#nos-services .tiles{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:8px}
#nos-services .tile{appearance:none;cursor:pointer;text-align:left;border:1px solid rgba(255,255,255,.08);background:linear-gradient(180deg,rgba(255,255,255,.06),rgba(255,255,255,.02));color:#fff;border-radius:14px;padding:11px 10px;display:flex;flex-direction:column;gap:8px;min-width:0;font:inherit;transition:border-color .25s,background .25s,transform .25s}
#nos-services .tile svg{width:24px;height:24px;color:var(--c);filter:drop-shadow(0 0 6px color-mix(in srgb,var(--c) 60%,transparent))}
#nos-services .tile span{font-size:13px;font-weight:600;line-height:1.25}
#nos-services .tile small{display:block;font-size:11px;color:rgba(255,255,255,.55);font-weight:500;margin-top:2px}
#nos-services .tile:hover{border-color:var(--c);background:color-mix(in srgb,var(--c) 12%,transparent);transform:translateY(-2px)}
#nos-services .tile:focus-visible,#nos-services .chip:focus-visible,#nos-services .bk:focus-visible,#nos-services .dock a:focus-visible,#nos-services .dock button:focus-visible{outline:2px solid var(--rose);outline-offset:2px}
#nos-services .tile.wide{grid-column:1/-1;flex-direction:row;align-items:center;gap:12px;background:linear-gradient(90deg,rgba(243,193,208,.12),rgba(255,255,255,.02))}
#nos-services .tile.wide span{flex:1}
#nos-services .tile .go{font-style:normal;font-size:22px;color:var(--rose)}
#nos-services .cta2{display:inline-flex;align-items:center;justify-content:center;gap:8px;font:700 14px var(--sans);padding:12px 15px;border-radius:12px;background:var(--wine);color:#fff}
#nos-services .cta2 svg{width:18px;height:18px}
#nos-services .hdr{display:flex;align-items:center;gap:10px}
#nos-services .hdr b{display:block;font-size:16px}
#nos-services .hdr small{display:block;font-size:12px;color:rgba(255,255,255,.55)}
#nos-services .bk{appearance:none;cursor:pointer;width:32px;height:32px;border-radius:10px;border:1px solid rgba(255,255,255,.12);background:rgba(255,255,255,.05);color:#fff;display:grid;place-items:center;flex:none}
#nos-services .bk svg{width:16px;height:16px}
#nos-services .hi{width:38px;height:38px;border-radius:11px;display:grid;place-items:center;background:color-mix(in srgb,var(--c) 16%,transparent);flex:none}
#nos-services .hi svg{width:24px;height:24px;color:var(--c)}
#nos-services .tx{margin:0;font-size:14px;line-height:1.5;color:#c9d4e8;min-height:1.5em}
#nos-services .qq{margin:0;font:400 19px/1.2 var(--serif);color:#fff;min-height:1.2em}
#nos-services .chips{display:flex;gap:8px;flex-wrap:wrap}
#nos-services .chip{appearance:none;cursor:pointer;font:600 14px var(--sans);color:#fff;padding:11px 16px;border-radius:12px;border:1px solid rgba(255,255,255,.18);background:rgba(255,255,255,.06)}
#nos-services .chip:hover{background:rgba(255,255,255,.14)}
#nos-services .ub{display:grid;grid-template-columns:auto 1fr auto;align-items:center;gap:12px;font-size:12px;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.55)}
#nos-services .ub b{letter-spacing:.04em;text-transform:none;font-size:14px}
#nos-services .ubar{position:relative;display:grid;grid-template-columns:repeat(3,1fr);gap:3px;height:8px}
#nos-services .ubar i{border-radius:4px;opacity:.8}
#nos-services .ubar em{position:absolute;top:50%;left:0;width:14px;height:14px;margin:-7px 0 0 -7px;border-radius:50%;background:#fff;box-shadow:0 0 0 3px #060a12,0 0 10px #fff}
#nos-services .rows{display:grid;grid-template-columns:1fr 1fr;gap:8px}
#nos-services .rows div{border:1px solid rgba(255,255,255,.08);border-radius:12px;padding:9px 11px;background:rgba(255,255,255,.03)}
#nos-services .rows span{display:block;font-size:10.5px;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.5)}
#nos-services .rows b{font-size:14px}
#nos-services .view .wa{opacity:1;pointer-events:auto;transform:none;align-self:stretch;justify-content:center;padding:12px 15px;font-size:14px;border-radius:12px}
#nos-services .boot{flex:1;display:grid;place-items:center;align-content:center;gap:14px}
#nos-services .boot .lg{font:400 clamp(26px,3vw,36px)/1 var(--serif);color:#fff}
#nos-services .boot .lg em{font-style:italic;color:var(--rose)}
#nos-services .pbar{width:180px;height:3px;border-radius:3px;background:rgba(255,255,255,.1);overflow:hidden}
#nos-services .pbar i{display:block;height:100%;background:linear-gradient(90deg,var(--wine),var(--pink));transform-origin:left;transform:scaleX(0)}
#nos-services .bt{font:500 11px var(--mono);letter-spacing:.12em;color:#7d8aa3;min-height:1.3em}
#nos-services .dock{display:flex;justify-content:space-around;gap:6px;border-top:1px solid rgba(255,255,255,.08);padding-top:8px;margin-top:10px}
#nos-services .dock a,#nos-services .dock button{appearance:none;background:none;border:0;cursor:pointer;color:rgba(255,255,255,.62);font:600 11px var(--sans);letter-spacing:.04em;display:flex;align-items:center;gap:6px;padding:6px 8px;border-radius:8px}
#nos-services .dock a:hover,#nos-services .dock button:hover{color:#fff;background:rgba(255,255,255,.06)}
#nos-services .dock svg{width:16px;height:16px}
#nos-services .cl.off .dock,#nos-services .cl.off .view{visibility:hidden}
@keyframes bl{50%{opacity:0}}
@keyframes breath{50%{transform:scale(1.08);opacity:.2}}
@media (max-width:860px){#nos-services .cl{border-radius:44px}
#nos-services .cl-row{grid-template-columns:1fr 1fr;grid-template-areas:"a b" "s s"}
#nos-services .g1{grid-area:a}
#nos-services .g2{grid-area:b}
#nos-services .lcd{grid-area:s;min-height:400px}
#nos-services .tiles{grid-template-columns:repeat(2,minmax(0,1fr))}
#nos-services .rows{grid-template-columns:1fr}}
@media (prefers-reduced-motion:reduce){#nos-services *{animation:none!important;transition:none!important}}/* header on a white band, lifted clear of the dashboard */
#nos-services{padding-top:0}
#nos-services .vy-hd{max-width:none;background:#fff;box-shadow:0 0 0 100vmax #fff;clip-path:inset(0 -100vmax);padding-block:clamp(56px,7vw,92px) clamp(44px,5.5vw,70px);margin:0 0 clamp(56px,7vw,90px)}
#nos-services .vy-hd > *{max-width:720px;margin-left:auto;margin-right:auto}
#nos-services .vy-hd .eyebrow{color:var(--wine)}
#nos-services .vy-hd h2{color:#0f172a}
#nos-services .vy-hd h2 em{color:var(--wine)}
#nos-services .vy-hd p:last-child{color:#475569;margin-top:16px}
/* white section, the dashboard sits on it as a dark object; one navy + wine palette with the rest of the site */
#nos-services{background:#fff;padding-bottom:clamp(70px,9vw,110px)}
#nos-services .vy-hd{margin-bottom:clamp(36px,5vw,60px)}
#nos-services .amb{background:radial-gradient(55% 40% at 50% 62%,color-mix(in srgb,var(--a) 16%,transparent),transparent 70%)}
#nos-services .cl{background:radial-gradient(120% 120% at 50% 0%,#17213a 0%,#0b1120 70%);box-shadow:0 0 0 1px rgba(15,23,42,.08),0 0 0 8px #e9edf4,0 0 0 9px rgba(15,23,42,.1),0 34px 70px rgba(15,23,42,.28),0 0 90px color-mix(in srgb,var(--a) 35%,transparent),inset 0 2px 0 rgba(255,255,255,.06)}
#nos-services .lcd{background:radial-gradient(120% 90% at 50% 0%,#132242,#081022 70%)}
#nos-services .hint{color:#64748b}
#nos-services .mute{border-color:rgba(255,255,255,.14)}
/* laptop polish: centred heading and note, tighter gap, round mute button */
#nos-services .vy-hd,#nos-services .vy-hd > *{text-align:center}
#nos-services .vy-hd{margin-bottom:clamp(28px,3.5vw,44px)}
#nos-services .hint{text-align:center;margin-top:30px}
#nos-services .mute{width:34px;height:34px;padding:0;border-radius:50%;line-height:0}
/* one palette: navy + wine + white. Warning-light colours stay only on the small icons, as on a real car */
#nos-services{--pink:#9c2b3b;--rose:#b84d5c}
#nos-services .gauge .ndl{fill:#b84d5c;filter:drop-shadow(0 0 6px rgba(156,43,59,.9))}
#nos-services .gauge .glow{stroke:#9c2b3b}
#nos-services .tile:hover,#nos-services .tile:focus-visible{border-color:var(--wine);background:color-mix(in srgb,var(--wine) 16%,transparent)}
#nos-services .tile.wide{background:linear-gradient(90deg,rgba(156,43,59,.18),rgba(255,255,255,.02))}
#nos-services .hi{background:rgba(156,43,59,.18)}
#nos-services .view .wa{background:var(--wine)}
#nos-services .pbar i{background:linear-gradient(90deg,#661d28,#b84d5c)}
#nos-services .start::after{background:#b84d5c;box-shadow:0 0 10px #9c2b3b}
#nos-services .boot .lg em{color:#b84d5c}
#nos-services .ubar em{box-shadow:0 0 0 3px #081022,0 0 10px rgba(255,255,255,.6)}
/* dials: redline, needles and rings in the same wine */
#nos-services .gauge .tk.r{stroke:#9c2b3b}
#nos-services .gauge .num.r{fill:#b84d5c}
#nos-services .gauge .redarc{stroke:#9c2b3b;opacity:1}
#nos-services .gauge .ndl{fill:#9c2b3b;filter:drop-shadow(0 0 5px rgba(156,43,59,.85))}
#nos-services .gauge .glow{stroke:#9c2b3b;opacity:.35}
#nos-services .gauge .hub{fill:#0b1120;stroke:rgba(156,43,59,.6)}
/* dials: needles and redline in one dark red */
#nos-services .gauge .tk.r{stroke:#76222f}
#nos-services .gauge .num.r{fill:#b84d5c}
#nos-services .gauge .redarc{stroke:#76222f;opacity:1}
#nos-services .gauge .ndl{fill:#76222f;filter:drop-shadow(0 0 4px rgba(118,34,47,.9))}
#nos-services .gauge .glow{stroke:#76222f;opacity:.35}
#nos-services .gauge .hub{fill:#0b1120;stroke:rgba(118,34,47,.7)}
/* optional link to the service page under the WhatsApp button */
#nos-services .pgl{display:flex;align-items:center;justify-content:center;gap:6px;padding:10px 14px;border-radius:12px;border:1px solid rgba(255,255,255,.16);color:rgba(255,255,255,.85);font:600 13.5px var(--sans);text-decoration:none}
#nos-services .pgl span{transition:transform .25s}
#nos-services .pgl:hover{background:rgba(255,255,255,.06);color:#fff}
#nos-services .pgl:hover span{transform:translateX(3px)}
/* heading in black, then "ask our assistant" with a bouncing arrow right above the screen */
#nos-services .vy-hd h2,#nos-services .vy-hd h2 em{color:#0f172a;font-style:normal}
#nos-services .vy-hd{margin-bottom:0;padding-bottom:clamp(28px,3.5vw,40px)}
#nos-services .ask{text-align:center;margin:clamp(6px,1vw,12px) 0 clamp(18px,2.4vw,26px)}
#nos-services .ask h3{margin:0;font:400 clamp(22px,2.6vw,30px)/1.2 var(--serif);color:#0f172a}
#nos-services .arw{display:inline-grid;place-items:center;width:40px;height:40px;margin-top:10px;color:#0f172a;animation:gdbob 1.6s ease-in-out infinite}
#nos-services .arw svg{width:26px;height:26px}
@keyframes gdbob{0%,100%{transform:translateY(-4px)}50%{transform:translateY(6px)}}
#nos-services .arw{color:var(--wine)}
/* assistant: one red for every icon, a question field, quick chips, topic lists and answers */
#nos-services .tile svg,#nos-services .hi svg{color:#c9606e!important;filter:none}
#nos-services .tt svg.lit{color:#c9606e;filter:drop-shadow(0 0 6px #9c2b3b) drop-shadow(0 0 14px #9c2b3b)}
#nos-services .lcd{height:clamp(470px,44vw,520px)}
#nos-services .view{overflow-y:auto;overscroll-behavior:contain;scrollbar-width:thin;scrollbar-color:rgba(255,255,255,.2) transparent;padding-right:2px}
#nos-services .askf{display:flex;gap:8px;align-items:center;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.14);border-radius:14px;padding:5px 5px 5px 14px}
#nos-services .askf:focus-within{border-color:#c9606e}
#nos-services .askf input{flex:1;min-width:0;background:none;border:0;outline:0;color:#fff;font:500 15px var(--sans);padding:9px 0;box-shadow:none;height:auto;margin:0}
#nos-services .askf input::placeholder{color:rgba(255,255,255,.45)}
#nos-services .askf button{flex:none;width:40px;height:40px;padding:0;border:0;border-radius:11px;background:var(--wine);color:#fff;display:grid;place-items:center;cursor:pointer}
#nos-services .askf button svg{width:18px;height:18px}
#nos-services .qk{display:flex;gap:6px;flex-wrap:wrap}
#nos-services .qc{appearance:none;cursor:pointer;border:1px solid rgba(255,255,255,.14);background:rgba(255,255,255,.04);color:rgba(255,255,255,.85);font:600 12px var(--sans);padding:7px 11px;border-radius:999px}
#nos-services .qc:hover{border-color:#c9606e;color:#fff}
#nos-services .tile{padding:10px}
#nos-services .lst{display:flex;flex-direction:column;gap:6px}
#nos-services .li{appearance:none;cursor:pointer;display:grid;grid-template-columns:1fr auto auto;gap:10px;align-items:center;text-align:left;border:1px solid rgba(255,255,255,.08);background:rgba(255,255,255,.04);color:#fff;border-radius:12px;padding:11px 12px;font:600 14px var(--sans)}
#nos-services .li b{font-size:12.5px;color:#e3aab3;white-space:nowrap}
#nos-services .li i{font-style:normal;color:rgba(255,255,255,.4);font-size:18px}
#nos-services .li:hover{border-color:#c9606e;background:rgba(156,43,59,.16)}
#nos-services .you{margin:0;font:italic 400 15px/1.4 var(--serif);color:rgba(255,255,255,.7)}
#nos-services .prc{display:flex;flex-direction:column;gap:6px}
#nos-services .prc div{display:flex;justify-content:space-between;gap:12px;border:1px solid rgba(255,255,255,.08);border-radius:10px;padding:8px 11px;background:rgba(255,255,255,.03);font-size:13.5px}
#nos-services .prc span{color:rgba(255,255,255,.75)}
#nos-services .prc b{white-space:nowrap}
#nos-services .also{display:flex;gap:6px;flex-wrap:wrap;align-items:center;margin-top:2px}
#nos-services .also > span{font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.45);margin-right:4px}
@media (max-width:860px){#nos-services .lcd{height:560px}}
#nos-services .bk{width:34px;height:34px;padding:0;flex:none;border-radius:10px}
#nos-services .qk{gap:5px}#nos-services .qc{padding:7px 10px}
/* service overview */
#nos-services .ovb{display:flex;flex-direction:column;gap:12px}
#nos-services .sec{display:flex;flex-direction:column;gap:7px}
#nos-services .sh{font-size:10.5px;letter-spacing:.16em;text-transform:uppercase;color:#e3aab3;font-weight:700}
#nos-services .stp{list-style:none;margin:0;padding:0;display:flex;flex-direction:column;gap:6px}
#nos-services .stp li{display:flex;gap:10px;align-items:flex-start}
#nos-services .stp li > b{flex:none;width:24px;height:24px;border-radius:50%;background:var(--wine);color:#fff;display:grid;place-items:center;font-size:12px}
#nos-services .stp strong{display:block;font-size:14px}
#nos-services .stp span{display:block;font-size:13px;color:rgba(255,255,255,.7);line-height:1.4}
#nos-services .inc{list-style:none;margin:0;padding:0;display:flex;flex-direction:column;gap:5px}
#nos-services .inc li{position:relative;padding-left:20px;font-size:13.5px;color:rgba(255,255,255,.85);line-height:1.4}
#nos-services .inc li::before{content:"";position:absolute;left:2px;top:6px;width:9px;height:5px;border-left:2px solid #c9606e;border-bottom:2px solid #c9606e;transform:rotate(-45deg)}
#nos-services .nt{margin:0;font-size:12.5px;color:rgba(255,255,255,.6);font-style:italic}
#nos-services .view > *,#nos-services .ovb > *{flex-shrink:0}
/* phone: a shorter dashboard */
@media (max-width:860px){
  #nos-services .cl{padding:14px 12px 12px;border-radius:30px}
  #nos-services .cl-row{gap:6px 10px}
  #nos-services .gauge{max-width:132px}
  #nos-services .lcd{height:470px;padding:10px 11px 8px;border-radius:16px}
  #nos-services .tiles{gap:6px}
  #nos-services .tile{flex-direction:row;align-items:center;gap:9px;padding:9px 10px;border-radius:12px}
  #nos-services .tile svg{width:20px;height:20px;flex:none}
  #nos-services .tile span{font-size:12.5px}
  #nos-services .tile small{display:none}
  #nos-services .askf input{font-size:16px;padding:6px 0}
  #nos-services .askf button{width:36px;height:36px}
  #nos-services .tt{display:none}
  #nos-services .mute{top:10px;right:14px;width:30px;height:30px}
  #nos-services .vy-hd{padding-block:44px 22px}
  #nos-services .start{top:24%}
}
/* no sound at all; on phones the screen keeps only the height it needs */
#nos-services .mute{display:none!important}
@media (max-width:860px){#nos-services .lcd{height:auto;max-height:560px}#nos-services .view{min-height:0}}

/* Notre atelier */
#atelier{background:#0f172a;color:#fff;padding-block:clamp(64px,8vw,100px);font-family:'Hanken Grotesk',system-ui,sans-serif;overflow:hidden}
#atelier *{box-sizing:border-box}
#atelier .at-in{max-width:1180px;margin:0 auto;padding-left:max(20px,env(safe-area-inset-left,0px));padding-right:max(20px,env(safe-area-inset-right,0px))}
#atelier .at-hd{text-align:center;margin-bottom:clamp(26px,3.5vw,40px)}
#atelier .at-eye{display:block;font-size:12px;font-weight:600;letter-spacing:.26em;text-transform:uppercase;color:#c9606e;margin-bottom:12px}
#atelier h2{margin:0;font:400 clamp(30px,4.2vw,52px)/1.08 'Playfair Display',Georgia,serif;color:#fff;text-wrap:balance}
#atelier .at-hd p{margin:12px 0 0;color:rgba(255,255,255,.66);font-size:15px}
#atelier .at-pano{position:relative;height:clamp(200px,26vw,340px);overflow-x:auto;overflow-y:hidden;scrollbar-width:none;-webkit-overflow-scrolling:touch;margin-bottom:clamp(14px,2vw,22px);cursor:grab}
#atelier .at-pano::-webkit-scrollbar{display:none}
#atelier .at-pano img{height:100%;width:auto;max-width:none;display:block}
#atelier .at-hint{position:sticky;left:50%;bottom:12px;float:left;margin-top:-40px;transform:translateX(-50%);background:rgba(15,23,42,.7);backdrop-filter:blur(6px);border:1px solid rgba(255,255,255,.2);border-radius:999px;padding:6px 12px;font-size:12px;letter-spacing:.1em;color:#fff;pointer-events:none;transition:opacity .4s}
#atelier .at-pano.used .at-hint{opacity:0}
#atelier .at-grid{display:grid;grid-template-columns:minmax(0,1.6fr) minmax(0,1fr);gap:14px}
#atelier figure{margin:0;position:relative;border-radius:18px;overflow:hidden;background:#16203a}
#atelier figure img{display:block;width:100%;height:100%;object-fit:cover}
#atelier .at-big{aspect-ratio:16/10}
#atelier .at-side{display:grid;grid-template-rows:1fr 1fr;gap:14px}
#atelier .at-side figure{min-height:0}
#atelier figcaption{position:absolute;left:12px;bottom:12px;background:rgba(15,23,42,.72);backdrop-filter:blur(6px);border-radius:10px;padding:6px 10px;font-size:13px;font-weight:600}
#atelier .at-hs{position:absolute;transform:translate(-50%,-50%);width:30px;height:30px;padding:0;border:0;background:none;cursor:pointer;box-shadow:none}
#atelier .at-hs i{position:absolute;inset:7px;border-radius:50%;background:#fff;box-shadow:0 0 0 3px rgba(156,43,59,.9)}
#atelier .at-hs::before{content:"";position:absolute;inset:0;border-radius:50%;border:2px solid #fff;animation:atp 1.8s ease-out infinite}
@keyframes atp{from{transform:scale(.5);opacity:1}to{transform:scale(1.5);opacity:0}}
#atelier .at-hs span{position:absolute;left:50%;bottom:calc(100% + 8px);transform:translate(-50%,6px);white-space:nowrap;background:#fff;color:#0f172a;font:700 12.5px 'Hanken Grotesk',sans-serif;padding:6px 10px;border-radius:8px;opacity:0;pointer-events:none;transition:opacity .25s,transform .25s;box-shadow:0 8px 20px rgba(0,0,0,.3)}
#atelier .at-hs:hover span,#atelier .at-hs:focus-visible span,#atelier .at-hs.on span{opacity:1;transform:translate(-50%,0)}
#atelier .at-rv{opacity:0;transform:translateY(18px) scale(.985);transition:opacity .8s ease,transform .8s ease}
#atelier .at-rv.in{opacity:1;transform:none}
@media (max-width:760px){
  #atelier .at-grid{grid-template-columns:1fr}
  #atelier .at-side{grid-template-rows:none;grid-template-columns:1fr 1fr}
  #atelier .at-side figure{aspect-ratio:4/3}
  #atelier figcaption{font-size:11px;left:8px;bottom:8px;padding:4px 7px}
}
@media (prefers-reduced-motion:reduce){#atelier .at-rv{opacity:1;transform:none}#atelier .at-hs::before{animation:none}}

GDHOME_HEAD_END;
const GDHOME_HCSS = <<<'GDHOME_HCSS_END'
#gd-star,#gd-star *{box-sizing:border-box}
#gd-star{position:relative;overflow:hidden;background:#141619;color:#fff;font-family:'Hanken Grotesk',system-ui,sans-serif;height:calc(100svh - 64px);min-height:600px;max-height:900px}
#gd-star .gs-stage{position:absolute;inset:0}
#gd-star .gs-f{position:absolute;inset:0;opacity:0;will-change:opacity,transform}
#gd-star .gs-f img{width:100%;height:100%;object-fit:cover;object-position:50% 60%;display:block}
#gd-star .gs-f[data-k="0"]{opacity:1}
#gd-star .gs-flash{position:absolute;inset:0;background:radial-gradient(60% 60% at 50% 55%,#fff 0%,rgba(255,255,255,.6) 40%,rgba(255,255,255,0) 75%);opacity:0;pointer-events:none;mix-blend-mode:screen}
#gd-star .gs-lamp{position:absolute;width:15%;aspect-ratio:2/1;border-radius:50%;background:radial-gradient(closest-side,rgba(255,255,255,.95),rgba(220,235,255,.45) 40%,rgba(220,235,255,0) 100%);opacity:0;pointer-events:none;mix-blend-mode:screen}
#gd-star .gs-lamp.l{left:13.5%;top:46.5%}
#gd-star .gs-lamp.r{left:34%;top:48%}
#gd-star .gs-vig{position:absolute;inset:0;background:linear-gradient(180deg,rgba(10,11,13,.75) 0%,rgba(10,11,13,0) 30%,rgba(10,11,13,0) 62%,rgba(10,11,13,.85) 100%);pointer-events:none}
#gd-star .gs-ui{position:relative;z-index:3;height:100%;max-width:1240px;margin:0 auto;padding:30px 24px 26px;display:flex;flex-direction:column}
#gd-star .gs-eye{margin:0;font-size:11px;font-weight:600;letter-spacing:.28em;text-transform:uppercase;color:#fff}
#gd-star .gs-label{margin-top:14px;min-height:120px}
#gd-star .gs-n{display:block;font-size:12px;font-weight:600;letter-spacing:.2em;color:#fff}
#gd-star .gs-w{display:block;overflow:hidden;font:400 clamp(46px,7vw,96px)/1.02 'Playfair Display',Georgia,serif;letter-spacing:-.01em}
#gd-star .gs-w .ch{display:inline-block;will-change:transform}
#gd-star .gs-d{display:block;margin-top:8px;font-size:15px;color:#fff}
#gd-star .gs-final{position:absolute;left:24px;right:24px;top:30px;visibility:hidden;text-align:center}
#gd-star h1{margin:22px auto 0;max-width:none;font:400 clamp(40px,5vw,72px)/1.05 'Playfair Display',Georgia,serif;color:#fff}
#gd-star h1 em{font-style:italic;color:#fff}
#gd-star .gs-sub{margin:12px auto 0;max-width:620px;font-size:16px;line-height:1.6;color:#fff}
#gd-star .gs-cta{display:flex;justify-content:center;gap:12px;margin-top:22px}
#gd-star .gs-btn{display:inline-flex;align-items:center;justify-content:center;height:52px;padding:0 28px;border-radius:12px;font-size:15px;font-weight:600;text-decoration:none!important;transition:filter .2s,background .2s}
#gd-star .gs-btn.a{background:#9c2b3b;color:#fff!important}
#gd-star .gs-btn.a:hover{filter:brightness(1.1)}
#gd-star .gs-btn.b{border:1px solid rgba(255,255,255,.5);color:#fff!important;background:rgba(15,23,42,.35);backdrop-filter:blur(4px)}
#gd-star .gs-btn.b:hover{background:rgba(255,255,255,.1)}
#gd-star .gs-steps{position:relative;margin-top:auto;display:grid;grid-template-columns:repeat(6,1fr);padding-top:14px}
#gd-star .gs-bar{position:absolute;left:0;right:0;top:0;height:2px;background:rgba(255,255,255,.18);border-radius:2px}
#gd-star .gs-bar i{position:absolute;inset:0;transform-origin:0 50%;transform:scaleX(0);background:#9c2b3b;border-radius:2px}
#gd-star .gs-steps button{appearance:none;background:none;border:0;padding:6px 2px;margin:0;color:rgba(255,255,255,.5);font:600 11.5px 'Hanken Grotesk',sans-serif;letter-spacing:.12em;text-transform:uppercase;cursor:pointer;text-align:left;transition:color .3s}
#gd-star .gs-steps button.on,#gd-star .gs-steps button:hover{color:#fff}
#gd-star .gs-replay{position:absolute;right:24px;bottom:62px;appearance:none;border:1px solid rgba(255,255,255,.35);background:rgba(15,23,42,.4);color:#fff;border-radius:999px;height:34px;padding:0 14px;font:600 12px 'Hanken Grotesk',sans-serif;cursor:pointer;opacity:0;visibility:hidden;backdrop-filter:blur(4px)}
#gd-star.done .gs-label{visibility:hidden}
@media (max-width:760px){
 #gd-star{height:auto;min-height:0;max-height:none;display:flex;flex-direction:column}
 #gd-star .gs-stage{position:relative;order:2;aspect-ratio:700/576;width:100%}
 #gd-star .gs-f img{object-position:50% 50%}
 #gd-star .gs-lamp.l{left:-1%;top:47%;width:24%}
 #gd-star .gs-lamp.r{left:30%;top:49%;width:24%}
 #gd-star .gs-vig{background:linear-gradient(180deg,#141619 0%,rgba(20,22,25,0) 22%,rgba(20,22,25,0) 75%,#141619 100%)}
 #gd-star .gs-ui{display:contents}
 #gd-star .gs-eye{order:1;padding:24px 18px 0;text-align:center}
 #gd-star .gs-label{order:1;margin:10px 0 0;min-height:104px;text-align:center;padding:0 18px}
 #gd-star .gs-w{font-size:clamp(30px,9.4vw,44px);white-space:nowrap}
 #gd-star .gs-d{font-size:14px}
 #gd-star .gs-final{position:relative;order:1;left:auto;right:auto;top:auto;padding:0 18px;margin-top:-104px;min-height:104px}
 #gd-star h1{margin-top:6px;font-size:34px;line-height:1.08}
 #gd-star .gs-sub{display:none}
 #gd-star .gs-final .gs-cta{display:none}
 #gd-star .gs-steps{order:3;margin:4px 18px 0;grid-template-columns:repeat(3,1fr);row-gap:2px}
 #gd-star .gs-steps button{font-size:10.5px;text-align:center}
 #gd-star .gs-mcta{order:4;display:flex;flex-direction:column;gap:10px;padding:16px 18px 26px}
 #gd-star .gs-replay{right:12px;bottom:12px;top:auto;z-index:5}
}
@media (min-width:761px){#gd-star .gs-mcta{display:none}}
@media (prefers-reduced-motion:reduce){#gd-star .gs-f{opacity:0!important}#gd-star .gs-last{opacity:1!important}}

GDHOME_HCSS_END;
const GDHOME_HERO = <<<'GDHOME_HERO_END'
<section id="gd-star" aria-labelledby="gds-h1">
 <div class="gs-stage">
  <picture class="gs-f" data-k="0"><source media="(max-width:760px)" srcset="/wp-content/uploads/claude/hero/1-axes-m.webp?v=2"><img src="/wp-content/uploads/claude/hero/1-axes.webp?v=2" alt="" fetchpriority="high"></picture>
  <picture class="gs-f" data-k="1"><source media="(max-width:760px)" srcset="/wp-content/uploads/claude/hero/2-chassis-m.webp?v=2"><img src="/wp-content/uploads/claude/hero/2-chassis.webp?v=2" alt=""></picture>
  <picture class="gs-f" data-k="2"><source media="(max-width:760px)" srcset="/wp-content/uploads/claude/hero/3-structure-m.webp?v=2"><img src="/wp-content/uploads/claude/hero/3-structure.webp?v=2" alt=""></picture>
  <picture class="gs-f" data-k="3"><source media="(max-width:760px)" srcset="/wp-content/uploads/claude/hero/4-sieges-m.webp?v=2"><img src="/wp-content/uploads/claude/hero/4-sieges.webp?v=2" alt=""></picture>
  <picture class="gs-f" data-k="4"><source media="(max-width:760px)" srcset="/wp-content/uploads/claude/hero/5-carrosserie-m.webp?v=2"><img src="/wp-content/uploads/claude/hero/5-carrosserie.webp?v=2" alt=""></picture>
  <picture class="gs-f gs-last" data-k="5"><source media="(max-width:760px)" srcset="/wp-content/uploads/claude/hero/6-voiture-m.webp?v=2"><img src="/wp-content/uploads/claude/hero/6-voiture.webp?v=2" alt="Voiture entièrement assemblée, Garage Daytona Genève"></picture>
  <span class="gs-lamp l" aria-hidden="true"></span><span class="gs-lamp r" aria-hidden="true"></span>
  <span class="gs-vig" aria-hidden="true"></span>
 </div>
 <div class="gs-ui">
  <p class="gs-eye">Garage Daytona · Genève · Depuis 1998</p>
  <div class="gs-label" aria-live="polite"><span class="gs-n">01</span><span class="gs-w">Pneus</span><span class="gs-d">Pneus neufs et d’occasion</span></div>
  <div class="gs-final">
   <h1 id="gds-h1">Votre garage de confiance <em>à Genève.</em></h1>
   <p class="gs-sub">Mécanique, carrosserie, contrôle technique, nettoyage, pneus et vente de voitures, au même endroit.</p>
  </div>
  <div class="gs-steps" role="tablist" aria-label="Étapes">
   <span class="gs-bar"><i></i></span>
   <button type="button" data-k="0">Pneus</button><button type="button" data-k="1">Mécanique</button><button type="button" data-k="2">Contrôle</button><button type="button" data-k="3">Nettoyage</button><button type="button" data-k="4">Carrosserie</button><button type="button" data-k="5">Votre voiture</button>
  </div>
 </div>
</section>
GDHOME_HERO_END;
const GDHOME_HJS = <<<'GDHOME_HJS_END'
() => {
  const star = document.getElementById('gd-star'); if (!star) return;
  const q = s => star.querySelector(s), qa = s => [...star.querySelectorAll(s)];
  const F = qa('.gs-f'), steps = qa('.gs-steps button'), bar = q('.gs-bar i');
  const label = q('.gs-label'), fin = q('.gs-final'), lamps = qa('.gs-lamp');
  const T = [['01', 'Pneus', 'Pneus neufs et d’occasion, en stock'], ['02', 'Mécanique', 'Diagnostic, entretien et réparation'], ['03', 'Contrôle technique', 'Une préparation complète pour la visite'], ['04', 'Nettoyage', 'Un intérieur comme neuf'], ['05', 'Carrosserie', 'Réparation et peinture, normes suisses'], ['06', 'Votre voiture', 'Prête pour la route']];
  const showFinal = () => { F.forEach((f, i) => f.style.opacity = i === 5 ? 1 : 0); label.style.visibility = 'hidden'; fin.style.visibility = 'visible'; bar.style.transform = 'scaleX(1)'; steps.forEach((b, i) => b.classList.toggle('on', i === 5)); };
  if (!window.gsap || matchMedia('(prefers-reduced-motion: reduce)').matches) { showFinal(); return; }
  const g = window.gsap;
  let cur = -1;
  const setLabel = i => {
    if (i === cur) return; cur = i;
    steps.forEach((b, k) => b.classList.toggle('on', k === i));
    q('.gs-n').textContent = T[i][0]; q('.gs-d').textContent = T[i][2];
    const w = q('.gs-w'); w.innerHTML = [...T[i][1]].map(c => `<span class="ch">${c === ' ' ? '&nbsp;' : c}</span>`).join('');
    g.fromTo(w.querySelectorAll('.ch'), {yPercent: 110}, {yPercent: 0, duration: .7, ease: 'power3.out', stagger: .025});
    g.fromTo(q('.gs-d'), {opacity: 0, y: 8}, {opacity: 1, y: 0, duration: .6, delay: .15, ease: 'power2.out'});
  };
  const tl = g.timeline({paused: true});
  const HOLD = .6, XF = .55;
  const at = [];
  g.set(fin, {autoAlpha: 0}); g.set(label, {autoAlpha: 1});
  // every frame state lives in the timeline, so seeking / clicking a step always shows the right image
  tl.set(F, {opacity: 0, scale: 1}, 0);
  // 0 · wheels and axles
  at[0] = 0;
  tl.fromTo(F[0], {opacity: 0}, {opacity: 1, duration: .7, ease: 'power2.out'}, 0);
  let t = .7 + HOLD;
  // 1..5 · each part appears with a smooth dissolve, no flash, no zoom
  [1, 2, 3, 4, 5].forEach(k => { at[k] = t; tl.to(F[k], {opacity: 1, duration: XF, ease: 'power1.inOut'}, t); tl.to(F[k - 1], {opacity: 0, duration: XF, ease: 'power1.inOut'}, t); t += XF + HOLD; });
  // headlights switch on, then the title takes over
  const tL = at[5] + XF - .1;
  tl.to(lamps, {opacity: .95, duration: .08, ease: 'none'}, tL).to(lamps, {opacity: .25, duration: .08}, tL + .1).to(lamps, {opacity: .85, duration: .5, ease: 'power2.out'}, tL + .2).to(lamps, {opacity: .35, duration: 1.4, ease: 'power2.inOut'}, tL + .8);
  tl.to(label, {autoAlpha: 0, y: -10, duration: .4}, tL + .7);
  tl.fromTo(fin, {autoAlpha: 0, y: 24}, {autoAlpha: 1, y: 0, duration: .9, ease: 'power3.out'}, tL + .9);
  tl.to({}, {duration: 3.5}, tL + 1.6); // let the finished car and the title breathe before looping
  tl.eventCallback('onUpdate', () => {
    g.set(bar, {scaleX: tl.progress()});
    const tm = tl.time(); let i = 0; at.forEach((v, k) => { if (tm >= v - .01) i = k; }); setLabel(i);
  });
  // endless loop: the finished car dissolves back into the wheels, then the build starts again
  let looping = false;
  const loop = () => {
    looping = true;
    g.timeline({onComplete: () => { looping = false; cur = -1; tl.play(.7); }})
      .to(fin, {autoAlpha: 0, duration: .5}, 0)
      .to(lamps, {opacity: 0, duration: .5}, 0)
      .to(F[0], {opacity: 1, duration: .9, ease: 'power1.inOut'}, .2)
      .to(F[5], {opacity: 0, duration: .9, ease: 'power1.inOut'}, .2);
  };
  tl.eventCallback('onComplete', loop);
  steps.forEach((b, k) => b.addEventListener('click', () => { if (looping) return; tl.pause(); tl.tweenTo(k === 5 ? tl.duration() - .05 : at[k] + XF + .2, {duration: .7, ease: 'power2.inOut', onComplete: () => tl.play()}); }));
  // pause while the hero is off screen (saves battery), resume when it comes back
  if ('IntersectionObserver' in window) new IntersectionObserver(es => es.forEach(e => { if (!looping) e.isIntersecting ? (tl.progress() > 0 && tl.paused() && tl.play()) : tl.pause(); })).observe(star);
  // start once the images are ready (or after 4 s at worst)
  const imgs = F.map(f => f.querySelector('img'));
  const ready = Promise.all(imgs.map(i => i.complete ? Promise.resolve() : new Promise(r => { i.addEventListener('load', r, {once: true}); i.addEventListener('error', r, {once: true}); })));
  Promise.race([ready, new Promise(r => setTimeout(r, 4000))]).then(() => { setLabel(0); tl.play(0); });
  window.__gdHeroTl = tl;
}
GDHOME_HJS_END;
const GDHOME_JS = <<<'GDHOME_JS_END'
() => {
  const l = document.createElement('link'); l.rel = 'stylesheet';
  l.href = 'https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700&family=JetBrains+Mono:wght@500;700&family=Playfair+Display:ital,wght@0,400;1,400&display=swap';
  document.head.appendChild(l);
  const S = p => `<svg viewBox="0 0 24 24" aria-hidden="true">${p}</svg>`;
  const I = {
    arrow: S('<path d="M5 12h14M13 6l6 6-6 6"/>'),
    mech: S('<circle cx="12" cy="12" r="3.2"/><path d="M12 2.5v3M12 18.5v3M2.5 12h3M18.5 12h3M5.3 5.3l2.1 2.1M16.6 16.6l2.1 2.1M5.3 18.7l2.1-2.1M16.6 7.4l2.1-2.1"/>'),
    body: S('<path d="M3 15l2-5.5A2 2 0 017 8h10a2 2 0 011.9 1.5L21 15v3H3z"/><circle cx="7.5" cy="18" r="1.8"/><circle cx="16.5" cy="18" r="1.8"/><path d="M14 4l2 2.5M17.5 3l-.5 3"/>'),
    check: S('<rect x="5" y="3.5" width="14" height="18" rx="2"/><path d="M9 3.5h6v3H9zM8.5 12.5l2 2 4-4.5M8.5 18h7"/>'),
    clean: S('<path d="M11 3l1.9 4.8L17.5 9.5l-4.6 1.7L11 16l-1.9-4.8L4.5 9.5l4.6-1.7z"/><path d="M18 14l.8 2 2 .8-2 .8-.8 2-.8-2-2-.8 2-.8z"/>'),
    tire: S('<circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="4"/><path d="M12 3v2M12 19v2M3 12h2M19 12h2M5.6 5.6l1.4 1.4M17 17l1.4 1.4M5.6 18.4L7 17M17 7l1.4-1.4"/>'),
    key: S('<circle cx="8" cy="15" r="4.5"/><path d="M11.2 11.8L20 3M16.5 6.5l2.5 2.5M14 9l2 2"/>'),
    cash: S('<rect x="2.5" y="6" width="19" height="12" rx="2"/><circle cx="12" cy="12" r="2.6"/><path d="M6 9.5v5M18 9.5v5"/>'),
    bank: S('<path d="M3 9l9-5 9 5M4.5 9v8M9 9v8M15 9v8M19.5 9v8M3 20h18"/>'),
    phone2: S('<rect x="7" y="2.5" width="10" height="19" rx="2.2"/><path d="M11 18.5h2"/>'),
    phone: S('<path d="M5 4h3l1.5 4-2 1.3a11 11 0 006.2 6.2l1.3-2L19 15v3a2 2 0 01-2 2A14 14 0 013 6a2 2 0 012-2z"/>'),
    wa: S('<path d="M4 20l1.2-4A8 8 0 1112 20a8 8 0 01-4-1.1z"/><path d="M9 8.5c0 3.3 2.7 6.5 6.5 6.5l1-1.6-2-1-1 .9a5 5 0 01-2.8-2.8l.9-1-1-2z"/>'),
    ext: S('<path d="M14 4h6v6M20 4l-9 9M18 14v5a1 1 0 01-1 1H5a1 1 0 01-1-1V7a1 1 0 011-1h5"/>')
  };
  const G = '<svg class="g" viewBox="0 0 48 48" aria-hidden="true"><path fill="#FFC107" stroke="none" d="M43.6 20.5H42V20H24v8h11.3C33.7 32.7 29.2 36 24 36c-6.6 0-12-5.4-12-12s5.4-12 12-12c3.1 0 5.8 1.2 7.9 3.1l5.7-5.7C34.1 6.1 29.3 4 24 4 13 4 4 13 4 24s9 20 20 20 20-9 20-20c0-1.3-.1-2.4-.4-3.5z"/><path fill="#FF3D00" stroke="none" d="M6.3 14.7l6.6 4.8C14.7 15.1 19 12 24 12c3.1 0 5.8 1.2 7.9 3.1l5.7-5.7C34.1 6.1 29.3 4 24 4 16.3 4 9.7 8.3 6.3 14.7z"/><path fill="#4CAF50" stroke="none" d="M24 44c5.2 0 9.9-2 13.4-5.2l-6.2-5.2C29.2 35.1 26.7 36 24 36c-5.2 0-9.6-3.3-11.3-7.9l-6.5 5C9.5 39.6 16.2 44 24 44z"/><path fill="#1976D2" stroke="none" d="M43.6 20.5H42V20H24v8h11.3c-.8 2.2-2.2 4.2-4.1 5.6l6.2 5.2C37 39.2 44 34 44 24c0-1.3-.1-2.4-.4-3.5z"/></svg>';
  const $ = s => document.querySelector(s), el = id => $(`.elementor-element-${id}`);
  const REV = 'https://search.google.com/local/reviews?placeid=ChIJtycs_S5ljEcRgKkJBi7DhP4';
  const wa = 'https://wa.me/41799198647?text=' + encodeURIComponent('Bonjour, je souhaite prendre rendez-vous.');
  const svc = [
    ['mech', 'Mécanique', 'Entretien, diagnostic, réparation et géométrie.', 'Diagnostic dès 100 CHF', '/mecanique/'],
    ['body', 'Carrosserie', 'Réparation et peinture, prise en charge avec votre assurance.', 'Diagnostic gratuit', '/carrosserie/'],
    ['check', 'Contrôle technique', 'Préparation complète et transport au centre de contrôle.', 'Préparation 300 CHF', '/controle-technique-ocv/'],
    ['clean', 'Nettoyage détaillé', 'Un intérieur impeccable, frais et parfumé.', 'Dès 150 CHF', '/nettoyage-detaille/'],
    ['tire', 'Pneus d’occasion', 'Pneus d’occasion en stock, toutes tailles.', 'Voir le stock', '/pneus-occasion/'],
    ['key', 'Vente de voitures', 'Voitures d’occasion certifiées, stock renouvelé.', 'Voir les voitures', '/vente-de-voitures/']
  ];
  // the garage's own figures (shown on their current homepage)
  const stats = [[28, '', 'Ans d’expérience'], [5.5, 'k', 'Véhicules réparés'], [789, '', 'Clients fidèles'], [94, '%', 'De satisfaction client']];
  // three real Google reviews, quoted as written
  const reviews = [
    ['Nous sommes clients depuis plus de 6 ans et sommes entièrement satisfaits des travaux effectués sur nos 2 véhicules. Une équipe sympathique et sérieuse.', 'Fabienne Racine', 'Juin 2025'],
    ['Belle voiture à bon prix, chef compétent qui tient sa parole et qui traite rapidement les préoccupations du client. Un grand merci !', 'Franziska Schatzmann', 'Juillet 2024'],
    ['Garage très professionnel à prix attractifs, disponible et à l’écoute des clients.', 'Pierre Burri', 'Août 2022']
  ];
  const html = `
  <div class="gh gh-trust"><div class="gh-tr"><a href="${REV}" target="_blank" rel="noopener"><span class="gh-stars">★★★★☆</span><b>4/5</b> · 42 avis Google</a><span class="sep">|</span><span><b>28 ans</b> d’expérience</span><span class="sep">|</span><span>Rue de Lausanne 64-66, Genève</span></div></div>
  <section class="gd-vy" id="nos-services" aria-label="Nos services"></section>
  <section class="gh gh-stats"><div class="gh-in"><span class="gh-eye gd-rv">Statistiques</span><h2 class="gh-h gd-rv">Les chiffres parlent d’eux-mêmes</h2><p class="gh-lead gd-rv">Une expertise forgée par les années et la passion de la mécanique.</p><div class="gh-sts">
    ${stats.map(s => `<div class="gh-st gd-rv"><b data-n="${s[0]}" data-s="${s[1]}">0<small>${s[1]}</small></b><span>${s[2]}</span></div>`).join('')}
  </div></div></section>
  <section class="gh gh-rev"><div class="gh-in gh-c"><span class="gh-eye gd-rv">Avis Google</span><h2 class="gh-h gd-rv">Ce que disent nos clients</h2><a class="gh-rsum gd-rv" href="${REV}" target="_blank" rel="noopener" style="text-decoration:none">${G}<b>4/5</b><span class="gh-stars">★★★★☆</span><span>42 avis</span></a><div class="gh-rg" style="text-align:left">
    ${reviews.map((r, i) => `<figure class="gh-r gd-rv" style="margin:0;transition-delay:${i * 80}ms"><span class="s">★★★★★</span><q>${r[0]}</q><figcaption class="who"><i>${r[1][0]}</i><span><b>${r[1]}</b>${r[2]} · Google</span></figcaption></figure>`).join('')}
  </div><div class="gh-rmore gd-rv"><a class="gh-btn o" href="${REV}" target="_blank" rel="noopener">${G}Voir tous les avis ${I.ext}</a></div></div></section>
  <section class="gh gh-tp"><div class="gh-tg">
    <a class="gh-tire gd-rv" href="/pneus-occasion/"><img class="wheel" src="/wp-content/uploads/claude/atelier/pneu-sport.webp" alt="" loading="lazy" decoding="async"><span class="gh-eye">En stock</span><h3>Pneus neufs et d’occasion</h3><p>Un large stock de pneus disponibles au garage. Trouvez la bonne taille et le bon prix.</p><span class="go">Voir les pneus ${I.arrow}</span></a>
    <div class="gh-pay gd-rv"><span class="gh-eye">Paiement</span><h3>Modes de paiement acceptés</h3><p>Tous les services sont payés avant ou lors de la restitution du véhicule.</p><ul class="gh-pm"><li><i>${I.cash}</i>Espèces</li><li><i>${I.bank}</i>Virement bancaire (IBAN)</li><li><i>${I.phone2}</i>Twint</li></ul></div>
  </div></section>
`;
  const host = document.createElement('div'); host.innerHTML = html;
  const ref = el('4f990c01'); [...host.children].forEach(n => ref.parentNode.insertBefore(n, ref));
  // count-up for the figures
  const count = b => { const n = +b.dataset.n, s = b.dataset.s, dec = n % 1 ? 1 : 0, t0 = performance.now(), d = 1800;
    const f = t => { const k = Math.min(1, (t - t0) / d), e = 1 - Math.pow(1 - k, 3), v = (n * e).toFixed(dec); b.innerHTML = `${v}<small>${s}</small>`; if (k < 1) requestAnimationFrame(f); }; requestAnimationFrame(f); };
  const io = new IntersectionObserver(es => es.forEach(e => { if (!e.isIntersecting) return; e.target.classList.add('in'); const b = e.target.querySelector && e.target.querySelector('b[data-n]'); if (b) count(b); io.unobserve(e.target); }), {rootMargin: '0px 0px -8% 0px'});
  document.querySelectorAll('.gd-rv').forEach(n => io.observe(n));
}
GDHOME_JS_END;
const GDHOME_VJS = <<<'GDHOME_VJS_END'
() => {
  // prices saved in the control panel (/gestion/) replace the built-in ones
  const GPX = (window.GD_PRICES && window.GD_PRICES.items) || null;
  const PXv = (id, fb) => { const x = GPX && GPX.find(y => y.id === id); return x ? String(x.p).replace('.', ',') + ' CHF' : fb; };
  const PX = (id, fb) => { const x = GPX && GPX.find(y => y.id === id); if (!x) return fb; const u = (x.u || '').replace(/^par /, ''); return (x.d ? 'dès ' : '') + String(x.p).replace('.', ',') + ' CHF' + (u ? ' / ' + u : ''); };
  const VOY_HTML = `<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <defs>
    <symbol id="i-eng" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3.2"/><path d="M12 2.5v3M12 18.5v3M2.5 12h3M18.5 12h3M5.3 5.3l2.1 2.1M16.6 16.6l2.1 2.1M5.3 18.7l2.1-2.1M16.6 7.4l2.1-2.1"/></g></symbol>
    <symbol id="i-brk" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3.2"/><path d="M12 2.5v3M12 18.5v3M2.5 12h3M18.5 12h3M5.3 5.3l2.1 2.1M16.6 16.6l2.1 2.1M5.3 18.7l2.1-2.1M16.6 7.4l2.1-2.1"/></g></symbol>
    <symbol id="i-tpm" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="4"/><path d="M12 3v2M12 19v2M3 12h2M19 12h2M5.6 5.6l1.4 1.4M17 17l1.4 1.4M5.6 18.4L7 17M17 7l1.4-1.4"/></g></symbol>
    <symbol id="i-body" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 15l2-5.5A2 2 0 017 8h10a2 2 0 011.9 1.5L21 15v3H3z"/><circle cx="7.5" cy="18" r="1.8"/><circle cx="16.5" cy="18" r="1.8"/><path d="M14 4l2 2.5M17.5 3l-.5 3"/></g></symbol>
    <symbol id="i-seat" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M11 3l1.9 4.8L17.5 9.5l-4.6 1.7L11 16l-1.9-4.8L4.5 9.5l4.6-1.7z"/><path d="M18 14l.8 2 2 .8-2 .8-.8 2-.8-2-2-.8 2-.8z"/></g></symbol>
    <symbol id="i-ocv" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="3.5" width="14" height="18" rx="2"/><path d="M9 3.5h6v3H9zM8.5 12.5l2 2 4-4.5M8.5 18h7"/></g></symbol>
    <symbol id="i-oil" viewBox="0 0 32 32"><path fill="currentColor" d="M4 12h5l2-2h6l2 2 9-3-6 9H9l-2-3H4zM27 18c0 1.5-1 2.5-2 2.5S23 19.5 23 18s2-4 2-4 2 2.5 2 4z"/></symbol>
    <symbol id="i-bat" viewBox="0 0 32 32"><g fill="none" stroke="currentColor" stroke-width="2.3" stroke-linejoin="round"><rect x="4" y="10" width="24" height="15" rx="1.5"/><path d="M8 10V7h4v3M20 10V7h4v3M8 17h5M19 17h5M21.5 14.5v5"/></g></symbol>
    <symbol id="i-abs" viewBox="0 0 32 32"><g fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><circle cx="16" cy="16" r="9.5"/><path d="M5 8a14 14 0 0 0 0 16M27 8a14 14 0 0 1 0 16"/></g><text x="16" y="19.5" text-anchor="middle" font-family="Arial,sans-serif" font-weight="700" font-size="8.5" fill="currentColor">ABS</text></symbol>
    <symbol id="i-key" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="15" r="4.5"/><path d="M11.2 11.8L20 3M16.5 6.5l2.5 2.5M14 9l2 2"/></g></symbol>
    <radialGradient id="gface" cx="50%" cy="45%" r="60%"><stop offset="0" stop-color="#18213a"/><stop offset="1" stop-color="#0a0f1c"/></radialGradient>
  </defs>
</svg>
  <div class="amb" aria-hidden="true"></div>
  <div class="wrap">
    <div class="vy-hd">
      <p class="eyebrow">Nos services</p>
      <h2>Qu’est-ce qui ne va pas avec votre voiture ?</h2>
      <p>Démarrez la voiture et dites à l’écran ce qui ne va pas. Il vous indique quoi faire, quel service et quel prix, puis vous écrivez au garage en un geste.</p>
    </div>
    <div class="ask">
      <h3>Demandez à notre assistant intelligent</h3>
      <span class="arw" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 4v15M6 13l6 6 6-6"/></svg></span>
    </div>

    <div class="cl off" id="cl">
      <button class="start" id="start" type="button" aria-label="Démarrer"><span>ENGINE<b>START</b>STOP</span></button>
      <div class="cl-row">
        <svg class="gauge g1" id="tach" viewBox="0 0 300 300" aria-hidden="true"></svg>
        <div class="lcd" id="scr" aria-live="polite">
          <div class="lcd-top"><span id="ttl">DAYTONA</span><span id="clock">--:--</span></div>
          <div class="view" id="view"></div>
          <nav class="dock" aria-label="Écran">
            <button type="button" id="dHome"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"><path d="M4 11l8-7 8 7v9h-5v-6H9v6H4z"/></svg>Accueil</button>
            <a id="dMap" target="_blank" rel="noopener" href="#"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"><path d="M12 21s-7-6.2-7-11.5A7 7 0 0 1 19 9.5C19 14.8 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.5"/></svg>Itinéraire</a>
            <a id="dWa" target="_blank" rel="noopener" href="https://wa.me/41799198647"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"><path d="M4 20l1.3-3.9A8 8 0 1 1 8 19z"/></svg>WhatsApp</a>
          </nav>
        </div>
        <svg class="gauge g2" id="speedo" viewBox="0 0 300 300" aria-hidden="true"></svg>
      </div>
      <div class="tt" id="tt" aria-hidden="true"></div>
    </div>

    <p class="hint" style="margin-top:28px">Les prix affichés sont ceux du garage. Le diagnostic final se fait à l’atelier.</p>
  </div>
`;
  const host = document.getElementById('nos-services'); if (!host) return;
  host.innerHTML = VOY_HTML;
  const WA = '41799198647';
  const MAP = 'https://www.google.com/maps/search/?api=1&query=' + encodeURIComponent('Garage Daytona, Rue de Lausanne 64-66, Genève');
  // symptom → service (texts and prices from the garage's own pages)
  const S = [
    {k: 'eng', c: '--amber', t: 'Voyant moteur', d: 'allumé ou clignotant', svc: 'Mécanique', pg: '/mecanique/', price: 'Diagnostic ' + PX('diag', '100 CHF'), a: 'Lecture des codes défaut, diagnostic complet, devis avant réparation.',
      msg: 'Bonjour, le voyant moteur de ma voiture est allumé. Quand puis-je passer pour un diagnostic ?'},
    {k: 'brk', c: '--red', t: 'Bruit au freinage', d: 'grincement, vibration', svc: 'Mécanique', pg: '/mecanique/', price: 'Diagnostic ' + PX('diag', '100 CHF'), a: 'Contrôle des plaquettes, des disques et du liquide de frein.',
      msg: 'Bonjour, j’entends un bruit sur ma voiture. Pouvez-vous la contrôler ?'},
    {k: 'tpm', c: '--amber', t: 'Pneus', d: 'usés ou pression basse', svc: 'Pneus d’occasion', pg: '/pneus-occasion/', price: 'Voir le stock', a: 'Pneus neufs et d’occasion en stock, toutes tailles.',
      msg: 'Bonjour, j’ai besoin de pneus pour ma voiture. Avez-vous ma taille en stock ?'},
    {k: 'body', c: '--pink', t: 'Rayure ou choc', d: 'carrosserie abîmée', svc: 'Carrosserie', pg: '/carrosserie/', price: 'Diagnostic gratuit', a: 'Réparation et peinture, prise en charge avec votre assurance.',
      msg: 'Bonjour, ma voiture a un dégât sur la carrosserie. Puis-je venir pour un diagnostic ?'},
    {k: 'seat', c: '--blue', t: 'Intérieur sale', d: 'taches, odeurs', svc: 'Nettoyage détaillé', pg: '/nettoyage-detaille/', price: 'Dès ' + PXv('net_in', '150 CHF'), a: 'Un intérieur impeccable, frais et parfumé.',
      msg: 'Bonjour, je souhaite un nettoyage détaillé de l’intérieur de ma voiture. Quelles sont vos disponibilités ?'},
    {k: 'ocv', c: '--green', t: 'Contrôle OCV', d: 'convocation reçue', svc: 'Contrôle technique', pg: '/controle-technique-ocv/', price: 'Préparation ' + PXv('ocv_prep', '300 CHF'), a: 'Préparation complète et transport au centre de contrôle.',
      msg: 'Bonjour, j’ai reçu ma convocation au contrôle technique. Pouvez-vous préparer ma voiture ?'}
  ];
  // one follow-up question per symptom: the answer sets urgency (0 faible · 1 moyenne · 2 élevée) and completes the WhatsApp text
  const F = [
    {q: 'Le voyant est-il fixe ou clignotant ?', o: [
      {l: 'Fixe', u: 1, t: 'Prenez rendez-vous rapidement pour un diagnostic.', m: 'Le voyant est fixe.'},
      {l: 'Clignotant', u: 2, t: 'Limitez vos trajets et contactez-nous au plus vite.', m: 'Le voyant clignote.'}]},
    {q: 'Quand entendez-vous le bruit ?', o: [
      {l: 'En freinant', u: 2, t: 'Les freins touchent à votre sécurité : passez dès que possible.', m: 'Le bruit apparaît au freinage.'},
      {l: 'En roulant', u: 1, t: 'Un contrôle à l’atelier permettra d’en trouver l’origine.', m: 'Le bruit apparaît en roulant.'}]},
    {q: 'Que vous faut-il ?', o: [
      {l: 'Des pneus', u: 0, t: 'Envoyez-nous la taille inscrite sur le flanc du pneu.', m: ''},
      {l: 'Voyant de pression', u: 1, t: 'Passez au garage pour un contrôle des pneus.', m: 'Le voyant de pression des pneus est allumé.'}]},
    {q: 'Quelle est l’importance du dégât ?', o: [
      {l: 'Rayure légère', u: 0, t: 'Nous vous montrons sur place ce qui peut être fait.', m: 'Il s’agit d’une rayure légère.'},
      {l: 'Choc important', u: 1, t: 'Nous vous accompagnons dans les démarches avec votre assurance.', m: 'Il s’agit d’un choc important.'}]},
    {q: 'Que souhaitez-vous ?', o: [
      {l: 'Taches, odeurs', u: 0, t: 'Votre intérieur retrouve un aspect net et frais.', m: 'L’intérieur a des taches ou des odeurs.'},
      {l: 'Avant une vente', u: 0, t: 'Une voiture propre se présente mieux à l’acheteur.', m: 'C’est avant la vente de la voiture.'}]},
    {q: 'Quand a lieu votre contrôle ?', o: [
      {l: 'Dans plus d’un mois', u: 0, t: 'Nous préparons votre voiture à l’avance, sans stress.', m: 'Le contrôle a lieu dans plus d’un mois.'},
      {l: 'Dans moins d’un mois', u: 1, t: 'Contactez-nous vite pour réserver la préparation.', m: 'Le contrôle a lieu dans moins d’un mois.'}]}
  ];
  const UR = [.17, .5, .83], URT = ['Faible', 'Moyenne', 'Élevée'], URC = ['--green', '--amber', '--red'];

  const $ = id => document.getElementById(id);
  const NS = 'http://www.w3.org/2000/svg';
  const el = (tag, at, parent) => { const e = document.createElementNS(NS, tag); for (const k in at) e.setAttribute(k, at[k]); parent && parent.appendChild(e); return e; };
  const pt = (a, r) => [150 + r * Math.cos(a * Math.PI / 180), 150 + r * Math.sin(a * Math.PI / 180)];
  const A0 = 135, SW = 270;
  const css = v => getComputedStyle(host).getPropertyValue(v).trim();
  const g = window.gsap, reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
  const icon = (k, cls = '') => `<svg class="${cls}"><use href="#i-${k}"/></svg>`;

  // ---------- dials ----------
  function dial(svg, max, major, minor, redFrom, unit, labelFn) {
    el('circle', {cx: 150, cy: 150, r: 146, class: 'face'}, svg);
    el('circle', {cx: 150, cy: 150, r: 146, class: 'rim'}, svg);
    el('circle', {cx: 150, cy: 150, r: 138, class: 'glow'}, svg);
    if (redFrom != null) { const [x1, y1] = pt(A0 + SW * redFrom / max, 126), [x2, y2] = pt(A0 + SW, 126); el('path', {d: `M${x1} ${y1}A126 126 0 0 1 ${x2} ${y2}`, class: 'redarc'}, svg); }
    for (let v = 0; v <= max + 1e-6; v += minor) {
      const maj = Math.abs(v / major - Math.round(v / major)) < 1e-6, a = A0 + SW * v / max, red = redFrom != null && v >= redFrom;
      const [x1, y1] = pt(a, maj ? 112 : 118), [x2, y2] = pt(a, 130);
      el('line', {x1, y1, x2, y2, class: 'tk' + (maj ? '' : ' s') + (red ? ' r' : '')}, svg);
      if (maj) { const [tx, ty] = pt(a, 92); el('text', {x: tx, y: ty, class: 'num' + (red ? ' r' : '')}, svg).textContent = labelFn(v); }
    }
    el('text', {x: 150, y: 196, class: 'unit'}, svg).textContent = unit;
    const n = el('g', {}, svg);
    el('path', {d: 'M146 150 L148.5 34 L151.5 34 L154 150 Z', class: 'ndl'}, n);
    el('circle', {cx: 150, cy: 150, r: 15, class: 'hub'}, svg);
    return n;
  }
  const tachN = dial($('tach'), 8, 1, .5, 6.5, 'TR/MIN ×1000', v => v);
  const spdN = dial($('speedo'), 260, 20, 10, null, 'KM/H', v => v % 40 === 0 ? v : '');
  const angle = f => -135 + 270 * f;
  const N = {t: 0, s: 0};
  const draw = () => { tachN.setAttribute('transform', `rotate(${angle(N.t)} 150 150)`); spdN.setAttribute('transform', `rotate(${angle(N.s)} 150 150)`); };
  draw();
  // urgency face over the speedometer
  const urg = el('g', {opacity: 0}, null); $('speedo').insertBefore(urg, spdN);
  el('circle', {cx: 150, cy: 150, r: 141, fill: 'url(#gface)'}, urg);
  [0, 1, 2].forEach(i => { const [x1, y1] = pt(A0 + SW * i / 3 + 2, 120), [x2, y2] = pt(A0 + SW * (i + 1) / 3 - 2, 120); el('path', {d: `M${x1} ${y1}A120 120 0 0 1 ${x2} ${y2}`, fill: 'none', stroke: css(URC[i]), 'stroke-width': 12, 'stroke-linecap': 'round', opacity: .85}, urg); });
  URT.forEach((w, i) => { const [x, y] = pt(A0 + SW * (i + .5) / 3, 88); el('text', {x, y, class: 'num', style: 'font-size:12px;letter-spacing:.12em'}, urg).textContent = w.toUpperCase(); });
  el('text', {x: 150, y: 196, class: 'unit'}, urg).textContent = 'URGENCE';
  const showUrg = on => g ? g.to(urg, {attr: {opacity: on ? 1 : 0}, duration: .5}) : urg.setAttribute('opacity', on ? 1 : 0);

  // tell-tales
  const TT = [...S.map(s => ({k: s.k, c: s.c})), {k: 'oil', c: '--red'}, {k: 'bat', c: '--red'}, {k: 'abs', c: '--amber'}];
  $('tt').innerHTML = TT.map(o => `<svg data-k="${o.k}" style="--c:var(${o.c})"><use href="#i-${o.k}"/></svg>`).join('');
  const lights = [...$('tt').children];

  // clock
  // garage clock: always Geneva time, whatever the visitor's time zone
  const tick = () => { try { $('clock').textContent = new Intl.DateTimeFormat('fr-CH', {hour: '2-digit', minute: '2-digit', hour12: false, timeZone: 'Europe/Zurich'}).format(new Date()); } catch (e) { const d = new Date(); $('clock').textContent = String(d.getHours()).padStart(2, '0') + ':' + String(d.getMinutes()).padStart(2, '0'); } };
  tick(); setInterval(tick, 30000);

  // ---------- smart screen ----------
  const view = $('view'), vy = host, cl = $('cl');
  $('dMap').href = MAP;
  let run = 0, typing = [];
  const killTyping = () => { typing.forEach(t => t.kill()); typing = []; };
  const type = (node, text, delay = 0) => new Promise(res => {
    if (!node) return res();
    if (!g || reduce) { node.textContent = text; return res(); }
    const o = {i: 0};
    typing.push(g.to(o, {i: text.length, duration: Math.max(.2, text.length * .018), delay, ease: 'none', onUpdate: () => { node.textContent = text.slice(0, Math.round(o.i)); }, onComplete: res}));
  });
  function go(html, dir = 1) {
    killTyping(); run++;
    view.innerHTML = html;
    if (g && !reduce) g.fromTo(view, {opacity: 0, x: 28 * dir}, {opacity: 1, x: 0, duration: .38, ease: 'power3.out'});
    return run;
  }
  const back = `<button type="button" class="bk" id="bk" aria-label="Retour"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 5l-7 7 7 7"/></svg></button>`;
  const setAmb = c => host.style.setProperty('--a', c ? css('--wine') : 'rgba(0,0,0,0)'); // one accent colour for the whole section
  const blip = () => { if (g && !reduce) g.timeline().to(N, {t: .62, duration: .35, ease: 'power2.out', onUpdate: draw}).to(N, {t: .11, duration: .9, ease: 'power2.inOut', onUpdate: draw}); };

  // ---------- knowledge base: everything the garage's own pages say (FR answers, FR/EN/DE keywords) ----------
  const CAT = {
    mec: {n: 'Mécanique', k: 'eng', pg: '/mecanique/'},
    pne: {n: 'Pneus', k: 'tpm', pg: '/pneus-occasion/'},
    car: {n: 'Carrosserie', k: 'body', pg: '/carrosserie/'},
    ocv: {n: 'Contrôle technique', k: 'ocv', pg: '/controle-technique-ocv/'},
    net: {n: 'Nettoyage', k: 'seat', pg: '/nettoyage-detaille/'},
    ven: {n: 'Vente de voitures', k: 'key', pg: '/vente-de-voitures/'},
    inf: {n: 'Infos pratiques', k: 'ocv', pg: '/contact/'}
  };
  const KB = [
    {c: 'mec', t: 'Voyant moteur allumé', diag: 0, kw: 'voyant moteur|check engine|engine light|motorkontrolle|motorleuchte|voyant'},
    {c: 'mec', t: 'Bruit au freinage', diag: 1, kw: 'frein|freinage|plaquette|disque|brake|bremse|grince|grincement|vibration'},
    {c: 'mec', t: 'Diagnostic électronique et mécanique', p: [['Diagnostic', PX('diag', '100 CHF')]], a: 'Lecture des codes défaut et contrôle mécanique de votre véhicule. Un prix clair vous est donné avant chaque intervention.', kw: 'diagnostic|diag|panne|probleme|bruit|valise|code defaut|electronique|diagnose|fehler|problem|noise'},
    {c: 'mec', t: 'Géométrie', p: [['Géométrie', PX('geo', '220 CHF')]], a: 'Réglage de la géométrie de votre voiture, utile si elle tire d’un côté ou si les pneus s’usent de façon irrégulière.', kw: 'geometrie|parallelisme|alignement|tire a gauche|tire a droite|volant|alignment|achsvermessung|spur'},
    {c: 'mec', t: 'Main-d’œuvre', p: [['Main-d’œuvre', PX('mo', '120 CHF / heure')]], a: 'Tarif horaire de l’atelier pour les réparations.', kw: 'main d oeuvre|main doeuvre|tarif horaire|par heure|reparation|repair|labour|labor|stundensatz|reparatur|prix reparation'},
    {c: 'mec', t: 'Niveaux, huile et lave-glace', p: [['Contrôle complet des niveaux', PX('niv', '60 CHF')], ['Huile moteur (1 L)', PX('huile', '24,90 CHF')], ['Lave-glace (1 L)', PX('lave', '7,90 CHF')]], a: 'Nous contrôlons et complétons tous les niveaux de votre voiture. Pour un entretien complet, écrivez-nous pour un prix adapté à votre véhicule.', kw: 'niveau|niveaux|huile|vidange|entretien|oil|oel|liquide|lave glace|wischwasser|scheibenwaschanlage|wartung|maintenance'},
    {c: 'mec', t: 'Batterie', p: [['Recharge de batterie', PX('batch', '30 CHF')], ['Batterie de démarrage', PX('bat', 'dès 200 CHF')]], a: 'Recharge ou remplacement de la batterie. Le prix d’une batterie neuve dépend du type de voiture.', kw: 'batterie|battery|demarre pas|ne demarre|plat|a plat|starthilfe|springt nicht an|accu'},
    {c: 'mec', t: 'Déplacement et dépannage', p: [['Déplacement / dépannage', PX('dep', '50 CHF')]], a: 'Votre voiture ne roule plus ? Nous nous déplaçons jusqu’à vous.', kw: 'depannage|panne|en panne|bloque|route|deplacement|breakdown|tow|stuck|pannenhilfe|abschlepp|panne route'},
    {c: 'mec', t: 'Ampoules et éclairage', p: [['Ampoule H7', PX('h7', '22,90 CHF')]], a: 'Remplacement des ampoules et contrôle de l’éclairage.', kw: 'ampoule|phare|feu|lumiere|eclairage|bulb|headlight|light|birne|lampe|scheinwerfer'},
    {c: 'mec', t: 'Pièces sur demande', a: 'Nous fournissons tout type de pièce sur demande. Écrivez-nous la pièce et le modèle de votre voiture.', kw: 'piece|pieces|piece detachee|part|parts|ersatzteil|teil'},
    {c: 'pne', t: 'Pneus d’occasion en stock', a: 'Jeux complets de pneus de marque, été et hiver, avec ou sans jantes, contrôlés par nos mécaniciens. Prix fixe par jeu. Cherchez votre taille sur la page, réservez en ligne ou sur WhatsApp et payez au garage.', pgl: true, kw: 'pneu|pneus|occasion|stock|hiver|ete|jantes|taille|tire|tyre|winter|summer|reifen|sommerreifen|winterreifen|felgen'},
    {c: 'pne', t: 'Changement et montage', p: [['Changement de pneus', PX('pneus', '120 CHF')], ['Montage et équilibrage', PX('equil', '30 CHF / pneu')], ['Changement de roue complet', PX('roue', '60 CHF')], ['Montage de roue complet', PX('monte', '60 CHF')]], a: 'Changement de pneus, montage et équilibrage à l’atelier.', kw: 'montage|monter|equilibrage|changement|changer|roue|roues|swap|change tires|mounting|balancing|reifenwechsel|wechsel|montieren|wuchten'},
    {c: 'pne', t: 'Gardiennage des pneus', p: [['Gardiennage', PX('gard', '60 CHF')]], a: 'Nous gardons votre jeu de pneus été ou hiver en sécurité jusqu’au prochain changement.', kw: 'gardiennage|garder mes pneus|store my|store tires|tire storage|stocker mes pneus|garder|stockage|stocker|hotel|entreposer|storage|store|einlagerung|lagern|aufbewahren'},
    {c: 'pne', t: 'Usure des pneus', a: 'En Suisse, la profondeur minimale légale est de 1,6 mm. Le TCS recommande au moins 4 mm pour les pneus d’hiver.', kw: 'usure|use|profondeur|profil|sculpture|legal|mm|tread|depth|profiltiefe|abgefahren'},
    {c: 'car', t: 'Carrosserie et peinture', p: [['Diagnostic', 'gratuit']], a: 'Réparation de la carrosserie de tous types de véhicules, endommagés ou accidentés, et peinture automobile en cabine.', kw: 'carrosserie|rayure|choc|bosse|accident|peinture|pare choc|scratch|dent|paint|body|bodywork|kratzer|delle|unfall|lack|karosserie|beule'},
    {c: 'car', t: 'Prise en charge de l’assurance', a: 'Votre véhicule est assuré ? Confiez-le-nous : nous prenons en charge l’ensemble des démarches avec votre compagnie d’assurance.', kw: 'assurance|assure|sinistre|constat|insurance|claim|versicherung|schaden'},
    {c: 'car', t: 'Voiture de remplacement', a: 'Si votre véhicule reste longtemps en réparation, nous mettons une voiture de remplacement à votre disposition.', kw: 'remplacement|voiture de remplacement|pret|courtoisie|replacement|loaner|courtesy|ersatzwagen|ersatzauto'},
    {c: 'ocv', t: 'Préparation au contrôle technique', p: [['Préparation complète', PX('ocv_prep', '300 CHF')]], a: 'Inspection mécanique et visuelle : fluides, freins, pneus, éclairage et sécurité générale, avant la visite. Un contrôle est recommandé tous les 3 ans.', kw: 'controle technique|controle|ocv|expertise|convocation|visite|mfk|inspection|vorfuhrung|vorfuehrung|pruefung|prufung|technical inspection'},
    {c: 'ocv', t: 'Transport au centre de contrôle', p: [['Transport aller-retour', PX('ocv_move', '100 CHF')]], a: 'Nous emmenons votre véhicule au centre de contrôle et vous le ramenons.', kw: 'transport|aller retour|emmener|centre de controle|chercher|abholen|pick up|pickup'},
    {c: 'net', t: 'Nettoyage détaillé', p: [['Nettoyage intérieur détaillé', PX('net_in', 'dès 150 CHF')], ['Nettoyage détaillé et lavage complet', PX('net_full', '210 CHF')]], a: 'Sièges et tapis, tableau de bord, vitres et plafonnier : un intérieur impeccable, frais et parfumé.', kw: 'nettoyage|nettoyer|propre|sale|tache|taches|odeur|interieur|siege|tapis|cleaning|clean|detailing|dirty|reinigung|innenreinigung|sauber|schmutzig'},
    {c: 'net', t: 'Lavage', p: [['Nettoyage / lavage', PX('lavage', '50 CHF')]], a: 'Lavage de votre voiture à l’atelier. Le nettoyage est offert avec tout service réalisé au garage.', kw: 'lavage|laver|wash|waschen|offert|gratuit nettoyage'},
    {c: 'ven', t: 'Voitures d’occasion', a: 'Voitures d’occasion certifiées, stock régulièrement mis à jour. Consultez les voitures disponibles sur la page.', pgl: true, kw: 'acheter|achat|acheter une voiture|voitures d occasion|vente|vendez|buy|buy a car|used car|cars for sale|kaufen|gebrauchtwagen|stock voitures'},
    {c: 'ven', t: 'Essai sur place', a: 'Venez essayer la voiture qui vous intéresse au garage, du lundi au vendredi de 07:30 à 17:00.', kw: 'essai|essayer|test|test drive|probefahrt|rouler'},
    {c: 'ven', t: 'Reprise et échange', a: 'Nous reprenons votre voiture selon son état, sa marque et son kilométrage, ou l’échangeons contre un véhicule de notre stock. Estimation gratuite au garage.', kw: 'reprise|echange|vendre ma voiture|estimation|trade in|sell my car|inzahlung|verkaufen|tausch'},
    {c: 'ven', t: 'Leasing', a: 'Le paiement en plusieurs fois est possible pour l’achat d’un véhicule, par leasing avec Cembra Money Bank. Il ne s’applique pas aux services mécaniques.', kw: 'leasing|credit|financement|plusieurs fois|mensualite|echelonne|finance|installment|ratenzahlung|finanzierung|cembra'},
    {c: 'inf', t: 'Horaires', live: true, a: 'Lundi – vendredi : 07:30 – 17:00. Samedi – dimanche : sur rendez-vous.', kw: 'horaire|horaires|heure|ouvert|ouverture|ferme|samedi|dimanche|week end|weekend|open|hours|opening|saturday|sunday|offnungszeiten|geoffnet|samstag|sonntag'},
    {c: 'inf', t: 'Adresse', a: 'Rue de Lausanne 64-66, 1202 Genève.', map: true, kw: 'adresse|ou est le garage|ou est|ou etes vous|ou etes|vous etes ou|ou se trouve|trouver|itineraire|plan|geneve|address|where|location|adresse|wo|standort|anfahrt'},
    {c: 'inf', t: 'Téléphone et contact', a: 'Fixe : +41 22 732 98 37 · Mobile : +41 79 561 86 47 · WhatsApp : +41 79 919 86 47 · E-mail : garage-daytona@bluewin.ch', kw: 'telephone|tel|appeler|numero|contact|email|mail|whatsapp|phone|call|number|telefon|anrufen|nummer'},
    {c: 'inf', t: 'Modes de paiement', a: 'Espèces, virement (IBAN) et Twint. Les services sont payés avant ou lors de la restitution du véhicule.', kw: 'paiement|payer|twint|carte|especes|cash|iban|virement|payment|pay|card|bezahlen|zahlung|karte|bar'},
    {c: 'inf', t: 'Langues', a: 'Notre équipe vous accueille et vous conseille en français, en anglais et en allemand.', kw: 'langue|langues|anglais|allemand|english|german|language|speak|sprache|deutsch|englisch'},
    {c: 'inf', t: 'Prendre rendez-vous', a: 'Écrivez-nous sur WhatsApp ou appelez-nous : notre équipe vous répond et fixe le rendez-vous avec vous.', kw: 'rendez vous|rdv|reserver|reservation|appointment|book|booking|termin|buchen'},
    {c: 'inf', t: 'Le garage', a: 'Garage Daytona est à Genève depuis 1998, soit 28 ans d’expérience : réparation, entretien, diagnostic, carrosserie et vente de voitures, avec une équipe de professionnels qualifiés.', kw: 'garage|daytona|experience|depuis|depuis quand|combien d annees|annees|ans|ancien|since when|how long|been open|have you been|years|seit wann|jahre|about|team|equipe|1998|sedra|qui etes vous'},
    {c: 'inf', t: 'Nos prix', p: [['Diagnostic mécanique', PX('diag', '100 CHF')], ['Diagnostic carrosserie', 'gratuit'], ['Main-d’œuvre', PX('mo', '120 CHF / heure')]], a: 'Nos prix sont clairs et affichés sur le site. Avant chaque intervention, vous recevez un prix adapté à votre voiture, sans surprise.', kw: 'cher|chere|chers|pas cher|bon marche|couteux|abordable|vos prix|vos tarifs|les prix|tarif|tarifs|devis|expensive|cheap|price|prices|cost|quote|teuer|billig|preise|kosten|angebot'},
    {c: 'inf', t: 'Toutes marques', a: 'Nous réparons la carrosserie de tous types de véhicules. Pour la mécanique, écrivez-nous la marque et le modèle de votre voiture.', kw: 'marque|marques|toutes marques|modele|brand|brands|all makes|marke|marken|bmw|audi|mercedes|volkswagen|vw|toyota|renault|peugeot|fiat|ford|opel|skoda|tesla|porsche|citroen|nissan|hyundai|kia'},
    {c: 'inf', t: 'Bonjour', a: 'Bonjour et bienvenue chez Garage Daytona ! Posez-moi votre question : prix, services, horaires, adresse… je vous réponds tout de suite.', hi: true, kw: 'bonjour|salut|bonsoir|hello|hi|hey|hallo|gruezi|guten tag|coucou'},
    {c: 'inf', t: 'Avec plaisir', a: 'Avec plaisir ! Si vous avez une autre question, je suis là. Pour un rendez-vous, écrivez directement au garage.', hi: true, kw: 'merci|thanks|thank you|danke|merci beaucoup|super|parfait|top'}
  ];
  const nrm = x => x.toLowerCase().normalize('NFD').replace(/[̀-ͯ]/g, '').replace(/[’']/g, ' ').replace(/[^a-z0-9 ]+/g, ' ').replace(/\s+/g, ' ').trim();
  KB.forEach(e => { e.K = e.kw.split('|').map(nrm); e.T = nrm(e.t); });
  // one-letter typos still match (geometri, batery, horaire…)
  const lev = (x, y) => { const m = x.length, n = y.length, d = Array.from({length: m + 1}, (_, i) => [i]); for (let j = 1; j <= n; j++) d[0][j] = j; for (let i = 1; i <= m; i++) for (let j = 1; j <= n; j++) d[i][j] = Math.min(d[i - 1][j] + 1, d[i][j - 1] + 1, d[i - 1][j - 1] + (x[i - 1] === y[j - 1] ? 0 : 1)); return d[m][n]; };
  function search(q) {
    const n = nrm(q), toks = n.split(' ').filter(w => w.length > 1);
    return KB.map(e => {
      let sc = 0;
      e.K.forEach(k => {
        if (k.includes(' ')) { if (n.includes(k)) sc += 4; return; }
        toks.forEach(w => { if (w === k) sc += 3; else if (w.length >= 4 && k.length >= 4 && (w.startsWith(k) || k.startsWith(w))) sc += 2; else if (w.length >= 5 && k.length >= 5 && Math.abs(w.length - k.length) <= 1 && lev(w, k) <= 1) sc += 2; });
      });
      if (e.T && n.includes(e.T)) sc += 3;
      return {e, sc};
    }).filter(r => r.sc >= 2).sort((a, b) => b.sc - a.sc);
  }

  function home(dir = -1) {
    setAmb(null); showUrg(false); lights.forEach(l => l.classList.remove('lit'));
    if (g && !reduce) g.to(N, {s: 0, duration: .6, onUpdate: draw}); else { N.s = 0; draw(); }
    $('ttl').textContent = 'DAYTONA · ASSISTANT';
    const cats = ['mec', 'pne', 'car', 'ocv', 'net', 'ven'];
    const quick = ['Batterie', 'Leasing', 'Horaires', 'Paiement', 'Dépannage', 'Géométrie', 'Gardiennage']; // ordered so they fit on two rows on a phone
    go(`<form class="askf" id="askf" autocomplete="off"><input id="askq" type="text" enterkeyhint="send" aria-label="Votre question" placeholder="Posez votre question…"><button type="submit" aria-label="Envoyer"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></button></form>
      <div class="qk">${quick.map((w, i) => `<button type="button" class="qc" id="qc${i}">${w}</button>`).join('')}</div>
      <div class="tiles">${cats.map(c => `<button type="button" class="tile" id="ct-${c}">${icon(CAT[c].k)}<span>${CAT[c].n}<small>${KB.filter(e => e.c === c).length} sujets</small></span></button>`).join('')}</div>`, dir);
    if (g && !reduce) g.fromTo('.tile, .qc', {opacity: 0, y: 8}, {opacity: 1, y: 0, duration: .35, stagger: .03, ease: 'power2.out', delay: .1});
    cats.forEach(c => $('ct-' + c).addEventListener('click', () => listCat(c)));
    quick.forEach((w, i) => $('qc' + i).addEventListener('click', () => ask(w)));
    $('askf').addEventListener('submit', e => { e.preventDefault(); const v = $('askq').value.trim(); if (v) ask(v); });
  }

  // detailed overview of each service (wording from the garage's own pages)
  const OV = {
    mec: {i: 'Entretien, diagnostic, réparation et géométrie de votre voiture, par une équipe de professionnels qualifiés.',
      inc: ['Diagnostic électronique et mécanique', 'Réparations mécaniques complètes', 'Géométrie, niveaux, batterie, éclairage', 'Déplacement et dépannage', 'Tout type de pièce sur demande'],
      st: [['Diagnostic', 'Nous trouvons l’origine du problème.'], ['Prix clair', 'Vous recevez un prix adapté à votre voiture avant l’intervention.'], ['Réparation', 'Notre atelier répare votre véhicule.']],
      pr: [['Diagnostic', PX('diag', '100 CHF')], ['Géométrie', PX('geo', '220 CHF')], ['Main-d’œuvre', PX('mo', '120 CHF / heure')]],
      note: 'Le nettoyage est offert avec tout service réalisé au garage.'},
    pne: {i: 'Pneus d’occasion de marque, été et hiver, vendus par jeux complets, avec ou sans jantes. Chaque jeu est contrôlé par nos mécaniciens.',
      inc: ['Photos réelles et année de chaque jeu', 'Recherche par taille, par exemple 205/55 R16', 'Prix fixe pour le jeu complet', 'Réservation en ligne ou sur WhatsApp', 'Montage, équilibrage et gardiennage à l’atelier'],
      st: [['Trouvez', 'Cherchez votre taille, écrite sur le flanc du pneu.'], ['Réservez', 'En ligne ou sur WhatsApp, nous vous confirmons par téléphone.'], ['Récupérez', 'Au garage, Rue de Lausanne 64, paiement sur place.']],
      pr: [['Changement de pneus', PX('pneus', '120 CHF')], ['Montage et équilibrage', PX('equil', '30 CHF / pneu')], ['Gardiennage', PX('gard', '60 CHF')]]},
    car: {i: 'Réparation de la carrosserie de tous types de véhicules, endommagés ou accidentés, avec des équipements récents, et peinture automobile en cabine.',
      inc: ['Petite réparation ou restauration complète', 'Peinture en cabine', 'Démarches avec votre assurance', 'Voiture de remplacement si la réparation est longue'],
      st: [['Évaluation', 'Nous examinons les dégâts de votre véhicule.'], ['Diagnostic', 'Nous évaluons les travaux et vous informons clairement.'], ['Réparation', 'Nos experts réparent la carrosserie.'], ['Peinture finale', 'Votre voiture retrouve son apparence d’origine.']],
      pr: [['Diagnostic', 'gratuit']]},
    ocv: {i: 'Nous préparons votre véhicule pour la visite du contrôle technique, et nous pouvons l’emmener au centre pour vous.',
      inc: ['Contrôle des fluides', 'Freins et pneus', 'Éclairage', 'Sécurité générale'],
      st: [['Préparation', 'Nous inspectons et préparons votre véhicule.'], ['Transport', 'Nous emmenons votre véhicule au centre de contrôle.'], ['Retour', 'Nous vous le ramenons.']],
      pr: [['Préparation complète', PX('ocv_prep', '300 CHF')], ['Transport aller-retour', PX('ocv_move', '100 CHF')]],
      note: 'Un contrôle technique est recommandé tous les 3 ans.'},
    net: {i: 'Un intérieur impeccable, frais et parfumé, comme si votre voiture sortait du neuf. Deux formules au choix.',
      inc: ['Sièges et tapis', 'Tableau de bord', 'Vitres et plafonnier', 'Lavage complet avec la formule complète'],
      pr: [['Nettoyage intérieur détaillé', PX('net_in', 'dès 150 CHF')], ['Nettoyage détaillé et lavage complet', PX('net_full', '210 CHF')]],
      note: 'Le nettoyage est offert avec tout service réalisé au garage.'},
    ven: {i: 'Voitures d’occasion certifiées et sélectionnées, avec un stock régulièrement mis à jour.',
      inc: ['Essai sur place, du lundi au vendredi', 'Reprise ou échange de votre voiture', 'Estimation gratuite au garage', 'Leasing avec Cembra Money Bank']}
  };

  async function listCat(c, dir = 1) {
    const C = CAT[c], O = OV[c] || {}; setAmb('--wine'); blip(); showUrg(false);
    $('ttl').textContent = C.n.toUpperCase();
    const items = KB.filter(e => e.c === c);
    const msg = `Bonjour, je souhaite des informations sur : ${C.n}.`;
    const my = go(`<div class="hdr">${back}<span class="hi">${icon(C.k)}</span><div><b>${C.n}</b><small>Présentation du service</small></div></div>
      ${O.i ? `<p class="tx" id="oi"></p>` : ''}
      <div class="ovb" id="ovb">
      ${O.st ? `<div class="sec"><span class="sh">Comment ça se passe</span><ol class="stp">${O.st.map((x, i) => `<li><b>${i + 1}</b><div><strong>${x[0]}</strong><span>${x[1]}</span></div></li>`).join('')}</ol></div>` : ''}
      ${O.inc ? `<div class="sec"><span class="sh">Ce que nous faisons</span><ul class="inc">${O.inc.map(x => `<li>${x}</li>`).join('')}</ul></div>` : ''}
      ${O.pr ? `<div class="sec"><span class="sh">Prix</span><div class="prc">${O.pr.map(p => `<div><span>${p[0]}</span><b>${p[1]}</b></div>`).join('')}</div></div>` : ''}
      ${O.note ? `<p class="nt">${O.note}</p>` : ''}
      <a class="wa" target="_blank" rel="noopener" href="https://wa.me/${WA}?text=${encodeURIComponent(msg)}">${WAICON}Écrire au garage</a>
      <div class="sec"><span class="sh">Questions sur ce service</span><div class="lst">${items.map((e, i) => `<button type="button" class="li" id="li${i}"><span>${e.t}</span><b>${e.p ? e.p[0][1] : ''}</b><i>›</i></button>`).join('')}</div></div>
      ${C.pg ? `<a class="pgl" href="${C.pg}">Voir la page ${C.n} <span>→</span></a>` : ''}
      </div>`, dir);
    $('bk').addEventListener('click', () => home());
    items.forEach((e, i) => $('li' + i).addEventListener('click', () => e.diag != null ? detail(e.diag) : answerKB(e, null, c)));
    if (g && !reduce) g.set('#ovb', {opacity: 0});
    if (O.i) { await type($('oi'), O.i); if (my !== run) return; }
    if (g && !reduce) { g.to('#ovb', {opacity: 1, duration: .3}); g.fromTo('#ovb .stp li, #ovb .inc li, #ovb .prc > div', {opacity: 0, x: 10}, {opacity: 1, x: 0, duration: .3, stagger: .05}); }
  }

  function ask(q) {
    let r = search(q);
    if (r.length > 1 && r[0].e.hi) r = r.filter(x => !x.e.hi).concat(r.filter(x => x.e.hi)); // a greeting plus a real question: answer the question
    if (!r.length) return noAnswer(q);
    answerKB(r[0].e, q, null, r.slice(1, 3).map(x => x.e));
  }

  async function answerKB(e, q, fromCat, more) {
    if (e.diag != null) return detail(e.diag);
    const C = CAT[e.c]; setAmb('--wine'); blip(); showUrg(false);
    $('ttl').textContent = 'RÉPONSE';
    const msg = q ? `Bonjour, j’ai une question : ${q}` : `Bonjour, je souhaite des informations sur : ${e.t}.`;
    const also = (more && more.length ? more : KB.filter(x => x.c === e.c && x !== e).slice(0, 2));
    const my = go(`<div class="hdr">${back}<span class="hi">${icon(C.k)}</span><div><b>${e.t}</b><small>${C.n}</small></div></div>
      ${q ? `<p class="you">« ${q.replace(/[<>&]/g, '')} »</p>` : ''}
      <p class="tx" id="ka"></p>
      ${e.p ? `<div class="prc">${e.p.map(p => `<div><span>${p[0]}</span><b>${p[1]}</b></div>`).join('')}</div>` : ''}
      ${e.hi ? '' : `<a class="wa" id="wa" target="_blank" rel="noopener" href="https://wa.me/${WA}?text=${encodeURIComponent(msg)}">${WAICON}Écrire au garage</a>`}
      ${e.hi ? '' : e.map ? `<a class="pgl" target="_blank" rel="noopener" href="${MAP}">Ouvrir l’itinéraire <span>→</span></a>` : (C.pg ? `<a class="pgl" href="${C.pg}">Voir la page ${C.n} <span>→</span></a>` : '')}
      ${also.length ? `<div class="also"><span>Voir aussi</span>${also.map((x, i) => `<button type="button" class="qc" id="al${i}">${x.t}</button>`).join('')}</div>` : ''}`);
    $('bk').addEventListener('click', () => fromCat ? listCat(fromCat, -1) : home());
    also.forEach((x, i) => $('al' + i).addEventListener('click', () => answerKB(x, null, x.c)));
    if (g && !reduce) g.fromTo('.prc > div, #wa, .pgl, .also', {opacity: 0, y: 8}, {opacity: 1, y: 0, duration: .35, stagger: .06, delay: .3});
    let txt = e.a;
    if (e.live) { try { const f = o => new Intl.DateTimeFormat('fr-CH', Object.assign({timeZone: 'Europe/Zurich'}, o)).format(new Date()); const day = f({weekday: 'short'}), hm = +f({hour: '2-digit', hour12: false}) * 60 + +f({minute: '2-digit'}); const wk = !/^(sam|dim)/i.test(day); txt = (wk && hm >= 450 && hm < 1020 ? 'En ce moment, le garage est ouvert. ' : 'En ce moment, le garage est fermé. ') + txt; } catch (x) {} }
    await type($('ka'), txt); if (my !== run) return;
  }

  function noAnswer(q) {
    setAmb('--wine'); showUrg(false); $('ttl').textContent = 'RÉPONSE';
    go(`<div class="hdr">${back}<span class="hi">${icon('ocv')}</span><div><b>Bonne question</b><small>Notre équipe vous répond</small></div></div>
      <p class="you">« ${q.replace(/[<>&]/g, '')} »</p>
      <p class="tx">Merci pour votre question ! Je n’ai pas encore cette information. L’équipe du garage vous répondra avec plaisir sur WhatsApp.</p>
      <a class="wa" target="_blank" rel="noopener" href="https://wa.me/${WA}?text=${encodeURIComponent('Bonjour, j’ai une question : ' + q)}">${WAICON}Envoyer la question</a>`);
    $('bk').addEventListener('click', () => home());
  }

  // buying a car is not a problem to diagnose: straight to the cars, or a message to the garage
  async function vente() {
    setAmb('--rose'); blip(); showUrg(false); lights.forEach(l => l.classList.remove('lit'));
    $('ttl').textContent = 'VENTE';
    const msg = 'Bonjour, je cherche une voiture d’occasion. Pouvez-vous me dire ce que vous avez en ce moment ?';
    const my = go(`<div class="hdr">${back}<span class="hi" style="--c:var(--rose)">${icon('key')}</span><div><b>Acheter une voiture</b><small>Vente de voitures</small></div></div>
      <p class="tx" id="v1"></p><p class="qq" id="v2"></p>
      <div class="rows" id="vb" style="opacity:0"><a class="cta2" href="/vente-de-voitures/">${icon('key')}Voir les voitures</a><a class="wa" target="_blank" rel="noopener" href="https://wa.me/${WA}?text=${encodeURIComponent(msg)}">${WAICON}Demander au garage</a></div>`);
    $('bk').addEventListener('click', () => home());
    await type($('v1'), 'Voitures d’occasion, stock renouvelé.'); if (my !== run) return;
    await type($('v2'), 'Que souhaitez-vous faire ?', .1); if (my !== run) return;
    if (g && !reduce) g.fromTo('#vb', {opacity: 0, y: 8}, {opacity: 1, y: 0, duration: .4}); else $('vb').style.opacity = 1;
  }

  async function detail(i) {
    const s = S[i], f = F[i];
    setAmb(s.c); blip(); showUrg(false);
    lights.forEach(l => l.classList.toggle('lit', l.dataset.k === s.k));
    $('ttl').textContent = 'DIAGNOSTIC';
    const my = go(`<div class="hdr">${back}<span class="hi" style="--c:var(${s.c})">${icon(s.k)}</span><div><b>${s.t}</b><small>${s.svc}</small></div></div>
      <p class="tx" id="d1"></p><p class="qq" id="d2"></p><div class="chips" id="ch"></div>`);
    $('bk').addEventListener('click', () => home());
    await type($('d1'), s.a); if (my !== run) return;
    await type($('d2'), f.q, .1); if (my !== run) return;
    $('ch').innerHTML = f.o.map((o, j) => `<button type="button" class="chip" id="ch${j}">${o.l}</button>`).join('');
    if (g && !reduce) g.fromTo('.chip', {opacity: 0, y: 8}, {opacity: 1, y: 0, duration: .35, stagger: .08});
    f.o.forEach((o, j) => $('ch' + j).addEventListener('click', () => result(i, j)));
  }

  async function result(i, j) {
    const s = S[i], o = F[i].o[j];
    const msg = s.msg.replace('. ', '. ' + (o.m ? o.m + ' ' : ''));
    $('ttl').textContent = 'RÉSULTAT';
    const my = go(`<div class="hdr">${back}<span class="hi" style="--c:var(${s.c})">${icon(s.k)}</span><div><b>${s.t}</b><small>${o.l}</small></div></div>
      <div class="ub"><span>Urgence</span><div class="ubar"><i style="background:var(--green)"></i><i style="background:var(--amber)"></i><i style="background:var(--red)"></i><em id="um"></em></div><b id="ut" style="color:var(${URC[o.u]})">${URT[o.u]}</b></div>
      <p class="tx" id="r1"></p>
      <div class="rows"><div><span>Service</span><b>${s.svc}</b></div><div><span>Prix</span><b>${s.price}</b></div></div>
      <a class="wa" id="wa" target="_blank" rel="noopener" href="https://wa.me/${WA}?text=${encodeURIComponent(msg)}">${WAICON}Envoyer à l’atelier</a>
      <a class="pgl" id="pgl" href="${s.pg}">Voir la page ${s.svc} <span>→</span></a>`);
    $('bk').addEventListener('click', () => detail(i));
    showUrg(true);
    const pos = (o.u + .5) / 3 * 100;
    if (g && !reduce) { g.to(N, {s: UR[o.u], duration: 1.2, ease: 'elastic.out(1, .55)', onUpdate: draw}); g.fromTo('#um', {left: '0%'}, {left: pos + '%', duration: 1, ease: 'elastic.out(1, .6)'}); g.fromTo('.rows > div, #wa, #pgl', {opacity: 0, y: 8}, {opacity: 1, y: 0, duration: .4, stagger: .08, delay: .5}); }
    else { N.s = UR[o.u]; draw(); $('um').style.left = pos + '%'; }
    await type($('r1'), o.t, .15); if (my !== run) return;
  }
  const WAICON = '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2zm5.3 14.2c-.2.6-1.3 1.2-1.8 1.2-.5.1-1 .2-3.2-.7-2.7-1.1-4.4-3.8-4.5-4-.1-.2-1.1-1.4-1.1-2.7s.7-1.9.9-2.2c.2-.3.5-.3.7-.3h.5c.2 0 .4 0 .6.5l.8 1.9c.1.2.1.3 0 .5l-.4.6-.4.4c-.1.1-.3.3-.1.6.2.3.8 1.3 1.7 2.1 1.2 1 2.1 1.3 2.4 1.5.3.1.5.1.6-.1l.9-1c.2-.3.4-.2.6-.1l1.8.9c.3.1.5.2.5.3.1.2.1.7-.1 1.4z"/></svg>';
  $('dHome').addEventListener('click', () => { if (started) home(); });

  // ---------- engine start ----------
  let muted = false, actx = null, started = false;
  function engineSound() {
    if (muted) return;
    try {
      actx = actx || new (window.AudioContext || window.webkitAudioContext)();
      const c = actx, t0 = c.currentTime, out = c.createGain(), lp = c.createBiquadFilter();
      lp.type = 'lowpass'; lp.frequency.value = 520; out.gain.value = 0; lp.connect(out); out.connect(c.destination);
      out.gain.linearRampToValueAtTime(.32, t0 + .08); out.gain.setValueAtTime(.32, t0 + 2.2); out.gain.exponentialRampToValueAtTime(.0001, t0 + 3.4);
      const crank = c.createOscillator(), cg = c.createGain(), lfo = c.createOscillator(), lg = c.createGain();
      crank.type = 'sawtooth'; crank.frequency.setValueAtTime(34, t0); crank.frequency.linearRampToValueAtTime(48, t0 + .55);
      lfo.type = 'square'; lfo.frequency.value = 14; lg.gain.value = .5; lfo.connect(lg); lg.connect(cg.gain); cg.gain.setValueAtTime(.5, t0); cg.gain.setValueAtTime(0, t0 + .6);
      crank.connect(cg); cg.connect(lp); crank.start(t0); lfo.start(t0); crank.stop(t0 + .62); lfo.stop(t0 + .62);
      [[1, 1], [2, .5], [.5, .6]].forEach(([mult, vol]) => {
        const o = c.createOscillator(), og = c.createGain();
        o.type = 'sawtooth'; o.frequency.setValueAtTime(40 * mult, t0 + .55); o.frequency.exponentialRampToValueAtTime(95 * mult, t0 + 1.05); o.frequency.exponentialRampToValueAtTime(36 * mult, t0 + 1.9);
        og.gain.setValueAtTime(0, t0); og.gain.setValueAtTime(vol, t0 + .55); o.connect(og); og.connect(lp); o.start(t0 + .5); o.stop(t0 + 3.5);
      });
    } catch (e) {}
  }

  function start() {
    if (started) return; started = true;
    cl.classList.remove('off');
    const b = $('start');
    if (g && !reduce) g.to(b, {scale: .6, autoAlpha: 0, duration: .4, ease: 'power2.in', onComplete: () => b.classList.add('gone')}); else b.classList.add('gone');
    if (!g || reduce) { home(); return; }
    // boot: all lights on, needle sweep, logo splash, then the home screen
    go(`<div class="boot"><div class="lg">Garage <em>Daytona</em></div><div class="pbar"><i id="pb"></i></div><div class="bt" id="bt"></div></div>`);
    setAmb('--pink');
    const tl = g.timeline();
    tl.add(() => lights.forEach(l => l.classList.add('lit')));
    tl.fromTo('.boot .lg', {opacity: 0, scale: .92, letterSpacing: '.3em'}, {opacity: 1, scale: 1, letterSpacing: '.02em', duration: 1, ease: 'power3.out'}, .1);
    tl.fromTo('#pb', {scaleX: 0}, {scaleX: 1, duration: 1.9, ease: 'power1.inOut'}, .3);
    tl.call(() => type($('bt'), 'Contrôle des systèmes…'), null, .4);
    tl.to(N, {t: 1, s: 1, duration: .9, ease: 'power2.inOut', onUpdate: draw}, .55);
    tl.to(N, {t: .11, s: 0, duration: .9, ease: 'power2.inOut', onUpdate: draw}, 1.5);
    lights.forEach((l, i) => tl.call(() => l.classList.remove('lit'), null, 1.7 + i * .13 + (i % 3) * .05));
    tl.call(() => home(1), null, 2.6);
    tl.add(() => g.to(N, {t: .13, duration: 1.4, yoyo: true, repeat: -1, ease: 'sine.inOut', onUpdate: draw}), 3.2);
  }
  $('start').addEventListener('click', start);
  // a tap on the dark screen also starts the car
  $('scr').addEventListener('click', () => { if (!started) start(); });

}
GDHOME_VJS_END;
const GDHOME_AJS = <<<'GDHOME_AJS_END'
() => {
  // "Notre atelier": real photos of the garage (plates blurred), a slow panoramic strip and three hotspots
  const host = document.getElementById('atelier'); if (!host) return;
  const P = '/wp-content/uploads/claude/atelier/';
  const img = (n, alt, w) => `<img src="${P}${n}.webp" srcset="${P}${n}-m.webp 900w, ${P}${n}.webp ${w}w" sizes="(max-width:760px) 100vw, 60vw" alt="${alt}" loading="lazy" decoding="async">`;
  const spots = [[34, 62, 'Ponts élévateurs'], [47, 70, 'Établi et outillage'], [69, 56, 'Stock de pneus']];
  host.innerHTML = `
  <div class="at-in at-hd"><span class="at-eye">Notre atelier</span><h2>Un atelier équipé, au cœur de Genève.</h2><p>Rue de Lausanne 64-66, du lundi au vendredi de 07:30 à 17:00.</p></div>
  <div class="at-pano" id="atpano" aria-label="Vue panoramique de l’atelier"><img src="${P}atelier-pano.webp" srcset="${P}atelier-pano-m.webp 1700w, ${P}atelier-pano.webp 2576w" sizes="200vw" alt="Vue panoramique de l’atelier Garage Daytona" loading="lazy" decoding="async"><span class="at-hint">‹ glissez ›</span></div>
  <div class="at-in at-grid">
    <figure class="at-big at-rv">${img('atelier', 'L’atelier Garage Daytona à Genève', 1800)}${spots.map((s, i) => `<button type="button" class="at-hs" style="left:${s[0]}%;top:${s[1]}%" aria-label="${s[2]}"><i></i><span>${s[2]}</span></button>`).join('')}</figure>
    <div class="at-side">
      <figure class="at-rv">${img('atelier-ponts', 'Ponts élévateurs et stock de pneus', 1600)}<figcaption>Ponts élévateurs et stock de pneus</figcaption></figure>
      <figure class="at-rv">${img('atelier-entree', 'Entrée du Garage Daytona', 1400)}<figcaption>Notre entrée, Rue de Lausanne 64-66</figcaption></figure>
    </div>
  </div>`;
  host.querySelectorAll('.at-hs').forEach(b => b.addEventListener('click', () => { const on = b.classList.contains('on'); host.querySelectorAll('.at-hs').forEach(x => x.classList.remove('on')); if (!on) b.classList.add('on'); }));
  // panorama: drifts slowly from side to side, stops while the visitor drags it
  const pano = document.getElementById('atpano'), reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
  let dir = 1, hold = 0, vis = false, last = 0;
  const stop = () => { hold = performance.now() + 4000; pano.classList.add('used'); };
  ['pointerdown', 'wheel', 'touchstart'].forEach(e => pano.addEventListener(e, stop, {passive: true}));
  new IntersectionObserver(es => es.forEach(e => { vis = e.isIntersecting; })).observe(pano);
  if (!reduce) (function loop(t) {
    if (vis && t > hold) { const max = pano.scrollWidth - pano.clientWidth; if (max > 0) { pano.scrollLeft += dir * Math.min(2, (t - last) * .03); if (pano.scrollLeft >= max - 1) dir = -1; else if (pano.scrollLeft <= 0) dir = 1; } }
    last = t; requestAnimationFrame(loop);
  })(0);
  // reveal
  const io = new IntersectionObserver(es => es.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } }), {rootMargin: '0px 0px -10% 0px'});
  host.querySelectorAll('.at-rv').forEach(n => io.observe(n));
}
GDHOME_AJS_END;
