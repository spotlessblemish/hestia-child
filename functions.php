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

function hestiachild_features_section_2_customize_register ( $wp_customize ) {

	if ( class_exists( 'Hestia_Hiding_Section' ) ) {
		$wp_customize->add_section(
			new Hestia_Hiding_Section(
				$wp_customize, 'hestiachild_features_section_2_options', array(
					'title'          => __( 'Features Section 2', 'hestia-child' ),
					'panel'          => 'hestia_frontpage_sections',
					'description'	=> __('Second set of features', 'hestia-child'),
					'hiding_control' => 'hestiachild_features_section_2_hide',
				)
			)
		);
	} else {
		$wp_customize->add_section(
			'hestiachild_features_section_2_options',
			array(
				'title'			=> __( 'Features Section 2', 'hestia-child' ),
				'capability'	=> 'edit_theme_options',
				'description'	=> __('Second set of features', 'hestia-child'),
				'panel'		=> 'hestia_frontpage_sections'
			)
		);
	}

	$wp_customize->add_setting(
		'hestiachild_features_section_2_hide', array(
			'sanitize_callback' => 'hestia_sanitize_checkbox',
			'default'           => false,
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_setting( 'hestiachild_features_section_2a_icon',
		array(
			'type'		=> 'theme_mod',
			'default'	=> 'fa-wechat'	
		)
	);


	$wp_customize->add_setting( 'hestiachild_features_section_2a_colour',
		array(
			'type'		=> 'theme_mod',
			'default'	=> '#ffffff'	
		)
	);
	
	$wp_customize->add_setting( 'hestiachild_features_section_2a_title',
		array(
			'type'		=> 'theme_mod',
			'default'	=> 'title a'	
		)
	);

	$wp_customize->add_setting( 'hestiachild_features_section_2a_text',
		array(
			'type'		=> 'theme_mod',
			'default'	=> 'text a'	
		)
	);

	$wp_customize->add_setting( 'hestiachild_features_section_2a_link',
		array(
			'type'		=> 'theme_mod',
			'default'	=> '#'	
		)
	);		


	$wp_customize->add_setting( 'hestiachild_features_section_2b_icon',
	array(
		'type'		=> 'theme_mod',
		'default'	=> 'fa-wechat'	
	)
	);


	$wp_customize->add_setting( 'hestiachild_features_section_2b_colour',
		array(
			'type'		=> 'theme_mod',
			'default'	=> '#ffffff'	
		)
	);

	$wp_customize->add_setting( 'hestiachild_features_section_2b_title',
		array(
			'type'		=> 'theme_mod',
			'default'	=> 'title b'	
		)
	);

	$wp_customize->add_setting( 'hestiachild_features_section_2b_text',
		array(
			'type'		=> 'theme_mod',
			'default'	=> 'TEXT b'	
		)
	);

	$wp_customize->add_setting( 'hestiachild_features_section_2b_link',
		array(
			'type'		=> 'theme_mod',
			'default'	=> '#'	
		)
	);		


	$wp_customize->add_setting( 'hestiachild_features_section_2_background_colour',
		array(
			'type'		=> 'theme_mod',
			'default'	=> '#ffffff'	
		)
	);	

	$wp_customize->add_control(
		'hestiachild_features_section_2_background_colour',
		array(
			'label'		=> __('section background colour','hestia-child'),
			'section'	=> 'hestiachild_features_section_2_options',
			'type'		=> 'text'
		)
	);
	
	$wp_customize->add_control(
		'hestiachild_features_section_2_hide', array(
			'type'     => 'checkbox',
			'label'    => esc_html__( 'Disable section', 'hestia-child' ),
			'section'  => 'hestiachild_features_section_2_options',
			'priority' => 1,
		)
	);
	
	$wp_customize->add_control(
		'hestiachild_features_section_2a_icon',
		array(
			'label'		=> __('icon a','hestia-child'),
			'section'	=> 'hestiachild_features_section_2_options',
			'type'		=> 'text'
		)
	);

	$wp_customize->add_control(
		'hestiachild_features_section_2a_colour',
		array(
			'label'		=> __('colour a','hestia-child'),
			'section'	=> 'hestiachild_features_section_2_options',
			'type'		=> 'text'
		)
	);

	$wp_customize->add_control(
		'hestiachild_features_section_2a_title',
		array(
			'label'		=> __('title a','hestia-child'),
			'section'	=> 'hestiachild_features_section_2_options',
			'type'		=> 'text'
		)
	);


	$wp_customize->add_control(
		'hestiachild_features_section_2a_text',
		array(
			'label'		=> __('text a','hestia-child'),
			'section'	=> 'hestiachild_features_section_2_options',
			'type'		=> 'text'
		)
	);

	$wp_customize->add_control(
		'hestiachild_features_section_2a_link',
		array(
			'label'		=> __('link a','hestia-child'),
			'section'	=> 'hestiachild_features_section_2_options',
			'type'		=> 'text'
		)
	);
	
	$wp_customize->add_control(
		'hestiachild_features_section_2b_icon',
		array(
			'label'		=> __('icon b','hestia-child'),
			'section'	=> 'hestiachild_features_section_2_options',
			'type'		=> 'text'
		)
	);

	$wp_customize->add_control(
		'hestiachild_features_section_2b_colour',
		array(
			'label'		=> __('colour b','hestia-child'),
			'section'	=> 'hestiachild_features_section_2_options',
			'type'		=> 'text'
		)
	);

	$wp_customize->add_control(
		'hestiachild_features_section_2b_title',
		array(
			'label'		=> __('title b','hestia-child'),
			'section'	=> 'hestiachild_features_section_2_options',
			'type'		=> 'text'
		)
	);


	$wp_customize->add_control(
		'hestiachild_features_section_2b_text',
		array(
			'label'		=> __('text b','hestia-child'),
			'section'	=> 'hestiachild_features_section_2_options',
			'type'		=> 'text'
		)
	);

	$wp_customize->add_control(
		'hestiachild_features_section_2b_link',
		array(
			'label'		=> __('link b','hestia-child'),
			'section'	=> 'hestiachild_features_section_2_options',
			'type'		=> 'text'
		)
	);

}
add_action( 'customize_register', 'hestiachild_features_section_2_customize_register' );


function features_section_2(){

	if(!get_theme_mod('hestiachild_features_section_2_hide')){
		$backgroundcolour = get_theme_mod('hestiachild_features_section_2_background_colour'); 
		$coloura = get_theme_mod('hestiachild_features_section_2a_colour'); 
		$linka = get_theme_mod('hestiachild_features_section_2a_link');
		$icona = get_theme_mod('hestiachild_features_section_2a_icon');
		$texta = get_theme_mod('hestiachild_features_section_2a_text');	
		$titlea = get_theme_mod('hestiachild_features_section_2a_title');
		$colourb = get_theme_mod('hestiachild_features_section_2b_colour'); 
		$linkb = get_theme_mod('hestiachild_features_section_2b_link');
		$iconb = get_theme_mod('hestiachild_features_section_2b_icon');
		$textb = get_theme_mod('hestiachild_features_section_2b_text');	
		$titleb = get_theme_mod('hestiachild_features_section_2b_title');

		/*
									<div class="col-md-8 col-md-offset-2" style="background-color:#cccccc;">
							<h2 class="hestia-title">this is what makes it great</h2><h5 class="description">what we feed our children when they are young is important</h5>						</div>
							</div>
		*/
		echo '	<section class="hestia-features " id="features" data-sorder="hestia_features" style="background-color: '.$backgroundcolour.';">
					<div class="container">
						<div class="row"> 
							<div class="hestia-features-content">
								<div class="row">
									<div class="col-md-4 feature-box">
										<div class="hestia-info">
											<a href="'.$linka.'">
												<div class="icon" style="color:'.$coloura.'"><i class="fa '.$icona.'"></i></div>
												<h4 class="info-title">'.$titlea.'</h4>
											</a>
											<p>'.$texta.'</p>
										</div>
									</div>
									<div class="col-md-4 feature-box">	
										<div class="hestia-info">
											<a href="'.$linkb.'">
												<div class="icon" style="color:'.$colourb.'"><i class="fa '.$iconb.'"></i></div>
												<h4 class="info-title">'.$titleb.'</h4>
											</a>
											<p>'.$textb.'</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>';

	}
}
add_action( 'hestia_after_features_section_hook', 'features_section_2')

?>