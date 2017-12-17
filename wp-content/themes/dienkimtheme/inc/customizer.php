<?php
class CustomizerControl{
	
	private $_theme_mods = array();
	
	public function __construct(){
		$options = array(
					'general' 		=> true,					
				);			
		$this->_theme_mods = get_theme_mods();	

		if($options['general']== true) 			$this->general();				
	}
	
	
	public function general(){
		require_once get_template_directory() . '/inc/controls/general_section.php';
		new Zendvn_Theme_General_Section($this->_theme_mods);
	}
	
	public function general_section($val = ''){	
		if(empty($val)) return false;
		$options  = $this->_theme_mods['zendvn_theme_general'];		

		if($val == 'site-logo'){
			return $options['site-logo'];
		}		
		if($val == 'link-site'){
			return $options['link-site'];
		}			
	}	
}
