<?php get_header();
$prefix = 'tk_';
$author_name = get_post_meta($post->ID, $prefix.'project_author', true);
$author_url = get_post_meta($post->ID, $prefix.'author_url', true);
?>

    <!-- CONTENT -->
    <div class="content left">
        <div class="wrapper">
              
            <div class="full-pages left"> 
                            <?php
                            $format = get_post_format();
                            if($format == 'gallery'){
                                $slide_images = get_post_meta($post->ID, $prefix.'repeatable', true); ?>
                                <style>.flex-control-nav li{margin-right: 6px!important}</style>
                                <div class="portfolio-single-images left">
                                    <div class="portfolio-single-images-top left"><img src="<?php echo get_template_directory_uri()?>/style/img/bg-portfolio-single-top.png" alt="images" title="images" /></div>
                                    <div class="portfolio-single-images-center left">
                                        <div class="portfolio-loader2" id="portfolio-loader2" style="height: 400px;display: inline-block;width: 100%"></div>
                                        <div class="flexslider">
                                            <ul class="slides">
                                                <?php foreach($slide_images as $one_image){?>
                                                <li>
                                                    <div class="slider-images left">
                                                        <?php if(!empty($slide_images)){?><img src="<?php echo $one_image ?>" /><?php }?>                       
                                                    </div><!--/slider-images-->
                                                </li>
                                                <?php }?>
                                            </ul>
                                        </div><!--/flexslider-->
                                    </div><!-- /portfolio-single-images-center -->
                                    <div class="portfolio-single-images-down left"><img src="<?php echo get_template_directory_uri()?>/style/img/bg-portfolio-single-down.png" alt="images" title="images" /></div>
                                </div><!-- /portfolio-single-images -->
                            <?php }elseif($format == 'video'){
                                $video_link = get_post_meta($post->ID, $prefix.'video_link', true);?>
                                <div class="portfolio-single-images left">
                                    <div class="portfolio-single-images-top left"><img src="<?php echo get_template_directory_uri()?>/style/img/bg-portfolio-single-top.png" alt="images" title="images" /></div>
                                    <div class="portfolio-single-images-center left">
                                        <div class="portfolio-loader2" id="portfolio-loader2" style="display: none!important"></div>
                                        <style>.portfolio-single-images-center .holder{margin-left: 5px!important}</style>
                                        <?php if(!empty($video_link)){?>
                                            <?php tk_video_player($video_link);?>
                                        <?php  } // if has image set?>
                                    </div><!-- /portfolio-single-images-center -->
                                    <div class="portfolio-single-images-down left"><img src="<?php echo get_template_directory_uri()?>/style/img/bg-portfolio-single-down.png" alt="images" title="images" /></div>
                                </div><!-- /portfolio-single-images -->
                            <?php }elseif($format == 'image'){
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');?>
                                <div class="portfolio-single-images left">
                                    <div class="portfolio-single-images-top left"><img src="<?php echo get_template_directory_uri()?>/style/img/bg-portfolio-single-top.png" alt="images" title="images" /></div>
                                    <div class="portfolio-single-images-center left">
                                        <div class="portfolio-loader2" id="portfolio-loader2" style="height: 400px;display: inline-block;width: 100%"></div>
                                        <?php if(!empty($image)){?>
                                            <img src="<?php echo $image[0]; ?>" alt="<?php echo the_title() ?>" title="<?php echo the_title() ?>" />
                                        <?php  } // if has image set?>
                                    </div><!-- /portfolio-single-images-center -->
                                    <div class="portfolio-single-images-down left"><img src="<?php echo get_template_directory_uri()?>/style/img/bg-portfolio-single-down.png" alt="images" title="images" /></div>
                                </div><!-- /portfolio-single-images -->
                            <?php }else{
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');?>
                                <div class="portfolio-single-images left">
                                    <div class="portfolio-single-images-top left"><img src="<?php echo get_template_directory_uri()?>/style/img/bg-portfolio-single-top.png" alt="images" title="images" /></div>
                                    <div class="portfolio-single-images-center left">
                                        <div class="portfolio-loader2" id="portfolio-loader2" style="height: 400px;display: inline-block;width: 100%"></div>
                                        <?php if(!empty($image)){?>
                                            <img src="<?php echo $image[0]; ?>" alt="<?php echo the_title() ?>" title="<?php echo the_title() ?>" />
                                        <?php  } // if has image set?>
                                    </div><!-- /portfolio-single-images-center -->
                                    <div class="portfolio-single-images-down left"><img src="<?php echo get_template_directory_uri()?>/style/img/bg-portfolio-single-down.png" alt="images" title="images" /></div>
                                </div><!-- /portfolio-single-images -->
                            <?php } // if  checking format type ?>        
                
                <div class="portfolio-single-links right">   
                    
                    <?php
                        $prev_post = get_previous_post();
                        $next_post = get_next_post();
                        $project_url = get_option('id_projects_page');
                    ?>  
                    
                    <div class="portfolio-single-nav right">
                        <div class="portfolio-single-prev left"><?php if(!empty($prev_post)){ ?><a href="<?php echo $prev_post->guid; ?>"><?php _e('Prev', tk_theme_name) ?></a><?php }else{?><a style="background-color: #F7F7F7;color: #D8D8D8;"><?php _e('Prev', tk_theme_name) ?></a><?php }?></div>
                        <div class="portfolio-single-home"><a href="<?php echo get_permalink($project_url); ?>"></a></div><!-- /portfolio-single-home -->
                        <div class="portfolio-single-next right"><?php if(!empty($next_post)){?><a href="<?php echo $next_post->guid; ?>"><?php _e('Next', tk_theme_name) ?></a><?php }else{?><a style="background-color: #F7F7F7;color: #D8D8D8;"><?php _e('Next', tk_theme_name) ?></a><?php }?></div>
                    </div><!-- /portfolio-single-nav -->
                    
                    <div class="portfolio-single-title left"><?php the_title()?></div><!-- /portfolio-single-title -->
                    
                    <div class="portfolio-single-by left">
                        <?php if(!empty($author_name)){?><span><p><?php _e('By:', tk_theme_name) ?></p><?php echo $author_name?></span><?php }?>
                        <a href="<?php echo $author_url?>"><?php echo $author_url?></a>
                    </div><!-- /portfolio-single-by -->
                    
                </div><!-- /portfolio-single-links -->
                
                <div class="portfolio-single-text left">
                    <div class="shortcodes left">
                        <?php
                            wp_reset_query();
                            if ( have_posts() ) : while ( have_posts() ) : the_post();
                                    the_content();
                                endwhile;
                            else:
                            endif;
                            wp_reset_query();
                            ?>
                    </div><!--/post-single-text-->
                </div><!-- /portfolio-single-text -->
            </div><!-- /full-pages -->
            
        </div><!-- /wrapper -->
    </div><!--/content-->

<?php get_footer(); ?>