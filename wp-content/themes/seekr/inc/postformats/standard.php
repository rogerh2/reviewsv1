<?php 
$like_count = get_post_meta($post->ID, 'likes', true);
if($like_count ==''){$like_def = 0;}
if(is_single()){
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
?>

        <div class="aside-pages left"> 
            <?php if(has_post_thumbnail()){?>
                <div class="image-loader" id="image-loader" style="height:250px"></div>
                <div class="images-single left" style="display:none">
                     <img src="<?php echo $image[0]; ?>" alt="<?php echo the_title() ?>" title="<?php echo the_title() ?>" />
                    <a href="<?php echo $image[0]; ?>" class="pirobox" title="<?php echo the_title() ?>" alt="<?php echo the_title() ?>"><span><p></p></span></a>
                </div><!--/images-single-->
            <?php }?>
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
                jQuery('.images-single').imagesLoaded(function(){
                    jQuery('.image-loader').attr('style', 'display:none');
                    jQuery('.images-single').attr('style', 'display:block');
                })
            })
        </script>
        
<?php }else{?>

    <div class="home-portfolio-one left">
        <?php if(has_post_thumbnail()){?>
            <div class="home-portfolio-images left">
                <?php the_post_thumbnail('image-home')?>
                <a href="<?php the_permalink()?>"><span><p></p></span></a>
            </div><!--/home-portfolio-images-->
        <?php }?>
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
                
                jQuery('.home-portfolio-images').hover(function(){
                jQuery('a',this).attr('style', 'display:block');
                   jQuery('a',this).stop().animate({opacity:1},500);
                },function(){
                   jQuery('a',this).stop().animate({opacity:0},300);
                   jQuery('a',this).attr('style', 'display:none');
                });


                jQuery('.home-portfolio-images span').hover(function(){
                    jQuery('p',this).stop().animate({top: '-26px'},300);
                },function(){
                    jQuery('p',this).stop().animate({top: '0'},300);
                });
    
                jQuery('.icon-like a').hover(function(){
                    jQuery('p',this).stop().animate({top: '-8px'},300);
                },function(){
                    jQuery('p',this).stop().animate({top: '0'},300);
                });


                jQuery('.icon-comments a').hover(function(){
                    jQuery('p',this).stop().animate({top: '-12px'},300);
                },function(){
                    jQuery('p',this).stop().animate({top: '0'},300);
                });
    
            })
        </script>