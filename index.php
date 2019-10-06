<?php echo head(array('bodyid'=>'home')); ?>

<?php $featuredItems = get_records('Item', array('featured' => 1,'sort_field' => 'added','sort_dir' => 'd')); ?>

<div class="medium-12 cell">
    <?php $mainFeaturedItem = reset($featuredItems); ?>
    <?php echo link_to_item(
            item_image('fullsize', array(), 0, $mainFeaturedItem),
            array('class' => 'image'), 'show', $mainFeaturedItem
        ); ?>
</div>

<div class="grid-x grid-padding-x top">
    <div class="medium-12 cell">
      <p>Some explanatory text. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero ducimus assumenda consequuntur harum perspiciatis, cupiditate dolorum, voluptatum sequi laudantium accusantium aliquid enim exercitationem quia eveniet expedita, culpa? Magni ex, odit.</p>
    </div>
</div>

<div class="grid-x grid-padding-x top">
    <?php $otherFeaturedItems = array_slice($featuredItems, 1); ?>
    <?php foreach ($otherFeaturedItems as $item): ?>
        <div class="medium-4 cell">
          <?php echo link_to_item(
                item_image('square_thumbnail', array(), 0, $item),
                array('class' => 'image'), 'show', $item
            ); ?>
        </div>
    <?php endforeach ?>
</div>
<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>
