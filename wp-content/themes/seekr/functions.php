<?php
global $wpdb;

require(  get_template_directory() . '/inc/theme-settings.php');                //Building theme administration

require(  get_template_directory() . '/inc/meta-boxes.php');                    //Building meta boxes

require(  get_template_directory() . '/inc/post-types.php');                    //Building post types

require(  get_template_directory() . '/inc/custom-taxonomies.php');             //Building post types

function tk_theme_name(){
    return 'seekr';
}
define( 'tk_theme_name', 'seekr' );
update_option('tk_theme_name', tk_theme_name);

$lang = get_template_directory() . '/languages/';                               //Make this theme available for translation.
load_theme_textdomain(tk_theme_name, $lang);

add_theme_support( 'automatic-feed-links' );                                    //Add default posts and comments RSS feed links to <head>

add_theme_support( 'post-thumbnails' );                                         //This enables Post Thumbnails support for this theme.
        add_image_size( 'projects', 224 , 224 , true );
        add_image_size( 'gallery-post', 720 , 400 , true );
        add_image_size( 'blog', 720 , 9999);

register_nav_menu( 'primary', __( 'Primary Menu', tk_theme_name ) );                //This theme uses wp_nav_menu()

//THEME NAME
$tk_theme_name = tk_theme_name;

