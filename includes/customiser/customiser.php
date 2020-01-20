<?php 
add_action( 'customize_register', 'blue_theme_theme_customizer' );
function blue_theme_theme_customizer( $wp_customize ) {

    //Theme settings section
    $wp_customize->add_section( 'blue_theme_logo_section' , array(
        'title'       => __( 'Theme settings', 'blue-theme-v3-0' ),
        'priority'    => 30,
        'description' => 'Change some of the settings for your site here...'
    ) );
    //Logo control
    $wp_customize->add_setting('blue_theme_logo');
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blue_theme_logo', array(
        'label'    => __( 'Main logo', 'blue-theme-v3-0' ),
        'description' => 'This is the logo that will appear in the main navigation of your site.',
        'section'  => 'blue_theme_logo_section',
        'settings' => 'blue_theme_logo'
    ) ) );
    $wp_customize->add_setting('blue_theme_inverted_logo');
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blue_theme_inverted_logo', array(
        'label'    => __( 'Inverted logo', 'blue-theme-v3-0' ),
        'description' => 'This is the logo that will appear on darker sections of your site.',
        'section'  => 'blue_theme_logo_section',
        'settings' => 'blue_theme_inverted_logo'
    ) ) );
    $wp_customize->add_setting('blue_theme_logo_footer');
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blue_theme_logo_footer', array(
        'label'    => __( 'Footer logo', 'blue-theme-v3-0' ),
        'description' => 'This is the logo that will appear in the footer.',
        'section'  => 'blue_theme_logo_section',
        'settings' => 'blue_theme_logo_footer'
    ) ) );

    //Header layout
    $wp_customize->add_setting('blue_theme_header_layout');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blue_theme_header_layout', array(
    'label'        => 'Header layout',
    'description' => 'Set the layout for the header section here.',
    'section'    => 'blue_theme_logo_section',
    'settings'   => 'blue_theme_header_layout',
    'type'           => 'select',
    'default'           => 'navRight',
    'choices'        => array(
        'navRight'   => __( 'Logo left', 'blue-theme-v3-0' ),
        'navLeft'  => __( 'Logo right', 'blue-theme-v3-0' ),
        'navCenter'  => __( 'Logo Centered', 'blue-theme-v3-0' )
    )
    ) ) );

    //Social Media section
    $wp_customize->add_section( 'blue_theme_social_media_section' , array(
        'title'       => __( 'Social media', 'blue-theme-v3-0' ),
        'priority'    => 30,
        'description' => 'Add social media links to your navigation here...'
    ) );
    $wp_customize->add_setting('blue_theme_twitter');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blue_theme_twitter', array(
        'label'    => __( 'Twitter', 'blue-theme-v3-0' ),
        'description' => 'Add you twitter profile url in here...',
        'section'  => 'blue_theme_social_media_section',
        'settings' => 'blue_theme_twitter'
    ) ) );
    $wp_customize->add_setting('blue_theme_facebook');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blue_theme_facebook', array(
        'label'    => __( 'Facebook', 'blue-theme-v3-0' ),
        'description' => 'Add you Facebook profile url in here...',
        'section'  => 'blue_theme_social_media_section',
        'settings' => 'blue_theme_facebook'
    ) ) );
    $wp_customize->add_setting('blue_theme_instagram');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blue_theme_instagram', array(
        'label'    => __( 'Instagram', 'blue-theme-v3-0' ),
        'description' => 'Add you Instagram profile url in here...',
        'section'  => 'blue_theme_social_media_section',
        'settings' => 'blue_theme_instagram'
    ) ) );
    $wp_customize->add_setting('blue_theme_youtube');
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blue_theme_youtube', array(
        'label'    => __( 'YouTube', 'blue-theme-v3-0' ),
        'description' => 'Add you YouTube profile url in here...',
        'section'  => 'blue_theme_social_media_section',
        'settings' => 'blue_theme_youtube'
    ) ) );
}