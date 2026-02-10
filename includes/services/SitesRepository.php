<?php
namespace CorbiDev\Theme\Services;
final class SitesRepository{
 public static function all():array{
  $f=get_stylesheet_directory().'/assets/data/sites.json';
  if(!file_exists($f))return[];
  $d=json_decode(file_get_contents($f),true);
  return is_array($d)?$d:[];
 }
}