function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');



        /*************************************************************/
        /************LOAD STYLES************************************/
        /*************************************************************/

        function tk_add_stylesheet() {
                wp_register_style('main_style', get_bloginfo('stylesheet_url'));
                wp_enqueue_style('main_style');
                wp_register_style('superfish', get_template_directory_uri().'/script/menu/superfish.css');
                wp_enqueue_style('superfish');
                wp_register_style('pirobox', get_template_directory_uri().'/script/pirobox/css/demo5/style.css');
                wp_enqueue_style('pirobox');
                wp_register_style('flexslider', get_template_directory_uri().'/script/flexslider/flexslider.css');
                wp_enqueue_style('flexslider');
                wp_register_style('scroll-button', get_template_directory_uri().'/script/scroll-button/scroll-button.css');
                wp_enqueue_style('scroll-button');
                wp_register_style('jplayer', get_template_directory_uri().'/script/jplayer/skin/blue.monday/jplayer.blue.monday.css');
                wp_enqueue_style('jplayer');

                $color_style = get_theme_option(tk_theme_name.'_'.'colors__stylechanger');          
                wp_register_style('color-style', get_template_directory_uri().'/style/stylechanger/'.$color_style.'/'.$color_style.'.css');
                wp_enqueue_style('color-style');
                
                $browser = $_SERVER['HTTP_USER_AGENT'];
                
                if (strpos($browser, 'MSIE 8.0')) {
                    wp_register_style('ie8', get_template_directory_uri().'/style/ie8.css');
                    wp_enqueue_style('ie8');
                }

                if (strpos($browser, 'MSIE 9.0')) {
                    wp_register_style('ie9', get_template_directory_uri().'/style/ie9.css');
                    wp_enqueue_style('ie9');
                }

                if (strpos($browser, 'Chrome')) {
                    wp_register_style('chrome', get_template_directory_uri().'/style/chrome.css');
                    wp_enqueue_style('chrome');
                }

                if (strpos($browser, 'Firefox')) {
                    wp_register_style('firefox', get_template_directory_uri().'/style/firefox.css');
                    wp_enqueue_style('firefox');
                }

                if (strpos($browser, 'pera')) {
                    wp_register_style('opera', get_template_directory_uri().'/style/opera.css');
                    wp_enqueue_style('opera');
                }
            }
        add_action( 'wp_enqueue_scripts', 'tk_add_stylesheet' );



        /*************************************************************/
        /************LOAD SCRIPTS***********************************/
        /*************************************************************/
        
        function tk_add_scripts() {
            wp_enqueue_script('jquery');
            wp_enqueue_script('superfish', get_template_directory_uri().'/script/menu/superfish.js' );
            wp_enqueue_script('my-commons', get_template_directory_uri().'/script/common.js' );
            wp_enqueue_script('pirobox', get_template_directory_uri().'/script/pirobox/js/pirobox.js' );
            wp_enqueue_script('contact', get_template_directory_uri().'/script/contact/contact.js' );
            wp_enqueue_script('easing', get_template_directory_uri().'/script/easing/jquery.easing.1.3.js' );
            wp_enqueue_script('elastic', get_template_directory_uri().'/script/elastic/jquery.elastic.source.js' );
            wp_enqueue_script('jscolor', get_template_directory_uri().'/script/jscolor/jscolor.js' );
            wp_enqueue_script('flexslider', get_template_directory_uri().'/script/flexslider/jquery.flexslider.js' );
            wp_enqueue_script('scroll-button', get_template_directory_uri().'/script/scroll-button/scroll-button.js' );
            wp_enqueue_script('isotope', get_template_directory_uri().'/script/isotope/jquery.isotope.min.js' );
            wp_enqueue_script('spiner', get_template_directory_uri().'/script/spiner/spin.min.js' );
            wp_enqueue_script('jplayer', get_template_directory_uri().'/script/jplayer/js/jquery.jplayer.min.js' );
            wp_enqueue_script('respond', get_template_directory_uri().'/script/respond/respond.min.js' );
            
            wp_localize_script( 'my-commons', 'objectL10n', array(
                    'goto' => __( 'Go to', tk_theme_name ),
            ) );
            
            if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
        }  
        add_action('wp_enqueue_scripts', 'tk_add_scripts');          
                        
   
        /*************************************************************/
        /************CREATE TABLES**********************************/
        /*************************************************************/
   
        if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) { 
            create_table1();
            create_table2();
        }
        function create_table1() {
           global $wpdb;
           $table_name = $wpdb->prefix . "revslider_sliders";
           $sql = "CREATE TABLE IF NOT EXISTS " . $table_name . " (
                `id` int(9) NOT NULL AUTO_INCREMENT,
                `title` tinytext NOT NULL,
                `alias` tinytext,
                `params` text NOT NULL,
                PRIMARY KEY (`id`)
              ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;";
           require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
           if(dbDelta($sql)){
               //TABLE CREATED!
           }else{
               //TABLE ISN'T CREATED
           }
        }
        function create_table2() {
           global $wpdb;
           $table_name = $wpdb->prefix . "revslider_slides";
           $sql = "CREATE TABLE IF NOT EXISTS " . $table_name . " (
                `id` int(9) NOT NULL AUTO_INCREMENT,
                `slider_id` int(9) NOT NULL,
                `slide_order` int(11) NOT NULL,
                `params` text NOT NULL,
                `layers` text NOT NULL,
                PRIMARY KEY (`id`)
              ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;";
           require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
           if(dbDelta($sql)){
               //TABLE CREATED!
           }else{
               //TABLE ISN'T CREATED
           }
        }
                        

        /*************************************************************/
        /************VIDEO PLAYER***********************************/
        /*************************************************************/

        function tk_video_player($url) {

		if(!empty($url)){
		$key_str1='youtube';
		$key_str2='vimeo';

		$pos_youtube = strpos($url, $key_str1);
		$pos_vimeo = strpos($url, $key_str2);
			if (!empty($pos_youtube)) {
			$url = str_replace('watch?v=','',$url);
			$url = explode('&',$url);
			$url = $url[0];
			$url = str_replace('http://www.youtube.com/','',$url);
		?>
			<div class="holder">
                                                        <iframe src="http://www.youtube.com/embed/<?php echo $url;?>?rel=0" frameborder="0" allowfullscreen></iframe>
			</div>
		<?php  }
		if (!empty($pos_vimeo)) {
			$url = explode('.com/',$url);
		?>

		<div class="holder">
                                    <iframe src="http://player.vimeo.com/video/<?php echo $url[1];?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
		</div>
		<?php  }
		if (empty($pos_vimeo) && empty($pos_youtube)) {

		  echo "Video only allowes vimeo and youtube!";
		}

   }}

   
   
        /*************************************************************/
        /************GET VIDEO IMAGE***********************************/
        /*************************************************************/
   
   
        function get_video_image($url, $post_ID) {

		if(!empty($url)){
		$key_str1='youtube';
		$key_str2='vimeo';

		$pos_youtube = strpos($url, $key_str1);
		$pos_vimeo = strpos($url, $key_str2);
                                if (!empty($pos_youtube)) {
			$url = str_replace('watch?v=','',$url);
			$url = explode('&',$url);
			$url = $url[0];
			$url = str_replace('http://www.youtube.com/','',$url);
		?>
                                <img src="http://img.youtube.com/vi/<?php echo $url;?>/0.jpg" title="<?php echo get_the_title($post_ID)?>" alt="<?php echo get_the_title($post_ID)?>" />
		<?php  }
		if (!empty($pos_vimeo)) {
                                    $url = explode('.com/',$url);
                                    $data = @file_get_contents("http://vimeo.com/api/v2/video/".$url[1].".json");
                        if($data){
                                    $data = file_get_contents("http://vimeo.com/api/v2/video/".$url[1].".json");
                        }else{
                            curl_setopt($ch=curl_init(), CURLOPT_URL, "http://vimeo.com/api/v2/video/".$url[1].".json");
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            $response = curl_exec($ch);
                            curl_close($ch);
                            $data = $response;
                        }
                                    $data = json_decode($data); 
                                    
                                    ?>
                                    <img src="<?php echo $data[0]->thumbnail_medium;?>" title="<?php echo get_the_title($post_ID)?>" alt="<?php echo get_the_title($post_ID)?>" />
		  <?php }
		if (empty($pos_vimeo) && empty($pos_youtube)) {

		  echo "Video only allowes vimeo and youtube!";
		}
        }}
   
   
        /*************************************************************/
        /************REGISTER POST FORMATS************************/
        /************************************************************/

            $post_formats = array( 
                                    'aside', 
                                    'gallery', 
                                    'link', 
                                    'image', 
                                    'quote', 
                                    'audio',
                                    'video');

            add_theme_support( 'post-formats', $post_formats ); 

            add_post_type_support( 'post', 'post-formats' );

            add_post_type_support( 'projects', 'post-formats' );

   
            
            
        /*************************************************************/
        /************ENQUEUE ADMINSCRIPT**************************/
        /************************************************************/

            function enqueue_admin_script($hook) {
                    if ($hook == 'post.php' || $hook == 'post-new.php') {
                            wp_register_script('adminscript', get_template_directory_uri() . '/script/adminscript/adminscript.js', 'jquery');
                            wp_enqueue_script('adminscript');
                    }
            }
            add_action('admin_enqueue_scripts','enqueue_admin_script',10,1);


   
            
        /*************************************************************/
        /************AUDIO PLAYER***********************************/
        /************************************************************/

        function tk_jplayer($postid) {
            $audio_link = get_post_meta($postid, 'tk_audio_link', true); 
              ?>
                      <script type="text/javascript">

                              jQuery(document).ready(function(){

                                  if(jQuery().jPlayer) {
                                      jQuery("#jquery_jplayer_<?php echo $postid; ?>").jPlayer({
                                          ready: function () {
                                              jQuery(this).jPlayer("setMedia", {

                                                  mp3: "<?php echo $audio_link; ?>",
                                                  end: ""
                                              });
                                          },
                                          swfPath: "<?php echo get_template_directory_uri(); ?>/script/player",
                                          cssSelectorAncestor: "#jp_interface_<?php echo $postid; ?>",
                                          supplied: "mp3, all",
                                          swfPath: "<?php echo get_template_directory_uri()?>/script/jplayer/js"
                                      });

                                  }
                              });
                      </script>
      <?php
      }

      
        /*************************************************************/
        /************GET CUSTOM THUMB SIZE***********************/
        /************************************************************/

            /*
             * $height -> height of new image
             * $width -> width of new image
             * $src -> url of image you want to get thumb from
             */
            function tk_get_thumb($width, $height, $src)
            {
                if(strpos($src, '.jpg')){
                    $new_src = explode('.jpg', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.jpg';

                            /*
                             * THIS STILL NEEDS TO BE TESTED!!!!
                            if(@fopen($new_src, 'r')){
                                echo $new_src;
                            }else{
                                echo $src;
                            }
                            */
                        echo $new_src;
                }elseif(strpos($src, '.jpeg')){
                    $new_src = explode('.jpeg', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.jpeg';
                    echo $new_src;
                }elseif(strpos($src, '.gif')){
                    $new_src = explode('.gif', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.gif';
                    echo $new_src;
                }elseif(strpos($src, '.png')){
                    $new_src = explode('.png', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.png';
                    echo $new_src;
                }
            }

            
            
        /*************************************************************/
        /************GET CUSTOM THUMB SIZE v2*********************/
        /************************************************************/  
            
            
    function tk_get_thumb_new($width, $height, $src)
            {
                if(strpos($src, '.jpg')){
                    $new_src = explode('.jpg', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.jpg';
                            /*
                             * THIS STILL NEEDS TO BE TESTED!!!!
                            if(@fopen($new_src, 'r')){
                                echo $new_src;
                            }else{
                                echo $src;
                            }
                            */
                        return $new_src;
                }elseif(strpos($src, '.jpeg')){
                    $new_src = explode('.jpeg', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.jpeg';
                    return $new_src;
                }elseif(strpos($src, '.gif')){
                    $new_src = explode('.gif', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.gif';
                    return $new_src;
                }elseif(strpos($src, '.png')){
                    $new_src = explode('.png', $src);
                    $new_src = $new_src[0].'-'.$width.'x'.$height.'.png';
                    return $new_src;
                }
            }           



            
        /*************************************************************/
        /************LOAD WIDGETS**********************************/
        /*************************************************************/

	require_once (TEMPLATEPATH . '/inc/widgets/widget-twitter.php');
	require_once (TEMPLATEPATH . '/inc/widgets/widget-newsletter.php');


        

        /*************************************************************/
        /************INCREASE IMAGE QUALITY***********************/
        /************************************************************/

            function jpeg_quality_callback($arg)
            {
            return (int)100;
            }

            add_filter('jpeg_quality', 'jpeg_quality_callback');



        /*************************************************************/
        /************REMOVE IMAGE SIZE*****************************/
        /************************************************************/

            add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
             add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
             // Removes attached image sizes as well
             add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );
             function remove_thumbnail_dimensions( $html ) {
             $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
             return $html;
             }

            
            
        /*************************************************************/
        /************IMAGE WITHOUT DIMENSIONS********************/
        /************************************************************/

            function tk_thumbnail($post_id, $img_size) {
                    $thumbnail = get_the_post_thumbnail($post_id, $img_size);
                    $thumbnail = preg_replace( '/(width|height)=\"\d*\"\s/', "", $thumbnail );
                    echo $thumbnail;
            }

            
        /*************************************************************/
        /************EXCERPT LENGTH*******************************/
        /************************************************************/

            function the_excerpt_length($charlength) {
                    $excerpt = get_the_excerpt();
                    $charlength++;

                    if ( strlen( $excerpt ) > $charlength ) {
                            $subex = substr( $excerpt, 0, $charlength - 5 );
                            $exwords = explode( ' ', $subex );
                            $excut = - ( strlen( $exwords[ count( $exwords ) - 1 ] ) );
                            if ( $excut < 0 ) {
                                    echo substr( $subex, 0, $excut );
                            } else {
                                    echo $subex;
                            }
                            echo '...';
                    } else {
                            echo $excerpt;
                    }
            }


            
        /*************************************************************/
        /************GET URL OF CURENT PAGE**********************/
        /************************************************************/

        function get_page_url(){

	$pageURL = 'http';
	if (isset($_SERVER["HTTPS"])) {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;

        }
        
        

        /*************************************************************/
        /************CHOSE SIDEBAR POSITION************************/
        /************************************************************/

        function tk_get_left_sidebar($sidebar_position, $sidebar_name) {

            $sidebar_option = get_theme_option(tk_theme_name.'_general_custom_sidebars');
            if($sidebar_position == 'Left'){
                if($sidebar_option !== 'yes') { ?>

                    <div id="sidebar" class="left">
                           <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Default/Home')) : ?>
                            <?php endif; ?>
                    </div>

               <?php } else { ?>

                    <div id="sidebar" class="left">
                           <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar($sidebar_name)) : ?>
                           <?php endif; ?>
                    </div>

            <?php }
            }
        }


        
        function tk_get_right_sidebar($sidebar_position, $sidebar_name) {
            $sidebar_option = get_theme_option(tk_theme_name.'_general_custom_sidebars');
            if($sidebar_position == 'Right'){?>
            <?php
                $sidebar_option = get_theme_option(tk_theme_name.'_general_custom_sidebars');

                if($sidebar_option !== 'yes') { ?>

            <div id="sidebar" class="right">
                   <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Default')) : ?>
                    <?php endif; ?>
            </div><!--/#sidebar-->

               <?php } else { ?>

            <div id="sidebar" class="right">
                   <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar($sidebar_name)) : ?>
                   <?php endif; ?>
            </div><!--/#sidebar-->
            <?php }
             }
        }



        /*************************************************************/
        /************REGISTERING SIDEBARS**************************/
        /************************************************************/


        if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Default',
                        'before_widget' => '<div class="sidebar_widget_holder">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h3>',
                        'after_title'   => '</h3>' )
                        );
	}

        if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Blog',
                        'before_widget' => '<div class="sidebar_widget_holder">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h3>',
                        'after_title'   => '</h3>' )
                        );
	}

        if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Page',
                        'before_widget' => '<div class="sidebar_widget_holder">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h3>',
                        'after_title'   => '</h3>' )
                        );
	}

        if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Archive/Search',
                        'before_widget' => '<div class="sidebar_widget_holder">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h3>',
                        'after_title'   => '</h3>' )
                        );
	}

        if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Contact',
                        'before_widget' => '<div class="sidebar_widget_holder">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h3>',
                        'after_title'   => '</h3>' )
                        );
	}

        if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Footer Widget 1',
                        'before_widget' => '<div class="footer_box">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h2>',
                        'after_title'   => '</h2>' )
                        );
	}

	if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Footer Widget 2',
                        'before_widget' => '<div class="footer_box">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h2>',
                        'after_title'   => '</h2>' )
                        );
	}

	if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Footer Widget 3',
                        'before_widget' => '<div class="footer_box">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h2>',
                        'after_title'   => '</h2>' )
                        );
	}

	if(function_exists('register_sidebar')){
		register_sidebar(array(
                        'name'          => 'Footer Widget 4',
                        'before_widget' => '<div class="footer_box">',
                        'after_widget'  => '</div>',
                        'before_title'  => '<h2>',
                        'after_title'   => '</h2>' )
                        );
	}


        
        /*************************************************************/
        /************SET DEFAULTS*********************************/
        /*************************************************************/
        if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
            update_option('seekr_colors_body_bg_img', get_template_directory_uri().'/style/img/bg-body.jpg');
        }



        /*************************************************************/
        /************LOAD SHORTCODES******************************/
        /*************************************************************/


        require_once (  ABSPATH.'wp-content/themes/'.tk_theme_name.'/inc/shortcodes/tinymce_loader.php');

        function enable_more_buttons($buttons) {
          $buttons[] = 'hr';
          return $buttons;
        }
        add_filter("mce_buttons", "enable_more_buttons");

        function shortcode_one_half( $atts, $content = null ) {
                extract(shortcode_atts(array(
                        'position'     	 => '',
            ), $atts));

           return '<div class="one-half '.$position.'"><p>' . do_shortcode($content) . '</p></div>';
        }

        add_shortcode('one_half', 'shortcode_one_half');

        function shortcode_one_third( $atts, $content = null ) {
                extract(shortcode_atts(array(
                        'position'     	 => '',
            ), $atts));

           return '<div class="one-third '.$position.'"><p>' . do_shortcode($content) . '</p></div>';
        }

        add_shortcode('one_third', 'shortcode_one_third');

        function shortcode_one_fourth( $atts, $content = null ) {
                extract(shortcode_atts(array(
                        'position'     	 => '',
            ), $atts));

           return '<div class="one-fourth '.$position.'"><p>' . do_shortcode($content) . '</p></div>';
        }

        add_shortcode('one_fourth', 'shortcode_one_fourth');


        function shortcode_button( $atts, $content = null ) {

                extract(shortcode_atts(array(
                        'url'     	 => '#',
                        'style'   => 'black',
            ), $atts));

           return '<div class="color-buttons color-button-'.$style.' left"><a href="'.$url.'">' . do_shortcode($content) . '</a></div>';
        }

        add_shortcode('button', 'shortcode_button');


        function shortcode_list( $atts, $content = null ) {

                extract(shortcode_atts(array(
                        'style'   => '1'
            ), $atts));

           return '<ul style="list-style:none;padding-left:0px"><li class="'.$style.'">' . do_shortcode($content) . '</li></ul>';
        }

        add_shortcode('list', 'shortcode_list');




        /*************************************************************/
        /************SAVE TEMPLATE  ID AND NAME*******************/
        /*************************************************************/

 add_action ( 'publish_page', 'saveBlogId' );

