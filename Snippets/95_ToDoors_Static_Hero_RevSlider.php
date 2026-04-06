<?php
/**
 * Snippet #95: Statische Hero ter vervanging van RevSlider
 * Status: ACTIVE
 * Scope: frontend
 *
 * Exact replica van RevSlider 10 (slider "Main 1").
 * Breekt uit Elementor container via JS (zoals RevSlider dat doet).
 */

add_action('wp_enqueue_scripts', function() {
    if (!is_front_page()) return;
    wp_dequeue_script('revslider');
    wp_dequeue_script('revslider-front');
    wp_dequeue_style('revslider-front');
}, 100);

add_action('template_redirect', function() {
    if (!is_front_page()) return;

    ob_start(function($buffer) {
        $hero = '
<style>
#tdh{position:relative;height:100vh;min-height:700px;background-color:#262626;overflow:hidden;}
#tdh img.tdh-bg{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover;object-position:center;display:block;}
#tdh .tdh-wrap{position:absolute;top:0;left:0;right:0;bottom:0;}
#tdh .tdh-inner{position:relative;height:100%;max-width:1180px;margin:0 auto;}
#tdh .tdh-t1{position:absolute;top:calc(50% - 156px);left:24px;font-family:Roboto,sans-serif;font-size:50px;font-weight:400;color:rgba(247,247,247,1);line-height:1;text-shadow:2px 2px 0 #000;white-space:nowrap;}
#tdh .tdh-t2{position:absolute;top:calc(50% - 70px);left:17px;font-family:Roboto,sans-serif;font-size:76px;font-weight:700;color:#ffcc00;line-height:1;white-space:nowrap;}
#tdh .tdh-t3{position:absolute;top:calc(50% + 20px);left:24px;width:666px;max-width:calc(100% - 48px);font-family:Roboto,sans-serif;font-size:20px;font-weight:400;color:rgba(255,255,255,1);line-height:1.5;text-shadow:2px 2px 0 #000;}
#tdh .tdh-btn{position:absolute;top:calc(50% + 100px);left:26px;display:inline-block;padding:17px 34px;background:rgba(248,193,44,1);color:rgba(10,10,10,1);font-family:Roboto,sans-serif;font-size:14px;font-weight:600;text-decoration:none;border-radius:3px;line-height:17px;cursor:pointer;}
#tdh .tdh-btn:hover{background:#f7cc56;}
@media(max-width:480px){
  #tdh .tdh-t1{top:calc(50% - 149px);left:42px;font-size:43px;}
  #tdh .tdh-t2{top:calc(50% - 76px);left:38px;max-width:441px;}
  #tdh .tdh-t3{top:calc(50% + 17px);left:41px;width:404px;font-size:17px;}
  #tdh .tdh-btn{top:calc(50% + 109px);left:43px;padding:13px 27px;}
}
</style>
<div id="tdh">
  <img class="tdh-bg" src="https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg" alt="" fetchpriority="high">
  <div class="tdh-wrap">
    <div class="tdh-inner">
      <div class="tdh-t1">Ontdek</div>
      <div class="tdh-t2">Automatisering</div>
      <div class="tdh-t3">professionele oplossingen voor automatische schuifdeuren, draaideuren en toegangssystemen voor bedrijven en instellingen.</div>
      <a class="tdh-btn" href="https://www.todoors.nl/over-ons/">Meer weten</a>
    </div>
  </div>
</div>
<script>
(function(){
  function tdhFix(){
    var h=document.getElementById("tdh");
    if(!h)return;
    var r=h.getBoundingClientRect();
    var offset=r.left+window.scrollX;
    h.style.marginLeft=(-offset)+"px";
    h.style.width=window.innerWidth+"px";
  }
  if(document.readyState==="loading"){document.addEventListener("DOMContentLoaded",tdhFix);}
  else{tdhFix();}
  window.addEventListener("resize",tdhFix);
})();
</script>';

        return preg_replace(
            '/<rs-module-wrap[^>]*>[\s\S]*?<\/rs-module-wrap>/',
            $hero,
            $buffer
        );
    });
}, 1);
