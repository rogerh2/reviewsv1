<?php get_header();
$prefix = 'tk_';
?>

    <!-- CONTENT -->
    <div class="content left">
        <div class="wrapper">
            
            <div class="full-pages left"> 
                <div class="content-left left"> 

                    <?php
                    //The Loop
                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog');
                    $post_day =  get_the_time('d');
                    $post_month =  get_the_time('M');
                    $post_cats = get_the_category_list(',', $post->ID);
                    $cat_array = explode(',', $post_cats);
                    $number_of_cats = count($cat_array);
                    $cat_counter = 1;
                    ?>              

                       <?php $format = get_post_format();
                        if($post->post_type == 'page'){ // PAGE ?>
                            <div class="blog-one left"> 
                                <div class="blog-one-content-text left">
                                    <div class="latest-news-images left">
                                        <span><?php echo $post_day?></span>
                                        <p><?php echo $post_month?></p>
                                    </div><!--/latest-news-images-->
                                    <div class="latest-news-text-content right">
                                        <div class="latest-news-title left"><a href="<?php the_permalink()?>"><?php the_title()?></a></div><!--/latest-news-category-->
                                        <div class="latest-news-text left"><?php the_excerpt()?></div><!--/latest-news-text-->
                                    </div><!--/latest-news-text-content-->
                                </div><!-- /blog-one-content-text -->
                            </div><!-- /blog-one -->  
                            <?php }else{
                        if($format == 'gallery'){ // POST FORMAT GALLERY
                            $slide_images = get_post_meta($post->ID, $prefix.'repeatable', true); ?>
                            <div class="blog-one left"> 
                                <div class="blog-one-images left">
                                    <div class="flexslider">
                                        <ul class="slides">
                                            <?php foreach($slide_images as $one_image){?>
                                            <li>
                                                <div class="slider-images left">
                                                    <?php if(!empty($slide_images)){?><img src="<?php tk_get_thumb(720, 400, $one_image); ?>" /><?php }?>                       
                                                </div><!--/slider-images-->
                                            </li>
                                            <?php }?>
                                        </ul>
                                    </div><!--/flexslider-->
                                </div><!-- /blog-one-images -->
                                <div class="blog-one-content-text left">
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
                                        <div class="latest-news-text left"><?php the_excerpt()?></div><!--/latest-news-text-->
                                    </div><!--/latest-news-text-content-->
                                </div><!-- /blog-one-content-text -->
                            </div><!-- /blog-one -->
                        <?php }elseif($format == 'video'){ // POST FORMAT VIDEO
                            $video_link = get_post_meta($post->ID, $prefix.'video_link', true);?>
                            <div class="blog-one left"> 
                                <div class="blog-one-images left">
                                    <div class="blog-one-video left">
                                        <?php tk_video_player($video_link);?>
                                    </div><!-- /blog-one-video -->
                                </div><!-- /blog-one-images -->
                                <div class="blog-one-content-text left">
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
                                        <div class="latest-news-text left"><?php the_excerpt()?></div><!--/latest-news-text-->
                                    </div><!--/latest-news-text-content-->
                                </div><!-- /blog-one-content-text -->
                            </div><!-- /blog-one -->
                        <?php }elseif($format == 'audio'){ // POST FORMAT AUDIO
                            ?>
                            <div class="blog-one left"> 
                                <div class="blog-one-images left">
                                    <div class="blog-one-link left">
                                        <div class="blog-player left">
                                            
                                            <?php tk_jplayer($post->ID); ?>
                                            
                                            <div id="jquery_jplayer_<?php echo $post->ID?>" class="jp-jplayer"></div>
                                            <div id="jp_container_<?php echo $post->ID?>" class="jp-audio">
                                                <div class="jp-type-single">
                                                    <div class="jp-gui jp-interface" id="jp_interface_<?php echo $post->ID; ?>">
                                                        <ul class="jp-controls">
                                                            <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                                                            <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
                                                            <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                                                            <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
                                                        </ul>
                                                        <div class="jp-progress">
                                                            <div class="jp-seek-bar">
                                                                <div class="jp-play-bar"></div>
                                                            </div>
                                                        </div>
                                                        <div class="jp-volume-bar">
                                                            <div class="jp-volume-bar-value"></div>
                                                        </div>
                                                    </div>
                                                    <div class="jp-no-solution">
                                                        <span>Update Required</span>
                                                        To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                                                    </div>
                                                </div>
                                            </div><!--/#jp_container_1-->
                                        </div><!--/blog-player-->
                                    </div><!-- /blog-one-link -->
                                </div><!-- /blog-one-images -->
                                <div class="blog-one-content-text left">
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
                                        <div class="latest-news-text left"><?php the_excerpt()?></div><!--/latest-news-text-->
                                    </div><!--/latest-news-text-content-->
                                </div><!-- /blog-one-content-text -->
                            </div><!-- /blog-one -->  
                        <?php }elseif($format == 'quote'){ // POST FORMAT QUOTE
                            $quote_text = get_post_meta($post->ID, $prefix.'quote', true);
                            $quote_author = get_post_meta($post->ID, $prefix.'quote_author', true);?>
                            <div class="blog-one left"> 
                                <div class="blog-one-images left">
                                    <div class="blog-one-quote left">
                                        <img src="<?php echo get_template_directory_uri()?>/style/img/blog-one-quote.png" alt="images" title="images" />
                                        <span><?php echo $quote_text?></span>
                                        <p><?php echo $quote_author?></p>
                                    </div><!-- /blog-one-quote -->
                                </div><!-- /blog-one-images -->
                                <div class="blog-one-content-text left">
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
                                        <div class="latest-news-text left"><?php the_excerpt()?></div><!--/latest-news-text-->
                                    </div><!--/latest-news-text-content-->
                                </div><!-- /blog-one-content-text -->
                            </div><!-- /blog-one --> 
                        <?php }elseif($format == 'link'){ // POST FORMAT LINK
                            $link_text = get_post_meta($post->ID, $prefix.'link_text', true);
                            $link_url = get_post_meta($post->ID, $prefix.'link_url', true);?>
                            <div class="blog-one left"> 
                                <div class="blog-one-images left">
                                    <div class="blog-one-link left">
                                        <div class="blog-one-big-link left"><a href="<?php echo $link_url?>"><?php echo $link_text?></a></div>
                                        <div class="blog-one-small-link left"><a href="<?php echo $link_url?>"><?php echo $link_url?></a></div>
                                    </div><!-- /blog-one-link -->
                                </div><!-- /blog-one-images -->
                                <div class="blog-one-content-text left">
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
                                        <div class="latest-news-text left"><?php the_excerpt()?></div><!--/latest-news-text-->
                                    </div><!--/latest-news-text-content-->
                                </div><!-- /blog-one-content-text -->
                            </div><!-- /blog-one -->
                        <?php }elseif($format == 'image'){ // POST FORMAT IMAGE
                            ?>
                            <div class="blog-one format-image left"> 
                                <div class="blog-one-images left">
                                    <a href="<?php the_permalink()?>">
                                        <?php if(!empty($image)){?>
                                            <img src="<?php echo $image[0]; ?>" alt="<?php echo the_title() ?>" title="<?php echo the_title() ?>" />
                                        <?php  } // if has image set?>
                                        <div class="hover-blog"><h2></h2><span><p></p></span></div>
                                    </a>
                                </div><!-- /blog-one-images -->
                                <div class="blog-one-content-text left">
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
                                    </div><!--/latest-news-text-content-->
                                </div><!-- /blog-one-content-text -->
                            </div><!-- /blog-one -->
                        <?php }elseif($format == 'aside'){ // POST FORMAT ASIDE
                            ?>
                            <div class="blog-one left"> 
                                <div class="blog-one-content-text left">
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
                                        <div class="latest-news-text left"><?php the_excerpt()?></div><!--/latest-news-text-->
                                    </div><!--/latest-news-text-content-->
                                </div><!-- /blog-one-content-text -->
                            </div><!-- /blog-one -->
                        <?php }else{ // POST FORMAT STANDARD
                            ?>
                            <div class="blog-one left"> 
                                <?php if(!empty($image)){?>
                                <div class="blog-one-images left">
                                    <a href="<?php the_permalink()?>">
                                            <img src="<?php echo $image[0]; ?>" alt="<?php echo the_title() ?>" title="<?php echo the_title() ?>" />
                                        <div class="hover-blog"><h2></h2><span><p></p></span></div>
                                    </a>
                                </div><!-- /blog-one-images -->
                                <?php  } // if has image set?>
                                <div class="blog-one-content-text left">
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
                                        <div class="latest-news-text left"><?php the_excerpt()?></div><!--/latest-news-text-->
                                    </div><!--/latest-news-text-content-->
                                </div><!-- /blog-one-content-text -->
                            </div><!-- /blog-one -->         
                        <?php } } // if  checking format type ?>
                            
                    <?php endwhile; ?>
                    <?php else: ?>
                    <?php endif; ?>
                    
                    <!--PAGINATION-->
                    <div class="pagination left tk-pagination">
                        <?php
                        global $wp_query;

                        $big = 999999999; // need an unlikely integer

                        $pageing =  paginate_links( array(
                                'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                                'format' => '?paged=%#%',
                                'current' => max( 1, get_query_var('paged') ),
                                'total' => $wp_query->max_num_pages
                        ) );
                        echo $pageing;
                        ?>
                    </div><!--/pagination-->
                    
                </div><!-- /content-left -->
                
            <!--SIDBAR-->
            <?php tk_get_right_sidebar('Right', 'Archive/Search')?>
                
            </div><!-- /full-pages -->
            
        </div><!-- /wrapper -->
    </div><!--/content-->

<?php get_footer(); ?>