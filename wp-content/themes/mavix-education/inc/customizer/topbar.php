<?php

$mavix_education_default = mavix_education_get_default_theme_options();
/**
* Header Top Panel
*/
$wp_customize->add_panel( 'mavix_education_header_top_panel', array(
    'title'          => __( 'Header Options', 'mavix-education' ),
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
) );

// Contact Details Section
$wp_customize->add_section(
    'mavix_education_contact_details_section',
    array(
        'title'    => __( 'Contact Details', 'mavix-education' ),
        'panel'    => 'mavix_education_header_top_panel',
    )
);

// Show Contact Details
$wp_customize->add_setting( 
    'theme_options[mavix_education_show_contact_details]', 
    array(
        'default'           => $mavix_education_default['mavix_education_show_contact_details'],
        'sanitize_callback' => 'mavix_education_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[mavix_education_show_contact_details]',
    array(
        'label'       => __( 'Show Contact Details', 'mavix-education' ),
        'section'     => 'mavix_education_contact_details_section',
        'type'        => 'checkbox',
    )
);

// Address 1
$wp_customize->add_setting( 'theme_options[mavix_education_address_one]',
    array(
    'default'           => $mavix_education_default['mavix_education_address_one'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[mavix_education_address_one]',
    array(
    'label'    => __( 'Address 1', 'mavix-education' ),
    'section'  => 'mavix_education_contact_details_section',
    'type'     => 'text',
    )
);

// Address 2
$wp_customize->add_setting( 'theme_options[mavix_education_address_two]',
    array(
    'default'           => $mavix_education_default['mavix_education_address_two'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[mavix_education_address_two]',
    array(
    'label'    => __( 'Address 2', 'mavix-education' ),
    'section'  => 'mavix_education_contact_details_section',
    'type'     => 'text',
    )
);

// Phone Number
$wp_customize->add_setting( 'theme_options[mavix_education_phone_number]',
    array(
    'default'           => $mavix_education_default['mavix_education_phone_number'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[mavix_education_phone_number]',
    array(
    'label'    => __( 'Phone Number', 'mavix-education' ),
    'section'  => 'mavix_education_contact_details_section',
    'type'     => 'text',
    )
);

// Opening Time
$wp_customize->add_setting( 'theme_options[mavix_education_opening_time]',
    array(
    'default'           => $mavix_education_default['mavix_education_opening_time'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[mavix_education_opening_time]',
    array(
    'label'    => __( 'Opening Time', 'mavix-education' ),
    'section'  => 'mavix_education_contact_details_section',
    'type'     => 'text',
    )
);

// Email ID
$wp_customize->add_setting( 'theme_options[mavix_education_email_id]',
    array(
    'default'           => $mavix_education_default['mavix_education_email_id'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[mavix_education_email_id]',
    array(
    'label'    => __( 'Email ID', 'mavix-education' ),
    'section'  => 'mavix_education_contact_details_section',
    'type'     => 'text',
    )
);

// Support Text
$wp_customize->add_setting( 'theme_options[mavix_education_support_text]',
    array(
    'default'           => $mavix_education_default['mavix_education_support_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[mavix_education_support_text]',
    array(
    'label'    => __( 'Support Text', 'mavix-education' ),
    'section'  => 'mavix_education_contact_details_section',
    'type'     => 'text',
    )
);

// Menu Button Section
$wp_customize->add_section(
    'mavix_education_menu_button_section',
    array(
        'title'    => __( 'Get Started Button', 'mavix-education' ),
        'panel'    => 'mavix_education_header_top_panel',
    )
);

// Show Menu Button
$wp_customize->add_setting( 
    'theme_options[mavix_education_show_menu_button]', 
    array(
        'default'           => $mavix_education_default['mavix_education_show_menu_button'],
        'sanitize_callback' => 'mavix_education_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[mavix_education_show_menu_button]',
    array(
        'label'       => __( 'Show Menu Button', 'mavix-education' ),
        'section'     => 'mavix_education_menu_button_section',
        'type'        => 'checkbox',
    )
);

// Button Text
$wp_customize->add_setting( 'theme_options[mavix_education_menu_button_text]',
    array(
    'default'           => $mavix_education_default['mavix_education_menu_button_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[mavix_education_menu_button_text]',
    array(
    'label'    => __( 'Button Text', 'mavix-education' ),
    'section'  => 'mavix_education_menu_button_section',
    'type'     => 'text',
    )
);

// Button Url
$wp_customize->add_setting( 'theme_options[mavix_education_menu_button_url]',
    array(
    'default'           => $mavix_education_default['mavix_education_menu_button_url'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[mavix_education_menu_button_url]',
    array(
    'label'    => __( 'Button Url', 'mavix-education' ),
    'section'  => 'mavix_education_menu_button_section',
    'type'     => 'url',
    )
);