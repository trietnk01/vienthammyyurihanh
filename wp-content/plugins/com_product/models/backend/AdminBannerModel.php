<?php
if(!class_exists('WP_List_Table')){
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class AdminBannerModel extends WP_List_Table{

	private $_per_page =100;
	
	private $_sql;
	
	//1.1 Xay dung ham construct
	public function __construct(){
	
		parent::__construct(array(
				'plural' => 'id',
				'singular' => 'id',
				'ajax' => false,
				'screen' => null,
		) );
	
	}
	
	//1.2 Xay dung ham construct
	public function prepare_items(){
		//echo '<br/>' . __METHOD__;
		$columns 	= $this->get_columns();
		$hidden 	= $this->get_hidden_columns();
		$sortable 	= $this->get_sortable_columns();
	
		$this->_column_headers 	= array($columns,$hidden,$sortable);
		$this->items 			= $this->table_data();
	
		$total_items 	= $this->total_items();
		$per_page 		= $this->_per_page;
		$total_pages 	= ceil($total_items/$per_page);
	
		$this->set_pagination_args(array(
				'total_items' 	=> $total_items,
				'per_page' 		=> $per_page,
				'total_pages' 	=> $total_pages
		));
	
	}

	public function get_bulk_actions(){
		$actions = array(
				'delete' => 'Delete',				
		);
		return $actions;
	}
	public function column_status($item){
		global $zController;
			
		$page = $zController->getParams('page');
			
		if($item['status'] == 1 ){
			$action = 'inactive';
			$src =  PLUGIN_URL . "/public/backend/images/active.png" ;
		}else{
			$action = 'active';
			$src =  PLUGIN_URL . "/public/backend/images/inactive.png" ;
		}
		$paged = max(1,@$_REQUEST['paged']);
			
		$name 		= 'security_code';
		$lnkStatus 	= add_query_arg(array('action'=>$action,'id'=>$item['id'],'paged'=> $paged));
		$action 	= $action . '_id_' . $item['id'];
		$lnkStatus 	= wp_nonce_url($lnkStatus,$action,$name);
			
		$html = '<img alt="" src="' . $src . '">';
		$html = '<a href="' . $lnkStatus . '">' . $html . '</a>';
		return $html;
	}
	public function column_name($item){		
		global $zController;
		
		$page = $zController->getParams('page');
	
		$name = 'security_code';
	
		$lnkDelete =  add_query_arg(array('action'=>'delete','id'=>$item['id']));
		$action 	= 'delete_id_' . $item['id'];
		$lnkDelete = wp_nonce_url($lnkDelete,$action,$name);
	
		$actions = array(
				'edit' 		=> '<a href="?page=' . $page . '&action=edit&id=' . $item['id'] . '">Edit</a>',
				'delete' 	=> '<a href="' . $lnkDelete . '">Delete</a>',				
		);
	
		$html = '<strong><a href="?page=' . $page . '&action=edit&id=' . $item['id'] . '">' . $item['title'] .'</a></strong>'
				. $this->row_actions($actions);		
		return $html;
	}
	

	public function column_cb($item){
		$singular = $this->_args['singular'];
		$html = '<input type="checkbox" name="' . $singular .'[]" value="' . $item['id'] .'" />';
		return $html;
	}
	
	

	public function column_default($item, $column_name){
	
		return $item[$column_name];
	}
	
	
	private function total_items(){
		global $wpdb;
		return $wpdb->query($this->_sql);
	}
	
	private function table_data(){	
		$data = array();	
		global $wpdb,$zController;			
		$orderby 	= ($zController->getParams('orderby') 	== '')? 'id' : $_GET['orderby'];
		$order		= ($zController->getParams('order') 	== '')? 'DESC' : $_GET['order'];	
		$table = $wpdb->prefix . 'shk_banner';	
		$sql = 'SELECT m.*
				FROM ' . $table . ' AS m ';	
		$whereArr = array();			
		if(!empty($zController->getParams('s'))){
			$s = esc_sql($zController->getParams('s'));
			$whereArr[] = " (m.title LIKE '%$s%') ";
		}	
		if(count($whereArr)>0){
			$sql .= " WHERE " . join(" AND ", $whereArr);				
		}			
		$this->_sql  = $sql;
		$paged 		= max(1,@$_REQUEST['paged']);
		$offset 	= ($paged - 1) * $this->_per_page;
		$sql .= ' LIMIT ' . $this->_per_page . ' OFFSET ' . $offset;
		$data = $wpdb->get_results($sql,ARRAY_A);		
		return $data;
	}
	
	public function get_sortable_columns(){
		return array(
				'name' => array('name',true),
				'id'	=> array('id', true)
		);
	}
	
	public function get_columns(){
		$arr = array(
				'cb'				=> '<input type="checkbox" />',
				'name' 				=> 'Title',				
				"image"				=> "Image",					
				'id'				=> 'ID'
		);
		return $arr;
	}
	
	
	public function get_hidden_columns(){
		return array();
	}
	
	public function deleteItem(){		
		global $wpdb,$zController;	
		$arrData = $zController->getParams();		
		$tbl_banner 			= $wpdb->prefix . 'shk_banner';				
		$arrID=array();
		if(is_array($arrData["id"]))
			$arrID=$arrData["id"];
		else
			$arrID[]=$arrData["id"];
		$ids = implode(",",$arrID);			
		$sql_banner 		= "DELETE FROM ".$tbl_banner." 		WHERE id 			IN (".$ids.")";		
		$wpdb->query($sql_banner);						
	}	
	public function getItem(){				
		global $wpdb,$zController;
		$table = $wpdb->prefix . 'shk_banner';
		$arrData=$zController->getParams();		
		$id = absint($arrData['id']);			
		$sql = "SELECT * FROM $table WHERE id = $id";
		$result = $wpdb->get_row($sql, ARRAY_A);				
		return $result;
	}	
	public function save_item(){			
		global $zController, $wpdb;
		$arrParam = $zController->getParams();			
		$action = $_POST['action'];				
		$id=0;
		if(!empty($_POST['id'])){
			$id=(int)$_POST['id'];								
		}		
		$title=$_POST["title"];		
		$caption=$_POST["caption"];		
		$link_web=$_POST["link_web"];
		$image_hidden=$_POST["image_hidden"];

		$uploadDir = get_home_path()  ."wp-content".DS."uploads";                 
		$fileObj=$_FILES["image"];          
		$fileName="";
		if($fileObj['tmp_name'] != null){                
			$fileName   = $fileObj['name'];						
			@copy($fileObj['tmp_name'], $uploadDir . DS . $fileName);                   
		}   
		$file_image="";   
		$image="";                    
		if(!empty($image_hidden)){
			$file_image =$image_hidden;          
		}
		if(!empty($fileName))  {
			$file_image=$fileName;                                                
		}
		$image=trim($file_image) ;  		
		$table = $wpdb->prefix . 'shk_banner';		
		$info="";			
		switch ($action) {			
			case "edit":			
				$query = "update `".$table."` set 
							title 			= 	%s
							, caption			=	%s	
							, image			=   %s	
							, link_web		=	%s						
							where id 		=  	%d " ;
				$info = $wpdb->prepare($query
											,$title											
											,$caption
											,$image	
											,$link_web										
											,$id);
				break;	
			case "add":
				$query="insert into `".$table."` (`title`,`caption`,`image`,`link_web`) values (%s,%s,%s,%s) ";
				$info = $wpdb->prepare($query
											,$title				
											,$caption		
											,$image
											,$link_web											
											);
				break;
		}				
		$wpdb->query($info);		
	}		
}