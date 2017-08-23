    <!-- FOOTER -->
    <div class="footer left">
        
        <?php 
        $check_footer1 = is_active_sidebar('sidebar-6');
        $check_footer2 = is_active_sidebar('sidebar-7');
        $check_footer3 = is_active_sidebar('sidebar-8');
        $check_footer4 = is_active_sidebar('sidebar-9');
        if($check_footer1 == true || $check_footer2 == true || $check_footer3 == true || $check_footer4 == true){
        ?>
        
        <div class="object-shadow" style="margin: 0"></div>
        <div class="wrapper">
            
            <div class="footer-widget-content left">
            
                <div class="footer_box left">
                    <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 1')) : ?>
                    <?php endif; ?>       
                </div><!--/footer-widget-->
            
                <div class="footer_box left">
                    <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 2')) : ?>
                    <?php endif; ?>       
                </div><!--/footer-widget-->
            
                <div class="footer_box left">
                    <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 3')) : ?>
                    <?php endif; ?>       
                </div><!--/footer-widget-->

                <div class="footer_box left" style="margin-right: 0">
                    <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 4')) : ?>
                    <?php endif; ?>  
                </div><!--/footer-widget-->
            </div><!--/footer-widget-content-->
            
        </div><!--/wrapper-->
        <?php }?>

        <div class="copyright-content left">
            <div class="wrapper">
                <div class="footer-logo left">
                    <?php
                    $footer_logo = get_option(tk_theme_name . '_general_footer_logo');
                    if (empty($footer_logo)) {
                        $footer_logo = get_template_directory_uri() . "/style/img/logo.png";
                    }
                    ?>
                    <a href="<?php echo home_url(); ?>"><img src="<?php echo $footer_logo; ?>" alt='<?php bloginfo('name') ?>' title="<?php bloginfo('name') ?>"/></a>
                </div><!--/footer-logo-->
                
                    <?php
                    $copyright = get_theme_option(tk_theme_name . '_general_footer_copy');
                    if (empty($copyright)) {
                        $copyright = "Copyright Information Goes Here 2013. All Rights Reserved.";
                    }
                    ?> 
                <div class="copyright-text left"><?php echo $copyright ?></div><!--/copyright-text-->
            </div><!--/wrapper-->
        </div><!--/copyright-content-->
        
    </div><!--/footer-->
</div><!--/container-->

<?php wp_footer();?>
</body>
</html>