<?php

get_header(); ?>

    <!-- CONTENT -->
    <div class="content left">
        <div class="wrapper">
              
            <div class="full-pages left"> 
                <div class="content-left left"> 

                    <div class="page-404 left"> 
                        <h2><?php _e("404 - Error", tk_theme_name)?></h2>
                        <p><?php _e("Looks like the page you were looking for does not exist. Sorry about that.", tk_theme_name)?></p>
                        <span><?php _e("Check the web address for typos, or go to", tk_theme_name)?>  <a href="<?php echo home_url()?>"><?php _e("Home page", tk_theme_name)?></a></span>
                    </div><!-- /page-404 -->                    
       
                </div><!-- /content-left -->
                
            <!--SIDBAR-->
            <?php tk_get_right_sidebar('Right', 'Default')?>
                
            </div><!-- /full-pages -->
            
        </div><!-- /wrapper -->
    </div><!--/content-->


    
<?php get_footer(); ?>
