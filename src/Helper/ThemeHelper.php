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
        return (object) require($path);
   } 
}
?>