<?php
class Zendvn_Theme_General_Section{
	private $_theme_mods;
	public function __construct($theme_mods = array()){
		$this->_theme_mods = $theme_mods;		
		add_action('customize_register', array($this,'register'));
		add_action('customize_preview_init', array($this,'live_preview'));
	}
		
	public function live_preview(){		
		wp_enqueue_script('zendvn-theme-customize', 
						get_template_directory_uri() . '/js/theme-customize.js',
						array('jquery','customize-preview'),
						'1.0.0',
						true
						);	
	}
	
	public function register($wp_customize){
		
		$sectionID = 'zendvn_theme_general';
		$wp_customize->add_section($sectionID,array(
					'title' => __('General'),
					'description' => 'Hien thi cac phan tu trong Section',
					'priority' => 20
				
			));
							
		//=======================================================
		// Tao site-logo
		//=======================================================
		$inputName = 'site-logo';
		$settingID = $sectionID . '[' . $inputName . ']';
		$wp_customize->add_setting($settingID,array(
				'default' 		=> get_template_directory_uri() . '/images/logo.png',
				'capability' 	=>'edit_theme_options',
				'type'			=> 'theme_mod',
				'transport'		=> 'postMessage',
		));
		
		$controlID = 'zendvn-theme-' . $inputName;
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $controlID,array(
				'label' 		=> __('Logo'),
				'section' 		=> $sectionID,
				'settings' 		=> $settingID,
		)));
			
		//=======================================================
		// link site
		//=======================================================
		$inputName = 'link-site';
		$settingID = $sectionID . '[' . $inputName . ']';
		$wp_customize->add_setting($settingID,array(
				'default' 		=> 'index.php',
				'capability' 	=> 'edit_theme_options',
				'type'			=> 'theme_mod',
				'transport'		=> 'postMessage',
		));
		
		$controlID = 'zendvn-theme-' . $inputName;
		$wp_customize->add_control($controlID,array(
				'label' 		=> __('Link site'),
				'section' 		=> $sectionID,
				'settings' 		=> $settingID,
				'type'			=>'textarea',
		));
	
	}
}