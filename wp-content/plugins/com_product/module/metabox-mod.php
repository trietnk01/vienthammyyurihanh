<?php
class MetaBoxMod{
	
	private $_meta_box_id = 'ecommerce-shark-id';
	
	private $_prefix_key  = '_ecommerce_shark_id_';
	
	private $_prefix_id = 'ecommerce-shark-id-';
	
	public function __construct(){		
		add_action('add_meta_boxes', array($this,'create'));		
		add_action('save_post', array($this,'save'));		
	}
	
	public function create(){
		add_meta_box($this->_meta_box_id, 'Ecommerce', array($this,'display'),'page');
	}
	
	private function create_key($val){
		return $this->_prefix_key . $val;
	}
	

	private function create_id($val){
		return $this->_prefix_id . $val;
	}
	
	
	public function save($post_id){
		
		$postVal = $_POST;
		
		if(!isset($postVal[$this->_meta_box_id . '-nonce'])) return $post_id;
		
		if(!wp_verify_nonce($postVal[$this->_meta_box_id . '-nonce'],$this->_meta_box_id))  return $post_id;
		
		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
		
		if(!current_user_can('edit_post', $post_id)) return $post_id;
		
		$arrData = array(				
					'item_per_page' 	=> sanitize_text_field($postVal[$this->create_id('item_per_page')]),
					'category_id' 	=> strip_tags($postVal[$this->create_id('category_id')])
				);
		foreach ($arrData as $key => $val){
			update_post_meta($post_id, $this->create_key($key),$val);
		}		
		
		//die();
	}
	
	public function display($post){
		wp_nonce_field($this->_meta_box_id,$this->_meta_box_id . '-nonce');
		echo '<div class="zendvn-mb-wrap">';
		echo '<p><b><i>' . 'Xin vui lòng nhập đầy đủ thông tin vào các ô sau' . ':</i></b></p>';
		
		$htmlObj = new ZendvnHtml();						
		//Tao phan tu chua Level		
		$inputID 	= $this->create_id('category_id');
		$inputName 	= $this->create_id('category_id');
		$inputValue = get_post_meta($post->ID,$this->create_key('category_id'),true);
		$arr 		= array('id' => $inputID,'rows'=>6, 'cols'=>60);
		$html		= $htmlObj->label('category_id') 
						. $htmlObj->textarea($inputName,$inputValue,$arr);
		echo $htmlObj->pTag($html);

		//Tao phan tu chua Price
		$inputID 	= $this->create_id('item_per_page');
		$inputName 	= $this->create_id('item_per_page');
		$inputValue = get_post_meta($post->ID,$this->create_key('item_per_page'),true);
		$arr = array('size' =>'25','id' => $inputID);
		$html 		= $htmlObj->label('Item_Perpage') 
						. $htmlObj->textbox($inputName,$inputValue,$arr);
		echo $htmlObj->pTag($html);
		
		echo '</div>';
	}	
}








