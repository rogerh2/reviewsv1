<?php get_header();
$prefix = 'tk_';
?>

    <!-- CONTENT -->
    <div class="content left">
        
            <?php
                                    /*******SLIDER******/
            
                $show_slider= get_theme_option(tk_theme_name.'_home_enable_slider');
                $show_call_to_action= get_theme_option(tk_theme_name.'_home_disable_call_to_action');
                $hide_projects= get_theme_option(tk_theme_name.'_home_disable_home_projects');
                $hide_news= get_theme_option(tk_theme_name.'_home_disable_home_news');
                $show_home_content= get_theme_option(tk_theme_name.'_home_use_home_content');
                $slider_alias = get_theme_option(tk_theme_name.'_home_slider_id');
                    if($show_slider == 'yes'){
            ?>  
        
                <div class="fullwidthbanner-container" <?php if($show_slider == 'yes' && $show_call_to_action == 'yes' && $hide_projects == 'yes' && $hide_news == 'yes' && $show_home_content != 'yes'){echo 'style="margin-bottom:-60px"';}?>>
                    <div class="fullwidthbanner">
                        <?php putRevSlider($slider_alias);?>
                    </div>
                </div>
        
            <?php } // if slider?>  
                
        <div class="wrapper">

            <?php
                                    /*******CALL TO ACTION*******/
            
                $call_to_action_title = get_theme_option(tk_theme_name.'_home_call_to_action_title');
                $call_to_action_text = get_theme_option(tk_theme_name.'_home_call_to_action_text');
                $call_to_action_button_text = get_theme_option(tk_theme_name.'_home_call_to_action_button_text');
                $call_to_action_button_url = get_theme_option(tk_theme_name.'_home_call_to_action_button_url');
                    if($show_call_to_action == 'yes') {}else{
            ?>      
            
            <div class="action-home left" <?php if($show_slider == 'yes'){echo 'style="margin-top:60px"';}?>>
                <div class="action-home-text left">
                    <span><?php echo $call_to_action_title?></span>
                    <p><?php echo $call_to_action_text?></p>
                </div><!--/action-home-text-->
                <div class="action-home-button right">
                    <a href="<?php echo $call_to_action_button_url?>">
                        <div class="action-home-button-left left"></div><!--/left-->
                        <div class="action-home-button-center left"><?php echo $call_to_action_button_text?></div><!--/center-->
                        <div class="action-home-button-right left"><span></span></div><!--/righr-->
                    </a>
                </div><!--/action-home-button-->
            </div><!--/action-home-->

            <?php } // if call to action?> 

            <?php
                                    /*******HOME CONTENT*******/
            
            
            if ($show_home_content == 'yes' ){?>
            <div class="action-home left margin-top60">
                <div class="shortcodes home_div">
                        <?php
                        /* Run the loop to output the page.
                                                 * If you want to overload this in a child theme then include a file
                                                 * called loop-page.php and that will be used instead.
                        */
                        wp_reset_query();
                        query_posts( 'page_id=' . get_theme_option(tk_theme_name.'_home_home_content') );
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                                the_content();
                            endwhile;
                        else:
                        endif;
                        wp_reset_query();
                        ?>
                </div><!--/wrapper-->
            </div><!--/wrapper-->
            <?php }?>
            
            
            <?php
                                    /*******PROJECTS SECTION*******/
            
                $projects_text = get_theme_option(tk_theme_name.'_home_projects_text');
                $projects_category = get_theme_option(tk_theme_name.'_home_projects_cat');
                $projects_per_page = get_theme_option(tk_theme_name.'_home_projects_number');
                $projects_id =  get_option('id_projects_page');
                $projects_url = get_permalink($projects_id);
                
                    if($hide_projects == 'yes') {}else{
            ?>     
            
            <div class="project-home left">                
                <div class="project-home-title left"><span><?php _e('Our Projects: ', tk_theme_name) ?></span></div><!--/project-home-title-->
                <div class="project-home-text left"><?php echo $projects_text?></div><!--/project-home-text-->
                <div class="project-home-content left">
                    
                    <?php 
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
                            
                            if($projects_category ==0) {
                                $args=array('post_type' => 'projects', 'post_status' => 'publish', 'posts_per_page' => $projects_per_page, 'ignore_sticky_posts'=> 1);
                            } else {
                                $args=array('tax_query' => array(array('taxonomy' => 'ct_projects','field' => 'term_id', 'terms' => $projects_category)), 'post_type' => 'projects', 'post_status' => 'publish', 'posts_per_page' => $projects_per_page, 'ignore_sticky_posts'=> 1);
                            }
                            //The Query
                            query_posts($args);

                            //The Loop
                            if ( have_posts() ) : while ( have_posts() ) : the_post();
                            $format = get_post_format();
                            if($format == 'gallery'){
                                $slide_images = get_post_meta($post->ID, $prefix.'repeatable', true); ?>
                                <div class="project-home-one left">
                                    <div class="project-home-images left">
                                        <a href="<?php the_permalink()?>">
                                            <div class="portfolio-hover left">
                                                <div class="portfolio-hover-title left"><?php the_title()?></div><!--/portfolio-hover-title-->
                                                <div class="portfolio-hover-text left"><?php the_excerpt_length(62)?></div><!--/portfolio-hover-text-->
                                            </div><!--/portfolio-hover-->
                                        </a>
                                        <?php if(!empty($slide_images)){?><img src="<?php tk_get_thumb(224, 224, $slide_images[0]); ?>" alt="<?php echo the_title() ?>" title="<?php echo the_title() ?>" /><?php }?>
                                    </div><!--/project-home-images-->
                                </div><!--/project-home-one-->
                            <?php }elseif($format == 'video'){
                                $video_link = get_post_meta($post->ID, $prefix.'video_link', true);?>
                                <div class="project-home-one left video-project">
                                    <div class="project-home-images left">
                                        <a href="<?php the_permalink()?>">
                                            <div class="portfolio-hover left">
                                                <div class="portfolio-hover-title left"><?php the_title()?></div><!--/portfolio-hover-title-->
                                                <div class="portfolio-hover-text left"><?php the_excerpt_length(62)?></div><!--/portfolio-hover-text-->
                                            </div><!--/portfolio-hover-->
                                        </a>
                                        <?php if(!empty($video_link)){get_video_image($video_link, $post->ID); }?>
                                    </div><!--/project-home-images-->
                                </div><!--/project-home-one-->
                            <?php }elseif($format == 'image'){
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'projects');?>
                                <div class="project-home-one left">
                                    <div class="project-home-images left">
                                        <a href="<?php the_permalink()?>">
                                            <div class="portfolio-hover left">
                                                <div class="portfolio-hover-title left"><?php the_title()?></div><!--/portfolio-hover-title-->
                                                <div class="portfolio-hover-text left"><?php the_excerpt_length(62)?></div><!--/portfolio-hover-text-->
                                            </div><!--/portfolio-hover-->
                                        </a>
                                        <?php if(!empty($image)){?>
                                            <img src="<?php echo $image[0]; ?>" alt="<?php echo the_title() ?>" title="<?php echo the_title() ?>" />
                                        <?php  } // if has image set?>
                                    </div><!--/project-home-images-->
                                </div><!--/project-home-one-->
                            <?php }else{
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'projects');?>
                                <div class="project-home-one left">
                                    <div class="project-home-images left">
                                        <a href="<?php the_permalink()?>">
                                            <div class="portfolio-hover left">
                                                <div class="portfolio-hover-title left"><?php the_title()?></div><!--/portfolio-hover-title-->
                                                <div class="portfolio-hover-text left"><?php the_excerpt_length(62)?></div><!--/portfolio-hover-text-->
                                            </div><!--/portfolio-hover-->
                                        </a>
                                        <?php if(!empty($image)){?>
                                            <img src="<?php echo $image[0]; ?>" alt="<?php echo the_title() ?>" title="<?php echo the_title() ?>" />
                                        <?php  } // if has image set?>
                                    </div><!--/project-home-images-->
                                </div><!--/project-home-one-->
                            <?php } // if  checking format type ?>

                    <?php endwhile; ?>
                    <?php else: ?>
                    <?php endif; ?>   
                    
                </div><!--/project-home-content-->
                <div class="project-home-button left"><a href="<?php echo $projects_url?>"><?php _e('View all projects ', tk_theme_name) ?></a></div><!--/project-home-one-->
            </div><!--/project-home-->
       
            <?php } // if projects?> 
            
            
            <?php
                                    /*******LATEST NEWS SECTION*******/
            
                $news_text = get_theme_option(tk_theme_name.'_home_news_text');
                $news_per_page = get_theme_option(tk_theme_name.'_home_news_number');
                $blog_id =  get_option('id_blog_page');
                $blog_url = get_permalink($blog_id);
                    if($hide_news == 'yes') {}else{
            ?>  
            
            <div class="latest-news-home left">
                <div class="project-home-title left"><span><?php _e('Latest News ', tk_theme_name) ?></span></div><!--/project-home-title-->
                <div class="project-home-text left"><?php echo $news_text?></div><!--/project-home-text-->
                <div class="latest-news-content left">
                    
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
                    $args=array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => $news_per_page, 'ignore_sticky_posts'=> 1);

                    //The Query
                    query_posts($args);

                    //The Loop
                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                    $post_day =  get_the_time('d');
                    $post_month =  get_the_time('M');
                    $post_cats = get_the_category_list(',', $post->ID);
                    $cat_array = explode(',', $post_cats);
                    $number_of_cats = count($cat_array);
                    $cat_counter = 1;
                    ?>                
                    
                    <div class="latest-news-one left">
                        <div class="latest-news-images left">
                            <span><?php echo $post_day?></span>
                            <p><?php echo $post_month?></p>
                        </div><!--/latest-news-images-->
                        <div class="latest-news-text-content right">
                            <div class="latest-news-category left">
                                <ul>
                                    <?php foreach ($cat_array as $one_cat){?>
                                        <li><?php echo $one_cat?><?php if($number_of_cats != $cat_counter){echo ', ';}?></li>
                                    <?php $cat_counter++;} // end foreach?>
                                    <li><span>-</span></li>
                                    <li><a href="<?php the_permalink()?>#comment"><?php comments_number( '0', '1', '%' ); ?> <?php _e('Comments', tk_theme_name) ?></a></li>
                                </ul>
                            </div><!--/latest-news-category-->
                            <div class="latest-news-title left"><a href="<?php the_permalink()?>"><?php the_title()?></a></div><!--/latest-news-category-->
                            <div class="latest-news-text left"><?php the_excerpt_length(160)?></div><!--/latest-news-text-->
                        </div><!--/latest-news-text-content-->
                    </div><!--/latest-news-one-->
                    
                <?php endwhile; ?>
                <?php else: ?>
                <?php endif; ?>
                    
                </div><!--/latest-news-content-->
                <div class="project-home-button left"><a href="<?php echo $blog_url?>"><?php _e('View all news', tk_theme_name) ?></a></div><!--/project-home-one-->
            </div><!--/latest-news-home-->
             
            <?php } // if news?> 
            
        </div><!--/wrapper-->
    </div><!--/content-->


<?php get_footer(); ?>