function saveBlogId($post_ID) {
    global $wp_query;
    $the_title =  get_the_title($post_ID);
    $template_name = get_post_meta( $post_ID, '_wp_page_template', true );
    if($template_name == "_blog.php") {
        update_option('id_blog_page',$post_ID);
        update_option('title_blog_page',$the_title);
    }

    $oldblog = get_option('id_blog_page');
    if($post_ID == $oldblog) {
        if($template_name <> "_blog.php") {
            update_option('id_blog_page','');
        }
    }
}

add_action ( 'publish_page', 'saveProjectId' );
function saveProjectId($post_ID) {
    global $wp_query;
    $the_title =  get_the_title($post_ID);
    $template_name = get_post_meta( $post_ID, '_wp_page_template', true );
    if($template_name == "_projects.php") {
        update_option('id_projects_page',$post_ID);
        update_option('title_projects_page',$the_title);
    }

    $oldblog = get_option('id_projects_page');
    if($post_ID == $oldblog) {
        if($template_name <> "_projects.php") {
            update_option('id_projects_page','');
        }
    }
}



        /*************************************************************/
        /************TWITTER SCRIPT*********************************/
        /*************************************************************/


    //gets twitter relative time
    function twitter_time($get_twitter_time) {

       $base = strtotime("now"); 
       //get timestamp when tweet created 
       $tweet_time = strtotime($get_twitter_time); 
       //get difference 
       $time_result = $base - $tweet_time; 
       //calculate different time values 
       $minute = 60;
       $hour = $minute * 60; 
       $day = $hour * 24; 
       $week = $day * 7; 
       if(is_numeric($time_result) && $time_result > 0) { 
       //if less then 3 seconds 
       if($time_result < 3) return "right now"; 
       //if less then minute 
       if($time_result < $minute) return floor($time_result) . " seconds ago"; 
       //if less then 2 minutes 
       if($time_result < $minute * 2) return "about 1 minute ago"; 
       //if less then hour 
       if($time_result < $hour) return floor($time_result / $minute) . " minutes ago"; 
       //if less then 2 hours 
       if($time_result < $hour * 2) return "about 1 hour ago"; 
       //if less then day
       if($time_result < $day) return floor($time_result / $hour) . " hours ago"; 
       //if more then day, but less then 2 days 
       if($time_result > $day && $time_result < $day * 2) return "yesterday"; 
       //if less then year 
       if($time_result < $day * 365) return floor($time_result / $day) . " days ago"; 
       //else return more than a year 
        return "over a year ago"; }      
       } 


