<?php

/**
 * Onia Theme Customizer
 *
 * @package Onia
 */



/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function onia_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    //select sanitization function
    function onia_sanitize_select($input, $setting)
    {
        $input = sanitize_key($input);
        $choices = $setting->manager->get_control($setting->id)->choices;
        return (array_key_exists($input, $choices) ? $input : $setting->default);
    }
    function onia_sanitize_image($file, $setting)
    {
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'bmp'          => 'image/bmp',
            'tif|tiff'     => 'image/tiff',
            'ico'          => 'image/x-icon'
        );
        //check file type from file name
        $file_ext = wp_check_filetype($file, $mimes);
        //if file has a valid mime type return it, otherwise return default
        return ($file_ext['ext'] ? $file : $setting->default);
    }

    $wp_customize->add_setting('onia_site_tagline_show', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       =>  '',
        'sanitize_callback' => 'absint',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control('onia_site_tagline_show', array(
        'label'      => __('Hide Site Tagline Only? ', 'onia'),
        'section'    => 'title_tagline',
        'settings'   => 'onia_site_tagline_show',
        'type'       => 'checkbox',

    ));

    $wp_customize->add_panel('onia_settings', array(
        'priority'       => 50,
        'title'          => __('Onia Theme settings', 'onia'),
        'description'    => __('All Onia theme settings', 'onia'),
    ));
    $wp_customize->add_section('onia_header', array(
        'title' => __('Onia Header Settings', 'onia'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Onia theme header settings', 'onia'),
        'panel'    => 'onia_settings',

    ));
    $wp_customize->add_setting('onia_main_menu_style', array(
        'default'        => 'style1',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'onia_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('onia_main_menu_style', array(
        'label'      => __('Main Menu Style', 'onia'),
        'description' => __('You can set the menu style one or two. ', 'onia'),
        'section'    => 'onia_header',
        'settings'   => 'onia_main_menu_style',
        'type'       => 'select',
        'choices'    => array(
            'style1' => __('Style One', 'onia'),
            'style2' => __('Style Two', 'onia'),
        ),
    ));

    //onia Home intro
    $wp_customize->add_section('onia_intro', array(
        'title' => __('Site Intro Settings', 'onia'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Blog Intro Settings', 'onia'),
        'panel'    => 'onia_settings',

    ));
    $wp_customize->add_setting('onia_intro_img', array(
        'capability'        => 'edit_theme_options',
        'default'           => '',
        'sanitize_callback' => 'onia_sanitize_image',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'onia_intro_img',
        array(
            'label'    => __('Upload Profile Image', 'onia'),
            'description'    => __('Image size should be 450px width & 460px height for better view.', 'onia'),
            'section'  => 'onia_intro',
            'settings' => 'onia_intro_img',
        )
    ));
   
    $wp_customize->add_setting('onia_intro_title', array(
        'default' => __('This is Onia Lauren', 'onia'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('onia_intro_title', array(
        'label'      => __('Intro Title', 'onia'),
        'section'    => 'onia_intro',
        'settings'   => 'onia_intro_title',
        'type'       => 'text',
    ));
    $wp_customize->add_setting('onia_my_job', array(
        'default' => __('A Data Storyteller', 'onia'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('onia_my_job', array(
        'label'      => __('What I do', 'onia'),
        'section'    => 'onia_intro',
        'settings'   => 'onia_my_job',
        'type'       => 'text',
    ));
    $wp_customize->add_setting('onia_intro_desc', array(
        'default' => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'wp_kses_post',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('onia_intro_desc', array(
        'label'      => __('Intro Description', 'onia'),
        'section'    => 'onia_intro',
        'settings'   => 'onia_intro_desc',
        'type'       => 'textarea',
    ));
    $wp_customize->add_setting('onia_btn_text_one', array(
        'default' => __('Facebook', 'onia'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('onia_btn_text_one', array(
        'label'      => __('Social Btn One', 'onia'),
        'section'    => 'onia_intro',
        'settings'   => 'onia_btn_text_one',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('onia_btn_url_one', array(
        'default' => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('onia_btn_url_one', array(
        'label'      => __('Social account URL', 'onia'),
        'description'      => __('Keep url empty for hide this button', 'onia'),
        'section'    => 'onia_intro',
        'settings'   => 'onia_btn_url_one',
        'type'       => 'url',
    ));
    $wp_customize->add_setting('onia_btn_text_two', array(
        'default'     => __('Github', 'onia'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('onia_btn_text_two', array(
        'label'      => __('Social Btn Two', 'onia'),
        'section'    => 'onia_intro',
        'settings'   => 'onia_btn_text_two',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('onia_btn_url_two', array(
        'default' => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('onia_btn_url_two', array(
        'label'      => __('Social account URL', 'onia'),
        'description'      => __('Keep url empty for hide this button', 'onia'),
        'section'    => 'onia_intro',
        'settings'   => 'onia_btn_url_two',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('onia_btn_text_three', array(
        'default'     => __('Reddit', 'onia'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('onia_btn_text_three', array(
        'label'      => __('Social Btn Three', 'onia'),
        'section'    => 'onia_intro',
        'settings'   => 'onia_btn_text_three',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('onia_btn_url_three', array(
        'default' => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('onia_btn_url_three', array(
        'label'      => __('Social account URL', 'onia'),
        'description'      => __('Keep url empty for hide this button', 'onia'),
        'section'    => 'onia_intro',
        'settings'   => 'onia_btn_url_three',
        'type'       => 'text',
    ));

    //onia blog settings
    $wp_customize->add_section('onia_blog', array(
        'title' => __('Onia Blog Settings', 'onia'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Onia theme blog settings', 'onia'),
        'panel'    => 'onia_settings',

    ));
    $wp_customize->add_setting('onia_blog_container', array(
        'default'        => 'container',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'onia_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('onia_blog_container', array(
        'label'      => __('Container type', 'onia'),
        'description' => __('You can set standard container or full width container. ', 'onia'),
        'section'    => 'onia_blog',
        'settings'   => 'onia_blog_container',
        'type'       => 'select',
        'choices'    => array(
            'container' => __('Standard Container', 'onia'),
            'container-fluid' => __('Full width Container', 'onia'),
        ),
    ));
    $wp_customize->add_setting('onia_blog_layout', array(
        'default'        => 'fullwidth',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'onia_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('onia_blog_layout', array(
        'label'      => __('Select Blog Layout', 'onia'),
        'description' => __('Right and Left sidebar only show when sidebar widget is available. ', 'onia'),
        'section'    => 'onia_blog',
        'settings'   => 'onia_blog_layout',
        'type'       => 'select',
        'choices'    => array(
            'rightside' => __('Right Sidebar', 'onia'),
            'leftside' => __('Left Sidebar', 'onia'),
            'fullwidth' => __('No Sidebar', 'onia'),
        ),
    ));
    $wp_customize->add_setting('onia_blog_style', array(
        'default'        => 'grid',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'onia_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('onia_blog_style', array(
        'label'      => __('Select Blog Style', 'onia'),
        'section'    => 'onia_blog',
        'settings'   => 'onia_blog_style',
        'type'       => 'select',
        'choices'    => array(
            'grid' => __('Grid Style', 'onia'),
            'classic' => __('Classic Style', 'onia'),
        ),
    ));
    //onia page settings
    $wp_customize->add_section('onia_page', array(
        'title' => __('Onia Page Settings', 'onia'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Onia theme blog settings', 'onia'),
        'panel'    => 'onia_settings',

    ));
    $wp_customize->add_setting('onia_page_container', array(
        'default'        => 'container',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'onia_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('onia_page_container', array(
        'label'      => __('Page Container type', 'onia'),
        'description' => __('You can set standard container or full width container for page. ', 'onia'),
        'section'    => 'onia_page',
        'settings'   => 'onia_page_container',
        'type'       => 'select',
        'choices'    => array(
            'container' => __('Standard Container', 'onia'),
            'container-fluid' => __('Full width Container', 'onia'),
        ),
    ));
    $wp_customize->add_setting('onia_page_header', array(
        'default'        => 'show',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'onia_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('onia_page_header', array(
        'label'      => __('Show Page header', 'onia'),
        'section'    => 'onia_page',
        'settings'   => 'onia_page_header',
        'type'       => 'select',
        'choices'    => array(
            'show' => __('Show all pages', 'onia'),
            'hide-home' => __('Hide Only Front Page', 'onia'),
            'hide' => __('Hide All Pages', 'onia'),
        ),
    ));




    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'onia_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'onia_customize_partial_blogdescription',
            )
        );
    }
}
add_action('customize_register', 'onia_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function onia_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function onia_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function onia_customize_preview_js()
{
    wp_enqueue_script('onia-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), ONIA_VERSION, true);
}
add_action('customize_preview_init', 'onia_customize_preview_js');
