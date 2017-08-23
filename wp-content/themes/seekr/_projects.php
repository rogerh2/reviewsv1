<?php 
/*

Template Name: Projects

*/
get_header(); 
$prefix = 'tk_';
?>

    <!-- CONTENT -->
    <div class="content left">

        <div class="wrapper">
            
            <div class="portfolio-category left">
                <div class="portfolio-category-text left"><span><?php _e('See', tk_theme_name)?></span></div><!--/portfolio-category-text-->
                <div class="portfolio-category-link right">
                    <nav>
                        <ul>
                        <li><a  href="#" data-filter="*" class="active-project"><?php _e('All', tk_theme_name) ?></a></li>
                            <?php
                              global $wpdb;
                              $post_type_ids = $wpdb->get_col("SELECT ID FROM $wpdb->posts WHERE post_type = 'projects' AND post_status = 'publish'");
                              if(!empty ($post_type_ids )){
                                $post_type_cats = wp_get_object_terms( $post_type_ids, 'ct_projects',array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'ids') );
                                if($post_type_cats){
                                  $post_type_cats = array_unique($post_type_cats);
                                }
                              }
                              $include_category = null;
                                if(!empty ($post_type_ids )){
                                     foreach ($post_type_cats as $category_list) {
                                        $cat = 	$category_list.",";
                                        $include_category = $include_category.$cat;
                                        $cat_name = get_term($category_list, 'ct_projects');
                                ?>
                            <li>
                                <a href="#" data-filter="<?php echo '.class-'.$category_list?>"><?php echo $cat_name->name ?></a>
                            </li>
                            <?php } }?>
                        </ul>   
                    </nav>
                </div><!--/portfolio-category-link-->
            </div><!--/portfolio-category-->
                
            <div class="portfolio-loader" id="portfolio-loader"></div>
            
            <div class="portfolio-content left">
                <div class="project-home-content left">
                    
                    <?php 
                            $args=array('post_type' => 'projects', 'post_status' => 'publish', 'ignore_sticky_posts'=> 1, 'posts_per_page' => -1);

                            //The Query
                            query_posts($args);

                            //The Loop
                            if ( have_posts() ) : while ( have_posts() ) : the_post();
                            $post_category = wp_get_post_terms( $post->ID, 'ct_projects' );
                            $format = get_post_format();
                            if($format == 'gallery'){
                                $slide_images = get_post_meta($post->ID, $prefix.'repeatable', true); ?>
                                <div class="project-home-one left <?php foreach($post_category as $post_cat){echo 'class-'.$post_cat->term_id.' ';}?>">
                                    <div class="project-home-images left">
                                        <a href="<?php the_permalink()?>">
                                            <div class="portfolio-hover left">
                                                <div class="portfolio-hover-title left"><?php the_title()?></div><!--/portfolio-hover-title-->
                                                <div class="portfolio-hover-text left"><?php the_excerpt_length(62)?></div><!--/portfolio-hover-text-->
                                            </div><!--/portfolio-hover-->
                                        </a>
                                        <?php if(!empty($slide_images)){?><img src="<?php tk_get_thumb(224, 224, $slide_images[0]); ?>" /><?php }?>
                                    </div><!--/project-home-images-->
                                </div><!--/project-home-one-->
                            <?php }elseif($format == 'video'){
                                $video_link = get_post_meta($post->ID, $prefix.'video_link', true);?>
                                <div class="project-home-one left <?php foreach($post_category as $post_cat){echo 'class-'.$post_cat->term_id.' ';}?> video-project">
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
                                <div class="project-home-one left <?php foreach($post_category as $post_cat){echo 'class-'.$post_cat->term_id.' ';}?>">
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
                                <div class="project-home-one left <?php foreach($post_category as $post_cat){echo 'class-'.$post_cat->term_id.' ';}?>">
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
                
            </div><!--/portfolio-content-->
            
        </div><!--/wrapper-->
    </div><!--/content-->

<?php get_footer(); ?>