<?php
class Module{	
	private $_module_options = array();	
	public function __construct(){		
		$this->_module_options = array(																				
					"loadModuleCategoryArticle" 					=> true,	
					"loadModuleCategoryProduct" 					=> true,	
					"loadModuleItem" 				=> true,				
					"loadModuleCommon" 				=> true,							
				);		
		foreach ($this->_module_options as $key => $val){	
			if($val == true){
				add_action('widgets_init',array($this,$key));
			}
		}
	}			
	public function loadModuleCategoryArticle(){
		require_once PLUGIN_PATH . DS . 'module'. DS .'module-category-article.php';		
		register_widget('ModuleCategoryArticle');
	}
	public function loadModuleCategoryProduct(){
		require_once PLUGIN_PATH . DS . 'module'. DS .'module-category-product.php';		
		register_widget('ModuleCategoryProduct');
	}
	public function loadModuleItem(){
		require_once PLUGIN_PATH . DS . 'module'. DS .'module-item.php';		
		register_widget('ModuleItem');
	}
	public function loadModuleCommon(){
		require_once PLUGIN_PATH . DS . 'module'. DS .'module-common.php';		
		register_widget('ModuleCommon');
	}
}