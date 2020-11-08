<?php

use GreenCheap\BoxKit\Helper\ThemeHelper;

return [
    'name' => 'boxkit/grid',
    'label' => 'BoxKit Grid',
    'events' => [
        'view.scripts' => function ($event, $scripts) use ($app) {
            $scripts->register('boxkit-grid', 'boxkit:app/bundle/widgets/grid.js', ['~widgets']);
        }
    ],

    'render' => function ($widget) use ($app) {
        $widget->set('components', json_encode($widget->get('components') , true));
        if($widget->get('widget_type') !== 'CustomWidget'){
            $widget->set('items' , ThemeHelper::requireData($widget->get('render.render') , (object) $widget->get('type_options') , $widget->get('markdown')));
        }
        return $app->view('boxkit/grid.php' , compact('widget'));
    }
];