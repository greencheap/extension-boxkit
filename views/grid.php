<div class='<?= $widget->get('classes') ?>' uk-grid='<?= $widget->get('components') ?>'> 
    <?php foreach($widget->get('items') as $item): ?>
        <?php $image = $item['media'] && $item['media'] ? $item['media'] : $view->url()->getStatic('boxkit:assets/greencheap.jpg') ?>
        <div>
            <div class="<?= $item['card'] .' uk-text-'.$item['align'] ?>">
                <?php if($image && $item['media_type'] == 'image'): ?>
                    <div class="uk-card-media-top">
                        <img data-src="<?= $image ?>" uk-img>
                    </div>
                <?php endif ?>
                <?php if($image && $item['media_type'] == 'video'): ?>
                    <div class="uk-card-media-top">
                    <iframe src="<?= $image ?>" width="100%" height="200px" frameborder="0" allowfullscreen uk-responsive uk-video="automute: true"></iframe>
                    </div>
                <?php endif ?>
                <div class="<?= $item['card_size'] ?>">
                    <h3><?= $item['title'] ?></h3>
                    <p><?= $item['content'] ?></p>
                </div>
                <?php if($item['link']): ?>
                    <div class="uk-card-footer">
                        <a href="<?= $item['link'] ?>" class="uk-button uk-button-default"><?= $item['link_text'] ?? 'Link' ?></a>
                    </div>
                <?php endif ?>
            </div>
        </div>
    <?php endforeach ?>
</div>