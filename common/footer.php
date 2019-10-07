</div>    

<footer class="footer">
<hr>
    <div class="grid-x grid-padding-x">
    <div class="cell medium-12">
    <img class="footer-logo" src="<?php echo img('sfa-logo-footer.png', $dir='img'); ?>" alt="Logo for Southern Foodways Alliance">

        <?php if($footerText = get_theme_option('Footer Text')): ?>
            <p><?php echo get_theme_option('Footer Text'); ?></p>
        <?php endif; ?>
    </div>
    
    </div> 
<?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>
</footer>

<script type="text/javascript">
    jQuery(document).ready(function(){
        Omeka.showAdvancedForm();
        Omeka.skipNav();

    });
</script>
<script>
    jQuery(document).foundation()
</script>

</body>

</html>