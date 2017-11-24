<?php
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
function enqueue_child_theme_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

function hestiachild_testsection_customize_register( $wp_customize ) {

	if ( class_exists( 'Hestia_Hiding_Section' ) ) {
		$wp_customize->add_section(
			new Hestia_Hiding_Section(
				$wp_customize, 'hestiachild_youtube_options', array(
					'title'          => __( 'Youtube Options', 'hestia-child' ),
					'panel'          => 'hestia_frontpage_sections',
					'description'	=> __('Youtube Options here', 'hestia-child'),
					'hiding_control' => 'hestiachild_youtube_hide',
				)
			)
		);
	} else {
		$wp_customize->add_section(
			'hestiachild_youtube_options',
			array(
				'title'			=> __( 'Youtube Video', 'hestia-child' ),
				'capability'	=> 'edit_theme_options',
				'description'	=> __('Youtube Video Options', 'hestia-child'),
				'panel'		=> 'hestia_frontpage_sections'
			)
		);
	}
/*	
	$wp_customize->add_section(
		'hestiachild_youtube_options',
		array(
			'title'			=> __( 'Youtube Video', 'hestia-child' ),
			'capability'	=> 'edit_theme_options',
			'description'	=> __('Youtube Video Options', 'hestia-child'),
			'panel'		=> 'hestia_frontpage_sections'
		)
	);
*/
	$wp_customize->add_setting(
		'hestiachild_youtube_hide', array(
			'sanitize_callback' => 'hestia_sanitize_checkbox',
			'default'           => false,
			'transport'         => $selective_refresh,
		)
	);
	
	$wp_customize->add_setting( 'hestiachild_youtube_video_url',
		array(
			'type'		=> 'theme_mod',
			'default'	=> 'https://www.youtube.com/watch?v=4ff6CjYBhoI'	
		)
	);
	

	$wp_customize->add_setting( 'hestiachild_youtube_title',
		array(
			'type'		=> 'theme_mod',
			'default'	=> 'YouTube Video Below'	
		)
	);
		
	
	$wp_customize->add_control(
		'hestiachild_youtube_hide', array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Disable section', 'hestia-child' ),
			'section'  => 'hestiachild_youtube_options',
			'priority' => 1,
		)
	);
	
	$wp_customize->add_control(
		'hestiachild_youtube_video_url',
		array(
			'label'		=> __('Video URL','hestia-child'),
			'section'	=> 'hestiachild_youtube_options',
			'type'		=> 'text'
		)
	);
	
	$wp_customize->add_control(
		'hestiachild_youtube_title',
		array(
			'label'		=> __('Text Above Video','hestia-child'),
			'section'	=> 'hestiachild_youtube_options',
			'type'		=> 'text'
		)
	);
	
	
}
add_action( 'customize_register', 'hestiachild_testsection_customize_register' );


function new_section_1(){
	$title = get_theme_mod('hestiachild_youtube_title');
	$url = get_theme_mod('hestiachild_youtube_video_url');

	$test = 'oneeee '.$url;
	$toinsert = '<div class="youtubesection"><h2 style="text-align: center;font-family: roboto slab;font-weight: bold">'.$title.'</h2><div style="width: 60%;margin: 0 auto;">[su_youtube url="'.$url.'"]</div></div>';

	if(!get_theme_mod('hestiachild_youtube_hide')){
		echo do_shortcode($toinsert);		
	}


}

add_action( 'hestia_after_features_section_hook', 'new_section_1' );

?>