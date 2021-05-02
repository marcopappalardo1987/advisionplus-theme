<?php

Redux::setSection( $opt_name, array(
	'title'            => __( 'Logo', 'themeplus-core' ),
	'id'               => 'logo',
	'customizer_width' => '400px',
	'icon'             => 'el el-plus-sign',
) );

Redux::setSection( $opt_name, array(
	'title'      	=> __( 'Logo', 'themeplus-core' ),
	'id'         	=> 'tp-logo',
	'subsection' 	=> true,
	'fields'		=>	array(
		array(
			'id'   	=> 'tp-section-general-settings-logo',
			'class'	=> 'tp-section-title',
			'type' => 'info',
			'desc' => __('General Settings', 'themeplus-core'),
		),
		array(
			'type'		=>	'button_set',
			'id'		=>	'tp-logo-align',
			'title'		=> 	__('Logo Alignment', 'themeplus-core' ),
			'subtitle'	=>	__('Controls the logo alignment.', 'themeplus-core' ),
			'options'	=>	array(
				'left'		=>	__('Left', 'themeplus-core' ),
				'center'	=>	__('Center', 'themeplus-core' ),
				'right'		=>	__('Right', 'themeplus-core' ),
			),
			'required' 	=> array('tp-top-header-show','equals','1'),
			'default' 	=> 'left',
		),
		array(
			'type'				=>	'spacing',
			'id'				=>	'tp-margin-logo',
			'title'				=> 	__('Logo Margins', 'themeplus-core' ),
			'subtitle'			=>	__('Controls the top/right/bottom/left margins for the logo. Enter values including any valid CSS unit, ex: 34px, 34px, 0px, 0px. <br><b>Dafault 20px, 0px, 20px, 0px</b>', 'themeplus-core' ),
			'units'				=>	false,
			'units_extended'	=> 	true,
			'display_units'		=>	false,
			'mode'				=>	'margin',
			'output' 			=> 	'#tp-header-logo img',
			'default' => array(
				'margin-top' => '',
				'margin-right' => '',
				'margin-bottom' => '',
				'margin-left' => '',
			)
		),
		array(
			'id'   	=> 'tp-section-default-logo',
			'class'	=> 'tp-section-title',
			'type' => 'info',
			'desc' => __('Default Logo', 'themeplus-core'),
		),
		array(
			'id'       => 'tp-logo',
			'type'     => 'media', 
			'url'      => false,
			'title'    => __('Default Logo', 'themeplus-core'),
			'subtitle' => __('Select an image file for your logo.', 'themeplus-core'),
			'default'  => array(
				'url'=> get_template_directory_uri() . '/assets/public/images/ThemePlusLogo.png'
			),
		),
		array(
			'id'       => 'tp-logo-retina',
			'type'     => 'media', 
			'url'      => false,
			'title'    => __('Retina Default Logo', 'themeplus-core'),
			'subtitle' => __('Select an image file for the retina version of the logo. It should be exactly 2x the size of the main logo.', 'themeplus-core'),
			'default'  => array(
				'url'=> get_template_directory_uri() . '/assets/public/images/ThemePlusLogoRetina.png'
			),
		),
		array(
			'id'   	=> 'tp-section-sticky-logo',
			'class'	=> 'tp-section-title',
			'type' => 'info',
			'desc' => __('Sticky Header Logo', 'themeplus-core'),
		),
		array(
			'id'       => 'tp-sticky-logo',
			'type'     => 'media', 
			'url'      => false,
			'title'    => __('Sticky Header Logo', 'themeplus-core'),
			'subtitle' => __('Select an image file for your sticky header logo.', 'themeplus-core'),
			'default'  => array(
				'url'=> get_template_directory_uri() . '/assets/public/images/ThemePlusLogoMobile.png'
			),
		),
		array(
			'id'       => 'tp-sticky-logo-retina',
			'type'     => 'media', 
			'url'      => false,
			'title'    => __('Retina Sticky Header Logo', 'themeplus-core'),
			'subtitle' => __('Select an image file for the retina version of the sticky header logo. It should be exactly 2x the size of the sticky header logo.', 'themeplus-core'),
			'default'  => array(
				'url'=> get_template_directory_uri() . '/assets/public/images/ThemePlusLogo.png'
			),
		),
		array(
			'id'   	=> 'tp-section-mobile-logo',
			'class'	=> 'tp-section-title',
			'type' => 'info',
			'desc' => __('Mobile Logo', 'themeplus-core'),
		),
		array(
			'id'       => 'tp-mobile-logo',
			'type'     => 'media', 
			'url'      => false,
			'title'    => __('Mobile Logo', 'themeplus-core'),
			'subtitle' => __('Mobile LogoSelect an image file for your mobile logo.', 'themeplus-core'),
			'default'  => array(
				'url'=> get_template_directory_uri() . '/assets/public/images/ThemePlusLogoMobile.png'
			),
		),
		array(
			'id'       => 'tp-mobile-logo-retina',
			'type'     => 'media', 
			'url'      => false,
			'title'    => __('Retina Mobile Logo', 'themeplus-core'),
			'subtitle' => __('Select an image file for the retina version of the mobile logo. It should be exactly 2x the size of the mobile logo.', 'themeplus-core'),
			'default'  => array(
				'url'=> get_template_directory_uri() . '/assets/public/images/ThemePlusLogo.png'
			),
		),
	),
));