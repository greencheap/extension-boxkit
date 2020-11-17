<?php 
namespace GreenCheap\BoxKit\Helper;

use GreenCheap\Application as App;

class ThemeHelper
{
     public static function requireData($path , $options = null , $markdown = false)
     {
          preg_match('/([a-z-_0-9]+)[:$](.+)/' , $path , $match);
          $name = $match[1];
          $module = App::module($name);
          $path = $module->get('path').'/'.$match[2];
          $returnData = require($path);
          return (object) $returnData;
     }

     public static function gridData($data)
     {
          $classes = array_merge([
               'gap' => $data['gap'],
               'divider' => $data['divider'] ? 'uk-grid-divider':null,
               'match' => $data['match'] ? 'uk-grid-match':null,
          ], $data['device']);

          return implode(' ' , array_values($classes));
     }
}
?>