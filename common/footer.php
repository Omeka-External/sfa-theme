</div>    
<hr>
<footer class="footer">
    <div class="grid-x grid-padding-x">
    <div class="cell medium-12">

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