function twitter_script($unique_id, $limit) {
    
require_once(dirname( __FILE__ ).'/script/twitter/TwitterAPIExchange.php');

/*GET TWITTER KEYS FROM ADMINISTRATION*/
$twitter_consumer_key = get_theme_option(tk_theme_name.'_social_twitter_consumer_key');
$twitter_consumer_secret = get_theme_option(tk_theme_name.'_social_twitter_consumer_secret');
$twitter_access_token = get_theme_option(tk_theme_name.'_social_twitter_access_token');
$twitter_token_secret = get_theme_option(tk_theme_name.'_social_twitter_token_secret');
$twitter_username = get_theme_option(tk_theme_name.'_social_twitter');


/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => $twitter_access_token,
    'oauth_access_token_secret' => $twitter_token_secret,
    'consumer_key' => $twitter_consumer_key,
    'consumer_secret' => $twitter_consumer_secret
);

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name='.$twitter_username;

if(!empty($unique_id)) {
    $getfield .= "&count=".$limit;
} else {
    $getfield .= "&count=1";
}

$requestMethod = 'GET';

/** Perform the request and echo the response **/
$twitter = new TwitterAPIExchange($settings);
$twitter_results = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

if($unique_id !== 'home') { ?>
    <ul class="twitter_ul">
<?php } 

