<?php

Redux::setSection( $opt_name, array(
	'title'            => __( 'General', 'themeplus-core' ),
	'id'               => 'general',
	'desc'             => __( 'These are really basic fields!', 'themeplus-core' ),
	'customizer_width' => '400px',
	'icon'             => 'el el-home',
) );

Redux::setSection( $opt_name, array(
	'title'      => __( 'Layout', 'themeplus-core' ),
	'id'         => 'layout',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'   	=> 'tp-section-site-layout',
			'class'	=> 'tp-section-title',
			'type' => 'info',
			'desc' => __('Site Layout', 'themeplus-core'),
		),
		array(
			'id'                    => 'tp-layout-background',
			'type'                  => 'background',
			'title'                 => __( 'Site Background Color', 'themeplus-core' ),
			'subtitle'              => __( 'Controls the background color for the site.', 'themeplus-core' ),
			'hover'                 => false,
			'active'                => false,
			'background-repeat'     => false,
			'background-attachment' => false,
			'background-position'   => false,
			'background-image'      => false,
			'background-size'       => false,
			'preview'               => false,
			'default'               => array(
				'color' => '#ffffff',
				'alpha' => '.8'
			),
			'output'                => array( 'background-color' => 'body' ),
		),
		array(
			'type'					=> 	'text',
			'id'					=> 	'tp-site-width',
			'title'					=>	__('Controls the overall site width. Enter value including any valid CSS unit, ex: 1200px.', 'themeplus-core' ),
			'validate'				=>	'no_html',
			'default'				=>	'1200px',
		),
		array(
			'type'				=>	'spacing',
			'id'				=>	'tp-site-padding',
			'title'				=> 	__('Padding', 'themeplus-core' ),
			'subtitle'			=>	__('Select the padding you would apply for yhe site. Default is 15px', 'themeplus-core' ),
			'mode'				=>	'padding',
			'units'				=>	false,
			'units_extended'	=> 	true,
			'display_units'		=>	false,
			'top'				=>	false,
			'bottom'			=>	false,
			'output'         	=> 	array('#tp-top-header, .tp-logo, .tp-main, .site-info, #site-navigation, #tp-header-logo, .tp-entry-content, .tp-entry-footer'),
		),
	),
));

Redux::setSection( $opt_name, array(
	'title'         => __( 'Typography', 'themeplus-core' ),
	'id'            => 'typography',
	'subsection'    => true,
	'fields'		=> array(
		array(
			'type'			=> 	'typography',
			'id'			=>	'tp-body-typography',
			'title'			=>	__( 'Body Typography', 'themeplus-core' ),
			'output'     	=> array('body'),
			'subtitle'		=>	__( 'These settings control the typography for all body text.', 'themeplus-core' ),
			'default'     => array(
				'color'       => '#000', 
				'font-style'  => '700', 
				'font-family' => 'Abel', 
				'google'      => true,
				'font-size'   => '18px', 
				'line-height' => '20px'
			),
			'font-backup'	=>	true,
			'subsets'		=>	false,
			'letter-spacing'=>	true,
			'word-spacing'	=>	true,
			'text-transform'=>	true,
		),
		array(
			'id' 			=> 'tp-body-links',
			'type' 			=> 'color',
			'title' 		=> __( 'Link Color' , 'redux_docs_generator' ),
			'subtitle' 		=> __( 'Controls the color of all text links.' , 'redux_docs_generator' ),
			'transparent'	=> false,
			'default'		=> '#9ca2a7',	
			'output' 		=> array(
				'color' 		=> 'a'
			),
			'validate' 		=> array(
				'color_rgba',
			)
		),
	),
));