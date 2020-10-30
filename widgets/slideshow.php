<?php
use GreenCheap\Application as App;

function requireData($path , $options = null , $markdown = false){
    preg_match('/([a-z-_0-9]+)[:$](.+)/' , $path , $match);
    $name = $match[1];
    $module = App::module($name);
    $path = $module->get('path').'/'.$match[2];
    return (object) require($path);
}

return [
    'name' => 'boxkit/slideshow',
    'label' => 'BoxKit SlideShow',
    'events' => [
        'view.scripts' => function ($event, $scripts) use ($app) {
            $scripts->register('boxkit-slideshow', 'boxkit:app/bundle/widgets/slideshow.js', ['~widgets']);
        }
    ],

    'render' => function ($widget) use ($app) {
        $widget->set('components', json_encode($widget->get('components') , true));
        if($widget->get('widget_type') !== 'CustomWidget'){
            $widget->set('items' , requireData($widget->get('render.render') , (object) $widget->get('type_options') , $widget->get('markdown')));
        }
        return $app->view('boxkit/slideshow.php' , compact('widget'));
    }
];