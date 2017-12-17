<?php
class BannerModel{	
	public function getListBanner(){	
		global $wpdb;
		$table = $wpdb->prefix . 'shk_banner';	
		$sql = "SELECT 	p.id,p.title,p.alias,p.image
				FROM 	".$table." AS p 
				WHERE 	p.status = 1 
				ORDER BY p.sort_order ASC" ;
		$result = $wpdb->get_results($sql,ARRAY_A);		
		return $result;
	}
}