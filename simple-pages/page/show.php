<?php
$bodyclass = 'page simple-page';
if ($is_home_page):
    $bodyclass .= ' simple-page-home';
endif;
echo head(array(
    'title' => metadata('simple_pages_page', 'title'),
    'bodyclass' => $bodyclass,
    'bodyid' => metadata('simple_pages_page', 'slug')
));
?>

<div class="grid-x grid-padding-x">
    <div class="medium-9 cell">
        <?php if (!$is_home_page): ?>
        <!-- <h1><?php echo metadata('simple_pages_page', 'title'); ?></h1> -->
        <?php endif; ?>
        <?php
        $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
        echo $this->shortcodes($text);
        ?>
    </div>
</div>

<?php echo foot(); ?>