        
<?php

        /*************************************************************/
        /************COLOR SCHEME**********************************/
        /*************************************************************/

            $link_color = get_theme_option(tk_theme_name.'_colors_link_color');
        ?>                
                    
<style type="text/css">

    /*BODY*/ 
    .project-home-button a:hover, .latest-news-category ul li a:hover, a:hover,
    .latest-news-title a:hover, .copyright-text a:hover, .footer_box .textwidget a,
    .footer_box ul li a:hover, .footer_box .box-twitter-center a:hover , .footer_box .tagcloud a:hover, 
    .footer_box .recentcomments a:hover, .footer_box tbody a, .footer_box tfoot a:hover,
    .shortcodes a, .blog-one-big-link a:hover, .blog-one-small-link a, .older-entries a:hover, 
    .tk-pagination a:hover , .sidebar_widget_holder .textwidget a, .sidebar_widget_holder .app_recent_title a:hover , 
    .sidebar_widget_holder .box-twitter-center a:hover, .sidebar_widget_holder ul li a:hover, .sidebar_widget_holder .tagcloud a:hover, 
    .sidebar_widget_holder tbody a, .sidebar_widget_holder tfoot a:hover, .sidebar_widget_holder .app_recent_comments .app_recent_user a:hover, 
    .comment-start-title a:hover,  .page-404 a:hover, .portfolio-single-prev a:hover, .portfolio-single-next a:hover, 
    .portfolio-single-by a:hover, .blog-one-quote p
    {color: <?php echo '#'.$link_color?>;}
    
    .header-nav nav ul li a:hover, .header-nav nav ul li.active a,
    .header-nav .current-menu-item > a, .sfHover > a, .portfolio-category-link nav ul li.active a, .active-project, 
    .portfolio-category-link nav ul li a:hover, .portfolio-category-link nav ul li.active a
    {color: <?php echo '#'.$link_color?>!important;}

</style>                      