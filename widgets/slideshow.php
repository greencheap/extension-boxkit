<?php
use GreenCheap\Application as App;

use GreenCheap\BoxKit\Helper\ThemeHelper;

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
            $widget->set('items' , ThemeHelper::requireData($widget->get('render.render') , (object) $widget->get('type_options') , $widget->get('markdown')));
        }
        return $app->view('boxkit/slideshow.php' , compact('widget'));
    }
];