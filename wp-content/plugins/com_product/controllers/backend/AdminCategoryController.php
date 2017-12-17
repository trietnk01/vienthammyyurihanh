<?php
class AdminCategoryController{
 	private $_prefix_name = 'zendvn-sp-zacategory';	
	private $_prefix_id   = 'zendvn-sp-zacategory-';	
	public function __construct(){
		global $zController;		
		$model = $zController->getModel("/backend","AdminCategoryModel");
		add_action('init',array($model,'create'));		
		if($zController->getParams('taxonomy') == 'za_category'){			
			add_action('za_category_add_form_fields', array($this,'add_form'));
			add_action('za_category_edit_form_fields', array($this,'edit_form'));							
			add_action('edited_za_category', array($this,'save'));
			add_action('create_za_category', array($this,'save'));
		}
	}
	
	public function add_form(){
		global $zController;
		$vHtml = new HtmlControl();
		// tạo button
		$inputID 	= $this->create_id('button');
		$inputName 	= $this->create_id('button');		
		$btnMedia='<input type="button" name="'.$inputID.'" id="'.$inputID.'" value="'.esc_attr__('Media Library Image').'" class="button-secondary" />';
		// tạo picture
		$inputID 	= $this->create_id('picture');
		$inputName 	= $this->create_name('picture');
		$inputValue="";
		$lblPicture='<label for="tag-name">'.esc_html__('Image of category').'</label>';
		$inputPicture='<input type="text" id="'.$inputID.'" name="'.$inputName.'" />';
		$pPicture='<p>'.esc_html__('Upload image for ZS category').'</p>';
		$html='<div class="form-field">'.
				$lblPicture.
				$inputPicture.
				$btnMedia.
				$pPicture.
				'</div>';
		echo $html;
		echo $vHtml->btn_media_script($this->create_id('button'), $this->create_id('picture'));
	}
	public function edit_form($term){

		global $zController;
		$vHtml = new HtmlControl();
		$option_name 	= $this->_prefix_id . $term->term_id;
		$option_value	= get_option($option_name);
		// tạo button
		$inputID 	= $this->create_id('button');
		$inputName 	= $this->create_id('button');		
		$btnMedia='<input type="button" name="'.$inputID.'" id="'.$inputID.'" value="'.esc_attr__('Media Library Image').'" class="button-secondary" />';
		// tạo picture
		$inputID 	= $this->create_id('picture');
		$inputName 	= $this->create_name('picture');
		$inputValue = @$option_value['picture'];
		$lblPicture='<label for="tag-name">'.esc_html__('Image of category').'</label>';
		$inputPicture='<input type="text" id="'.$inputID.'" name="'.$inputName.'" value="'.$inputValue.'" />';
		$pPicture='<p>'.esc_html__('Upload image for ZS category').'</p>';
		$jsMedia		= $vHtml->btn_media_script($this->create_id('button'),$this->create_id('picture'));
		$vImg='<img src="'.$inputValue.'" />';
		$html='<tr class="form-field term-description-wrap">
					<th scope="row">'. $lblPicture.'</th>
					<td>
						' . $inputPicture . $btnMedia . $jsMedia . $pPicture . '
					</td>
				</tr>
				<tr>
					<th scope="row"></th>
					<td>'.$vImg.'</td>
				</tr>
				';
		echo $html;
	}
	
	
	public function save($term_id){
		global $zController;
		
		if($zController->isPost()){
			
			$option_name = $this->_prefix_id . $term_id;
			update_option($option_name, $zController->getParams($this->_prefix_name));					
			
		}
	}



	private function create_name($val){
		return $this->_prefix_name . '[' . $val . ']';
	}
	
	
	private function create_id($val){
		return $this->_prefix_id . $val;
	}
 } 
?>