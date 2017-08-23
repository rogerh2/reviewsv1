<?php
$prefix = 'tk_';
$slide_images = get_post_meta($post->ID, $prefix.'repeatable', true);
$like_count = get_post_meta($post->ID, 'likes', true);
if($like_count ==''){$like_def = 0;}
$images = '';
$images_large = '';
if(!empty($slide_images)){
    foreach($slide_images as $slide) {

    if($slide != ''){
    $images_large .= '<li> <div class="slider-images left"><img src="'.$slide.'" width="610"/></div></li>';
    $images .= '<li> <div class="slider-images left"><img src="'.tk_get_thumb_new(260, 195, $slide).'"/></div></li>';
    }
}
}
if(is_single()){?>

        <div class="aside-pages left"> 
            <div class="gallery-loader" id="gallery-loader" style="height:250px"></div>
            <div class="gallery-single left" style="display:none">
                <div class="flexslider">
                    <ul class="slides">
                        <?php if($images_large != ''){echo $images_large;}?>
                    </ul>
                </div><!--/flexslider-->
            </div><!--/gallery-single-->
            <div class="home-portfolio-like-comments left">
                <div class="border-top-category left"></div><!--/border-top-category-->
                <div class="icon-like left like-<?php echo $post->ID?> click-<?php echo $post->ID?>"><a><p></p></a><span class="count-<?php echo $post->ID?>"><?php if($like_count !='' ){echo $like_count->count;}else{echo $like_def;}?></span></div><!--/icon-like-->
                <div class="icon-comments left"><a href="<?php the_permalink()?>"><p></p></a><span><?php comments_number( '0', '1', '%' ); ?></span></div>
                <div class="ajax-msg-<?php echo $post->ID?> ajax-msg-look"></div>
            </div><!--/home-portfolio-like-comments-->
            <div class="home-portfolio-text left">
            <h2><?php the_title()?></h2>
                <div class="shortcodes left">
                    <?php the_content()?>
                </div><!--/post-single-text-->
            </div><!--/home-portfolio-text-->
            <div class="aside-category-content left">
                <div class="aside-category-border left"></div><!--/aside-category-border-->
                <div class="aside-category left">
                    <ul><li><img src="<?php echo get_template_directory_uri()?>/style/img/aside-category.png" alt="images" title="images"></li></ul>
                    <?php echo get_the_tag_list('<ul><li>','</li><li>','</li></ul>'); ?>
                </div><!--/aside-category-->
            </div><!--/aside-category-content-->                    
        </div><!--/aside-pages-->    

        <script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery('.gallery-single').imagesLoaded(function(){
                    jQuery('.gallery-loader').attr('style', 'display:none');
                    jQuery('.gallery-single').attr('style', 'display:block');
                })
            })
        </script>   
        
        
<?php }else{?>                

    <div class="home-portfolio-one left">
        <div class="home-portfolio-slider left">
            <div class="flexslider">
                <ul class="slides">
                    <?php if($images != ''){echo $images;}?>
                </ul>
            </div><!--/flexslider-->
        </div><!--/home-portfolio-slider-->
        <div class="home-portfolio-title left"><a href="<?php the_permalink()?>"><?php the_title()?></a></div><!--/home-portfolio-title-->
        <div class="home-portfolio-like-comments left">
            <div class="border-top-category left"></div><!--/border-top-category-->
                <div class="icon-like left like-<?php echo $post->ID?> click-<?php echo $post->ID?>"><a><p></p></a><span class="count-<?php echo $post->ID?>"><?php if($like_count !='' ){echo $like_count->count;}else{echo $like_def;}?></span></div><!--/icon-like-->
                <div class="icon-comments left"><a href="<?php the_permalink()?>"><p></p></a><span><?php comments_number( '0', '1', '%' ); ?></span></div>
                <div class="ajax-msg-<?php echo $post->ID?> ajax-msg-look"></div>
        </div><!--/home-portfolio-like-comments-->
        <div class="home-portfolio-text left">
            <p><?php the_excerpt_length(280)?></p>
        </div><!--/home-portfolio-text-->
    </div><!--/home-portfolio-one-->
<?php }?>
    
        
        <script type="text/javascript">
            jQuery(document).ready(function(){
                
                jQuery('.click-<?php echo $post->ID?> a').live('click', function(){
                    jQuery.ajax({
                      type: "POST",
                      url: "index.php",
                      data: "id=<?php echo $post->ID?>"
                    }).done(function( msg ) {
                        if(msg == 'true'){
                            var count = jQuery('.count-<?php echo $post->ID?>').html();
                            count = parseInt(count) + 1;
                            jQuery('.count-<?php echo $post->ID?>').html('').html(count);
                            jQuery('.click-<?php echo $post->ID?>').removeClass('click-<?php echo $post->ID?>');
                            jQuery('.like-<?php echo $post->ID?> p').attr('style', 'top:-8px!important');
                        }
                        if(msg == 'false'){
                            jQuery('.ajax-msg-<?php echo $post->ID?>').append('<?php _e('Liked', tk_theme_name)?>');
                            jQuery('.click-<?php echo $post->ID?>').removeClass('click-<?php echo $post->ID?>');
                            jQuery('.like-<?php echo $post->ID?> p').attr('style', 'top:-8px!important');
                        }
                    });
                })
            })
        </script>