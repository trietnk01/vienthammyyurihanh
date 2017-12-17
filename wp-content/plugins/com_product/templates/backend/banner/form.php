<?php 

	global $zController;	
	$msg = '';
	if(count($zController->_error)>0){
		$msg .= '<div class="error"><ul>';		
		foreach ($zController->_error as $key => $val){
			$msg .= '<li>' . $val . '</li>';
		}
		$msg .= '</ul></div>';
	}		
	$vHtml = new HtmlControl();	
	$page 	= $zController->getParams('page');		
	$action = ($zController->getParams('action') != '')? $zController->getParams('action'):'add';		
	$lbl 	= 'Banner';				
	
	$inputTitle 	='<input type="text" id="title" name="title" class="regular-text" value="'.sanitize_text_field(@$zController->_data['title']).'" />';	
	$inputCaption 	='<textarea rows="5" cols="55" name="caption" id="caption">'.sanitize_text_field(@$zController->_data['caption']).'</textarea>'; ;
	$inputImage 	='<input type="text" id="image" name="image" class="regular-text" value="'.sanitize_text_field(@$zController->_data['image']).'" />';
	$inputLinkWeb 	='<input type="text" id="link_web" name="link_web" class="regular-text" value="'.sanitize_text_field(@$zController->_data['link_web']).'" />';
	

	$id='';
	if(count($zController->_data) > 0){
		if(!empty($zController->_data['id'])){
			$id=(int)$zController->_data['id'];
		}
	}
	$picture                =   "";
	$strImage               =   "";
	if(count($zController->_data > 0)){
	    if(!empty(@$zController->_data["image"])){
	        $picture        =   '<center>&nbsp;<img src="'.site_url('wp-content/uploads/'.@$zController->_data["image"],null).'"  />&nbsp;</center>';                        
	        $strImage       =   @$zController->_data["image"];
	    }        
	}    
	$inputPictureHidden     =   '<input type="hidden" name="image_hidden" id="image_hidden" value="'.@$strImage.'" />';
	$inputID                =   '<input type="hidden" name="id" id="id" value="'.@$id.'" />'; 
	$action					=	'<input name="action" value="'.$action.'" type="hidden">				';

?>
<div class="wrap">
	<h1><?php echo $lbl;?></h1>
	<?php echo $msg;?>
	<form method="post" action="" id="<?php echo $page;?>"
		enctype="multipart/form-data">
		<?php echo $inputID; ?>
		<?php echo $inputPictureHidden; ?>
		<?php echo $action; ?>						
		<?php wp_nonce_field($action,'security_code',true);?>				
		<table class="content-form">
				<tr>
					<td scope="row"><b><i><label>Title</label></i></b></td>
					<td><?php echo $inputTitle;?></td>
				</tr>	
				<tr>
					<td scope="row"><b><i><label>Caption</label></i></b></td>
					<td><?php echo $inputCaption;?></td>
				</tr>
				<tr>
					<td scope="row"><b><i><label>Link web</label></i></b></td>
					<td><?php echo $inputLinkWeb;?></td>
				</tr>																
		</table>		
		<input type="file" id="image" name="image"  />   
		<?php echo $picture; ?>
		<p class="submit">
			<input name="submit" id="submit" class="button button-primary" value="Save Changes" type="submit">
		</p>
	</form>	
</div>
