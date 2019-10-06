<!DOCTYPE html>
<html class="<?php echo get_theme_option('Style Sheet'); ?>" lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes" />
    <?php if ($description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto+Slab:400,700" rel="stylesheet">

    <?php echo auto_discovery_link_tags(); ?>

    <?php fire_plugin_hook('public_head',array('view'=>$this)); ?>
    <!-- Stylesheets -->
    <?php
    queue_css_file(array('foundation-icons/foundation-icons', 'foundation', 'style'));
    echo head_css();
    ?>
    <!-- JavaScripts -->

    <?php 
    queue_js_file(array('vendor/jquery-accessibleMegaMenu','what-input','foundation','app'));
    echo head_js(); 
    ?>
</head>

 <?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
<header>
<?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="medium-4 cell">
                <a href="<?php echo url(''); ?>" class="site-title"><img class="inner-logo" src="<?php echo img('logo-sfa.svg', $dir='img'); ?>" alt="Logo for Southern Foodways Alliance"></a>
            </div>

            <div id="search-container" class="medium-5 medium-offset-3 cell top">
            <a href="<?php echo url('/geolocation/map/browse'); ?>"><i class="fi-map"></i></a>
                <?php echo search_form(); ?>
            </div>
                <div class="medium-3 medium-offset-9 cell">
                <ul class="dropdown menu" data-dropdown-menu>
                    <li class="nav-item">
                      <a href="<?php echo url('items/browse') ?>">Collections</a>
                        <ul class="menu">
                          <li><a href="<?php echo url('collections/show/1'); ?>">Oral History</a></li>
                          <li><a href="<?php echo url('collections/show/2'); ?>">Film</a></li>
                          <li><a href="<?php echo url('collections/show/3'); ?>">Gravy Podcast</a></li>
                          <li><a href="<?php echo url('collections/show/4'); ?>">Gravy Journal</a></li>
                          <li><a href="<?php echo url('collections/show/5'); ?>">Photographs</a></li>
                          <li><a href="<?php echo url('collections/show/6'); ?>">Event Presentations</a></li>
                          <li><a href="<?php echo url('collections/show/7'); ?>">SFA Documents</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="<?php echo url('about'); ?>">About SFA</a></li>
                  </ul>
                </div>
        </div>
    </div>
</header>      

<div id="wrap">
    <div id="content" role="main" class="grid-container">
<?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