foreach($twitter_results as $single_tweet) {        
        
if(!empty($single_tweet -> text)){
//gets twitter content, time and name
$twitter_status = $single_tweet -> text;
$twitter_time = $single_tweet -> created_at;
$twitter_name = $single_tweet -> user -> screen_name;
        
$twitter_status = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\">\\2</a>", $twitter_status);
$twitter_status = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\">\\2</a>", $twitter_status);
$twitter_status = preg_replace("/@(\w+)/", "<a href=\"http://twitter.com/\\1\">@\\1</a>", $twitter_status);
$twitter_status = preg_replace("/#(\w+)/", "<a href=\"http://search.twitter.com/search?q=\\1\">#\\1</a>", $twitter_status);
        
        //checks if it's single tweet on home or twitter widget
        if($unique_id == 'home'){    
    ?>
                        
    <div class="home-twitter left">
        <div class="home-twitter-content">
            <img src="<?php echo get_template_directory_uri() ?>/style/img/twitter-home.png" alt="img" title="img" />
            <div class="home-twitter-text right">
                    <span><?php echo $twitter_status; ?></span>
                    <p><?php echo '@' . $twitter_name; ?></p>
            </div><!--/home-twitter-text-->
        </div><!--/home-twitter-content-->
    </div><!--/home-twitter-->       
            
    <?php 
    //use this if it's twitter widget
        } else { ?>    
    <li><div class="box-twitter-center left"><img src="<?php echo get_template_directory_uri(); ?>/style/img/twitter-img.png" /><span><?php echo $twitter_status; ?></span></div><span class="twitter-links"><?php echo twitter_time($twitter_time); ?></span></li>           
    <?php }//$unique_id == 'home' ?>      

