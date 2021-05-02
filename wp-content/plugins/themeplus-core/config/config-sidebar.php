<?php

Redux::setSection( $opt_name, array(
	'title'            => __( 'Sidebar', 'themeplus-core' ),
	'id'               => 'sidebar',
	'customizer_width' => '400px',
	'icon'             => 'el el-circle-arrow-right',
) );

Redux::setSection( $opt_name, array(
	'title'         => 	__( 'Sidebar', 'themeplus-core' ),
	'id'            => 	'tp-sidebar',
	'subsection'    => 	true,
	'fields'		=> 	array(
		array(
			'type'		=>	'button_set',
			'id'		=>	'tp-show-sidebar-blog-archive',
			'title'		=> 	'Blog Sidebars',
			'subtitle'	=>	__('Turn on if you want to use the same sidebars on your blog archive.', 'themeplus-core' ),
			'options'	=>	array(
				'none'	=>	__('None', 'themeplus-core' ),
				'left'	=>	__('Only Left', 'themeplus-core' ),
				'right'	=>	__('Only Right', 'themeplus-core' ),
				'both'	=>	__('Left and Right', 'themeplus-core' ),
			),
			'default' 	=> 'none',
		),
	),
	
) );