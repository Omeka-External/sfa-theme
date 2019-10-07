<?php
$title = metadata('item', 'display_title');
echo head(array('title' => $title, 'bodyclass' => 'items show'));
?>

<div class="grid-x grid-margin-x">
<div class="medium-8 cell">
    <h2><?php echo metadata('item', 'display_title'); ?></h2>

    <?php $itemFiles = $item->Files; ?>
    <?php foreach ($itemFiles as $itemFile): ?>
        <?php $fileType = $itemFile->mime_type; ?>
        <?php if (strpos($fileType,'image') !== false): ?>
            <?php echo file_markup($itemFile,array('imageSize' => 'fullsize')); ?>
        <?php endif; ?>
    <?php endforeach; ?>
     
    <?php if(metadata('item', array('Item Type Metadata', 'OHMS Object'), array('no_filter'=>true))): ?>
        <div class="ohms-object">
            <?php echo metadata('item', array('Item Type Metadata', 'OHMS Object')  ); ?>
        </div>
    <?php endif; ?>

<?php echo all_element_texts('item'); ?>

</div>

<div class="medium-3 medium-offset-1 cell item-extra">
    <?php $itemFiles = $item->Files; ?>
    <?php $headerPrinted = false; ?>
    <?php foreach ($itemFiles as $itemFile): ?>
        <?php $fileType = $itemFile->mime_type; ?>
        <?php $fileTitle = metadata($itemFile, 'display_title'); ?>
        <?php if (strpos($fileType,'image') === false): ?>
            <?php if(!$headerPrinted): ?>
                <h4>Files</h4>
                <?php $headerPrinted = true; ?>
            <?php endif; ?>
            <?php echo link_to_file_show(array(),$fileTitle,$itemFile) ?>
        <?php endif; ?>
    <?php endforeach; ?>

    
    <?php if (metadata('item', 'has tags')): ?>
    <h4>Tags</h4>
    <span class="tags">
        <?php echo tag_string('item','items/browse',' '); ?>
    </span>
    <?php endif;?>

    <?php if (metadata('item', 'Collection Name')): ?>
    <h4>Collections</h4>
        <h3><?php echo __('Collection'); ?></h3>
        <p><?php echo link_to_collection_for_item(); ?></p>
    <?php endif; ?>

    <h4><?php echo __('Citation'); ?></h4>
    <?php echo metadata('item', 'citation', array('no_escape' => true)); ?>

</div>
<nav>
<ul class="pagination navigation">
    <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
    <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
</ul>
</nav>
<?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
</div>


<?php echo foot(); ?>
