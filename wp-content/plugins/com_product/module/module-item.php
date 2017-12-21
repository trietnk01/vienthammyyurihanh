<?php
class ModuleItem extends WP_Widget {

	public function __construct() {		
		$id_base = 'module-item';
		$name	= 'ModuleItem';
		$widget_options = array(
					'classname' => 'module-item',
					'description' => 'ModuleItem'
				);
		$control_options = array('width'=>'350px');
		parent::__construct($id_base, $name,$widget_options, $control_options);	
	}	
	public function widget( $args, $instance ) {			
		extract($args);					
		$title = apply_filters('widget_title', $instance['title']);
		$title = (empty($title))? '': $title;
		$title_status = (empty($instance['title_status']))? '': $instance['title_status'];
		$css ='class="'.((empty($instance['css']))? '':$instance['css']).'"';
		$status = (empty($instance['status']))? '':$instance['status'];
		$status_wrapper = (empty($instance['status_wrapper']))? '':$instance['status_wrapper'];
		$classname ='class="'.$this->widget_options['classname'].'"' ;		
		$before_widget = str_replace($classname,$css, $before_widget);
		if($status_wrapper=="active"){
			echo $before_widget;
			if($title_status == "active" || empty($title_status)){
				if(!empty($title)){
					echo $before_title . $title . $after_title;
				}		
			}				 
			require PLUGIN_PATH . DS . 'module'. DS .'html'. DS .'module-item.php';		
			echo $after_widget;	
		}
		else
			require PLUGIN_PATH . DS . 'module'. DS .'html'. DS .'module-item.php';				
	}
	
	public function update( $new_instance, $old_instance ) {			 
		$instance = $old_instance;		
		$instance['title'] 		= strip_tags($new_instance['title']);				
		$instance['title_status'] 		=$new_instance['title_status'] ;
		$instance['item_id'] 	= $new_instance['item_id'];					
		$instance['status'] 		=$new_instance['status'] ;
		$instance['status_wrapper'] 		=$new_instance['status_wrapper'] ;	
		$instance['position'] 	= $new_instance['position'];		
		$instance['css'] 	= strip_tags($new_instance['css']);		
		return $instance;
	}
	
	public function form( $instance ) {	
		$vHtml = new HtmlControl();
				
		//Tao phan tu chua Title
		$inputID 	= $this->get_field_id('title');
		$inputName 	= $this->get_field_name('title');
		$inputValue = @$instance['title'];
		$class = array("widefat");
		$html		= $vHtml->label('Title',array('for'=>$inputID))
					. $vHtml->cmsTextbox($inputID,$inputName,"widefat",$inputValue);
		echo $vHtml->pTag($html);	
			

		$inputID 	= $this->get_field_id('title_status');
		$inputName 	= $this->get_field_name('title_status');
		$inputValue="";
		if(!empty(@$instance['title_status'])){
			$inputValue = @$instance['title_status'];			 
		}				 
		$class = array("widefat");
		$html		= $vHtml->label('StatusTitle',array('for'=>$inputID))
					. $vHtml->cmsSelectbox($inputID,$inputName,"widefat",array(null => '- Select status -', "active" => 'Publish', "inactive" => 'Unpublish'),$inputValue,"");
		echo $vHtml->pTag($html);					


		$inputID 	= $this->get_field_id('item_id');
		$inputName 	= $this->get_field_name('item_id');
		$inputValue = @$instance['item_id'];
		$class = array("widefat");
		$html		= $vHtml->label('ItemID',array('for'=>$inputID))
					. $vHtml->cmsTextbox($inputID,$inputName,"widefat",$inputValue);
		echo $vHtml->pTag($html);	


		$inputID 	= $this->get_field_id('status');
		$inputName 	= $this->get_field_name('status');
		$inputValue="";
		if(!empty(@$instance['status'])){
			$inputValue = @$instance['status'];			 
		}				 
		$class = array("widefat");
		$html		= $vHtml->label('Status',array('for'=>$inputID))
					. $vHtml->cmsSelectbox($inputID,$inputName,"widefat",array(null => '- Select status -', "active" => 'Publish', "inactive" => 'Unpublish'),$inputValue,"");
		echo $vHtml->pTag($html);		

		$inputID 	= $this->get_field_id('status_wrapper');
		$inputName 	= $this->get_field_name('status_wrapper');
		$inputValue="";
		if(!empty(@$instance['status_wrapper'])){
			$inputValue = @$instance['status_wrapper'];			 
		}				 
		$class = array("widefat");
		$html		= $vHtml->label('StatusWrapper',array('for'=>$inputID))
					. $vHtml->cmsSelectbox($inputID,$inputName,"widefat",array(null => '- Select status -', "active" => 'Active', "inactive" => 'Inactive'),$inputValue,"");
		echo $vHtml->pTag($html);		


		$inputID 	= $this->get_field_id('position');
		$inputName 	= $this->get_field_name('position');
		$inputValue = @$instance['position'];
		$class = array("widefat");
		$html		= $vHtml->label('Position',array('for'=>$inputID))
					. $vHtml->cmsTextbox($inputID,$inputName,"widefat",$inputValue);
		echo $vHtml->pTag($html);		


		$inputID 	= $this->get_field_id('css');
		$inputName 	= $this->get_field_name('css');
		$inputValue = @$instance['css'];
		$class = array("widefat");
		$html		= $vHtml->label('CssClass',array('for'=>$inputID))
					. $vHtml->cmsTextbox($inputID,$inputName,"widefat",$inputValue);
		echo $vHtml->pTag($html);			
	}
}

