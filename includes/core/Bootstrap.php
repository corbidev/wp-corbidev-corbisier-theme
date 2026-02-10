<?php
namespace CorbiDev\Theme\Core;
use CorbiDev\Theme\Services\SitesRepository;
final class Bootstrap{
 public static function boot():void{
  add_action('wp_enqueue_scripts',[self::class,'enqueueAssets']);
  add_action('wp_footer',[self::class,'mountApp'],1);
 }
 public static function enqueueAssets():void{
  $dist=get_stylesheet_directory().'/dist';
  $uri=get_stylesheet_directory_uri().'/dist';
  $manifest=$dist.'/.vite/manifest.json';
  if(!file_exists($manifest))return;
  $data=json_decode(file_get_contents($manifest),true);
  if(!isset($data['assets/js/app.js']))return;
  $e=$data['assets/js/app.js'];
  if(!empty($e['css'][0]))wp_enqueue_style('corbidev-style',$uri.'/'.$e['css'][0],[],null);
  wp_enqueue_script('corbidev-app',$uri.'/'.$e['file'],[],null,true);
  add_filter('script_loader_tag',fn($t,$h)=>$h==='corbidev-app'?str_replace('<script ','<script type="module" ',$t):$t,10,2);
  wp_localize_script('corbidev-app','CORBIDEV_SITES',SitesRepository::all());
 }
 public static function mountApp():void{echo '<div id="corbidev-sites-app"></div>';}
}