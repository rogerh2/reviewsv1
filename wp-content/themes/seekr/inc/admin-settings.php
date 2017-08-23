<?php
$args = array(
	'orderby'            => 'name',
	'hide__mpty'         => 1,
	'depth'              => 10,
);
$categories = get_categories($args);

$new_array = array();

foreach ($categories as $category_list ) {
    $array_to_add = array(
                'id' => 'cat_'.$category_list->term_id,
                'name' => 'cat_'.$category_list->term_id,
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    '',
                ),
                'label' => $category_list->cat_name,
                'desc' => '',
            );
    array_push($new_array, $array_to_add );
}

$tabs = array(

        /*************************************************************/
        /************GENERAL OPTIONS*******************************/
        /*************************************************************/

    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'general',
        'name' => __('General Options', tk_theme_name),

        'fields' => array(

           array(
                'id' => 'header_logo',
                'name' => 'header_logo',
                'type' => 'file',
                'value' => get_template_directory_uri()."/style/img/logo.png",
                'label' => __('Header Logo', tk_theme_name),
                'desc' => __('JPEG, GIF or PNG image, 99x32px recommended, maximum 300x150,  up to 500KB', tk_theme_name),
            ),

           array(
                'id' => 'footer_logo',
                'name' => 'footer_logo',
                'type' => 'file',
                'value' => get_template_directory_uri()."/style/img/logo.png",
                'label' => __('Footer Logo', tk_theme_name),
                'desc' => __('JPEG, GIF or PNG image, 70x25px recommended, up to 500KB', tk_theme_name),
            ),

            array(
                'id' => 'favicon',
                'name' => 'favicon',
                'type' => 'file',
                'value' => get_template_directory_uri()."/style/img/favicon.ico",
                'label' => __('Favicon', tk_theme_name),
                'desc' => __('File format: ICO, dimenstions: 16x16', tk_theme_name),

            ),

            array(
                'id' => 'google_analytics',
                'name' => 'google_analytics',
                'type' => 'textarea',
                'value' => '',
                'label' => __('Google Analytics code', tk_theme_name),
                'desc' => '',
                'options' => array(
                    'rows' => '5',
                    'cols' => '80'
                )
            ),
            
            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),     
            
            array(
                'id' => 'custom_sidebars',
                'name' => 'custom_sidebars',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    __('Use different sidebars on page templates.', tk_theme_name),
                ),
                'label' => __('Custom Sidebars', tk_theme_name),
                'desc' => __('Check this box if you want to use custom sidebars on page templates, if unchecked the default sidebar will be used on every page.', tk_theme_name),
            ),
            
            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),     

            array(
                'id' => 'footer_copy',
                'name' => 'footer_copy',
                'type' => 'text',
                'value' => __('Copyright Information Goes Here 2013. All Rights Reserved.', tk_theme_name),
                'label' => __('Footer Copy Text', tk_theme_name),
                'desc' => __('Text which appears in footer as copyright text', tk_theme_name),
                'options' => array(
                    'size' => '100'
                )
            ),

        ),
    ),


        /*************************************************************/
        /************HOME PAGE OPTIONS****************************/
        /*************************************************************/

    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => __('Theme Settings', tk_theme_name),
            'page_title' => __('Theme Settings', tk_theme_name),
        ),
        'id' => 'home',
        'name' => __('Home Page', tk_theme_name),

        'fields' => array(
            
            array(
                'id' => 'enable_slider',
                'name' => 'enable_slider',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    __('Enable Home Page Revolution Slider', tk_theme_name),
                ),
                'label' => '',
                'desc' => '',
            ),
            
            array(
                'id' => 'slider_id',
                'name' => 'slider_id',
                'type' => 'text',
                'value' => '',
                'label' => __('Slider ID or ALIAS', tk_theme_name),
                'desc' => __('When you configure your Revolution Slider from Revolution Panel, insert here ID or ALIAS you received there.', tk_theme_name),
                'options' => array(
                    'size' => '20'
                )
            ),
            
    array(
        'id' => 'box_1_hr',
        'name' => 'box_1_hr',
        'type' => 'hr',
        'options' => array(
            'width' => '100%',
            'color' => '#DFDFDF'
        )
    ),   
            
            array(
                'id' => 'disable_call_to_action',
                'name' => 'disable_call_to_action',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    __('Disable Call To Action', tk_theme_name),
                ),
                'label' => '',
                'desc' => '',
            ),
            
            array(
                'id' => 'call_to_action_title',
                'name' => 'call_to_action_title',
                'type' => 'text',
                'value' => '',
                'label' => __('Call To Action Title', tk_theme_name),
                'desc' => __('Insert Title for Call To Action part of Home Page.', tk_theme_name),
                'options' => array(
                    'size' => '100'
                )
            ),

            array(
                'id' => 'call_to_action_text',
                'name' => 'call_to_action_text',
                'type' => 'textarea',
                'value' => '',
                'label' => __('Call To Action Text', tk_theme_name),
                'desc' => __('Insert Text for Call To Action part of Home Page.', tk_theme_name),
                'options' => array(
                    'rows' => '5',
                    'cols' => '100'
                )
            ),

            array(
                'id' => 'call_to_action_button_text',
                'name' => 'call_to_action_button_text',
                'type' => 'text',
                'value' => '',
                'label' => __('Call To Action Button Text', tk_theme_name),
                'desc' => __('Insert Text for Button in Call To Action part of Home Page.', tk_theme_name),
                'options' => array(
                    'size' => '20'
                )

            ),

            array(
                'id' => 'call_to_action_button_url',
                'name' => 'call_to_action_button_url',
                'type' => 'text',
                'value' => '',
                'label' => __('Call To Action URL', tk_theme_name),
                'desc' => __('Insert Url for Button in Call To Action part of Home Page ( http://www.themeskingdom.com ).', tk_theme_name),
                'options' => array(
                    'size' => '100'
                )

            ),
            
    array(
        'id' => 'box_1_hr',
        'name' => 'box_1_hr',
        'type' => 'hr',
        'options' => array(
            'width' => '100%',
            'color' => '#DFDFDF'
        )
    ),    
            
            array(
                'id' => 'disable_home_projects',
                'name' => 'disable_home_projects',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    __('Disable Home Projects', tk_theme_name),
                ),
                'label' => __('Disable Projects on Home Page', tk_theme_name),
                'desc' => __('Check this box if you want to disable projects on your Home page.', tk_theme_name),
            ),

            array(
                'id' => 'projects_text',
                'name' => 'projects_text',
                'type' => 'textarea',
                'value' => '',
                'label' => __('Projects Section Text', tk_theme_name),
                'desc' => '',
                'options' => array(
                    'rows' => '10',
                    'cols' => '100'
                )
            ),
            
            array(
                'id' => 'projects_cat',
                'name' => 'projects_cat',
                'type' => 'category',
                'value' => '',
                'taxonomy' => 'ct_projects',
                'label' => __('Select Category', tk_theme_name),
                'desc' => __('Projects section in Home page will show posts from this featured category', tk_theme_name),
            ),
            
            array(
                'id' => 'projects_number',
                'name' => 'projects_number',
                'type' => 'select',
                'value' => array(
                    array('4', '4'), // ARRAY ('TITLE', 'VALUE')
                    array('8', '8'), // ARRAY ('TITLE', 'VALUE')
                    array('12', '12'), // ARRAY ('TITLE', 'VALUE')
                ),
                'label' => __('Number of Posts', tk_theme_name),
                'desc' => __('Select how many posts to show on Projects section of your Home page.', tk_theme_name),
            ),

    array(
        'id' => 'box_1_hr',
        'name' => 'box_1_hr',
        'type' => 'hr',
        'options' => array(
            'width' => '100%',
            'color' => '#DFDFDF'
        )
    ),      
            
            array(
                'id' => 'disable_home_news',
                'name' => 'disable_home_news',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    __('Disable Home News', tk_theme_name),
                ),
                'label' => __('Disable News on Home Page', tk_theme_name),
                'desc' => __('Check this box if you want to disable news on your Home page.', tk_theme_name),
            ),

            array(
                'id' => 'news_text',
                'name' => 'news_text',
                'type' => 'textarea',
                'value' => '',
                'label' => __('News Section Text', tk_theme_name),
                'desc' => '',
                'options' => array(
                    'rows' => '10',
                    'cols' => '100'
                )
            ),
            
            array(
                'id' => 'news_number',
                'name' => 'news_number',
                'type' => 'text',
                'value' => '',
                'label' => __('Number of Posts', tk_theme_name),
                'desc' => __('Select how many posts to show on News section of your Home page.', tk_theme_name),
                'options' => array(
                    'size' => '5'
                )
            ),

    array(
        'id' => 'box_1_hr',
        'name' => 'box_1_hr',
        'type' => 'hr',
        'options' => array(
            'width' => '100%',
            'color' => '#DFDFDF'
        )
    ),      
            
            array(
                'id' => 'use_home_content',
                'name' => 'use_home_content',
                'type' => 'checkbox',
                'value' => array(
                    'yes',
                ),
                'caption' => array(
                    __('Use Home Content', tk_theme_name),
                ),
                'label' => '',
                'desc' => '',
            ),

            array(
                'id' => 'home_content',
                'name' => 'home_content',
                'type' => 'pages',
                'value' => '',
                'label' => __('Chose page to use on Home Content:', tk_theme_name),
                'desc' => __('only content from this page will be shown on Home Page.', tk_theme_name),

            ),

    array(
        'id' => 'box_1_hr',
        'name' => 'box_1_hr',
        'type' => 'hr',
        'options' => array(
            'width' => '100%',
            'color' => '#DFDFDF'
        )
    ),           
            

        ),
    ),

    
        /*************************************************************/
        /************COLOR OPTIONS*********************************/
        /*************************************************************/
 
    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => 'Theme Settings',
            'page_title' => 'Theme Settings'
        ),
        'id' => 'colors',
        'name' => __('Color Sets', tk_theme_name),
        
        'fields' => array(
            
    array(
        'id' => 'box_1_hr',
        'name' => 'box_1_hr',
        'type' => 'hr',
        'options' => array(
            'width' => '100%',
            'color' => '#DFDFDF'
        )
    ),      
            
            array(
                'id' => 'link_color',
                'name' => 'link_color',
                'type' => 'colorpicker',
                'value' => 'F38010',
                'label' => __('Link Color', tk_theme_name),
                'desc' => __('Set color for every link on your site.', tk_theme_name),
            ),  
            
            array(

                    'label' => 'Stylechanger',
                    'name' => '_stylechanger',
                    'type' => 'stylechanger',
                    'description' => '',
                    'value' => 'blue-1',
                    'styles' => array(
                                    'blue-1' => 'blue-1',
                                    'blue-2' => 'blue-2',
                                    'grey' => 'grey',
                                    'green' => 'green',
                                    'green-2' => 'green-2',
                                    'orange' => 'orange',
                                    'purple' => 'purple',
                                    'red' => 'red',
                    ),

            ),

        ),
    ),

        /*************************************************************/
        /************SOCIAL OPTIONS*********************************/
        /*************************************************************/

    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => __('Theme Settings', tk_theme_name),
            'page_title' => __('Theme Settings',  tk_theme_name),
        ),
        'id' => 'social',
        'name' => __('Social', tk_theme_name),
        'fields' => array(

            array(
                'id' => 'rss_url',
                'name' => 'rss_url',
                'type' => 'text',
                'value' => '',
                'label' => __('RSS Feed URL', tk_theme_name),
                'desc' => __('Enter url of RSS feed you want to use. WordPress default is www.yoursite.com/feed/.', tk_theme_name),
                'options' => array(
                    'size' => '80'
                )
            ),

            array(
                'id' => 'google_plus',
                'name' => 'google_plus',
                'type' => 'text',
                'value' => '',
                'label' => __('Google Plus account', tk_theme_name),
                'desc' => __('Enter Google+ account (e.g. 123456789012345678901) or leave empty if you dont wish to use Google+', tk_theme_name),
                'options' => array(
                    'size' => '80'
                )
            ),

            array(
                'id' => 'facebook',
                'name' => 'facebook',
                'type' => 'text',
                'value' => '',
                'label' => __('Facebook account', tk_theme_name),
                'desc' => __('Enter Facebook account (e.g. themeskingdom) or leave empty if you dont wish to use Facebook', tk_theme_name),
                'options' => array(
                    'size' => '80'
                )
            ),

            array(
                'id' => 'twitter',
                'name' => 'twitter',
                'type' => 'text',
                'value' => '',
                'label' => __('Twitter account', tk_theme_name),
                'desc' => __('Enter Twitter account (e.g. themeskingdom) or leave empty if you dont wish to use Twitter', tk_theme_name),
                'options' => array(
                    'size' => '80'
                )
            ),

            array(
                'id' => 'linkedin',
                'name' => 'linkedin',
                'type' => 'text',
                'value' => '',
                'label' => __('Linkedin account', tk_theme_name),
                'desc' => __('Enter Linkedin account (e.g. http://www.linkedin.com/company/2687325) or leave empty if you dont wish to use Linkedin', tk_theme_name),
                'options' => array(
                    'size' => '80'
                )
            ),

            array(
                'id' => 'box_1_hr',
                'name' => 'box_1_hr',
                'type' => 'hr',
                'options' => array(
                    'width' => '100%',
                    'color' => '#DFDFDF'
                )
            ),     
            array(
                'id' => 'twitter_auth',
                'name' => 'twitter_auth',
                'type' => 'label',
                'value' => '',
                'label' => '<a target="_blank" href="http://www.themeskingdom.com/knowledge-base/how-to-setup-twitter/">How to setup Twitter authentication</a> ',
            ),
                        
            array(
                'id' => 'twitter_consumer_key',
                'name' => 'twitter_consumer_key',
                'type' => 'text',
                'value' => '',
                'label' => 'Consumer key',
                'desc' => 'Application consumer key',
                'options' => array(
                    'size' => '80'
                )
            ),
            array(
                'id' => 'twitter_consumer_secret',
                'name' => 'twitter_consumer_secret',
                'type' => 'text',
                'value' => '',
                'label' => 'Consumer secret',
                'desc' => 'Application consumer secret',
                'options' => array(
                    'size' => '80'
                )
            ),
            array(
                'id' => 'twitter_access_token',
                'name' => 'twitter_access_token',
                'type' => 'text',
                'value' => '',
                'label' => 'Access token',
                'desc' => 'Application access token',
                'options' => array(
                    'size' => '80'
                )
            ),
            array(
                'id' => 'twitter_token_secret',
                'name' => 'twitter_token_secret',
                'type' => 'text',
                'value' => '',
                'label' => 'Access Token Secret',
                'desc' => 'Application access token secret',
                'options' => array(
                    'size' => '80'
                )
            ),
        ),
    ),

        /*************************************************************/
        /************CONTACT OPTIONS******************************/
        /*************************************************************/

    array(
        'pg' => array(
            'slug' => 'theme-settings',
            'menu_title' => __('Theme Settings', tk_theme_name),
            'page_title' => __('Theme Settings', tk_theme_name),
        ),
        'id' => 'contact',
        'name' => 'Contact',
        'fields' => array(

            array(
                'id' => 'contact_subject',
                'name' => 'contact_subject',
                'type' => 'text',
                'value' => __('E-mail from '.tk_theme_name().' Theme', tk_theme_name),
                'label' => __('Subject for your contact form', tk_theme_name),
                'desc' => __('This will be subject when you receive e-mail from your site', tk_theme_name),
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'name__rror_message',
                'name' => 'name__rror_message',
                'type' => 'text',
                'value' => __('Please insert your name!', tk_theme_name),
                'label' => __('Name error message', tk_theme_name),
                'desc' => __('Enter error message if name is not entered in contact form', tk_theme_name),
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'email__rror_message',
                'name' => 'email__rror_message',
                'type' => 'text',
                'value' => __('Please insert your e-mail!', tk_theme_name),
                'label' => __('E-mail error message', tk_theme_name),
                'desc' => __('Enter error message if e-mail is not entered in contact form', tk_theme_name),
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'message__rror_message',
                'name' => 'message__rror_message',
                'type' => 'text',
                'value' => __('Please insert your message!', tk_theme_name),
                'label' => __('Message text error message', tk_theme_name),
                'desc' => __('Enter error message if message text is not entered in contact form', tk_theme_name),
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'message_successful',
                'name' => 'message_successful',
                'type' => 'text',
                'value' => __('Message sent!', tk_theme_name),
                'label' => __('Message on successful e-mail send', tk_theme_name),
                'desc' => __('Enter notification text for successfully sent message', tk_theme_name),
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'message_unsuccessful',
                'name' => 'message_unsuccessful',
                'type' => 'text',
                'value' => __('Some error occured!', tk_theme_name),
                'label' => __('Message for error on e-mail send', tk_theme_name),
                'desc' => __('Enter notification text for unsuccessfully sent message', tk_theme_name),
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'googlemap_x',
                'name' => 'googlemap_x',
                'type' => 'text',
                'value' => '',
                'label' => __('Google map X coordinate', tk_theme_name),
                'desc' => __('Insert google map coordinate for your adress', tk_theme_name),
                'options' => array(
                    'size' => '5'
                )
            ),
            array(
                'id' => 'googlemap_y',
                'name' => 'googlemap_y',
                'type' => 'text',
                'value' => '',
                'label' => __('Google map Y coordinate', tk_theme_name),
                'desc' => __('Insert google map coordinate for your adress', tk_theme_name),
                'options' => array(
                    'size' => '5'
                )
            ),
            array(
                'id' => 'googlemap_zoom',
                'name' => 'googlemap_zoom',
                'type' => 'text',
                'value' => '15',
                'label' => __('Google map zoom factor', tk_theme_name),
                'desc' => __('Insert google map zoom factor', tk_theme_name),
                'options' => array(
                    'size' => '5'
                )
            ),
            array(
                'id' => 'marker_title',
                'name' => 'marker_title',
                'type' => 'text',
                'value' => __('Marker', tk_theme_name),
                'label' => __('Marker Title', tk_theme_name),
                'desc' => __('Insert marker title.', tk_theme_name),
                'options' => array(
                    'size' => '100'
                )
            ),
            array(
                'id' => 'google_map_type',
                'name' => 'google_map_type',
                'type' => 'select',
                'value' => array(
                    array('HYBRID', 'HYBRID'), // ARRAY ('TITLE', 'VALUE')
                    array('ROADMAP', 'ROADMAP'), // ARRAY ('TITLE', 'VALUE')
                    array('SATELLITE', 'SATELLITE'), // ARRAY ('TITLE', 'VALUE')
                    array('TERRAIN', 'TERRAIN'), // ARRAY ('TITLE', 'VALUE')
                ),
                'label' => 'Google Map type',
                'desc' => 'Select map type you want to use.',
            ),


        ),
    ),
        
);



?>