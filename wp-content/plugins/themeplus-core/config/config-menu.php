<?php

Redux::setSection( $opt_name, array(
	'title'            => __( 'Menu', 'themeplus-core' ),
	'id'               => 'menu',
	'customizer_width' => '400px',
	'icon'             => 'el el-lines',
) );

Redux::setSection( $opt_name, array(
	'title'      	=> __( 'Main Menu', 'themeplus-core' ),
	'id'         	=> 'tp-main-menu',
	'subsection' 	=> true,
	'fields'		=>	array(
        array(
			'id'   	=> 'tp-section-main-menu',
			'class'	=> 'tp-section-title',
			'type' => 'info',
			'desc' => __('Main Menu', 'themeplus-core'),
		),
        array(
			'type'					=>	'background',
			'id'					=>	'tp-background-primary-navigation',
			'title'     			=> __( 'Background Color', 'themeplus-core' ),
			'subtitle'  			=> __( 'Controls the background color for the primary menu.', 'themeplus-core' ),
			'background-repeat'     => false,
			'background-attachment' => false,
			'background-position'   => false,
			'background-image'      => false,
			'background-size'       => false,
			'preview'               => false,
			'transparent'			=> false,
			'class'					=> 'col-1of2',
			'output'				=> array('background-color'	=> '#tp-navigation'),
			'default'				=> array('background-color' => '#1e73be')
		),
        array(
			'id' 					=> 'tp-primary-navigation-opacity',
			'type' 					=> 'slider',
			'title' 				=> __( 'Background Opacity' , 'themeplus-core' ),
			'subtitle' 				=> __( 'Select the transparency of the background for the primary menu.' , 'themeplus-core' ),
			'step' 					=> 0.01,
			'resolution' 			=> 0.01,
			'float_mark'	 		=> '.',
			'class'					=> 'col-1of2',
			'default'				=> 1,
		),
        array(
			'type'			=> 	'typography',
			'id'			=>	'tp-main-nav-typography',
			'title'			=>	__( 'Typography', 'themeplus-core' ),
			'output'     	=> array('.tp-primary-menu a'),
			'subtitle'		=>	__( 'These settings control the typography for the main navigation.', 'themeplus-core' ),
			'default'     => array(
				'color'       => '#fff', 
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
            'id'        => 'tp-primary-menu-height',
            'type'      => 'text',
            'title'     => __( 'Height' , 'themeplus-core' ),
            'subtitle'  => __( 'Select height for the primary menu. Enter value including any valid CSS unit, ex: 1200px.' , 'themeplus-core' ),
            'class'  =>   'col-1of2',
            'validate'  => array(
                'no_html'
            ),
            'default'   => '60px',
        ),
        array(
            'id'       => 'tp-primary-menu-vertical-align',
            'type'     => 'select',
            'title'    => __('Vertical Align', 'themeplus-core'), 
            'subtitle' => __('Choose the vertical alignment of the primary menu.', 'themeplus-core'),
            'class'  =>   'col-1of2',
            'options'  => array(
                'top'       => 'Top',
                'middle'    => 'Middle',
                'bottom'    => 'Bottom'
            ),
            'default'  => 'middle',
        ),
        array(
			'id' 					=> 'tp-primary-menu-right-padding',
			'type' 					=> 'slider',
			'title' 				=> __( 'Main Menu Item Padding' , 'themeplus-core' ),
			'subtitle' 				=> __( 'Controls the right padding for menu text (left on RTL). In pixels.' , 'themeplus-core' ),
			'step' 					=> 1,
			'resolution' 			=> 1,
            'max'                   => 200,
			'float_mark'	 		=> '.',
			'default'				=> 20,
		),
    ),
));