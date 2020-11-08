<div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slideshow='<?= $widget->get('components') ?>'>
    <ul class="uk-slideshow-items">
        <?php foreach($widget->get('items') as $item): ?>
            <?php $image = $item['media'] && $item['media'] ? $item['media'] : $view->url()->getStatic('boxkit:assets/greencheap.jpg') ?>
            <li>
                <img src="<?= $image ?>" uk-cover>
                <div class="uk-position-center-<?= $item['align'] ?> uk-position-large uk-text-<?= $item['align'] ?> uk-light">
                    <h2 class="uk-margin-remove"><?= $item['title'] ?></h2>
                    <div class="uk-width-large">
                        <?= $item['content'] ?>
                    </div>
                    <?php if($item['link']): ?>
                        <a href="<?= $item['link'] ?>" class="uk-button uk-button-default"><?= $item['link_text'] ?? 'Link' ?></a>
                    <?php endif ?>
                </div>
            </li>
        <?php endforeach ?>
    </ul>

    <div class="uk-light">
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
    </div>

</div>