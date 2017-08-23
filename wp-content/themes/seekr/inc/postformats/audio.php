<?php 
$like_count = get_post_meta($post->ID, 'likes', true);
if($like_count ==''){$like_def = 0;}
if(is_single()){
?>

        <div class="aside-pages left">
            <div class="audio-single left">
                
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
            </div><!--/audio-single-->
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

<?php }else{?>

    <div class="home-portfolio-one left">
        <div class="home-portfolio-player left">

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

        </div><!--/home-portfolio-player-->
        <div class="home-portfolio-title left"><a href="<?php the_permalink()?>"><?php the_title()?></a></div><!--/home-portfolio-title-->
        <div class="home-portfolio-like-comments left">
            <div class="border-top-category left"></div><!--/border-top-category-->
            <div class="icon-like left like-<?php echo $post->ID?> click-<?php echo $post->ID?>"><a><p></p></a><span class="count-<?php echo $post->ID?>"><?php if($like_count !='' ){echo $like_count->count;}else{echo $like_def;}?></span></div><!--/icon-like-->
            <div class="icon-comments left"><a href="#"><p></p></a><span><?php comments_number( '0', '1', '%' ); ?></span></div>
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