<?php

Redux::setSection( $opt_name, array(
	'title'            => __( 'Social Media', 'themeplus-core' ),
	'id'               => 'social-media',
	'customizer_width' => '400px',
	'icon'             => 'el el-group-alt',
) );

Redux::setSection( $opt_name, array(
	'title'         => 	__( 'Social Links', 'themeplus-core' ),
	'id'            => 	'tp-socials',
	'subsection'    => 	true,
	'fields'		=> 	array(
		array(
			'id'   	=> 'tp-section-social-facebook',
			'class'	=> 'tp-section-title',
			'type' => 'info',
			'desc' => __('Facebook', 'themeplus-core'),
		),
		array(
			'id' => 'tp-social-links',
			'type' => 'socials',
			'title' => __( 'Social Media Links' , 'themeplus-core' ),
			'show' => array(
				'title'			=>	true,
				'font-icon' 	=> 	true,
				'url'			=>	true
			),
			
		),
	),
) );