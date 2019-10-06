<?php
$pageTitle = __('Browse Items');
echo head(array('title' => $pageTitle, 'bodyclass' => 'items browse'));
?>

<div class="grid-x grid-padding-x top items">
    <div class="medium-12 cell">
        <h2><?php echo $pageTitle;?> <?php echo __('(%s total)', $total_results); ?></h2>
    </div>
    <?php
    $sortLinks[__('Title')] = 'Dublin Core,Title';
    $sortLinks[__('Date Added')] = 'added';
    ?>
    <div class="medium-12 item-sort cell">
        <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
    </div>
</div>

<?php foreach (loop('items') as $item): ?>
<div class="item hentry grid-x grid-margin-x bottom">
    <div class="medium-3 cell">
        <?php if (metadata('item', 'has files')): ?>
            <?php echo link_to_item(item_image()); ?>
        <?php endif; ?>
    </div>

    <div class="medium-9 cell browse-meta">
        <h3><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class' => 'permalink')); ?></h3>

        <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet' => 250))): ?>
            <p><?php echo $description; ?></p>
        <?php endif; ?>

        <?php if (metadata('item', 'has tags')): ?>
        <div class="tags"><p>
            <?php echo tag_string('items','items/browse',' '); ?></p>
        </div>
        <?php endif; ?>

    <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' => $item)); ?>

    </div><!-- end class="item-meta" -->
</div><!-- end class="item hentry" -->
<?php endforeach; ?>

<?php echo pagination_links(); ?>

<?php fire_plugin_hook('public_items_browse', array('items' => $items, 'view' => $this)); ?>

<?php echo foot(); ?>