<?php } //single_tweet->text

     }//uniquer_id              
 if($unique_id !== 'home') {?>
    </ul>
    <?php }    

}

  function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];
  if(empty($first_img)){ //Defines a default image
    $first_img = "/images/default.jpg";
  }
  return $first_img;
}


/********************************************************************************************************/
/*                                                                                                      */
/*   TGM Plugin activation for some plugins                                                             */
/*                                                                                                      */
/********************************************************************************************************/
require_once get_template_directory() . '/script/class-tgm-plugin-activation.php';

if ( ! function_exists( 'register_slider_plugin' ) ) {
    add_action( 'tgmpa_register', 'register_slider_plugin' );
    function register_slider_plugin() {

        $plugins = array(
            array(
                'name'     				=> __('Revolution Slider', 'tkingdom'), // The plugin name
                'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
                'source'   				=> get_template_directory() . '/script/plugins/revslider.zip', // The plugin source
                'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
                'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
            ),
        );
        $config = array(
            'domain'       		=> 'tkingdom',         	        // Text domain - likely want to be the same as your theme.
            'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
            'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
            'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
            'menu'         		=> 'install-required-plugins', 	// Menu slug
            'has_notices'      	=> true,                       	// Show admin notices or not
            'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
            'message' 			=> '',							// Message to output right before the plugins table
            'strings'      		=> array(
                'page_title'                       			=> __( 'Install Required Plugins', 'tkingdom' ),
                'menu_title'                       			=> __( 'Install Plugins', 'tkingdom' ),
                'installing'                       			=> __( 'Installing Plugin: %s', 'tkingdom' ), // %1$s = plugin name
                'oops'                             			=> __( 'Something went wrong with the plugin API.', 'tkingdom' ),
                'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
                'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
                'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
                'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
                'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
                'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
                'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
                'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
                'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
                'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
                'return'                           			=> __( 'Return to Required Plugins Installer', 'tkingdom' ),
                'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'tkingdom' ),
                'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'tkingdom' ), // %1$s = dashboard link
                'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
            )
        );
        tgmpa( $plugins, $config );
    } // function
} // if
 ?>